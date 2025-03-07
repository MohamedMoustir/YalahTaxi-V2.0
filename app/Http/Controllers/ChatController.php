<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Events\sendDriveerMassege;
use App\Events\sendPassngerMassege;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use App\Events\MessageEvent;
use App\Http\Controllers\On;


class ChatController extends Controller
{
    public $message;
    public $conversatition = [];
    public function chatform($id)
    {
        $user = User::findOrFail($id);

        $messages = Chat::where(function ($query) use ($id) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('chats', compact('id', 'messages'));
    }

    public function submit(Request $request)
    {

        MessageEvent::dispatch($request->receiver_id, $request->message);
        $this->message = '';


        // $request->validate([
        //     'message' => 'required|string',
        //     'receiver_id' => 'required|exists:users,id',
        // ]);
        // $sender = auth()->user(); 
        // $receiver = User::findOrFail($request->receiver_id);

        // $chat = Chat::create([
        //     'sender_id' => Auth::id(),
        //     'receiver_id' => $request->receiver_id,
        //     'message' => $request->message,
        //     'seen' => 0]);

        //    broadcast(new sendDriveerMassege($receiver->first(), $chat->message));
        // return redirect()->route('user.chats', ['id' => $request->receiver_id]);
    }

    #[On('echo:our_channel', 'MessageEvent')]
        public function listnToMessage($data)
    {
        dd('2');
        $this->conversatition = [
            'message' => $data['message'],
            'receiver_id' => $data['receive_id'],
        ];

    }

    public function mount($id) {
        
        $chats = Chat::where(function ($query) use ($id) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
    
        $conversation = $chats->map(function ($chat) {
            return [
                'message' => $chat->message,
                'sender' => $chat->sender_id == Auth::id() ? 'user' : 'driver',
            ];
        });
    
        return view('chats', compact('id', 'conversation'));
    }
    
}
