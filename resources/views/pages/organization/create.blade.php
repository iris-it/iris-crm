@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('organization_create'))

@section('content')

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('organization.create') }}</h3>
            </div>
            <div class="box-body">
                @include('errors.list')

                {!! Form::open(['method' => 'POST','action' => 'OrganizationController@store']) !!}

                @include('pages.organization.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection