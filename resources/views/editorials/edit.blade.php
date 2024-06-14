@extends('layouts.app')

@section('content')
    <h1>Edit Editorial</h1>
    <form action="{{ route('editorials.update', $editorial->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $editorial->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
