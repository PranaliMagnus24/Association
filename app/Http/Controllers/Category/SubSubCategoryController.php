<?php

namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;

class SubSubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status'); // Ensure it's 'status' here, not 'Status'

        $query = SubSubCategory::with('category', 'subcategory'); // Load related categories and subcategories

        // Search by name
        if ($search) {
            $query->where('subsubcategory_name', 'like', '%' . $search . '%');
        }

        // Filter by status
        if ($status) {
            $query->where('status', $status);  // Make sure this matches the form input name
        }

        // Paginate results
        $subsubcategories = $query->paginate(3);

        // Pass $subsubcategories to the view
        return view('admin.subsubcategory.index', compact('subsubcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all(); // Corrected: Fetching subcategories from the SubCategory model
        return view('admin.subsubcategory.add', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'subsubcategory_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|integer', // Ensure category exists
            'subcategory_id' => 'required|integer', // Ensure subcategory exists
            'status' => 'required|string|max:255',
        ]);

        // Create the SubSubCategory
        SubSubCategory::create($request->all());

        toastr()->timeOut(5000)->closeButton()->addSuccess('Sub SubCategory created successfully!');
        return redirect()->route('subsubcategorylist');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('admin.subsubcategory.edit', compact('subsubcategory', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subsubcategory_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|integer', // Ensure category exists
            'subcategory_id' => 'required|integer', // Ensure subcategory exists
            'status' => 'required|string|max:255',
        ]);

        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsubcategory->update($request->all());
        toastr()->timeOut(5000)->closeButton()->addSuccess('Sub SubCategory updated successfully!');
        return redirect()->route('subsubcategorylist');
    }

    public function destroy($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsubcategory->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Sub SubCategory deleted successfully!');
        return redirect()->route('subsubcategorylist');
    }
}
