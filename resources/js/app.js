require('./bootstrap');
// window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
Vue.component('v-select', vSelect);

import VueSelectImage from 'vue-select-image'

require('vue-select-image/dist/vue-select-image.css');
Vue.use(VueSelectImage)

import VueLoading from 'vuejs-loading-plugin'
Vue.use(VueLoading)
// this.$loading(true)
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import App from './components/App';
import Hello from './components/Hello';
import Home from './components/Home';
import Reserva from './components/Reserva';
import Reservad from './components/Reservad';
import Reservae from './components/Reservae';
import Doctor from './components/Doctor';
import Especialidad from './components/Especialidad';




const router=new VueRouter({
    mode:'history',
    routes:[
        {path:'/home',name:'home',component:Home},
        {path:'/hello',name:'hello',component:Hello},
        {path:'/reserva',name:'reserva',component:Reserva},
        {path:'/reservad',name:'reservad',component:Reservad},
        {path:'/reservae',name:'reservae',component:Reservae},
        {path: '/doctor',name:'doctor',component: Doctor},
        {path: '/especialidad',name:'especialidad',component: Especialidad},
        // {path:'/',name:'home',Home},
    ]
});

// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/',
//             name: 'home',
//             component: Home
//         },
//         {
//             path: '/hello',
//             name: 'hello',
//             component: Hello,
//         },
//     ],
// });



// const app = new Vue({
//     el: '#app',
//     components: { App },
//     router,
// });

const app = new Vue({
    el: '#app',

    components:{App,VueSelectImage },
    router
});
