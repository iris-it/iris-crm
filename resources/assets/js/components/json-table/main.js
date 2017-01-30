const $ = require('jquery');

const _ = require('lodash');

const Sortable = require('sortablejs');

const EventClass = require('event-class').default;

const FieldFactory = require('./fields/field-factory');


export default class {

    /**
     * Here we initialize the parameters for the table
     *
     * Parameters required :
     * target: '#targetID'
     * editable: true|false (shows the button for edit)
     * data: an array of objects
     * columns: a definition of parameters for build specific html objects
     *        name: 'Quantités',
     *        type: 'string|input|range|select|textarea',
     *        args: object or callback ( the current row is in parameter )
     *
     * see the different types in the files for required arguments
     *
     */
    constructor(parameters) {
        /*
         * Save the parameters in the current instance
         */
        this.parameters = parameters;

        /*
         * Identifiers for building columns header and body
         */
        this.thead = $(`${this.parameters.target} thead`)[0];
        this.tbody = $(`${this.parameters.target} tbody`)[0];

        /*
         * Classes for events handlers ( onclick / drag end )
         */
        this.style_classes = {
            sort_handle: "__sort_handle",
            edit: "__table_edit",
            edit_cancel: "__table_cancel_edit",
            edit_validate: "__table_valid_edit"
        };

        /*
         * The factory is used to build predefined HTML elements
         */
        this.fieldFactory = new FieldFactory();

        /*
         * The are registered on the object initialization
         */
        this._registerEvents();
    }


    /////////////////////////////////////////////////////////////////////////////////////////////
    // EVENTS                                                                                  //
    /////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * The events are registered here
     * they use https://github.com/sroucheray/event-class as library
     * and Sortable JS for the drag and drop
     *
     * As they are defined in the instance
     * We can trigger them anywhere inside the class
     *
     * @private
     */
    _registerEvents() {

        this.events = new EventClass();

        /*
         * When the table is built ( with or without data )
         */
        this.events.on("OnBuild", () => {
            this._registerClickEditEvent();
        });

        /*
         * When a row is added to the table
         */
        this.events.on("OnAddRow", () => {
            this.buildTable();
            this._registerClickEditEvent();
        });

        /*
         * When a row is edited
         */
        this.events.on("OnEditRow", () => {
            this._updateTableJson();
            this._registerClickEditEvent();
        });

        /*
         * Initialization of Sortable JS
         * When a row is moved up or down
         * We trigger the edit to save the new position
         */
        Sortable.create(this.tbody, {
            animation: 150,
            handle: `.${this.style_classes.sort_handle}`,
            onEnd: () => {
                this.events.trigger("OnEditRow");
            }
        });
    }

    /**
     * This method registers the click event on a specific button ( edit )
     * Note: every time this method is called the listeners are removed and
     * reinitialized with the off() and on()
     *
     * @private
     */
    _registerClickEditEvent() {
        $(`.${this.style_classes.edit}`).off().on("click", (event) => {

            /*
             * edit_button : Button for edit
             * edit_cancel_button : Button for cancel the modifications
             * edit_validate_button : Button for persist the modifications
             */
            let edit_button = $(event.currentTarget);
            let edit_cancel_button = edit_button.siblings(`.${this.style_classes.edit_cancel}`).first();
            let edit_validate_button = edit_button.siblings(`.${this.style_classes.edit_validate}`).first();

            /*
             * We hide the button in order to show
             * the cancel and edit
             */
            edit_button.hide();

            /*
             * Now we are in edit mode
             * So the disabled inputs are editable
             *
             * Note : we pass the context of the edit button
             * so we can access to the row later
             */
            this._enableInputsInRow(edit_button);

            /*
             * We registers the events for cancel and validate
             *
             * Note : we pass the context of the buttons in order
             * to listen to the events
             */
            this._registerClickEditCancelEvent(edit_cancel_button);
            this._registerClickEditValidateEvent(edit_validate_button);

        });
    }

    /**
     *
     * @param context
     * @private
     */
    _registerClickEditCancelEvent(context) {

        /*
         * The context is the cancel button
         * We can un-hide it
         */
        context.show();

        /*
         * We attach a listener to cancel the modifications on click
         */
        context.off().on("click", () => {
            this.events.trigger("OnEditRow");
        });
    }

    /**
     *
     * @param context
     * @private
     */
    _registerClickEditValidateEvent(context) {

        /*
         * The context is the validate button
         * We can un-hide it
         */
        context.show();

        /*
         * We attach a listener to persist the modifications on click
         */
        context.off().on("click", () => {

            /*
             * We get the current row the the <tr>
             */
            let tr = $(context).closest('tr').first();

            /*
             * With the row we can get the hidden column which contains the json
             * data of the current row
             */
            let json = JSON.parse($(tr).find("td.row-data").html());

            /*
             * We need to go through every columns in order
             * to get the data of each inputs
             */
            $("td", tr).each(function () {

                /*
                 * We get the first element of the <td>
                 */
                let current_element = $(this).children(":first");

                /*
                 * Each input or data 'capable' elements has a
                 * data attribute named 'data-identifier'
                 * with value '__field_' concatenated with the key defined
                 * on the columns definition ( this.parameters.columns )
                 */
                let current_identifier = current_element.data('identifier');

                /*
                 * If the element has the data identifier and starting with the prefix
                 */
                if (_.startsWith(current_identifier, '__field_')) {

                    /*
                     * We cut the prefix to get the real key name
                     */
                    let attribute = _.split(current_identifier, '__field_')[1];

                    /*
                     * We can now save the data of the input inside the json
                     */
                    json[attribute] = current_element.val();
                }

            });

            /*
             * We put back the updated json into the 'data-row'
             */
            $(tr).find("td.row-data").html(JSON.stringify(json));

            this.events.trigger("OnEditRow");
        });
    }

    /////////////////////////////////////////////////////////////////////////////////////////////
    // PUBLIC METHODS                                                                          //
    /////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Builds the table
     *
     * Note : the data source is in the parameters of the current instance
     *
     * @public
     */
    buildTable() {
        this._buildTableHeader();
        this._buildTableBody();
        this.events.trigger("OnBuild");
    }

    /**
     * Add a row at the end of the table
     *
     * Note : the table is not "reactive" so we alter the data attribute
     * of the instance and we trigger a "rebuild" of the table
     *
     * @param data
     * @public
     */
    addRow(data) {
        this.parameters.data.push(data);
        this.events.trigger("OnAddRow");
    }


    /////////////////////////////////////////////////////////////////////////////////////////////
    // PRIVATE METHODS                                                                         //
    /////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Builds the table header based on the definition in
     * this.parameters.columns
     *
     * @private
     */
    _buildTableHeader() {

        /*
         * We need to clean the way ( in case of a rebuild )
         */
        $(this.thead).empty();

        let row = $('<tr></tr>').appendTo(this.thead);

        /*
         * We add an empty column for the
         * handles used by Sortable JS for drag and drop
         */
        row.append($('<th>').append(''));

        /*
         * Simple HTML build
         */
        this.parameters.columns.forEach(function (column) {
            row.append($('<th>').append(column.name));
        });

        /*
         * We add a last column for edit if the editable mode is true
         */
        if (this.parameters.editable) {
            row.append($('<th>').append('<i class="fa fa-pencil">'));
        }
    }

    /**
     * Build the body of the table with the
     * this.parameters.data attribute
     *
     * @private
     */
    _buildTableBody() {

        /*
         * We need to clean the way ( in case of a rebuild )
         */
        $(this.tbody).empty();

        /*
         * We retrieve the data for the rows
         */
        let rows = this.parameters.data;

        /*
         * Build each rows if data is provided
         */
        if (rows.length > 0) {
            rows.forEach((row) => {
                this._buildTableRows(row);
            });
        }
    }

    /**
     * Build a row following a specific configuration
     * based on the column definition
     *
     * @param data
     * @private
     */
    _buildTableRows(data) {

        /*
         * Create a row
         */
        let row = $(`<tr></tr>`).appendTo(this.tbody);

        /*
         * We add a handle used by Sortable JS for drag and drop
         * with a specific class
         */
        row.append($(`<td class="${this.style_classes.sort_handle}"><i class="fa fa-arrows-v"></i></td>`));

        /*
         * For each columns in the definition
         * We create a specific type of element with the factory
         * The factory needs a type, the current row as data, and some args
         * The data biding is up to the factory, this is why the 'key'
         * is passed among the args
         */
        this.parameters.columns.forEach((column) => {
            row.append($('<td>').append(
                this.fieldFactory.create(column.type, data, column.args)
            ));
        });

        /*
         * If the flag editable is set to true
         * We add the buttons for editing in the current row
         * Each buttons has a specific class in order to be listened
         * by events
         */
        if (this.parameters.editable) {
            //bind events (update) on click
            row.append($('<td class="row-edit">')
                .append($(`<button class="${this.style_classes.edit}">`).append('<i class="fa fa-pencil">'))
                .append($(`<button class="${this.style_classes.edit_validate}">`).hide().append('<i class="fa fa-check text-green">'))
                .append($(`<button class="${this.style_classes.edit_cancel}">`).hide().append('<i class="fa fa-times text-red">'))
            );

            /*
             * We add a shadow (non visible) json column to store the data
             * only if the editing flag is true, otherwise this is not useful
             * Note: the class is row-data
             */
            row.append($(`<td class="row-data" style="display:none">${JSON.stringify(data)}</td>`));

        }

    }

    /**
     * Update the data and the table
     *
     * @private
     */
    _updateTableJson() {

        let updated_data = [];

        /*
         * we go trough every rows of the table 'in the order'
         */
        $('tr', this.tbody).each(function (row) {
            /*
             * We get the json data of each row
             */
            let json = JSON.parse($(this).find("td.row-data").html());

            /*
             * And rebuild an array with it
             */
            updated_data.push(json);
        });

        /*
         * We rebuild the instance's data attribute with the updated data
         */
        this.parameters.data = updated_data;

        /*
         * And trigger a rebuild of the table
         */
        this.buildTable();
    }

    /**
     * Enable the disabled inputs inside a Table Row
     *
     * @param context
     * @private
     */
    _enableInputsInRow(context) {
        /*
         * the context is a button or input inside the Table Row
         * with this we cans retrieve the current table row
         */
        let tr = $(context).closest('tr').first();

        /*
         * We enable each input of the row
         */
        tr.find("input, select, textarea").each(function () {
            $(this).prop('disabled', false);
        })
    }


}