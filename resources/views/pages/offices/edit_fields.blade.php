<div class="form-group col-sm-12 text-center">
    {!! Form::label('accountSelect',  trans('app.contact:accounts-select')) !!}
    <br>
    {!! Form::select('account_id', $accounts, ['class' => 'form-control']) !!}
</div>

<!-- Office Name Field -->
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
    <select class="form-control" id="is_active" name="is_active">
        <option value=1>{{trans('app.general:yes')}}</option>
        <option value=0>{{trans('app.general:no')}}</option>
    </select>
</div>

<div class="form-group col-sm-6">
    <br>
    <label>
        {!! Form::checkbox('is_main', 1, null, ['class' => 'checkbox']) !!}
        <span class="checkbox-label"> {{trans('app.office:is-main')}}</span>
    </label>
</div>

@foreach($office->addresses as $address)
    <div class="col-sm-12">
        @if($address->pivot->type == "delivery")
            <h4> {{trans('app.general:delivery-address')}}</h4>
        @elseif($address->pivot->type == "billing")
            <h4> {{trans('app.general:billing-address')}}</h4>
        @endif

        <div class="form-group col-sm-6">
            {!! Form::label('name', trans('app.address:name') . ' :', ['slot' => 'name-field']) !!}
            {!! Form::text('name', $address->name, ['name' => 'addresses[' . $address->pivot->type . '][name]', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-6">

            {!! Form::label('street_label', trans('app.address:street-label') . ' :', ['slot' => 'street-label-field']) !!}
            {!! Form::text('street_label', $address->street_label, ['name' => 'addresses[' . $address->pivot->type . '][street_label]', 'class' => 'form-control']) !!}


        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('street_detail', trans('app.address:street-detail') . ' :', ['slot' => 'street-detail-field']) !!}
            {!! Form::text('street_detail', $address->street_detail, ['name' => 'addresses[' . $address->pivot->type . '][street_detail]', 'class' => 'form-control']) !!}

        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('zipcode', trans('app.general:zipcode') . ' :', ['slot' => 'zipcode-field']) !!}
            {!! Form::text('zipcode', $address->zipcode, ['name' => 'addresses[' . $address->pivot->type . '][zipcode]', 'class' => 'form-control']) !!}

        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('city', trans('app.general:city') . ' :', ['slot' => 'city-field']) !!}
            {!! Form::text('city', $address->city, ['name' => 'addresses[' . $address->pivot->type . '][city]', 'class' => 'form-control']) !!}

        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('country', trans('app.general:country') . ' :', ['slot' => 'country-field']) !!}
            {!! Form::text('country', $address->country, ['name' => 'addresses[' . $address->pivot->type . '][country]', 'class' => 'form-control']) !!}

        </div>

    </div>
@endforeach

<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :') !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>
