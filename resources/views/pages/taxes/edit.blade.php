@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-tax', $tax) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Édition d'une taxe
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tax, ['action' => ['TaxController@update', $tax->id], 'method' => 'patch']) !!}

                        @include('pages.taxes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
