@extends('layouts.app')

@section('breadcrumbs')
    @if(!$account->is_lead)
        {!! Breadcrumbs::render('edit-account', $account) !!}
    @else
        {!! Breadcrumbs::render('edit-lead', $account) !!}
    @endif
@endsection

@section('content')
    <section class="content-header">
        @if(!$account->is_lead)
            <h1>
                {{trans('app.account:edit')}}
            </h1>
        @else
            <h1>
                {{trans('app.lead:edit')}}
            </h1>
        @endif
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @if(!$account->is_lead)
                        {!! Form::model($account, ['action' => ['AccountController@update', $account->id], 'method' => 'patch', 'files' => true]) !!}
                    @else
                        {!! Form::model($account, ['action' => ['LeadController@update', $account->id], 'method' => 'patch', 'files' => true]) !!}
                    @endif

                    @include('pages.accounts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
