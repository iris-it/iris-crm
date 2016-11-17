@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détail de la commande
        </h1>
    </section>
    <div class="content">

        @include('pages.orders.show_fields')
        <a href="{!! action('OrderController@index') !!}" class="btn btn-lg btn-flat bg-purple"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>

    </div>
@endsection
