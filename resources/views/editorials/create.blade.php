@extends('layouts.app')

@section('content')
    <h1>Create Editorial</h1>
    <form action="{{ route('editorials.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection