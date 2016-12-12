@extends('layouts.app')

@section('breadcrumbs')
    @if($office->account->is_lead)
        {!! Breadcrumbs::render('edit-lead-office', $office->account, $office) !!}
    @else
        {!! Breadcrumbs::render('edit-office', $office->account, $office) !!}
    @endif
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.office:edit')}}
        </h1>
   </section>
   <div class="content">
       <div class="clearfix"></div>
       @include('errors.list')

       @if($office->invoices->count() > 0)
           <div class="alert alert-info alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4><i class="icon fa fa-info"></i> Remarque : </h4>
               {!! trans('app.warning:leads-forbidden') !!}
           </div>
       @endif

       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($office, ['action' => ['OfficeController@update', "id" => $office->account->id, "officeId" => $office->id], 'method' => 'PUT']) !!}

                        @include('pages.offices.edit_fields')

                   {!! Form::close() !!}
               </div>
           </div>
           </div>
       </div>
@endsection
