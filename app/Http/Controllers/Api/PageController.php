<?php
namespace App\Http\Controllers\Api;
use App\Apartment;
use App\Service;
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Pagination\LengthAwarePaginator;
// use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Collection;

class PageController extends Controller
{
    public function apartmentsWithFilters($rooms, $beds, $distance, $lat2, $lon2, $servicesList, $sponsored){

        // Se il parametro "sponsored" è vero (1), stampo gli appartamenti sponsorizzati
        if($sponsored){
            $apartments = Apartment::with(['services', 'sponsorships'])
            ->has('sponsorships')
            ->where([['rooms', '>=', $rooms], ['beds', '>=', $beds]]);
        }

        // Se il parametro "sponsored" è falso (0), stampo tutti gli appartamenti
        else{
            $apartments = Apartment::with(['services', 'sponsorships'])
            ->where([['rooms', '>=', $rooms], ['beds', '>=', $beds]]);
        }

        // Se il parametro "servicesList" è uguale a 0, non filtro gli appartamenti per servizi
        if(!empty($servicesList)){
            $services = explode( ',', $servicesList );

            foreach($services as $service) {
                $apartments->whereHas('services', function ($query) use($service) {
                    $query->where('id', $service);
                });
            }
        }

        // Dichiaro un array che verrà riempito dagli appartamenti che rispettano la condizione "distanza"
        $nearbyApartments = [];
        foreach ($apartments->get() as $apartment) {

            $distanceBetween = $this->getDistance($apartment->latitude, $apartment->longitude, $lat2, $lon2);
            if ($distanceBetween <= $distance) {
                $nearbyApartments[] = $apartment;
            }
        }

        // Per inserire l'impaginazione, richiamare il metodo paginate(array) presente in questo file
        // $data = $this->paginate($nearbyApartments);

        // Ritorno l'array degli appartamenti vicini che, essendo stato riempito da un forEach di $apartments, possiede già tutti i filtri precedenti
        return response()->json($nearbyApartments);
    }

    public function sponsoredApartments(){
        $apartments = Apartment::with('sponsorships')
            ->has('sponsorships')
            ->paginate(4);

        return response()->json($apartments);
    }

    public function show($id){
        $apartment = Apartment::with(['user', 'services'])->find($id);
        return response()->json($apartment);
    }

    public function getServices(){
        $services = Service::paginate(5);
        return response()->json($services);
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

    // public function paginate($items, $perPage = 4, $page = null, $options = []){
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    //     #APPUNTI
    //     importare questi dentro il file in cui eseguire la paginazione.
    //     use Illuminate\Pagination\LengthAwarePaginator;
    //     use Illuminate\Pagination\Paginator;
    //     use Illuminate\Support\Collection;

    // }

}
