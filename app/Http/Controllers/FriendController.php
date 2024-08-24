<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    //
    public function friendRequestIndex() {
        $users = Friend::where(function($query) {
            $query->where('user_id', Auth::user()->id)
            ->whereIn('status', ['pending', 'declined']);
        })
        ->orWhere(function($query) {
            $query->where('friend_id', Auth::user()->id)
            ->where('status', '=', 'pending');
        })
        ->paginate(10);

        return view("wishlist", compact("users"));
    }

    public function sendFriendRequest(Request $request) {
        $friendRequest = Friend::where("user_id", "=", Auth::user()->id)
                        ->where("friend_id", "=", $request->id)
                        ->first();

        if ($friendRequest != null && $friendRequest->status != "Declined") {
            return redirect()->route('dashboard')->with("status", $friendRequest->status);
        } else {
            Friend::create([
                "user_id" => Auth::user()->id,
                "friend_id" => $request->id,
                "status" => "Pending",
            ]);

            return redirect()->route('dashboard')->with("status", "Request");
        }
    }

    public function acceptFriendRequest(Request $request) {
        Friend::where('user_id', '=', Auth::user()->id)
        ->where('friend_id', '=', $request->id)
        ->update([
            'status' => 'Accepted',
        ]);

        Friend::where('user_id', '=', $request->id)
        ->where('friend_id', '=', Auth::user()->id)
        ->update([
            'status' => 'Accepted',
        ]);

        return redirect()->route('wishlist');
    }

    public function declineFriendRequest(Request $request) {
        Friend::where('user_id', '=', Auth::user()->id)
        ->where('friend_id', '=', $request->id2)
        ->update([
            'status' => 'Declined',
        ]);

        Friend::where('user_id', '=', $request->id2)
        ->where('friend_id', '=', Auth::user()->id)
        ->update([
            'status' => 'Declined',
        ]);

        return redirect()->route('wishlist');
    }

    public function friendIndex(Request $request) {
        $users = Friend::where('user_id', '=', Auth::user()->id)
        ->where('status', '=', 'Accepted')->paginate(10);

        return view("friend", compact("users"));
    }
}
