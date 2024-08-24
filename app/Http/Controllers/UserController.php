<?php

namespace App\Http\Controllers;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    //
    public function index() {
        if(Auth::check()) {
            $users = User::where("id", "!=", Auth::user()->id)
            ->where('isPrivate', '=', false)->paginate(10);
        } else {
            $users = User::where('isPrivate', '=', false)->paginate(10);
        }

        if(session("status") != null) {
            $friendRequest = session("status");

            return view("dashboard", compact("users", "friendRequest"));
        }

        return view("dashboard", compact("users"));
    }

    public function updatePaid(Request $request) {
        $user = Auth::user();

        User::where("id", $user->id)->update(["isPaid"=> true, "coin" => $user->coin + ($request->coin - $user->register_price)]);

        return redirect()->route('dashboard');
    }
}
