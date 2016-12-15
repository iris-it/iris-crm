@extends('layouts.app')

@section('breadcrumbs')
    @if(isset($office))
        @if($account->is_lead)
            {!! Breadcrumbs::render('add-contact-lead-office', $account, $office) !!}
        @else
            {!! Breadcrumbs::render('add-contact-office', $account, $office) !!}
        @endif
    @else
        {!! Breadcrumbs::render('new-contact') !!}
    @endif
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.contact:create')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['action' => 'ContactController@store', 'method' => 'POST', 'files' => true]) !!}

                    @include('pages.contacts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
