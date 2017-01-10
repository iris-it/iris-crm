<div class="form-group col-sm-12 text-center">
    @if(Request::has('office_id'))
        {!! Form::label('office_id',  trans('app.contact:selected-office') . " :", ['class' => 'h4 text-purple']) !!}
    @else
        {!! Form::label('office_id',  trans('app.contact:office-select') . " :", ['class' => 'h4 text-purple']) !!}
    @endif
    <br>
    {!! Form::select('office_id', $offices, Request::get('office_id'), ['class' => 'form-control', (!Request::has('office_id'))?:'disabled']) !!}
</div>

<!-- Topic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic', trans('app.general:topic') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('topic', null, ['class' => 'form-control']) !!}
</div>


<!-- Phase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phase', trans('app.general:phase') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('phase', null, ['class' => 'form-control']) !!}
</div>

<!-- TODO : Fix datepicker -->

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', trans('app.general:deadline') . " :", ['class' => 'h4 text-purple'] ) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('deadline', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', trans('app.general:description') . " :", ['class' => 'h4 text-purple'] )!!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Special Conditions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('special_conditions', trans('app.general:special-conditions') . " :", ['class' => 'h4 text-purple'] ) !!}
    {!! Form::text('special_conditions', null, ['class' => 'form-control']) !!}
</div>

@if(Request::has('office_id'))
    {!! Form::hidden('office_id', Request::get('office_id')) !!}
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('QuoteController@index') !!}" class="btn btn-default">Cancel</a>
</div>

