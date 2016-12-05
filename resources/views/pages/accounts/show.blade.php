*@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.account:detail')}} : </h1>

        <h1 class="pull-right">
            <a class="btn btn-app create-button bg-blue btn-flat pull-right" href="{{action('OfficeController@create', $account->id)}}">
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
                    <div class="box box-primary">
                        <div class="box-body">
                            <h4 class="box-title">{{trans('app.general:offices')}} {{trans('app.account:of')}} {{$account->name}} : </h4>
                            <ul class="nav nav-pills">
                                @foreach($account->offices as $office)
                                    <li class="nav-item {{(!$loop->first)?:'active'}}">
                                        <a class="nav-link" href="#{{$office->id}}" data-toggle="tab">{{$office->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        @foreach($account->offices as $office)
                            <div class="tab-pane fade {{($loop->first)?'active in':''}}" id="{{$office->id}}">
                                @include('pages.accounts.partials.show_office_tabs')
                            </div>
                        @endforeach
                    </div>

            </div>
            @endif
        </div>
    </div>

    <div class="col-sm-12">
        <a href="{!! action('AccountController@index') !!}" class="btn btn-lg btn-flat bg-blue"><i
                    class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>
    </div>
@endsection
