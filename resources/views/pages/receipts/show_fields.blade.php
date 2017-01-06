<div class="box box-primary">
    <div class="box-body">

        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <!-- Topic Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('topic', trans('app.general:topic') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->topic !!}</span>
        </div>

        <!-- Supplier Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('supplier', trans('app.order:supplier') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->supplier !!}</span>
        </div>

        <!-- Order Date Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('order_date', trans('app.order:order-date') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->order_date !!}</span>
        </div>

        <!-- Delivery Deadline Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('delivery_deadline', trans('app.order:deli-dead') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->delivery_deadline !!}</span>
        </div>

        <!-- Description Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('description', trans('app.general:description') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->description !!}</span>
        </div>

        <!-- Special Conditions Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->special_conditions !!}</span>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:address')}}</h4>
        <hr>
        <!-- Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('address', trans('app.general:address') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->address !!}</span>
        </div>

        <!-- Zipcode Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('zipcode', trans('app.general:zipcode') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->zipcode !!}</span>
        </div>

        <!-- City Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('city', trans('app.general:city') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $order->city !!}</span>
        </div>

        <!-- Country Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('country', trans('app.general:country') . " :" , ['class' => 'h4 text-purple'])  !!}
            <span class="h4 text-bold">{!! $order->country !!}</span>
        </div>

    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <!-- Created At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('created_at', trans('app.general:created-at') . " :" , ['class' => 'h4 text-purple'])  !!}
            <span class="h4 text-bold">{!! $order->created_at !!}</span>
        </div>

        <!-- Updated At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('updated_at', trans('app.general:updated-at') . " :" , ['class' => 'h4 text-purple'])  !!}
            <span class="h4 text-bold">{!! $order->updated_at !!}</span>
        </div>
    </div>
</div>
