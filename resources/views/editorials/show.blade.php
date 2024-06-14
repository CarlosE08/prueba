@extends('layouts.app')

@section('content')
    <h1>Editorial: {{ $editorial->name }}</h1>
    <p>ID: {{ $editorial->id }}</p>
    <p>Name: {{ $editorial->name }}</p>
    <p>Created At: {{ $editorial->created_at }}</p>
    <a href="{{ route('editorials.index') }}" class="btn btn-secondary">Back to List</a>
@endsection