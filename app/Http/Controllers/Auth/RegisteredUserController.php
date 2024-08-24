<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HobbyController;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $hobbies = Hobby::all();

        return view('auth.register', compact('hobbies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|min:17|Integer',
            'gender' => 'required',
            'instagram_username'=> 'required|string|max:255',
            'hobbies' => 'required|array|min:3',
            'mobile_number' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
        ],  [
            'fields_of_hobby' => 'choose at least 3 hobbies',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $hobbies = $request->hobbies;

        $hobbies = Hobby::whereIn('id', $hobbies)->pluck('name')->toArray();

        $hobbies = implode(',', $hobbies);

        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'instagram_username' => "http://www.instagram.com/" . $request->instagram_username,
            'fields_of_hobby' => $hobbies,
            'mobile_number' => $request->mobile_number,
            'coin' => 100,
            'register_price' => rand(100000,125000),
            'isPaid' => 0,
            'password' => $request->password,
            'isPrivate' => 0,
            'current_avatar' => 152,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('payment', absolute: false));
    }
}
