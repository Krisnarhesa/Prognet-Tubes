<script>
import axios from 'axios';
import {ref} from 'vue';

//let penjualanId = this.$route.params.id;

export default {
    data(){
        return {
            daftarDetailPenjualan: [],
            dataUser: {
                name: '',
                email: '',
            },
            daftarBarang: [],
        }
    },
    mounted() {   
        let id = this.$route.params.id;

        this.tampilDetailPenjualan(id);
        this.tampilUser();
    },
    methods: {
        async tampilDetailPenjualan(detail_id){
            const response = await axios.get(`${import.meta.env.VITE_API_URL}/detailpenjualan`, {
                
                params: {
                    penjualan_id: detail_id,
                }
            }
            );
            this.daftarDetailPenjualan = response.data;
            //console.log(this.daftarDetailPenjualan);
        },
        async tampilUser(){
            const response = await axios.get(`${import.meta.env.VITE_API_URL}/barang`);
            this.daftarBarang = response.data;
            //console.log(this.dataUser);

            //return [response.data.name, response.data.email ];
        },
        hapusDetailPenjualan(id){
            axios
            .delete(`${import.meta.env.VITE_API_URL}/penjualan/${id}`)
            .then(() => {this.tampilPenjualan()});
        },
        formatCurrency(num){
            let idrCurrency = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            });

            return idrCurrency.format(num);
        },
        getNamaBarang(barangId) {
            const barang = this.daftarBarang.find(barang => barang.id == barangId);
            return barang ? barang.namabarang : 'Unknown';
        },
        getHargaBarang(barangId) {
            const barang = this.daftarBarang.find(barang => barang.id == barangId);
            return barang ? barang.harga : 'Unknown';
        },
        getKodeBarang(barangId) {
            const barang = this.daftarBarang.find(barang => barang.id == barangId);
            return barang ? barang.kode : 'Unknown';
        },
        // getPenjualanId(){
        //     let id_p =  this.$route.params.id;
        //     console.log(id_p)
        //     return id_p ;
        // }
    }
}
</script>

<template>
    
    <div class="relative pt-12">
        <div class="py-5">
            
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <router-link to="/penjualan/daftar" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                            </svg>
                            Penjualan
                        </router-link>
                    </li>
                    <!-- <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Daftar Penjualan</a>
                    </div>
                    </li> -->
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit Penjualan</span>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        
        <div class="py-5 flex items-center gap-2">
            <h3 class="text-xl">Nomor Transaksi : </h3>
            <h3 class="text-xl text-blue-500 font-semibold" >{{ this.$route.params.id }}</h3>
        </div>

        
        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <span class="sr-only">Action button</span>
                    Action
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                        <li>
                            <router-link to="/detail-penjualan/tambah" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah Barang</router-link>
                        </li>
                    </ul>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari penjualan">
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-x-auto shadow-md sm:rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Created
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(detailP, key) in daftarDetailPenjualan" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ ++key }}
                    </td>
                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="ps-3">
                            <div class="text-base font-semibold"> {{  this.getNamaBarang(detailP.barang_id) }}</div>
                            <div class="font-normal text-gray-500"> {{ this.getKodeBarang(detailP.barang_id) }}</div>
                        </div>  
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 dark:text-white mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                            </svg>
                            {{this.formatCurrency( this.getHargaBarang(detailP.barang_id))}}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{ 
                            detailP.kuantitas
                        }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 dark:text-white mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                            </svg>
                            {{ 
                                this.formatCurrency(detailP.kuantitas *  this.getHargaBarang(detailP.barang_id))
                            }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{ 
                            new Date( detailP.created_at).toLocaleString('id-ID')
                        }}
                    </td>
                    <td class="px-6 py-4 gap-3 flex">
                        <!-- Modal toggle -->
                        <!-- <a href="#" type="button" @click="dataPenjualan.detailP = detailP.id" data-modal-target="editPenjualanModal" data-modal-show="editPenjualanModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> -->
                        <router-link :to="'/detailpenjualan/edit/' + detailP.id" type="button" data-modal-target="editPenjualanModal" data-modal-show="editPenjualanModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</router-link>
                        <button @click="hapusDetailPenjualan(detailP.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>        
    
</template>