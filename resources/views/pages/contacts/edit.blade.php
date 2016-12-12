@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-contact', $contact) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.contact:edit')}}
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contact, ['action' => ['ContactController@update', $contact->id], 'method' => 'PUT']) !!}

                        @include('pages.contacts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
