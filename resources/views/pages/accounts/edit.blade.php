@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-account', $account) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.account:edit')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($account, ['action' => ['AccountController@update', $account->id], 'method' => 'patch', 'files' => true]) !!}

                    @include('pages.accounts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
