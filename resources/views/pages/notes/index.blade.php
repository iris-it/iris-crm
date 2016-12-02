@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left text-purple">{{trans('app.general:notes')}}</h1>
        <h1 class="pull-right">
            <a class="btn btn-app create-button bg-blue btn-flat pull-right" href="{{action('NoteController@create')}}"><i class="fa fa-pencil"></i> {{trans('app.general:create')}}</a>
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')


    </div>
@endsection


