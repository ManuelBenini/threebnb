<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Sponsorship;
use App\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function getApartments(){
        $apartments = Apartment::with(['services', 'sponsorships'])->get();
        return response()->json($apartments);
    }

    public function getApartmentsPaginate(){
        $apartments = Apartment::paginate(8);
        return response()->json($apartments);
    }

    public function getSponsoredApartments(){
        $sponsoredApartment = Apartment::has('sponsorships')->with('services')->get();

        return response()->json($sponsoredApartment);
    }

    public function getSponsoredApartmentsPaginate(){
        $sponsoredApartment = Apartment::has('sponsorships')->paginate(4);

        return response()->json($sponsoredApartment);
    }

    public function show($id){
        $apartment = Apartment::find($id);
        return response()->json($apartment);
    }

    public function getServices(){
        $services = Service::paginate(5);

        return response()->json($services);
    }
}
