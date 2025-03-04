<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class disponibilites extends Model
{
    protected $table = 'disponibilites';
    protected $fillable = [
        'driveer_id',
        'heure_depart',
        'jour',
        'statuts',
    ];

    public function driveer(){
        $this->belongsto(driveer::class,'id');
    }
}
