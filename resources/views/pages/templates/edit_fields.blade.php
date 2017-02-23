<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.general:general-info') }}</h3>
    </div>

    <div class="box-body">

        <div class="form-group col-sm-4">
            {!! Form::label('name', trans('app.template:name') . " :", ['class' => 'h4 text-purple', 'id' => 'name-label'] ) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col-sm-4">
            <label for="text_color" class="h4 text-purple">{{trans('app.template:text-color')}} : </label>
            <br>
            <input type='text' name="text_color" value="{{$template->text_color}}" id="text-color"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="bg-color" class="h4 text-purple">{{trans('app.template:bg-color')}} : </label>
            <br>
            <input type='text' name="bg_color" value="{{$template->bg_color}}" id="bg-color"/>
        </div>

        <input type="hidden" id="content" name="content" value="{{$template->content}}"/>
        <input type="hidden" id="canvas_height" name="canvas_height"/>
        <input type="hidden" id="canvas_width" name="canvas_width"/>

    </div>
</div>

<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title text-purple" style="margin-left:35%">{{trans('app.template:customization')}}</h3>
        <h3 class="box-title text-purple" style="margin-left:42.5%">{{trans('app.template:items')}}</h3>
    </div>

    <div class="box-body">
        <div class="col-md-9">
            <canvas id="render" width="1220" height="1237" style="border: 1px solid rgb(204, 204, 204); position: absolute; width: 1200px; height: 1237px; left: 0px; top: 0px; user-select: none;" class="lower-canvas"></canvas>
        </div>
        <div class="col-md-2" style="margin-left:3%">
            <canvas id="items" width="300" height="640" style="border: 1px solid rgb(204, 204, 204); position: absolute; width: 300px; height: 640px; left: 0px; top: 0px; user-select: none;" class="lower-canvas"></canvas>
            <div id="custom-items" style="border: 1px solid rgb(204, 204, 204); position: absolute; width: 300px; height: 588px; left: 15px; top: 650px; user-select: none;" class="lower-canvas">

                <h4 class="text-purple text-center">{{trans('app.template:custom-items')}}</h4>

                <br>

                <div class="form-group col-md-12">
                    <h4 class="text-purple text-center">{{trans('app.general:text')}} : </h4>
                    <br>
                    <input type="text" class="form-control" id="text-value">
                    <button type="button" class="btn btn-primary btn-flat pull-right" id="custom-text-btn" style="margin-top:4%"> {{trans('app.general:add')}} </button>
                </div>

                <div class="form-group col-md-12">
                    <h4 class="text-purple text-center">{{trans('app.general:image')}} : </h4>
                    <br>
                    <input type="file" id="image-file"/>
                    <br>
                </div>

            </div>

        </div>
        <div class="row">
            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit( trans('app.general:save-changes'), ['class' => 'btn btn-primary']) !!}
                <a href="{!! action('TemplateController@index') !!}" class="btn btn-default">{{trans('app.general:cancel')}}</a>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">

        $(document).ready(function () {

            $("#name").focusin(function () {

                $('#name-warning').fadeOut(800, function () {
                    $(this).remove();
                });
            });

            //create elements
            let texts = [];
            let images = [];
            let jsonTemplate = null;
            let contentCanvas = null;
            let menuCanvas = null;

            $.getJSON("{{asset('build/json/template.json')}}", function (json) {
                texts = json.texts;
                images = json.images;
                init_canvas()
            });

            function init_canvas() {

                contentCanvas = new CanvasDocBuilder('render', {imageSmoothingEnabled: false, enableRetinaScaling: true}, {}, {
                    texts: texts,
                    images: images,
                });

                jsonTemplate = $('#content').val();

                console.log(jsonTemplate);

                contentCanvas.setGrid(15)
                    .setObjectSelectionBehaviour("iris_identifier", "iris_type", "label", "content_ph", "container")
                    .loadJSON(jsonTemplate);


                menuCanvas = new CanvasDocBuilder('items', {imageSmoothingEnabled: false, enableRetinaScaling: true}, {}, {
                    texts: texts,
                    images: images,
                });

                let removedTexts = menuCanvas.getRemovedItems(jsonTemplate, "texts", "iris_identifier");

                let removedImages = menuCanvas.getRemovedItems(jsonTemplate, "images", "iris_identifier");

                menuCanvas.loadRemovedTexts(removedTexts, "iris_identifier", "content_ph", {
                    value: "menu_value",
                    iris_type: "iris_type",
                    iris_identifier: "iris_identifier",
                    left: "menu_left",
                    top: "menu_top",
                    fontSize: "menu_fontSize",
                    fill: "fill",
                    fontFamily: "fontFamily",
                    fontWeight: "menu_fontWeight",
                    hasRotatingPoint: false,
                    hasControls: false,
                });

                menuCanvas.loadRemovedImages(removedImages, "iris_identifier", "content_ph", {
                    top: "menu_top",
                    left: "menu_left",
                    width: "menu_width",
                    height: "menu_height",

                });


                menuCanvas.setObjectSelectionBehaviour("iris_identifier", "iris_type", "label", "content_ph", "menu");

                contentCanvas.setMainContainerBehaviour({
                    idProperty: 'iris_identifier',
                    typeProperty: 'iris_type',
                    excludedId: 'custom',
                    edit: true,
                    destCanvas: menuCanvas.getCanvas()
                });

                contentCanvas.setCustomContainerBehaviour({

                        iris_type: "label",
                        iris_identifier: "custom",
                        left: 880,
                        top: 70,
                        originX: "center",
                        originY: "center",
                        fontSize: 19,
                        fontFamily: 'Calibri',
                    },
                    {
                        iris_type: "image",
                        iris_identifier: "custom",
                        left: 610,
                        top: 350,
                        originX: "center",
                        originY: "center",
                        hasControls: true,
                        hasRotatingPoint: true,
                        selectable: true
                    });


                menuCanvas.setMenuContainerBehaviour(contentCanvas.getCanvas());

            }

            $("#template-form").submit(function (e) {

                e.preventDefault();

                if ($('#name').val() == "") {
                    $("html, body").animate({scrollTop: 0}, "slow");
                    $('#name-label').prepend('<p class="h5 text-red animated flash" id="name-warning"> Un nom doit être renseigné pour ce template</p>');
                    return false;
                }

                $('#canvas_height').val($('#render').attr('height'));
                $('#canvas_width').val($('#render').attr('width'));

                contentCanvas.saveToJSON(['iris_identifier', 'iris_type'], '#content');
                this.submit();
            });

        });
    </script>

@endsection