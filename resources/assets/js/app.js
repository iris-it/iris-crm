/**
 * First we will load all of this project's JavaScript dependencies
 */

window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.toastr = require('toastr');

require('bootstrap-sass');
require('bootstrap-datepicker');
require('admin-lte');
require('chart.js');
require('leaflet');
require('leaflet.markercluster');
require('cropper');
require('fabric');
require('spectrum-colorpicker');


// require('trumbowyg');

/**
 * Application specific
 */
window.IrisCrm = require('./crm');

window.CanvasDocBuilder = require('./components/canvas-document-builder/main').default;

require('./general');

