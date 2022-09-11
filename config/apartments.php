<?php

return $apartments = [
	[
        "user_id" => 1,
        "id" =>1,
		"title" => "Appartamento vista Cattedrale",
		"rooms" => 20,
		"beds" => 10,
		"bathrooms" => 5,
		"sqm" => 50,
		"address" => "Via Vittorio Emanuele, 90134 Palermo, Italia",
		"latitude" => 38.11392,
		"longitude" => 13.35709,
		"image" => '/images/Palermo.jpg',
		"image_original_name" => 'Palermo.jpg',
		"visible" => true,
        "services" => [1,2,3,4,5,6],
        "sponsorships" => 1,
        "messages-text" =>
        [
            'Ciao! Sono interessato all\'appartamento, è possibile sapere il prezzo?',
            'Quanto costa?',
            'La vista è sul mare?'
        ],
        "messages-email" =>
        [
            'Interessato@gmail.com',
            'john@gmail.com',
            'snow@gmail.com',
        ]
    ],
    [
        "user_id" => 2,
        "id" =>2,
		"title" => "Appartamento in centro",
		"rooms" => 12,
		"beds" => 5,
		"bathrooms" => 3,
		"sqm" => 50,
		"address" => "Via dei Piccardi 8 Trieste",
		"latitude" => 45.64739,
		"longitude" => 13.78669,
		"image" => '/images/Trieste.jpg',
		"image_original_name" => 'Trieste.jpg',
		"visible" => true,
        "services" => [3,7,9],
        "sponsorships" => 3,
        "messages-text" =>
        [
            'Ciao, mi serviva un alloggio per impegni lavorativi. Dovrei soggiornare 3 notti. È disponibile?',
            'Quanto costa?',
            'Quanto dista il centro a piedi?'
        ],
        "messages-email" =>
        [
            'JohnCena@gmail.com',
            'VinDiesel@gmail.com',
            'SilvioBerlusconi@gmail.com',
        ]
    ],
];
