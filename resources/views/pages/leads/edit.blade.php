@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-lead', $lead) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.lead:edit')}}
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lead, ['action' => ['LeadController@update', $lead->id], 'method' => 'patch']) !!}

                        @include('pages.leads.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
