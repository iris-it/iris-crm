@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:accounts')}}</h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-purple btn-flat create-button pull-right" href="#" @click="{{VueHelper::format('showModal', 'createAccountModal', [])}}">
            <i class="fa fa-address-book"></i> {{trans('app.general:create')}} </a>
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
                <h3 class="box-title animated flash">{{trans('app.account:no-accounts-title')}}</h3>
                <h4 class="animated fadeIn">{{trans('app.account:no-accounts-desc')}}</h4>
                <div class="col-sm-12 text-center">
                    <a class="btn btn-app bg-purple btn-flat animated pulse" style="font-size: 15px;" href="#" @click="{{VueHelper::format('showModal', 'createAccountModal', [])}}">
                        <i class="fa fa-address-book"></i> {{trans('app.general:create')}} </a>
                </div>
            </div>
        @endif

        <modal id="createAccountModal" title="{{trans('app.account:new')}}">
            {!! Form::open(['action' => 'AccountController@store']) !!}

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

