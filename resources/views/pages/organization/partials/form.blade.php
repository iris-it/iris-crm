<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('name', trans('app.organization:name-field')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('address', trans('app.organization:address-field')) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('address_comp', trans('app.organization:address_comp-field')) !!}
    {!! Form::text('address_comp', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('phone', trans('app.organization:phone-field')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('email', trans('app.organization:email-field')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('website', trans('app.organization:website-field')) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('status', trans('app.organization:status-field')) !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('siren_number', trans('app.organization:siren-field')) !!}
    {!! Form::text('siren_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('siret_number', trans('app.organization:siret-field')) !!}
    {!! Form::text('siret_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('ape_number', trans('app.organization:ape-field')) !!}
    {!! Form::text('ape_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('vat_number', trans('app.organization:table-vat')) !!}
    {!! Form::text('vat_number', null, ['class' => 'form-control']) !!}
</div>

<!---  Field --->
<div class="form-group">
    {!! Form::submit(trans('app.general:save-changes'), ['class' => 'btn btn-primary', 'name' => 'submit-organization-create']) !!}
</div>