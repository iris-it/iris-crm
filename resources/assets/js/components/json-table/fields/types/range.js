const AbstractField = require('./abstract-field');

let RangeField = function () {
    /*
     * Constructor
     */
};

/*
 * Inherit
 */
RangeField.prototype = new AbstractField();

/*
 * Extends
 */
RangeField.prototype.build = function (row, args) {

    /*
     * the required parameters are
     * {
     *    key: 'a selector for an element in the row object'
     * }
     *
     * The 'min' and 'max' can be callback with the context of the row
     * or integers
     *
     * 'step' is integer or float
     */

    let defaults = {
        min: 0,
        max: 100,
        step: 1,
    };

    args = Object.assign({}, defaults, args);

    if (typeof args.min == 'function') {
        args.min = args.min.call(null, row);
    }

    if (typeof args.max == 'function') {
        args.max = args.max.call(null, row);
    }

    return `<input type="number" class="form-control" 
                data-identifier="${this.class_prefix}${args.key}" 
                min="${String(args.min)}" 
                max="${String(args.max)}" 
                step="${args.step}" 
                value="${String(row[args.key])}" disabled>`;
};

module.exports = RangeField;