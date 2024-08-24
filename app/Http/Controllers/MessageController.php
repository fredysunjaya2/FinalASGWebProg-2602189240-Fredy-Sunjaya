<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function index($id) {
        $receiver = User::find($id);

        $messages = Message::where('sender_id', '=', Auth::user()->id)
                    ->orWhere('receiver_id', '=', Auth::user()->id)->get();

        return view('message', compact('messages', 'receiver'));
    }

    public function sendMessage(Request $request) {
        Message::create([
            "sender_id" => Auth::user()->id,
            "receiver_id" => $request->receiver_id,
            "message" => $request->message,
        ]);

        return redirect()->route('message', ['id' => $request->receiver_id]);
    }
}
