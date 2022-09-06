@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Nuova sezione Dashboard -->
   
    
    <div class="dashboard container-fluid">

        <div class="row mb-5 d-flex justify-content-center">
            <div class="user col-lg-2 col-md-6 col-sm-12">
                <div class="col text-center mt-3 profile">
                    <ul>
                        <li><img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Unknown-person.gif" alt=""></li>
                        <li><h4>{{ Auth::user()->name }}</h4></li>
                        <li><h4>{{ Auth::user()->surname }}</h4></li>
                    </ul>
                </div>

            </div>



            <div class="col-9 ">
                <div class="divtitolo">
                    <h1 class="titolo">I MIEI APPARTAMENTI</h1>
                </div>
                @foreach ($userApartments as $apartment)
                <div class="colonnamiei col-lg-6 col-md-8 col-sm-12 col-12 app text-center py-2" v-for="(apartment,  index) in apartmentsList" :key="`apartment${index}`">

                    <h4>{{$apartment->title}}</h4>
                    <a href="{{route('admin.apartments.show', $apartment)}}">
                        <img src="{{File::exists('storage/'. $apartment->image) ? asset('storage/' . $apartment->image) : $apartment->image}}" alt="">
                    </a>

                    <ul class="d-flex justify-content-around">
                        <li>
                            <a class="visualizza bottinte" href="{{route('admin.apartments.show', $apartment)}}">Visualizza</a>
                        </li>
                        <li>
                            <a class="statistiche bottinte" href="">Sponsorizza</a>
                        </li>
                        <li>
                            <a class="modifica bottinte" href="{{route('admin.apartments.edit', $apartment)}}">Modifica</a>
                        </li>
                    </ul>

                </div>
                @endforeach

                
            </div>

            <div class="col-12 d-flex justify-content-center my-3">
                <a class="homebotton text-center" href="{{ route('admin.apartments.create') }}">
                    Crea nuovo appartamento
                </a>
            </div>

            <div>
                
            </div>

        </div>

    </div>

    

</div>
@endsection
