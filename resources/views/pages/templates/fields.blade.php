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
            <label for="text-color" class="h4 text-purple">{{trans('app.template:text-color')}} : </label>
            <br>
            <input type='text' id="text-color"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="bg-color" class="h4 text-purple">{{trans('app.template:bg-color')}} : </label>
            <br>
            <input type='text' id="bg-color"/>
        </div>

        <input type="hidden" id="content" name="content"/>
        

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

            let canvas = new fabric.Canvas('render', {
                imageSmoothingEnabled: false,
                enableRetinaScaling: true,

            });

            let itemsCanvas = new fabric.Canvas('items', {
                imageSmoothingEnabled: false,
                enableRetinaScaling: true,

            });


            // create grid
            let grid_size = 15;

            //create elements
            let texts = [
                {
                    value: "Numéro d'identification",
                    iris_type: "label",
                    iris_identifier: "id_number",
                    left: 50,
                    top: 20,
                    fontSize: 20,
                    fill: "black",
                    menu_left: 10,
                    menu_top: 20,
                    menu_fontSize: 20,
                    fontFamily: 'Calibri',
                    fontWeight: 'normal',
                    hasRotatingPoint: false
                },

                {
                    value: "Nom de votre entreprise",
                    iris_type: "label",
                    iris_identifier: "orga_name",
                    left: 50,
                    top: 250,
                    fontSize: 25,
                    fill: "black",
                    fontWeight: 'bold',
                    menu_left: 10,
                    menu_top: 50,
                    menu_fontSize: 20,
                    fontFamily: 'Calibri',
                    menu_fontWeight: 'normal',
                    hasRotatingPoint: false
                },

                {
                    value: "Statut : XXXX",
                    iris_type: "label",
                    iris_identifier: "orga_stat",
                    left: 50,
                    top: 300,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 80,
                    menu_fontSize: 20,
                    hasRotatingPoint: false
                },

                {
                    value: "N° SIRET : XXX XXX XXX XXXXX",
                    iris_type: "label",
                    iris_identifier: "orga_siret",
                    left: 50,
                    top: 330,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 110,
                    menu_fontSize: 20,
                    hasRotatingPoint: false
                },

                {
                    value: "N° APE : XXXXX",
                    iris_type: "label",
                    iris_identifier: "orga_ape",
                    left: 50,
                    top: 360,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 140,
                    menu_fontSize: 20,
                    hasRotatingPoint: false
                },

                {
                    value: "Email : mail@domain.com",
                    iris_type: "label",
                    iris_identifier: "orga_email",
                    left: 50,
                    top: 390,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 170,
                    menu_fontSize: 20,
                    hasRotatingPoint: false
                },

                {
                    value: "Adresse : Ligne 1 + Ligne 2 + CP + Ville + Pays",
                    iris_type: "label",
                    iris_identifier: "orga_address",
                    left: 50,
                    top: 420,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_value: "Adresse de votre entreprise",
                    menu_left: 10,
                    menu_top: 200,
                    menu_fontSize: 20,
                    hasRotatingPoint: false
                },

                {
                    value: "N° TVA : FRXX XXX XXX XXX",
                    iris_type: "label",
                    iris_identifier: "orga_tva",
                    left: 50,
                    top: 450,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 230,
                    menu_fontSize: 20,
                    hasRotatingPoint: false
                },

                {
                    value: "Nom du client",
                    iris_type: "label",
                    iris_identifier: "client_name",
                    left: 850,
                    top: 250,
                    fontSize: 25,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 260,
                    menu_fontSize: 20,
                    hasRotatingPoint: false,
                    fontWeight: 'bold'
                },


                {
                    value: "Statut client : XXXX",
                    iris_type: "label",
                    iris_identifier: "client_stat",
                    left: 850,
                    top: 300,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 290,
                    menu_fontSize: 20,
                    hasRotatingPoint: false
                },

                {
                    value: "N° SIRET client : XXX XXX XXX XXXXX",
                    iris_type: "label",
                    iris_identifier: "client_siret",
                    left: 850,
                    top: 330,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_value: "N° SIRET client",
                    menu_left: 10,
                    menu_top: 320,
                    menu_fontSize: 20,
                },

                {
                    value: "N° APE client : XXXXX",
                    iris_type: "label",
                    iris_identifier: "client_ape",
                    left: 850,
                    top: 360,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 350,
                    menu_fontSize: 20,
                },

                {
                    value: "Email client : mail@domain.com",
                    iris_type: "label",
                    iris_identifier: "client_email",
                    left: 850,
                    top: 390,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 380,
                    menu_fontSize: 20,
                },

                {
                    value: "Adresse client : Ligne 1 + Ligne 2 ...",
                    iris_type: "label",
                    iris_identifier: "client_address",
                    left: 850,
                    top: 420,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_value: "Adresse client",
                    menu_left: 10,
                    menu_top: 410,
                    menu_fontSize: 20,
                },

                {
                    value: "N° TVA client : FRXX XXX XXX XXX",
                    iris_type: "label",
                    iris_identifier: "client_tva",
                    left: 850,
                    top: 450,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 440,
                    menu_fontSize: 20,
                },

                {
                    value: "Date : Fait le JJ Mois AAAA à XXXXXXX",
                    iris_type: "label",
                    iris_identifier: "date",
                    left: 850,
                    top: 1000,
                    fontSize: 19,
                    fill: "black",
                    fontFamily: 'Calibri',
                    menu_value: "Date et lieu du document",
                    menu_left: 10,
                    menu_top: 470,
                    menu_fontSize: 20,
                },

            ];

            let images = [
                {
                    value: "{{asset("img/logo-placeholder.png")}}",
                    iris_type: "image",
                    iris_identifier: "orga_logo",
                    left: 610,
                    top: 150,
                    width: 240,
                    height: 160,
                    originX: "center",
                    originY: "center",
                    menu_left: 80,
                    menu_top: 580,
                    menu_width: 120,
                    menu_height: 80,
                    hasControls: true,
                    hasRotatingPoint: false,
                    selectable: true
                },

                {
                    value: "{{asset("img/fr-content-ph.png")}}",
                    iris_type: "content",
                    iris_identifier: "content_ph",
                    left: 610,
                    top: 700,
                    originX: "center",
                    originY: "center",
                    hasBorders: false,
                    hasControls: false,
                    hasRotatingPoint: false,
                    selectable: false
                }

            ];

            texts.forEach(function (textObject) {
                canvas.add(new fabric.Text(textObject.value, textObject));
            });

            images.forEach(function (imageObject) {
                fabric.Image.fromURL(imageObject.value, function (image) {

                    let item = image.set({
                        iris_type: imageObject.iris_type,
                        iris_identifier: imageObject.iris_identifier,
                        left: imageObject.left,
                        top: imageObject.top,
                        originX: imageObject.originX,
                        originY: imageObject.originY,
                        hasBorders: imageObject.hasBorders,
                        hasControls: imageObject.hasControls,
                        hasRotatingPoint: imageObject.hasRotatingPoint,
                        selectable: imageObject.selectable
                    });

                    canvas.add(item);
                });

            });


            canvas.on('object:selected', function (e) {
                if (e.target.iris_identifier !== "content_ph" && !e.target._objects) {

                    var container = e.target.canvas.contextContainer.canvas.offsetParent;
                    addDeleteBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                    addZIndexButtons(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);

                }
            });

            canvas.on('mouse:down', function (e) {
                if (!canvas.getActiveObject()) {
                    $(".deleteBtn").remove();
                    $(".upBtn").remove();
                    $(".downBtn").remove();
                }
            });

            canvas.on('object:modified', function (e) {
                if (e.target.iris_identifier !== "content_ph") {
                    var container = e.target.canvas.contextContainer.canvas.offsetParent;
                    addDeleteBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                    addZIndexButtons(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);

                }
            });

            canvas.on('object:scaling', function (e) {
                $(".deleteBtn").remove();
                $(".upBtn").remove();
                $(".downBtn").remove();
            });
            canvas.on('object:moving', function (e) {
                $(".deleteBtn").remove();
                $(".upBtn").remove();
                $(".downBtn").remove();
            });
            canvas.on('object:rotating', function (e) {
                $(".deleteBtn").remove();
                $(".upBtn").remove();
                $(".downBtn").remove();
            });

            $(document).on('click', ".deleteBtn", function () {

                target = canvas.getActiveObject();

                if (target) {

                    if (target.iris_identifier != "custom") {
                        cloneItem(target, itemsCanvas, "remove");
                    }

                    canvas.remove(target);
                    $(".upBtn").remove();
                    $(".downBtn").remove();
                    $(".deleteBtn").remove();
                }
            });

            $(document).on('click', ".upBtn", function () {

                target = canvas.getActiveObject();
                target.bringForward();
                showToast('Élément élevé au plan n° ' + canvas.getObjects().indexOf(target));


            });

            $(document).on('click', ".downBtn", function () {

                target = canvas.getActiveObject();
                target.sendBackwards();
                showToast('Élément ramené au plan n° ' + canvas.getObjects().indexOf(target));

            });

            $(document).on('click', "#custom-text-btn", function () {

                let value = $('#text-value').val();

                canvas.add(new fabric.Text(value, {

                    iris_type: "label",
                    iris_identifier: "custom",
                    left: 880,
                    top: 70,
                    originX: "center",
                    originY: "center",
                    fontSize: 19,
                    fontFamily: 'Calibri',
                }));

                $("html, body").animate({scrollTop: 100}, "slow");

            });

            $('#image-file').change(function (e) {

                var reader = new FileReader();
                reader.onload = function (event) {
                    var imgObj = new Image();
                    imgObj.src = event.target.result;
                    imgObj.onload = function () {
                        var image = new fabric.Image(imgObj);
                        image.set({
                            iris_type: "image",
                            iris_identifier: "custom",
                            left: 610,
                            top: 350,
                            width: 240,
                            height: 160,
                            originX: "center",
                            originY: "center",
                            hasControls: true,
                            hasRotatingPoint: false,
                            selectable: true
                        });

                        canvas.add(image);
                    }
                };

                reader.readAsDataURL(e.target.files[0]);
            });

            $('#text-color').val("#000000");

            $('#text-color').change(function (e) {

                canvas._objects.forEach(function(object) {
                    if(object.iris_type == "label") {
                        object.setColor($('#text-color').val());
                    }
                    canvas.renderAll();
                });

            });

            $('#bg-color').val("#FFFFFF");

            $('#bg-color').change(function (e) {

                canvas.backgroundColor = $('#bg-color').val();
                canvas.renderAll();
                console.log(canvas);


            });

            itemsCanvas.on('object:selected', function (e) {

                var container = e.target.canvas.contextContainer.canvas.offsetParent;
                addAddBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);

            });

            itemsCanvas.on('mouse:down', function (e) {
                if (!itemsCanvas.getActiveObject()) {
                    $(".addBtn").remove();
                }
            });

            itemsCanvas.on('object:modified', function (e) {
                var container = e.target.canvas.contextContainer.canvas.offsetParent;
                addAddBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);
            });

            itemsCanvas.on('object:scaling', function (e) {
                $(".addBtn").remove();
            });
            itemsCanvas.on('object:moving', function (e) {
                $(".addBtn").remove();
            });
            itemsCanvas.on('object:rotating', function (e) {
                $(".addBtn").remove();
            });

            $(document).on('click', ".addBtn", function () {
                if (itemsCanvas.getActiveObject()) {

                    cloneItem(itemsCanvas.getActiveObject(), canvas, "add");
                    itemsCanvas.remove(itemsCanvas.getActiveObject());
                    $(".addBtn").remove();
                }
            });


            // snap to grid

            canvas.on('object:moving', function (options) {
                options.target.set({
                    left: Math.round(options.target.left / grid_size) * grid_size,
                    top: Math.round(options.target.top / grid_size) * grid_size
                });
            });

            // JSON without default values
            canvas.includeDefaultValues = false;


            $("#template-form").submit(function (e) {

                e.preventDefault();

                if ($('#name').val() == "") {
                    $("html, body").animate({scrollTop: 0}, "slow");
                    $('#name-label').prepend('<p class="h5 text-red animated flash" id="name-warning"> Un nom doit être renseigné pour ce template</p>');
                    return false;
                }

                let json = canvas.toJSON(['iris_identifier', 'iris_type']);
                $('#content').val(JSON.stringify(json));

                this.submit();
            });


            // add delete button

            function addDeleteBtn(container, x, y) {
                $(".deleteBtn").remove();
                var btnLeft = x - 10;
                var btnTop = y - 10;
                var deleteBtn = '<img src="{{asset("img/close-button.png")}}" class="deleteBtn" style="position:absolute;top:' + btnTop + 'px;left:' + btnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
                $(container).append(deleteBtn);
            }

            // add up and down button for z-index control

            function addZIndexButtons(container, x, y) {
                $(".upBtn").remove();
                $(".downBtn").remove();
                var upBtnLeft = x - 40;
                var upBtnTop = y - 10;
                var downBtnLeft = x - 60;
                var downBtnTop = y - 10;

                var upBtn = '<img src="{{asset("img/up-button.png")}}" class="upBtn" style="position:absolute;top:' + upBtnTop + 'px;left:' + upBtnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
                var downBtn = '<img src="{{asset("img/down-button.png")}}" class="downBtn" style="position:absolute;top:' + downBtnTop + 'px;left:' + downBtnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
                $(container).append(upBtn);
                $(container).append(downBtn);

            }

            // add add button

            function addAddBtn(container, x, y) {
                $(".addBtn").remove();
                var btnLeft = x - 10;
                var btnTop = y - 10;
                var addBtn = '<img src="{{asset("img/add-button.png")}}" class="addBtn" style="position:absolute;top:' + btnTop + 'px;left:' + btnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
                $(container).append(addBtn);
            }

            // color pickers

            $("#text-color").spectrum({
                color: "black",
                showInput: true,
                showPalette: true,
                palette: [],
                showButtons: false,
                preferredFormat: "hex",

            });

            $("#bg-color").spectrum({
                color: "white",
                showInput: true,
                showPalette: true,
                palette: [],
                showButtons: false,
                preferredFormat: "hex",


            });
            // clone item to another canvas

            function cloneItem(item, destCanvas, type) {

                if (item.iris_type == "label") {
                    var result = texts.filter(function (obj) {
                        return obj.iris_identifier == item.iris_identifier;
                    });
                }
                else if (item.iris_type == "image") {
                    var result = images.filter(function (obj) {
                        return obj.iris_identifier == item.iris_identifier;
                    })
                }

                let model = result[0];


                var clone = fabric.util.object.clone(item);

                if (type === "remove") {
                    clone.set({left: model.menu_left, top: model.menu_top});

                    if (item.iris_type == "label") {

                        clone.set({fontSize: model.menu_fontSize, fontWeight: model.menu_fontWeight, fill: model.fill});
                        console.log(clone);
                        if (model.menu_value) {
                            clone.setText(model.menu_value);
                        }
                    }

                    else if (item.iris_type == "image") {
                        clone.set({top: model.menu_top, left: model.menu_left});
                        clone.scaleToWidth(model.menu_width);
                        clone.scaleToHeight(model.menu_height);
                    }
                }
                else if (type === "add") {
                    clone.set({left: model.left, top: model.top});

                    if (item.iris_type == "label") {
                        clone.set({fontSize: model.fontSize, fontWeight: model.fontWeight, fill: $('#text-color').val()});
                        clone.setText(model.value);
                    }
                    else if (item.iris_type == "image") {
                        clone.set({top: model.top, left: model.left});
                        clone.scaleToWidth(model.width);
                        clone.scaleToHeight(model.height);
                    }
                }
                destCanvas.add(clone);

            }

            function showToast(message) {
                toastr.clear();
                toastr.options = {timeOut: 2500, preventDuplicates: true, positionClass: "toast-bottom-full-width"};
                toastr.info(message);
            }

        });


    </script>


@endsection