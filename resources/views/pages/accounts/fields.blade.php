<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', 'Account Name:') !!}
    {!! Form::text('account_name', null, ['class' => 'form-control']) !!}
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

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Is Active:') !!}
    {!! Form::text('is_active', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Owner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_owner', 'Account Owner:') !!}
    {!! Form::text('account_owner', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_address', 'Billing Address:') !!}
    {!! Form::text('billing_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_address', 'Delivery Address:') !!}
    {!! Form::text('delivery_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_zipcode', 'Billing Zipcode:') !!}
    {!! Form::text('billing_zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_zipcode', 'Delivery Zipcode:') !!}
    {!! Form::text('delivery_zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_city', 'Billing City:') !!}
    {!! Form::text('billing_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_city', 'Delivery City:') !!}
    {!! Form::text('delivery_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_country', 'Billing Country:') !!}
    {!! Form::text('billing_country', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_country', 'Delivery Country:') !!}
    {!! Form::text('delivery_country', null, ['class' => 'form-control']) !!}
</div>

<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', 'Free Label:') !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accounts.index') !!}" class="btn btn-default">Cancel</a>
</div>
