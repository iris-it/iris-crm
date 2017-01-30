const $ = require('jquery');
const Bloodhound = require('bloodhound-js');

export default class {

    /**
     * Here we initialize the parameters for the table
     *
     * Parameters required :
     * target: '#targetID'
     * datasets: []
     *         name : a name
     *         header : a html title for the select
     *         endpoint : a valid bloodhound endpoint
     *
     * translations:
     *         not_found: " not found string"
     *
     */
    constructor(parameters) {
        this.parameters = parameters;
    }

    /**
     * Builds the instance of typeahead with the bloodhoud datasets
     *
     * @public
     */
    registerInput() {

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
                /*
                 * We define a new bloodhound instance based on the endpoint
                 */
                source: new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('query'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: `${datasets[i].endpoint}?query=%QUERY%`,
                        wildcard: '%QUERY%'
                    }
                }),
                templates: {
                    empty: [
                        translations.not_found
                    ],
                    header: [
                        datasets[i].header
                    ],
                    suggestion: function (data) {
                        return `<div>${data.name}</div>`;
                    },
                }
            }
        }

        /*
         * Creates a typeahead instance with one or many configuration of bloodhound
         */
        $(this.parameters.target).typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
        }, remote_datasets);

        return this;
    }

    /**
     * Handler for the selected event on the typeahead box
     *
     * @param callback
     * @public
     */
    handleSelect(callback) {
        $(this.parameters.target).bind('typeahead:select', function (ev, suggestion) {
            if (typeof callback == 'function') {
                callback.call(this, suggestion);
            }
        });
        return this;
    }
}