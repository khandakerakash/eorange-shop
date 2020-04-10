<div id="cover"></div>
@if($gs->is_subscribe == 1)
    @if(isset($visited))

        <!--  Starting of subscribe-pre-loader Area   -->
        <div class="subscribe-preloader-wrap">
            <div class="subscribePreloader__thumb"
                 style="background-image: url({{asset('assets/images/'.$gs->subscribe_image)}});">
                <span class="preload-close"><i class="fa fa-close"></i></span>
                <div class="subscribePreloader__text text-center">
                    <h1>{{$gs->subscribe_title}}</h1>
                    <p>{{$gs->subscribe_text}}</p>
                    <form action="{{route('front.subscribe.submit')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="email" name="email" id="" placeholder="{{$lang->supl}}" required="">
                            <button type="submit">{{$lang->s}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--  Ending of subscribe-pre-loader Area   -->

    @endif
@endif


<!-- New Header Style Like JoyBuy Start -->
<div class="shortcut">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shortcut-wrap">
                    <ul>
                        @if($gs->email != null)
                            <li id="front-top-mail">
                                <a><i class="fa fa-envelope"></i> {{$gs->email}}</a>
                            </li>
                            <li>
                                <span class="sc-line"></span>
                            </li>
                        @endif
                        @if($gs->phone != null)
                            <li>
                                <a><i class="fa fa-phone"></i> {{$gs->phone}}</a>
                            </li>
                            <li>
                                <span class="sc-line"></span>
                            </li>
                        @endif
                            <li>
                                <a href="{{url('user/orders')}}"><i class="fa fa-eye"></i> Track Order</a>
                            </li>
                            <li>
                                <span class="sc-line"></span>
                            </li>
                            <li class="last_li">
                                {{--<a href="{{url('user/login')}}"><i class="fa fa-user"></i> Merchent Corner</a>--}}
                                <a style="cursor: pointer;" data-toggle="modal" data-target="#vendorloginModal"><i class="fa fa-id-card"></i> Merchant Corner</a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New Header Style Like JoyBuy End -->


<!--  Starting of header area   -->
<header class="header-wrap">
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
    <div class="header-support-part">

        <div class="header-middle-area">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="header-middle-left-wrap">
                            <div class="logo">
                                <a href="{{route('front.index')}}">
                                    <img src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="header-middle-mid-wrap">
                            <div class="header-search-box text-right">
                                <form action="{{route('front.search')}}" method="GET">
                                    <input type="text" class="ss" id="header_search" name="product" placeholder="{{$lang->ec}}"
                                               required>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="header-searched-item-list-wrap" style="display: none;">
                                <ul>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="header-middle-right-wrap text-right">
                            <ul>
{{--                                <li>--}}
{{--                                    @if(Auth::guard('user')->check())--}}
{{--                                        <a href="{{route('user-wishlists')}}"><span>{{$lang->wishlists}}</span> <i--}}
{{--                                                    class="icofont">heart</i></a>--}}
{{--                                    @else--}}
{{--                                        <a style="cursor: pointer;" class="no-wish" data-toggle="modal"--}}
{{--                                           data-target="#loginModal"><span>{{$lang->wishlists}}</span> <i--}}
{{--                                                    class="icofont">heart</i></a>--}}
{{--                                    @endif--}}
{{--                                </li>--}}
                                <li class="myCart">
                                    <a href="javascript:void(0)">
                                        <span class="icon-shopping-cart"></span> <span class="cart">Cart</span>
                                    </a>
{{--                                    <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>--}}
                                    <div class="addToMycart">
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
                                                                        id="prct{{$product['item']['id']}}">{{round($product['price'] * $curr->value, 2) }}</span>
                                                            @else
                                                                <span id="prct{{$product['item']['id']}}">{{ round($product['price'] * $curr->value, 2) }}</span>{{$curr->sign}}
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
                                <li class="myCart1">
                                    <a href="javascript:void(0)">
                                        <span class="icon-shopping-cart"></span> <span class="cart">Cart</span>
                                    </a>
{{--                                    <span class="cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>--}}
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
                                <li class="mobile-search"><a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                                </li>
                                <li>
                                    <span class="sc-line"></span>
                                </li>
                                <li class="last_li">
                                    @if(Auth::guard('user')->check())
                                        <a style="text-transform: uppercase" href="{{route('user-dashboard')}}">
                                            <span class="icon-user"></span> <span class="signin">{{$lang->fh}}</span>
                                        </a>
                                    @else
                                        <a style="text-transform: uppercase" href="{{route('user-login')}}">
                                            <span class="icon-user"></span> <span class="signin">{{$lang->signin}}</span>
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="header-search-box mobile">
                            <form action="{{route('front.search')}}" method="GET">
                                <input type="text" class="ss" id="search_product" name="product"
                                       placeholder="{{$lang->ec}}" required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="main-cat-menu d-xs-none">
                        <h5><i class="fa fa-bars"></i> {{$lang->all_categories}} <i class="fa fa-angle-down"></i></h5>
                        <ul class="cat_menu main-nav-tg" id="main-cat-menu">
                            @foreach($categories as $category)
                                <li class="{{count($category->subCategory) > 0?"hassubs":""}}">
                                    <a href="{{route('front.category',$category->slug)}}">{{ ucwords(strtolower($category->name)) }}
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                    @if(count($category->subCategory) > 0)
                                        <ul>
                                            <li>
                                                <div class="container dropdown-width" style="height: {{$categories->count() * 47}}px; overflow-x: hidden !important;">
                                                    <div class="row">
                                                        @foreach($category->subCategory as $subcategory)
                                                            <div class="col-lg-4">
                                                                <p class="title">
                                                                    <a style="font-weight: 500; text-transform: capitalize !important; z-index: 999999999999!important;"
                                                                       href="{{route('front.category',$subcategory->slug)}}">
                                                                        {{ucwords(strtolower($subcategory->name))}}
                                                                    </a>
                                                                </p>
                                                                @foreach($subcategory->subCategory as $childcategory)
                                                                    <a class="cat_menu-sub_link"
                                                                       href="{{route('front.category',$childcategory->slug)}}">{{ucwords(strtolower($childcategory->name))}}</a>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                </li>

                            @endforeach
                        </ul>
                    </div>

                    <!-- MOBILE NAV START -->
                    <div class="d-xl-none d-xs-block">
                        <a class="hamburger-btn" role="button" data-toggle="collapse" href="#Mobilehamburger"
                           aria-expanded="false" aria-controls="Mobilehamburger">
                            <i class="fa fa-bars fa-2x"> Categories</i>
                        </a>
                        <div class="collapse hamburger-item_wrap" id="Mobilehamburger">
                            @foreach($categories as $catKey=> $category)
                                <div class="hamburger-item-head_wrap">

                                    @if(count($category->subCategory)==0)
                                        <div class="hamburger-item-head_wrap">
                                            <a href="{{route('front.category',$category->slug)}}">{{ ucwords(strtolower($category->name)) }}</a>
                                        </div><!-- /hamburger header --><!-- /hamburger Items -->
                                    @else
                                        <a data-toggle="collapse" href=".navHeading-{{$catKey}}" aria-expanded="false" aria-controls="navHeading-{{$catKey}}">
                                            {{ ucwords(strtolower($category->name))}} <i class="fa fa-angle-down"></i>
                                        </a>
                                        @foreach($category->subCategory as $subKey=>$sub)
                                            <div class="collapse navHeading-{{$catKey}}">
                                                <div class="hamburger-link_wrap">

                                                    @if(count($sub->subCategory)==0)
                                                        <a href="{{route('front.category',$sub->slug)}}" >{{ ucwords(strtolower($sub->name)) }}</a>
                                                    @else
                                                        <a role="button" data-toggle="collapse"
                                                           href="#subCategory-{{$catKey}}-{{$subKey}}" aria-expanded="false"
                                                           aria-controls="subCategory-{{$catKey}}-{{$subKey}}"> {{ ucwords(strtolower($sub->name)) }}
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <div class="hamburger-link_wrap collapse" id="subCategory-{{$catKey}}-{{$subKey}}">
                                                            <ul>
                                                                @foreach($sub->subCategory as $child)
                                                                    <li><a href="{{route('front.category',$child->slug)}}" class="hamburger-link">{{ ucwords(strtolower($child->name)) }}</a></li>
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
                <div class="mobileMenuActive"></div>

                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="header-bottom-nav">
                        <ul>
                            <li>
                                <a href="#">Flash Deals</a>
                            </li>
                            <li>
                                <a href="#" style="text-transform: uppercase">Live</a>
                            </li>
                            <li class="last_li">
                                <a href="#">New User Zone</a>
                            </li>
                        </ul>
                    </div>
                </div>


{{--                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">--}}
{{--                    <div class="header-search-box text-right">--}}
{{--                        <form action="{{route('front.search')}}" method="GET">--}}
{{--                            <input type="text" class="ss" id="header_search" name="product" placeholder="{{$lang->ec}}"--}}
{{--                                   required>--}}
{{--                            <button type="submit"><i class="fa fa-search"></i></button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div class="header-searched-item-list-wrap" style="display: none;">--}}
{{--                        <ul>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="mobileSlickMenuActive"></div>

{{--                <div class="col-lg-3 col-md-3 col-sm-4  d-xs-none">--}}
{{--                    <div class="header-btn-area">--}}
{{--                        <a href="{{route('front.surpriseoffer')}}" class="black-friday" target="_blank"> <span><strong>BLACK SUNDAY</strong> Get 45 off!</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
</header>