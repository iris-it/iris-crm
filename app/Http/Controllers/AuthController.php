<?php

namespace App\Http\Controllers;

use AdamWathan\EloquentOAuth\Facades\OAuth;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function login()
    {
        return view('pages.auth.login');
    }

    public function authorizeUser()
    {
        return OAuth::authorize('keycloak');
    }

    public function handleCallback()
    {
        OAuth::login('keycloak', function ($user, $details) {
            $user->name = $details->nickname;
            $user->email = $details->email;
            $user->save();
        });

        return Redirect::intended();
    }

    public function userProfile()
    {
        return redirect(env('AUTH_SERVER') . "/realms/" . env('AUTH_REALM') . "/account?referrer=" . env('AUTH_CLIENT_ID') . "&referrer_uri=" . urlencode(env('APP_URL')));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(env('AUTH_SERVER') . "/realms/" . env('AUTH_REALM') . "/protocol/openid-connect/logout?redirect_uri=" . urlencode(env('APP_URL')));
    }
}
