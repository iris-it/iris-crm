@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'patch']) !!}

                        @include('pages.services.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('js-app-scope)

    IrisCrm.initDualListBox('taxes_list');

@endsection