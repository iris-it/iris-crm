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
                <div class="form-group col-xs-8">
                    <label class="h4 text-purple">{{trans('app.search:product-service')}} :</label>
                    <input type="text" class="form-control" id="search-input" placeholder="{{trans('app.search:type')}}" autocomplete="off"/>
                </div>
                <div class="form-group col-xs-4">
                    <label class="h4 text-purple">{{trans('app.general:action')}} :</label>
                    <a class="btn btn-success btn-block" id="search-submit-add">Ajouter</a>
                </div>
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
            let $current_selection = null;

            let search_parameters = {
                target: '#search-input',
                datasets: [
                    {
                        name: '{{trans('app.product:products')}}',
                        endpoint: '{{action('Ajax\ItemSearchController@search', ['products'])}}',
                    },
                    {
                        name: '{{trans('app.service:services')}}',
                        endpoint: '{{action('Ajax\ItemSearchController@search', ['services'])}}',
                    }
                ],
                translations: {
                    not_found: "{{trans('app.search:no-results')}}",
                    products_list: "{{trans('app.product:list')}}",
                    services_list: "{{trans('app.service:list')}}",
                }
            };


            let search = new SearchService(search_parameters);

            search.registerInput();

            search.handleSelect(function (suggestion) {
                $current_selection = suggestion;
            });


            let table_parameters = {
                target: '#item-table',
                editable: true,
                data: [],
                columns: [  //'string|input|select|range|customs'
                    {
                        name: 'Désignation',
                        type: 'string',
                        args: {
                            key: 'name'
                        }
                    }, {
                        name: 'Description',
                        type: 'textarea',
                        editable: true,
                        args: {
                            key: 'description'
                        }
                    }, {
                        name: 'Quantités',
                        type: 'range',
                        editable: true,
                        args: {
                            key: 'quantity',
                            step: 0.01,
                            min: 0,
                            max: function (row) {
                                return row.stock_disponibility || 25
                            }
                        }
                    }, {
                        name: 'Unités',
                        type: 'custom',
                        args: function (row) {
                            return row.sale_unit || 'Unité'
                        }
                    }, {
                        name: 'Prix Unitaire HT',
                        type: 'string',
                        args: {
                            key: 'ht_price'
                        }
                    }, {
                        name: 'Taxe(s) %',
                        type: 'custom',
                        args: function (row) {
                            return row.taxes.map(function (obj) {
                                return obj.value;
                            }).join('&nbsp;-&nbsp;');
                        }
                    }, {
                        name: 'Prix HT',
                        type: 'custom',
                        args: function (row) {
                            return (row.ht_price * row.quantity).toFixed(2) + "€";
                        }
                    }, {
                        name: 'Prix HT',
                        type: 'custom',
                        args: function (row) {
                            return (row.ttc_price * row.quantity).toFixed(2) + "€";
                        }
                    },
                ]
            };

            let jsontable = new JsonTable(table_parameters);

            jsontable.buildTable();


            $('#search-submit-add').click(function () {
                jsontable.addRow($.extend($current_selection, {
                    quantity: 1
                }));
            });


//
//            $('#search-submit-add').click(function () {
//                if (!$current_selection) {
//                    return null;
//                }
//
//                addLineToTable('table-tbody', $current_selection, $('#search-quantity-input').val());
//
//                $current_selection = null;
//                clearSelectValues('search-quantity-input');
//                $('#search-input').typeahead('val', '');
//
//            });
//
//            /*
//             * Functions
//             */
//            function addRangeSelect(number, target) {
//                for (let i = 1; i < number; i++) {
//                    addSelectValue(i, target);
//                }
//            }
//
//            function addSelectValue(value, target) {
//                $('<option value="' + value + '">' + value + '</option>').appendTo('#' + target);
//            }
//
//            function clearSelectValues(target) {
//                $('#' + target).find("option").remove();
//            }
//
//            function addLineToTable(target, item_source, quantity) {
//
//                var item = {
//                    total_ttc_price: item_source.ttc_price * quantity,
//                    total_ht_price: item_source.ht_price * quantity,
//                    ttc_price: item_source.ttc_price,
//                    ht_price: item_source.ht_price,
//                    quantity: quantity,
//                    taxes: [],
//                };
//
//                if (item_source.hasOwnProperty('name')) {
//                    item.name = item_source.name
//                } else if (item_source.hasOwnProperty('name')) {
//                    item.name = item_source.name
//                }
//
//                for (let i = 0; i < item_source.taxes.length; ++i) {
//                    item.taxes[i] = item_source.taxes[i].value;
//                }
//
//                if (item_source.hasOwnProperty('sale_unit')) {
//                    item.sale_unit = item_source.sale_unit
//                } else {
//                    item.sale_unit = 'Unité'
//                }
//
//                var row = '<tr>' +
//                    '<td>' + item.name + '</td>' +
//                    '<td>' + item.quantity + '</td>' +
//                    '<td>' + item.sale_unit + '</td>' +
//                    '<td>' + item.ht_price + '</td>' +
//                    '<td>' + item.taxes.join('&nbsp;-&nbsp;') + '</td>' +
//                    '<td>' + item.total_ht_price + '</td>' +
//                    '<td>' + item.total_ttc_price + '</td>' +
//                    '<td class="row-data" style="display:none;">' + JSON.stringify(item) + '</td>' +
//                    '</tr>';
//
//                $('#' + target).append(row);
//
//                calculateTotal(target);
//            }
//
//            function calculateTotal(target) {
//
//                let taxes = [];
//                let total_ht = 0;
//                let total_vat = 0;
//                let total_ttc = 0;
//
//                $('#' + target + ' tr').each(function () {
//                    let json = JSON.parse($(this).find("td.row-data").html());
//
//                    total_ht += json.total_ht_price;
//                    total_ttc += json.total_ttc_price;
//
//                    for (let i = 0; i < json.taxes.length; ++i) {
//                        let value = ((parseInt(json.taxes[i]) / 100) * json.total_ht_price);
//                        taxes[json.taxes[i]] = (typeof taxes[json.taxes[i]] === 'undefined') ? value : taxes[json.taxes[i]] + value;
//                        total_vat += value;
//                    }
//
//                });
//
//
//                $("#table-vat-single").html("");
//                for (let key in taxes) {
//                    if (taxes.hasOwnProperty(key)) {
//                        $("#table-vat-single").append('<dt>Tva ' + key + '%</dt><dd><span>' + taxes[key] + '</span>€</dd>');
//                    }
//                }
//
//                $('#table-sub-total').text(parseFloat(total_ht).toFixed(2));
//                $('#table-total').text(parseFloat(total_ttc).toFixed(2));
//                $('#table-vat').text(parseFloat(total_vat).toFixed(2));
//
//            }


        });
    </script>
@endsection








