<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $service->id !!}</p>
</div>

<!-- Service Name Field -->
<div class="form-group">
    {!! Form::label('service_name', 'Service Name:') !!}
    <p>{!! $service->service_name !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{!! $service->is_active !!}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $service->category !!}</p>
</div>

<!-- Sale Unit Field -->
<div class="form-group">
    {!! Form::label('sale_unit', 'Sale Unit:') !!}
    <p>{!! $service->sale_unit !!}</p>
</div>

<!-- Ht Price Field -->
<div class="form-group">
    {!! Form::label('ht_price', 'Ht Price:') !!}
    <p>{!! $service->ht_price !!}</p>
</div>

<!-- Ttc Price Field -->
<div class="form-group">
    {!! Form::label('ttc_price', 'Ttc Price:') !!}
    <p>{!! $service->ttc_price !!}</p>
</div>

<!-- Sale Datestart Field -->
<div class="form-group">
    {!! Form::label('sale_datestart', 'Sale Datestart:') !!}
    <p>{!! $service->sale_datestart !!}</p>
</div>

<!-- Sale Dateend Field -->
<div class="form-group">
    {!! Form::label('sale_dateend', 'Sale Dateend:') !!}
    <p>{!! $service->sale_dateend !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $service->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $service->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $service->updated_at !!}</p>
</div>

