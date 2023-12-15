<template>

</template>

<script>
import axios from "redaxios";

export default {
    name: "detailpenjualan",
    data() {
        return {
            alldetailpenjualan: {},
            detailpenjualan: {
                'id': '',
                'penjualan_id': '',
                'barang_id': '',
                'kuantitas': ''
            }
        }
    },
    created() {
        console.log("Created !");
        this.loadAlldetailpenjualan();
    },

    mounted() {
        console.log("Mounted !");
    },
    methods: {
        loadAlldetailpenjualan() {
            var url = "http://127.0.0.1:8000/api/detailpenjualan";
            axios.get(url).then(({ data }) => {
                console.log(data);
                this.alldetailpenjualan = data;
            });
        },
        remove(detailpenjualan) {
            var url = `http://127.0.0.1:8000/api/detailpenjualan/${detailpenjualan.id}`;
            axios.delete(url).then(() => {
                console.log('Data Berhasil Dihapus');
                this.loadAlldetailpenjualan();
            });
        },
        edit(detailpenjualan) {
            var url = `http://127.0.0.1:8000/api/detailpenjualan/${detailpenjualan.id}`;
            axios.get(url).then(({ data }) => {
                this.detailpenjualan = data;
                console.log('Data Berhasil Dipilih');
                console.log(this.detailpenjualan);
            });
        },
        simpan() {
            if (this.detailpenjualan.id == '') {
                //simpan baru
                var url = `http://127.0.0.1:8000/api/detailpenjualan`;
                axios.post(url, this.detailpenjualan).then(() => {
                    console.log('Data Berhasil Disimpan');
                    this.loadAlldetailpenjualan();
                    this.clear();
                });
            } else {
                var url = `http://127.0.0.1:8000/api/detailpenjualan/${this.detailpenjualan.id}`;
                axios.put(url, this.detailpenjualan).then(() => {
                    console.log('Data Berhasil Diedit');
                    this.loadAlldetailpenjualan();
                    this.clear();
                });
            }
        },
        clear(){
            this.detailpenjualan.id = '';
            this.detailpenjualan.penjualan_id = '';
            this.detailpenjualan.barang_id = '';
            this.detailpenjualan.kuantitas = '';
        },
    }
};
</script>