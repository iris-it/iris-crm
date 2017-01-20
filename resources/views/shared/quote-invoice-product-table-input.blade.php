<!--+
    |
    |  base : include('shared.quote-invoice-product-table-input' ['entity' => $invoice'])
    |
    |  add the 'include' inside the form of an invoice before the submit group
    |

    +-->

<!-- Product ( search / selection / qty / add ) -->

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group col-xs-4">
                    <label class="h4 text-purple">{{trans('app.search:product-service')}} :</label>
                    <input type="text" class="form-control" id="search-input" placeholder="{{trans('app.search:type')}}" autocomplete="off"/>
                </div>
                <div class="form-group col-xs-4">
                    <label class="h4 text-purple">{{trans('app.product:quantity')}} :</label>
                    <div class="input-group">
                        <select class="form-control" id="search-quantity-input">
                        </select>
                        <span class="input-group-addon" id="search-quantity-unit">Unités</span>
                    </div>
                </div>
                <div class="form-group col-xs-4">
                    <label class="h4 text-purple">{{trans('app.general:action')}} :</label>
                    <a class="btn btn-success btn-block" id="search-submit-add">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <table class="table table-striped" id="item-table">
                        <thead>
                        <tr>
                            <th>Désignation</th>
                            <th>Quantités</th>
                            <th>Unités</th>
                            <th>Prix Unitaire HT</th>
                            <th>Taxe(s) %</th>
                            <th>Prix HT</th>
                            <th>Prix TTC</th>
                        </tr>
                        </thead>
                        <tbody id="item-table-tbody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="text-right">
                    <div class="col-xs-2 col-xs-offset-8">
                        <span><b>Sous Total:</b></span><br>
                        <span><b>TAXES / TVA:</b></span><br>
                        <span><b>Total:</b></span><br>
                    </div>
                    <div class="col-xs-2">
                        <span id="list-sub-total">0.00</span>€ <br>
                        <span id="list-vat">0.00</span>€ <br>
                        <span id="list-total">0.00</span>€ <br>
                    </div>
                </div>
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

            let $products_endpoint = "{{action('Ajax\ItemSearchController@search', ['products'])}}";
            let $services_endpoint = "{{action('Ajax\ItemSearchController@search', ['services'])}}";

            let $translations = {
                not_found: "{{trans('app.search:no-results')}}",
                products_list: "{{trans('app.product:list')}}",
                services_list: "{{trans('app.service:list')}}",
            };


            let $products_dataset = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('query'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: $products_endpoint + '?query=%QUERY%',
                    wildcard: '%QUERY%'
                }
            });

            let $services_dataset = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('query'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: $services_endpoint + '?query=%QUERY%',
                    wildcard: '%QUERY%'
                }
            });

            /*
             * Initialization
             */

            $('#search-input').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: '{{trans('app.product:products')}}',
                display: 'product_name',
                source: $products_dataset,
                templates: {
                    empty: [
                        $translations.not_found
                    ],
                    header: [
                        $translations.products_list
                    ],
                    suggestion: function (data) {
                        return '<div>' + data.product_name + ' - ' + data.ht_price + '€</div>';
                    },
                    footer: [
                        ''
                    ]

                }
            }, {
                name: '{{trans('app.service:services')}}',
                display: 'service_name',
                source: $services_dataset,
                templates: {
                    empty: [
                        $translations.not_found
                    ],
                    header: [
                        $translations.services_list
                    ],
                    suggestion: function (data) {
                        return '<div>' + data.service_name + ' - ' + data.ht_price + '€</div>'
                    }
                }
            });

            Sortable.create($('#item-table-tbody')[0], {
                animation: 150
            });

            /*
             * Event Handling
             */

            let $current_selection = null;

            $('#search-input').bind('typeahead:select', function (ev, suggestion) {

                $current_selection = suggestion;

                if (suggestion.hasOwnProperty('sale_unit')) {

                    clearSelectValues('search-quantity-input');
                    addRangeSelect(25, 'search-quantity-input');

                    $('#search-quantity-unit').html(suggestion.sale_unit);

                } else {

                    clearSelectValues('search-quantity-input');
                    addRangeSelect(suggestion.stock_disponibility, 'search-quantity-input');

                    $('#search-quantity-unit').html('Unités');
                }

            });

            $('#search-submit-add').click(function () {
                if (!$current_selection) {
                    return null;
                }

                addLineToTable('item-table-tbody', $current_selection, $('#search-quantity-input').val());

                $current_selection = null;
                clearSelectValues('search-quantity-input');
                $('#search-input').typeahead('val', '');

            });

            /*
             * Functions
             */
            function addRangeSelect(number, target) {
                for (let i = 1; i < number; i++) {
                    addSelectValue(i, target);
                }
            }

            function addSelectValue(value, target) {
                $('<option value="' + value + '">' + value + '</option>').appendTo('#' + target);
            }

            function clearSelectValues(target) {
                $('#' + target).find("option").remove();
            }

            function addLineToTable(target, item_source, quantity) {

                console.log(item_source);

                var item = {
                    total_ttc_price: item_source.ttc_price * quantity,
                    total_ht_price: item_source.ht_price * quantity,
                    ttc_price: item_source.ttc_price,
                    ht_price: item_source.ht_price,
                    quantity: quantity,
                    taxes: [],
                };

                if (item_source.hasOwnProperty('service_name')) {
                    item.name = item_source.service_name
                } else if (item_source.hasOwnProperty('product_name')) {
                    item.name = item_source.product_name
                }

                for (let i = 0; i < item_source.taxes.length; ++i) {
                    item.taxes[i] = item_source.taxes[i].value;
                }

                if (item_source.hasOwnProperty('sale_unit')) {
                    item.sale_unit = item_source.sale_unit
                } else {
                    item.sale_unit = 'Unité'
                }

                var row = '<tr>' +
                    '<td>' + item.name + '</td>' +
                    '<td>' + item.quantity + '</td>' +
                    '<td>' + item.sale_unit + '</td>' +
                    '<td>' + item.ht_price + '</td>' +
                    '<td>' + item.taxes.join('&nbsp;-&nbsp;') + '</td>' +
                    '<td>' + item.total_ht_price + '</td>' +
                    '<td>' + item.total_ttc_price + '</td>' +
                    '<td class="row-data" style="display:none;">' + JSON.stringify(item) + '</td>' +
                    '</tr>';

                $('#' + target).append(row);

                calculateTotal(target);
            }

            function calculateTotal(target) {

                let taxes = [];
                let total_ht = 0;
                let total_vat = 0;
                let total_ttc = 0;

                $('#' + target + ' tr').each(function () {
                    let json = JSON.parse($(this).find("td.row-data").html());

                    total_ht += json.total_ht_price;
                    total_ttc += json.total_ttc_price;

                    for (let i = 0; i < json.taxes.length; ++i) {
                        let value = ((parseInt(json.taxes[i]) / 100) * json.total_ht_price);
                        taxes[json.taxes[i]] = (typeof taxes[json.taxes[i]] === 'undefined') ? value : taxes[json.taxes[i]] + value;
                        total_vat += value;
                    }

                });

                console.log(taxes);

                $('#list-sub-total').text(parseFloat(total_ht).toFixed(2));
                $('#list-total').text(parseFloat(total_ttc).toFixed(2));
                $('#list-vat').text(parseFloat(total_vat).toFixed(2));

            }

//            function updateTotals(elem) {
//                var tr = $(elem).closest('tr'),
//                    quantity = $('[name="invoice_product_qty[]"]', tr).val(),
//                    price = $('[name="invoice_product_price[]"]', tr).val(),
//                    percent = $('[name="invoice_product_discount[]"]', tr).val(),
//                    subtotal = parseInt(quantity) * parseFloat(price);
//                if (percent && $.isNumeric(percent) && percent !== 0) {
//                    subtotal = subtotal - ((parseInt(percent) / 100) * subtotal);
//                }
//                $('.calculate-sub', tr).val(subtotal.toFixed(2));
//            }
//
//            function calculateTotal() {
//
//                var grandTotal = 0.0;
//                var totalQuantity = 0;
//                $('.calculate-sub').each(function () {
//                    grandTotal += parseFloat($(this).val());
//                });
//
//                $('.invoice-sub-total').text(parseFloat(grandTotal).toFixed(2));
//            }


        });
    </script>
@endsection








