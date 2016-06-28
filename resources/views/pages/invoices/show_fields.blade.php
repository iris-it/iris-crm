<!-- Topic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic', trans('app.general:topic') . " :" ) !!}
    <p>{!! $invoice->topic !!}</p>
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', trans('app.contact:account-name') . " :" ) !!}
    @if($invoice->account)
        <p>{!! $invoice->account->name !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Phase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phase', trans('app.general:phase') . " :" ) !!}
    <p>{!! $invoice->phase !!}</p>
</div>

<!-- Contact Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_name', trans('app.contact:name') . " :" ) !!}
    @if($invoice->contact)
        <p>{!! $invoice->contact->firstname . " " . $invoice->contact->lastname !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', trans('app.general:deadline') . " :" ) !!}
    <p>{!! $invoice->deadline !!}</p>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    <p>{!! $invoice->description !!}</p>
</div>

<!-- Special Conditions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" ) !!}
    <p>{!! $invoice->special_conditions !!}</p>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', trans('app.general:address') . " :" ) !!}
    <p>{!! $invoice->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', trans('app.general:zipcode') . " :" ) !!}
    <p>{!! $invoice->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', trans('app.general:city') . " :" )!!}
    <p>{!! $invoice->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', trans('app.general:country') . " :" ) !!}
    <p>{!! $invoice->country !!}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('quote_name', trans('app.general:quote') . " :") !!}
    @if($invoice->quote)
        <p>{!! $invoice->quote->topic !!}</p>
    @else
        <p>{{trans('app.general:undefined')}}</p>
    @endif
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" ) !!}
    <p>{!! $invoice->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" ) !!}
    <p>{!! $invoice->updated_at !!}</p>
</div>

