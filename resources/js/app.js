
require('./bootstrap');

window.Vue = require('vue').default;

import '../css/app.css';
import '../js/poper.js';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
