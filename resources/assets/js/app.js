/**
 * First we will load all of this project's JavaScript dependencies
 */

window._ = require('lodash');
window.$ = window.jQuery = require('jquery');

require('bootstrap');
require('bootstrap-datepicker');
require('admin-lte');
require('chart.js');
require('leaflet');
require('leaflet.markercluster');
require('cropper');
require('select2');
require('fabric');
require('spectrum-colorpicker');

/**
 * Application specific
 */
window.DatePicker = require('./components/datepicker/main').default;

window.JsonTable = require('./components/json-table/main').default;

window.SearchModal = require('./components/search-modal/main').default;

window.CanvasDocBuilder = require('./components/canvas-document-builder/main').default;

/**
 * React components
 */

require('./react-components/mailbox/App');


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