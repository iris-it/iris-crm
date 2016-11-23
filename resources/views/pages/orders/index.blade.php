@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:orders')}}</h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-blue btn-flat pull-right"  style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="{!! action('OrderController@create') !!}">
                <i class="fa fa-plus"></i> {{trans('app.general:create')}}
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('pages.orders.table')
            </div>
        </div>
    </div>
@endsection

