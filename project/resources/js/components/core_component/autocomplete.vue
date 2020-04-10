<template>
    <div id='autocompleate'>
        <input type="text" placeholder="what are you looking for?" v-model="searchquery" @keyup="autoComplete" class="form-control">
        <div class="panel-footer" v-if="data_results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in data_results">{{ result.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            url:'',
            options: {
                Object
            },
            value: null,
            multiple: {
                Boolean,
                default: false

            },
            classs:null
        },
        data: function () {
            return {
                searchquery: '',
                data_results: []
            }
        },
        methods: {
            autoComplete() {
                this.data_results = [];
                if (this.searchquery.length > 1) {
                    // '/lara-master-5.7/search'
                    axios.get(this.url, {
                        params: {searchquery: this.searchquery}
                    }).then(response => {
                        console.log(response.data);
                        this.data_results = response.data;
                    });
                }
            }
        }
    }
</script>

<style scoped>
#autocompleate{
    position: relative;
}
    #autocompleate .panel-footer{
        position: absolute;
        top:30px;
        z-index: 999;
    }
</style>