/*
 *
 * https://github.com/sroucheray/event-class
 *
 *
 *
 */
const $ = require('jquery');

const Sortable = require('sortablejs');

const FieldFactory = require('./fields/field-factory');

export default class {

    constructor(parameters) {
        this.parameters = parameters;

        this.thead = $(this.parameters.target + ' thead')[0];

        this.tbody = $(this.parameters.target + ' tbody')[0];

    }

    buildTable() {
        this._buildTableHeader();
        this._buildTableBody();
    }

    _buildTableHeader() {

        let row = $('<tr></tr>').appendTo(this.thead);

        this.parameters.columns.forEach(function (column) {
            row.append($('<th>' + column.name + '</th>'));
        });

        if (this.parameters.editable) {
            row.append($('<th><i class="fa fa-pencil"></i></th>'));
        }
    }

    _buildTableBody() {
        let rows = this.parameters.data;

        if (rows.length > 0) {
            rows.forEach(function (row) {
                this._buildTableRows(row);
            }, this)
        }

    }

    _buildTableRows(data) {

        let row = $('<tr></tr>').appendTo(this.tbody);

        this.parameters.columns.forEach(function (column) {

            let content = data[column.key];

            row.append($('<td>' + content + '</td>'));
        });

    }


}

function initialize(target) {

    let dummy = {
        key1: 'test',
        key2: 'test test',
        key3: 2,
        key4: 5,
        key5: 10
    };

    let factory = new FieldFactory();

    console.log(factory.create('aggregate', dummy, function (row) {
        return row.key4 * row.key5
    }));

    console.log(factory.create('input', dummy, {selector: 'key1'}));

    console.log(factory.create('range', dummy, {selector: 'key1', min: 1, max: 20}));

    console.log(factory.create('select', dummy, {selector: 'key1', values: ['A', 'B', 'C']}));

    console.log(factory.create('string', dummy, {selector: 'key2'}));


    // Sortable.create(target, {
    //     animation: 150
    // });

}


//
// build table =>
//   Mapper => field => type (select or input)
//          => select ? type range or data ( number or array )
//          => if not field => nothing
//
//   Json by line =>
//
//   on edit => rebuild Data from TR order
//   edit buttons mapped to the current TR line
//