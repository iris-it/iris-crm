@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('app.organization:create') }}</h3>
            </div>
            <div class="box-body">
                @include('errors.list')

                {!! Form::open(['action' => 'OrganizationController@store','method' => 'POST']) !!}

                @include('pages.organization.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection
