const AbstractField = require('./abstract-field');

let TextareaField = function () {
    // constructor
};

// inherit
TextareaField.prototype = new AbstractField();

// extends
TextareaField.prototype.build = function (row, args) {
    return '<textarea>' + String(row[args.key]) + '</textarea>';
};

module.exports = TextareaField;