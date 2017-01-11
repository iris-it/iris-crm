<!--+
    |  base : include('shared.quote-invoice-product-table-input' ['entity' => $invoice'])
    |
    |  add the 'include' inside the form of an invoice before the submit group
    |
    +-->

<!-- Product table with input ( serialization ) -->
<input type="hidden" name="content" value="{{$entity->content}}">


<!-- Product ( search / selection / qty / add ) -->
<div class="form-group col-sm-12">
    <input type="search" class="form-control search-input" placeholder="{{trans('app.search:type')}}" autocomplete="off">
</div>



@section('scripts')
    @parent
    <script type="text/javascript">
        $(function () {

            let $products_endpoint = "{{action('Ajax\ItemSearchController@search', ['products'])}}";
            let $services_endpoint = "{{action('Ajax\ItemSearchController@search', ['services'])}}";


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

            $('.search-input').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: '{{trans('app.product:products')}}',
                display: 'team',
                source: $products_dataset,
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="#" class="list-group-item">' + data.product_name + ' - ' + data.ht_price + '€</a>'
                    }
                }
            }, {
                name: '{{trans('app.service:services')}}',
                display: 'team',
                source: $services_dataset,
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="#" class="list-group-item">' + data.service_name + ' - ' + data.ht_price + '€</a>'
                    }
                }
            });


            $('.search-input').bind('typeahead:select', function (ev, suggestion) {
                console.log('Selection: ' + suggestion.id);
            });


        });
    </script>
@endsection