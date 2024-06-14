<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use App\Models\Book;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::with('books')->get();
        return view('writers.index', compact('writers'));
    }

    public function create()
    {
        $books = Book::all();
        return view('writers.create', compact('books'));
    }

    public function store(Request $request)
    {
        $writer = Writer::create($request->all());
        $writer->books()->sync($request->books);
        return redirect()->route('writers.index');
    }

    public function show($id)
    {
        $writer = Writer::with('books')->findOrFail($id);
        return view('writers.show', compact('writer'));
    }

    public function edit($id)
    {
        $writer = Writer::findOrFail($id);
        $books = Book::all();
        return view('writers.edit', compact('writer', 'books'));
    }

    public function update(Request $request, $id)
    {
        $writer = Writer::findOrFail($id);
        $writer->update($request->all());
        $writer->books()->sync($request->books);
        return redirect()->route('writers.index');
    }

    public function destroy($id)
    {
        $writer = Writer::findOrFail($id);
        $writer->delete();

        return redirect()->route('writers.index')
                         ->with('success', 'Writer deleted successfully');
    }
}
