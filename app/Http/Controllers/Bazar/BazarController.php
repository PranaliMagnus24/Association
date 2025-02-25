<?php

namespace App\Http\Controllers\Bazar;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\CatalogCategory;
use App\Models\CompanyPro;
use App\Models\ShopRegistration;
use App\Models\User;
use App\Models\ShopContact;
use App\Models\ProductInquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShopContactMail;

use Str;
use File;

class BazarController extends Controller
{

    public function ramzanbazar(Request $request)
    {
        $categories = CatalogCategory::where('parent_id', 0)->get();
        $categoryFilter = $request->input('department');

        if ($categoryFilter && $categoryFilter != 'all') {
            $subCategoryIds = CatalogCategory::where('catalog_category_name', $categoryFilter)->pluck('id')->toArray();
            $catalogs = Catalog::whereIn('catalog_category_id', $subCategoryIds)->with('shop')->get();
        } else {
            $catalogs = Catalog::with('shop')->get();
        }

        return view('home.bazar.bazar_list', compact('categories', 'catalogs', 'categoryFilter'));
    }


    public function bazardetails($id)
{
    $catalog = Catalog::find($id);

    if (!$catalog) {
        return abort(404);
    }

    $images = $catalog->image ? json_decode($catalog->image, true) : [];
    $shop = ShopRegistration::where('id', $catalog->shop_id)->first();

    // Fetch all products from the same shop
    $relatedProducts = Catalog::where('shop_id', $catalog->shop_id)->get();

    return view('home.bazar.bazar_details', compact('catalog', 'images', 'shop', 'relatedProducts'));
}


public function bazarregistration()
{
    return view('home.bazar.bazar_register');
}

public function store(Request $request)
{
    $request->validate([
        'shop_name' => 'required|string',
        'shop_location' => 'nullable|string',
        'shop_desc' => 'nullable|string',
        'shop_logo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ]);

    $shop = new ShopRegistration();
    $shop->shop_name = $request->shop_name;
    $shop->shop_location = $request->shop_location;
    $shop->shop_desc = $request->shop_desc;
    $shop->user_id = Auth::id();

    $shop->save();

    $folderPath = public_path('upload/catalog/shop-logo/' . $shop->id);
    if (!File::exists($folderPath)) {
        File::makeDirectory($folderPath, 0777, true, true);
    }

    if ($request->hasFile('shop_logo')) {
        $file = $request->file('shop_logo');
        $shop_logoFilename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move($folderPath, $shop_logoFilename);

        $shop->shop_logo = $shop->id . '/' . $shop_logoFilename;
        $shop->save();
    }

    toastr()->timeOut(5000)->closeButton()->addSuccess('Shop Registration successfully!');
    return redirect()->route('catalog.list');
}



public function show($id, $name)
{
    $shop = ShopRegistration::findOrFail($id);

    if ($name !== Str::slug($shop->shop_name)) {
        return redirect()->route('shop.profile', ['id' => $shop->id, 'name' => Str::slug($shop->shop_name)]);
    }

    $catalogs = Catalog::where('shop_id', $shop->id)->get();

    return view('home.bazar.shop_profile', compact('shop', 'catalogs'));
}


/////Contact form

// public function shopform(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'phone' => 'required|digits:10',
//         'email' => 'required|email',
//         'message' => 'nullable|string',
//         'shop_id' => 'required',
//         'catalog_id' => 'required',
//     ]);
//  $user = auth()->user();
//     $shop = ShopRegistration::where('user_id', $user->id)->first();

//     $contactForm = new ShopContact();
//     $contactForm->name = $request->name;
//     $contactForm->phone = $request->phone;
//     $contactForm->email = $request->email;
//     $contactForm->message = $request->message;
//     $contactForm->shop_id = $request->shop_id;
//     $contactForm->catalog_id = $request->catalog_id;
//     $contactForm->save();


//     if (!empty($shop->email)) {
//         Mail::to($shop->email)->send(new ShopContactMail($contactForm));
//     } else {
//         return back()->with('error', 'Shop email is missing.');
//     }


//     return response()->json([
//         'success' => true,
//         'message' => 'Your message has been sent successfully.',
//     ]);
// }



/////Whatsapp Inquiry form
public function productinquiry(Request $request)
{
    $request->validate([
        'wp_name' => 'required|string',
        'wp_phone' => 'required|string',
        'wp_message' => 'required|string',
        'shop_id' => 'required',
        'catalog_id' => 'required',
    ]);

    $product = new ProductInquiry();
    $product->wp_name = $request->wp_name;
    $product->wp_phone = $request->wp_phone;
    $product->wp_message = $request->wp_message;
    $product->shop_id = $request->shop_id;
    $product->catalog_id = $request->catalog_id;
    $product->save();

    $shopOwner = User::where('id', function($query) use ($request) {
        $query->select('user_id')->from('shop-registration')->where('id', $request->shop_id)->limit(1);
    })->first();

    if (!$shopOwner) {
        return back()->with('error', 'Shop owner not found.');
    }

    $shopOwnerPhone = $shopOwner->phone;

    $catalog = Catalog::find($request->catalog_id);
    if (!$catalog) {
        return back()->with('error', 'Catalog not found.');
    }

    // $images = json_decode($catalog->image, true);
    // $productImagePath = (!empty($images) && is_array($images)) ? public_path('upload/catalog/' . $images[0]) : public_path('default-product.jpg');

    $productUrl = url("/bazar-details/{$catalog->id}");

    $message = "New Product Inquiry!\n\n"
        . "👤 Name: {$request->wp_name}\n"
        . "📞 Phone: {$request->wp_phone}\n"
        . "💬 Message: {$request->wp_message}\n\n"
        . "🔗 Product Link: $productUrl\n";

    $response = $this->sendWhatsAppMessage($shopOwnerPhone, $message);

    return back()->with('success', 'Inquiry submitted successfully & message sent on WhatsApp!');
}


private function sendWhatsAppMessage($mobile, $message)
{
    $apiKey = "8d6b516d798e44898545437d239e71e1";
    $apiUrl = "https://whatsappnew.bestsms.co.in/wapp/v2/api/send";

    $postData = [
        'apikey' => $apiKey,
        'mobile' => $mobile,
        'msg' => $message,
    ];

    // if ($productImagePath && file_exists($productImagePath)) {
    //     $postData['img1'] = new \CURLFile($productImagePath);
    // }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        \Log::error("WhatsApp API Curl error: " . curl_error($ch));
        return "Curl error: " . curl_error($ch);
    }

    curl_close($ch);

    return $response;
}

}
