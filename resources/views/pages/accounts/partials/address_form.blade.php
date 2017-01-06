<div class="col-sm-12" id="{{$id}}">
    <header>
        <h4 class="text-bold"> {{$title}} </h4>
    </header>

    <div class="form-group col-sm-6">
        {!! Form::label('name', trans('app.address:name') . ' :', ['class' => 'h4 text-purple', 'slot' => 'name-field']) !!}
        {!! Form::text('name', isset($address) ? $address->name : null, ['name' => 'addresses[' . $id . '][name]', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('street_label', trans('app.address:street-label') . ' :', ['class' => 'h4 text-purple', 'slot' => 'street-label-field']) !!}
        {!! Form::text('street_label', isset($address) ? $address->street_label : null, ['name' => 'addresses[' . $id . '][street_label]', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('street_detail', trans('app.address:street-detail') . ' :', ['class' => 'h4 text-purple', 'slot' => 'street-detail-field']) !!}
        {!! Form::text('street_detail', isset($address) ? $address->street_detail : null , ['name' => 'addresses[' . $id . '][street_detail]', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('zipcode', trans('app.general:zipcode') . ' :', ['class' => 'h4 text-purple', 'slot' => 'zipcode-field']) !!}
        {!! Form::text('zipcode', isset($address) ? $address->zipcode : null , ['name' => 'addresses[' . $id . '][zipcode]', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('city', trans('app.general:city') . ' :', ['class' => 'h4 text-purple', 'slot' => 'city-field']) !!}
        {!! Form::text('city', isset($address) ? $address->city : null, ['name' => 'addresses[' . $id . '][city]', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('country', trans('app.general:country') . ' :', ['class' => 'h4 text-purple', 'slot' => 'country-field']) !!}
        {!! Form::text('country', isset($address) ? $address->country : null, ['name' => 'addresses[' . $id . '][country]', 'class' => 'form-control']) !!}
    </div>

    <input type="hidden" id="type" name={{'addresses[' . $id . '][type]'}} value="{{isset($address) ? $address->pivot->type : $type}}" class="form-control" >
</div>