@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-quote', $quote) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.quote:edit')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($quote, ['action' => ['QuoteController@update', $quote->id], 'method' => 'patch']) !!}

                    <input type="hidden" name="content" value="{{json_encode($quote->content)}}"/>

                    @include('pages.quotes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @include('shared.quote-invoice-product-table-input', ['type' => 'quote'])

    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        IrisCrm.initDatePicker('deadline');

    </script>
@endsection
