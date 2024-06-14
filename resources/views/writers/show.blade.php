<!-- resources/views/writers/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Writer Details</div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $writer->name }}</p>
                        <p><strong>Books:</strong>
                            @foreach ($writer->books as $book)
                                <span class="badge badge-secondary">{{ $book->title }}</span>
                            @endforeach
                        </p>
                        <p><strong>Created At:</strong> {{ $writer->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $writer->updated_at }}</p>

                        <a href="{{ route('writers.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
