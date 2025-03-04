<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
   'trajet_id',
   'id_driver',
   'statut',
    ];
    public function trajet(){
        return $this->belongsTo(trajet::class,'trajet_id');
    }
    public function driveer()
    {
        return $this->belongsTo(driveer::class, 'id_driver'); 
    }
    
    public function course_passenger()
    {
        return $this->belongsToMany(course_passenger::class, 'course_passenger', 'course_id', 'passenger_id');
    }
       
}
