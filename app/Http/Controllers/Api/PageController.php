<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
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
}
