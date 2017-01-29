const AbstractField = require('./abstract-field');

let SelectField = function () {
    // constructor
};

// inherit
SelectField.prototype = new AbstractField();

// extends
SelectField.prototype.build = function (row, args) {
    return 'select';
};

module.exports = SelectField;