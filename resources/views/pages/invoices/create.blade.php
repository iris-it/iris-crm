@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('new-invoice') !!}
@endsection

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

                    <input type="hidden" name="content" id="content_field" value="[]"/>

                    @include('pages.invoices.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @include('shared.quote-invoice-product-table-input', ['content_id' => 'content_field'])])

    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        IrisCrm.initDatePicker('deadline');

    </script>
@endsection
