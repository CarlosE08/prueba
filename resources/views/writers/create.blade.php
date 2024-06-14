<!-- resources/views/writers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Writer</div>

                    <div class="card-body">
                        <form action="{{ route('writers.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="books">Books</label>
                                <select name="books[]" class="form-control" id="books" multiple required>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Writer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
