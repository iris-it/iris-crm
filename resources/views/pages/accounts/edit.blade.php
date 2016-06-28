@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Édition d'un compte
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($account, ['route' => ['accounts.update', $account->id], 'method' => 'patch']) !!}

                        @include('pages.accounts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection