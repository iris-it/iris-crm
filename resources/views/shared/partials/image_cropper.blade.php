<input type="file" id="image_input" name="{{$input_file_name}}" class="form-control">
<input type="hidden" name="{{$input_crop_option}}" id="crop_options"/>

<div class="cropper-wrapper" id="cropper-wrapper" style="height: 400px">
    <img src="{{$base_image}}" class="img img-responsive">
</div>

@section('scripts')
    @parent
    <script>
        var $image = $('#cropper-wrapper > img');

        $('#image_input').change(function () {
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
