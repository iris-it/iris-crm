// /*
//  *
//  * <div class="box box-primary">
//  <div class="box-body">
//  <div class="row">
//  <div class="col-sm-12">
//  <div class="form-group col-xs-8">
//  <label class="h4 text-purple">{{trans('app.search:product-service')}} :</label>
//  <input type="text" class="form-control" id="search-input" placeholder="{{trans('app.search:type')}}" autocomplete="off"/>
//  </div>
//  <div class="form-group col-xs-4">
//  <label class="h4 text-purple">{{trans('app.general:action')}} :</label>
//  <a class="btn btn-success btn-block" id="search-submit-add">Ajouter</a>
//  </div>
//  </div>
//  </div>
//  </div>
//  </div>
//  */
// let $current_selection = null;
//
// // let search_parameters = {
// //     target: '#search-input',
// //     datasets: [
// //         {
// //             name: '{{trans('app.product:products')}}',
// //     header: '{{trans('app.product:list')}}',
// //     endpoint: '{{action('Ajax\ItemSearchController@search', ['products'])}}',
// // },
// // {
// //     name: '{{trans('app.service:services')}}',
// //     header: '{{trans('app.service:list')}}',
// //     endpoint: '{{action('Ajax\ItemSearchController@search', ['services'])}}',
// // }
// // ],
// // translations: {
// //     not_found: "{{trans('app.search:no-results')}}"
// // }
// // };
//
// let search_parameters = {
//     target: '#search-input',
//     datasets: [
//         {
//             name: 'Produits',
//             header: 'Liste des produits',
//             endpoint: '/url/product/list',
//         },
//         {
//             name: 'Services',
//             header: 'Liste des services',
//             endpoint: '/url/services/list',
//         }
//     ],
//     translations: {
//         not_found: "Aucun résultats"
//     }
// };
//
// /*
//  * New instance
//  */
// let search = new SearchService(search_parameters);
//
// /*
//  * Build the search typeahead
//  */
// search.registerInput();
//
// /*
//  * Some actions on "select"
//  */
// search.handleSelect(function (suggestion) {
//     $current_selection = suggestion;
// });