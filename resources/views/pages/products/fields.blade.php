<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', trans('app.general:name') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . " :", ['class' => 'h4 text-purple'] ) !!}
    <div class="checkbox">
        <label>
            {!! Form::checkbox('is_active', null, true) !!}
        </label>
    </div>

</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', trans('app.product:category') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Ht Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('ht_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Taxes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttc_price', trans('app.product:active-taxes') . " :", ['class' => 'h4 text-purple']) !!}

    <hr>
    <div>
        @if(isset($product))
            {!! Form::select('taxes[]', $taxes, array_pluck($product->taxes, 'id'), ['class' => 'form-control','multiple' => 'multiple'] ) !!}
        @else
            {!! Form::select('taxes[]', $taxes, null, ['class' => 'form-control','multiple' => 'multiple']) !!}
        @endif
    </div>

</div>


<!-- Manutention Officer Field -->
<div class="form-group col-sm-6">
    <label for="manutention_officer_id">{{trans('app.product:manu-officer')}} :</label>
    {!! Form::select('manutention_officer_id', $contacts, null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Disponibility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_disponibility', trans('app.product:stock-dispo') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('stock_disponibility', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_avatar', trans('app.product:avatar') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('product_avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Datestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_datestart', trans('app.product:date-start') . " :", ['class' => 'h4 text-purple']) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('sale_datestart', null, ['class' => 'form-control', 'id' => 'sale_datestart']) !!}
    </div>
</div>

<!-- Sale Dateend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_dateend', trans('app.product:date-end') . " :", ['class' => 'h4 text-purple']) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('sale_dateend', null, ['class' => 'form-control', 'id' => 'sale_dateend']) !!}
    </div>
</div>

<!-- Product Notice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_notice', trans('app.product:notice') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('product_notice', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :", ['class' => 'h4 text-purple']) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('ProductController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>
