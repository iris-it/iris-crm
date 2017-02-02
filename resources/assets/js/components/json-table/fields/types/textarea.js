const AbstractField = require('./abstract-field');

let TextareaField = function () {
    /*
     * Constructor
     */
};

/*
 * Inherit
 */
TextareaField.prototype = new AbstractField();

/*
 * Extends
 */
TextareaField.prototype.build = function (row, args) {

    /*
     * the required parameters are
     * {
     *    key: 'a selector for an element in the row object'
     * }
     */

    return `<textarea class="form-control" data-identifier="${this.class_prefix}${args.key}" disabled>${String(row[args.key])}</textarea>`;
};

module.exports = TextareaField;