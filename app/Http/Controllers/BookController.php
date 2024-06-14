<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Writer;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%$search%")
                ->orWhereHas('category', function($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
                ->orWhereHas('editorial', function($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                });
        }

        $books = $query->with(['category', 'editorial', 'writers'])->get();

        return view('books.index', compact('books'));
    }
    
    public function create()
    {
        $categories = Category::all();
        $editorials = Editorial::all();
        $writers = Writer::all();
        return view('books.create', compact('categories', 'editorials', 'writers'));
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());
        $book->writers()->sync($request->writers);
        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $book = Book::with('category', 'editorial', 'writers')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $editorials = Editorial::all();
        $writers = Writer::all();
        return view('books.edit', compact('book', 'categories', 'editorials', 'writers'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        $book->writers()->sync($request->writers);
        return redirect()->route('books.index');
    }
    
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
                         ->with('success', 'Book deleted successfully');
    }

}
