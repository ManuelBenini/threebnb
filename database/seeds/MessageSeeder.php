<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $new_message = new Message();
            $new_message->apartment_id = $faker->numberBetween(1, 20);
            $new_message->text = $faker->text(150);
            $new_message->email = $faker->email();
            $new_message->save();
        }
    }
}
