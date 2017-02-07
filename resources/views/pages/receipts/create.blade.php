@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Création d'une commande
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'OrderController@store']) !!}

                    @include('pages.orders.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        let datepicker_order_date = new DatePicker('#order_date');
        let datepicker_delivery_deadline = new DatePicker('#delivery_deadline');

    </script>

@endsection