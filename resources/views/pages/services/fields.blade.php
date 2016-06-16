<!-- Service Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_name', 'Service Name:') !!}
    {!! Form::text('service_name', null, ['class' => 'form-control']) !!}
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

<!-- Sale Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_unit', 'Sale Unit:') !!}
    {!! Form::text('sale_unit', null, ['class' => 'form-control']) !!}
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

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('services.index') !!}" class="btn btn-default">Cancel</a>
</div>
