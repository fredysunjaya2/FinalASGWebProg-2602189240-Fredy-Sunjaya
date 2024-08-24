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
        $users = User::where("id", "!=", Auth::user()->id)->paginate(10);

        return view("dashboard", compact("users"));
    }

    public function updatePaid() {
        $user = Auth::user();

        User::where("id", $user->id)->update(["isPaid"=> true]);

        return redirect()->route('dashboard');
    }
}
