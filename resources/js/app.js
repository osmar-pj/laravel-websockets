//require('./bootstrap');
import Vue from 'vue'
import App from './App.vue'

import Buefy from 'buefy'
import '@mdi/font/css/materialdesignicons.min.css'

import Echo from "laravel-echo"
window.Pusher = require('pusher-js')

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '123qwe123',
    wsHost: window.location.hostname,
    wsPort: 6001,
    wssPort:6001,
    forceTLS: true,
    disableStats: true,
    encrypted: true,
    enabledTransports: ['ws','wss']
})

Vue.use(Buefy)

const app = new Vue ({
    el: '#root',
    template: `<app></app>`,
    components: { App }
})