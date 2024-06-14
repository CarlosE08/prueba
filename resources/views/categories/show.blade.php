@extends('layouts.app')

@section('content')
    <h1>Category: {{ $category->name }}</h1>
    <p>ID: {{ $category->id }}</p>
    <p>Name: {{ $category->name }}</p>
    <p>Created At: {{ $category->created_at }}</p>
    <a href="{{ route('categories.index') }}">Back to List</a>
@endsection
