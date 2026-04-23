@extends('admin.master')

@section('content')
    <h1>Attraction Details</h1>
    <hr>
    <p><strong>ID:</strong> {{ $attraction->id }}</p>
    <p><strong>Name:</strong> {{ $attraction->name }}</p>
    <p><strong>Description:</strong> {{ $attraction->description }}</p>
    <p><strong>Price Range:</strong> {{ $attraction->price_range }}</p>
    <p><strong>Image:</strong></p>
    <img src="{{ asset('images/attractions/' . $attraction->image) }}" width="200">
@endsection