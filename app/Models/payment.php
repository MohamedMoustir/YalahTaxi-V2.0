<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
  

    public function course_passenger()
{
    return $this->belongsTo(course_passenger::class,'payment_id', 'payment_id');
}

}
