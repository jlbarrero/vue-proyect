// any CSS you require will output into a single css file (app.css in this case)
//require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');
// assets/js/app.js
import Vue from 'vue';
import Base from '../components/Base/Base'
import router from '../router/router-person'
import axios from "axios";
import store from '../store/store'

/**
 * New a fresh Vue Application instance
 */
Vue.use(axios);
new Vue({
    el: '#app',
    router,
    store,
    components: {Base},
    template:'<Base/>'
});
console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
