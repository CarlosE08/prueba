@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Writers</h1>

    <a href="{{ route('writers.create') }}" class="btn btn-primary mb-3">Add New Writer</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Books</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($writers as $writer)
                <tr>
                    <td>{{ $writer->name }}</td>
                    <td>
                        @foreach ($writer->books as $book)
                            {{ $book->title }}@if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('writers.show', $writer->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('writers.edit', $writer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('writers.destroy', $writer->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No writers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
