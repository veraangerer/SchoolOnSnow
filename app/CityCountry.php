<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityCountry extends Model
{
    public $timestamps = false;
    public $table = 'elementary_offer_cities_countries';


    public function city() {
        return $this->hasMany('City', 'cities_id');
    }

    public function country() {
        return $this->hasMany('Country', 'country_id');
    }
}