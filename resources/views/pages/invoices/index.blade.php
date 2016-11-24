@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:invoices')}}</h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-blue btn-flat pull-right"  style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="#" @click="{{VueHelper::format('showModal', 'createInvoiceModal', []) }}">
                <i class="fa fa-file-archive-o"></i> {{trans('app.general:create')}}
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @if($noInvoice)
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.invoice:no-invoices-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.invoice:no-invoices-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="#" @click="{{VueHelper::format('showModal', 'createInvoiceModal', []) }}">
                    <i class="fa fa-file-archive-o"></i> {{trans('app.general:create')}} </a>
                </div>
            </div>
        @else
            @include('pages.invoices.table')
        @endif

        <modal id="createInvoiceModal" title="{{trans('app.invoice:new')}}">
            {!! Form::open(['action' => 'InvoiceController@create', 'method' => 'GET']) !!}

            <div class="form-group col-sm-12 text-center">
                {!! Form::label('accountSelect',  trans('app.contact:accounts-select')) !!}
                <br>
                {!! Form::select('account_id', $accountsList, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                {!! Form::submit( trans('app.general:continue'), ['id' => 'leadSelect', 'class' => 'btn btn-primary']) !!}
                <a href="{!! action('InvoiceController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
            </div>

            {!! Form::close() !!}
        </modal>

    </div>
@endsection
