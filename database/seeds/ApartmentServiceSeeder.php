<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Service;

class ApartmentServiceSeeder extends Seeder
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
            $service = Service::inRandomOrder()->first()->id;

            if(!$apartment->services->contains($service)){
                $apartment->services()->attach($service);
            }
        }
    }
}
