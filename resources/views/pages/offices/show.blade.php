@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détail du compte
        </h1>
    </section>
    <div class="content">


        @include('pages.accounts.show_fields')
        <a href="{!! action('AccountController@index') !!}" class="btn btn-lg btn-flat bg-blue"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>

    </div>
@endsection
