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
        max: 100
    };

    args = Object.assign({}, defaults, args);

    if (typeof args.min == 'function') {
        args.min = args.min.call(null, row);
    }

    if (typeof args.max == 'function') {
        args.max = args.max.call(null, row);
    }

    console.log(args);

    return '<input type="number" min="' + String(args.min) + '" max="' + String(args.max) + '" value="' + String(row[args.key]) + '">';
};

module.exports = RangeField;