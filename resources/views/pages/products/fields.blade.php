<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', trans('app.general:name') . " :" ) !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" ) !!}
    {!! Form::text('is_active', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', trans('app.product:category') . " :" ) !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Ht Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :" ) !!}
    {!! Form::text('ht_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Ttc Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttc_price', trans('app.product:active-taxes') . " :") !!}

    <div>
        {!! Form::select('taxes[]', $taxes, null, ['multiple', 'id'=> 'taxes_list', 'style' => 'height: 306px'] ) !!}
    </div>
</div>

<!-- Manutention Officer Field -->
<div class="form-group col-sm-6">
    <label for="manutention_officer">{{trans('app.product:manu-officer')}} :</label>
    {!! Form::select('manutention_officer', $contacts, null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Disponibility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_disponibility', trans('app.product:stock-dispo') . " :") !!}
    {!! Form::text('stock_disponibility', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_avatar', trans('app.product:avatar') . " :") !!}
    {!! Form::text('product_avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Datestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_datestart', trans('app.product:date-start') . " :") !!}
    {!! Form::text('sale_datestart', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Dateend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_dateend', trans('app.product:date-end') . " :") !!}
    {!! Form::text('sale_dateend', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Notice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_notice', trans('app.product:notice') . " :") !!}
    {!! Form::text('product_notice', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :") !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
