import { createRouter, createWebHistory  } from 'vue-router';


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
    { path: "/", component: Home },
    { path: "/login", component: Login },
    { path: "/register", component: Register },
    { path: "/user/daftar", component: DaftarUser },
    { path: "/user/tambah", component: TambahUser },
    { path: "/user/edit/:id", component: EditUser },

    { path: "/penjualan/daftar", component: DaftarPenjualan },
    { path: "/penjualan/tambah", component: TambahPenjualan },
    { path: "/penjualan/detail/:id", component: DetailPenjualan },
    { path: "/penjualan/edit/:id", component: EditPenjualan },

    {
        path: "/detail-penjualan/tambah/:penjualan_id",
        component: TambahDetailPenjualan,
    },
    {
        path: "/detail-penjualan/edit/:penjualan_id/:id",
        component: EditDetailPenjualan,
    },

    { path: "/barang/daftar", component: DaftarBarang },
    { path: "/barang/tambah", component: TambahBarang },
    { path: "/barang/edit/:id", component: EditBarang },

    { path: "/satuan/daftar", component: DaftarSatuan },
    { path: "/satuan/tambah", component: TambahSatuan },
    { path: "/satuan/edit/:id", component: EditSatuan },
];

const router = createRouter({
    history : createWebHistory(),
    routes

})

export default router;