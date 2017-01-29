const AbstractField = require('./abstract-field');

let CustomField = function () {
    // constructor
};

// inherit
CustomField.prototype = new AbstractField();

// extends
CustomField.prototype.build = function (row, callback) {
    return callback(row);
};

module.exports = CustomField;