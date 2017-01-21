@extends('layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.template:new')}}
        </h1>
    </section>

    <div class="content">
        @include('errors.list')

        {!! Form::open(['action' => 'TemplateController@store', 'method' => 'POST', 'id' => 'template-form']) !!}

        @include('pages.templates.fields')

        {!! Form::close() !!}

    </div>
@endsection
