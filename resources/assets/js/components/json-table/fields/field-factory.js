const AbstractField = require('./types/abstract-field');

const customField = require('./types/custom');
const inputField = require('./types/input');
const textareaField = require('./types/textarea');
const rangeField = require('./types/range');
const selectField = require('./types/select');
const stringField = require('./types/string');

let FieldFactory = function () {
};

FieldFactory.prototype.create = function (id, row, args) {

    let strategyName = id + 'Field';

    let strategy;

    try {
        strategy = eval('new ' + strategyName + '()');
    }
    catch (err) {
        console.log('Null Strategy: ' + err.message);
    }

    if (strategy instanceof AbstractField) {
        return strategy.build(row, args);
    } else {
        console.log(strategyName + ' not is a prototype of AbstractField.');
    }
};

module.exports = FieldFactory;