@extends('layouts.app')

@section('breadcrumbs')
    @if($account->is_lead)
        {!! Breadcrumbs::render('new-lead-office', $account) !!}
    @else
        {!! Breadcrumbs::render('new-office', $account) !!}
    @endif
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.office:create-title')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => ['OfficeController@store', $account->id], 'method' => 'POST']) !!}

                    @include('pages.offices.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
