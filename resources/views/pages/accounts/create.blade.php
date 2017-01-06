@extends('layouts.app')

@section('content')
    <section class="content-header">
        @if(!$isLead)
            <h1>
                {{trans('app.account:create')}}
            </h1>
        @else
            <h1>
                {{trans('app.lead:create')}}
            </h1>
        @endif
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    @if(!$isLead)
                        {!! Form::open(['action' => 'AccountController@store', 'files' => true]) !!}
                    @else
                        {!! Form::open(['action' => 'LeadController@store', 'files' => true]) !!}
                    @endif

                    @include('pages.accounts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
