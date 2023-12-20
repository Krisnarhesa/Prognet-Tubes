<template>
    
</template>


<script>
import axios from "redaxios";

export default {
    name: "satuanbarang",
    data() {
        return {
            allsatuanbarang: {},
            satuanbarang: {
                'id': "",
                'satuan': "",
            },
        };
    },
    created() {
        console.log("Created !");
        this.loadAllsatuanbarang();
    },

    mounted() {
        console.log("Mounted !");
    },
    methods: {
        loadAllsatuanbarang() {
            var url = "http://127.0.0.1:8000/api/satuanbarang";
            axios.get(url).then(({ data }) => {
                console.log(data);
                this.allsatuanbarang = data;
            });
        },
        remove(satuanbarang) {
            var url = `http://127.0.0.1:8000/api/satuanbarang/${satuanbarang.id}`;
            axios.delete(url).then(() => {
                console.log("Data Berhasil Dihapus");
                this.loadAllsatuanbarang();
            });
        },
        edit(satuanbarang) {
            var url = `http://127.0.0.1:8000/api/satuanbarang/${satuanbarang.id}`;
            axios.get(url).then(({ data }) => {
                this.satuanbarang = data;
                console.log("Data Berhasil Dipilih");
                console.log(this.satuanbarang);
            });
        },
        simpan() {
            if (this.satuanbarang.id == "") {
                //simpan baru
                var url = `http://127.0.0.1:8000/api/satuanbarang`;
                axios.post(url, this.satuanbarang).then(() => {
                    console.log("Data Berhasil Disimpan");
                    this.loadAllsatuanbarang();
                    this.clear();
                });
            } else {
                var url = `http://127.0.0.1:8000/api/satuanbarang/${this.satuanbarang.id}`;
                axios.put(url, this.satuanbarang).then(() => {
                    console.log("Data Berhasil Diedit");
                    this.loadAllsatuanbarang();
                    this.clear();
                });
            }
        },
        clear() {
            this.satuanbarang.id = "";
            this.satuanbarang.satuan = "";
        },
    },
};
</script>
