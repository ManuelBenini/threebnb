<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;
use App\Apartment;

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

        for ($i=1; $i <= $apartment_counter; $i++) {
            $apartment = Apartment::where('id', '=', $i)->first();
            $sponsorship = Sponsorship::inRandomOrder()->first()->id;

            $apartment->sponsorships()->attach($sponsorship);
        }
    }
}