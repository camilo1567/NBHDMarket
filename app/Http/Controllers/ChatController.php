<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class ChatController extends Controller
{

    public function index()
    {
        return User::with('settings')->where('id', '!=', Auth::user()->id)->get();
    }

    public function user(){
        return Auth::user();
    }

    public function message(Request $request){

        $message = new Message;
        $message->from_user_id = $request->user()->id;
        $message->to_user_id = $request->to_user_id;
        $message->message = $request->message;

        $message->save();

        // // Pusher
        // $options = array('cluster' => 'mt1');

        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     $options
        // );

        // $data = ['message' => $message];
        // $pusher->trigger('chat', 'message', $data);

        return response()->json($message);

    }

    public function getMessages($id)
    {
        $userId = Auth::id();
        $toUserId = $id;

        $messages = Message::where(function ($query) use ($userId, $toUserId) {
            $query->where('from_user_id', $toUserId)
                ->where('to_user_id', $userId);

        })->orWhere(function ($query) use ($userId, $toUserId) {
            $query->where('from_user_id', $userId)
                ->where('to_user_id', $toUserId);
        })->get();

        return response()->json($messages);

    }
}
