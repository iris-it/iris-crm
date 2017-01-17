@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('config'))

@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('app.general:config') }}</h3>
            </div>
            <div class="box-body">
                @include('errors.list')

                {!! Form::model($organization->toArray(), ['method' => 'PATCH','action' => 'OrganizationController@update']) !!}

                @include('pages.organization.partials.form')

                {!! Form::close() !!}
            </div>


        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('app.organization:quotes-templates') }}</h3>
            </div>
            <div class="box-body">
                <div class="form-group col-sm-6">
                    <a href="{{action('TemplateController@index')}}" class="btn btn-app bg-blue btn-flat btn-create">
                        <i class="fa fa-object-group"></i> {{trans('app.template:manage')}}
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection