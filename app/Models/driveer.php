<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class driveer extends Model
{

    protected $table = 'driveers';
    protected $fillable = [
         'user_id',
        'license_number',
        'current_location',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);  
    }
    
    

    public function trajet()
    {
        return $this->hasMany(Trajet::class, 'driver_id'); 
    }
    

    public function course()
    {
        return $this->hasMany(Course::class);
    } 

    public function course_passenger()
    {
        return $this->belongsToMany(course_passenger::class);
    }   

    
    public function disponibilites(){
        return $this->hasMany(disponibilites::class,'driveer_id');
    }
    public function places(){
        $this->hasMany(places::class );
    }
}
