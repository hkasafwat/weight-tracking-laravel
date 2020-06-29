window.Vue = require('vue');

Vue.component('user-input', require('./components/UserInput.vue').default);
Vue.component('chart-info', require('./components/ChartInfo.vue').default);

const app = new Vue({
    el: '#app',
});
