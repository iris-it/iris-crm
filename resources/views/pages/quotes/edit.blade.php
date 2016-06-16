@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quote
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quote, ['route' => ['quotes.update', $quote->id], 'method' => 'patch']) !!}

                        @include('pages.quotes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection