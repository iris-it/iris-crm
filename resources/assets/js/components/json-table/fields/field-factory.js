const AbstractField = require('./abstract-field');

const aggregateField = require('./aggregate');
const inputField = require('./input');
const rangeField = require('./range');
const selectField = require('./select');
const stringField = require('./string');

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