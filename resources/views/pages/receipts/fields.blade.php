<!-- Topic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic', trans('app.general:topic') . " :" ) !!}
    {!! Form::text('topic', null, ['class' => 'form-control']) !!}
</div>

<!-- Supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier', trans('app.order:supplier') . " :" ) !!}
    {!! Form::text('supplier', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_date', trans('app.order:order-date') . " :" )  !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('order_date', null, ['class' => 'form-control', 'id' => 'order_date']) !!}
    </div>
</div>

<!-- Delivery Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_deadline', trans('app.order:deli-dead') . " :" ) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('delivery_deadline', null, ['class' => 'form-control', 'id' => 'delivery_deadline']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :" ) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Special Conditions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" ) !!}
    {!! Form::text('special_conditions', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', trans('app.general:address') . " :" ) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', trans('app.general:zipcode') . " :" ) !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', trans('app.general:city') . " :" ) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', trans('app.general:country') . " :" ) !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('OrderController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>
