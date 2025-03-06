<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'seen',
    ];
  /**
     * Relation entre le chat et l'utilisateur expéditeur.
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Relation entre le chat et l'utilisateur destinataire.
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Relation pour récupérer le profil du vendeur destinataire.
     */
    public function receiverSellerProfile()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id')->select(['id', 'name', 'email', 'role']);
    }

    /**
     * Relation pour récupérer le profil du vendeur expéditeur.
     */
    public function senderSellerProfile()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id')->select(['id', 'name', 'email', 'role']);
    }

}
