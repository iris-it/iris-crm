/**
 * Created by monkey_C on 28-Jun-16.
 */
const $ = require('jquery');

export function initDualListBox(domId) {
    var parameters = {
        filterTextClear: "Tout montrer",
        moveAllLabel: "Tout sélectionner",
        filterPlaceHolder: "Tapez pour filtrer...",
        moveSelectedLabel: "Sélectionner",
        removeSelectedLabel: "Déselectionner",
        removeAllLabel: "Tout déselectionner",
        infoText: "{0}",
        infoTextFiltered: '<span class="label label-warning">Filtre actif</span> {0} sur {1}',
        infoTextEmpty: "Vide",
        selectedListLabel: "Éléments sélectionnés :",
        nonSelectedListLabel: "Éléments disponibles :"

    };

    $('#' + domId).bootstrapDualListbox(parameters);
}

export function initDatePicker(domId) {
    $('#' + domId).datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'fr'
    });
}