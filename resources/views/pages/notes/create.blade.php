@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.note:create')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['action' => 'NoteController@store']) !!}

                @include('pages.notes.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
