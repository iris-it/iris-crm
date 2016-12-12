@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('taxes') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:taxes')}}
            @if($taxes->count() > 0)
                ({{$taxes->count()}})
            @endif
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-blue btn-flat pull-right"  style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="{!! action('TaxController@create') !!}">
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
                    @include('pages.taxes.table')
            </div>
        </div>
    </div>
@endsection

