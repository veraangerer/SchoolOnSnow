<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'idNumber',
        'name',
        'bundesland',
        'address',
        'postcode',
        'schools_city',
        'schools_country',
        'firstName',
        'lastName',
        'telephone',
        'email'
    ];
}