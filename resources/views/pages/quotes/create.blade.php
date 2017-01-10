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

                    @include('pages.quotes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        IrisCrm.initDatePicker('deadline');

    </script>
@endsection
