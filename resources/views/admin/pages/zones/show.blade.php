@extends('admin.master')

@section('content')

<h1>Zone Details</h1>
<hr>

<p><strong>ID:</strong> {{ $zone->id }}</p>
<p><strong>Name:</strong> {{ $zone->name }}</p>
<p><strong>Description:</strong> {{ $zone->description }}</p>
<p><strong>Price Range:</strong> {{ $zone->price_range }}</p>

<p><strong>Image:</strong></p>
<img src="{{ asset('images/zones/' . $zone->image) }}" width="200">

@endsection