/**
 * First we will load all of this project's JavaScript dependencies
 */

window._ = require('lodash');
window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');
require('bootstrap-datepicker');
require('admin-lte');
require('chart.js');
require('leaflet');
require('leaflet.markercluster');
require('cropper');

/**
 * Application specific
 */

// TODO discuss about structuring this !
window.IrisCrm = require('./crm');

window.SearchService = require('./components/remote-typeahead-search/main').default;

window.JsonTable = require('./components/json-table/main').default;

window.SearchModal = require('./components/search-modal/main').default;

require('./general');