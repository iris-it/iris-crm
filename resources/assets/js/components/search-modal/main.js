require('datatables.net');
require('datatables.net-bs');

const $ = require('jquery');
const _ = require('lodash');
const axios = require("axios");
const EventClass = require('event-class').default;

const modal_template = require('./templates/modal.js').default;
const search_template = require('./templates/search.js').default;

const uuid = require('../common/main').uuid;

export default class {

    constructor(parameters) {

        let hash_id = uuid();

        let defaults = {
            button_target: '',
            source: '',
            reload: true,
            modal: {
                modal_title: 'Search',
                modal_close_title: 'Close',
                modal_validate_title: 'Validate',
                modal_body: '',
                modal_id: `${hash_id}_modal`,
                modal_close_id: `${hash_id}_close`,
                modal_validate_id: `${hash_id}_validate`,
            },
            table_id: `${hash_id}_table`,
            table_columns: [],
            onSubmit: function () {

            }
        };

        this.parameters = Object.assign({}, defaults, parameters);

        this._registerEvents();

        this._injectModal();

    }


    /////////////////////////////////////////////////////////////////////////////////////////////
    // EVENTS                                                                                  //
    /////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * The events are registered here
     * they use https://github.com/sroucheray/event-class as library
     *
     * As they are defined in the instance
     * We can trigger them anywhere inside the class
     *
     * @private
     */
    _registerEvents() {

        this.events = new EventClass();

        /*
         * When the modal is injected in the page
         */
        this.events.on("OnModalInjected", () => {
            this._retrieveData();
        });

        /*
         * When the data is available
         */
        this.events.on("OnDataRetrieve", (data) => {
            this._createDatatable(data)
        });

        /*
         * When the datatable is ready
         */
        this.events.on("OnTableLoaded", () => {
            this._registerModalEvents();
        });

        /*
         * When a the user or an action closes the modal
         */
        this.events.on("OnError", (error) => {
            console.group("irispass-error");
            console.error(error);
            console.groupEnd();

            //TODO notify user
            //TODO Send Error report
        });
    }

    _registerModalEvents() {

        /*
         * When an user press the button to see the list
         */
        $(this.parameters.button_target).click(() => {

            if (this.parameters.reload) {
                this._retrieveData();
            }

            $(`#${this.parameters.modal.modal_id}`).modal('show');
        });

        /*
         * When an user submit his selected items
         */
        $(`#${this.parameters.modal.modal_validate_id}`).click(() => {

            if (typeof this.parameters.onSubmit == 'function') {
                this.parameters.onSubmit.call(this, this._getSelectedItems());
            }

            let table = $(`#${this.parameters.table_id}`);

            table.find('tr').removeClass('active');

            $(`#${this.parameters.modal.modal_id}`).modal('hide');
        });
    }

    /////////////////////////////////////////////////////////////////////////////////////////////
    // PRIVATE METHODS                                                                         //
    /////////////////////////////////////////////////////////////////////////////////////////////


    /**
     *
     * @param target
     * @param content
     * @private
     */
    _injectModal() {

        this.parameters.modal.modal_body = search_template({
            table_id: this.parameters.table_id
        });

        $('body').append(modal_template(this.parameters.modal));

        this.events.trigger("OnModalInjected");
    }

    /**
     *
     * @param target
     * @param content
     * @private
     */
    _retrieveData() {

        let http = axios.create({
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-Requested-With': 'XMLHttpRequest'
        });

        http.get(this.parameters.source).then(response => {
            this.events.trigger("OnDataRetrieve", response.data);
        }).catch(error => {
            this.events.trigger("OnError", error);
        });

    }

    _createDatatable(data) {

        $.fn.dataTable.ext.errMode = (settings, helpPage, message) => {
            this.events.trigger("OnError", message);
        };

        let table = $(`#${this.parameters.table_id}`);

        /*
         * We register globally the instance in order to retrieve the data
         */
        this.datatables = table.DataTable({
            data: data,
            columns: this.parameters.table_columns,
            destroy: true,
            initComplete: () => {
                this.events.trigger("OnTableLoaded");
            }
        });


        table.find(`tbody`).off().on('click', 'tr', function () {
            $(this).toggleClass('active');
        });
    }

    _getSelectedItems() {
        return this.datatables.rows('.active').data().toArray();
    }

}