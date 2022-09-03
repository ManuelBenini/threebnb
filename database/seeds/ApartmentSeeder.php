<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {
            $new_apartment = new Apartment();
            $new_apartment->title = $faker->title;
            $new_apartment->rooms = $faker->numberBetween(2, 10);
            $new_apartment->beds = $faker->numberBetween(1, 10);
            $new_apartment->bathrooms = $faker->numberBetween(1, 10);
            $new_apartment->sqm = $faker->numberBetween(10, 150);
            $new_apartment->address = $faker->address();
            $new_apartment->latitude = $faker->latitude(-90, 90);
            $new_apartment->longitude = $faker->longitude(-180, 180);
            $new_apartment->image = $faker->imageUrl(400, 400, 'houses', true);
            $new_apartment->image_original_name = $faker->city();
            $new_apartment->visible = $faker->boolean();
            $new_apartment->save();
        }

            $new_apartment = new Apartment();
            $new_apartment->user_id = User::inRandomOrder()->first()->id;
            $new_apartment->title = 'Appartamento sulla spiaggia';
            $new_apartment->rooms = 5;
            $new_apartment->beds = 4;
            $new_apartment->bathrooms = 2;
            $new_apartment->sqm = 120;
            $new_apartment->address = 'Via Cesare Battisti Bagheria';
            $new_apartment->latitude = 38.07549 ;
            $new_apartment->longitude = 13.50441;
            $new_apartment->image = $faker->imageUrl(400, 400, 'houses', true);
            $new_apartment->image_original_name = $faker->city();
            $new_apartment->visible = 1;
            $new_apartment->save();

            $new_apartment = new Apartment();
            $new_apartment->user_id = User::inRandomOrder()->first()->id;
            $new_apartment->title = 'Appartamento sui monti';
            $new_apartment->rooms = 6;
            $new_apartment->beds = 3;
            $new_apartment->bathrooms = 1;
            $new_apartment->sqm = 120;
            $new_apartment->address = 'Via Alessandro Lamarmora Trieste';
            $new_apartment->latitude = 44.35024;
            $new_apartment->longitude = 9.22786;
            $new_apartment->image = $faker->imageUrl(400, 400, 'houses', true);
            $new_apartment->image_original_name = $faker->city();
            $new_apartment->visible = 1;
            $new_apartment->save();
    }
}
