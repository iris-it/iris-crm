@extends('layouts.app')

@section('content')

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{trans('app.template:manage') }}</h3>
            </div>
            <div class="box-body">
                <canvas id="c" width="1220" height="1237" style="border: 1px solid rgb(204, 204, 204); position: absolute; width: 1200px; height: 700px; left: 0px; top: 0px; user-select: none;" class="lower-canvas"></canvas>
            </div>
        </div>

    </section>

@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        $(document).ready(function () {

            let canvas = new fabric.Canvas('c', {
                imageSmoothingEnabled: false,
                enableRetinaScaling: true,

            });

            let grid = 15;

            // create grid

            for (let i = 0; i < (1220 / grid); i++) {
                canvas.add(new fabric.Line([i * grid, 0, i * grid, 1220], {stroke: '#fff', selectable: false}));
                canvas.add(new fabric.Line([0, i * grid, 1237, i * grid], {stroke: '#fff', selectable: false}))
            }


            let texts = [
                {
                    value: "Numéro d'identification",
                    iris_type: "label",
                    iris_identifier: "id_number",
                    left: 50,
                    top: 20,
                    fontSize: 20,
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
                    fontFamily: 'Calibri',
                    fontWeight: 'bold',
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
                },

                {
                    value: "N° APE client : XXXXX",
                    iris_type: "label",
                    iris_identifier: "client_ape",
                    left: 850,
                    top: 360,
                    fontSize: 19,
                    fontFamily: 'Calibri',
                },

                {
                    value: "Email client : mail@domain.com",
                    iris_type: "label",
                    iris_identifier: "client_email",
                    left: 850,
                    top: 390,
                    fontSize: 19,
                    fontFamily: 'Calibri',
                },

                {
                    value: "Adresse client : Ligne 1 + Ligne 2 ...",
                    iris_type: "label",
                    iris_identifier: "client_address",
                    left: 850,
                    top: 420,
                    fontSize: 19,
                    fontFamily: 'Calibri',
                },

                {
                    value: "N° TVA client : FRXX XXX XXX XXX",
                    iris_type: "label",
                    iris_identifier: "client_tva",
                    left: 850,
                    top: 450,
                    fontSize: 19,
                    fontFamily: 'Calibri',
                },

                {
                    value: "Date : Fait le JJ Mois AAAA à XXXXXXX",
                    iris_type: "label",
                    iris_identifier: "date",
                    left: 850,
                    top: 1000,
                    fontSize: 19,
                    fontFamily: 'Calibri',
                },


            ];

            texts.forEach(function (textObject) {
                canvas.add(new fabric.Text(textObject.value, textObject));
            });


            fabric.Image.fromURL("{{asset("img/logo-placeholder.png")}}", function (image) {
                let logoImage = image.set({
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


            // snap to grid

            canvas.on('object:moving', function (options) {
                options.target.set({
                    left: Math.round(options.target.left / grid) * grid,
                    top: Math.round(options.target.top / grid) * grid
                });
            });

        });


    </script>


@endsection