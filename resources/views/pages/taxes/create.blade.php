@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('new-tax') !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Création d'une taxe
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'TaxController@store']) !!}

                    @include('pages.taxes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

