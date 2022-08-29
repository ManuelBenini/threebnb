<?php

use App\Apartment;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $new_apartment = new Apartment();
            $new_apartment->title = 'blabla';
            $new_apartment->rooms = 2;
            $new_apartment->beds = 2;
            $new_apartment->bathrooms = 2;
            $new_apartment->sqm = 5;
            $new_apartment->address = 'Via C. Battisti';
            $new_apartment->latitude = 12.34567891;
            $new_apartment->longitude = 12.345678912;
            $new_apartment->image = 'immagine';
            $new_apartment->image_original_name = 'nome originale';
            $new_apartment->visible = 1;
            $new_apartment->save();
    }
}
