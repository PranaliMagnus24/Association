<?php

namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $position = $request->get('position');

        $query = Category::query();

        // Search by name
        if ($search) {
            $query->where('category_name', 'like', '%' . $search . '%');
        }

        // Filter by position
        if ($position) {
            $query->where('position', $position);
        }

        // Paginate results
        $categories = $query->paginate(10);

        return view('admin.category.categorylist', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.category'); // Return the create form
    }

    // Store a newly created FAQ in the database
    public function store(Request $request)
{
    $request->validate([
        'category_name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',

        'status' => 'required|string|max:255',
    ]);

    Category::create($request->all());
    toastr()->timeOut(5000)->closeButton()->addSuccess('Category created successfully.!');
    return redirect()->route('categorylist');
}

    // Show the form for editing an existing FAQ

public function edit($id)
{
    $category = Category::findOrFail($id); // Retrieve the category by ID or throw a 404 error if not found
    return view('admin.category.categoryedit', compact('category')); // Pass the category data to the view
}
    // Update an existing category
    public function update(Request $request, $id)
    {
        $request->validate([
        'category_name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',

        'status' => 'required|string|max:255',

        ]);

        $category = Category::findOrFail($id); // Find the category by ID
        $category->update($request->all()); // Update the category data
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category updated successfully!');
        return redirect()->route('categorylist');
    }

    // Delete an category
    public function destroy($id)
    {
        $category = Category::findOrFail($id); // Find the category by ID
        $category->delete(); // Delete the category
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category deleted successfully!');
        return redirect()->route('categorylist');
    }


    public function storeOtherCategory(Request $request)
{
    $request->validate([
        'category_name' => 'required|string|max:255|unique:categories,category_name',
    ]);

    $category = Category::create([
        'category_name' => $request->category_name,
        'status' => 'active', // Default status
    ]);

    return response()->json([
        'success' => true,
        'category_id' => $category->id,
    ]);
}

}
