<?php

namespace App\Http\Controllers;
use App\Models\CType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = CType::all(); // Fetch all FAQs
        return view('admin.ctype.typelist', compact('types')); // Pass data to the index view
    }

    // Show the form for creating a new FAQ
    public function create()
    {
        return view('admin.ctype.ctype'); // Return the create form
    }

    // Store a newly created FAQ in the database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    CType::create($request->all()); // Save the CType to the database
    toastr()->timeOut(5000)->closeButton()->addSuccess('Type created successfully.');
    return redirect()->route('typelist');
}

    // Show the form for editing an existing FAQ
    public function edit($id)
    {
        $type = CType::findOrFail($id); // Find the FAQ by ID
        return view('admin.ctype.typeedit', compact('type')); // Pass data to the edit view
    }

    // Update an existing type
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $type = CType::findOrFail($id); // Find the type by ID
        $type->update($request->all()); // Update the type data
        toastr()->timeOut(5000)->closeButton()->addSuccess('Type updated successfully.');
        return redirect()->route('typelist');
    }

    // Delete an type
    public function destroy($id)
    {
        $type = CType::findOrFail($id); // Find the type by ID
        $type->delete(); // Delete the type
        toastr()->timeOut(5000)->closeButton()->addSuccess('Type deleted successfully.');
        return redirect()->route('typelist');
    }
}
