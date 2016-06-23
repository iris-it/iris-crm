<!-- Service Name Field -->
<div class="form-group">
    {!! Form::label('service_name', trans('app.general:name') . " :" ) !!}
    <p>{!! $service->service_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" ) !!}
    <p>{!! $service->is_active !!}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category',  trans('app.general:category') . " :" ) !!}
    <p>{!! $service->category !!}</p>
</div>

<!-- Sale Unit Field -->
<div class="form-group">
    {!! Form::label('sale_unit', trans('app.order:sale-unit') . " :" ) !!}
    <p>{!! $service->sale_unit !!}</p>
</div>

<!-- Ht Price Field -->
<div class="form-group">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :" ) !!}
    <p>{!! $service->ht_price !!}</p>
</div>

<!-- Ttc Price Field -->
<div class="form-group">
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

<!-- Sale Datestart Field -->
<div class="form-group">
    {!! Form::label('sale_datestart', trans('app.product:date-start') . " :" ) !!}
    <p>{!! $service->sale_datestart !!}</p>
</div>

<!-- Sale Dateend Field -->
<div class="form-group">
    {!! Form::label('sale_dateend', trans('app.product:date-end') . " :" ) !!}
    <p>{!! $service->sale_dateend !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    <p>{!! $service->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" ) !!}
    <p>{!! $service->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" ) !!}
    <p>{!! $service->updated_at !!}</p>
</div>

