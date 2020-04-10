{{--<div id="cover"></div>--}}

<!-- Header -->




<header class="header header-wrap">

    <!-- Top Bar -->

    <div class="header-offer">

        @if($gs->sb == 1)
            <div class="header-offer_banner">
                <a href="{{$banner->top1l}}">
                    <img class="img-responsive" src="{{asset('assets/images/'.$banner->top1)}}" alt="Offer Banner">
                </a>
                <div class="header-offer_banner-close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
            </div>
        @endif
    </div>

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top_bar-shorcutr">
                        <ul>
                            @if($gs->email != null)
                                <li id="front-top-mail"><a href="mailto:{{$gs->email}}"><i
                                                class="fa fa-envelope"></i> {{$gs->email}} </a></li>
                            @endif
                            @if($gs->phone != null)
                                <li><span class="sc-line"></span></li>
                                <li><a href="tel:{{$gs->phone}}"><i class="fa fa-phone"></i> {{$gs->phone}}</a></li>
                            @endif
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
                <div class="col-lg-3 col-md-6 col-sm-6 order-lg-1 order-md-1 order-sm-1 order-1">
                    <div class="logo_container">
                        <div class="logo">
                            <a href="{{route('front.index')}}">
                                <img src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-md-12 col-sm-12 order-lg-2 order-md-3 order-sm-3 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form class="header_search_form clearfix" action="{{route('front.search')}}"
                                      method="GET">
                                    <input type="text" required="required" class="header_search_input ss" name="product"
                                           placeholder="{{$lang->ec}}">
                                    <button type="submit" class="header_search_button" value="Submit"><img
                                                src="{{asset('assets/front/images/search.png')}}" alt=""></button>
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
                <div class="col-lg-3 col-md-6 col-sm-6 order-lg-3 order-md-2 order-sm-2 order-2">
                    <div class="header_main-cart"   >
                        <ul>
                            <li class="myCart1" >
                                <a href="javascript:void(0)" >
                                    <div class="cart_count-area">
                                        <span><i class="fas fa-shopping-cart"></i></span> Cart
                                        <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>
                                    </div>
                                </a>
                            </li>

                            <li><span class="sc-line"></span></li>

                            <li class="last_li">
                                @if(auth()->guard('user')->check())
                                    <a href="{{route('user-dashboard')}}"><span><i
                                                    class="far fa-user"></i></span>{{auth()->guard('user')->user()->name}}</a>
                                    @else
                                <a href="{{route('user-login')}}"><span><i
                                                class="far fa-user"></i></span> {{$lang->signin}}</a>
                                    @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Menu Desktop or large device-->
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-12">
                    <ul class="cat_menu_container {{Request::is('/')?'cat_menu-home_logic':'cat_menu_container_other-pages'}}">
                        <div class="cat_menu_title">
                            <div class="cat_menu_text"><i class="fas fa-list"></i> <span>categories</span> <i
                                        class="fas fa-chevron-down"></i></div>
                        </div>

                        <ul class="cat_menu-item-ul">
                            @foreach($categories as $category)
                                <li class="{{count($category->subCategory) > 0?"cat_menu-li":""}}">
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
                                                                    <a href="{{route('front.category',$subcategory->slug)}}"
                                                                       class="sub-menu-title">{{ucwords(strtolower($subcategory->name))}}</a>
                                                                    @foreach($subcategory->subCategory as $childcategory)
                                                                        <a href="{{route('front.category',$childcategory->slug)}}"
                                                                           class="sub-menu_item">{{ucwords(strtolower($childcategory->name))}}</a>
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
                                            <a href="{{route('front.category',$category->slug)}}">{{ ucwords(strtolower($category->name)) }}</a>
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
                                                        <a href="{{route('front.category',$sub->slug)}}">{{ ucwords(strtolower($sub->name)) }}</a>
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
                                                                        <a href="{{route('front.category',$child->slug)}}"
                                                                           class="hamburger-link">{{ ucwords(strtolower($child->name)) }}</a>
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

                <div class="col-lg-9 col-md-8">
                    <div class="utility_menu">
                        <input class="menu-btn" type="checkbox" id="menu-btn" />
                        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                        <ul class="menu">
                            <li><a href="{{route('front.new_arrivals')}}">New Arrivals</a></li>
                            <li><a href="{{route('front.999markets')}}">999 Zone</a></li>
                            <li><a href="{{route('front.spatial_category','chinabasket')}}">China Basket</a></li>
                            <li><a href="{{route('front.spatial_category','surpriseoffer')}}">Gift Corner</a></li>
                            <li><a href="{{route('front.spatial_category','exclusive-offer')}}">Exclusive Offer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Menu Desktop or large device-->
        </div>
    </div>

</header>

<!-- Banner -->
