import { createRouter, createWebHistory  } from 'vue-router';


import Home from "../components/Home.vue";
import Login from "../components/Login.vue";

import DaftarPenjualan from "../components/Penjualan/DaftarPenjualan.vue";
import TambahPenjualan from "../components/Penjualan/TambahPenjualan.vue";
import DetailPenjualan from "../components/Penjualan/DetailPenjualan.vue";
import EditPenjualan from "../components/Penjualan/EditPenjualan.vue";

import DaftarBarang from "../components/Barang/DaftarBarang.vue";
import TambahBarang from "../components/Barang/TambahBarang.vue";
import EditBarang from "../components/Barang/EditBarang.vue";

import DaftarSatuan from "../components/Satuan/DaftarSatuan.vue";
import TambahSatuan from "../components/Satuan/TambahSatuan.vue";
import EditSatuan from "../components/Satuan/EditSatuan.vue";

const routes = [
    { path: "/", component: Home},
    { path: "/login", component: Login  },

    { path: "/penjualan/daftar", component: DaftarPenjualan  },
    { path: "/penjualan/tambah", component: TambahPenjualan  },
    { path: "/penjualan/detail/:id", component: DetailPenjualan  },
    { path: "/penjualan/edit/:id", component: EditPenjualan  },
    
    { path: "/barang/daftar", component: DaftarBarang  },
    { path: "/barang/tambah", component: TambahBarang  },
    { path: "/barang/edit/:id", component: EditBarang  },
    
    { path: "/satuan/daftar", component: DaftarSatuan  },
    { path: "/satuan/tambah", component: TambahSatuan  },
    { path: "/satuan/edit/:id", component: EditSatuan  },
]

const router = createRouter({
    history : createWebHistory(),
    routes

})

export default router;