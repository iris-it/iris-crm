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
                <select class="form-control" id="">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <span class="input-group-addon" id="">Unités</span>
            </div>


        </div>

    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {

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

            let $current_selection = null;

            $('#search-input').bind('typeahead:select', function (ev, suggestion) {
                $current_selection = suggestion.id;
                console.log(suggestion);
            });


        });
    </script>
@endsection








