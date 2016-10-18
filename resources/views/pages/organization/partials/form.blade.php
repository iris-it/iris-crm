<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('name', trans('organization.name-field')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('address', trans('organization.address-field')) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('address_comp', trans('organization.address_comp-field')) !!}
    {!! Form::text('address_comp', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('phone', trans('organization.phone-field')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('email', trans('organization.email-field')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('website', trans('organization.website-field')) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group">
    {!! Form::label('status', trans('organization.status-field')) !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('siren_number', trans('organization.siren-field')) !!}
    {!! Form::text('siren_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('siret_number', trans('organization.siret-field')) !!}
    {!! Form::text('siret_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('ape_number', trans('organization.ape-field')) !!}
    {!! Form::text('ape_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tva_number', trans('organization.table-tva')) !!}
    {!! Form::text('tva_number', null, ['class' => 'form-control']) !!}
</div>

<!---  Field --->
<div class="form-group">
    {!! Form::submit(trans('organization.submit-create'), ['class' => 'btn btn-primary', 'name' => 'submit-organization-create']) !!}
</div>