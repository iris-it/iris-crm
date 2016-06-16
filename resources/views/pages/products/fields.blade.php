<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', 'Product Name:') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Is Active:') !!}
    {!! Form::text('is_active', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Ht Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ht_price', 'Ht Price:') !!}
    {!! Form::text('ht_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Ttc Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttc_price', 'Ttc Price:') !!}
    {!! Form::text('ttc_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Manutention Officer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manutention_officer', 'Manutention Officer:') !!}
    {!! Form::text('manutention_officer', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Disponibility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_disponibility', 'Stock Disponibility:') !!}
    {!! Form::text('stock_disponibility', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_avatar', 'Product Avatar:') !!}
    {!! Form::text('product_avatar', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Datestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_datestart', 'Sale Datestart:') !!}
    {!! Form::text('sale_datestart', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Dateend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_dateend', 'Sale Dateend:') !!}
    {!! Form::text('sale_dateend', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Notice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_notice', 'Product Notice:') !!}
    {!! Form::text('product_notice', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
