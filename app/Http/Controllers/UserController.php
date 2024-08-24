<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    //
    public function index(Request $request) {
        $gender = ['Male', 'Female'];
        $hobby = Hobby::all()->pluck('name')->toArray();

        if($request->gender != null && $request->gender != 'Select By Gender') {
            $gender = [$request->gender];
        }

        if($request->hobby != null) {
            $hobbiesArray = explode(',', $request->hobby);

            $hobby = $hobbiesArray;
        }

        $query = User::where('isPrivate', '=', false)
            ->whereIn('gender', $gender)
            ->where(function($query) use ($hobby) {
                foreach ($hobby as $item) {
                    $query->orWhere('fields_of_hobby', 'LIKE', '%' . $item . '%');
                }
            });

        if (Auth::check()) {
            $query->where('id', '!=', Auth::user()->id);
        }

        $users = $query->paginate(10);

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
