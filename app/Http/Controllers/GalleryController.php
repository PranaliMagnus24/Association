<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Str;
use File;
class GalleryController extends Controller
{
    public function index()
    {
        $images = Image::all();
        $gallerys = Gallery::all();
        return view('admin.gallery.gallerylist', compact('gallerys', 'images'));
    }

    public function create()
    {
        $images = Image::all();
        $gallery = new \stdClass();
        $gallery->date = null;
        return view('admin.gallery.gallery', compact('gallery', 'images'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'gallery' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        $path = null;
        if ($request->hasFile('gallery')) {
            $file = $request->file('gallery');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('upload'), $filename); // Save to 'public/upload' directory
        }


        Gallery::create([
            'name' => $validated['name'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'gallery_path' => $path ? 'upload/' . $filename : null,
        ]);


        return redirect()->back()->with('success', 'Gallery saved successfully!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->gallery = json_decode($gallery->gallery, true);
        return view('admin.gallery.galleryedit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'gallery' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $gallery = Gallery::findOrFail($id);

        // Handle file upload if a new file is uploaded
        if ($request->hasFile('gallery')) {
            // Delete the old file if it exists
            if (File::exists(public_path($gallery->gallery_path))) {
                File::delete(public_path($gallery->gallery_path));
            }

            // Upload the new file
            $file = $request->file('gallery');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('upload'), $filename);

            // Update the file path
            $gallery->gallery_path = 'upload/' . $filename;
        }

        // Update the rest of the fields
        $gallery->update([
            'name' => $validated['name'],
            'date' => $validated['date'],
            'location' => $validated['location'],
        ]);

        // Redirect back with a success message
        return redirect()->route('gallerylist')->with('success', 'Gallery updated successfully!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete all associated image files
        $images = json_decode($gallery->gallery, true);
        if ($images) {
            foreach ($images as $image) {
                $filePath = public_path('upload/' . $image);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        }

        $gallery->delete(); // Delete the gallery record

        return redirect()->route('gallerylist')->with('success', 'Gallery deleted successfully.');
    }

    // Delete an image from the gallery
    public function deleteImage($galleryId, $image)
    {
        $gallery = Gallery::findOrFail($galleryId);

        // Decode the gallery images
        $images = json_decode($gallery->gallery, true);

        // Remove the image from the array
        $images = array_filter($images, function ($img) use ($image) {
            return $img !== $image;
        });

        // Reindex and save the updated images
        $gallery->gallery = json_encode(array_values($images));
        $gallery->save();

        // Delete the image file from the server
        $filePath = public_path('upload/' . $image);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        return redirect()->route('gallery.edit', $galleryId)->with('success', 'Image deleted successfully.');
    }
    public function show($id)
    {

        $gallery = Gallery::findOrFail($id);
        $images = $gallery->images;
    $gallery->gallery = json_decode($gallery->gallery, true); // Decode gallery images
    $images = Image::where('gallery_id', $id)->get(); // Get images only from the selected gallery

    // Pass decoded images to the view
    return view('admin.gallery.galleryshow', compact('gallery', 'images'));
    }

    public function addImageToGallery(Request $request)
    {
        $validated = $request->validate([
            'gallery_id' => 'required|exists:galleries,id',
            'image' => 'required|string',
        ]);

        $gallery = Gallery::find($validated['gallery_id']);
        $images = json_decode($gallery->gallery, true);

        if (!in_array($validated['image'], $images)) {
            $images[] = $validated['image']; // Add the selected image
        }

        $gallery->gallery = json_encode($images);
        $gallery->save();

        return redirect()->route('gallery.show', $gallery->id)->with('success', 'Image added to gallery successfully.');
    }
}
