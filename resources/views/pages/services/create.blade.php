@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Création d'un service
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'services.store']) !!}

                        @include('pages.services.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-app-scope')

    IrisCrm.initDualListBox('taxes_list');
    IrisCrm.initDatePicker('sale_datestart');
    IrisCrm.initDatePicker('sale_dateend');

@endsection
