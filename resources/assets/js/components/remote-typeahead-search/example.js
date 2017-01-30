/*
 * Define the parameters !
 */
let $current_selection = null;

let search_parameters = {
    target: '#search-input',
    datasets: [
        {
            name: 'Produits',
            header: 'Liste des produits',
            endpoint: '/url/product/list',
        },
        {
            name: 'Services',
            header: 'Liste des services',
            endpoint: '/url/services/list',
        }
    ],
    translations: {
        not_found: "Aucun résultats"
    }
};

/*
 * New instance
 */
let search = new SearchService(search_parameters);

/*
 * Build the search typeahead
 */
search.registerInput();

/*
 * Some actions on "select"
 */
search.handleSelect(function (suggestion) {
    $current_selection = suggestion;
});