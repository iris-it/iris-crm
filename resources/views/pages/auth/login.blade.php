@extends('layouts.auth')

@section('content')

    <p class="text-center" style="font-size:2em;">{{ trans('auth.login') }}</p>
    <br><br>
    <div class="col-md-8 col-md-offset-2">
        <login action="{{action('AuthController@authorizeUser')}}"></login>
    </div>

    <div class="margin-bottom"></div>

@endsection
