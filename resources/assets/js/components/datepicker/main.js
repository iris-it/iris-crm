const $ = require('jquery');

export default class {

    constructor(target) {

        this.target = target;

        this._buildDatePicker();
    }

    _buildDatePicker() {
        $.fn.datepicker.dates.fr = {
            days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
            daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
            daysMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
            months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
            monthsShort: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"],
            today: "Aujourd'hui",
            clear: "Annuler",
            format: "dd/mm/yyyy",
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
            weekStart: 0
        };

        $(`${this.target}`).datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            language: 'fr',
            templates: {
                leftArrow: '<i class="fa text-purple fa-arrow-circle-left"></i>',
                rightArrow: '<i class="fa text-purple fa-arrow-circle-right"></i>'
            },
            todayHighlight: true,
        });
    }
}
