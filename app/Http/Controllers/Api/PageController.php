<?php
namespace App\Http\Controllers\Api;
use App\Apartment;
use App\Service;
use App\Http\Controllers\Controller;
use App\Message;
use App\View;
use Illuminate\Http\Request;
use DateTime;

class PageController extends Controller
{
    public function checkSponsorExpiryTime(){
        $apartments = Apartment::has('sponsorships')->with('sponsorships')->get();

        $date = '';

        foreach ($apartments as $apartment) {
            $date = new DateTime($apartment->sponsorships[0]->expired_at);

            // var_dump($date);
            // var_dump($date->getTimestamp());
            // var_dump(strtotime(date('Y-m-d H:i:s')));

            if($date->getTimestamp() < strtotime(date('Y-m-d H:i:s'))){
                $apartment = Apartment::find($apartment->id);

                $apartment->sponsorships()->detach($apartment->sponsorships[0]->id);
            }

        }

        return response()->json($apartments);
    }

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
            ->paginate(5);

        return response()->json($apartments);
    }

    public function show($id){
        $apartment = Apartment::with(['user', 'services', 'sponsorships'])->find($id);
        return response()->json($apartment);
    }

    public function getServices(){
        $services = Service::paginate(5);
        return response()->json($services);
    }

    public function getApartments(){
        $apartments = Apartment::all();

        return response()->json(count($apartments));
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

    public function sendMessage(Request $request){
        $formData = $request;

        $new_message = new Message();
        $new_message->apartment_id = $formData->appId;
        $new_message->text = $formData->text;
        $new_message->email = $formData->email;
        $new_message->save();

        return response()->json($formData);
    }

    public function getMessages($apartmentId){
        $messages = Message::where('apartment_id', $apartmentId)->get();

        return response()->json($messages);
    }

    public function addView(Request $request){
        $isIpPresent = View::where([['ip', $request->clientIp], ['apartment_id', $request->apartmentId]])->get();

        if(count($isIpPresent) == 0){
            $new_view = new View();
            $new_view->apartment_id = $request->apartmentId;
            $new_view->ip = $request->clientIp;
            $new_view->save();
        }

        return response()->json($request);
    }

    public function getApartmentViews($apartmentId){
        $views = View::where('apartment_id', $apartmentId)->get();

        return response()->json($views);
    }

    public function getAllViews(){
        $views = View::all();

        return response()->json($views);
    }
}
