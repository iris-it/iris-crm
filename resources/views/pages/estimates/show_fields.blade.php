<!-- Topic Field -->
<div class="form-group">
    {!! Form::label('topic', trans('app.general:topic') . " :" ) !!}
    <p>{!! $estimate->topic !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group">
    {!! Form::label('account_name', trans('app.contact:account-name') . " :" ) !!}
    <p>{!! $estimate->account_name !!}</p>
</div>

<!-- Phase Field -->
<div class="form-group">
    {!! Form::label('phase',  trans('app.general:phase') . " :" ) !!}
    <p>{!! $estimate->phase !!}</p>
</div>

<!-- Contact Name Field -->
<div class="form-group">
    {!! Form::label('contact_name', trans('app.contact:name') . " :" ) !!}
    <p>{!! $estimate->contact_name !!}</p>
</div>

<!-- Deadline Field -->
<div class="form-group">
    {!! Form::label('deadline', trans('app.general:deadline') . " :" ) !!}
    <p>{!! $estimate->deadline !!}</p>
</div>

<!-- Contact Owner Field -->
<div class="form-group">
    {!! Form::label('contact_owner', trans('app.contact:owner') . " :" ) !!}
    <p>{!! $estimate->contact_owner !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    <p>{!! $estimate->description !!}</p>
</div>

<!-- Special Conditions Field -->
<div class="form-group">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" ) !!}
    <p>{!! $estimate->special_conditions !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', trans('app.general:address') . " :" ) !!}
    <p>{!! $estimate->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group">
    {!! Form::label('zipcode', trans('app.general:zipcode') . " :" ) !!}
    <p>{!! $estimate->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', trans('app.general:city') . " :" ) !!}
    <p>{!! $estimate->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', trans('app.general:country') . " :" ) !!}
    <p>{!! $estimate->country !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" ) !!}
    <p>{!! $estimate->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" ) !!}
    <p>{!! $estimate->updated_at !!}</p>
</div>

