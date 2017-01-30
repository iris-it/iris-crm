const AbstractField = require('./abstract-field');

let InputField = function () {
    // constructor
};

// inherit
InputField.prototype = new AbstractField();

// extends
InputField.prototype.build = function (row, args) {

    //TODO Add readonly property

    return '<input type="text" ' +
        'class="form-control" ' +
        'data-identifier="' + this.class_prefix + args.key + '" ' +
        'value="' + String(row[args.key]) + '" disabled>';
};

module.exports = InputField;