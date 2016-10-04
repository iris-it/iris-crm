<div class="box box-primary">
    <div class="box-body">

        <h4 class="box-title">{{trans('app.general:general-info')}}</h4>
        <hr>
        <!-- Lead Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->name !!}</span>
        </div>

        <!-- Website Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('website',  trans('app.general:website') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->website !!}</span>
        </div>

        <!-- Activity Sector Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('activity_sector', trans('app.general:activity-sector') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->activity_sector !!}</span>
        </div>

        <!-- Workforce Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('workforce',  trans('app.general:workforce') . ' :', ['class' => 'h4 text-purple'])  !!}
            <span class="h4 text-bold">{!! $lead->workforce !!}</span>
        </div>

        <!-- Type Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('type', trans('app.general:type') . ' :' , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->type !!}</span>
        </div>

        <!-- Ape Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('ape_number', trans('app.general:ape-number') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->ape_number !!}</span>
        </div>

        <!-- Siret Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('siret_number', trans('app.general:siret-number') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->siret_number !!}</span>
        </div>

        <!-- Phone Number Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('phone_number',  trans('app.general:phone-number') . ' :', ['class' => 'h4 text-purple'])  !!}
            <span class="h4 text-bold">{!! $lead->phone_number !!}</span>
        </div>

        <!-- Status Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('status',  trans('app.general:status') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->status !!}</span>
        </div>

        <!-- Free Label Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('free_label', trans('app.general:free-input') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->free_label !!}</span>
        </div>


    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <!-- Account Name Field -->
        <h4 class="box-title">{{trans('app.general:address')}}</h4>
        <hr>


        <!-- Address Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('address', trans('app.general:address') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->address !!}</span>
        </div>

        <!-- Zipcode Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('zipcode', trans('app.general:zipcode') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->zipcode !!}</span>
        </div>

        <!-- City Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('city',  trans('app.general:city') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->city !!}</span>
        </div>

        <!-- Country Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('country', trans('app.general:country') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->country !!}</span>
        </div>

    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <!-- Account Owner Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('account_owner', trans('app.general:account-owner') . ' :', ['class' => 'h4 text-purple']) !!}
            @if($lead->user)
                <span class="h4 text-bold">{!! $lead->user->name !!}</span>
            @else
                <span class="h4 text-bold">{{trans('app.general:undefined')}}</span>
            @endif
        </div>

        <!-- Created At Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('created_at', trans('app.general:created-at') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->created_at !!}</span>
        </div>

        <!-- Updated At Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('updated_at', trans('app.general:updated-at') . ' :', ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $lead->updated_at !!}</span>
        </div>

    </div>
</div>
