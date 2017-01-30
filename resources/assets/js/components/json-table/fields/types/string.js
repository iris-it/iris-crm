const AbstractField = require('./abstract-field');

let StringField = function () {
    /*
     * Constructor
     */
};

/*
 * Inherit
 */
StringField.prototype = new AbstractField();

/*
 * Extends
 */
StringField.prototype.build = function (row, args) {

    /*
     * the required parameters are
     * {
     *    key: 'a selector for an element in the row object'
     * }
     */

    return `<span>${row[args.key]}</span>`;
};

module.exports = StringField;