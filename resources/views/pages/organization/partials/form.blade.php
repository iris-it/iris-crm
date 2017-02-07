<!--- Date debut Field --->
<div class="form-group col-sm-6">
    {!! Form::label('name', trans('app.organization:name-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group col-sm-6">
    {!! Form::label('address', trans('app.organization:address-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group col-sm-6">
    {!! Form::label('address_comp', trans('app.organization:address_comp-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('address_comp', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group col-sm-6">
    {!! Form::label('phone', trans('app.organization:phone-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group col-sm-6">
    {!! Form::label('email', trans('app.organization:email-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group col-sm-6">
    {!! Form::label('website', trans('app.organization:website-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!--- Date debut Field --->
<div class="form-group col-sm-6">
    {!! Form::label('status', trans('app.organization:status-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('siren_number', trans('app.organization:siren-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('siren_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('siret_number', trans('app.organization:siret-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('siret_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('ape_number', trans('app.organization:ape-field') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('ape_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('vat_number', trans('app.organization:table-vat')) !!}
    {!! Form::text('vat_number', null, ['class' => 'form-control']) !!}
</div>

<!---  Field --->
<div class="form-group col-sm-12">
    {!! Form::submit(trans('app.general:save-changes'), ['class' => 'btn btn-primary', 'name' => 'submit-organization-create']) !!}
</div>