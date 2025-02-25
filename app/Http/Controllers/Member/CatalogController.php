<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\CatalogCategory;
use App\Models\CompanyPro;
use App\Models\ShopRegistration;
use Str;
use File;

class CatalogController extends Controller
{
    public function index()
   {
    $user = auth()->user();
    $shop = ShopRegistration::where('user_id', $user->id)->first();
    $catalogs = Catalog::with('category')
                        ->where('shop_id', $shop->id)
                        ->paginate(10);
    return view('member.catalog.list-catalog',compact('shop', 'user','catalogs'));
   }

   public function create()
   {
    $user = auth()->user();
    $shop = ShopRegistration::where('user_id', $user->id)->first();
    $shop_id = $shop ? $shop->id : null;
    $categories = CatalogCategory::all();
    return view('member.catalog.create-catalog', compact('categories','shop_id'));
   }

   public function store(Request $request)
   {
    $request->validate([
        'title' => 'required|string',
        'type' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'nullable|string',
        'catalog_category_id' => 'nullable|string',
        'shop_id' => 'nullable',
        'brands' => 'nullable|string',
        'images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:10240',
        'meta_title' => 'nullable|string',
        'meta_keyword' => 'nullable|string',
    ]);


    $catalog = new Catalog();
    $catalog->title = $request->title;
    $catalog->type = $request->type;
    $catalog->description = $request->description;
    $catalog->price = $request->price;
    $catalog->catalog_category_id = $request->catalog_category_id;
    $catalog->shop_id = $request->shop_id;
    $catalog->brands = $request->brands;
    $catalog->meta_title = $request->meta_title;
    $catalog->meta_keyword = $request->meta_keyword;
    $catalog->status = $request->status;

    $catalog->save();

    $folderPath = public_path('upload/catalog/' . $catalog->id);
    if (!File::exists($folderPath)) {
        File::makeDirectory($folderPath, 0777, true);
    }

    // Save Multiple Images as JSON
    $imagePaths = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move($folderPath, $filename);
            $imagePaths[] = $catalog->id . '/' . $filename; // Save only relative path
        }
    }

    $catalog->image = json_encode($imagePaths);
    $catalog->save();

    // Save Video (if exists)
    if ($request->hasFile('video')) {
        $file = $request->file('video');
        $videoFilename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move($folderPath, $videoFilename);
        $catalog->video = $catalog->id . '/' . $videoFilename;
    }

    $catalog->save();
    toastr()->timeOut(5000)->closeButton()->addSuccess('Catalog saved successfully!');
    return redirect()->route('catalog.list');

   }



   public function getSubcategories(Request $request)
{
    $subcategories = CatalogCategory::where('parent_id', $request->category_id)->get();
    return response()->json($subcategories);
}


public function edit($id)
{
    $catalog = Catalog::find($id);
    $categories = CatalogCategory::all();
    return view('member.catalog.edit-catalog', compact('catalog','categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string',
        'type' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'nullable|string',
        'catalog_category_id' => 'nullable|string',
        'shop_id' => 'nullable',
        'brands' => 'nullable|string',
        'images.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:10240',
        'meta_title' => 'nullable|string',
        'meta_keyword' => 'nullable|string',
    ]);

    $catalog = Catalog::findOrFail($id);
    $catalog->title = $request->title;
    $catalog->type = $request->type;
    $catalog->description = $request->description;
    $catalog->price = $request->price;
    $catalog->catalog_category_id = $request->catalog_category_id;
    $catalog->shop_id = $request->shop_id;
    $catalog->brands = $request->brands;
    $catalog->meta_title = $request->meta_title;
    $catalog->meta_keyword = $request->meta_keyword;

    $folderPath = public_path('upload/catalog/' . $catalog->id);
    if (!File::exists($folderPath)) {
        File::makeDirectory($folderPath, 0777, true, true);
    }

    // Delete old images if new images are uploaded
    if ($request->hasFile('images')) {
        if (!empty($catalog->image)) {
            $oldImages = json_decode($catalog->image, true);
            foreach ($oldImages as $oldImage) {
                if (File::exists(public_path('upload/catalog/' . $oldImage))) {
                    File::delete(public_path('upload/catalog/' . $oldImage));
                }
            }
        }

        // Save new images
        $imagePaths = [];
        foreach ($request->file('images') as $file) {
            $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move($folderPath, $filename);
            $imagePaths[] = $catalog->id . '/' . $filename;
        }
        $catalog->image = json_encode($imagePaths);
    }

    // Update Video
    if ($request->hasFile('video')) {
        if ($catalog->video && File::exists(public_path('upload/catalog/' . $catalog->video))) {
            File::delete(public_path('upload/catalog/' . $catalog->video));
        }

        $file = $request->file('video');
        $videoFilename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move($folderPath, $videoFilename);
        $catalog->video = $catalog->id . '/' . $videoFilename;
    }

    $catalog->save();

    toastr()->timeOut(5000)->closeButton()->addSuccess('Catalog updated successfully!');

    return redirect()->route('catalog.list');
}


public function delete($id)
{
   $catalog = Catalog::findOrFail($id);
   if (!empty($catalog->catalog) && File::exists(public_path('upload/catalog/' . $catalog->catalog))) {
    File::delete(public_path('upload/catalog/' . $catalog->catalog));
}
   $catalog->delete();
   toastr()->timeOut(5000)->closeButton()->addSuccess('Catalog deleted successfully!');
   return redirect()->route('catalog.list');
}


}
