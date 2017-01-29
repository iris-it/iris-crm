const AbstractField = require('./abstract-field');

let AggregateField = function () {
    // constructor
};

// inherit
AggregateField.prototype = new AbstractField();

// extends
AggregateField.prototype.build = function (row, callback) {
    return callback(row);
};

module.exports = AggregateField;