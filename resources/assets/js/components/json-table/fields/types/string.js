const AbstractField = require('./abstract-field');

let StringField = function () {
    // constructor
};

// inherit
StringField.prototype = new AbstractField();

// extends
StringField.prototype.build = function (row, args) {
    return '<span>' + row[args.key] + '</span>';
};

module.exports = StringField;