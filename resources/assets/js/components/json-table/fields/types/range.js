const AbstractField = require('./abstract-field');

let RangeField = function () {
    // constructor
};

// inherit
RangeField.prototype = new AbstractField();

// extends
RangeField.prototype.build = function (row, args) {

    let defaults = {
        min: 0,
        max: 100,
        step: 1,
    };

    args = Object.assign({}, defaults, args);

    if (typeof args.min == 'function') {
        args.min = args.min.call(null, row);
    }

    if (typeof args.max == 'function') {
        args.max = args.max.call(null, row);
    }

    //TODO Add readonly property

    return '<input type="number" ' +
        'class="form-control" ' +
        'data-identifier="' + this.class_prefix + args.key + '" ' +
        'min="' + String(args.min) + '" ' +
        'max="' + String(args.max) + '" ' +
        'step="' + args.step + '" ' +
        'value="' + String(row[args.key]) + '" disabled>';
};

module.exports = RangeField;