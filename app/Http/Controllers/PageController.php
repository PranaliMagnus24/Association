<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all(); // Fetch all FAQs
        return view('admin.page.pagelist', compact('pages')); // Pass data to the index view
    }

    // Show the form for creating a new FAQ
    public function create()
    {
        return view('admin.page.page'); // Return the create form
    }

    // Store a newly created FAQ in the database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Page::create($request->all()); // Save the Cpage to the database
    toastr()->timeOut(5000)->closeButton()->addSuccess('Page created successfully.');
    return redirect()->route('pagelist');
}

    // Show the form for editing an existing FAQ

public function edit($id)
{
    $page = Page::findOrFail($id); // Retrieve the page by ID or throw a 404 error if not found
    return view('admin.page.pageedit', compact('page')); // Pass the page data to the view
}
    // Update an existing page
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $page = Page::findOrFail($id); // Find the page by ID
        $page->update($request->all()); // Update the page data
        toastr()->timeOut(5000)->closeButton()->addSuccess('Page updated successfully.');
        return redirect()->route('pagelist');
    }

    // Delete an page
    public function destroy($id)
    {
        $page = Page::findOrFail($id); // Find the page by ID
        $page->delete(); // Delete the page
        toastr()->timeOut(5000)->closeButton()->addSuccess('Page deleted successfully.');
        return redirect()->route('pagelist');
    }
}
