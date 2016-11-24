@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.contact:detail')}}
        </h1>
    </section>
    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-3">
                @include('pages.contacts.partials.show_info')
            </div>
            <div class="col-md-9">

                @include('pages.contacts.show_fields')

            </div>

        </div>

        <div class="col-md-12">
            <a href="{!! action('ContactController@index') !!}" class="btn btn-lg btn-flat bg-blue"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>
        </div>

    </div>
@endsection
