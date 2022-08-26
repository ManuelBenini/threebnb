<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'rooms',
        'beds',
        'bathrooms',
        'sqm',
        'address',
        'latitude',
        'longitude',
        'image',
        'image_original_name',
        // 'visible',
    ];
}
