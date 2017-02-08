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
            <input type='text' name="text_color" id="text-color"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="bg-color" class="h4 text-purple">{{trans('app.template:bg-color')}} : </label>
            <br>
            <input type='text' name="bg_color" id="bg-color"/>
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
                    value: "{{asset("build/css/images/logo-placeholder.png")}}",
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
                    value: "{{asset("build/css/images/fr-content-ph.png")}}",
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

            let contentCanvas = new CanvasDocBuilder('render', {imageSmoothingEnabled: false, enableRetinaScaling: true}, {}, {
                texts: texts,
                images: images,
            });

            contentCanvas.setGrid(15)
                .addTexts(texts)
                .addImages(images)
                .setObjectSelectionBehaviour("iris_identifier", "content_ph", "container");

            let menuCanvas = new CanvasDocBuilder('items', {imageSmoothingEnabled: false, enableRetinaScaling: true}, {}, {
                texts: texts,
                images: images,
            });

            menuCanvas.setObjectSelectionBehaviour("iris_identifier", "content_ph", "menu");


            contentCanvas.setMainContainerBehaviour({
                idProperty: 'iris_identifier',
                typeProperty: 'iris_type',
                excludedId: 'custom',
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


            $("#template-form").submit(function (e) {

                e.preventDefault();

                if ($('#name').val() == "") {
                    $("html, body").animate({scrollTop: 0}, "slow");
                    $('#name-label').prepend('<p class="h5 text-red animated flash" id="name-warning"> Un nom doit être renseigné pour ce template</p>');
                    return false;
                }

                contentCanvas.saveToJSON(['iris_identifier', 'iris_type'], '#content');
                this.submit();
            });


        });


    </script>


@endsection