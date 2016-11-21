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
    <!-- Website Field -->
    <div class="form-group">
        {!! Form::label('logo', trans('app.general:logo') . ' :') !!}
        <input type="file" name="logo" id="logo" onchange="loadFile(event)" class="form-control">
    </div>

    <!-- Image preview -->
    <img id="logo-image" class="img img-responsive" width="100" height="100"/>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>

@section('scripts')
    @parent
    <script>
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('logo-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
