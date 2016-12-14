@extends('layouts.app')

@section('breadcrumbs')
    @if(!$isLead)
        {!! Breadcrumbs::render('accounts') !!}
    @else
        {!! Breadcrumbs::render('leads') !!}
    @endif
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">
            @if(!$isLead)
                {{trans('app.general:accounts')}}
            @else
                {{trans('app.general:leads')}}
            @endif

            @if($accounts->count() > 0)
                ({{$accounts->count()}})
            @endif
        </h1>
        <h1 class="pull-right">
            @if(!$isLead)
                <a class="btn btn-app bg-blue btn-flat create-button pull-right" href="#" @click="{{VueHelper::format('showModal', 'createAccountModal', [])}}">
                <i class="fa fa-address-book"></i>
            @else
                <a class="btn btn-app bg-blue btn-flat create-button pull-right" href="#" @click="{{VueHelper::format('showModal', 'createLeadModal', [])}}">
                <i class="fa fa-address-book-o"></i>
            @endif
                {{trans('app.general:create')}}</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @if($accounts->count() > 0)
            <div class="box box-primary">
                <div class="box-body">
                    @include('pages.accounts.table')
                </div>
            </div>
        @else
            <div class="form-group col-sm-10 text-center">
                @if(!$isLead)
                    <h3 class="box-title animated flash">{{trans('app.account:no-accounts-title')}}</h3>
                    <h4 class="animated fadeIn">{{trans('app.account:no-accounts-desc')}}</h4>
                    <div class="col-sm-12 text-center">
                        <br>
                        <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="#" @click="{{VueHelper::format('showModal', 'createAccountModal', [])}}">
                        <i class="fa fa-address-book"></i> {{trans('app.general:create')}} </a>
                    </div>
                @else
                    <h3 class="box-title animated flash">{{trans('app.lead:no-leads-title')}}</h3>
                    <h4 class="animated fadeIn">{{trans('app.lead:no-leads-desc')}}</h4>
                    <div class="col-sm-12 text-center">
                        <br>
                        <a class="btn btn-app bg-blue btn-flat create-button animated pulse" href="#" @click="{{VueHelper::format('showModal', 'createLeadModal', [])}}">
                        <i class="fa fa-address-book-o"></i> {{trans('app.general:create')}} </a>
                    </div>
                @endif

            </div>
        @endif

        @if(!$isLead)
            <modal id="createAccountModal" title="{{trans('app.account:new')}}">

                {!! Form::open(['action' => 'AccountController@store']) !!}

                <div class="form-group col-sm-12">
                    {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
                    <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
                </div>

                {!! Form::close() !!}
            </modal>
        @else
            <modal id="createLeadModal" title="{{trans('app.lead:new')}}">
                {!! Form::open(['action' => 'LeadController@store']) !!}

                <div class="form-group col-sm-12">
                    {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
                    <a href="{!! action('LeadController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
                </div>

                {!! Form::close() !!}
            </modal>
        @endif
    </div>


@endsection

