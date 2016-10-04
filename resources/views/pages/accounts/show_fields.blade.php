<div class="box box-primary">
    <div class="box-body">
        <!-- Account Name Field -->
        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <div class="form-group col-sm-6">
            {!! Form::label('name', trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">  {!! $account->name !!}</span>
        </div>

        <!-- Type Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('type',trans('app.general:type') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->type !!}</span>
        </div>

        <!-- Activity Sector Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->activity_sector !!}</span>
        </div>

        <!-- Workforce Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('workforce', trans('app.general:workforce') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->workforce !!}</span>
        </div>

        <!-- Siret Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('siret_number', trans('app.general:siret-number') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->siret_number !!}</span>
        </div>

        <!-- Ape Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('ape_number', trans('app.general:ape-number') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->ape_number !!}</span>
        </div>

        <!-- Phone Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('phone_number', trans('app.general:phone-number') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->phone_number !!}</span>
        </div>


        <!-- Website Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('website', trans('app.general:website') . ' :', ['class' => 'h4 text-purple']) !!}
            <a href="{{$account->website}}" class="h4 text-bold"> {!! $account->website !!}</a>
        </div>

        <!-- Free Label Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('free_label', trans('app.general:free-input') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->free_label !!}</span>
        </div>


    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:billing-address')}}</h4>
        <hr>

        <div class="form-group col-sm-6">
            {!! Form::label('billing_address', trans('app.general:address') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->billing_address !!}</span>
        </div>

        <!-- Billing Zipcode Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_zipcode', trans('app.general:zipcode') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->billing_zipcode !!}</span>
        </div>

        <!-- Billing City Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_city', trans('app.general:city') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->billing_city !!}</span>
        </div>

        <!-- Billing Country Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('billing_country', trans('app.general:country') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->billing_country !!}</span>
        </div>


    </div>
</div>
<div class="box box-primary">
    <div class="box-body">
        <h4 class="box-title">{{trans('app.general:delivery-address')}}</h4>
        <hr>
        <!-- Delivery Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('delivery_address', trans('app.general:address') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->delivery_address !!}</span>
        </div>

        <!-- Delivery Zipcode Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('delivery_zipcode', trans('app.general:zipcode') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->delivery_zipcode !!}</span>
        </div>

        <!-- Delivery City Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('delivery_city', trans('app.general:city') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->delivery_city !!}</span>
        </div>

        <!-- Delivery Country Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('delivery_country', trans('app.general:country') . ' :', ['class' => 'h4 text-purple'])  !!}
            <span class="h4 text-bold"> {!! $account->delivery_country !!}</span>
        </div>

    </div>
</div>


<div class="box box-primary">
    <div class="box-body">

        <!-- Account Owner Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('account_owner', trans('app.general:account-owner') . ' :', ['class' => 'h4 text-purple']) !!}
            @if($account->user)
                <span class="h4 text-bold"> {!! $account->user->name !!}</span>
            @else
                <span class="h4 text-bold"> {{trans('app.general:undefined')}}</span>
            @endif
        </div>

        <!-- Is Active Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('is_active', trans('app.general:is-active') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->is_active !!}</span>
        </div>

        <!-- Created At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('created_at', trans('app.general:created-at') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->created_at !!}</span>
        </div>

        <!-- Updated At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('updated_at',  trans('app.general:updated-at') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold"> {!! $account->updated_at !!}</span>
        </div>
    </div>
</div>
