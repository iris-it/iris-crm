<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.general:general-info') }}</h3>
    </div>

    <div class="box-body">

        <div class="form-group col-sm-6">
            {!! Form::label('name', trans('app.template:name') . " :", ['class' => 'h4 text-purple', 'id' => 'name-label'] ) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <input type="hidden" id="content" name="content"/>

    </div>
</div>

<div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">{{trans('app.template:customization')}}</h3>
    </div>

    <div class="box-body">
        <div class="col-md-9">
            <canvas id="render" width="1220" height="1237" style="border: 1px solid rgb(204, 204, 204); position: absolute; width: 1200px; height: 1237px; left: 0px; top: 0px; user-select: none;" class="lower-canvas"></canvas>
        </div>
        <div class="col-md-2" style="margin-left:3%">
            <canvas id="items" width="300" height="1237" style="border: 1px solid rgb(204, 204, 204); position: absolute; width: 300px; height: 1237px; left: 0px; top: 0px; user-select: none;" class="lower-canvas"></canvas>

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
                    fontFamily: 'Calibri',
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
                    fontFamily: 'Calibri',
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
                    fontFamily: 'Calibri',
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
                    fontFamily: 'Calibri',
                    menu_left: 10,
                    menu_top: 470,
                    menu_fontSize: 20,
                },


            ];

            texts.forEach(function (textObject) {
                canvas.add(new fabric.Text(textObject.value, textObject));
            });


            fabric.Image.fromURL("{{asset("img/logo-placeholder.png")}}", function (image) {
                let logoImage = image.set({
                    iris_type: "image",
                    iris_identifier: "orga_logo",
                    left: 610,
                    top: 150,
                    originX: "center",
                    originY: "center",
                    hasRotatingPoint: false
                });
                canvas.add(logoImage);

            });

            fabric.Image.fromURL("{{asset("img/fr-content-ph.png")}}", function (image) {
                let contentImage = image.set({
                    iris_type: "content",
                    iris_identifier: "content_ph",
                    left: 610,
                    top: 700,
                    originX: "center",
                    originY: "center",
                    hasBorders: false,
                    hasControls: false,
                    hasRotatingPoint: false
                });
                canvas.add(contentImage);

            });


            canvas.on('object:selected', function (e) {
                if (e.target.iris_identifier !== "content_ph") {
                    var container = e.target.canvas.contextContainer.canvas.offsetParent;
                    addDeleteBtn(container, e.target.oCoords.tr.x, e.target.oCoords.tr.y);

                }
            });

            canvas.on('mouse:down', function (e) {
                if (!canvas.getActiveObject()) {
                    $(".deleteBtn").remove();
                }
            });

            canvas.on('object:modified', function (e) {
                if (e.target.iris_identifier !== "content_ph") {
                    var container = e.target.canvas.contextContainer.canvas.offsetParent;
                    addDeleteBtn(container,e.target.oCoords.tr.x, e.target.oCoords.tr.y);
                }
            });

            canvas.on('object:scaling', function (e) {
                $(".deleteBtn").remove();
            });
            canvas.on('object:moving', function (e) {
                $(".deleteBtn").remove();
            });
            canvas.on('object:rotating', function (e) {
                $(".deleteBtn").remove();
            });
            $(document).on('click', ".deleteBtn", function () {
                if (canvas.getActiveObject()) {

                    cloneItem(canvas.getActiveObject(), itemsCanvas, "remove");
                    canvas.remove(canvas.getActiveObject());
                    $(".deleteBtn").remove();
                }
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

            // add add button

            function addAddBtn(container, x, y) {
                $(".addBtn").remove();
                var btnLeft = x - 10;
                var btnTop = y - 10;
                var addBtn = '<img src="{{asset("img/add-button.png")}}" class="addBtn" style="position:absolute;top:' + btnTop + 'px;left:' + btnLeft + 'px;cursor:pointer;width:20px;height:20px;"/>';
                $(container).append(addBtn);
            }

            // clone item to another canvas

            function cloneItem(item, destCanvas, type) {

                let result = texts.filter(function (obj) {
                    return obj.iris_identifier == item.iris_identifier;
                });

                let model = result[0];

                var clone = fabric.util.object.clone(item);

                if (type === "remove") {
                    clone.set({left: model.menu_left, top: model.menu_top});

                    if (item.iris_type == "label") {
                        clone.set({fontSize: model.menu_fontSize, fontWeight: model.menu_fontWeight});
                    }
                }
                else if (type === "add") {
                    clone.set({left: model.left, top: model.top});

                    if (item.iris_type == "label") {
                        clone.set({fontSize: model.fontSize, fontWeight: model.fontWeight});
                    }
                }

                destCanvas.add(clone);

            }

        });


    </script>


@endsection