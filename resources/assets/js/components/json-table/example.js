// /*
//  * Define the parameters !
//  */
//
// let table_parameters = {
//     target: '#item-table',
//     editable: true,
//     data: [],
//     columns: [  //'string|input|select|range|customs'
//         {
//             name: 'Désignation',
//             type: 'string',
//             args: {
//                 key: 'name'
//             }
//         }, {
//             name: 'Description',
//             type: 'textarea',
//             args: {
//                 key: 'description'
//             }
//         }, {
//             name: 'Quantités',
//             type: 'range',
//             args: {
//                 key: 'quantity',
//                 step: 0.01,
//                 min: 0,
//                 max: function (row) {
//                     return row.stock_disponibility || 25;
//                 }
//             }
//         }, {
//             name: 'Unités',
//             type: 'custom',
//             args: function (row) {
//                 return row.sale_unit || 'Unité';
//             }
//         }, {
//             name: 'Prix Unitaire HT',
//             type: 'string',
//             args: {
//                 key: 'ht_price'
//             }
//         }, {
//             name: 'Taxe(s) %',
//             type: 'custom',
//             args: function (row) {
//                 return row.taxes.map(function (obj) {
//                     return obj.value;
//                 }).join('&nbsp;-&nbsp;');
//             }
//         }, {
//             name: 'Prix HT',
//             type: 'custom',
//             args: function (row) {
//                 return (row.ht_price * row.quantity).toFixed(2) + "€";
//             }
//         }, {
//             name: 'Prix HT',
//             type: 'custom',
//             args: function (row) {
//                 return (row.ttc_price * row.quantity).toFixed(2) + "€";
//             }
//         },
//     ]
// };
//
// /*
//  * New instance
//  */
// let jsontable = new JsonTable(table_parameters);
//
// /*
//  * Build the table
//  */
// jsontable.buildTable();
//
//
// /*
//  * External button to add a new Row
//  * note: $current_selection is set before the click
//  */
// $('#search-submit-add').click(function () {
//     jsontable.addRow($.extend($current_selection, {
//         quantity: 1
//     }));
// });