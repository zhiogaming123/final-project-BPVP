@extends('admin.master')

@section('content')

<h1>Edit Zone</h1>
<hr>

<form action="{{ route('admin.zones.update', $zone->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
               name="name" value="{{ old('name', $zone->name) }}" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror"
                  name="description" required>{{ old('description', $zone->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Price Range</label>
        <input type="text" class="form-control @error('price_range') is-invalid @enderror"
               name="price_range" value="{{ old('price_range', $zone->price_range) }}" required>
        @error('price_range')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror"
               name="image" value="{{ old('image', $zone->image) }}" required>
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <br>
        <img src="{{ asset('images/zones/' . $zone->image) }}" width="120">
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection