<?php
namespace App\Http\Controllers\Api;
use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class PageController extends Controller
{
    public function show($id){
        $apartment = Apartment::find($id);
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

        $data = $this->paginate($nearbyApartments);

        return response()->json($data);
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

        $data = $this->paginate($nearbyApartments);

        return response()->json($data);
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

    public function paginate($items, $perPage = 4, $page = null, $options = []){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    // public function apWithServices(){
    //     $services = [1,2,5,7,4];

    //     $apartments = Apartment::with('services');

    //     foreach($services as $service) {
    //         $apartments->whereHas('services', function ($query) use($service) {
    //             $query->where('id', $service);
    //         });
    //     }

    //     return response()->json($apartments->get());
    // }
}
