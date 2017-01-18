<!--+
    |
    |  base : include('shared.quote-invoice-product-table-input' ['entity' => $invoice'])
    |
    |  add the 'include' inside the form of an invoice before the submit group
    |

    +-->

<!-- Product ( search / selection / qty / add ) -->
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
                    <option selected>0</option>
                </select>
                <span class="input-group-addon" id="search-quantity-unit">Unités</span>
            </div>
        </div>

        <div class="form-group col-xs-4">
            <label class="h4 text-purple">{{trans('app.general:action')}} :</label>
            <a href="#" class="btn btn-success btn-block" id="search-submit-add">Ajouter</a>
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
                display: 'product_name',
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


            setDisableAttribute('search-quantity-input');
            setDisableAttribute('search-submit-add');

            /*
             * Event Handling
             */

            let $current_selection = null;

            $('#search-input').bind('typeahead:select', function (ev, suggestion) {

                if (suggestion.hasOwnProperty('sale_unit')) {
                    clearSelectValues('search-quantity-input');
                    addRangeSelect(25, 'search-quantity-input');
                    $('#search-quantity-unit').html(suggestion.sale_unit);
                } else {
                    clearSelectValues('search-quantity-input');
                    addRangeSelect(suggestion.stock_disponibility, 'search-quantity-input');
                    $('#search-quantity-unit').html('Unités');
                }

                setDisableAttribute('search-quantity-input', false);
                setDisableAttribute('search-submit-add', false);

                $current_selection = suggestion.id;

                console.log(suggestion);
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

            function setDisableAttribute(target, disable = true) {
                if (disable) {
                    $('#' + target).attr('disabled', 'disabled');
                } else {
                    $('#' + target).removeAttr('disabled');
                }
            }

        });
    </script>
@endsection








