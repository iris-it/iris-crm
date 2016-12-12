@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('quotes') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:quotes')}}
            @if(!$noQuote)
                ({{$quoteCounter}})
            @endif
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-blue btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="#" @click="{{VueHelper::format('showModal', 'createQuoteModal', []) }}">
                <i class="fa fa-file-text-o"></i> {{trans('app.general:create')}}
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @if($noQuote)
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.quote:no-quotes-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.quote:no-quotes-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="#" @click="{{VueHelper::format('showModal', 'createQuoteModal', []) }}">
                    <i class="fa fa-file-text-o"></i> {{trans('app.general:create')}} </a>
                </div>
            </div>
        @else
            @include('pages.quotes.table')
        @endif

        <modal id="createQuoteModal" title="{{trans('app.quote:new')}}">
            {!! Form::open(['action' => 'QuoteController@create', 'method' => 'GET']) !!}

            <div class="form-group col-sm-12 text-center">
                {!! Form::label('accountSelect',  trans('app.contact:accounts-select')) !!}
                <br>
                {!! Form::select('account_id', $accountsList, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit( trans('app.general:continue'), ['id' => 'leadSelect', 'class' => 'btn btn-primary']) !!}
                <a href="{!! action('QuoteController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
            </div>

            {!! Form::close() !!}
        </modal>

    </div>
@endsection
