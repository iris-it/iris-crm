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
            <button class="btn btn-app bg-blue btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" type="button" data-toggle="modal" data-target="#{{($isLead)?'leadModal':'accountModal'}}">
                <i class="fa fa-address-book-o"></i>{{trans('app.general:create')}}
            </button>
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
                        <button class="btn btn-app bg-blue btn-flat create-button animated pulse" type="button" data-toggle="modal" data-target="#accountModal">
                            <i class="fa fa-address-book-o"></i>{{trans('app.general:create')}}
                        </button>
                    </div>
                @else
                    <h3 class="box-title animated flash">{{trans('app.lead:no-leads-title')}}</h3>
                    <h4 class="animated fadeIn">{{trans('app.lead:no-leads-desc')}}</h4>
                    <div class="col-sm-12 text-center">
                        <br>
                        <button class="btn btn-app bg-blue btn-flat create-button animated pulse" type="button" data-toggle="modal" data-target="#leadModal">
                            <i class="fa fa-address-book-o"></i>{{trans('app.general:create')}}
                        </button>
                    </div>
                @endif

            </div>
        @endif

    </div>
@endsection

@section('footer')
    @parent
    <div class="modal fade fadeInDown" id="accountModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['action' => 'AccountController@store']) !!}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1>{{trans('app.account:new')}}</h1>
                </div>

                <div class="modal-body">
                    <div class="form-group col-sm-12">
                        {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{trans('app.general:cancel')}}</button>
                    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary pull-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    <div class="modal fade fadeInDown" id="leadModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['action' => 'LeadController@store']) !!}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1>{{trans('app.lead:new')}}</h1>
                </div>

                <div class="modal-body">
                    <div class="form-group col-sm-12">
                        {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{trans('app.general:cancel')}}</button>
                    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary pull-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
