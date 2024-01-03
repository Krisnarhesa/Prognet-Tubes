<script>
import axios from 'axios';

export default {
    data(){
        return {
            daftarPenjualan: [],
            dataUser: {
                name: '',
                email: '',
            },
            daftarUser: [],
            daftarBarang: [],
            dataBarang: {
                id: '',
                satuan: '',
            },
            daftarSatuan: []
        }
    },
    mounted() {   
        this.tampilPenjualan();
        this.tampilUser();
        this.tampilBarang();
        this.tampilSatuan();
    },
    methods: {
        async tampilPenjualan(){
            const response = await axios.get(`https://api-group9-prognet.manpits.xyz/api/penjualan`);
            this.daftarPenjualan = response.data;
            console.log(this.daftarPenjualan);
        },
        async tampilUser(){
            const response = await axios.get(`https://api-group9-prognet.manpits.xyz/api/user`);
            this.daftarUser = response.data;
            //console.log(this.dataUser);

            //return [response.data.name, response.data.email ];
        },
        formatCurrency(num){
            let idrCurrency = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            });

            return idrCurrency.format(num);
        },
        getCashierName(userId) {
            //console.log('UserId:', userId);
            //console.log('DaftarUser:', this.daftarUser);
            const user = this.daftarUser.find(user => user.id == userId);
            return user ? user.name : 'Unknown';
        },
        getCashierEmail(userId) {
            const user = this.daftarUser.find(user => user.id == userId);
            return user ? user.email : 'Unknown';
        },
        async tampilBarang(){
            const response = await axios.get(`https://api-group9-prognet.manpits.xyz/api/barang`);
            this.daftarBarang = response.data;
            console.log(this.daftarBarang);
        },
        formatCurrency(num){
            let idrCurrency = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            });

            return idrCurrency.format(num);
        },
        async tampilSatuan(){
            const response = await axios.get(`https://api-group9-prognet.manpits.xyz/api/satuanbarang`);
            this.daftarSatuan = response.data;
            //console.log(this.daftarSatuan);
        },
        getSatuan(satuan_id) {
            const satuan = this.daftarSatuan.find(satuan => satuan.id == satuan_id);
            return satuan ? satuan.satuan : 'Unknown';
        }
    }
}
</script>

<template>
   <div class="relative pt-12">
        <div class="py-5">
            
            <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        Dashboard
                    </a>
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Report Transaksi</span>
                    </div>
                </li>
            </ol>
            </nav>

        </div>
        
        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by Transaksi">
        </div>
        <div>
            <!-- Filter berdasarkan user dan Gmail -->
            <label for="filter-user-gmail" class="sr-only">Search Kasir</label>
            <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="filter-user-gmail" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by Kasir">
        </div>
        </div>
        <div>
            <!-- Filter total harga besar hingga kecil -->
            <label for="filter-total-harga" class="sr-only">Filter Total Harga</label>
            <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
     <svg class="w-[16px] h-[16px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138"/>
  </svg>
  </div>
            <select id="filter-total-harga" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="besar-ke-kecil">Filter by Harga (Besar ke Kecil)</option>
                <option value="kecil-ke-besar">Filter by Harga (Kecil ke Besar)</option>
            </select>
        </div>
        </div>
        <div>
            <!-- Filter tanggal -->
            <label for="filter-date" class="sr-only">Filter Tanggal</label>
            <input type="date" id="filter-date" class="text-sm text-gray-900 border border-gray-300 rounded-lg w-36 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Filter by Tanggal">
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-x-auto shadow-md sm:rounded-lg">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Transaksi
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Kasir
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Created
                </th>
            </tr>
        </thead>
        <tbody>
                <tr v-for="(penjualan, key) in daftarPenjualan" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ ++key }}
                    </td>
                    <td class="p-4">
                        <router-link :to="'/penjualan/detail/' + penjualan.id" class="w-full">
                            <span class="w-full hover:bg-blue-200 bg-blue-100 text-blue-800 text-md font-medium inline-flex gap-2 items-center justify-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                                {{ penjualan.nomortransaksi }}
                                <svg class="w-2 h-2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                            </span>
                        </router-link>
                    </td>
                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="ps-3">
                            <div class="text-base font-semibold"> {{  this.getCashierName(penjualan.user_id) }}</div>
                            <div class="font-normal text-gray-500"> {{ this.getCashierEmail(penjualan.user_id) }}</div>
                        </div>  
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 dark:text-white mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                            </svg>
                            {{this.formatCurrency(penjualan.totalharga)}}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{ 
                            new Date( penjualan.created_at).toLocaleString('id-ID')
                        }}
                    </td>
                </tr>
        </tbody>
    </table>
</div>


<div class="relative pt-12">
        <div class="py-5">
            
            <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        Dashboard
                    </a>
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Report Barang</span>
                    </div>
                </li>
            </ol>
            </nav>

        </div>
        
        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <div class="mb-2">
        <!-- Filter kode barang -->
        <label for="filter-kode-barang" class="sr-only">Filter ID Barang</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
        <input type="text" id="filter-kode-barang" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by ID Barang">
    </div>
    </div>
        <div class="mb-2">
        <!-- Filter range stok -->
        <label for="filter-range-stok" class="sr-only">Filter Range Stok</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-[16px] h-[16px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 20">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h6m-6 4h6m-6 4h6M1 1v18l2-2 2 2 2-2 2 2 2-2 2 2V1l-2 2-2-2-2 2-2-2-2 2-2-2Z"/>
  </svg>
    </div>
    <select id="filter-range-stok" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1-25">Filter by stok 1 - 10</option>
                <option value="25-50">Filter by stok 25 - 25</option>
                <option value="50-100">Filter by stok 50 - 100</option>
                <option value="100-200">Filter by stok 100 - 200</option>
                <option value="200-500">Filter by stok 200 - 500</option>
                <option value="500-1000">Filter by stok 500 - 1000</option>
                <option value="1000-2000">Filter by stok 1000 - 2000</option>
            </select>
    </div>
    </div>
    <div class="mb-2">
        <!-- Filter range harga barang -->
        <label for="filter-range-harga" class="sr-only">Filter Range Harga Barang</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
     <svg class="w-[16px] h-[16px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138"/>
  </svg>
  </div>
    <select id="filter-range-harga" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1000-100.000">Filter by range harga Rp. 1.000 - Rp. 100.000</option>
                <option value="100.000-500.000">Filter by range harga Rp. 100.000 - Rp. 500.000</option>
                <option value="500.000-1.000.000">Filter by range harga Rp. 500.000 - Rp. 1.000.000</option>
                <option value="1.000.000-5.000.000">Filter by range harga Rp. 1.000.000 - Rp. 5.000.000</option>
                <option value="5.000.000-10.000.000">Filter by range harga Rp. 5.000.000 - Rp. 10.000.000</option>
                <option value="10.000.000-50.000.000">Filter by range harga Rp. 10.000.000 - Rp. 50.000.000</option>
                <option value="50.000.000-100.000.000">Filter by range harga Rp. 50.000.000 - Rp. 100.000.000</option>
                <option value="100.000.000-500.000.000">Filter by range harga Rp. 100.000.000 - Rp. 500.000.000</option>
                <option value="500.000.000-100.000.000.000">Filter range by harga Rp. 500.000.000 - Rp. 100.000.000.000</option>
            </select>
    </div>
    </div>
     <div class="mb-2">
        <!-- Filter satuan -->
        <label for="filter-satuan" class="sr-only">Filter Satuan</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
        <input type="text" id="filter-satuan" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by Satuan">
    </div>
    </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-x-auto shadow-md sm:rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Satuan
                    </th>
            </tr>
        </thead>
        <tbody>
                <tr v-for="(barang, key) in daftarBarang" :key="barang.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-3">
                        {{ ++key }}
                    </td>
                    <td class="px-6 py-3">
                        <span class="hover:bg-blue-200 bg-blue-100 text-blue-800 text-md font-medium inline-flex gap-2 items-center justify-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                            {{barang.kode}}
                        </span>    
                    </td>
                    
                    <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="text-base font-semibold">{{ barang.namabarang }}</div>
                    </td>
                    <td class="px-6 py-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 dark:text-white mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1M2 5h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                            </svg>
                            {{ this.formatCurrency(barang.harga) }}
                        </div>
                    </td>
                    <td class="px-6 py-3">
                        {{ barang.stok }}
                    </td>
                    <td class="px-6 py-3">
                        <span class="hover:bg-blue-200 bg-blue-100 text-blue-800 text-md font-medium inline-flex gap-2 items-center justify-center px-3 py-1 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                            {{ this.getSatuan(barang.satuan_id) }}
                        </span> 
                    </td>
                </tr>
        </tbody>
    </table>
</div>
</template>

<style scoped>

</style>
