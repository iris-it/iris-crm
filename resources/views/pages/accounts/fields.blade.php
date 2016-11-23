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
        <input type="file" id="logo-input" name="image" class="form-control">
        <input type="hidden" name="crop_options" id="crop_options"/>

        <div class="cropper-wrapper" id="cropper-wrapper" style="height: 400px">
            <img src="{{asset($account->logo)}}" class="img img-responsive">
        </div>
    </div>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! action('AccountController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
</div>

@section('scripts')
    @parent
    <script>
        var $image = $('#cropper-wrapper > img');

        $('#logo-input').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    loadCropper(e);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        function loadCropper(e) {
            $image.attr('src', e.target.result);
            $image.cropper('destroy');
            $image.cropper({});
            $image.cropper('setAspectRatio', 1);
            $image.cropper('setDragMode', 'move');
            $image.on('zoom.cropper', function (e) {
                saveAsDataUrl();
            });
            $image.on('built.cropper', function (e) {
                saveAsDataUrl();
            });
            $image.on('cropend.cropper', function (e) {
                saveAsDataUrl();
            });

        }

        function saveAsDataUrl() {
            var datacrop = $image.cropper("getData");
            $("#crop_options").attr('value', JSON.stringify(datacrop));
        }
    </script>
@endsection
