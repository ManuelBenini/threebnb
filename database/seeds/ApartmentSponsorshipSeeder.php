<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;
use App\Apartment;
use Carbon\Carbon;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $apartments = config('apartments');

        foreach ($apartments as $defaultApartment) {

            $apartment = Apartment::find($defaultApartment['id']);

            $apartment->sponsorships()->attach($defaultApartment['sponsorships']);

            if($defaultApartment['sponsorships'] == 1){
                $apartment->sponsorships[0]->expired_at = Carbon::now()->addDays(1);
            }
            else if($defaultApartment['sponsorships'] == 2){
                $apartment->sponsorships[0]->expired_at = Carbon::now()->addDays(3);
            }
            else{
                $apartment->sponsorships[0]->expired_at = Carbon::now()->addDays(6);
            }

            $apartment->push();

        }
    }
}
