@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-quote', $quote) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.quote:edit')}}
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quote, ['action' => ['QuoteController@update', $quote->id], 'method' => 'patch']) !!}

                        @include('pages.quotes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('js-app-scope')
    @parent
    IrisCrm.initDatePicker('deadline');

@endsection
