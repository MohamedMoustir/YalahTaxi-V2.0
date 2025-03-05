<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course_passenger extends Model
{

   protected $table = 'course_passenger';
    protected $fillable = [
        'course_id',
        'passenger_id',
        'depart',
        'arriver',
        'departure_time',
        'status',
        'price'
    ];

    // public function course(){
    //     return $this->belongsToMany(Course::class,'course_passenger', 'course_id', 'passeger_id');

    // }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }   
    public function payment()
    {
        return $this->hasOne(Payment::class, 'payment_id', 'payment_id');
    }

}
