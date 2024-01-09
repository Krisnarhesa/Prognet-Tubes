<script>
import axios from 'axios';


export default {
    data(){
        return {
            daftarUser: [],
            dataUser: {
                'id': '',
                'name': '',
                'email': '',
                'password': ''
            },
            searchValues: {
            user: '',
        },
        }
    },
    mounted() {
        this.tampilUser();
    },
    methods: {
        async tampilUser(){
            const response = await axios.get(`https://api-group9-prognet.manpits.xyz/api/user`);
            this.daftarUser = response.data;
            console.log(this.daftarUser);
        },
        hapusUser(id){
            axios
            .delete(`https://api-group9-prognet.manpits.xyz/api/user/${id}`)
            .then(() => {this.tampilUser()});
        },
        filterUser() {
            // Jika daftar user belum disimpan, simpan daftar user asli
            if (!this.originalDaftarUser) {
                this.originalDaftarUser = [...this.daftarUser];
            }

            const filterUser = this.searchValues.user.toLowerCase();

            // Filter user berdasarkan nama dan email
            let filteredUser = this.originalDaftarUser.filter((user) => {
                const nameMatch = user.name.toLowerCase().includes(filterUser);
                const emailMatch = user.email.toLowerCase().includes(filterUser);

                // Return true jika nama atau email cocok dengan filter
                return nameMatch || emailMatch;
            });

            // jika filter kosong, tampilkan semua user
            if (!filterUser) {
                this.tampilUser();
            } else {
                // tampilkan user yang sesuai dengan filter
                this.daftarUser = filteredUser;
            }
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
                    <router-link to="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 13A6 6 0 1 0 7 1a6 6 0 0 0 0 12Zm0 0v6M4.5 7A2.5 2.5 0 0 1 7 4.5"/>
                        </svg>
                        User
                    </router-link>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Daftar User</span>
                    </div>
                </li>
            </ol>
            </nav>

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
                            <router-link to="/user/tambah" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah User</router-link>
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
                <input type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari User Nama/Email" v-model="searchValues.user" @input="filterUser">
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-x-auto shadow-md sm:rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
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
                <tr v-for="(user, key) in daftarUser" :key="user.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-3">
                        {{ ++key }}
                    </td>
                    <td class="px-6 py-3">
                    <span class="hover:bg-blue-200 bg-blue-100 text-blue-800 text-md font-medium inline-flex gap-2 items-center justify-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                        {{user.name}}
                    </span>
                    </td>
                    <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="text-base font-semibold">{{ user.email }}</div>
                    </td>
                    <td class="px-6 py-4">
                        {{
                            new Date( user.created_at).toLocaleString('id-ID')
                        }}
                    </td>
                    <td class="px-6 py-4 gap-3 flex">
                        <!-- Modal toggle -->
                        <router-link :to="'/user/edit/' + user.id" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</router-link>
                        <button @click="hapusUser(user.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</template>