<?php

namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
class SubCategoryController extends Controller
{
    public function index(Request $request)
{
    $search = $request->get('search');
    $status = $request->get('status');

    $query = SubCategory::query();  // Use SubCategory model query

    // Apply search by subcategory_name
    if ($search) {
        $query->where('subcategory_name', 'like', '%' . $search . '%');
    }

    // Apply status filter
    if ($status) {
        $query->where('status', $status);
    }

    // Paginate the results
    $subcategories = $query->paginate(20);

    // Return the view with paginated data
    return view('admin.subcategory.subcategorylist', compact('subcategories'));
}


    // Show the create form
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.subcategory.subcategory', compact('categories')); // Ensure 'subcategory' view exists
    }

    // Store a new subcategory
    public function store(Request $request)
    {

        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        SubCategory::create($request->all());
        toastr()->timeOut(5000)->closeButton()->addSuccess('SubCategory created successfully!');
        return redirect()->route('subcategorylist');
    }

    // Show the form for editing an existing subcategory
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategory.subcategoryedit', compact('subcategory','categories'));
    }

    // Update an existing subcategory
    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->all());
        toastr()->timeOut(5000)->closeButton()->addSuccess('SubCategory updated successfully!');
        return redirect()->route('subcategorylist');
    }

    // Delete an existing subcategory
    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('SubCategory deleted successfully!');
        return redirect()->route('subcategorylist');
    }
}
