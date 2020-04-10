@extends('layouts.front_master')
@section('title',substr($product->name, 0,10)."-".$gs->title)
@section('meta_data')
    <meta name="keywords" content="{{$product->meta_tag != null ? $product->meta_tag : $pmeta}}">
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:description" content="{{ $product->meta_description != null ? $product->meta_description : strip_tags($product->description) }}" />
    <meta property="og:image" content="{{asset('assets/images/'.$product->photo)}}" />
@endsection
@section('content')
    @php
        $i=1;
        $j=1;
    @endphp
    <div class="product-details-page-bg">
        <!--  Starting of product description area   -->
        <div class="product-details-wrapper">

            <div class="page-linking">
                <div class="container">
                    <div class="row">
                        <div class="breadcrumb-box">
                            <a href="{{route('front.index')}}">{{ucfirst(strtolower($lang->home))}}</a>
                            @if(count($product->latestcategory)>0)
                                @foreach($product->latestcategory as $cat)
                                    <a href="{{route('front.category',$cat->slug)}}">{{$cat->name}}</a>
                                @endforeach
                            @endif
                            <a href="{{route('front.product',['id1' => $product->id , 'id2' => $product->name])}}">{{$product->name}}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-wrapper_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="xzoom-container">
                                <img class="xzoom" id="xzoom-default"
                                     src="{{asset('assets/images/'.$product->photo)}}"
                                     xoriginal="{{asset('assets/images/'.$product->photo)}}"
                                     alt="Product image"
                                />

                                <div class="xzoom-thumbs">
                                    @foreach($product->galleries as $gallery)
                                        <a href="{{asset('assets/images/gallery/'.$gallery->photo)}}">
                                            <img style="height: 80px; width: 95px;" id="icon{{$gallery->id}}" class="xzoom-gallery"
                                                 onclick="productGallery(this.id)"
                                                 src="{{asset('assets/images/gallery/'.$gallery->photo)}}"
                                                 xpreview="{{asset('assets/images/gallery/'.$gallery->photo)}}"
                                                 alt="Product image"
                                            >
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="social_icons">
                                <div class="social-sharing a2a_kit a2a_kit_size_32">
                                    <a class="facebook a2a_button_facebook" href=""><i class="fab fa-facebook-square"></i></a>
                                    <a class="twitter a2a_button_twitter" href=""><i class="fab fa-twitter-square"></i></a>
                                    <a class="pinterest a2a_button_google_plus" href=""><i class="fab fa-google-plus-square"></i></a>
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"><i class="fa fa-plus"></i></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                            <div class="product-summary">
                                <div class="title">
                                    <h1 dir="{{$gs->rtl == 1 ? 'rtl':''}}">{{$product->name}}</h1>

                                    <div class="productDetails-reviews">
                                        <div class="ratings">
                                            <div class="empty-stars"></div>
                                            <div class="full-stars"
                                                 style="width:{{count($product->avgRating)>0 ? number_format((float)$product->avgRating[0]->aggregate, 1, '.', '')*20:0}}%"></div>
                                        </div>
                                        <span>{{count($product->reviews)}} {{$lang->dttl}}</span>
                                    </div>
                                </div>

                                <div class="summary-price">
                                    @if($gs->sign == 0)
                                        <h1 class="productDetails-price">
                                        <span class="currency_icon">
                                            {{$curr->sign}}
                                        </span>
                                            @if($product->user_id != 0)
                                                @php
                                                    $price = $product->cprice + $gs->fixed_commission + ($product->cprice/100) * $gs->percentage_commission ;
                                                @endphp
                                                {{round($price * $curr->value,2)}}
                                            @else
                                                {{round($product->cprice * $curr->value,2)}}
                                            @endif

                                            @if($product->pprice != null)
                                                <span><del>{{$curr->sign}}{{round($product->pprice * $curr->value,2)}}</del></span>
                                            @endif
                                        </h1>
                                    @else
                                        <h1 class="productDetails-price">
                                            @if($product->user_id != 0)
                                                @php
                                                    $price = $product->cprice + $gs->fixed_commission + ($product->cprice/100) * $gs->percentage_commission ;
                                                @endphp
                                                {{round($price * $curr->value,2)}}
                                            @else
                                                {{round($product->cprice * $curr->value,2)}}
                                            @endif
                                            <span class="currency_icon">
                                            {{$curr->sign}}
                                        </span>

                                            @if($product->pprice != null)
                                                <span><del>{{round($product->pprice * $curr->value,2)}}{{$curr->sign}}</del></span>
                                            @endif
                                        </h1>
                                    @endif
                                </div>


                                @if($product->user_id != 0)

                                    @if(isset($product->user))
                                        <div class="productDetails-header-info">

                                            <div class="product-headerInfo__title">
                                                {{$lang->shop_name}}: <a
                                                        href="{{route('front.vendor',str_replace(' ', '-',($product->user->shop_name)))}}">{{$product->user->shop_name}}</a>
                                            </div>
                                            @if(Auth::guard('user')->check())
                                                <div class="product-headerInfo__btns">
                                                    @if( Auth::guard('user')->user()->favorites()->where('vendor_id','=',$product->user->id)->get()->count() > 0)
                                                        <a class="headerInfo__btn colored"><i class="fa fa-check"></i> Favorite</a>
                                                    @else
                                                        <a style="cursor: pointer;" id="favorite" class="headerInfo__btn">
                                                            <input type="hidden" id="fav" value="{{$product->user->id}}">
                                                            <i class="fa fa-plus"></i> Add to <i class="fa fa-heart"></i> Seller
                                                        </a>
                                                    @endif

                                                </div>
                                            @else
{{--                                                <div class="product-headerInfo__btns">--}}
{{--                                                    <a style="cursor: pointer;" class="headerInfo__btn no-wish" data-toggle="modal"--}}
{{--                                                       data-target="#loginModal"><i class="fa fa-plus"></i> Add to <i class="fa fa-heart"></i>--}}
{{--                                                        Seller</a>--}}
{{--                                                </div>--}}
                                            @endif


                                        </div>
                                    @endif


                                @endif
                                @if($product->product_condition != 0)
                                    <div class="productDetails-header-info">

                                        <div class="product-headerInfo__title">
                                            Product Condition: {{ $product->product_condition == 1 ?'Used' : 'New'}}.
                                        </div>
                                    </div>
                                @endif
                                @if($product->ship != null)
                                    <div class="productDetails-header-info">

                                        <div class="product-headerInfo__title">
                                            Estimated Shipping Time: {{ $product->ship}}.
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $stk = (string)$product->stock;
                                @endphp
                                @if($stk == "0")
                                    <p class="productDetails-status" style="color: red; font-size: 14px;">
                                        <i class="fa fa-times-circle"></i>
                                        <span>{{$lang->dni}}</span>
                                    </p>
                                @else
                                    <p class="productDetails-status" style="color: #fe6801; font-size: 14px;">
                                     <i class="far fa-check-circle"></i>
                                        <span>{{$lang->sbg}}</span>
                                    </p>
                                @endif



                                {{--                            @if($product->shortdescription)--}}
                                {{--                                <p class="productDetails-description" dir="{{$gs->rtl == 1 ? 'rtl':''}}">--}}
                                {{--                                    {{strip_tags(substr($product->shortdescription,0,300))}}--}}
                                {{--                                </p>--}}
                                {{--                            @endif--}}


                                @if($product->size != null)
                                    <div class="productDetails-size">
                                        <span>{{$lang->doo}}:</span>
                                        <span>
                                        @foreach($size as $sz)
                                                <span class="psize">{{$sz}}</span>
                                            @endforeach
                                    </span>
                                    </div>
                                @endif
                                @if($product->color != null)
                                    <div class="productDetails-color">
                                        <span>{{$lang->colors}}:</span>
                                        <span>
                                        @foreach($color as $cl)
                                                <span class="pcolor" style="background: {{$cl}};">&nbsp; &nbsp; &nbsp;</span>
                                            @endforeach
                                    </span>
                                    </div>
                                @endif

                                <div class="productDetails-quantity">
                                    <span>{{$lang->cquantity}}:</span>
                                    <input type="hidden" id="stock" value="{{$product->stock}}">
                                    <span class="quantity-btn" id="qsub"><i class="fa fa-minus"></i></span>
                                    <span id="qval">1</span>
                                    <span class="quantity-btn" id="qadd"><i class="fa fa-plus"></i></span>
                                </div>

                                <div class="product-details-buttons">
                                    <!--  Static 'Buy Now' button added -->

                                    <!--  Static 'Buy Now' button added -->
                                    @if($stk == "0")
                                        <a  class="productDetails-buyNow-btn" style="cursor: no-drop;">
                                            <span>Buy Now </span>
                                        </a>
                                        <a class="productDetails-addCart-btn" style="cursor: no-drop;">
                                            <span>{{$lang->dni}}</span>
                                        </a>
                                    @else
                                        @if($product->exclusive_offer)
                                            @if($product->salon_service_end_time < Carbon\Carbon::now())
                                                <div class="text-danger">Time out offer Exclusive offer</div>
                                                @else
                                            <div id="salon_service">
                                                        <div id="salon_service_clock"></div>
                                            </div>
                                            @endif
                                            @else
                                            <a  class="productDetails-buyNow-btn" id="buy_now" style="cursor: pointer;">
                                                <span>Buy Now</span>
                                            </a>
                                            <a class="productDetails-addCart-btn" id="addcrt" style="cursor: pointer;">
                                                <span>{{$lang->hcs}}</span>
                                            </a>
                                            @endif

                                    @endif

                                    <input type="hidden" id="pid" value="{{$product->id}}">

{{--                                    @if(Auth::guard('user')->check())--}}
{{--                                        <a style="cursor: pointer;" class="productDetails-addWish-btn" id="wish"><i class="far fa-heart"></i> <span>18</span></a>--}}
{{--                                    @else--}}
{{--                                        <a style="cursor: pointer;" class="productDetails-addWish-btn no-wish" data-toggle="modal"--}}
{{--                                           data-target="#loginModal"><i class="far fa-heart"></i> <span>18</span></a>--}}
{{--                                    @endif--}}

                                </div>

                                <div class="product-highlight-tab">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active vertical-line"><a href="#highlights" aria-controls="home" role="tab" data-toggle="tab">HIGHLIGHTS</a></li>
                                        <li role="presentation"><a href="#return-policy" aria-controls="profile" role="tab" data-toggle="tab">RETURN POLICY</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="highlights">
                                            @if($product->shortdescription)
                                                <p class="productDetails-description" dir="{{$gs->rtl == 1 ? 'rtl':''}}">
                                                    {{strip_tags(substr($product->shortdescription,0,300))}}
                                                </p>
                                            @endif
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade in" id="return-policy">
                                            <p>
                                                You must show the original Customer Copy of the Invoice to authenticate your purchase, at the time of handing over the product.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
{{--                            <div class="product-view-offer-banner">--}}
{{--                                <p>--}}
{{--                                    <a href="#" target="_blank">--}}
{{--                                        <img class="img-responsive" src="{{ asset('assets/front/images/bkash-400x400.jpg') }}" alt="20% bkash cashback offer from eOorange Shop"  title="20% bkash cashback offer from eOorange Shop">--}}
{{--                                    </a>--}}
{{--                                </p>--}}
{{--                                <div class="desc">পবিত্র মাহে রমজান উপলক্ষে <a href="https://eorange.shop/">eorange.shop</a> এ বিকাশ অ্যাপ দিয়ে QR কোড স্ক্যান করে অথবা ওয়েবসাইটে লগইন করে বিকাশ পেমেন্ট গেটওয়ে সিলেক্ট করে বিকাশ পেমেন্ট করলেই পাচ্ছেন ২০% পর্যন্ত ইনস্ট্যান্ট ক্যাশব্যাক সর্বোচ্চ ৩০০ টাকা। অফার চলাকালীন একটি নাম্বারে পাচ্ছেন সর্বোচ্চ ৫০০ টাকা পর্যন্ত ক্যাশব্যাক। অফারটি চলবে ৬ষ্ঠ জুন ২০১৯ পর্যন্ত।</div>--}}
{{--                            </div>--}}

                            <div class="right-product-img">
                                <a href="#">
                                    <img src="{{ asset('assets/front/images/orangesidebar.gif') }}" alt="Product Image" class="img-responsive">
                                </a>
                            </div>



                            @if($product->warranty != null)

                            <div class="right-bar-product">


                                <h2>Product Warranty</h2>
                                <p>{{$product->warranty}}</p>


                            </div>
                            @endif




                            <div class="right-bar-product">
                                <h2>Payment Methods</h2>
                                <p><img alt="payment-logo" class="img-responsive" src="{{ asset('assets/front/images/payment-logo.jpg') }}"></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of product description area   -->

        <!--  Starting of product detail tab area   -->
        <div class="product-details-tab-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h2 class="product-details-tab-wrap-title">
                            About the Product
                        </h2>

                        <div class="custom-tab">
                            <div class="product-details-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#overview-details-tab-1" aria-controls="overview-details-tab-1" role="tab" data-toggle="tab">{{$lang->ddesc}}</a></li>
                                    <li role="presentation"><a href="#overview-details-tab-2" aria-controls="overview-details-tab-2" role="tab" data-toggle="tab">{{$lang->ppr}}</a></li>
                                    <li role="presentation"><a href="#overview-details-tab-3" aria-controls="overview-details-tab-3" role="tab" data-toggle="tab">{{$lang->dttl}} ({{count($product->reviews)}})</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="overview-details-tab-1">
                                        @if(strlen($product->description) > 70)
                                            <div class="detail-title-wrap">
                                                <h3 class="detail-title">
                                                    <strong>{{$lang->ddesc}}</strong>
                                                </h3>
                                            </div>

                                            @if($gs->rtl == 1)
                                                <div id="overview-tab-1" class="tab-pane active fade in" dir="rtl">
                                                    <p>{!! $product->description !!}</p>
                                                </div>
                                            @else
                                                <div id="overview-tab-1" class="tab-pane active fade in">
                                                    <p>{!! $product->description !!}</p>
                                                </div>
                                            @endif
                                        @else
                                            <div id="overview-tab-1" class="tab-pane active fade in">
                                                <p>{!! $product->description !!}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div role="tabpanel" class="tab-pane active fade in" id="overview-details-tab-2">
                                        <div class="detail-title-wrap">
                                            <h3 class="detail-title">
                                                <strong>{{$lang->ppr}}</strong>
                                            </h3>
                                        </div>

                                        @if(strlen($product->policy) > 70)
                                            @if($gs->rtl == 1)
                                                <div id="pricing-tab-2" class="tab-pane fade" dir="rtl">
                                                    <p>{!! $product->policy !!}</p>
                                                </div>
                                            @else
                                                <div id="pricing-tab-2" class="tab-pane fade">
                                                    <p>{!! $product->policy !!}</p>
                                                </div>
                                            @endif
                                        @else
                                            <div id="pricing-tab-2" class="ttab-pane fade">
                                                <p>{!! $product->policy !!}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <div role="tabpanel" class="tab-pane active fade in" id="overview-details-tab-3">

                                        <div class="detail-title-wrap">
                                            <h3 class="detail-title">
                                                <strong>{{$lang->dttl}}</strong>
                                            </h3>
                                        </div>

                                        @if(strlen($product->policy) > 70)
                                            @if($gs->rtl == 1)
                                                <div id="pricing-tab-2" class="tab-pane fade" dir="rtl">
                                                    <p>{!! $product->policy !!}</p>
                                                </div>
                                            @else
                                                <div id="pricing-tab-2" class="tab-pane fade">
                                                    <p>{!! $product->policy !!}</p>
                                                </div>
                                            @endif
                                        @else
                                            <div id="pricing-tab-2" class="ttab-pane fade">
                                                <p>{!! $product->policy !!}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

{{--                            <div class="row">--}}



{{--                                                            <ul class="tab-list" style="direction: ltr;">--}}
{{--                                                                <li class="active"><a data-toggle="tab" href="#overview-tab-1">{{$lang->ddesc}}</a></li>--}}
{{--                                                                <li><a data-toggle="tab" href="#pricing-tab-2">{{$lang->ppr}}</a></li>--}}
{{--                                                                <li><a data-toggle="tab" href="#location-tab-3">{{$lang->dttl}}--}}
{{--                                                                        ({{count($product->reviews)}})</a></li>--}}
{{--                                                            </ul>--}}

{{--                                                            <div class="tab-content">--}}
{{--                                                                @if(strlen($product->description) > 70)--}}
{{--                                                                    @if($gs->rtl == 1)--}}
{{--                                                                        <div id="overview-tab-1" class="tab-pane active fade in" dir="rtl">--}}
{{--                                                                            <p>{!! $product->description !!}</p>--}}
{{--                                                                        </div>--}}
{{--                                                                    @else--}}
{{--                                                                        <div id="overview-tab-1" class="tab-pane active fade in">--}}
{{--                                                                            <p>{!! $product->description !!}</p>--}}
{{--                                                                        </div>--}}
{{--                                                                    @endif--}}
{{--                                                                @else--}}
{{--                                                                    <div id="overview-tab-1" class="tab-pane active fade in">--}}
{{--                                                                        <p>{!! $product->description !!}</p>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}

{{--                                                                @if(strlen($product->policy) > 70)--}}
{{--                                                                    @if($gs->rtl == 1)--}}
{{--                                                                        <div id="pricing-tab-2" class="tab-pane fade" dir="rtl">--}}
{{--                                                                            <p>{!! $product->policy !!}</p>--}}
{{--                                                                        </div>--}}
{{--                                                                    @else--}}
{{--                                                                        <div id="pricing-tab-2" class="tab-pane fade">--}}
{{--                                                                            <p>{!! $product->policy !!}</p>--}}
{{--                                                                        </div>--}}
{{--                                                                    @endif--}}
{{--                                                                @else--}}
{{--                                                                    <div id="pricing-tab-2" class="ttab-pane fade">--}}
{{--                                                                        <p>{!! $product->policy !!}</p>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}

{{--                                                                <div id="location-tab-3" class="tab-pane fade">--}}
{{--                                                                    <div>--}}
{{--                                                                        @if(Auth::guard('user')->check())--}}
{{--                                                                            <h1>{{$lang->fpr}}</h1>--}}
{{--                                                                            <hr>--}}
{{--                                                                            @include('includes.form-success')--}}
{{--                                                                            <p class="product-reviews">--}}
{{--                                                                            <div class="review-star">--}}
{{--                                                                                <div class='starrr' id='star1'></div>--}}
{{--                                                                                <div>--}}
{{--                                                                                <span class='your-choice-was' style='display: none;'>--}}
{{--                                                                                  {{$lang->dofpl}}: <span class='choice'></span>.--}}
{{--                                                                                </span>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            </p>--}}
{{--                                                                            <form class="product-review-form" action="{{route('front.review.submit')}}"--}}
{{--                                                                                  method="POST">--}}
{{--                                                                                {{ csrf_field() }}--}}
{{--                                                                                <input type="hidden" name="user_id"--}}
{{--                                                                                       value="{{Auth::guard('user')->user()->id}}">--}}
{{--                                                                                <input type="hidden" name="name"--}}
{{--                                                                                       value="{{Auth::guard('user')->user()->name}}">--}}
{{--                                                                                <input type="hidden" name="email"--}}
{{--                                                                                       value="{{Auth::guard('user')->user()->email}}">--}}
{{--                                                                                <input type="hidden" name="rating" id="rate" value="5">--}}
{{--                                                                                <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                                                                                <div class="form-group">--}}
{{--                                                                                    <textarea name="review" id="" rows="5" placeholder="{{$lang->suf}}"--}}
{{--                                                                                              class="form-control" style="resize: vertical;"--}}
{{--                                                                                              required></textarea>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div class="form-group text-center">--}}
{{--                                                                                    <input name="btn" type="submit" class="btn-review"--}}
{{--                                                                                           value="Submit Review">--}}
{{--                                                                                </div>--}}
{{--                                                                            </form>--}}
{{--                                                                            <hr>--}}
{{--                                                                        @endif--}}
{{--                                                                        <h1>{{$lang->dttl}}: </h1>--}}
{{--                                                                        <hr>--}}
{{--                                                                        @forelse($product->reviews as $review)--}}
{{--                                                                            <div class="review-rating-description">--}}
{{--                                                                                <div class="row">--}}
{{--                                                                                    <div class="col-md-3 col-sm-3">--}}
{{--                                                                                        <p>{{$review->name}}</p>--}}
{{--                                                                                        <p class="product-reviews">--}}
{{--                                                                                        <div class="ratings">--}}
{{--                                                                                            <div class="empty-stars"></div>--}}
{{--                                                                                            <div class="full-stars"--}}
{{--                                                                                                 style="width:{{$review->rating*20}}%"></div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        </p>--}}
{{--                                                                                        <p>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->review_date)->diffForHumans()}}</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="col-md-9 col-sm-9">--}}
{{--                                                                                        <p>{{$review->review}}</p>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        @empty--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <h4>{{$lang->md}}</h4>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        @endforelse--}}
{{--                                                                        <hr>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}

{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of product detail tab area   -->

        <br>

    {{--    @include('includes.comment-replies')--}}

    <!--  Starting of product detail carousel area   -->
        <div class="section-padding productDetails-carousel-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="related-products">
                            <h2>{{$lang->amf}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-carousel featured-carousel" style="margin-top: 0;">
                            @foreach($relatedProduct as $prod)
                                @if($prod->id != $product->id)
                                    @php
                                        $name = str_replace(" ","-",$prod->name);
                                    @endphp
                                    <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}"
                                       class="single-product-area text-center">
                                        
                                        <div class="heart-icon">
                                            <i class="far fa-heart"></i>
                                        </div>
                                        
                                        <div class="product-image-area">
                                            @if($prod->features!=null && $prod->colors!=null)
                                                @php
                                                    $title = explode(',', $prod->features);
                                                    $details = explode(',', $prod->colors);
                                                @endphp
                                                <div class="featured-tag" style="width: 100%;">
                                                    @foreach(array_combine($title,$details) as $ttl => $dtl)
                                                        <style type="text/css">
                                                            span#d{{$j++}}:after {
                                                                border-left: 10px solid{{$dtl}};
                                                            }
                                                        </style>
                                                        <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="featured product">
{{--                                            <div class="gallery-overlay"></div>--}}
{{--                                            <div class="gallery-border"></div>--}}
                                            <div class="product-hover-area">
{{--                                                @if(Auth::guard('user')->check())--}}
{{--                                                    <span class="uwish"><i class="icofont">heart</i></span>--}}
{{--                                                @else--}}
{{--                                                    <span class="no-wish" data-toggle="modal" data-target="#loginModal"><i--}}
{{--                                                                class="icofont">heart</i></span>--}}
{{--                                                @endif--}}
{{--                                                <input type="hidden" value="{{$prod->id}}">--}}
{{--                                                <span class="wish-list" data-toggle="modal" data-target="#myModal"><i--}}
{{--                                                            class="icofont">eye</i></span>--}}
{{--                                                <span class="addcart"><i class="icofont">cart</i></span>--}}
{{--                                                <span><i class="icofont">exchange</i></span>--}}
                                            </div>
                                        </div>
                                        <div class="product-description text-center">
                                            <div class="product-name">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                                            <div class="product-review">
                                                <div class="ratings">
                                                    <div class="empty-stars"></div>
                                                    <div class="full-stars"
                                                         style="width:{{count($prod->avgRating)>0 ? number_format((float)$prod->avgRating[0]->aggregate, 1, '.', '')*20:0}}%"></div>
                                                </div>
                                            </div>
                                            @if($gs->sign == 0)
                                                <div class="product-price">{{$curr->sign}}
                                                    @if($prod->user_id != 0)
                                                        @php
                                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                                        @endphp
                                                        {{round($price * $curr->value,2)}}
                                                    @else
                                                        {{round($prod->cprice * $curr->value,2)}}
                                                    @endif

                                                </div>
                                            @else
                                                <div class="product-price">
                                                    @if($prod->user_id != 0)
                                                        @php
                                                            $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                                                        @endphp
                                                        {{round($price * $curr->value,2)}}
                                                    @else
                                                        {{round($prod->cprice * $curr->value,2)}}
                                                    @endif
                                                    {{$curr->sign}}
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Ending of product detail carousel area   -->
    </div>
@endsection

@section('scripts')
    <style type="text/css">
        img#imageDiv {
            height: 460px;
            width: 460px;
        }

        /*@media only screen and (max-width: 1024px) {*/
            /*.product-review-carousel-img {*/
                /*max-width: 300px !important;*/
                /*!*margin: 30px auto !important;*!*/
            /*}*/

            /*.right-zoom {*/
                /*max-width: 300px !important;*/
                /*!*margin: 30px auto !important;*!*/
            /*}*/

            /*.right-zoom img {*/
                /*height: 300px !important;*/
                /*width: 300px !important;*/
            /*}*/

            /*img#imageDiv {*/
                /*height: 300px !important;*/
                /*width: 300px !important;*/
            /*}*/

            /*!*.easyzoom .small, .easyzoom .big {*!*/
                /*!*height: 300px !important;*!*/
                /*!*width: 300px !important;*!*/
            /*!*}*!*/
        /*}*/

        .product-review-carousel-img {
            clear: both;
        }

        .product-review-owl-carousel {
            margin-top: 20px;
        }

        .right-zoom {
            border: 1px solid #dddddd;
            z-index: 1;
        }


        .xzoom-thumbs {
            margin-top: 20px;
        }
        .productDetails-status {
            font-size: 18px;
        }
    </style>
    <script>

        //---------Countdown-----------
        $(document).ready(function () {
            var add_cart_html = '<a  class="productDetails-buyNow-btn" id="buy_now" style="cursor: pointer;">\n' +
                '                                                <span>Buy Now</span>\n' +
                '                                            </a>\n' +
                '                                            <a class="productDetails-addCart-btn" id="addcrt" style="cursor: pointer;">\n' +
                '                                                <span>{{$lang->hcs}}</span>\n' +
                '                                            </a>';
            var start_time = '{{$product->salon_service_start_time}}';
            var end_time = '{{$product->salon_service_end_time}}';

            @if($product->salon_service_start_time > Carbon\Carbon::now())
            $('#salon_service_clock').countdown(start_time, function(event) {
                if(event.offset.totalSeconds <= 0){
                    var auth_check = "{{auth()->check()?true:false}}";
                    if(auth_check === 'true'){
                        $(this).html(add_cart_html);
                    }else{
                        window.location.replace('{{route('user-login')}}');
                    }

                }else{
                    $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span style="font-size:9px">{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span style="font-size:9px">{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span style="font-size:9px">{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span style="font-size:9px">{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span style="font-size:9px">{{$lang->second}}</span></span> </span>'));

                }
            });
            @else
            $('#salon_service_clock').html(add_cart_html);
            @endif



        })


    </script>
    <script type="text/javascript">

        $( document ).ready(function() {
            $(".xzoom, .xzoom-gallery").xzoom({tint: '#ededed', Xoffset: 15});
        });


        // $('#imageDiv').imagezoomsl({
        //
        //     zoomrange: [3, 3]
        // });

        function productGallery(file) {
            var image = $("#" + file).attr('src');
            $('#imageDiv').attr('src', image);
            $('.zoomImg').attr('src', image);
        }

        // $('.right-zoom').easyZoom({
        //     width: 460,
        //     position: 'right',
        //     background: '#ededed',
        // });


        // var size = $(this).html();
        // $('#size').val(size);

        $('#star1').starrr({
            rating: 5,
            change: function (e, value) {
                if (value) {
                    $('.your-choice-was').show();
                    $('.choice').text(value);
                    $('#rate').val(value);
                } else {
                    $('.your-choice-was').hide();
                }
            }
        });

    </script>

    <script type="text/javascript">
        var sizes = "";
        var colors = "";
        var stock = $("#stock").val();

        $(document).on("click", ".psize", function () {
            $('.psize').removeClass('pselected-size');
            $(this).addClass('pselected-size');
            sizes = $(this).html();
        });

        $(document).on("click", ".pcolor", function () {
            $('.pcolor').removeClass('pselected-color');
            $(this).addClass('pselected-color');
            colors = $(this).html();
        });

        $(document).on("click", "#qsub", function () {
            var qty = $("#qval").html();
            qty--;
            if (qty < 1) {
                $("#qval").html("1");
            }
            else {
                $("#qval").html(qty);
            }
        });
        $(document).on("click", "#qadd", function () {
            var qty = $("#qval").html();
            if (stock != "") {
                var stk = parseInt(stock);
                if (qty < stk) {
                    qty++;
                    $("#qval").html(qty);
                }

            }
            else {
                qty++;
                $("#qval").html(qty);
            }

        });



    </script>


    <script>
        $(document).on("click", "#wish", function () {
            var pid = $("#pid").val();
            $.ajax({
                type: "GET",
                url: "{{URL::to('/json/wish')}}",
                data: {id: pid},
                success: function (data) {
                    if (data == 1) {
                        $.notify("{{$gs->wish_success}}", "success");
                    }
                    else {
                        $.notify("{{$gs->wish_error}}", "error");
                    }
                }
            });

            return false;
        });
    </script>
    <script>
        $(document).on("click", "#favorite", function () {
            $("#favorite").hide();
            var pid = $("#fav").val();
            $.ajax({
                type: "GET",
                url: "{{URL::to('/json/favorite')}}",
                data: {id: pid},
                success: function (data) {
                    $('.product-headerInfo__btns').html('<a class="headerInfo__btn colored"><i class="fa fa-check"></i> Favorite</a>');
                }
            });

        });
    </script>



    <script type="text/javascript">
        //*****************************COMMENT******************************
        $("#cmnt").submit(function () {
            var uid = $("#user_id").val();
            var pid = $("#product_id").val();
            var cmnt = $("#txtcmnt").val();
            $("#txtcmnt").prop('disabled', true);
            $('.btn blog-btn comments').prop('disabled', true);
            $.ajax({
                type: 'post',
                url: "{{URL::to('json/comment')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'uid': uid,
                    'pid': pid,
                    'cmnt': cmnt
                },
                success: function (data) {
                    $("#comments").prepend(
                        '<div id="comment' + data[3] + '">' +
                        '<div class="row single-blog-comments-wrap">' +
                        '<div class="col-lg-12">' +
                        '<h4><a class="comments-title">' + data[0] + '</a></h4>' +
                        '<div class="comments-reply-area">' + data[1] + '</div>' +
                        '<p id="cmntttl' + data[3] + '">' + data[2] + '</p>' +
                        '<div class="replay-form">' +
                        '<p class="text-right"><button class="replay-btn">Reply <i class="fa fa-reply-all"></i></button><button class="replay-btn-edit">Edit <i class="fa fa-edit"></i></button><button class="replay-btn-delete">Remove <i class="fa fa-trash"></i></button></p>' +
                        '<form action="" method="POST" class="reply">' +
                        '{{csrf_field()}}' +
                        '<input type="hidden" name="comment_id" id="comment_id' + data[3] + '" value="' + data[3] + '">' +
                        '<input type="hidden" name="user_id" id="user_id' + data[3] + '" value="' + data[4] + '">' +
                        '<div class="form-group">' +
                        '<input type="text " name="text" class="form-control" id="txtcmnt' + data[3] + '" placeholder="Write Your Replies Here..." required>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">SUBMIT</button>' +
                        '</div>' +
                        '</form>' +
                        '<form action="" method="POST" class="comment-edit">' +
                        '{{csrf_field()}}' +
                        '<input type="hidden" name="comment_id" value="' + data[3] + '">' +
                        '<div class="form-group">' +
                        '<input type="text" id="editcmnt' + data[3] + '" name="text" class="form-control"' +
                        'placeholder="Edit Your Comment..." required="">' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">Update</button>' +
                        '</div>' +
                        '</form>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                    $("#comment" + data[3]).append('<div id="replies' + data[3] + '"  style="display: none;">' + '</div>');
                    //-----------Replay button details-----------
                    if (data[5] > 1) {
                        $("#cmnt-text").html("COMMENTS (<span id='cmnt_count'>" + data[5] + "</span>)");
                    }
                    else {
                        $("#cmnt-text").html("COMMENT (<span id='cmnt_count'>" + data[5] + "</span>)");
                    }
                    $("#txtcmnt").prop('disabled', false);
                    $("#txtcmnt").val("");
                    $('.btn blog-btn comments').prop('disabled', false);
                }
            });
            return false;
        });
        //*****************************COMMENT ENDS******************************
    </script>

    <script type="text/javascript">

        //***************************** REPLY TOGGLE******************************
        $(document).on("click", ".replay-form p button.replay-btn", function () {
            var id = $(this).parent().next().find('input[name=comment_id]').val();
            $(this).parent().next(".replay-form form").slideToggle();
            $("#replies" + id).slideToggle();
        });
        //*****************************REPLY******************************
        $(document).on("submit", ".reply", function () {
            var uid = $(this).find('input[name=user_id]').val();
            var cid = $(this).find('input[name=comment_id]').val();
            var rpl = $(this).find('input[name=text]').val();
            $(this).find('input[name=text]').prop('disabled', true);
            $('.btn btn-no-border hvr-shutter-out-horizontal').prop('disabled', true);
            $.ajax({
                type: 'post',
                url: "{{URL::to('json/reply')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'uid': uid,
                    'cid': cid,
                    'rpl': rpl
                },
                success: function (data) {
                    $("#replies" + cid).append('<div id="reply' + data[3] + '">' +
                        '<div class="row single-blog-comments-wrap replay">' +
                        '<div class="col-lg-12">' +
                        '<h4><a class="comments-title">' + data[0] + '</a></h4>' +
                        '<div class="comments-reply-area">' + data[1] + '</div>' +
                        '<p id="rplttl' + data[3] + '">' + data[2] + '</p>' +
                        '<div class="replay-form">' +
                        '<p class="text-right"><button class="subreplay-btn">Reply <i class="fa fa-reply-all"></i></button><button class="replay-btn-edit1">Edit <i class="fa fa-edit"></i></button><button class="replay-btn-delete1">Remove <i class="fa fa-trash"></i></button></p>' +
                        '<form action="" method="POST" class="subreply">' +
                        '{{csrf_field()}}' +
                        '<input type="hidden" name="reply_id" id="reply_id' + data[3] + '" value="' + data[3] + '">' +
                        '<input type="hidden" name="user_id" id="user_id' + data[3] + '" value="' + data[4] + '">' +
                        '<div class="form-group">' +
                        '<input type="text " name="text" class="form-control" id="txtrpl' + data[3] + '" placeholder="Write Your Replies Here..." required>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">SUBMIT</button>' +
                        '</div>' +
                        '</form>' +
                        '<form action="" method="POST" class="reply-edit">' +
                        '{{csrf_field()}}' +
                        '<input type="hidden" name="reply_id" value="' + data[3] + '">' +
                        '<div class="form-group">' +
                        '<input type="text" id="editrpl' + data[3] + '" name="text" class="form-control"' + 'placeholder="Edit Your Reply..." required="">' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">' + 'Update</button>' +
                        '</div>' +
                        '</form>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                    $("#reply" + data[3]).append('<div id="subreplies' + data[3] + '"  style="display: none;">' + '</div>');
                    //-----------REPLY button details-----------
                    $("#txtcmnt" + cid).prop('disabled', false);
                    $("#txtcmnt" + cid).val("");
                    $('.btn btn-no-border hvr-shutter-out-horizontal').prop('disabled', false);
                }
            });
            return false;
        });
        //*****************************REPLY ENDS******************************

    </script>

    <script type="text/javascript">

        //***************************** SUB REPLY TOGGLE******************************
        $(document).on("click", ".replay-form p button.subreplay-btn", function () {
            var id = $(this).parent().next().find('input[name=reply_id]').val();
            $(this).parent().next(".replay-form form").slideToggle();
            $("#subreplies" + id).slideToggle();
        });


        //*****************************SUB REPLY******************************
        $(document).on("submit", ".subreply", function () {
            var uid = $(this).find('input[name=user_id]').val();
            var rid = $(this).find('input[name=reply_id]').val();
            var subrpl = $(this).find('input[name=text]').val();
            $(this).find('input[name=text]').prop('disabled', true);
            $('.hvr-shutter-out-horizontal').prop('disabled', true);
            $.ajax({
                type: 'post',
                url: "{{URL::to('json/subreply')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'uid': uid,
                    'rid': rid,
                    'subrpl': subrpl
                },
                success: function (data) {
                    $("#subreplies" + rid).append('<div id="subreply' + data[3] + '">' +
                        '<div class="row single-blog-comments-wrap subreplay">' +
                        '<div class="col-lg-12">' +
                        '<h4><a class="comments-title">' + data[0] + '</a></h4>' +
                        '<div class="comments-reply-area">' + data[1] + '</div>' +
                        '<p id="subrplttl' + data[3] + '">' + data[2] + '</p>' +
                        ' <div class="replay-form"><p class="text-right"><button class="replay-btn-edit2">Edit <i class="fa fa-edit"></i></button><button class="replay-btn-delete2">Remove <i class="fa fa-trash"></i></button></p>' +
                        '<form action="" method="POST" class="subreply-edit">' +
                        '{{csrf_field()}}' +
                        '<div class="form-group">' +
                        '<input type="hidden" name="subreply_id" value="' + data[3] + '">' +
                        '<input type="text" id="editsubrpl' + data[3] + '" name="text" class="form-control"' + 'placeholder="Edit Your Reply..." required="">' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">' + 'Update</button>' +
                        '</div>' +
                        '</form>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                    //-----------SUB REPLY button details-----------
                    $("#txtrpl" + rid).prop('disabled', false);
                    $("#txtrpl" + rid).val("");
                    $('.hvr-shutter-out-horizontal').prop('disabled', false);
                }
            });
            return false;
        });
        //***************************** SUB REPLY ENDS******************************

        $(document).on("click", ".replay-btn-edit", function () {
            $(this).parent().parent().parent().find('.comment-edit').slideToggle();
        });

        //*****************************SUB REPLY******************************
        $(document).on("submit", ".comment-edit", function () {
            var cid = $(this).find('input[name=comment_id]').val();
            var text = $(this).find('input[name=text]').val();
            $(this).find('input[name=text]').prop('disabled', true);
            $('.hvr-shutter-out-horizontal').prop('disabled', true);
            $.ajax({
                type: 'post',
                url: "{{URL::to('json/comment/edit')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'cid': cid,
                    'text': text
                },
                success: function (data) {
                    $("#cmntttl" + cid).html(data);
                    $("#editcmnt" + cid).prop('disabled', false);
                    $("#editcmnt" + cid).val("");
                    $('.hvr-shutter-out-horizontal').prop('disabled', false);
                }
            });
            return false;
        });

    </script>

    <script type="text/javascript">
        $(document).on("click", ".replay-btn-delete", function () {
            var id = $(this).parent().next().find('input[name=comment_id]').val();
            $("#comment" + id).hide('slow');
            var count = parseInt($("#cmnt_count").html());
            count--;
            if (count <= 1) {
                $("#cmnt-text").html("COMMENT (<span id='cmnt_count'>" + count + "</span>)");
            }
            else {
                $("#cmnt-text").html("COMMENTS (<span id='cmnt_count'>" + count + "</span>)");
            }
            $.ajax({
                type: 'get',
                url: "{{URL::to('json/comment/delete')}}",
                data: {'id': id}
            });
        });
    </script>


    <script type="text/javascript">
        $(document).on("click", ".replay-btn-edit1", function () {
            $(this).parent().parent().parent().find('.reply-edit').slideToggle();
        });

        //*****************************SUB REPLY******************************
        $(document).on("submit", ".reply-edit", function () {
            var cid = $(this).find('input[name=reply_id]').val();
            var text = $(this).find('input[name=text]').val();
            $(this).find('input[name=text]').prop('disabled', true);
            $('.hvr-shutter-out-horizontal').prop('disabled', true);
            $.ajax({
                type: 'post',
                url: "{{URL::to('json/reply/edit')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'cid': cid,
                    'text': text
                },
                success: function (data) {
                    $("#rplttl" + cid).html(data);
                    $("#editrpl" + cid).prop('disabled', false);
                    $("#editrpl" + cid).val("");
                    $('.hvr-shutter-out-horizontal').prop('disabled', false);
                }
            });
            return false;
        });

    </script>

    <script type="text/javascript">
        $(document).on("click", ".replay-btn-delete1", function () {
            var id = $(this).parent().next().find('input[name=reply_id]').val();
            $("#reply" + id).hide('slow');
            $.ajax({
                type: 'get',
                url: "{{URL::to('json/reply/delete')}}",
                data: {'id': id}
            });
        });
    </script>

    <script type="text/javascript">
        $(document).on("click", ".replay-btn-edit2", function () {
            $(this).parent().parent().parent().find('.subreply-edit').slideToggle();
        });

        //*****************************SUB REPLY******************************
        $(document).on("submit", ".subreply-edit", function () {
            var cid = $(this).find('input[name=subreply_id]').val();
            var text = $(this).find('input[name=text]').val();
            $(this).find('input[name=text]').prop('disabled', true);
            $('.hvr-shutter-out-horizontal').prop('disabled', true);
            $.ajax({
                type: 'post',
                url: "{{URL::to('json/subreply/edit')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'cid': cid,
                    'text': text
                },
                success: function (data) {
                    $("#subrplttl" + cid).html(data);
                    $("#editsubrpl" + cid).prop('disabled', false);
                    $("#editsubrpl" + cid).val("");
                    $('.hvr-shutter-out-horizontal').prop('disabled', false);
                }
            });
            return false;
        });

    </script>

    <script type="text/javascript">
        $(document).on("click", ".replay-btn-delete2", function () {
            var id = $(this).parent().next().find('input[name=subreply_id]').val();
            $("#subreply" + id).hide('slow');
            $.ajax({
                type: 'get',
                url: "{{URL::to('json/subreply/delete')}}",
                data: {'id': id}
            });
        });
    </script>

@endsection