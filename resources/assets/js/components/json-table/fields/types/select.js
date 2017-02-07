const AbstractField = require('./abstract-field');

let SelectField = function () {
    /*
     * Constructor
     */
};

/*
 * Inherit
 */
SelectField.prototype = new AbstractField();

/*
 * Extends
 */
SelectField.prototype.build = function (row, args) {

    // IF 1D
    // <option value="KEY">KEY</option>

    // IF 2D
    // <option value="KEY">VALUE</option>

    // SELECTED if row.key = args.list[key]

    // args.list can be a callback ( row or outside scope )

    // TODO Add disable property

    // disable

    return `select ${row} ${args}`;
};

module.exports = SelectField;