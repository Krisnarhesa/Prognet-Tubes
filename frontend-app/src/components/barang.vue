<template></template>


<script>
import axios from "redaxios";

export default {
    name: "Barang",
    data() {
        return {
            allBarang: {},
            Barang: {
                'id': "",
                'kode': "",
                'namabarang': "",
                'harga': "",
                'stok': "",
                'satuan_id': "",
            },
        };
    },
    created() {
        console.log("Created !");
        this.loadAllBarang();
    },

    mounted() {
        console.log("Mounted !");
    },
    methods: {
        loadAllBarang() {
            var url = "http://127.0.0.1:8000/api/barang";
            axios.get(url).then(({ data }) => {
                console.log(data);
                this.allBarang = data;
            });
        },
        remove(Barang) {
            var url = `http://127.0.0.1:8000/api/barang/${Barang.id}`;
            axios.delete(url).then(() => {
                console.log("Data Berhasil Dihapus");
                this.loadAllBarang();
            });
        },
        edit(Barang) {
            var url = `http://127.0.0.1:8000/api/barang/${Barang.id}`;
            axios.get(url).then(({ data }) => {
                this.Barang = data;
                console.log("Data Berhasil Dipilih");
                console.log(this.Barang);
            });
        },
        simpan() {
            if (this.Barang.id == "") {
                //simpan baru
                var url = `http://127.0.0.1:8000/api/barang`;
                axios.post(url, this.Barang).then(() => {
                    console.log("Data Berhasil Disimpan");
                    this.loadAllBarang();
                    this.clear();
                });
            } else {
                var url = `http://127.0.0.1:8000/api/barang/${this.Barang.id}`;
                axios.put(url, this.Barang).then(() => {
                    console.log("Data Berhasil Diedit");
                    this.loadAllBarang();
                    this.clear();
                });
            }
        },
        clear() {
            this.Barang.id = "";
            this.Barang.kode = "";
            this.Barang.namabarang = "";
            this.Barang.harga = "";
            this.Barang.stok = "";
            this.Barang.satuan_id = "";
        },
    },
};
</script>
