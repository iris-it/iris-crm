@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('edit-product', $product) !!}
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{trans('app.product:edit')}}
        </h1>
    </section>
    <div class="content">
        @include('errors.list')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($product, ['action' => ['ProductController@update', $product->id], 'method' => 'patch', 'files' => true]) !!}

                    @include('pages.products.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        IrisCrm.initDualListBox('taxes_list');

        let datepicker_sale_datestart = new DatePicker('#sale_datestart');
        let datepicker_sale_dateend = new DatePicker('#sale_dateend');
        
    </script>

@endsection
