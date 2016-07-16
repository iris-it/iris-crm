<!-- Service Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_name', trans('app.general:name') . " :" ) !!}
    {!! Form::text('service_name', null, ['class' => 'form-control']) !!}
</div>


<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', trans('app.product:category') . " :" )  !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_unit', trans('app.order:sale-unit') . " :" ) !!}
    {!! Form::text('sale_unit', null, ['class' => 'form-control']) !!}
</div>

<!-- Ht Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ht_price', trans('app.product:ht-price') . " :" )  !!}
    {!! Form::text('ht_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Ttc Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ttc_price', trans('app.product:active-taxes') . " :") !!}
    <hr>
    <div>
        @if($service)
            {!! Form::select('taxes[]', $taxes, array_pluck($service->taxes, 'id'), ['multiple', 'id'=> 'taxes_list', 'style' => 'height: 306px'] ) !!}
        @else
            {!! Form::select('taxes[]', $taxes, null, ['multiple', 'id'=> 'taxes_list', 'style' => 'height: 306px']) !!}
        @endif
    </div>
</div>

<!-- Sale Datestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_datestart',  trans('app.product:date-start') . " :" ) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('sale_datestart', null, ['class' => 'form-control', 'id' => 'sale_datestart']) !!}
    </div>
</div>

<!-- Sale Dateend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_dateend',  trans('app.product:date-end') . " :" ) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('sale_dateend', null, ['class' => 'form-control', 'id' => 'sale_dateend']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description',  trans('app.general:description') . " :" ) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" )  !!}
    <div class="checkbox">
        <label>
            {!! Form::checkbox('is_active', null, true) !!}
        </label>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('services.index') !!}" class="btn btn-default">Cancel</a>
</div>
