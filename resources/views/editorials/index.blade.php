@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editorials</h1>

    <a href="{{ route('editorials.create') }}" class="btn btn-primary mb-3">Add New Editorial</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($editorials as $editorial)
                <tr>
                    <td>{{ $editorial->name }}</td>
                    <td class="text-right">
                        <a href="{{ route('editorials.show', $editorial->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('editorials.edit', $editorial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('editorials.destroy', $editorial->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No editorials found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
