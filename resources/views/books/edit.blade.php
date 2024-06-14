<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Book</div>

                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $book->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" id="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editorials_id">Editorial</label>
                                <select name="editorials_id" class="form-control" id="editorials_id" required>
                                    @foreach($editorials as $editorial)
                                        <option value="{{ $editorial->id }}" {{ $book->editorials_id == $editorial->id ? 'selected' : '' }}>{{ $editorial->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="writers">Writers</label>
                                <select name="writers[]" class="form-control" id="writers" multiple required>
                                    @foreach($writers as $writer)
                                        <option value="{{ $writer->id }}" {{ in_array($writer->id, $book->writers->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $writer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', $book->quantity) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
