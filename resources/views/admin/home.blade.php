@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <h1 class="mt-5">APPARTAMENTI DELL'UTENTE LOGGATO</h1>
    <div class="d-flex">
        @foreach ($userApartments as $apartment)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{File::exists('storage/'. $apartment->image) ? asset('storage/' . $apartment->image) : $apartment->image}}" alt="Card image cap">

                <div class="card-body">
                <p class="card-text">{{$apartment->title}}</p>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
