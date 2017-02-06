const AbstractField = require('./types/abstract-field');

const customField = require('./types/custom');
const inputField = require('./types/input');
const textareaField = require('./types/textarea');
const rangeField = require('./types/range');
const selectField = require('./types/select');
const stringField = require('./types/string');

const classes = {customField, inputField, textareaField, rangeField, selectField, stringField};

let FieldFactory = function () {
};

FieldFactory.prototype.create = function (id, row, args) {

    let strategyName = `${id}Field`;

    let strategy;

    try {
        strategy = new classes[strategyName]();
    }
    catch (err) {
        console.error(err.message);
        console.error(err.message);
    }

    if (strategy instanceof AbstractField) {
        return strategy.build(row, args);
    } else {
        console.error(`${strategyName} is not is a prototype of AbstractField`);
    }
};

module.exports = FieldFactory;