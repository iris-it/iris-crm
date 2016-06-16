@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estimate
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estimate, ['route' => ['estimates.update', $estimate->id], 'method' => 'patch']) !!}

                        @include('pages.estimates.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection