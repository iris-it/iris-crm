@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détail facture
        </h1>
    </section>
    <div class="content">
        @include('pages.invoices.show_fields')
            <a href="{!! action('InvoiceController@index') !!}" class="btn btn-lg btn-flat bg-blue"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>

    </div>
@endsection
