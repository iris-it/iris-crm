<!-- Product Name Field -->
<div class="form-group">
    {!! Form::label('product_name', trans('app.general:name') . " :" )  !!}
    <p>{!! $products->product_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" ) !!}
    <p>{!! $products->is_active !!}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', trans('app.product:category') . " :" )  !!}
    <p>{!! $products->category !!}</p>
</div>

<!-- Ht Price Field -->
<div class="form-group">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :" )  !!}
    <p>{!! $products->ht_price !!}</p>
</div>

<!-- Ttc Price Field -->
<div class="form-group">
    {!! Form::label('ttc_price', trans('app.product:active-taxes') . " :") !!}
    <p>{!! $products->ttc_price !!}</p>
</div>

<!-- Manutention Officer Field -->
<div class="form-group">
    {!! Form::label('manutention_officer', trans('app.product:manu-officer') . " :") !!}
    <p>{!! $products->manutention_officer !!}</p>
</div>

<!-- Stock Disponibility Field -->
<div class="form-group">
    {!! Form::label('stock_disponibility', trans('app.product:stock-dispo') . " :")  !!}
    <p>{!! $products->stock_disponibility !!}</p>
</div>

<!-- Product Avatar Field -->
<div class="form-group">
    {!! Form::label('product_avatar', trans('app.product:avatar') . " :") !!}
    <p>{!! $products->product_avatar !!}</p>
</div>

<!-- Sale Datestart Field -->
<div class="form-group">
    {!! Form::label('sale_datestart', trans('app.product:date-start') . " :") !!}
    <p>{!! $products->sale_datestart !!}</p>
</div>

<!-- Sale Dateend Field -->
<div class="form-group">
    {!! Form::label('sale_dateend', trans('app.product:date-end') . " :")  !!}
    <p>{!! $products->sale_dateend !!}</p>
</div>

<!-- Product Notice Field -->
<div class="form-group">
    {!! Form::label('product_notice', trans('app.product:notice') . " :") !!}
    <p>{!! $products->product_notice !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', trans('app.general:description') . " :") !!}
    <p>{!! $products->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . " :") !!}
    <p>{!! $products->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :") !!}
    <p>{!! $products->updated_at !!}</p>
</div>

