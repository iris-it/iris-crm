<div class="box box-primary">
    <div class="box-body">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', trans('app.general:name') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $tax->name !!}</span>
        </div>

        <!-- Value Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('value', trans('app.general:value') . " :" , ['class' => 'h4 text-purple']) !!}
            <span class="h4 text-bold">{!! $tax->value !!} %</span>
        </div>

        <!-- Is Active Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('is_active', trans('app.general:is-active') . " :"  , ['class' => 'h4 text-purple']) !!}
            @if($tax->is_active)
                <span class="h4 text-bold">{{trans('app.general:yes')}}</span>
            @else
                <span class="h4 text-bold">{{trans('app.general:no')}}</span>
            @endif
        </div>

    </div>
</div>