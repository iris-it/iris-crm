@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.note:detail')}}
        </h1>
    </section>
    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>


        <div class="col-md-12">
            <a href="{!! action('ContactController@index') !!}" class="btn btn-lg btn-flat bg-blue"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>
        </div>

    </div>
@endsection
