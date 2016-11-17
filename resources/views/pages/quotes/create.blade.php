@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Création d'un devis
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'quotes.store']) !!}

                    @include('pages.quotes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-app-scope')
    @parent
    IrisCrm.initDatePicker('deadline');
    IrisCrm.initDualListBox('products_list');
    IrisCrm.initDualListBox('services_list');


@endsection
