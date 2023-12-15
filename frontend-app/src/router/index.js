import { createWebHistory, createRouter } from "vue-router";
import Home from "../components/Home.vue";
import Register from '../components/Register.vue';
import Login from "../components/Login.vue";
import Dashboard from "../components/Dashboard.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/register",
        name: "register",
        component: Register,
    },
    {
        path: "/login",
        name: "login",
        component: Login,
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;