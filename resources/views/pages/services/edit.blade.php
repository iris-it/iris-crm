@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-service', $service) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Édition d'un service
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($service, ['action' => ['ServiceController@update', $service->id], 'method' => 'patch']) !!}

                        @include('pages.services.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('js-app-scope')

    IrisCrm.initDualListBox('taxes_list');
    IrisCrm.initDatePicker('sale_datestart');
    IrisCrm.initDatePicker('sale_dateend');

@endsection
