@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.office:create-title')}}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['method' => 'POST','action' => ['OfficeController@store', $account->id]]) !!}

                        @include('pages.offices.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
