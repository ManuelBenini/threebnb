@extends('layouts.app')
@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <h1>Modifica: {{$apartment->title}}</h1>
    <form action="{{route('admin.apartments.update', $apartment)}}" method="post">
        @csrf
        @method('PUT')

        {{-- Titolo --}}
        <div class="mb-3">
          <label
          for="title"
          class="form-label">Titolo</label>
          <input
          type="text"
          class="form-control
          @error('title') is-invalid @enderror" id="title"
          name="title"
          value="{{ old('title', $apartment->title) }}">

          @error('title')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>

        {{-- Stanze --}}
        <div class="mb-3">
          <label
          for="rooms"
          class="form-label">Quante stanze</label>
          <input
          type="text"
          class="form-control
          @error('rooms') is-invalid @enderror" id="rooms"
          name="rooms"
          value="{{ old('rooms', $apartment->rooms) }}">

          @error('rooms')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>

        {{-- Letti --}}
        <div class="mb-3">
            <label
            for="beds"
            class="form-label">Quanti letti?</label>
            <input
            type="text"
            class="form-control @error('beds') is-invalid @enderror"
            id="beds"
            name="beds"
            value="{{ old('beds', $apartment->beds) }}">

            @error('beds')
              <p class="error-msg">{{$message}}</p>
            @enderror
        </div>

        {{-- Bagni --}}
        <div class="mb-3">
            <label
            for="bathrooms"
            class="form-label">Quante bagni?</label>
            <input
            type="text"
            class="form-control @error('bathrooms') is-invalid @enderror"
            id="bathrooms"
            name="bathrooms"
            value="{{ old('bathrooms', $apartment->bathrooms) }}">

            @error('bathrooms')
              <p class="error-msg">{{$message}}</p>
            @enderror
        </div>

        {{-- SQM --}}
        <div class="mb-3">
            <label
            for="sqm"
            class="form-label">Metri quadri?</label>
            <input
            type="text"
            class="form-control
            @error('sqm') is-invalid @enderror" id="sqm" name="sqm"
            value="{{ old('sqm', $apartment->sqm) }}">

            @error('sqm')
              <p class="error-msg">{{$message}}</p>
            @enderror
        </div>

        {{-- Indirizzo --}}
        <div class="mb-3">
            <label
            for="address"
            class="form-label">Indirizzo</label>
            <input
            type="text"
            class="form-control @error('address') is-invalid @enderror"
            id="address"
            name="address"
            value="{{ old('address', $apartment->address) }}">

            @error('address')
              <p class="error-msg">{{$message}}</p>
            @enderror
        </div>

        {{-- Immmagine --}}
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $apartment->image) }}">

            @error('image')
              <p class="error-msg">{{$message}}</p>
            @enderror
        </div>

        {{-- <select class="form-select my-2" name="visible" aria-label=".form-select-lg example">
            <option value="1">Visible</option>
            <option value="0">-</option>
        </select> --}}
        <button type="submit" class="btn btn-primary">Modifica</button>
      </form>
</div>
@endsection
