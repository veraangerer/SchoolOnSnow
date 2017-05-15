<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'location_id', 'ppDpA', 'ppDpC', 'overnight', 'startSeason', 'endSeason'
    ];

}
