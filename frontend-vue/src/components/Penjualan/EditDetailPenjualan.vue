<script>
    import axios from 'axios';

    export default {
        data(){
            return{
                daftarBarang: [],
                dataDetailPenjualan:{
                    penjualan_id :'',
                    barang_id: '',
                    kuantitas: '',
                }
            }
        },
        mounted(){
            let id = this.$route.params.id;
            this.tampilDetailPenjualan(id)
            this.tampilBarang();
        },
        methods: {
            async tampilDetailPenjualan(id_dtl){
                const response = await axios.get(`https://api-group9-prognet.manpits.xyz/api/detailpenjualan/${id_dtl}`, {
                    
                    params: {
                        id: id_dtl,
                    }
                }
                );
                this.dataDetailPenjualan = response.data;
                //console.log(this.daftarDetailPenjualan);
            },
            async tampilBarang(){
                const response = await axios.get(`https://api-group9-prognet.manpits.xyz/api/barang`);
                this.daftarBarang = response.data;
                console.log(this.daftarBarang);
            },
            editDetailPenjualan(id_dtl){
                this.dataDetailPenjualan.penjualan_id = this.$route.params.penjualan_id;

                console.log(this.dataDetailPenjualan)

                axios
                .put(`https://api-group9-prognet.manpits.xyz/api/detailpenjualan/${id_dtl}`, 
                this.dataDetailPenjualan)
                .then((response) => {this.$router.push({ path: `/penjualan/detail/${this.dataDetailPenjualan.penjualan_id}` })});
            },
            formatCurrency(num){
                let idrCurrency = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                });

                return idrCurrency.format(num);
            },
        }
    }
</script>

<template>
    
    <div class="relative pt-12">
        <div class="py-5">
            
            <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <router-link :to="'/penjualan/detail/' + this.$route.params.penjualan_id" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z"/>
                        </svg>
                        Barang
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit Barang</span>
                    </div>
                </li>
            </ol>
            </nav>

        </div>
        
        <div class="max-w-lg mx-auto py-2 px-8 border border-gray-200 rounded-xl">
            <div class="py-4 mb-5 flex justify-between items-center">
                <h3 class="text-2xl font-semibold">Edit Barang</h3>

                <div>
                    <p class="text-md">No Transaksi : <span class="font-bold text-blue-500">{{ this.$route.params.penjualan_id }}</span></p>
                </div>
            </div>

            <form @submit.prevent="editDetailPenjualan(this.$route.params.id)" >
                <div class="relative z-0 w-full mb-5 group">                
                    <label for="satuan_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select id="satuan_barang" v-model="dataDetailPenjualan.barang_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih satuan</option>
                        <option v-for="(barang, key) in daftarBarang" :value="barang.id">{{ ++key }}.  {{ barang.namabarang }} - {{ formatCurrency(barang.harga) }}</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" v-model="dataDetailPenjualan.kuantitas" id="kuantitas_barang" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="kuantitas_barang" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kuantitas Barang</label>
                </div>
                <input type="hidden" v-model="dataDetailPenjualan.penjualan_id">

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>

    </div>        
    
</template>