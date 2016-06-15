<!-- Prospect Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prospect_name', 'Prospect Name:') !!}
    {!! Form::text('prospect_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Activity Sector Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity_sector', 'Activity Sector:') !!}
    {!! Form::text('activity_sector', null, ['class' => 'form-control']) !!}
</div>

<!-- Workforce Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workforce', 'Workforce:') !!}
    {!! Form::text('workforce', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_number', 'Ape Number:') !!}
    {!! Form::text('ape_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Siret Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('siret_number', 'Siret Number:') !!}
    {!! Form::text('siret_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Owner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_owner', 'Account Owner:') !!}
    {!! Form::text('account_owner', null, ['class' => 'form-control']) !!}
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

<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', 'Free Label:') !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('prospects.index') !!}" class="btn btn-default">Cancel</a>
</div>
