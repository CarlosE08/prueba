<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        $editorials = Editorial::all();
        return view('editorials.index', compact('editorials'));
    }

    public function create()
    {
        return view('editorials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Editorial::create($request->all());

        return redirect()->route('editorials.index')->with('success', 'Editorial created successfully.');
    }

    public function show(Editorial $editorial)
    {
        return view('editorials.show', compact('editorial'));
    }

    public function edit(Editorial $editorial)
    {
        return view('editorials.edit', compact('editorial'));
    }

    public function update(Request $request, Editorial $editorial)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $editorial->update($request->all());

        return redirect()->route('editorials.index')->with('success', 'Editorial updated successfully.');
    }

    public function destroy(Editorial $editorial)
    {
        $editorial->delete();

        return redirect()->route('editorials.index')->with('success', 'Editorial deleted successfully.');
    }
}