@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.office:edit')}}
        </h1>
   </section>
   <div class="content">
       <div class="clearfix"></div>

       @include('flash::message')
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($office, ['action' => ['OfficeController@update', $office->id], 'method' => 'patch']) !!}

                        @include('pages.offices.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
