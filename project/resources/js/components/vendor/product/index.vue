<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-row">
                <div class="form-group col-md-3" >
                    <input type="search" class="form-control"  placeholder="Search Product Name" v-model="filter.keyword" />
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover products dt-responsive"
                       cellspacing="0" width="100%" style="width:100%">
                    <thead>
                    <tr>
                        <th>#id</th>
                        <th style="width: 50px;">Img</th>

                        <th style="width: 150px;">Product Title</th>
                        <th style="width: 100px;">Price</th>
                        <th style="width: 150px;">Category</th>
                        <th style="width: 150px;">Stock</th>
                        <th style="width: 130px;">Status</th>
                        <th style="width: 370px;">Actions</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr v-for="product in dataGrid.data" v-if="!loading">
                        <td>{{product.id}}</td>
                        <td><img :src="product.image" alt="" style="height: 50px;"></td>
                        <td><a :href="product.name.route" target="_blank">{{product.name.name}}</a></td>
                        <td>{{product.price.sign}}{{product.price.price}}</td>
                        <td>{{product.latest_category.name}}</td>
                        <td>{{product.stock}}</td>

                        <td>
                            <div class="dropdown">
                                <button :class="['btn', 'btn-'+product.status.class,'product-btn' ,'dropdown-toggle','btn-xs']" type="button" data-toggle="dropdown" style="font-size: 14px;">
                                    {{product.status.label}}
                                    <span class="caret"></span>
                                </button>
                           <ul class="dropdown-menu">
                            <li><a :href="product.status.active_route">Active</a></li>
                               <li><a :href="product.status.inactive_route">Deactive</a></li>
                            </ul>
                            </div>
                        </td>

                        <td>
                            <a :href="product.action.route.edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                            <a :href="product.action.route.delete" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>

                        </td>
                    </tr>
                    <tr v-if="loading">
                        <td colspan="9" style="height: 300px" class="text-center text-danger "><h2>Loading....</h2></td>
                    </tr>
                    </thead>

                </table>

                <pagination :data="dataGrid" @pagination-change-page="getData"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",
        props:['route'],
        data: function () {
            return {
                loading:true,
                filter:{
                    keyword:'',
                    short_by:{
                        type:'DESC',//DESC
                        key:'name'
                    }
                },
                dataGrid:{}
            }
        },
        watch:{
           'filter.keyword':function (val) {
               if(val !== ''){
                   // alert(1);
                   this.getData(this.dataGrid.current_page)
               }
           }
        },
        mounted:function(){
            this.getData();
        },
        methods:{

            getData:function(page=1){
                this.loading = true;
                axios.get(this.route+'?page=' + page + '&per_page='+this.dataGrid.per_page,{
                    params:{
                        keyword:this.filter.keyword
                    }
                }).then(res=>{
                    // alert(res.data.data.keyword);
                    this.dataGrid = res.data.data.product;
                    // this.dataGrid = res.data;
                });
                this.loading = false;

            },
        }
    }
</script>

<style scoped>

</style>