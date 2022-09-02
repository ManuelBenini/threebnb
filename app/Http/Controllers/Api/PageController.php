<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Sponsorship;
use App\User;

class PageController extends Controller
{
    public function getApartments(){
        $apartments = Apartment::all();
        return response()->json($apartments);
    }

    public function show($id){
        $apartment = Apartment::find($id);
        return response()->json($apartment);
    }

    public function getSponsoredApartments(){
        $sponsoredApartment = Apartment::has('sponsorships')->get();

        return response()->json($sponsoredApartment);
    }
}
