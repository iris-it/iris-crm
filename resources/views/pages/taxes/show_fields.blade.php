<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', trans('app.general:name') . " :" ) !!}
    <p>{!! $tax->name !!}</p>
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', trans('app.general:value') . " :" ) !!}
    <p>{!! $tax->value !!}</p>
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" ) !!}
    @if($tax->is_active)
        <p>{{trans('app.general:yes')}}</p>
    @else
        <p>{{trans('app.general:no')}}</p>
    @endif
</div>