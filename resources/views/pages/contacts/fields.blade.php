<div class="form-group col-sm-12 text-center">
    {!! Form::label('office_id',  trans('app.contact:office-select') . " :") !!}
    <br>
    {!! Form::select('office_id', $offices, Request::get('office_id'), ['class' => 'form-control', (!Request::has('office_id'))?:'disabled']) !!}
</div>


<!-- Civility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('civility', trans('app.contact:civility') . ' :') !!}
    {!! Form::text('civility', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', trans('app.contact:lastname') . ' :') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname', trans('app.contact:firstname') . ' :') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post', trans('app.contact:post') . ' :') !!}
    {!! Form::text('post', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', trans('app.contact:email') . ' :') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', trans('app.contact:phone') . ' :') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>



<!-- Avatar Field -->
<div class="form-group col-sm-6">
{!! Form::label('avatar', trans('app.contact:avatar') . ' :') !!}
{!! Form::text('avatar', null, ['class' => 'form-control']) !!}
</div>



<!-- Free Label Field -->
<div class="form-group col-sm-6">
{!! Form::label('free_label', trans('app.general:free-input') . ' :') !!}
{!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
{!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
<a href="{!! action('ContactController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>
