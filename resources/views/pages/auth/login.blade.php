@extends('layouts.auth')

@section('content')

    <p class="text-center text-white" style="font-size:2em;">{{ trans('auth.login') }}</p>

    <br><br>

    <div class="col-md-8 col-md-offset-2">
        <a class="btn btn-success btn-block btn-flat" href="{{action('AuthController@authorizeUser')}}"><b>Connexion</b></a>
    </div>

    <div class="margin-bottom"></div>

@endsection
