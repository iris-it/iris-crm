<div class="form-group col-sm-12 text-center">
    @if(Request::has('office_id'))
        {!! Form::label('office_id',  trans('app.contact:selected-office') . " :", ['class' => 'h4 text-purple']) !!}
    @else
        {!! Form::label('office_id',  trans('app.contact:office-select') . " :", ['class' => 'h4 text-purple']) !!}
    @endif
    <br>
    {!! Form::select('office_id', $offices, Request::get('office_id'), ['class' => 'form-control', (!Request::has('office_id'))?:'disabled']) !!}
</div>


<!-- Civility Field -->
<div class="form-group col-sm-6">
    {!! Form::label('civility', trans('app.contact:civility') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('civility', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', trans('app.contact:lastname') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname', trans('app.contact:firstname') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post', trans('app.contact:post') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('post', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', trans('app.contact:email') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', trans('app.contact:phone') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>


<div class="col-sm-6">
    <!-- Avatar Field -->
    <div class="form-group">
        {!! Form::label('avatar', trans('app.contact:avatar') . ' :', ['class' => 'h4 text-purple']) !!}
        @if(isset($contact))
            @include('shared.partials.image_cropper',['base_image' => asset($contact->avatar), 'input_file_name' => 'avatar', 'input_crop_option'=> 'crop_options'])
        @else
            @include('shared.partials.image_cropper',['base_image' => '', 'input_file_name' => 'avatar', 'input_crop_option'=> 'crop_options'])
        @endif
    </div>

</div>


<!-- Free Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('free_label', trans('app.general:free-input') . ' :', ['class' => 'h4 text-purple']) !!}
    {!! Form::text('free_label', null, ['class' => 'form-control']) !!}
</div>


@if(Request::has('office_id'))
    {!! Form::hidden('office_id', Request::get('office_id')) !!}
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('ContactController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>
