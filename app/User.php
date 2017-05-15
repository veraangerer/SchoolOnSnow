<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;


class User extends Authenticatable
{   
    //use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    
    protected $fillable = [
         'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
