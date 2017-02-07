@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('new-service') !!}
@endsection


@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.service:new')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'ServiceController@store', 'method' => 'POST', 'files' => true]) !!}

                    @include('pages.services.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        $("#taxes").select2({
            theme: "bootstrap"
        });

        let datepicker_sale_datestart = new DatePicker('#sale_datestart');
        let datepicker_sale_dateend = new DatePicker('#sale_dateend');

    </script>

@endsection
