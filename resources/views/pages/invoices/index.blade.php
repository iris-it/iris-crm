@extends('layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('invoices') !!}
@endsection

@section('content')

    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:invoices')}}
            @if(!$noInvoice)
                ({{$invoiceCounter}})
            @endif
        </h1>
        <h1 class="pull-right">
            <button class="btn btn-app bg-blue btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" type="button" data-toggle="modal" data-target="#invoiceModal">
                <i class="fa fa-file-archive-o"></i> {{trans('app.general:create')}}
            </button>
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
                    <button class="btn btn-app bg-blue btn-flat create-button animated pulse" type="button" data-toggle="modal" data-target="#invoiceModal">
                        <i class="fa fa-file-archive-o"></i> {{trans('app.general:create')}}
                    </button>
                </div>
            </div>
        @else
            @include('pages.invoices.table')
        @endif

    </div>
@endsection

@section('footer')
    @parent
    <div class="modal fade fadeInDown" id="invoiceModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['action' => 'InvoiceController@create', 'method' => 'GET']) !!}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1>{{trans('app.invoice:new')}}</h1>
                </div>

                <div class="modal-body">
                    <div class="form-group col-sm-12 text-center">
                        {!! Form::label('accountSelect',  trans('app.contact:accounts-select')) !!}
                        <br>
                        {!! Form::select('account_id', $accountsList, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{trans('app.general:cancel')}}</button>
                    {!! Form::submit( trans('app.general:continue'), ['id' => 'leadSelect', 'class' => 'btn btn-primary pull-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection