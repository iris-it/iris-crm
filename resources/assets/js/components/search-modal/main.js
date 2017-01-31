require('datatables.net');
require('datatables.net-bs');

const $ = require('jquery');

const modal_template = require('./templates/modal.js').default;
const search_template = require('./templates/search.js').default;

export default class {

    constructor(parameters) {
        this.parameters = parameters;

        this._inject_modal('body');
    }


    /////////////////////////////////////////////////////////////////////////////////////////////
    // EVENTS                                                                                  //
    /////////////////////////////////////////////////////////////////////////////////////////////

    //

    /////////////////////////////////////////////////////////////////////////////////////////////
    // CALLBACKS                                                                               //
    /////////////////////////////////////////////////////////////////////////////////////////////

    //

    /////////////////////////////////////////////////////////////////////////////////////////////
    // PUBLIC METHODS                                                                          //
    /////////////////////////////////////////////////////////////////////////////////////////////

    //

    /////////////////////////////////////////////////////////////////////////////////////////////
    // PRIVATE METHODS                                                                         //
    /////////////////////////////////////////////////////////////////////////////////////////////


    /**
     *
     * @param target
     * @param content
     * @private
     */
    _inject_modal(target) {

        $(target).append(
            modal_template({
                modal_id: "my_pretty_modal",
                modal_title: 'test',
                modal_close_id: 'close_id',
                modal_close_title: 'close_title',
                modal_validate_id: 'validate_title',
                modal_validate_title: 'validate_title',
                modal_body: search_template({
                    table_id: 'mytable',
                }),
            })
        );

        $('#mytable').DataTable({
            "columns": [
                {"data": "name", "title": "Nom"},
                {"data": "description", "title": "Description"},
                {"data": "category", "title": "Category"},
                {"data": "sale_unit", "title": "Unité de vente"},
                {"data": "stock_disponibility", "title": "Stock disponible"},
                {"data": "ht_price", "title": "Prix HT"},
                {"data": "ttc_price", "title": "Prix TTC"},
                {"data": "salary"}
            ]
        });

        $('#my_pretty_modal').modal('show')

    }


}