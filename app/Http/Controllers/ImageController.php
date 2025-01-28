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
            // Generate unique names for the image and thumbnail
            $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $thumbnailName = time() . '-thumbnail-' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Define paths
            $imagePath = public_path('upload/gallery/' . $imageName);
            $thumbnailFolder = public_path('upload/gallery/thumbnails/');
            $thumbnailPath = $thumbnailFolder . $thumbnailName;

            // Move original image to 'upload/gallery'
            $file->move(public_path('upload/gallery'), $imageName);

            // Create 'thumbnails' folder if it doesn't exist
            if (!file_exists($thumbnailFolder)) {
                mkdir($thumbnailFolder, 0777, true);
            }

            // Create and save the thumbnail using SpatieImage
            \Spatie\Image\Image::load($imagePath)
                ->width(300)
                ->height(300)
                ->save($thumbnailPath);

            // Save image details in the database
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

    // Show success message and redirect
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
            'name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional for update
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

        // Handle image upload
        if ($request->hasFile('name')) {
            // Paths for old image and thumbnail
            $oldImagePath = public_path('upload/gallery/' . $image->name);
            $oldThumbnailPath = public_path('upload/gallery/thumbnails/' . $image->thumbnail);

            // Delete old files if they exist
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }

            // Handle the new uploaded image
            $imageFile = $request->file('name');
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $thumbnailName = time() . '-thumbnail-' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

            // Move original image to 'upload/gallery'
            $imageFile->move(public_path('upload/gallery'), $imageName);

            // Create 'thumbnails' folder if it doesn't exist
            $thumbnailFolder = public_path('upload/gallery/thumbnails/');
            if (!file_exists($thumbnailFolder)) {
                mkdir($thumbnailFolder, 0777, true);
            }

            // Generate thumbnail using Spatie Image
            $thumbnailPath = $thumbnailFolder . $thumbnailName;
            \Spatie\Image\Image::load(public_path('upload/gallery/' . $imageName))
                ->width(300)
                ->height(300)
                ->save($thumbnailPath);

            // Update image record in the database
            $image->name = $imageName;
            $image->thumbnail = $thumbnailName;
        }

        // Save the updated image record
        $image->save();

        // Redirect back to the gallery show page or image listing
        toastr()->timeOut(5000)->closeButton()->addSuccess('Image updated successfully.');
        return redirect()->route('imagelisting', $image->gallery_id);
    }



    // Delete an image
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $imagePath = public_path('upload/gallery/' . $image->name);
        $thumbnailPath = public_path('upload/gallery/thumbnails/' . $image->thumbnail);
        if (!empty($image->name) && file_exists($imagePath)) {
            unlink($imagePath);
        }
        if (!empty($image->thumbnail) && file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
        }
        $image->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Image and thumbnail deleted successfully.');
        return redirect()->route('imagelisting');
    }

}
