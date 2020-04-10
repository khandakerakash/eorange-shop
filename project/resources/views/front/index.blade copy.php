@extends('layouts.front')
@section('content')
    <div class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
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

                                     
                                        <img class="img-responsive"
                                             src="{{asset('assets/images/'.$slider->photo)}}" alt="First slide">
                                     

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
                @if($gs->sb == 1)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a href="{{@$banner->top2l}}" class="hero-area_box">
                            <div class="hero-box_img">
                                <figure><img src="{{asset('assets/images/'.@$banner->top2)}}" alt="blog image"></figure>
                            </div>
                        </a>

                        <a href="{{@$banner->top3l}}" class="hero-area_box">
                            <div class="hero-box_img">
                                <figure><img src="{{asset('assets/images/'.@$banner->top3)}}" alt="blog image"></figure>
                            </div>
                        </a>
                    </div>

                @endif
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
        <div class="flash-sale wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
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
                                        <a href="{{ route('front.flash') }}">More &nbsp; <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>

                            @endif


                            <div class="row">
                                @foreach($flashSell as $flashItem)
                                    @php
                                        $name = str_replace(" ","-",$flashItem->name);
                                    @endphp
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div class="single-flash_item-home">

                                            <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}" target="_blank">
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
                                                    {{$gs->sign == 0?$curr->sign:""}}
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
                                                        <span><del>{{$curr->sign}} {{round($flashItem->pprice * $curr->value,2)}}</del></span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- /.row-->

                                <div class="shop-more_btn-mobile">
                                    <a href="{{ route('front.flash') }}">See all Super Deals &nbsp; <i class="fa fa-angle-right"></i></a>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FLASH SALE SECTION END -->


        <!-- OrangeMall SECTION START -->
        <div class="flash-sale wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" style="margin-top: 0; padding-top: 2rem;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="flash-sale_title"><a href="{{route('front.eorangemall')}}" target="_blank">Orange Mall</a></h1>
                    </div>

                    <div class="col-lg-12">
                        <div class="flash-sale_outer">




                            <div class="row">
                                @foreach($eorangMall as $flashItem)
                                    @php
                                        $name = str_replace(" ","-",$flashItem->name);
                                    @endphp
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <div class="single-flash_item">
                                            <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                               class="text-center">
                                                <div class="flash-product-image-area-details">
                                                    <img src="{{asset('assets/images/'.$flashItem->photo)}}"
                                                         alt="new arrival product" class="img-responsive div-mx">
                                                </div>
                                            </a>

                                            <div class="single-flash_item-content">
                                                <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                                   class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}</a>
                                                <p class="price">
                                                    {{$gs->sign == 0?$curr->sign:""}}
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
                                                        <span><del>{{$curr->sign}} {{round($flashItem->pprice * $curr->value,2)}}</del></span>
                                                    @endif


                                                </p>
                                            </div>
                                        </div>
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



    <!-- LATEST PRODUCT SECTION START -->
    <div class="latest-section">
        <div class="container">

            <!-- LATEST PRODUCT MEN START -->
            @foreach($categoryWiseProduct as $cat)
                <div class="latest-outer-wrap men letest-border wow fadeInUp" data-wow-duration="1s"
                     data-wow-delay="0.3s">
                    <div class="row no-gutters">
                        <!-- LATEST PRODUCT COMPUTER BG START -->
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="latest-nav-inner d-block"
                                 style="background-image: url({{$cat->photo==null ?asset('assets/images/man_bg-1.jpg'): asset('assets/images/'.$cat->photo) }});">
                                <div class="latest-nav-bg-overly men-overly"></div>
                                <div class="latest-nav-wrap">
                                    <h2 class="mb-3"><a style="color: white;"
                                                        href="{{route('front.category',$cat->slug)}}">{{$cat->name}}</a>
                                    </h2>
                                    <ul class="">
                                        @if(count($cat->subCategory)>0)
                                            @foreach($cat->subCategory as $sub)
                                                <li>
                                                    <a href="{{route('front.category',$sub->slug)}}">{{$sub->name}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- LATEST PRODUCT COMPUTER BG END -->

                        <!-- LATEST PRODUCT COMPUTER CAROUSEL START -->
                        <div class="col-lg-2 col-md-2 col-sm-6 d-m-none">
                            <div class="pro-carousel_wrap">
                                <div id="{{$cat->slug}}" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    @php
                                        $info = [];
                                        if($cat->slider_1!=null){
                                            $info[] = $cat->slider_1;
                                        }
                                        if($cat->slider_2!=null){
                                            $info[] = $cat->slider_2;
                                        }

                                        if($cat->slider_3!=null){
                                            $info[] = $cat->slider_3;
                                        }
                                    @endphp

                                    @if(count($info)>0)
                                        <ol class="carousel-indicators">
                                            @foreach($info as $key=>$aInfo)
                                            <li data-target="#{{$cat->slug}}" data-slide-to="{{$key}}"
                                                class="{{$key==0?"active":""}}"></li>
                                            @endforeach

                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">

                                            @foreach($info as $key=>$aInfo)

                                                    <div class="item {{$key==0?" active":""}}">
                                                        <img style="height: 350px" class="img-responsive div-mx"
                                                             src="{{asset('assets/images/'.$aInfo)}}"
                                                             alt="First slide">
                                                    </div>
                                                @endforeach

                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- LATEST PRODUCT COMPUTER CAROUSEL END -->

                        <!-- LATEST PRODUCT COMPUTER CATEGORY START -->
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="latest-section_product">
                                <div class="row">
                                    @if(count($cat->products)>0)
                                        @foreach($cat->products as $key=> $product)
                                            @if($key==8)
                                                @break
                                            @endif
                                            @php
                                                $name = str_replace(" ","-",$product->name);
                                            @endphp
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                <div class="latest-section_item">
                                                    <a href="{{route('front.product',['id' => $product->id, 'slug' => $name])}}"
                                                       class="text-center">
                                                        <div class="latest-product_img">
                                                            <figure>
                                                                <img src="{{asset('assets/images/'.$product->photo)}}"
                                                                     alt="new arrival product"
                                                                     class="img-responsive div-mx">
                                                            </figure>
                                                        </div>
                                                    </a>

                                                    <div class="caption text-center">
                                                        <a href="{{route('front.product',['id' => $product->id, 'slug' => $name])}}">{{strlen($product->name) > 50 ? substr($product->name,0,50)."..." : $product->name}}</a>
                                                        <p>
                                                            @if($gs->sign == 0)
                                                                {{$curr->sign}}
                                                            @endif
                                                            @if($product->user_id != 0)
                                                                @php
                                                                    $price = $product->cprice + $gs->fixed_commission + ($product->cprice/100) * $gs->percentage_commission ;
                                                                @endphp
                                                                {{round($price * $curr->value,2)}}
                                                            @else
                                                                {{round($product->cprice * $curr->value,2)}}
                                                            @endif

<br/>

                                                                @if($product->pprice != null)
                                                                    <span><del>{{$curr->sign}} {{round($product->pprice * $curr->value,2)}}</del></span>
                                                                @endif
                                                        </p>



                                                    </div>
                                                </div>
                                            </div>


                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- LATEST PRODUCT COMPUTER CATEGORY END -->
                    </div>
                </div>
                <!-- LATEST PRODUCT MEN END -->
            @endforeach


        </div>
    </div>
    <!-- LATEST PRODUCT SECTION END -->
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