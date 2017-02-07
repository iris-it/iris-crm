@extends('layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.template:new')}}
        </h1>
    </section>

    <div class="content">
        @include('errors.list')

        {!! Form::model($template, ['action' => ['TemplateController@update', $template->id], 'method' => 'patch', 'id' => 'template-form']) !!}

        @include('pages.templates.edit_fields')

        {!! Form::close() !!}

    </div>
@endsection
