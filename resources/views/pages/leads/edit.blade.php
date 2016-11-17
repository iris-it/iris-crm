@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Édition d'un prospect
        </h1>
   </section>
   <div class="content">
       @include('errors.list')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lead, ['route' => ['leads.update', $lead->id], 'method' => 'patch']) !!}

                        @include('pages.leads.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
