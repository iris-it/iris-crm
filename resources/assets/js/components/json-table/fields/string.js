const AbstractField = require('./abstract-field');

let StringField = function () {
    // constructor
};

// inherit
StringField.prototype = new AbstractField();

// extends
StringField.prototype.build = function (row, args) {
    return 'string';
};

module.exports = StringField;