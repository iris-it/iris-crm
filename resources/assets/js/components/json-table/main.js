const $ = require('jquery');

const _ = require('lodash');

const Sortable = require('sortablejs');

const EventClass = require('event-class').default;

const FieldFactory = require('./fields/field-factory');


export default class {

    constructor(parameters) {
        this.parameters = parameters;

        this.thead = $(this.parameters.target + ' thead')[0];

        this.tbody = $(this.parameters.target + ' tbody')[0];

        this.fieldFactory = new FieldFactory();

        this.sort_handle_class = "__sort_handle";
        this.edit_class = "__table_edit";
        this.edit_cancel_class = "__table_cancel_edit";
        this.edit_validate_class = "__table_valid_edit";

        this.events = null;

        this._registerEvents();
    }


    //
    // EVENTS
    //
    _registerEvents() {

        this.events = new EventClass();

        this.events.on("OnBuild", () => {
            this._registerClickEditEvent();
        });

        this.events.on("OnAddRow", () => {
            this.buildTable();
            this._registerClickEditEvent();
        });

        this.events.on("OnEditRow", () => {
            this._updateTableJson();
            this._registerClickEditEvent();
        });

        Sortable.create(this.tbody, {
            animation: 150,
            handle: '.' + this.sort_handle_class,
            onEnd: () => {
                this.events.trigger("OnEditRow");
            }
        });
    }

    _registerClickEditEvent() {
        $('.' + this.edit_class).off().on("click", (event) => {

            let edit_button = $(event.currentTarget);
            let edit_cancel_button = edit_button.siblings('.' + this.edit_cancel_class).first();
            let edit_validate_button = edit_button.siblings('.' + this.edit_validate_class).first();

            edit_button.hide();

            this._enableInputsInRow(edit_button);

            this._registerClickEditCancelEvent(edit_cancel_button);
            this._registerClickEditValidateEvent(edit_validate_button);

        });
    }

    _registerClickEditCancelEvent(context) {
        context.show();

        context.off().on("click", () => {
            this.events.trigger("OnEditRow");
        });
    }

    _registerClickEditValidateEvent(context) {
        context.show();

        context.off().on("click", () => {

            let tr = $(context).closest('tr').first();

            let json = JSON.parse($(tr).find("td.row-data").html());

            $("td", tr).each(function () {

                let current_element = $(this).children(":first");

                let current_identifier = current_element.data('identifier');

                if (_.startsWith(current_identifier, '__field_')) {

                    let attribute = _.split(current_identifier, '__field_')[1];

                    json[attribute] = current_element.val();
                }

            });

            $(tr).find("td.row-data").html(JSON.stringify(json));

            this.events.trigger("OnEditRow");

        });
    }

    //
    // PUBLIC METHODS
    //

    buildTable() {
        this._buildTableHeader();
        this._buildTableBody();

        this.events.trigger("OnBuild");
    }

    addRow(data) {
        this.parameters.data.push(data);

        this.events.trigger("OnAddRow");
    }


    //
    // PRIVATE METHODS
    //

    _buildTableHeader() {

        $(this.thead).empty();

        let row = $('<tr></tr>').appendTo(this.thead);

        //add handle for drag and drop
        row.append($('<th>').append(''));

        this.parameters.columns.forEach(function (column) {
            row.append($('<th>').append(column.name));
        });

        if (this.parameters.editable) {
            row.append($('<th>').append('<i class="fa fa-pencil">'));
        }
    }

    _buildTableBody() {

        $(this.tbody).empty();

        let rows = this.parameters.data;

        if (rows.length > 0) {
            rows.forEach(function (row) {
                this._buildTableRows(row);
            }, this);
        }
    }

    _buildTableRows(data) {

        let row = $('<tr></tr>').appendTo(this.tbody);

        //add handle for drag and drop
        row.append($('<td class="' + this.sort_handle_class + '"><i class="fa fa-arrows-v"></i></td>'));

        this.parameters.columns.forEach(function (column) {
            row.append($('<td>').append(
                this.fieldFactory.create(column.type, data, column.args)
            ));
        }, this);

        if (this.parameters.editable) {
            //bind events (update) on click
            row.append($('<td class="row-edit">')
                .append($('<button class="' + this.edit_class + '">').append('<i class="fa fa-pencil">'))
                .append($('<button class="' + this.edit_validate_class + '">').hide().append('<i class="fa fa-check text-green">'))
                .append($('<button class="' + this.edit_cancel_class + '">').hide().append('<i class="fa fa-times text-red">'))
            );

            //add shadow json column
            row.append($('<td class="row-data" style="display:none">' + JSON.stringify(data) + '</td>'));

        }

    }

    _updateTableJson() {

        let updated_data = [];

        $('tr', this.tbody).each(function (row) {
            let json = JSON.parse($(this).find("td.row-data").html());

            updated_data.push(json);
        });

        this.parameters.data = updated_data;

        this.buildTable();
    }

    _enableInputsInRow(context) {
        let tr = $(context).closest('tr').first();

        tr.find("input, select, textarea").each(function () {
            $(this).prop('disabled', false);
        })
    }


}