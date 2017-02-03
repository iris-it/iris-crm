@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-organization', $organization) !!}
@endsection

@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('organization.edit') }}</h3>
            </div>
            <div class="box-body">
                @include('errors.list')

                {!! Form::model($organization->toArray(), ['method' => 'PATCH','action' => 'OrganizationController@update']) !!}

                <input type="hidden" name="id" value="{{$organization->id}}">

                @include('pages.organization.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection