@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:accounts')}}</h1>
        <h1 class="pull-right">
            <a class="btn btn-app bg-purple btn-flat pull-right" style="font-size: 15px; margin-top: -10px;margin-bottom: 5px" href="#" @click="{{VueHelper::showModal('createAccountModal', ['foo' => 'FOO VALUE', 'bar' => 'BAR VALUE'])}}">
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
            <p>Here is the body.</p>
        </modal>


        <modal id="lolilol" title="{{trans('app.account:new')}}">
            <p>Here is the body.</p>
        </modal>
    </div>


@endsection

