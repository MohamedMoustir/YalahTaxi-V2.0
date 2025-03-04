<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class places extends Model
{
    protected $table = 'places';

    protected $fillable  = [
        'course_passenger_id',
        'driveer_id',
    ];


    public function driveer(){
        $this->belongsTo(driveer::class);
    }
}
