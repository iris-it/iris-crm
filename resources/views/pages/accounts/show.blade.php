@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.account:detail')}} : </h1>

        <h1 class="pull-right">
            <a class="btn btn-app bg-purple btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="{{action('OfficeController@create', $account->id)}}">
                <i class="fa fa-plus"></i> {{trans('app.general:create')}} </a>
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('pages.accounts.show_fields')

    </div>
    <div class="col-sm-12">
        <a href="{!! action('AccountController@index') !!}" class="btn btn-lg btn-flat bg-purple"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>
    </div>
@endsection
