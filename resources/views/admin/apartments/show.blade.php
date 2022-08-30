@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table m-5">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Stanze</th>
            <th scope="col">Letti</th>
            <th scope="col">Bagni</th>
            <th scope="col">Sqm</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Latitudine</th>
            <th scope="col">Longitudine</th>
            <th scope="col">Visibile in pagina pubblica</th>
          </tr>
        </thead>
        <tbody>
            <tr class="{{$apartment->visible === 1 ? 'table-success' : ''}}" >
                <th scope="row">{{$apartment->id}}</th>
              <th scope="row">{{$apartment->title}}</th>
              <td>{{$apartment->rooms}}</td>
              <td>{{$apartment->beds}}</td>
              <td>{{$apartment->bathrooms}}</td>
              <td>{{$apartment->sqm}}</td>
              <td>{{$apartment->address}}</td>
              <td>{{$apartment->latitude}}</td>
              <td>{{$apartment->longitude}}</td>
              <td>
                @if ($apartment->visible == 1)
                    Si
                @endif
              </td>
              <td>
                {{-- Modifica --}}
                <a class="btn btn-success" href="{{route('admin.apartments.edit', $apartment)}}">Cambia</a>

                {{-- Cancella --}}
                <form class="d-inline"
                action="{{route('admin.apartments.destroy', $apartment)}}"
                method="POST"
                onsubmit="return confirm('sei sicuro di voler eliminare l\'appartamento?')">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">Cancella</button>
                </form>
            </td>
            </tr>
        </tbody>
      </table>
</div>

@endsection
