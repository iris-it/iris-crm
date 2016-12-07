<div class="col-sm-6">
    <!-- Account Name Field -->
    <div class="form-group">
        {!! Form::label('name',  trans('app.general:name') . ' :') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Website Field -->
    <div class="form-group">
        {!! Form::label('website', trans('app.general:website') . ' :') !!}
        {!! Form::text('website', null,['class' => 'form-control']) !!}
    </div>

</div>

<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('logo', trans('app.general:logo') . ' :') !!}
        @include('shared.partials.image_cropper',['base_image' => asset($lead->logo), 'input_file_name' => 'image', 'input_crop_option'=> 'crop_options'])
    </div>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('LeadController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>


