<!-- Topic Field -->
<div class="form-group">
    {!! Form::label('topic', trans('app.general:topic') . " :" ) !!}
    <p>{!! $quote->topic !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group">
    {!! Form::label('account_name', trans('app.contact:account-name') . " :" ) !!}
    @if($quote->account)
        <p>{!! $quote->account->name !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Phase Field -->
<div class="form-group">
    {!! Form::label('phase',  trans('app.general:phase') . " :" ) !!}
    <p>{!! $quote->phase !!}</p>
</div>

<!-- Contact Name Field -->
<div class="form-group">
    {!! Form::label('contact_name', trans('app.contact:name') . " :" ) !!}

    @if($quote->contact)
        <p>{!! $quote->contact->firstname !!} {!! $quote->contact->lastname !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Deadline Field -->
<div class="form-group">
    {!! Form::label('deadline', trans('app.general:deadline') . " :" ) !!}
    <p>{!! $quote->deadline !!}</p>
</div>

<!-- Contact Owner Field -->
<div class="form-group">
    {!! Form::label('contact_owner', trans('app.contact:owner') . " :" ) !!}
    @if($quote->user)
        <p>{!! $quote->user->name !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    <p>{!! $quote->description !!}</p>
</div>

<!-- Special Conditions Field -->
<div class="form-group">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" ) !!}
    <p>{!! $quote->special_conditions !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', trans('app.general:address') . " :" ) !!}
    <p>{!! $quote->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group">
    {!! Form::label('zipcode', trans('app.general:zipcode') . " :" ) !!}
    <p>{!! $quote->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', trans('app.general:city') . " :" ) !!}
    <p>{!! $quote->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', trans('app.general:country') . " :" ) !!}
    <p>{!! $quote->country !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" ) !!}
    <p>{!! $quote->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" ) !!}
    <p>{!! $quote->updated_at !!}</p>
</div>

