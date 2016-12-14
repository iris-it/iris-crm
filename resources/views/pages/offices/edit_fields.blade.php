
<div class="form-group col-sm-12 text-center">
    {!! Form::label('accountSelect',  trans('app.contact:accounts-select') . ' :', ['class' => 'h4 text-purple']) !!}
    <br>
    {!! Form::select('account_id', $accounts, $office->account->id, ['class' => 'form-control']) !!}
</div>

<!-- Office Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', trans('app.general:website') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Activity Sector Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('activity_sector', null, ['class' => 'form-control']) !!}
</div>

<!-- Workforce Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workforce', trans('app.general:workforce') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('workforce', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', trans('app.general:type') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Ape Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ape_number', trans('app.general:ape-number') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('ape_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Siret Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('siret_number', trans('app.general:siret-number') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('siret_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', trans('app.general:phone-number') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . ' :', ['class' => 'h4 text-purple']) !!}
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
            <h4 class="text-bold"> {{trans('app.general:delivery-address')}}</h4>
        @elseif($address->pivot->type == "billing")
            <h4 class="text-bold"> {{trans('app.general:billing-address')}}</h4>
        @endif

        <div class="form-group col-sm-6">
            {!! Form::label('name', trans('app.address:name') . ' :', ['class' => 'h4 text-purple', 'slot' => 'name-field']) !!}
            {!! Form::text('name', $address->name, ['name' => 'addresses[' . $address->id . '][name]', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-6">

            {!! Form::label('street_label', trans('app.address:street-label') . ' :', ['class' => 'h4 text-purple', 'slot' => 'street-label-field']) !!}
            {!! Form::text('street_label', $address->street_label, ['name' => 'addresses[' . $address->id . '][street_label]', 'class' => 'form-control']) !!}


        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('street_detail', trans('app.address:street-detail') . ' :', ['class' => 'h4 text-purple', 'slot' => 'street-detail-field']) !!}
            {!! Form::text('street_detail', $address->street_detail, ['name' => 'addresses[' . $address->id . '][street_detail]', 'class' => 'form-control']) !!}

        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('zipcode', trans('app.general:zipcode') . ' :', ['class' => 'h4 text-purple', 'slot' => 'zipcode-field']) !!}
            {!! Form::text('zipcode', $address->zipcode, ['name' => 'addresses[' . $address->id . '][zipcode]', 'class' => 'form-control']) !!}

        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('city', trans('app.general:city') . ' :', ['class' => 'h4 text-purple', 'slot' => 'city-field']) !!}
            {!! Form::text('city', $address->city, ['name' => 'addresses[' . $address->id . '][city]', 'class' => 'form-control']) !!}

        </div>
        <div class="form-group col-sm-6">
            {!! Form::label('country', trans('app.general:country') . ' :', ['class' => 'h4 text-purple', 'slot' => 'country-field']) !!}
            {!! Form::text('country', $address->country, ['name' => 'addresses[' . $address->id . '][country]', 'class' => 'form-control']) !!}

        </div>

            <input type="hidden" id="type" name={{'addresses[' . $address->id . '][type]'}} value={{$address->pivot->type}} class="form-control" >

    </div>
@endforeach

<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>
