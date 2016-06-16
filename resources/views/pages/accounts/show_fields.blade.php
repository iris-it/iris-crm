<!-- Account Name Field -->
<div class="form-group">
    {!! Form::label('account_name', trans('app.general:name') . ' :') !!}
    <p>{!! $account->account_name !!}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', trans('app.general:website') . ' :') !!}
    <p>{!! $account->website !!}</p>
</div>

<!-- Activity Sector Field -->
<div class="form-group">
    {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :') !!}
    <p>{!! $account->activity_sector !!}</p>
</div>

<!-- Workforce Field -->
<div class="form-group">
    {!! Form::label(trans('app.general:workforce') . ' :') !!}
    <p>{!! $account->workforce !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type',trans('app.general:type') . ' :') !!}
    <p>{!! $account->type !!}</p>
</div>

<!-- Ape Number Field -->
<div class="form-group">
    {!! Form::label('ape_number', trans('app.general:ape-number') . ' :') !!}
    <p>{!! $account->ape_number !!}</p>
</div>

<!-- Siret Number Field -->
<div class="form-group">
    {!! Form::label('siret_number', trans('app.general:siret-number') . ' :') !!}
    <p>{!! $account->siret_number !!}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number', trans('app.general:phone-number') . ' :') !!}
    <p>{!! $account->phone_number !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group">
    {!! Form::label('is_active', trans('app.general:is-active') . ' :') !!}
    <p>{!! $account->is_active !!}</p>
</div>

<!-- Account Owner Field -->
<div class="form-group">
    {!! Form::label('account_owner', trans('app.general:account-owner') . ' :') !!}
    <p>{!! $account->account_owner !!}</p>
</div>

<!-- Billing Address Field -->
<div class="form-group">
    {!! Form::label('billing_address', trans('app.general:address') . ' :') !!}
    <p>{!! $account->billing_address !!}</p>
</div>

<!-- Delivery Address Field -->
<div class="form-group">
    {!! Form::label('delivery_address', trans('app.general:address') . ' :') !!}
    <p>{!! $account->delivery_address !!}</p>
</div>

<!-- Billing Zipcode Field -->
<div class="form-group">
    {!! Form::label('billing_zipcode', trans('app.general:zipcode') . ' :') !!}
    <p>{!! $account->billing_zipcode !!}</p>
</div>

<!-- Delivery Zipcode Field -->
<div class="form-group">
    {!! Form::label('delivery_zipcode', trans('app.general:zipcode') . ' :') !!}
    <p>{!! $account->delivery_zipcode !!}</p>
</div>

<!-- Billing City Field -->
<div class="form-group">
    {!! Form::label('billing_city', trans('app.general:city') . ' :') !!}
    <p>{!! $account->billing_city !!}</p>
</div>

<!-- Delivery City Field -->
<div class="form-group">
    {!! Form::label('delivery_city', trans('app.general:city') . ' :') !!}
    <p>{!! $account->delivery_city !!}</p>
</div>

<!-- Billing Country Field -->
<div class="form-group">
    {!! Form::label('billing_country', trans('app.general:country') . ' :') !!}
    <p>{!! $account->billing_country !!}</p>
</div>

<!-- Delivery Country Field -->
<div class="form-group">
    {!! Form::label('delivery_country', trans('app.general:country') . ' :')  !!}
    <p>{!! $account->delivery_country !!}</p>
</div>

<!-- Free Label Field -->
<div class="form-group">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :') !!}
    <p>{!! $account->free_label !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . ' :') !!}
    <p>{!! $account->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at',  trans('app.general:updated-at') . ' :') !!}
    <p>{!! $account->updated_at !!}</p>
</div>

