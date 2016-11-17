@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Édition d'un compte
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($account, ['route' => ['accounts.update', $account->id], 'method' => 'patch', 'files' => true]) !!}

                    @include('pages.accounts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
