<?php

namespace App\Models;

use Illuminate\Contracts\Concurrency\Driver;
use Illuminate\Database\Eloquent\Model;

class trajet extends Model
{
    protected $table = 'trajets';
    protected $fillable=[
        'nom',
        'prix',
    ];
    
    public function details_trajet(){
        return $this->hasOne(details_trajet::class,'trajet_id');
    }

    public function course(){
        return $this->hasMany(Course::class);
    }
    public function driveer()
    {
        return $this->hasMany(driveer::class,'trajet_id');
    }
    

    public function users()
    {
        return $this->belongsTo(User::class);
    }    
}
