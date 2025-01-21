<?php

namespace App\Http\Controllers;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::paginate(5); // Fetch all FAQs
        return view('admin.position.index', compact('positions')); // Pass data to the index view
    }

    // Show the form for creating a new FAQ
    public function add()
    {
        return view('admin.position.add'); // Return the create form
    }

    // Store a newly created FAQ in the database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ]);

    Position::create($request->all()); // Save the Cposition to the database
    toastr()->timeOut(5000)->closeButton()->addSuccess('Position created successfully.');
    return redirect()->route('position.index');
}

    // Show the form for editing an existing FAQ

public function edit($id)
{
    $position = Position::findOrFail($id); // Retrieve the position by ID or throw a 404 error if not found
    return view('admin.position.edit', compact('position')); // Pass the position data to the view
}
    // Update an existing position
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $position = Position::findOrFail($id); // Find the position by ID
        $position->update($request->all()); // Update the position data
        toastr()->timeOut(5000)->closeButton()->addSuccess('Position updated successfully.');
        return redirect()->route('position.index');
    }

    // Delete an position
    public function delete($id)
    {
        $position = Position::findOrFail($id); // Find the position by ID
        $position->delete(); // Delete the position
        toastr()->timeOut(5000)->closeButton()->addSuccess('Position deleted successfully.');
        return redirect()->route('position.index');
    }
}
