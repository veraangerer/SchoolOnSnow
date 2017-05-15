<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sclass extends Model //Class alone isn't working ;-)
{
    public $timestamps = false;
    public $table = 'classes';

    protected $fillable = [
        'name_class',
        'sumstudents',
    ];
}