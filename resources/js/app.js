import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import ApolloClient from 'apollo-boost'
import VueApollo from 'vue-apollo'



require('./bootstrap');
window.Vue = require('vue');

Vue.component('v-select', vSelect);
Vue.use(VueSweetalert2);
Vue.use(VueApollo)

Vue.mixin({
    data() {
        return {
            get appdata() {
                return window._init;
            }
        }
    },
});

Vue.filter('number', (value) => {
    return new Intl.NumberFormat().format(value);
});

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0].split('Component')[0], files(key).default))

const apolloClient = new ApolloClient({
    uri: '/graphql'
})

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    apolloProvider
});
