const AbstractField = require('./abstract-field');

let CustomField = function () {
    /*
     * Constructor
     */
};

/*
 * Inherit
 */
CustomField.prototype = new AbstractField();

/*
 * Extends
 */
CustomField.prototype.build = function (row, callback) {

    /*
     * the required parameters are a callback
     * function, the callback has access
     * to the current row data
     */

    return callback(row);
};

module.exports = CustomField;