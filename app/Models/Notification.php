<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'user_id',
        'driveer_id',
        'title',
        'content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function driveer()
    {
        return $this->belongsTo(Driveer::class);
    }
}
