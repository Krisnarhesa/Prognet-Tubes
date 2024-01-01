import { createRouter, createWebHistory, useRouter } from "vue-router";
 
import Home from "../components/Home.vue";
import Login from "../components/Login.vue";
import Register from "../components/Register.vue";
import DaftarUser from "../components/User/DaftarUser.vue";
import TambahUser from "../components/User/TambahUser.vue";
import EditUser from "../components/User/EditUser.vue";
 
import DaftarPenjualan from "../components/Penjualan/DaftarPenjualan.vue";
import TambahPenjualan from "../components/Penjualan/TambahPenjualan.vue";
import DetailPenjualan from "../components/Penjualan/DetailPenjualan.vue";
import EditPenjualan from "../components/Penjualan/EditPenjualan.vue";
 
import TambahDetailPenjualan from "../components/Penjualan/TambahDetailPenjualan.vue";
import EditDetailPenjualan from "../components/Penjualan/EditDetailPenjualan.vue";
 
import DaftarBarang from "../components/Barang/DaftarBarang.vue";
import TambahBarang from "../components/Barang/TambahBarang.vue";
import EditBarang from "../components/Barang/EditBarang.vue";
 
import DaftarSatuan from "../components/Satuan/DaftarSatuan.vue";
import TambahSatuan from "../components/Satuan/TambahSatuan.vue";
import EditSatuan from "../components/Satuan/EditSatuan.vue";
 
const routes = [
    { path: "/", component: Home, meta: { auth: true } },
    { path: "/login", component: Login, meta: { auth: false } },
    { path: "/register", component: Register, meta: { auth: false } },
    { path: "/user/daftar", component: DaftarUser, meta: { auth: true } },
    { path: "/user/tambah", component: TambahUser, meta: { auth: true } },
    { path: "/user/edit/:id", component: EditUser, meta: { auth: true } },
 
    {
        path: "/penjualan/daftar",
        component: DaftarPenjualan,
        meta: { auth: true },
    },
    {
        path: "/penjualan/tambah",
        component: TambahPenjualan,
        meta: { auth: true },
    },
    {
        path: "/penjualan/detail/:id",
        component: DetailPenjualan,
        meta: { auth: true },
    },
    {
        path: "/penjualan/edit/:id",
        component: EditPenjualan,
        meta: { auth: true },
    },
 
    {
        path: "/detail-penjualan/tambah/:penjualan_id",
        component: TambahDetailPenjualan,
        meta: { auth: true },
    },
    {
        path: "/detail-penjualan/edit/:penjualan_id/:id",
        component: EditDetailPenjualan,
        meta: { auth: true },
    },
 
    { path: "/barang/daftar", component: DaftarBarang, meta: { auth: true } },
    { path: "/barang/tambah", component: TambahBarang, meta: { auth: true } },
    { path: "/barang/edit/:id", component: EditBarang, meta: { auth: true } },
 
    { path: "/satuan/daftar", component: DaftarSatuan, meta: { auth: true } },
    { path: "/satuan/tambah", component: TambahSatuan, meta: { auth: true } },
    { path: "/satuan/edit/:id", component: EditSatuan, meta: { auth: true } },
];
 
const router = createRouter({
    history: createWebHistory(),
    routes,
});
 
router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some((x) => x.meta.auth);
 
    if (requiresAuth && !localStorage.getItem("token")) {
        window.location.href = "/login";
        return;
    }
 
    if (localStorage.getItem("token") && ['/login', '/register'].includes(to.path)) {
        window.location.href = "/";
        return;
    }
 
    next();
});
 
export default router;
