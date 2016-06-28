<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', trans('app.general:name') . " :" ) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', trans('app.general:value') . " :" ) !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', trans('app.general:is-active') . " :" ) !!}
    {!! Form::checkbox('is_active', true, true) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('taxes.index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>