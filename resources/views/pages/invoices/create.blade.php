@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.invoice:new')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'InvoiceController@store']) !!}

                        @include('pages.invoices.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-app-scope')
    @parent
    IrisCrm.initDatePicker('deadline');

@endsection
