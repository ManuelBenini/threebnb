<?php
namespace App\Http\Controllers\Api;
use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;

class PageController extends Controller
{
    public function show($id){
        $apartment = Apartment::with(['user', 'services'])->find($id);
        return response()->json($apartment);
    }

    public function getServices(){
        $services = Service::paginate(5);
        return response()->json($services);
    }

    public function apartmentsWithFilters($rooms, $beds, $distance, $lat2, $lon2){
        $apartments = Apartment::with(['services', 'sponsorships'])
        ->where([['rooms', '>=', $rooms], ['beds', '>=', $beds]])->get();

        $nearbyApartments = [];

        foreach ($apartments as $apartment) {

            $distanceBetween = $this->getDistance($apartment->latitude, $apartment->longitude, $lat2, $lon2);
            if ($distanceBetween <= $distance) {
                $nearbyApartments[]= $apartment;
            }
        }

        return response()->json($nearbyApartments);
    }

    public function sponsoredWithFilters($rooms, $beds, $distance, $lat2, $lon2){
        $apartments = Apartment::with(['services', 'sponsorships'])
        ->has('sponsorships')
        ->where([['rooms', '>=', $rooms], ['beds', '>=', $beds]])->get();

        $nearbyApartments = [];

        foreach ($apartments as $apartment) {

            $distanceBetween = $this->getDistance($apartment->latitude, $apartment->longitude, $lat2, $lon2);
            if ($distanceBetween <= $distance) {
                $nearbyApartments[]= $apartment;
            }
        }

        return response()->json($nearbyApartments);
    }

    public function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
        $earth_radius = 6371;
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
        return $d;
    }

    // public function getApartmentsPaginate(){
    //     $apartments = Apartment::paginate(8);
    //     return response()->json($apartments);
    // }

    // public function getSponsoredApartmentsPaginate(){
    //     $sponsoredApartment = Apartment::has('sponsorships')->paginate(4);
    //     return response()->json($sponsoredApartment);
    // }
}
