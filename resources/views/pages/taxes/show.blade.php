@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détail taxe
        </h1>
    </section>
    <div class="content">

        @include('pages.taxes.show_fields')
        <a href="{!! action('TaxController@index') !!}" class="btn btn-lg btn-flat bg-purple"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>

    </div>
@endsection
