@extends('layouts.front')
@section('content')
    <div class="hero-area">
        <div class="custom-container">
            <div class="row no-gutters">
                <div class="col-lg-2 col-md-2 col-xs-12">
                    <div class="home_cat-menu">
                        <ul>

                            @foreach($categories as $category)
                            <li class="{{count($category->subCategory) > 0?"home_cat-menu_li":""}}">
                                <a href="{{route('front.category',$category->slug)}}">
                                    <i class="fa fa-fire"></i> &nbsp; {{ ucwords(strtolower($category->name)) }}
                                </a>

                                @if(count($category->subCategory) > 0)
                                <div class="home_cat-menu_mega-open">
                                    <ul>
                                        <li>
                                            <div class="container home_cat-menu-height-width">
                                                <div class="row">
                                                    @foreach($category->subCategory as $subcategory)
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <a href="{{route('front.category',$subcategory->slug)}}" class="sub-menu-title">{{ucwords(strtolower($subcategory->name))}}</a>
                                                        @foreach($subcategory->subCategory as $childcategory)
                                                        <a href="{{route('front.category',$childcategory->slug)}}" class="sub-menu_item">{{ucwords(strtolower($childcategory->name))}}</a>
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
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="hero-carousel_wrap">
                        <div id="hero-carousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                        @php
                            $i=1;
                        @endphp
                        <!-- Indicators -->
                            <ol class="carousel-indicators">

                                @foreach($sliders as $key=> $sld)
                                    <li data-target="#hero-carousel" data-slide-to="{{$key}}"
                                        class="{{$key==0?"active":""}}"></li>
                                @endforeach
                            </ol>

                            <div class="carousel-inner" role="listbox">
                                @foreach($sliders as $key=> $slider)


                                    <div class="{{$key==0?"item active":"item"}}">


{{--                                        <img class="img-responsive" src="{{asset('assets/images/'.$slider->photo)}}" alt="First slide">--}}
                                        <img class="img-responsive" src="{{asset('assets/front/images/daraz_test.jpg')}}" alt="First slide">


                                        {{-- <div class="carousel-caption">
                                            <h1>{{$slider->title}}</h1>
                                            <h2>{{$slider->description}}</h2>
                                            <a href="{{$slider->source}}" class="hero-btn_collection">
                                                View Collection
                                            </a>
                                        </div> --}}
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                {{--                @if($gs->sb == 1)--}}
                {{--                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">--}}
                {{--                        <a href="{{@$banner->top2l}}" class="hero-area_box">--}}
                {{--                            <div class="hero-box_img">--}}
                {{--                                <figure><img src="{{asset('assets/images/'.@$banner->top2)}}" alt="blog image"></figure>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}

                {{--                        <a href="{{@$banner->top3l}}" class="hero-area_box">--}}
                {{--                            <div class="hero-box_img">--}}
                {{--                                <figure><img src="{{asset('assets/images/'.@$banner->top3)}}" alt="blog image"></figure>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                @endif--}}

            </div>
        </div>
    </div>

    @if($gs->lb == 1)
        <!--  Starting of product banner area   -->
        <div class="product-banner-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
            <div class="container">
                <div class="row">
                    @foreach($imgs as $img)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-banner-img">
                                <a href="{{$img->url}}">
                                    <div class="hero-box_img">
                                        <figure>
                                            <img class="btbn" src="{{asset('assets//images/'.$img->photo)}}"
                                                 alt="banner">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--  Ending of product banner area   -->
    @endif


    <div class="off-white-bg">
        <!-- FLASH SALE SECTION START -->
        <div class="flash-sale wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" style="margin-bottom: -25px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        {{--<h1 class="flash-sale_title">Flash sale</h1>--}}
                    </div>

                    <div class="col-lg-12">
                        <div class="flash-sale_outer">

                            @if($gs->pp == 1)

                                <div class="flash-sale_inner">
                                    <div class="flash-sale_inner-title">
                                        <h2>Super Deals</h2>
                                    </div>

                                    <div class="flash-sale_inner-end-box" data-wow-duration="1s">
                                        <div class="countdown-timer-wrap">
                                            <div id="clock"></div>
                                        </div>
                                    </div>
                                    <div class="shop-more_btn">
                                        <a href="{{ route('front.flash') }}">Shop More</a>
                                    </div>
                                </div>

                                <hr>

                            @endif


                            <div class="row">
                                @foreach($flashSell as $flashItem)
                                    @php
                                        $name = str_replace(" ","-",$flashItem->name);
                                    @endphp
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div class="single-flash_item-home">

                                            <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                               target="_blank">
                                                <div class="product-bg-overly">
                                                    {{--<a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" target="_blank"--}}
                                                    {{--class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}</a>--}}
                                                    <h2 class="title">
                                                        {{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}
                                                    </h2>
                                                </div>
                                            </a>

                                            <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                               class="text-center">
                                                <div class="flash-product-image-area">
                                                    <img src="{{asset('assets/images/'.$flashItem->photo)}}"
                                                         alt="new arrival product" class="img-responsive div-mx">
                                                </div>
                                            </a>

                                            <div class="single-flash_item-content">

                                                <p class="price">
                                                    <span class="currency-taka">{{$gs->sign == 0?$curr->sign:""}}</span>
                                                    @if($flashItem->user_id != 0)
                                                        @php
                                                            $price = $flashItem->cprice + $gs->fixed_commission + ($flashItem->cprice/100) * $gs->percentage_commission ;
                                                        @endphp
                                                        {{round($price * $curr->value,2)}}
                                                    @else
                                                        {{round($flashItem->cprice * $curr->value,2)}}
                                                    @endif

                                                    @if($flashItem->pprice != null)
                                                        <span class="off-taka"><del><span
                                                                        class="currency-taka">{{$curr->sign}}</span> {{round($flashItem->pprice * $curr->value,2)}}</del></span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- /.row-->

                            <div class="shop-more_btn-mobile">
                                <a href="{{ route('front.flash') }}">See all Super Deals &nbsp; <i
                                            class="fa fa-angle-right"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FLASH SALE SECTION END -->


        <!-- OrangeMall SECTION START -->
        <div class="orange-mall_section flash-sale wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
             style="margin-top: 0; padding-top: 2rem;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="orange-mall">
                            <div>
                                <h1 class="flash-sale_title">
                                    <a href="{{route('front.eorangemall')}}" target="_blank">Orange Mall</a>
                                </h1>
                            </div>
                            <div class="orange-mall-more_btn">
                                <a href="{{route('front.eorangemall')}}" target="_blank">Shop More</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="flash-sale_outer">


                            <div class="row">
                                @foreach($eorangMall as $flashItem)
                                    @php
                                        $name = str_replace(" ","-",$flashItem->name);
                                    @endphp
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}">

                                            <div class="single-flash_item">
                                                <div>
                                                    <!-- New and offer rate of product -->
                                                    <div class="cdz-product-lbs">
                                                        <div class="lb-content lb-new">New</div>
                                                        <div class="lb-content lb-sale">-15%</div>
                                                    </div>
                                                    <!-- New and offer rate of product -->
                                                </div>

                                                <div>
                                                    <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                                       class="text-center">
                                                    <div class="flash-product-image-area-details">
                                                        <img src="{{asset('assets/images/'.$flashItem->photo)}}"
                                                             alt="new arrival product" class="img-responsive div-mx">
                                                    </div>
                                                    </p>
                                                </div>

                                                <div class="single-flash_item-content">
                                                    <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                                       class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}</p>
                                                    <p class="price">
                                                        <span class="currency-taka">{{$gs->sign == 0?$curr->sign:""}}</span>
                                                        @if($flashItem->user_id != 0)
                                                            @php
                                                                $price = $flashItem->cprice + $gs->fixed_commission + ($flashItem->cprice/100) * $gs->percentage_commission ;
                                                            @endphp
                                                            {{round($price * $curr->value,2)}}
                                                        @else
                                                            {{round($flashItem->cprice * $curr->value,2)}}
                                                        @endif


                                                        <br/>

                                                        @if($flashItem->pprice != null)
                                                            <span class="off-taka"><del><span
                                                                            class="currency-taka">{{$curr->sign}}</span> {{round($flashItem->pprice * $curr->value,2)}}</del></span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>

                                        </a>
                                    </div>
                                @endforeach
                            </div><!-- /.row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OrangeMall SECTION END -->
    </div>

    <!-- Orangebasket SECTION START -->
    <div class="orange-mall_section flash-sale wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
         style="margin-top: 0; padding-top: 2rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="orange-mall">
                        <div>
                            <h1 class="flash-sale_title">
                                <a href="{{route('front.orangebasket')}}" target="_blank">Orange Basket</a>
                            </h1>
                        </div>
                        <div class="orange-mall-more_btn">
                            <a href="{{route('front.orangebasket')}}" target="_blank">Shop More</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="flash-sale_outer">


                        <div class="row">
                            @foreach($orangBasket as $flashItem)
                                @php
                                    $name = str_replace(" ","-",$flashItem->name);
                                @endphp
                                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                    <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}">

                                        <div class="single-flash_item">
                                            <div>
                                                <div class="cdz-product-lbs">
                                                    <div class="lb-content lb-new">New</div>
                                                    <div class="lb-content lb-sale">-15%</div>
                                                </div>
                                                <!-- New and offer rate of product -->
                                            {{--                                                <ul class="cdz-product-lbs">--}}
                                            {{--                                                    <li class="lb-item lb-new">--}}
                                            {{--                                                        <div class="lb-content">New</div>--}}
                                            {{--                                                    </li>--}}
                                            {{--                                                    <li class="lb-item lb-sale">--}}
                                            {{--                                                        <div class="lb-content">-15%</div>--}}
                                            {{--                                                    </li>--}}
                                            {{--                                                </ul>--}}
                                            <!-- New and offer rate of product -->
                                            </div>

                                            <div>
                                                <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                                   class="text-center">
                                                <div class="flash-product-image-area-details">
                                                    <img src="{{asset('assets/images/'.$flashItem->photo)}}"
                                                         alt="new arrival product" class="img-responsive div-mx">
                                                </div>
                                                </p>
                                            </div>

                                            <div class="single-flash_item-content">
                                                <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                                   class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}</p>
                                                <p class="price">
                                                    <span class="currency-taka">{{$gs->sign == 0?$curr->sign:""}}</span>
                                                    @if($flashItem->user_id != 0)
                                                        @php
                                                            $price = $flashItem->cprice + $gs->fixed_commission + ($flashItem->cprice/100) * $gs->percentage_commission ;
                                                        @endphp
                                                        {{round($price * $curr->value,2)}}
                                                    @else
                                                        {{round($flashItem->cprice * $curr->value,2)}}
                                                    @endif


                                                    <br/>

                                                    @if($flashItem->pprice != null)
                                                        <span class="off-taka"><del><span
                                                                        class="currency-taka">{{$curr->sign}}</span> {{round($flashItem->pprice * $curr->value,2)}}</del></span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            @endforeach
                        </div><!-- /.row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Orangebasket SECTION END -->
    </div>


    @if($gs->hv == 1)

        <!--  Starting of featured product area   -->
        <div class="section-padding featured-product-wrap wow fadeInUp hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>dd</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 hidden">
                        <div class="product-type-tab">

                            <div class="tab-content">
                                <div id="bestSeller" class="tab-pane active hidden">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of featured product area   -->
    @endif


    <!-- FEATURED CATEGORIES START -->
    <div class="home-featured-ctrl wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Featured Categories</h2>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">

                @foreach($categories as $category)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                        <a class="tjlm-content" href="{{route('front.category',$category->slug)}}" target="_blank">
                            <div class="tjlm-title">{{ strtoupper($category->name) }}</div>
                            <img src="{{ asset('assets/images/'.$category->photo) }}">
                            <span></span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- FEATURED CATEGORIES END -->

    <!-- WEEKLY PICKS START -->
    <div class="weekly-picks wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center c_title">
                        <h2>Weekly Picks</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="brand-image">
                    <div class="branding-img"
                         style="background-image: url('{{ asset('assets/images/eorange-line.png') }}');"></div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="weekly-first-img">
                        <a class="img1"
                           target="_blank" href="/"
                           style="background: url('{{ asset('assets/images/weekly-first-img.png') }}') no-repeat; ">
                            <div class="weekly-first-img-wrp">
                                <div class="sku">
                                    <span class="c_redline">&mdash;</span>
                                    <span>Come on fashion girl. Get up to $5 coupon!</span>
                                </div>
                                <div class="g_title"
                                     title="Amazing Star Deep Wave Bundles with Closure Malaysian Virgin Hair with Closure Human Hair with 4x4 Closure Soft and Bouncy">
                                    Amazing Star Deep Wave Bundles with Closure Malaysian Virgin Hair with Closure
                                    Human Hair with 4x4 Closure Soft and Bouncy
                                </div>
                                <div class="weekly-picks-price"><span class="currency-taka">{{$curr->sign}}</span> 60.96
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="weekly-two-img">
                        <a class="img2" target="_blank" href="/"
                           style="background: url('{{ asset('assets/images/weekly-two-img.png') }}') no-repeat; ">
                            <span class="cxy">
                                <span class="c_redline">&mdash;</span>
                                <span class="cxy_content">EORANGE exclusive! Best for your office.</span>
                                <span class="g_title" title="J.ZAO Rollerball Pen, Blue, 3 pcs">
                                    J.ZAO Rollerball Pen, Blue, 3 pcs
                                </span>
                                <span class="g_price weekly-picks-price"><span
                                            class="currency-taka">{{$curr->sign}}</span> 3.99</span>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="weekly-three-img">
                        <a class="img2" target="_blank" href="/"
                           style="background: url('{{ asset('assets/images/weekly-three-img.png') }}') no-repeat; ">
                            <span class="cxy">
                                <span class="c_redline">&mdash;</span>
                                <span class="cxy_content">Need a superb sound headset?</span>
                                <span class="g_title" title="Oneplus Yiner 2T Type-C Earphone">
                                    Oneplus Yiner 2T Type-C Earphone
                                </span>
                                <span class="g_price weekly-picks-price"><span
                                            class="currency-taka">{{$curr->sign}}</span> 11.99</span>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- WEEKLY PICKS END -->

    @if($gs->ftp == 1)
        <!--  Starting of video blog area   -->

        <!--  Ending of video blog area   -->
    @endif

    @if($gs->bs == 1)
        <!--  Starting of latest news area   -->
        <div class="section-padding latest-news-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h2>Popular Reviews</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-carousel latest-news-list">
                            @foreach($lblogs as $lblog)
                                <a href="{{route('front.blogshow',$lblog->id)}}" class="single-news-list">
                                    <div class="news-img">
                                        <img class="news-img" src="{{asset('assets/images/'.$lblog->photo)}}"
                                             alt="news image">
                                        <div class="news-list-meta">
                                            <span>{{date('d',strtotime($lblog->created_at))}}</span> {{date('M',strtotime($lblog->created_at))}}
                                        </div>
                                    </div>
                                    <div class="news-list-text">
                                        <h4 dir="{{$gs->rtl == 1 ? 'rtl':''}}">{{strlen($lblog->title) > 50 ? substr($lblog->title,0,50)."..." : $lblog->title}}</h4>
                                        <p dir="{{$gs->rtl == 1 ? 'rtl':''}}">{{substr(strip_tags($lblog->details),0,250)}}</p>
                                    </div>
                                    <hr/>
                                    <div class="news-list-button" dir="{{$gs->rtl == 1 ? 'rtl':''}}">
                                        <span class="news-btn">{{$lang->vd}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of latest news area   -->
    @endif

    <!-- SHARE AND EARN START -->
    <div class="section-padding share-and-earn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="share-earn-area">
                        <a href="/" target="_blank" class="share-earn-link">
                            <img src="{{ asset('assets/images/share-and-earn.png') }}" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHARE AND EARN END -->

    @if($gs->ts == 1)
        <!--  Starting of review carousel area   -->
        {{--<div class="section-padding review-carousel-wrap overlay wow fadeInUp" data-wow-duration="1s"--}}
        {{--data-wow-delay=".3s" style="background-image: url({{asset('assets/images/'.$gs->cimg)}})">--}}
        {{--<div class="container">--}}
        {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
        {{--<div class="section-title text-center">--}}
        {{--<h2>{{$lang->review_title}}</h2>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">--}}
        {{--<div class="owl-carousel review-carousel">--}}
        {{--@foreach($ads as $ad)--}}
        {{--<div class="single-review-carousel-area text-center">--}}
        {{--<div class="review-carousel-profile">--}}
        {{--<img src="{{asset('assets/images/'.$ad->photo)}}" alt="review profile">--}}
        {{--</div>--}}
        {{--<div class="review-carousel-text">--}}
        {{--<h5 class="profile-name">{{$ad->client}}</h5>--}}
        {{--<p>{{$ad->review}}</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <!--  Ending of review carousel area   -->
    @endif

    @if($gs->bl == 1)

        <!-- Starting of client logo area -->

        <section class="secure-payment text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="mod-service-item">
                            <div class="item-icon payment">
                                <img src="{{ asset('assets/front/images/custom-icon/sp.png') }}" alt="Payment Icon"
                                     class="custom-icon">
                            </div>
                            <div class="item-title payment-title">
                                <h4>Secure Payments</h4>
                            </div>
                            {{--                            <div class="item-desc">--}}
                            {{--                                <p>Pay with secure payment methods</p>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="mod-service-item">
                            <div class="item-icon day">
                                <img src="{{ asset('assets/front/images/custom-icon/dr.png') }}" alt="day Icon"
                                     class="custom-icon">
                            </div>
                            <div class="item-title">
                                <h4>30-day Return Policy</h4>
                            </div>
                            {{--                            <div class="item-desc">--}}
                            {{--                                <p>If your item is damaged or not as described, you may return it within 30 days after delivery.</p>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="mod-service-item">
                            <div class="item-icon help">
                                <img src="{{ asset('assets/front/images/custom-icon/24.png') }}" alt="day Icon"
                                     class="custom-icon">
                            </div>
                            <div class="item-title">
                                <h4>24/7 Customer Service</h4>
                            </div>
                            {{--                            <div class="item-desc">--}}
                            {{--                                <p>We'll respond to you within 24 hours</p>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    {{--                    <div class="col-md-5th-1 col-sm-4">--}}
                    {{--                        <div class="mod-service-item">--}}
                    {{--                            <div class="item-icon delivery">--}}
                    {{--                                <img src="{{ asset('assets/front/images/custom-icon/wd.png') }}" alt="day Icon" class="custom-icon">--}}
                    {{--                            </div>--}}
                    {{--                            <div class="item-title">--}}
                    {{--                                <h4>Worldwide Delivery</h4>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="item-desc">--}}
                    {{--                                <p>Covers more than 200 countries and regions worldwide</p>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="mod-service-item">
                            <div class="item-icon brands">
                                <img src="{{ asset('assets/front/images/custom-icon/ib.png') }}" alt="day Icon"
                                     class="custom-icon">
                            </div>
                            <div class="item-title">
                                <h4>International Brands</h4>
                            </div>
                            {{--                            <div class="item-desc">--}}
                            {{--                                <p>Guaranteed authenticity</p>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Ending of client logo area -->

        <!-- Starting of client logo area -->
        <section class="section-padding client-logo-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h2>Featured Brands</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel logo-carousel">
                            @foreach($brands->chunk(5) as $brandz)
                                <ul class="logo-wrapper">
                                    @foreach($brandz as $brand)
                                        <li><a href="{{$brand->url}}"><img
                                                        src="{{asset('assets/images/'.$brand->photo)}}"
                                                        alt="client logo"></a></li>
                                    @endforeach
                                </ul>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ending of client logo area -->

    @endif
@endsection

@section('scripts')
    <script>
        //---------Countdown-----------
        $('#clock').countdown('{{$gs->count_date}}', function (event) {
            $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
        });
    </script>
@endsection