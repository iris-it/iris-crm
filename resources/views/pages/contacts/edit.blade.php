@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Édition d'un contact
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contact, ['action' => ['ContactController@update', $contact->id], 'method' => 'patch']) !!}

                        @include('pages.contacts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
