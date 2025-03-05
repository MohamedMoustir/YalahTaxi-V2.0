<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments' ;

    protected $fillable = [
    'content',
    'user_id',
    'driveer_id',
    'rating'
    ];
    public $timestampes = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
