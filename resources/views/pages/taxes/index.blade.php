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
            <a class="btn btn-app bg-blue create-button btn-flat pull-right"  href="{!! action('TaxController@create') !!}">
                <i class="fa fa-percent"></i> {{trans('app.general:create')}}
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($taxes->count() > 0)
            <div class="box box-primary">
                <div class="box-body">
                    @include('pages.taxes.table')
                </div>
            </div>
        @else
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.tax:no-taxes-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.tax:no-taxes-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="{!! action('TaxController@create') !!}">
                    <i class="fa fa-percent"></i> {{trans('app.general:create')}} </a>
                </div>
            </div>
        @endif


    </div>
@endsection

