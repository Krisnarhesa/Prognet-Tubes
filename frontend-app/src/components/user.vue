<template>

</template>

<script>
import axios from "redaxios";

export default {
    name: "user",
    data() {
        return {
            alluser: {},
            user: {
                'id': '',
                'name': '',
                'email': '',
                'password': ''
            }
        }
    },
    created() {
        console.log("Created !");
        this.loadAlluser();
    },

    mounted() {
        console.log("Mounted !");
    },
    methods: {
        loadAlluser() {
            var url = "http://127.0.0.1:8000/api/user";
            axios.get(url).then(({ data }) => {
                console.log(data);
                this.alluser = data;
            });
        },
        remove(user) {
            var url = `http://127.0.0.1:8000/api/user/${user.id}`;
            axios.delete(url).then(() => {
                console.log('Data Berhasil Dihapus');
                this.loadAlluser();
            });
        },
        edit(user) {
            var url = `http://127.0.0.1:8000/api/user/${user.id}`;
            axios.get(url).then(({ data }) => {
                this.user = data;
                console.log('Data Berhasil Dipilih');
                console.log(this.user);
            });
        },
        simpan() {
            if (this.user.id == '') {
                //simpan baru
                var url = `http://127.0.0.1:8000/api/user`;
                axios.post(url, this.user).then(() => {
                    console.log('Data Berhasil Disimpan');
                    this.loadAlluser();
                    this.clear();
                });
            } else {
                var url = `http://127.0.0.1t:8000/api/user/${this.user.id}`;
                axios.put(url, this.user).then(() => {
                    console.log('Data Berhasil Diedit');
                    this.loadAlluser();
                    this.clear();
                });
            }
        },
        clear(){
            this.user.id = '';
            this.user.name = '';
            this.user.email = '';
            this.user.password = '';
        },
    }
};
</script>