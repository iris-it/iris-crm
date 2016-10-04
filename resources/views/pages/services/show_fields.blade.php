<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <!-- Service Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('service_name', trans('app.general:name') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->service_name !!}</span>
        </div>

        <!-- Is Active Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('is_active', trans('app.general:is-active') . " :" , ['class' => 'h4 text-purple']) !!}
            @if($service->is_active == true)
                <span class="h4 text-bold">{{trans('app.general:yes')}}</span>
            @else
                <span class="h4 text-bold">{{trans('app.general:no')}}</span>
            @endif
        </div>

        <!-- Category Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('category',  trans('app.product:category') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->category !!}</span>
        </div>


        <!-- Description Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('description', trans('app.general:description') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->description !!}</span>
        </div>

        <!-- Ht Price Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('ht_price', trans('app.product:ht-price') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->ht_price !!}</span>
        </div>

        <!-- TTC Price Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('ttc_price', trans('app.general:ttc-price') . " :" , ['class' => 'h4 text-purple'])  !!}
            <span class="h4 text-bold">{!! $service->ttc_price !!}</span>
        </div>

    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:detail-info')}}</h4>
        <hr>
        <!-- Ttc Price Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('ttc_price', trans('app.product:active-taxes') . " :", ['class' => 'h4 text-purple']) !!}
            @if($service->taxes)
                <ul>
                    @foreach($service->taxes as $tax)
                        <li><span class="h4 text-bold">{{$tax->name}} : {{$tax->value}} %</span></li>
                    @endforeach
                </ul>
            @else
                <span class="h4 text-bold">{{trans('app.general:undefined')}}</span>
            @endif
        </div>

        <!-- Sale Unit Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('sale_unit', trans('app.order:sale-unit') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->sale_unit !!}</span>
        </div>

        <!-- Sale Datestart Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('sale_datestart', trans('app.product:date-start') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->sale_datestart !!}</span>
        </div>

        <!-- Sale Dateend Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('sale_dateend', trans('app.product:date-end') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->sale_dateend !!}</span>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">

        <!-- Created At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('created_at', trans('app.general:created-at') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->created_at !!}</span>
        </div>

        <!-- Updated At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('updated_at', trans('app.general:updated-at') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $service->updated_at !!}</span>
        </div>

    </div>
</div>
