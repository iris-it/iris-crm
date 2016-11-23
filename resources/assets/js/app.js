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
Vue.component('Modal', require('./components/Common/Modal.vue'));
Vue.component('AddressForm', require('./components/Common/AddressForm.vue'));
Vue.component('OfficeTabcontent', require('./components/Office/TabContent.vue'));


const app = new Vue({

  el: '#app',

  store,

  data: {

    modalState: {},
    modalData: {},

    tabState: {},
    tabContent: {},

    addressData: {}
  },

  methods: {

    showModal: function (id, data) {

      this.$set(this.modalData, id, data);
      this.$set(this.modalState, id, true);

    },

    showTab: function(id,data) {

        this.$set(this.tabContent, id, data);

        for (var key in this.tabState) {
            if (this.tabState.hasOwnProperty(key) && key != id) {
                this.tabState[key] = false;
            }
        }

        this.$set(this.tabState, id, true);

    },

    duplicateAddress: function (srcId, destIdArray) {

      destIdArray.forEach(function (item) {

        app.addressData[item] = Object.assign({}, app.addressData[item], app.addressData[srcId]);
        store.commit('COPY', item);

      });


    },

  }


});


