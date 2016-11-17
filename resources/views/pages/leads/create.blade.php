@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Création d'un prospect
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'LeadController@store']) !!}

                        @include('pages.leads.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
