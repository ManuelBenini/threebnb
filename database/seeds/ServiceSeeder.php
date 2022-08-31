<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Wifi', 'Posto macchina', 'Piscina', 'Portineria', 'Sauna', 'Vista mare', 'Aria condizionata', 'BBQ', 'Camino', 'Idromassaggio'];

        foreach ($services as $service) {
            $new_service = new Service;
            $new_service->name = $service;
            $new_service->save();
        }
    }
}
