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
        for ($i=0; $i < 50; $i++) { 
            $apartment = Apartment::inRandomOrder()->first();
            $sponsorship = Sponsorship::inRandomOrder()->first();

            if(!$apartment->sponsorships->contains($sponsorship)){
                $apartment->sponsorships()->attach($sponsorship);
            }
        }
    }
}
