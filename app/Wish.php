<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'class_id',
        'offer_id',
        'teacher1_id',
        'teacher2_id', 'location_Id',
        'primaryDateStart', 'secondaryDateStart', 'tertiaryDateStart',
        'primaryDateEnd', 'secondaryDateEnd', 'tertiaryDateEnd',
    ];

    //One wish has various students
    public function student()
    {
        return $this->hasMany('App\Student');
    }
}
