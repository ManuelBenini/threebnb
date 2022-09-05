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


    <!-- Nuova sezione Dashboard -->
    <div>

    
    <div class="dashboard container-fluid">

        <div class="row mt-5 d-flex justify-content-center">
            <div class="user col-lg-2 col-sm-12">
                <div class="col text-center mt-3 profile">
                    <ul>
                        <li><img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Unknown-person.gif" alt=""></li>
                        <li><h4>{{ Auth::user()->name }}</h4></li>
                        <li><a href="#">MODIFICA PROFILO</a></li>
                    </ul>
                </div>

            </div>


            <div class="col-9 ">
                @foreach ($userApartments as $apartment)
                <div class="colonnamiei col-l-4 col-sm-6 col-12 app text-center py-2" v-for="(apartment,  index) in apartmentsList" :key="`apartment${index}`">

                    <h4>{{$apartment->title}}</h4>
                    <a href="{{route('admin.apartments.show', $apartment)}}">
                        <img src="{{File::exists('storage/'. $apartment->image) ? asset('storage/' . $apartment->image) : $apartment->image}}" alt="">
                    </a>

                    <ul class="d-flex justify-content-around">
                        <li>
                            <a class="visualizza bottinte" href="{{route('admin.apartments.show', $apartment)}}">Visualizza</a>
                        </li>
                        <li>
                            <a class="statistiche bottinte" href="">Statistiche</a>
                        </li>
                        <li>
                            <a class="modifica bottinte" href="{{route('admin.apartments.edit', $apartment)}}">Modifica</a>
                        </li>
                    </ul>

                </div>
                @endforeach

                <div class="col-12 d-flex justify-content-center my-3">
                    
                </div>
            </div>



        </div>

    </div>

    </div>

</div>
@endsection
