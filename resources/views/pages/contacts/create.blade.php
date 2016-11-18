@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.contact:create')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'ContactController@store']) !!}

                        @include('pages.contacts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
