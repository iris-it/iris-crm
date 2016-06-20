

<!-- Lead Name Field -->
<div class="form-group">
    {!! Form::label('name',  trans('app.general:name') . ' :') !!}
    <p>{!! $lead->name !!}</p>
</div>

<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website',  trans('app.general:website') . ' :') !!}
    <p>{!! $lead->website !!}</p>
</div>

<!-- Activity Sector Field -->
<div class="form-group">
    {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :') !!}
    <p>{!! $lead->activity_sector !!}</p>
</div>

<!-- Workforce Field -->
<div class="form-group">
    {!! Form::label('workforce',  trans('app.general:workforce') . ' :')  !!}
    <p>{!! $lead->workforce !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', trans('app.general:type') . ' :' ) !!}
    <p>{!! $lead->type !!}</p>
</div>

<!-- Ape Number Field -->
<div class="form-group">
    {!! Form::label('ape_number', trans('app.general:ape-number') . ' :') !!}
    <p>{!! $lead->ape_number !!}</p>
</div>

<!-- Siret Number Field -->
<div class="form-group">
    {!! Form::label('siret_number', trans('app.general:siret-number') . ' :') !!}
    <p>{!! $lead->siret_number !!}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group">
    {!! Form::label('phone_number',  trans('app.general:phone-number') . ' :')  !!}
    <p>{!! $lead->phone_number !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status',  trans('app.general:status') . ' :') !!}
    <p>{!! $lead->status !!}</p>
</div>

<!-- Account Owner Field -->
<div class="form-group">
    {!! Form::label('account_owner', trans('app.general:account-owner') . ' :') !!}
    <p>{!! $lead->account_owner !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', trans('app.general:address') . ' :') !!}
    <p>{!! $lead->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group">
    {!! Form::label('zipcode', trans('app.general:zipcode') . ' :') !!}
    <p>{!! $lead->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city',  trans('app.general:city') . ' :') !!}
    <p>{!! $lead->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', trans('app.general:country') . ' :') !!}
    <p>{!! $lead->country !!}</p>
</div>

<!-- Free Label Field -->
<div class="form-group">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :') !!}
    <p>{!! $lead->free_label !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . ' :') !!}
    <p>{!! $lead->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('app.general:updated-at') . ' :') !!}
    <p>{!! $lead->updated_at !!}</p>
</div>

