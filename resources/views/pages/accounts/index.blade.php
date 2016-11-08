@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:accounts')}}</h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-purple btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="#" @click="{{VueHelper::showModal('createAccountModal')}}">
                <i class="fa fa-plus"></i> {{trans('app.general:create')}} </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('pages.accounts.table')
            </div>
        </div>
        <modal id="createAccountModal" title="{{trans('app.account:new')}}">
            {!! Form::open(['route' => 'accounts.store']) !!}

            <div class="form-group col-sm-12">
                {!! Form::label('name',  trans('app.general:name') . ' :') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('accounts.index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
            </div>

            {!! Form::close() !!}
        </modal>
    </div>


@endsection

