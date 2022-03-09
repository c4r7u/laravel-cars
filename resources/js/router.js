import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from './pages/Home.vue';
import ContactUs from './pages/ContactUs.vue';
import CarList from './pages/CarList.vue';


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/car-list",
            name: "car-list",
            component: CarList
        },
        {
            path: "/contact-us",
            name: "contact-us",
            component: ContactUs
        }
    ]
});
export default router;