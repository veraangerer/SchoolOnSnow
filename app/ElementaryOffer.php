<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementaryOffer extends Model //Class alone isn't working ;-)
{
    public $timestamps = false;
    public $table = 'elementary_wishes';
    public $incrementing = false; //set ID autoincrement false cz generating own number as ID

    protected $fillable = [
        'id',
        'user_id',
        'city',
        'country',
        'class_id',
        'package_id',
        'primaryDateStart',
        'primaryDateEnd',
        'secondaryDateStart',
        'secondaryDateEnd'
    ];
}