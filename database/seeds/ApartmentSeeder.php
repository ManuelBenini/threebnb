<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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
            $new_apartment->latitude = $faker->latitude($min = -90, $max = 90);
            $new_apartment->longitude = $faker->longitude($min = -180, $max = 180);
            $new_apartment->image = $faker->imageUrl(640, 480, 'houses', true);
            $new_apartment->image_original_name = $faker->city();
            $new_apartment->visible = $faker->boolean();
            $new_apartment->save();
        }
    }
}
