<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('keycloak/authorize', function () {
    return SocialAuth::authorize('keycloak');
});

//OAuth redirects here after authorization
Route::get('keycloak/callback', function () {

    // Automatically log in existing users
    // or create a new user if necessary.
    SocialAuth::login('keycloak', function ($user, $details) {

        $user->name = $details->nickname;
        $user->email = $details->email;
        $user->save();

    });

    return Redirect::intended();

});

Route::get('keycloak/logout', function () {
    Auth::logout();
    $logout_url = "http://c64.ovh/auth/realms/irispass/protocol/openid-connect/logout?redirect_uri=http%3A%2F%2Firis-crm.dev%2F";
    return redirect($logout_url);
});
