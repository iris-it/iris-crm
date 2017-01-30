const AbstractField = require('./abstract-field');

let SelectField = function () {
    // constructor
};

// inherit
SelectField.prototype = new AbstractField();

// extends
SelectField.prototype.build = function (row, args) {

    // IF 1D
    // <option value="KEY">KEY</option>

    // IF 2D
    // <option value="KEY">VALUE</option>

    //SELECTED if row.key = args.list[key]

    // args.list can be a callback ( row or outside scope )

    //TODO Add disable property

    //disable

    return 'select';
};

module.exports = SelectField;