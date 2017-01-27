const $ = require('jquery');
const Bloodhound = require('bloodhound-js');


export function initialize(parameters) {

    this.parameters = parameters;

    return this;
}


export function registerInput() {

    let datasets = this.parameters.datasets;

    let translations = this.parameters.translations;

    let remote_datasets = [];

    for (let i = 0; i < datasets.length; i++) {

        remote_datasets[i] = {
            hint: true,
            highlight: true,
            minLength: 1,
            name: datasets[i].name,
            display: 'name',
            source: new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('query'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: datasets[i].endpoint + '?query=%QUERY%',
                    wildcard: '%QUERY%'
                }
            }),
            templates: {
                empty: [
                    translations.not_found
                ],
                header: [
                    translations.products_list
                ],
                suggestion: function (data) {
                    return '<div>' + data.name + '</div>';
                },
            }
        }
    }

    $(this.parameters.target).typeahead({
        hint: true,
        highlight: true,
        minLength: 1,
    }, remote_datasets);

    return this;
}

export function handleSelect(callback) {

    $(this.parameters.target).bind('typeahead:select', function (ev, suggestion) {

        if (typeof callback == 'function') {
            callback.call(this, suggestion);
        }

    });

    return this;
}