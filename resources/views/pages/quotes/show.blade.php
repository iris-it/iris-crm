@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détail devis
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pages.quotes.show_fields')
                    <div class="form-group col-sm-12">
                        <a href="{!! route('quotes.index') !!}" class="btn btn-default">{{trans('app.general:back')}}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
