@extends('layouts.front')
@section('content')
<div id="hero-area" class="hero-area" style="background: {{$sliders->first()->color}}">
    <!-- Inline css for respective slider color -->
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-2 col-md-3 col-xs-12">
                <div class="home_cat-menu">
                    <ul>

                        @foreach($categories as $category)
                        <li class="{{count($category->subCategory) > 0?" home_cat-menu_li":""}}">
                            <a href="{{route('front.category',$category->slug)}}">
                                <i class="fa fa-fire"></i> &nbsp; {{ ucwords(strtolower($category->name)) }}
                            </a>

                            @if(count($category->subCategory) > 0)
                            <div class="home_cat-menu_mega-open">
                                <ul>
                                    <li>
                                        <div class="container home_cat-menu-height-width">
                                            <div class="row">
                                                @foreach($category->subCategory as $key=>$subcategory)
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

            <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                <div class="hero-carousel_wrap">
                    <div id="hero-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        @php
                        $i=1;
                        @endphp
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($sliders as $key=> $sld)
                            <li data-target="#hero-carousel" data-value="{{isset($sliders[$key+1])?$sliders[$key+1]->color:$sliders[0]->color}}" data-slide-to="{{$key}}" class="{{$key==0?" active":""}}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner" role="listbox">

                            @foreach($sliders as $key=> $slider)


                            <div class="{{$key==0?" item active":"item"}}" data-slider="{{$slider->id}}">


                                <a href="{{$slider->link}}">


                                <img class="img-responsive" src="{{asset('assets/images/'.$slider->photo)}}" alt="{{$slider->title}}">
                                </a>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            {{-- @if($gs->sb == 1)--}}
            {{-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">--}}
            {{-- <a href="{{@$banner->top2l}}" class="hero-area_box">--}}
            {{-- <div class="hero-box_img">--}}
            {{-- <figure><img src="{{asset('assets/images/'.@$banner->top2)}}" alt="blog image"></figure>--}}
            {{-- </div>--}}
            {{-- </a>--}}

            {{-- <a href="{{@$banner->top3l}}" class="hero-area_box">--}}
            {{-- <div class="hero-box_img">--}}
            {{-- <figure><img src="{{asset('assets/images/'.@$banner->top3)}}" alt="blog image"></figure>--}}
            {{-- </div>--}}
            {{-- </a>--}}
            {{-- </div>--}}
            {{-- @endif--}}

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
                                <img class="btbn" src="{{asset('assets/images/'.$img->photo)}}" alt="banner">
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
                    <div class="flash-sale_outer">

                        @if($gs->pp == 1)


                        <div class="flash-sale_inner">
                            <div class="row">
                                <div class="col-lg-4 col-md-3">
                                    <div class="flash-sale_inner-title">



                                        <h1 class="flash-sale_title">
                                            <a href="{{ route('front.spatial_category','flashsale') }}">Super Deals</a>
                                        </h1>


                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="flash-sale_inner-end-box" data-wow-duration="1s">
                                        <div class="countdown-timer-wrap">
                                            <div class="ending-text">
                                                <p class="mr-3 mt-2">Ending in</p>
                                            </div>
                                            <div id="clock"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-3">
                                    <div class="shop-more_btn">
                                        <a href="{{ route('front.spatial_category','flashsale') }}">Shop More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        @endif


                        <div class="row">
                            @foreach($flashSell as $flashItem)
                            @php
                            $name = Illuminate\Support\Str::slug($flashItem->name);
                            @endphp
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <div class="single-flash_item-home">

                                    <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}">
                                        <div class="product-bg-overly">
                                            {{--<a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" target="_blank"--}}
                                            {{--class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}
                                    </a>--}}

                                        </div>
                                        <h2 class="title">
                                            {{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}
                                        </h2>
                                        </a>

                                <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" class="text-center">
                                    <div class="flash-product-image-area">
                                        <img src="{{asset('assets/images/'.$flashItem->photo)}}" alt="new arrival product" class="img-responsive div-mx">
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
                                        <span class="off-taka">
                                            <del><span class="currency-taka">{{$curr->sign}}</span> {{round($flashItem->pprice * $curr->value,2)}}</del>
                                        </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- /.row-->

                    <div class="shop-more_btn-mobile">
                        <a href="{{ route('front.spatial_category','flashsale') }}">See all Super Deals &nbsp; <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- FLASH SALE SECTION END -->


<!-- OrangeMall SECTION START -->
<div class="orange-mall_section flash-sale wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" style="margin-top: 0; padding-top: 2rem;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="orange-mall">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div>
                                <h1 class="flash-sale_title">
                                    <a href="{{ route('front.spatial_category','eorangemall') }}">Orange Mall</a>
                                </h1>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="orange-mall-more_btn">
                                <a href="{{ route('front.spatial_category','eorangemall') }}">Shop More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="flash-sale_outer">


                    <div class="row">
                        @foreach($eorangMall as $flashItem)
                        @php
                            $name = Illuminate\Support\Str::slug($flashItem->name);
                        @endphp
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                            <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}">

                                <div class="single-flash_item">
                                    <div class="product_offer-wrap">
                                        <!-- New and offer rate of product -->

                                        <div class="cdz-product-lbs">
                                            @if($flashItem->isNew())
                                            <div class="lb-content lb-new">New</div>
                                            @endif
                                            @if($flashItem->offPrice()['off_price'])
                                            <div class="lb-content lb-sale">-{{$flashItem->offPrice()['off_percent']}}%</div>
                                            @endif
                                        </div>

                                        <!-- New and offer rate of product -->
                                    </div>
                                    @if($flashItem->isStockOut())
                                    <div class="sold-out">Sold Out</div>
                                    @endif
                                    <div>
                                        <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" class="text-center">
                                            <div class="flash-product-image-area-details">
                                                <img src="{{asset('assets/images/'.$flashItem->photo)}}" alt="{{$flashItem->name}}" class="img-responsive div-mx" >
                                            </div>
                                        </p>
                                    </div>

                                    <div class="single-flash_item-content price_new-style">
                                        <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}</p>
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


                                            <br />

                                            @if($flashItem->pprice != null)
                                            <span class="off-taka"><del><span class="currency-taka">{{$curr->sign}}</span> {{round($flashItem->pprice * $curr->value,2)}}</del></span>
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


<!-- Orangebasket SECTION START -->
<div class="orange-mall_section flash-sale wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" style="margin-top: 0; padding-top: 2rem;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="orange-mall">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div>
                                <h1 class="flash-sale_title">
                                    <a href="{{ route('front.category','orange-grocery') }}">Orange Grocery</a>
                                </h1>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="orange-mall-more_btn">
                                <a href="{{ route('front.category','orange-grocery') }}">Shop More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="flash-sale_outer">


                    <div class="row">
                        @foreach($orangBasket as $flashItem)
                        @php
                            $name = Illuminate\Support\Str::slug($flashItem->name);
                        @endphp
                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                            <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}">

                                <div class="single-flash_item">
                                    @if($flashItem->isStockOut())
                                        <div class="sold-out">Sold Out</div>
                                    @endif
                                    <div class="product_offer-wrap">
                                        <div class="cdz-product-lbs">
                                            @if($flashItem->isNew())
                                            <div class="lb-content lb-new">New</div>
                                            @endif
                                            @if($flashItem->offPrice()['off_price'])
                                            <div class="lb-content lb-sale">-{{$flashItem->offPrice()['off_percent']}}%</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                        <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" class="text-center">
                                            <div class="flash-product-image-area-details">
                                                <img src="{{asset('assets/images/'.$flashItem->photo)}}" alt="new arrival product" class="img-responsive div-mx">
                                            </div>
                                        </p>
                                    </div>

                                    <div class="single-flash_item-content">
                                        <p href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}</p>
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


                                            <br />

                                            @if($flashItem->pprice != null)
                                            <span class="off-taka"><del><span class="currency-taka">{{$curr->sign}}</span> {{round($flashItem->pprice * $curr->value,2)}}</del></span>
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



@if($gs->lb == 1)
<!--  Starting of product banner area   -->
<div class="product-banner-wrap product-banner-wrap-middle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            @foreach($smimgs as $img)
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-banner-img">
                    <a href="{{$img->url}}">
                        <div class="hero-box_img" style="margin-top: -20px;">
                            <figure>
                                <img style="height: 150px; margin-bottom: 35px;" class="btbn" src="{{asset('assets/images/'.$img->photo)}}" alt="banner">
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
                <a class="tjlm-content" href="{{route('front.category',$category->slug)}}">
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
{{-- @if($weekly_picks->count())--}}
{{-- <!-- WEEKLY PICKS START -->--}}
{{-- <div class="weekly-picks wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">--}}
{{-- <div class="container">--}}
{{-- <div class="row">--}}
{{-- <div class="col-lg-12">--}}
{{-- <div class="section-title text-center c_title">--}}
{{-- <h2>Weekly Picks</h2>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="row">--}}
{{-- <div class="brand-image">--}}
{{-- <div class="branding-img"--}}
{{-- style="background-image: url('{{ asset('assets/images/eorange-line.png') }}');"></div>--}}
{{-- </div>--}}

{{-- @foreach($weekly_picks as $key=>$weekly_pick)--}}

{{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
{{-- <div class="weekly-two-img">--}}
{{-- <a class="img2" target="_blank" href="{{route('front.product',['id' => $weekly_pick->id, 'slug' => str_slug($weekly_pick->name)])}}"--}}
{{-- style="background: url('{{asset('assets/images/'.$weekly_pick->photo)}}') no-repeat; ">--}}
{{-- <span class="cxy">--}}
{{-- <span class="c_redline">&mdash;</span>--}}
{{-- <span class="cxy_content">{{$weekly_pick->name}}</span>--}}
{{-- <span class="g_title" title="{{$weekly_pick->name}}">--}}
{{-- {{$weekly_pick->name}}--}}
{{-- </span>--}}
{{-- <span class="g_price weekly-picks-price"><span--}}
{{-- class="currency-taka">{{$curr->sign}}</span> {{$weekly_pick->cprice}}</span>--}}
{{-- </span>--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
{{-- <div class="weekly-pics-wrap">--}}
{{-- <a target="_blank" href="{{route('front.product',['id' => $weekly_pick->id, 'slug' => str_slug($weekly_pick->name)])}}">--}}
{{-- <div class="weekly-pics-img">--}}
{{-- <img class="img-fluid mx-auto d-block" src="{{asset('assets/images/'.$weekly_pick->photo)}}" alt="Product Image">--}}
{{-- </div>--}}

{{-- <div class="weekly-pics-content">--}}
{{-- <span class="orange-line"></span>--}}
{{-- <div class="weekly-pics-product-title">--}}
{{-- <h2>{{$weekly_pick->name}}</h2>--}}
{{-- </div>--}}

{{-- <div class="weekly-picks-price">--}}
{{-- <span class="currency-taka">{{$curr->sign}}</span> {{$weekly_pick->cprice}}</span>--}}
{{-- </div>--}}

{{-- <div class="weekly-overlay">--}}
{{-- <div class="weekly-pics-product-title">--}}
{{-- <h2>{{$weekly_pick->name}}</h2>--}}
{{-- </div>--}}
{{-- <div class="weekly-shop-now-wrap">--}}
{{-- <a href="{{route('front.product',['id' => $weekly_pick->id, 'slug' => str_slug($weekly_pick->name)])}}" class="weekly-shop-now-btn" target="_blank">Shop Now</a>--}}
{{-- </div>--}}
{{-- </div><!-- overlay -->--}}
{{-- </div>--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- @endforeach--}}

{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <!-- WEEKLY PICKS END -->--}}
{{-- @endif--}}
@if($gs->ftp == 1)
<!--  Starting of video blog area   -->

<!--  Ending of video blog area   -->
@endif

<!--  Starting of Just For You And Load More Button area   -->
<div class="section-padding just-for-u">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="justforu-title">
                    <h2>Recommended For You</h2>
                </div>
            </div>
        </div>
        {{--<div id="post_data">d</div>--}}
        {{-- <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                        <a href="#" class="category_product-wrap">
                            <div class="single-flash_item just-for-you-product loadmor-preloader">
                                <!-- If `loadmor-preloader` class in upper div then all inner div is not visible -->



                            </div>
                        </a>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                        <a href="#" class="category_product-wrap">
                            <div class="single-flash_item just-for-you-product loadmor-preloader">
                                <!-- If `loadmor-preloader` class in upper div then all inner div is not visible -->

                                                            <div class="product_offer-wrap">
                                                                <div class="cdz-product-lbs">
                                                                    <div class="lb-content lb-new">New</div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-center">
                                                                    <div class="flash-product-image-area-details">
                                                                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
    </div>
    </a>
</div>
<div class="single-flash_item-content price_new-style">
    <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
    <p class="price ml-2">
        <span class="currency-taka">৳</span>
        700
        <br>
    </p>
</div>

</div>
</a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product loadmor-preloader">
            <!-- If `loadmor-preloader` class in upper div then all inner div is not visible -->

            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>

        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product loadmor-preloader">
            <!-- If `loadmor-preloader` class in upper div then all inner div is not visible -->

            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>

        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product loadmor-preloader">
            <!-- If `loadmor-preloader` class in upper div then all inner div is not visible -->

            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>

        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product loadmor-preloader">
            <!-- If `loadmor-preloader` class in upper div then all inner div is not visible -->

            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>

        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>

<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
</div>--}}
<div class="row" id="load_more_data">

</div>
<div class="row" id="load_more_btn">

</div>
<div class="row" id="post_data">
    {{--<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                    <a href="#" class="category_product-wrap">
                        <div class="single-flash_item just-for-you-product">
                            <div class="product_offer-wrap">
                                <div class="cdz-product-lbs">
                                    <div class="lb-content lb-new">New</div>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="text-center">
                                    <div class="flash-product-image-area-details">
                                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
</div>
</a>
</div>
<div class="single-flash_item-content price_new-style">
    <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
    <p class="price ml-2">
        <span class="currency-taka">৳</span>
        700
        <br>
    </p>
</div>
</div>
</a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
    <a href="#" class="category_product-wrap">
        <div class="single-flash_item just-for-you-product">
            <div class="product_offer-wrap">
                <div class="cdz-product-lbs">
                    <div class="lb-content lb-new">New</div>
                </div>
            </div>
            <div>
                <a href="#" class="text-center">
                    <div class="flash-product-image-area-details">
                        <img src="{{ asset('assets/front/images/new-arrival/newarrival-1.jpg') }}" alt="" class="img-responsive div-mx">
                    </div>
                </a>
            </div>
            <div class="single-flash_item-content price_new-style">
                <a href="" class="title">Yardley London English Levender Moisturising Body.</a>
                <p class="price ml-2">
                    <span class="currency-taka">৳</span>
                    700
                    <br>
                </p>
            </div>
        </div>
    </a>
</div>
<div class="col-12">
    <button type="submit" class="loadmore-btn">Load More</button>
</div>--}}
</div>

<!-- Pre-Loader Div -->
{{-- <div class="row">--}}
{{-- <div class="loadmor-preloader"></div>--}}
{{-- </div>--}}
<!-- Pre-Loader Div -->

{{-- <div class="row">
                 <div class="col-12">
                     <button type="submit" class="loadmore-btn">Load More</button>
                 </div>
             </div>--}}
</div>
</div>
<!--  Ending of Just For You And Load More Button area   -->

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
                            <img class="news-img" src="{{asset('assets/images/'.$lblog->photo)}}" alt="news image">
                            <div class="news-list-meta">
                                <span>{{date('d',strtotime($lblog->created_at))}}</span> {{date('M',strtotime($lblog->created_at))}}
                            </div>
                        </div>
                        <div class="news-list-text">
                            <h4 dir="{{$gs->rtl == 1 ? 'rtl':''}}">{{strlen($lblog->title) > 50 ? substr($lblog->title,0,50)."..." : $lblog->title}}</h4>
                            <p dir="{{$gs->rtl == 1 ? 'rtl':''}}">{{substr(strip_tags($lblog->details),0,250)}}</p>
                        </div>
                        <hr />
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
{{-- <div class="section-padding share-and-earn wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">--}}
{{-- <div class="container">--}}
{{-- <div class="row">--}}
{{-- <div class="col-lg-12">--}}
{{-- <div class="share-earn-area">--}}
{{-- <a href="/" target="_blank" class="share-earn-link">--}}
{{-- <img src="{{ asset('assets/images/share-and-earn.png') }}" class="img-responsive">--}}
{{-- </a>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
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
<section class="section-padding client-logo-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Top Brands</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel logo-carousel">
                    @foreach($brands->chunk(5) as $brandz)
                    <ul class="logo-wrapper">
                        @foreach($brandz as $brand)
                        <li><a href="{{$brand->url}}"><img src="{{asset('assets/images/'.$brand->photo)}}" alt="client logo"></a></li>
                        @endforeach
                    </ul>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ending of client logo area -->

<!-- Starting of secure-payment area -->
{{-- <section class="secure-payment text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">--}}

{{-- <div class="container">--}}
{{-- <div class="row">--}}
{{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">--}}
{{-- <div class="mod-service-item">--}}
{{-- <div class="item-icon payment">--}}
{{-- <img src="{{ asset('assets/front/images/custom-icon/sp.png') }}" alt="Payment Icon"--}}
{{-- class="custom-icon">--}}
{{-- </div>--}}
{{-- <div class="item-title payment-title">--}}
{{-- <h4>Secure Payments</h4>--}}
{{-- </div>--}}
{{-- --}}{{-- <div class="item-desc">--}}
{{-- --}}{{-- <p>Pay with secure payment methods</p>--}}
{{-- --}}{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">--}}
{{-- <div class="mod-service-item">--}}
{{-- <div class="item-icon day">--}}
{{-- <img src="{{ asset('assets/front/images/custom-icon/dr.png') }}" alt="day Icon"--}}
{{-- class="custom-icon">--}}
{{-- </div>--}}
{{-- <div class="item-title">--}}
{{-- <h4>30-day Return Policy</h4>--}}
{{-- </div>--}}
{{-- --}}{{-- <div class="item-desc">--}}
{{-- --}}{{-- <p>If your item is damaged or not as described, you may return it within 30 days after delivery.</p>--}}
{{-- --}}{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">--}}
{{-- <div class="mod-service-item">--}}
{{-- <div class="item-icon help">--}}
{{-- <img src="{{ asset('assets/front/images/custom-icon/24.png') }}" alt="day Icon"--}}
{{-- class="custom-icon">--}}
{{-- </div>--}}
{{-- <div class="item-title">--}}
{{-- <h4>24/7 Customer Service</h4>--}}
{{-- </div>--}}
{{-- --}}{{-- <div class="item-desc">--}}
{{-- --}}{{-- <p>We'll respond to you within 24 hours</p>--}}
{{-- --}}{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- --}}{{-- <div class="col-md-5th-1 col-sm-4">--}}
{{-- --}}{{-- <div class="mod-service-item">--}}
{{-- --}}{{-- <div class="item-icon delivery">--}}
{{-- --}}{{-- <img src="{{ asset('assets/front/images/custom-icon/wd.png') }}" alt="day Icon" class="custom-icon">--}}
{{-- --}}{{-- </div>--}}
{{-- --}}{{-- <div class="item-title">--}}
{{-- --}}{{-- <h4>Worldwide Delivery</h4>--}}
{{-- --}}{{-- </div>--}}
{{-- --}}{{-- <div class="item-desc">--}}
{{-- --}}{{-- <p>Covers more than 200 countries and regions worldwide</p>--}}
{{-- --}}{{-- </div>--}}
{{-- --}}{{-- </div>--}}
{{-- --}}{{-- </div>--}}

{{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">--}}
{{-- <div class="mod-service-item">--}}
{{-- <div class="item-icon brands">--}}
{{-- <img src="{{ asset('assets/front/images/custom-icon/ib.png') }}" alt="day Icon"--}}
{{-- class="custom-icon">--}}
{{-- </div>--}}
{{-- <div class="item-title">--}}
{{-- <h4>International Brands</h4>--}}
{{-- </div>--}}
{{-- --}}{{-- <div class="item-desc">--}}
{{-- --}}{{-- <p>Guaranteed authenticity</p>--}}
{{-- --}}{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- </section>--}}
<!-- Ending of secure-payment area -->

@endif
@endsection

@section('scripts')
<script>
    //---------Countdown-----------
    $('#clock').countdown('{{$gs->count_date}}', function(event) {
        $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
    });
    $(document).ready(function() {
        $('#hero-carousel').on('slide.bs.carousel', function(e) {
            var ele = $('#hero-carousel .carousel-indicators li.active');
            $('#hero-area').css('background', ele.data('value'));
        })
    });

</script>

<script>
    $(document).ready(function() {

        $('.loadmore-btn').on('click', function(e) {
            e.preventDefault();

            $('.loadmor-preloader').css('display', 'block');
            $('.loadmore-products').css('display', 'block');
        });
    });

</script>
<script>
    $(document).ready(function() {

        var sl = 0;
        // load_data('');

        function load_data(id = "") {

            $.ajax({
                url: "{{ route('loadmore.load_data') }}",
                method: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#load_more_button').remove();
                    $('#post_data').append(data);
                }
            })
        }
        load_more_data('');

        function load_more_data(id = "") {

            $.ajax({
                url: "{{ route('loadmore.load_data') }}",
                method: "GET",
                data: {
                    id: id
                },
                sync: false,
                success: function(data) {
                    // $('#load_more_button').remove();
                    console.log(data);
                    var html = '';
                    var record_sl = [];
                    if (data.count) {
                        for (var i = 0; i < data.count; i++) {
                            sl++;
                            record_sl.push({
                                sl: sl,
                                p_sl: i
                            });
                            html += '<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">\n' +
                                '                    <a href="' + data.data[i]['resource']['url'] + '" class="category_product-wrap">\n' +
                                '                        <div class="single-flash_item just-for-you-product loadmor-preloader" id="load_more_sl_' + sl + '" data-sl="' + sl + '">\n' +
                                '                        </div>\n' +
                                '                    </a>\n' +
                                '                </div>';
                        }
                        for (var j = 0; j < record_sl.length; j++) {
                            stateChange(record_sl[j], data.data)

                        }
                        var btn_html = '<div class="col-12" id="load_more">\n' +
                            '        <button type="button" name="load_more_button" class="loadmore-btn" data-id="' + data.last_id + '" id="load_more_button">Load More</button>\n' +
                            '       </div>';

                    } else {
                        var btn_html = '<div class="col-12" id="load_more"><button type="button" name="load_more_button" class="loadmore-btn">No Data Found</button></div>';
                    }
                    if (sl > 200) {
                        var btn_html = '<div class="col-12" id="load_more"><button type="button" name="load_more_button" class="loadmore-btn">No Data Found</button></div>';
                    }
                    $('#load_more_data').append(html);
                    $('#load_more_btn').html(btn_html);
                }
            })
        }

        function stateChange(item, data) {
            setTimeout(function() {
                var data_item_resource = data[item.p_sl]['resource'];
                console.log(data_item_resource);
                var id = $('#load_more_sl_' + item.sl);
                id.removeClass('loadmor-preloader');
                var html = '  <div class="product_offer-wrap">\n' +
                    '                                <div class="cdz-product-lbs">';


                if (data_item_resource.offPrice.status) {
                    html += '<div class="lb-content lb-sale">-' + data_item_resource.offPrice.off_percent + '%</div>';
                }
                if(data_item_resource.isStockOut){

                    html += ' <div class="sold-out">Sold Out</div>'

                }
                html += '  </div>\n' +
                    '                            </div>\n' +
                    '                            <div>\n' +
                    '                                <a href="' + data_item_resource.url + '" class="text-center">\n' +
                    '                                    <div class="flash-product-image-area-details">\n' +
                    '                                        <img src="' + data_item_resource.image + '" alt="" class="img-responsive div-mx">\n' +
                    '                                    </div>\n' +
                    '                                </a>\n' +
                    '                            </div>\n' +
                    '                            <div class="single-flash_item-content price_new-style">\n' +
                    '                                <a href="' + data_item_resource.url + '" class="title">' + data_item_resource.title + '</a>\n' +
                    '                                <p class="price ml-2">\n' +
                    '                                    <span class="currency-taka">' + data_item_resource.cur + '</span>' + data_item_resource.price + '<br>';
                if (data_item_resource.offPrice.status) {
                    html += '<span class="off-taka"><del><span class="currency-taka">' + data_item_resource.cur + '</span> ' + data_item_resource.off_price + '</del></span>';
                }
                html += '</p>\n' +
                    '                            </div>';
                id.html(html);
            }, 1000);
        }

        $(document).on('click', '#load_more_button', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            load_more_data(id);
        });

    });

</script>
@endsection
