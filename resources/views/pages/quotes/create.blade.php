@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('new-quote') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.quote:new')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'QuoteController@store']) !!}

                    <input type="hidden" name="content" id="content_field" value="[]"/>

                    @include('pages.quotes.fields')

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
