@extends('layouts.auth')

@section('content')

    <p class="login-box-msg">Sign in to start your session</p>

    <div class="col-md-8 col-md-offset-2">
        <login action="{{action('AuthController@authorizeUser')}}"></login>
    </div>

    <div class="margin-bottom"></div>

@endsection
