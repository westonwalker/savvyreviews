<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('welcome');
        }
        
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            Auth::login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->avatar = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();

            event(new Registered($newUser));
    
            Auth::login($newUser, true);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
