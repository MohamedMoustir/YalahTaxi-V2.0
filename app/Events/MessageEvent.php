<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Chat;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
class MessageEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    
 public  $receive_id;
 public  $message;


    /**
     * Create a new event instance.
     */
    public function __construct( $receive_id , $message)
    {
    
            $newMessage = new chat();
            $newMessage->sender_id = Auth::id();
            $newMessage->receiver_id = (int) $receive_id;
            $newMessage->message = $message ;
            $newMessage->seen = 0 ;
            $newMessage->save();
           
                $this->receive_id = $receive_id;
                $this->message = $message;
      
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
   

    public function broadcastOn()
    {
        
       
          return  
          new Channel('our_channel');
    
    }
    // public function broadcastWith()
    // {
    
    //     return [
    //         'message' => $this->message,
    //         'receiver_id' => $this->receive->id,
    //     ];
    // }
}
