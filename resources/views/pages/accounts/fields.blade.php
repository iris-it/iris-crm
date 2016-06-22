<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name',  trans('app.general:name') . ' :') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', trans('app.general:website') . ' :') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Activity Sector Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :') !!}
    {!! Form::text('activity_sector', null, ['class' => 'form-control']) !!}
</div>

<!-- Workforce Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workforce', trans('app.general:workforce') . ' :') !!}
    {!! Form::text('workforce', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', trans('app.general:type') . ' :') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_number', trans('app.general:ape-number') . ' :') !!}
    {!! Form::text('ape_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Siret Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('siret_number', trans('app.general:siret-number') . ' :') !!}
    {!! Form::text('siret_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', trans('app.general:phone-number') . ' :') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . ' :') !!}
    {!! Form::text('is_active', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Owner Field -->
<div class="form-group col-sm-6">
    <label for="account_owner_id">{{trans('app.general:account-owner')}} :</label>
    {!! Form::select('account_owner_id', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Billing Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_address', trans('app.general:address') . ' :') !!}
    {!! Form::text('billing_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_address', trans('app.general:address') . ' :') !!}
    {!! Form::text('delivery_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_zipcode', trans('app.general:zipcode') . ' :') !!}
    {!! Form::text('billing_zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_zipcode', trans('app.general:zipcode') . ' :') !!}
    {!! Form::text('delivery_zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_city', trans('app.general:city') . ' :') !!}
    {!! Form::text('billing_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_city', trans('app.general:city') . ' :') !!}
    {!! Form::text('delivery_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Billing Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('billing_country', trans('app.general:country') . ' :') !!}
    {!! Form::text('billing_country', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_country', trans('app.general:country') . ' :') !!}
    {!! Form::text('delivery_country', null, ['class' => 'form-control']) !!}
</div>

<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :') !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accounts.index') !!}" class="btn btn-default">Cancel</a>
</div>
