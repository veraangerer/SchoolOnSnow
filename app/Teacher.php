<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'firstName1',
        'lastName1',
        'telephone1',
        'email1',
        'firstName2',
        'lastName2',
        'telephone2',
        'email2'

    ];
}