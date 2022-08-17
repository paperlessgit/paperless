<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    // login Using Facebook

    function loginUsingFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    function callbackFromFacebook(){
        try {

            $user = Socialite::driver('facebook')->user();
            $saveUser  = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],[
                'name'  => $user->getName(),
                'emmail'=>$user->getEmail(),
            ]);

            Auth::loginUsingId( $saveUser->id);
            return redirect()->route('welcome');
        } catch(\Throwable $th){

            throw $th;

        }
    }
}
