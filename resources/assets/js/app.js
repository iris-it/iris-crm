var Vue = require('vue');

import Login from './components/Auth/Login.vue';
import Logout from './components/Auth/Logout.vue';
import UserProfile from './components/Auth/UserProfile.vue';

new Vue({
    el: '#app',
    components: {Login, Logout, UserProfile}
});

var IrisCrm = (function () {

    var initDualListBox = function (domId) {
        var parameters = {
            filterTextClear: "Tout montrer",
            moveAllLabel: "Tout sélectionner",
            filterPlaceHolder: "Tapez pour filtrer...",
            moveSelectedLabel: "Sélectionner",
            removeSelectedLabel: "Déselectionner",
            removeAllLabel: "Tout déselectionner",
            infoText: "Sélection : {0}",
            infoTextFiltered: '<span class="label label-warning">Filtre actif</span> {0} sur {1}',
            infoTextEmpty: "Liste vide"

        };

        $('#' + domId).bootstrapDualListbox(parameters);
    }
});