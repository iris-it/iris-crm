const AbstractField = require('./abstract-field');

let RangeField = function () {
    // constructor
};

// inherit
RangeField.prototype = new AbstractField();

// extends
RangeField.prototype.build = function (row, args) {
    return 'range';
};

module.exports = RangeField;