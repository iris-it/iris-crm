/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue, Vuex and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./legacy');

/**
 * Next, Vuex stores are loaded
 */

import addressStore from './stores/address';
const store = new Vuex.Store({
    modules: {
        addressStore
    }
});


/**
 * Then, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('Login', require('./components/Auth/Login.vue'));
Vue.component('Logout', require('./components/Auth/Logout.vue'));
Vue.component('UserProfile', require('./components/Auth/UserProfile.vue'));
Vue.component('ContactType', require('./components/Contact/ContactType.vue'));
Vue.component('Modal', require('./components/Common/Modal.vue'));
Vue.component('AddressBlock', require('./components/Common/AddressBlock.vue'));




const app = new Vue({

    el: '#app',

    store,

    data: {

        modalState : {},
        modalData: {},

        addressData: {}
    },

    methods: {

        showModal: function (id,data) {

            this.$set(this.modalData, id, data);
            this.$set(this.modalState, id, true);

        },

        saveAndCopy: function (srcId, destId) {

            this.addressData[destId] = Object.assign({},  this.addressData[destId], this.addressData[srcId]);

            store.commit('SAVE', srcId);
            store.commit('COPY', destId);

        },

    }




});


