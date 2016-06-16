
<!-- Topic Field -->
<div class="form-group">
    {!! Form::label('topic', trans('app.general:topic') . " :" ) !!}
    <p>{!! $order->topic !!}</p>
</div>

<!-- Supplier Field -->
<div class="form-group">
    {!! Form::label('supplier', trans('app.order:supplier') . " :" ) !!}
    <p>{!! $order->supplier !!}</p>
</div>

<!-- Order Date Field -->
<div class="form-group">
    {!! Form::label('order_date', trans('app.order:order-date') . " :" ) !!}
    <p>{!! $order->order_date !!}</p>
</div>

<!-- Delivery Deadline Field -->
<div class="form-group">
    {!! Form::label('delivery_deadline', trans('app.order:deli-dead') . " :" ) !!}
    <p>{!! $order->delivery_deadline !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    <p>{!! $order->description !!}</p>
</div>

<!-- Special Conditions Field -->
<div class="form-group">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" ) !!}
    <p>{!! $order->special_conditions !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', trans('app.general:address') . " :" ) !!}
    <p>{!! $order->address !!}</p>
</div>

<!-- Zipcode Field -->
<div class="form-group">
    {!! Form::label('zipcode', trans('app.general:zipcode') . " :" ) !!}
    <p>{!! $order->zipcode !!}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', trans('app.general:city') . " :" ) !!}
    <p>{!! $order->city !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', trans('app.general:country') . " :" )  !!}
    <p>{!! $order->country !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', trans('app.general:created-at') . " :" )  !!}
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', trans('app.general:updated-at') . " :" )  !!}
    <p>{!! $order->updated_at !!}</p>
</div>

