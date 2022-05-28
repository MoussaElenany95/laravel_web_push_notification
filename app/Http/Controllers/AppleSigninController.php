<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeneaLabs\LaravelSocialiter\Facades\Socialiter;
use Laravel\Socialite\Facades\Socialite;

class AppleSigninController extends Controller
{
    public function login()
    {
        return Socialite::driver("sign-in-with-apple")->stateless()->redirect();
    }

    public function callback(Request $request)
    {
        // get abstract user object, not persisted
        $user = Socialite::driver("sign-in-with-apple")
            ->user();
        
        // or use Socialiter to automatically manage user resolution and persistence
       // $user = Socialiter::driver("sign-in-with-apple")
         //   ->login();

         dd($user);
    }
}
