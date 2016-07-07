@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Détail taxe
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pages.taxes.show_fields')
                    <div class="form-group col-sm-12">
                        <a href="{!! route('taxes.index') !!}" class="btn btn-default">{{trans('app.general:back')}}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection