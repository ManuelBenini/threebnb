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
        $apartment_counter = count(Apartment::all());

        for ($i=5; $i <= $apartment_counter; $i++) {
            $apartment = Apartment::where('id', '=', $i)->first();
            $sponsorship = Sponsorship::inRandomOrder()->first()->id;

            $apartment->sponsorships()->attach($sponsorship);

            if($sponsorship == 1){
                $apartment->sponsorships[0]->expired_at = Carbon::now()->addDays(1);
            }
            else if($sponsorship == 2){
                $apartment->sponsorships[0]->expired_at = Carbon::now()->addDays(3);
            }
            else{
                $apartment->sponsorships[0]->expired_at = Carbon::now()->addDays(6);
            }

            $apartment->push();
        }
    }
}
