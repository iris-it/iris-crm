    <!-- Account Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name',  trans('app.general:name') . ' :', ['class' => 'h4 text-purple']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Website Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('website', trans('app.general:website') . ' :', ['class' => 'h4 text-purple']) !!}
        {!! Form::text('website', null,['class' => 'form-control']) !!}
    </div>


    <div class="form-group col-sm-6">
        {!! Form::label('logo', trans('app.general:logo') . ' :', ['class' => 'h4 text-purple']) !!}
        @include('shared.partials.image_cropper',['base_image' => asset($account->logo), 'input_file_name' => 'image', 'input_crop_option'=> 'crop_options'])
    </div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    @if(isset($account))
        @if(!$account->is_lead)
            <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
        @else
            <a href="{!! action('LeadController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
        @endif
    @else
        @if(!$isLead)
            <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
        @else
            <a href="{!! action('LeadController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
        @endif
    @endif
</div>


