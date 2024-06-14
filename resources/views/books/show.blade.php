<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Book Details</div>

                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $book->title }}</p>
                        <p><strong>Category:</strong> {{ $book->category->name }}</p>
                        <p><strong>Editorial:</strong> {{ $book->editorial->name }}</p>
                        <p><strong>Writers:</strong>
                            @foreach ($book->writers as $writer)
                                <span class="badge badge-secondary">{{ $writer->name }}</span>
                            @endforeach
                        </p>
                        <p><strong>Quantity:</strong> {{ $book->quantity }}</p>
                        <p><strong>Created At:</strong> {{ $book->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $book->updated_at }}</p>

                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
