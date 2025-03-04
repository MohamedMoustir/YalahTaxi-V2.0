<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class details_trajet extends Model
{
    protected $table = 'detailestrajets';
    protected $fillable = [ 
        'trajet_id',
        'order_id',
        'point_de_pause',
        'distance',
        'price',
       
    ];
public function trajet(){
   return $this->belongsTo(trajet::class,'trajet_id');
}
public function driveer(){
    return $this->belongsTo(driveer::class, 'id_driver');
}
}
