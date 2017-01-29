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

        this.fieldFactory = new FieldFactory();

    }

    //
    // REGISTER EVENTS
    //

    /**
     *
     *  TODO
     *
     */

    //
    // PUBLIC METHODS
    //

    buildTable() {
        this._buildTableHeader();
        this._buildTableBody();
        // TRIGGER EVENT
    }

    addRow(data) {
        this._buildTableRows(data);
        // TRIGGER EVENT
    }


    //
    // PRIVATE METHODS
    //

    _buildTableHeader() {

        let row = $('<tr></tr>').appendTo(this.thead);

        this.parameters.columns.forEach(function (column) {
            row.append($('<th>').append(column.name));
        });

        if (this.parameters.editable) {
            row.append($('<th>').append('<i class="fa fa-pencil">'));
        }
    }

    _buildTableBody() {
        let rows = this.parameters.data;

        if (rows.length > 0) {
            rows.forEach(function (row) {
                this._buildTableRows(row);
            }, this);
        }
    }

    _buildTableRows(data) {

        let row = $('<tr></tr>').appendTo(this.tbody);

        this.parameters.columns.forEach(function (column) {
            row.append($('<td>').append(
                this.fieldFactory.create(column.type, data, column.args)
            ));
        }, this);

        if (this.parameters.editable) {
            //bind events (update) on click
            row.append($('<td>').append('<i class="fa fa-pencil">'));
            //
            // on click set editable the editable fields
            //
            //
            //
            //
            //
            //

            //add shadow json column
            row.append($('<td class="row-data" style="display:none"></td>'));
        }

    }

    _updateTableJson() {
        // go through all the TR and get the JSON

        // Make an array of objects

        // Replace the main data attribute

        // Rebuild the table Rows
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