<template>

</template>

<script>
import axios from "redaxios";

export default {
    name: "Penjualan",
    data() {
        return {
            allPenjualan: {},
            Penjualan: {
                'id': '',
                'nomortransaksi': '',
                'totalharga': '',
                'user_id': ''
            }
        }
    },
    created() {
        console.log("Created !");
        this.loadAllPenjualan();
    },

    mounted() {
        console.log("Mounted !");
    },
    methods: {
        loadAllPenjualan() {
            var url = "http://127.0.0.1:8000/api/penjualan";
            axios.get(url).then(({ data }) => {
                console.log(data);
                this.allPenjualan = data;
            });
        },
        remove(Penjualan) {
            var url = `http://127.0.0.1:8000/api/Penjualan/${Penjualan.id}`;
            axios.delete(url).then(() => {
                console.log('Data Berhasil Dihapus');
                this.loadAllPenjualan();
            });
        },
        edit(Penjualan) {
            var url = `http://127.0.0.1:8000/api/Penjualan/${Penjualan.id}`;
            axios.get(url).then(({ data }) => {
                this.Penjualan = data;
                console.log('Data Berhasil Dipilih');
                console.log(this.Penjualan);
            });
        },
        simpan() {
            if (this.Penjualan.id == '') {
                //simpan baru
                var url = `http://127.0.0.1:8000/api/Penjualan`;
                axios.post(url, this.Penjualan).then(() => {
                    console.log('Data Berhasil Disimpan');
                    this.loadAllPenjualan();
                    this.clear();
                });
            } else {
                var url = `http://127.0.0.1t:8000/api/Penjualan/${this.Penjualan.id}`;
                axios.put(url, this.Penjualan).then(() => {
                    console.log('Data Berhasil Diedit');
                    this.loadAllPenjualan();
                    this.clear();
                });
            }
        },
        clear(){
            this.Penjualan.id = '';
            this.Penjualan.nomortransaksi = '';
            this.Penjualan.totalharga = '';
            this.Penjualan.user_id = '';
        },
    }
};
</script>