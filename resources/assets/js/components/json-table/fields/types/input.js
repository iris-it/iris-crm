const AbstractField = require('./abstract-field');

let InputField = function () {
    /*
     * Constructor
     */
};

/*
 * Inherit
 */
InputField.prototype = new AbstractField();

/*
 * Extends
 */
InputField.prototype.build = function (row, args) {

    /*
     * the required parameters are
     * {
     *    key: 'a selector for an element in the row object'
     * }
     */

    return `<input type="text" class="form-control" data-identifier="${this.class_prefix}${args.key}" value="${String(row[args.key])}" disabled>`;
};

module.exports = InputField;