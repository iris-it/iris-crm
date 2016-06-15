@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Prospect
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($prospect, ['route' => ['prospects.update', $prospect->id], 'method' => 'patch']) !!}

                        @include('pages.prospects.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection