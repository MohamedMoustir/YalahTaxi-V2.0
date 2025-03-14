<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class sendDriveerMassege implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

 public User $receive;
 public string $message;


    /**
     * Create a new event instance.
     */
    public function __construct(User $receive_id ,string $message)
    {
        

            $newMessage = new chat();
            $newMessage->sender_id = Auth::id();
            $newMessage->receiver_id = $receive_id ;
            $newMessage->message = $message ;
            $newMessage->seen = 0 ;


        $this->receive = $receive_id;
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
            new Channel('our_channel'), 
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
