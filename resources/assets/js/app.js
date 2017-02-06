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
window.DatePicker = require('./components/datepicker/main').default;

window.SearchService = require('./components/remote-typeahead-search/main').default;

window.JsonTable = require('./components/json-table/main').default;

window.SearchModal = require('./components/search-modal/main').default;

/**
 * Self Executing Methods
 */
import {activeMenu, activeTab, ajaxCSRF, laravelLinksAsForm} from './general';

window.$(function () {
    activeMenu();
    activeTab();
    ajaxCSRF();
    laravelLinksAsForm();
});