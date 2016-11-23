@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:leads')}}</h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-blue btn-flat create-button pull-right" href="#" @click="{{VueHelper::format('showModal', 'createLeadModal', [])}}">
                <i class="fa fa-address-book-o"></i> {{trans('app.general:create')}}
            </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($leads->count() > 0)
            <div class="box box-primary">
                <div class="box-body">
                    @include('pages.leads.table')
                </div>
            </div>
        @else
            <div class="form-group col-sm-10 text-center">
                <h3 class="box-title animated flash">{{trans('app.lead:no-leads-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.lead:no-leads-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <br>
                    <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="#" @click="{{VueHelper::format('showModal', 'createLeadModal', [])}}">
                    <i class="fa fa-address-book-o"></i> {{trans('app.general:create')}} </a>
                </div>
            </div>
        @endif

        <modal id="createLeadModal" title="{{trans('app.lead:new')}}">
            {!! Form::open(['action' => 'LeadController@store']) !!}

            <div class="form-group col-sm-12">
                {!! Form::label('name',  trans('app.general:name') . ' :') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
                <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
            </div>

            {!! Form::close() !!}
        </modal>

    </div>


@endsection
