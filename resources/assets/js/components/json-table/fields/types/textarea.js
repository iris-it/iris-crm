const AbstractField = require('./abstract-field');

let TextareaField = function () {
    // constructor
};

// inherit
TextareaField.prototype = new AbstractField();

// extends
TextareaField.prototype.build = function (row, args) {

    //TODO Add readonly property

    return '<textarea ' +
        'class="form-control" ' +
        'data-identifier="' + this.class_prefix + args.key + '" disabled>' + String(row[args.key]) + '</textarea>';
};

module.exports = TextareaField;