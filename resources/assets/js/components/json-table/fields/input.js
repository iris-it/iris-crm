const AbstractField = require('./abstract-field');

let InputField = function () {
    // constructor
};

// inherit
InputField.prototype = new AbstractField();

// extends
InputField.prototype.build = function (row, args) {
    return 'input';
};

module.exports = InputField;