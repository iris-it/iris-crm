<!-- Service Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_name', trans('app.general:name') . " :" ) !!}
    <p>{!! $service->service_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" ) !!}
    @if($service->is_active == true)
        <p>{{trans('app.general:yes')}}</p>
    @else
        <p>{{trans('app.general:no')}}</p>
    @endif
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category',  trans('app.general:category') . " :" ) !!}
    <p>{!! $service->category !!}</p>
</div>

<!-- Sale Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_unit', trans('app.order:sale-unit') . " :" ) !!}
    <p>{!! $service->sale_unit !!}</p>
</div>

<!-- Ht Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :" ) !!}
    <p>{!! $service->ht_price !!}</p>
</div>


<!-- Ttc Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttc_price', trans('app.product:active-taxes') . " :") !!}
    @if($service->taxes)
        <ul>
            @foreach($service->taxes as $tax)
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
    <p>{!! $service->ttc_price !!}</p>
</div>

<!-- Sale Datestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_datestart', trans('app.product:date-start') . " :" ) !!}
    <p>{!! $service->sale_datestart !!}</p>
</div>

<!-- Sale Dateend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_dateend', trans('app.product:date-end') . " :" ) !!}
    <p>{!! $service->sale_dateend !!}</p>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    <p>{!! $service->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" ) !!}
    <p>{!! $service->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" ) !!}
    <p>{!! $service->updated_at !!}</p>
</div>

