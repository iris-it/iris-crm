@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('receipts')}}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @if($noQuote)
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.receipt:no-quotes-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.receipt:no-quotes-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="<{!! action('QuoteController@index') !!}">
                        <i class="fa fa-file-archive-o"></i> {{trans('app.receipt:quotes-redirect')}} </a>
                </div>
            </div>
        @elseif($noReceipt)
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.receipt:no-receipts-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.receipt:no-receipts-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="<{!! action('QuoteController@index') !!}">
                        <i class="fa fa-file-archive-o"></i> {{trans('app.receipt:quotes-redirect')}} </a>
                </div>
            </div>
        @else
            @include('pages.receipts.table')
        @endif
    </div>
@endsection

