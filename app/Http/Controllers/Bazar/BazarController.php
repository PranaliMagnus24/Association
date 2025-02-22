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
            $catalogs = Catalog::whereIn('catalog_category_id', $subCategoryIds)->get();
        } else {

            $catalogs = Catalog::all();
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

    return view('home.bazar.bazar_details', compact('catalog', 'images'));
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


}
