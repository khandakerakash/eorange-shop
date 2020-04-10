<template>
    <section class="new-category-page" v-if="!loading">
        <!-- CATEGORY PAGE BANNER START -->
        <div class="title-overlay-wrap overlay"
             :style="{height: '230px', 'background-image': 'url('+banner_image+')'}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h1>{{header_name}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- CATEGORY PAGE BANNER END -->

        <!-- CATEGORY CONTENT START -->
        <div class="category-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 category-left-side">
                        <div class="category-filter-sidebar mb-xs-5">
                            <a class="filter-sidebar-head" role="button" data-toggle="collapse" href="#borwse" aria-expanded="true" aria-controls="borwse">
                                Browse
                            </a>
                            <div class="collapse in" id="borwse">
                                <ul class="filter-sidebar-wrap">
                                    <li class="filter-sidebar-item" v-for="(cate,index) in sub_category">
                                        <router-link class="filter-sidebar-link" :to="{ name: 'Category', params: { slug: cate.slug }}"><i class="fa fa-angle-right"></i> {{cate.name}}</router-link>

                                        <!--<a class="filter-sidebar-link" :href="route('front.category',cate.slug)"><i class="fa fa-angle-right"></i> {{cate.name}}</a>-->
                                    </li>
                                </ul>
                            </div>
                            <!-- Filter By Browser End -->

                            <hr class="filter-sidebar-line">

                            <a class="filter-sidebar-head collapsed" role="button" data-toggle="collapse" href="#filterBySell" aria-expanded="false" aria-controls="filterBySell">
                                Filter By Vendors
                            </a>

                            <div class="collapse" id="filterBySell">
                                <ul class="filter-sidebar-wrap">
                                    <li class="filter-sidebar-item" v-for="(sell,index) in seller">
                                        <label class="filter-sidebar-link" > <input type="checkbox" :value="sell.id" v-model="filter.seller_by"/> {{sell.name}}</label>
                                    </li>

                                </ul>
                            </div>
                            <!-- Filter By Sell -->

                            <a class="filter-sidebar-head collapsed" role="button" data-toggle="collapse" href="#filterByBrand" aria-expanded="false" aria-controls="filterByBrand">
                                Filter By Brand
                            </a>

                            <div class="collapse" id="filterByBrand">
                                <ul class="filter-sidebar-wrap">
                                    <li class="filter-sidebar-item" v-for="(brand_item,index) in brand">
                                        <label class="filter-sidebar-link" ><input type="checkbox" :value="brand_item.id" v-model="filter.brand_by"/> {{brand_item.name}}</label>
                                    </li>

                                </ul>
                            </div>
                            <!-- Filter By Brand -->

                            <!-- Filter By Attributes -->

                            <!-- Filter By Price Start -->
                            <div class="product-filter-option">
                                <h2 class="filter-sidebar-head">Price</h2>
                                <form>
                                    <div class="form-group padding-bottom-10">
                                        <div class="range-slider">
                                            <!--<span @change="slider">from <input v-model.number="minPrice" type="number"  min="0" max="120000"/> to <input  v-model.number="maxPrice" type="number"  min="0" max="120000"/></span>-->
                                            <input @change="slider" v-model.number="filter.price.min" :min="min_price" :max="max_price" step="1" type="range" />
                                            <input @change="slider" v-model.number="filter.price.max" :min="min_price" :max="max_price" step="1" type="range" />
                                            <svg width="100%" height="24">
                                                <line x1="4" y1="0" x2="300" y2="0" stroke="#444" stroke-width="12" stroke-dasharray="1 28"></line>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" id="price-min" @blur="getData" name="min" class="price-input"  v-model="filter.price.min" style="direction: ltr;">
                                        <i class="fa fa-minus"></i>
                                        <input type="text" id="price-max" @blur="getData" name="max" class="price-input"  v-model="filter.price.max" style="direction: ltr;">
                                        <input type="submit" class="price-search-btn" @click.prevent="getData" value="Filter Price" style="direction: ltr;">
                                    </div>
                                </form>
                            </div>
                            <!-- Filter By Price End -->

                        </div>

                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-8 category-right-side">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <h3>{{header_name}}</h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="form-group sort-by-popularity">
                                    <label class="control-label">Sort By</label>
                                    <select class="form-control" v-model="filter.short_by">
                                        <option value="popularity">Popularity</option>
                                        <option value="position">Position</option>
                                        <option value="low_to_high">Price Low to high</option>
                                        <option value="high_to_low">Price High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="category-content-line">
                        <div class="category-content-items">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" v-for="(product,index) in dataGrid.data" >
                                    <a class="category_product-wrap" :href="route('front.product',[product.id,product.slug])">
                                        <div class="single-flash_item">
                                            <div class="product_offer-wrap">
                                                <div class="cdz-product-lbs">
                                                    <div class="lb-content lb-new" v-if="product.is_new">New</div>
                                                    <div class="lb-content lb-sale" v-if="product.off_price">{{product.off_percent}}</div>
                                                </div>
                                            </div>
                                            <div class="sold-out" v-if="product.stock === 0">Sold Out</div>
                                            <div>
                                                <a :href="route('front.product',[product.id,product.slug])" class="text-center">
                                                    <div class="flash-product-image-area-details">
                                                        <img :src="product.images" alt="new arrival product" class="img-responsive div-mx">
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="single-flash_item-content price_new-style">
                                                <a :href="route('front.product',[product.id,product.slug])"
                                                   class="title">{{product.title}}</a>
                                                <p class="price ml-2">
                                                    <span class="currency-taka">{{product.sign}}</span>

                                                    {{product.price}}
                                                    <br/>

                                                    <span class="off-taka" v-if="product.off_price">
                                                        <del><span
                                                                class="currency-taka">{{product.sign}}</span> {{product.off_prices}}</del>
                                                    </span>
                                                </p>
                                            </div>

                                        </div>
                                    </a>

                                </div>
                            </div>

                            <div class="row text-center">
                                <pagination :data="dataGrid" @pagination-change-page="getData"></pagination>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CATEGORY CONTENT END -->
    </section>
</template>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script>
    export default {

        data:function(){
            return {
                loading:true,
                slug: null,
                sub_category:[],
                seller:[],
                brand:[],
                min_price:0,
                max_price:0,
                header_name:'',
                banner_image:'',
                dataGrid:{},
                filter:{
                    short_by:'popularity',
                    seller_by:[],
                    brand_by:[],
                    price:{
                        min:0,
                        max:0
                    }
                }
            }
        },
        created: function () {
            this.slug = this.$route.params.slug;

            this.getData();
        },
        watch:{
            '$route.params.slug': function (slug) {
                this.slug = slug;
                this.filter.price.min = 0;
                this.filter.price.max = 0;
                this.getData(slug);
            },
            'filter.seller_by':function (val) {
                this.getData();
            },
            'filter.brand_by':function (val) {
                this.getData();
            },
            'filter.short_by':function (val) {
                this.getData();
            }
        },
        methods:{
            slider: function() {
                if (this.filter.price.min> this.filter.price.max) {
                    var tmp = this.filter.price.max;
                    this.filter.price.max = this.filter.price.min;
                    this.filter.price.min = tmp;
                }
            },
            getData:function (page=1) {
                this.loading = true;
                // alert(this.slug);
                axios.get(route('front.get_products',this.slug),{
                    params:{
                        type:'category',
                        page:page,
                        per_page:this.dataGrid.per_page,
                        filter:this.filter
                    }
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status === 'success'){
                        var data =res.data.data;
                        this.sub_category = data.sub_category;
                        this.seller = data.seller;
                        this.brand = data.brand;
                        this.min_price = data.min_price;
                        this.max_price = data.max_price;
                        this.header_name = data.header_name;
                        this.banner_image = data.banner_image;
                        this.filter.price = data.price_range;
                        this.dataGrid = data.products;
                        $("html, body").animate({ scrollTop: "100px" });
                    }else{
                        console.log(res.data);

                    }
                })
                this.loading = false;
            },
            isEmpty:function(obj) {
                return Object.keys(obj).length === 0;
            }
        }
    }
</script>

<style scoped>
    .range-slider {
        width: 100%;
        margin: auto;
        text-align: center;
        position: relative;
        height: 6em;
    }

    .range-slider svg,
    .range-slider input[type=range] {
        position: absolute;
        left: 0;
        bottom: 0;
    }

    input[type=number] {
        border: 1px solid #ddd;
        text-align: center;
        font-size: 1.6em;
        -moz-appearance: textfield;
    }

    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    input[type=number]:invalid,
    input[type=number]:out-of-range {
        border: 2px solid #ff6347;
    }

    input[type=range] {
        -webkit-appearance: none;
        width: 100%;
    }

    input[type=range]:focus {
        outline: none;
    }

    input[type=range]:focus::-webkit-slider-runnable-track {
        background: #fe6801;
    }

    input[type=range]:focus::-ms-fill-lower {
        background: #fe6801;
    }

    input[type=range]:focus::-ms-fill-upper {
        background: #fe6801;
    }

    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        animate: 0.2s;
        background: #fe6801;
        border-radius: 1px;
        box-shadow: none;
        border: 0;
    }

    input[type=range]::-webkit-slider-thumb {
        z-index: 2;
        position: relative;
        box-shadow: 0px 0px 0px #000;
        border: 1px solid #fe6801;
        height: 18px;
        width: 18px;
        border-radius: 25px;
        background: #fff;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }

</style>