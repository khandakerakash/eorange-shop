<template>
    <div id="cover"></div>

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="top_bar-shorcutr">
                            <ul>
                                <li id="front-top-mail" v-if="gs.email != null"><a href="mailto:info@eorange.shop"><i
                                        class="fa fa-envelope"></i> {{gs.email}} </a></li>
                                <li v-if="gs.phone != null"><span class="sc-line"></span></li>
                                <li  v-if="gs.phone != null"><a href="tel:01714-070175"><i class="fa fa-phone"></i> 01714-070175</a></li>

                                <li><span class="sc-line"></span></li>
                                <li><a href="{{url('user/orders')}}"><i class="fa fa-eye"></i> Track Order</a></li>
                                <li><span class="sc-line"></span></li>
                                <li class="last_li">
                                    <a data-toggle="modal" data-target="#vendorloginModal"><i class="fa fa-credit-card"></i>
                                        Merchant Corner</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-3 col-md-3 col-sm-6  order-1">
                        <div class="logo_container">
                            <div class="logo">
                                <a href="{{route('front.index')}}">
                                    <img src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form class="header_search_form clearfix" action="{{route('front.search')}}"
                                          method="GET">
                                        <input type="text" required="required" class="header_search_input ss" name="product"
                                               placeholder="{{$lang->ec}}">
                                        <button type="submit" class="header_search_button" value="Submit">
                                            <img src="{{asset('assets/front/images/search.png')}}" alt="">
                                        </button>
                                    </form>
                                </div>

                                <div class="header-searched-item-list-wrap" style="display: none;">
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-3 col-md-3 col-sm-6 order-lg-3 order-2">
                        <div class="header_main-cart">
                            <ul>
                                <li class="myCart1">
                                    <a href="javascript:void(0)">
                                        <div class="cart_count-area">
                                            <span><i class="fas fa-shopping-cart"></i></span> Cart
                                            <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
                                        </div>
                                    </a>
                                    <div class="addToMycart1">
                                        <div class="cart">
                                            @if(Session::has('cart'))
                                            @foreach(Session::get('cart')->items as $product)
                                            <div class="single-myCart">
                                                <div class="cart-info">
                                                    <a href="{{ route('front.product',[$product['item']['id'],$product['item']['name']]) }}"
                                                       style="color: black; padding: 0 0;">
                                                        <h5>{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</h5>
                                                    </a>
                                                    <p class="removecart"
                                                       onclick="remove({{$product['item']['id']}})"><i
                                                            class="fa fa-close"
                                                            style="cursor: pointer;"></i></p>
                                                </div>
                                                <p>{{$lang->cquantity}}: <span
                                                        id="cqt{{$product['item']['id']}}">{{$product['qty']}}</span>
                                                </p>
                                                <p>
                                                    @if($gs->sign == 0)
                                                    {{$curr->sign}}<span
                                                        id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>
                                                    @else
                                                    <span id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value , 2) }}</span>{{$curr->sign}}
                                                    @endif
                                                </p>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <h5 class="empty">{{ Session::has('cart') ? '' :$lang->h }}</h5>
                                        <hr/>
                                        <h4 class="text-left">{{$lang->vt}}
                                            @if($gs->sign == 0)
                                            {{$curr->sign}}<span
                                                    class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>
                                            @else
                                            <span class="total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>{{$curr->sign}}
                                            @endif
                                        </h4>
                                        <div class="addMyCart-btns">
                                            <a href="{{route('front.cart')}}" class="shade-btn">{{$lang->vdn}}</a>
                                            <a href="{{route('front.checkout')}}"
                                               class="black-btn">{{$lang->gt}}</a>
                                        </div>
                                    </div>
                                </li>

                                <li><span class="sc-line"></span></li>

                                <li class="last_li">
                                    <a href="{{route('user-login')}}"><span><i
                                            class="far fa-user"></i></span> {{$lang->signin}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Menu Desktop or large device-->
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-xs-12">
                        <ul class="cat_menu_container {{Request::is('/')?'cat_menu-home_logic':'cat_menu_container_other-pages'}}">
                            <div class="cat_menu_title">
                                <div class="cat_menu_text"><i class="fas fa-list"></i> <span>categories</span> <i
                                        class="fas fa-chevron-down"></i></div>
                            </div>

                            <ul class="cat_menu-item-ul">
                                @foreach($categories as $category)
                                <li class="{{count($category->subCategory) > 0?"cat_menu-li":""}}">
                                <router-link :to='{ name: "Category", params: { slug: "{{$category->slug}}" }}' class="sub-menu-title"> <i class="fa fa-fire"></i>&nbsp; {{ ucwords(strtolower($category->name)) }}</router-link>

                                <a href="{{route('front.category',$category->slug)}}">
                                    <i class="fa fa-fire"></i> &nbsp; {{ ucwords(strtolower($category->name)) }}
                                </a>

                                <div>

                                </div>
                                @if(count($category->subCategory) > 0)
                                <div class="mega-dropdown_open">
                                    <ul>
                                        <li>
                                            <div class="container dropdown-height-width">
                                                <div class="row">
                                                    @foreach($category->subCategory as $subcategory)
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <router-link :to='{ name: "Category", params: { slug: "{{$subcategory->slug}}" }}' class="sub-menu-title"> &nbsp; {{ ucwords(strtolower($subcategory->name)) }}</router-link>

                                                        @foreach($subcategory->subCategory as $childcategory)

                                                        <router-link :to='{ name: "Category", params: { slug: "{{$childcategory->slug}}" }}' class="sub-menu_item"> &nbsp; {{ ucwords(strtolower($childcategory->name)) }}</router-link>

                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                </li>
                                @endforeach

                            </ul><!-- /.cat_menu -->

                        </ul><!-- /.cat_menu_container -->

                        <!-- MOBILE NAV START -->
                        <div class="d-xl-none d-xs-block mobile_cat-menu">
                            <a class="hamburger-btn" role="button" data-toggle="collapse" href="#Mobilehamburger"
                               aria-expanded="false" aria-controls="Mobilehamburger">
                                <i class="fas fa-list"> Categories</i>
                            </a>
                            <div class="collapse hamburger-item_wrap" id="Mobilehamburger">
                                @foreach($categories as $catKey=> $category)
                                <div class="hamburger-item-head_wrap">

                                    @if(count($category->subCategory)==0)
                                    <div class="hamburger-item-head_wrap">
                                        <router-link :to='{ name: "Category", params: { slug: "{{$category->slug}}" }}'>  {{ ucwords(strtolower($category->name)) }}</router-link>

                                        {{--                                            <a href="{{route('front.category',$category->slug)}}">{{ ucwords(strtolower($category->name)) }}</a>--}}
                                    </div><!-- /hamburger header --><!-- /hamburger Items -->
                                    @else

                                    <a data-toggle="collapse" href=".navHeading-{{$catKey}}" aria-expanded="false"
                                       aria-controls="navHeading-{{$catKey}}">
                                        {{ ucwords(strtolower($category->name))}} <i class="fa fa-angle-down"></i>
                                    </a>
                                    @foreach($category->subCategory as $subKey=>$sub)
                                    <div class="collapse navHeading-{{$catKey}}">
                                        <div class="hamburger-link_wrap">

                                            @if(count($sub->subCategory)==0)
                                            <router-link  :to='{ name: "Category", params: { slug: "{{$sub->slug}}" }}' >{{ ucwords(strtolower($sub->name)) }}</router-link>

                                            {{--                                                        <a href="{{route('front.category',$sub->slug)}}">{{ ucwords(strtolower($sub->name)) }}</a>--}}
                                            @else
                                            <a role="button" data-toggle="collapse"
                                               href="#subCategory-{{$catKey}}-{{$subKey}}"
                                               aria-expanded="false"
                                               aria-controls="subCategory-{{$catKey}}-{{$subKey}}"> {{ ucwords(strtolower($sub->name)) }}
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="hamburger-link_wrap collapse"
                                                 id="subCategory-{{$catKey}}-{{$subKey}}">
                                                <ul>
                                                    @foreach($sub->subCategory as $child)
                                                    <li>
                                                        <router-link  :to='{ name: "Category", params: { slug: "{{$child->slug}}" }}' class="hamburger-link">{{ ucwords(strtolower($child->name)) }}</router-link>

                                                        {{-- <a href="{{route('front.category',$child->slug)}}"
                                                                class="hamburger-link">{{ ucwords(strtolower($child->name)) }}</a>--}}
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif


                                        </div>
                                    </div>
                                    @endforeach


                                    @endif


                                </div><!-- /hamburger header -->
                                @endforeach


                            </div>

                        </div>
                        <!-- MOBILE NAV END -->
                    </div>
                </div>
                <!-- Menu Desktop or large device-->
            </div>
        </div>

    </header>

    <!-- Banner -->
</template>

<script>
    import TopBar from 'top_bar';
    export default {
        components:{
            top_bar:TopBar
        },
        data:function(){
            return {
                top_bar:{
                    email:null,
                    phone:null,

                }
            }
        }
    }
</script>

<style scoped>

</style>