var Vue = require('vue');

import Login from './components/Auth/Login.vue';
import Logout from './components/Auth/Logout.vue';
import UserProfile from './components/Auth/UserProfile.vue';
import ContactType from './components/Contact/ContactType.vue';

new Vue({
    el: '#app',
    components: {Login, Logout, UserProfile, ContactType}
});

