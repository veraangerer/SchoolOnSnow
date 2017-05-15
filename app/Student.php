<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'firstName', 'lastName', 'bDay', 'class_Id', 'telPrimary', 'telSecondary', 'canTakePhotos', 'hasTicket', 'wish_Id', 'skillLevel'
    ];

    //one student belongs to one wish
    public function wish()
    {
        return $this->belongsTo('App\Wish');
    }

   /* public function class()
    {
        return $this->belongsTo('App\Wish');
    }
*/
}
