<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', trans('app.general:name') . " :" )  !!}
    <p>{!! $product->product_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" ) !!}
    @if($product->is_active)
        <p>{{trans('app.general:yes')}}</p>
    @else
        <p>{{trans('app.general:no')}}</p>
    @endif
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', trans('app.product:category') . " :" )  !!}
    <p>{!! $product->category !!}</p>
</div>

<!-- Ht Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :" )  !!}
    <p>{!! $product->ht_price !!}</p>
</div>


<!-- Ttc Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttc_price', trans('app.product:active-taxes') . " :") !!}
    @if($product->taxes)
        <ul>
            @foreach($product->taxes as $tax)
                <li>{{$tax->name}} : {{$tax->value}} %</li>
            @endforeach
        </ul>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- TTC Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttc_price', trans('app.general:ttc-price') . " :" )  !!}
    <p>{!! $product->ttc_price !!}</p>
</div>


<!-- Manutention Officer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manutention_officer', trans('app.product:manu-officer') . " :") !!}
    @if($product->contact)
        <p>{!! $product->contact->firstname !!} {!! $product->contact->lastname !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Stock Disponibility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_disponibility', trans('app.product:stock-dispo') . " :")  !!}
    <p>{!! $product->stock_disponibility !!}</p>
</div>

<!-- Product Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_avatar', trans('app.product:avatar') . " :") !!}
    <p>{!! $product->product_avatar !!}</p>
</div>

<!-- Sale Datestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_datestart', trans('app.product:date-start') . " :") !!}
    <p>{!! $product->sale_datestart !!}</p>
</div>

<!-- Sale Dateend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_dateend', trans('app.product:date-end') . " :")  !!}
    <p>{!! $product->sale_dateend !!}</p>
</div>

<!-- Product Notice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_notice', trans('app.product:notice') . " :") !!}
    <p>{!! $product->product_notice !!}</p>
</div>


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :") !!}
    <p>{!! $product->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('app.general:created-at') . " :") !!}
    <p>{!! $product->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :") !!}
    <p>{!! $product->updated_at !!}</p>
</div>

