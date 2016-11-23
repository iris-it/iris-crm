@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.account:detail')}} : </h1>

        <h1 class="pull-right">
            <a class="btn btn-app bg-purple btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="{{action('OfficeController@create', $account->id)}}">
                <i class="fa fa-building"></i> {{trans('app.general:create')}} </a>
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-3">
                @include('pages.accounts.partials.show_info')
                @include('pages.accounts.partials.show_info_comp')
            </div>
            <div class="col-md-9">
                @if($account->offices->count() < 1)
                    @include('pages.accounts.partials.show_create_offices')
                @else
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            @foreach($account->offices as $office)
                                <li class="{{(!$loop->first)?:'active'}}">
                                    <a href="#{{$office->id}}" data-toggle="tab">{{$office->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($account->offices as $office)
                                <div class="tab-pane {{(!$loop->first)?:'active'}}" id="{{$office->id}}">
                                    @include('pages.accounts.partials.show_offices')
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <a href="{!! action('AccountController@index') !!}" class="btn btn-lg btn-flat bg-purple"><i
                class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>
    </div>
@endsection
