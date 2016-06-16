<!-- Topic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic', 'Topic:') !!}
    {!! Form::text('topic', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', 'Account Name:') !!}
    {!! Form::text('account_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phase', 'Phase:') !!}
    {!! Form::text('phase', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_name', 'Contact Name:') !!}
    {!! Form::text('contact_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::text('deadline', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Owner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_owner', 'Contact Owner:') !!}
    {!! Form::text('contact_owner', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Special Conditions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('special_conditions', 'Special Conditions:') !!}
    {!! Form::text('special_conditions', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Zipcode:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estimates.index') !!}" class="btn btn-default">Cancel</a>
</div>
