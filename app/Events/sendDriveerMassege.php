<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class sendDriveerMassege implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

 public User $receive;
 public string $message;


    /**
     * Create a new event instance.
     */
    public function __construct(User $receive ,string $message)
    {
        $this->receive = $receive;
        $this->message = $message;
      
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
   

    public function broadcastOn(): array
    {
        
        return [
            new PrivateChannel('YalahTaxi.' . $this->receive->id), 
        ];
    }
    public function broadcastWith()
    {
    
        return [
            'message' => $this->message,
            'receiver_id' => $this->receive->id,
        ];
    }
}
