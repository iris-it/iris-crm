<!--+
    |
    |  base : include('shared.quote-invoice-product-table-input' ['entity' => $invoice'])
    |
    |  add the 'include' inside the form of an invoice before the submit group
    |

    +-->
<!-- Search Scope -->

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-info btn-flat" id="product-add">
                    <i class="fa fa-cubes"></i> {{trans('app.product:add-alt')}}
                </a>
                <a class="btn btn-info btn-flat" id="service-add">
                    <i class="fa fa-handshake-o"></i>{{trans('app.service:add-alt')}}
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Table Scope -->

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <table class="table table-striped" id="item-table">
                        <thead>
                        <!-- Let this empty -->
                        </thead>
                        <tbody>
                        <!-- Let this empty -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12">
                <dl class="dl-horizontal pull-right" id="table-vat-single">

                </dl>
            </div>
            <div class="col-sm-12">
                <dl class="dl-horizontal pull-right">
                    <dt>Sous Total</dt>
                    <dd><span id="table-sub-total">0.00</span>€</dd>
                    <dt>Taxes / Tva</dt>
                    <dd><span id="table-vat">0.00</span>€</dd>
                    <dt>Total</dt>
                    <dd><span id="table-total">0.00</span>€</dd>
                </dl>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {

            /*
             *  Variables
             */
            let table_data = JSON.parse($('#{{$content_id}}').val()) || [];

            let table_parameters = {
                target: '#item-table',
                editable: true,
                data: table_data,
                columns: [  //'string|input|select|range|customs'
                    {name: 'Désignation', type: 'string', args: {key: 'name'}},
                    {name: 'Description', type: 'textarea', args: {key: 'description'}},
                    {
                        name: 'Quantités', type: 'range', args: {
                        key: 'quantity', step: 0.01, min: 0, max: function (row) {
                            return row.stock_disponibility || 25
                        }
                    }
                    },
                    {
                        name: 'Unités', type: 'custom', args: function (row) {
                        return row.sale_unit || 'Unité'
                    }
                    },
                    {name: 'Prix Unitaire HT', type: 'string', args: {key: 'ht_price'}},
                    {
                        name: 'Taxe(s) %', type: 'custom', args: function (row) {
                        return row.taxes.map(function (obj) {
                            return obj.value;
                        }).join('&nbsp;-&nbsp;');
                    }
                    },
                    {
                        name: 'Prix HT', type: 'custom', args: function (row) {
                        return (row.ht_price * row.quantity).toFixed(2) + "€";
                    }
                    },
                    {
                        name: 'Prix TTC', type: 'custom', args: function (row) {
                        return (row.ttc_price * row.quantity).toFixed(2) + "€";
                    }
                    }
                ],
                trans: {
                    confirm_delete: "Voulez vous supprimer cet item du tableau ?"
                }
            };

            let product_modal_parameters = {
                button_target: '#product-add',
                source: '{{action('Ajax\ItemSearchController@all', ['products'])}}',
                table_columns: [
                    {data: "name", title: "Nom"},
                    {data: "description", title: "Description"},
                    {data: "category", title: "Category"},
                    {data: "sale_unit", title: "Unité de vente"},
                    {data: "stock_disponibility", title: "Stock disponible"},
                    {data: "ht_price", title: "Prix HT"}
                ]
            };

            let service_modal_parameters = {
                button_target: '#service-add',
                source: '{{action('Ajax\ItemSearchController@all', ['services'])}}',
                table_columns: [
                    {data: "name", title: "Nom"},
                    {data: "description", title: "Description"},
                    {data: "category", title: "Category"},
                    {data: "sale_unit", title: "Unité de vente"},
                    {data: "ht_price", title: "Prix HT"}
                ]
            };

            let jsontable = new JsonTable(table_parameters);
            jsontable.onDataChange(function (data) {
                calculateTotal(data);
                $('#{{$content_id}}').val(JSON.stringify(data));
            });

            let products_modal = new SearchModal(product_modal_parameters);
            products_modal.onSubmit(function (items) {
                items.forEach(function (item) {
                    jsontable.addRow($.extend(item, {
                        quantity: 1
                    }));
                });
            });

            let services_modal = new SearchModal(service_modal_parameters);
            services_modal.onSubmit(function (items) {
                items.forEach(function (item) {
                    jsontable.addRow($.extend(item, {
                        quantity: 1
                    }));
                });
            });


            function calculateTotal(data) {
                let taxes = [];
                let total_ht = 0;
                let total_vat = 0;
                let total_ttc = 0;

                data.forEach(function (item) {
                    total_ht += (item.ht_price * item.quantity);
                    total_ttc += (item.ttc_price * item.quantity);
                    item.taxes.forEach(function (tax) {
                        let value = ((parseFloat(tax.value) / 100) * (item.ht_price * item.quantity));
                        taxes[tax.value] = (typeof taxes[tax.value] === 'undefined') ? value : taxes[tax.value] + value;
                        total_vat += value;
                    });
                });

                $("#table-vat-single").html("");
                for (let key in taxes) {
                    if (taxes.hasOwnProperty(key)) {
                        $("#table-vat-single").append('<dt>Tva ' + key + '%</dt><dd><span>' + taxes[key].toFixed(2) + '</span>€</dd>');
                    }
                }

                $('#table-sub-total').text(parseFloat(total_ht).toFixed(2));
                $('#table-total').text(parseFloat(total_ttc).toFixed(2));
                $('#table-vat').text(parseFloat(total_vat).toFixed(2));
            }


        });
    </script>
@endsection








