@extends('layouts.app')

@section('content')

<div class="container">
    {{-- @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
    @endif --}}

    <form action="{{route('admin.apartments.store')}}" method="POST">
        @csrf
        
        <div class="mb-3">
          <label for="nome" class="form-label">Apartment</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
          @error('title')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Rooms</label>
          <input type="text" class="form-control @error('rooms') is-invalid @enderror" id="rooms" name="rooms" value="{{ old('rooms') }}">
          @error('rooms')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Beds</label>
          <input type="text" class="form-control @error('beds') is-invalid @enderror" id="beds" name="beds" value="{{ old('beds') }}">
          @error('beds')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Bathrooms</label>
          <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">
          @error('bathrooms')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Sqm</label>
          <input type="text" class="form-control @error('sqm') is-invalid @enderror" id="sqm" name="sqm" value="{{ old('sqm') }}">
          @error('sqm')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Address</label>
          <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
          @error('address')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Latitude</label>
          <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ old('latitude') }}">
          @error('latitude')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Longitude</label>
          <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ old('longitude') }}">
          @error('longitude')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Image</label>
          <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
          @error('image')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="prezzo" class="form-label">Image original name</label>
          <input type="text" class="form-control @error('image_original_name') is-invalid @enderror" id="image_original_name" name="image_original_name" value="{{ old('image_original_name') }}">
          @error('image_original_name')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
      </form>
</div>

@endsection