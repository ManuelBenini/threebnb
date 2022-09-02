<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\User;

class PageController extends Controller
{
    public function index(){
        $apartments = Apartment::all();
        return response()->json($apartments);
    }

    public function show($id){
        $apartment = Apartment::find($id);
        return response()->json($apartment);
    }

    // public function sqm($sqm){
    //     $apartment = Apartment::where('sqm', '=', $sqm)->get();
    //     return response()->json($apartment);
    // }

    public function search($radius){
        $apartments = Apartment::all();
        $nearbyApartments = [];
        foreach ($apartments as $apartment) {
            $distance = $this->getDistanceBetweenTwoPoints([$apartment->latitude, $apartment->longitude], [45.633331, 13.800000]);

            if($distance < $radius){
                array_push($nearbyApartments, $apartment);
            }
        }

        var_dump($nearbyApartments);
        
        // $apartment = Apartment::where([['beds', '=', $beds], ['rooms', '=', $rooms]])->get();
        return response()->json($nearbyApartments);
    }

    // public function map($address){
    //     $coordinates = $address
    // }

    public function getDistanceBetweenTwoPoints($point1, $point2){
        // array of lat-long i.e  $point1 = [lat,long]
        $earthRadius = 6371;  // earth radius in km
        $point1Lat = $point1[0];
        $point2Lat =$point2[0];
        $deltaLat = deg2rad($point2Lat - $point1Lat);
        $point1Long =$point1[1];
        $point2Long =$point2[1];
        $deltaLong = deg2rad($point2Long - $point1Long);
        $a = sin($deltaLat/2) * sin($deltaLat/2) + cos(deg2rad($point1Lat)) * cos(deg2rad($point2Lat)) * sin($deltaLong/2) * sin($deltaLong/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    
        $distance = $earthRadius * $c;
        return $distance;    // in km
    }
}
