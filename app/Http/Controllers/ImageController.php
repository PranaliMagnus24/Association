<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Page;
use App\Models\CType;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Spatie\Image\Image as SpatieImage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin.image.imagelisting', compact('images'));
    }

    // Show the form for creating a new image
    public function create()
    {
        $gallerys = Gallery::all();
        $pages = Page::all();
        $types = CType::all();
        return view('admin.image.imageUpload', compact('pages', 'types', 'gallerys'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('name')) {
            foreach ($request->file('name') as $file) {
                $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $thumbnailName = time() . '-thumbnail-' . uniqid() . '.' . $file->getClientOriginalExtension();


                $imagePath = public_path('upload/' . $imageName);
                $file->move(public_path('upload'), $imageName);


                $thumbnailPath = public_path('upload/thumbnails/' . $thumbnailName);
                if (!file_exists(public_path('upload/thumbnails'))) {
                    mkdir(public_path('upload/thumbnails'), 0777, true);
                }

                SpatieImage::load($imagePath)
                    ->width(300)
                    ->height(300)
                    ->save($thumbnailPath);


                $imageRecord = new Image();
                $imageRecord->name = $imageName;
                $imageRecord->thumbnail = $thumbnailName;
                $imageRecord->gallery_id = $request->input('gallery_id');
                $imageRecord->page = $request->input('page');
                $imageRecord->ctype = $request->input('ctype');
                $imageRecord->start_datetime = $request->input('start_datetime');
                $imageRecord->end_datetime = $request->input('end_datetime');
                $imageRecord->save();
            }
        }

        toastr()->timeOut(5000)->closeButton()->addSuccess('Images uploaded successfully.');
        return redirect()->route('imagelisting');
    }


    // Edit the image and details
    public function edit($id)
    {
        $gallerys = Gallery::all();
        $pages = Page::all();
        $types = CType::all();
        $image = Image::findOrFail($id);
        return view('admin.image.imageedit', compact('image', 'pages', 'types', 'gallerys'));
    }
    public function update(Request $request, $id)
{
    $image = Image::findOrFail($id);

    // Validate the request
    $request->validate([
        'name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Changed 'required' to 'nullable' since it's optional for updates
        'gallery_id' => 'nullable|exists:gallery,id',
        'page' => 'required|string|max:255',
        'ctype' => 'required|string|max:255',
        'start_datetime' => 'required|date',
        'end_datetime' => 'required|date',
    ]);

    // Update the image data
    $image->page = $request->page;
    $image->ctype = $request->ctype;
    $image->start_datetime = $request->start_datetime;
    $image->end_datetime = $request->end_datetime;
    $image->gallery_id = $request->input('gallery_id');

    // Handle image upload or cropped image upload
    if ($request->hasFile('name')) {
        // If a new image is uploaded, delete the old image first
        $oldImagePath = public_path('upload/' . $image->name);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);  // Delete the old image
        }

        // Store the new uploaded image
        $imageFile = $request->file('name');
        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
        $imageFile->move(public_path('upload'), $imageName);  // Store the image in the 'upload' folder
        $image->name = $imageName;  // Update the image name in the database
    }

    // Handle cropped image upload (if any)
    if ($request->hasFile('croppedImage')) {
        // If a cropped image is uploaded, delete the old image first
        $oldImagePath = public_path('upload/' . $image->name);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);  // Delete the old image
        }

        // Store the cropped image
        $croppedImage = $request->file('croppedImage');
        $croppedImageName = time() . '-cropped.' . $croppedImage->getClientOriginalExtension();
        $croppedImage->move(public_path('upload'), $croppedImageName);  // Store the cropped image in 'upload' folder
        $image->name = $croppedImageName;  // Update the image name in the database
    }

    // Save the updated image record
    $image->save();

    // Redirect back to the gallery show page or image listing
    toastr()->timeOut(5000)->closeButton()->addSuccess('Image updated successfully.');
    return redirect()->route('imagelisting',$image->gallery_id);

}

    // Delete an image
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        $imagePath = public_path('upload/' . $image->name);
        if (!empty($image->name) && is_file($imagePath)) {
            unlink($imagePath); // Delete the image file
        }

        $image->delete(); // Delete the database entry
        toastr()->timeOut(5000)->closeButton()->addSuccess('Image deleted successfully.');
        return redirect()->route('imagelisting');
    }
}
