@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détail du prospect
        </h1>
    </section>
    <div class="content">

        @include('pages.leads.show_fields')
        <a href="{!! route('leads.index') !!}" class="btn btn-lg btn-flat bg-purple"><i class="fa fa-chevron-circle-left"></i> {{trans('app.general:back')}}</a>
         
    </div>
@endsection
