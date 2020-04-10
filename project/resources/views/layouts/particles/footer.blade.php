<!-- Vendor Form Modal Start -->
{{--@dd(Session::get('cart')->items)--}}
<div class="modal fade in" id="vendorloginModal" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="margin-right:10px;">
                <button type="button" class="close" data-dismiss="modal">×</button>

            </div>

            <div class="modal-body">
                <div class="row" style="margin: 15px;">
                    <div class="login-tab">
                        <ul class="nav nav-tabs">
                            <li class=""><a data-toggle="tab" href="#login111" aria-expanded="false">Sign In</a></li>
                            <li class="active"><a data-toggle="tab" href="#signup111" aria-expanded="true">Merchant Registration</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="login111" class="tab-pane fade">
                                <div class="login-title text-center">
                                    <h3>Merchant Sign In</h3>
                                </div>

                                <div class="login-form">
                                    <form action="{{route('user-login-submit')}}" method="POST">
                                        {{csrf_field()}}

                                        <div class="form-group ">
                                            <label for="login_email11">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="login_email11" placeholder="Email Address" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="login_pwd11">Password</label>
                                            <input type="password" name="password" class="form-control" id="login_pwd11" placeholder="Password" required="">
                                        </div>
                                        <button type="submit" class="btn btn-default btn-block">LOGIN</button>
                                    </form>
                                </div>
                            </div>

                            <div id="signup111" class="tab-pane fade active in">
                                <div class="login-title text-center">
                                    <h3>Merchant Registration</h3>
                                </div>

                                <div class="login-form">
                                    <form action="{{route('vendor.registration')}}" method="POST">
                                        {{csrf_field()}}

                                        <div class="form-group ">
                                            <label for="reg_email11">Email Address <span>*</span></label>
                                            <input class="form-control" placeholder="Email Address" type="email" name="email" id="reg_email11" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="reg_name11">Full Name <span>*</span></label>
                                            <input class="form-control" placeholder="Full Name" type="text" name="name" id="reg_name11" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="reg_Pnumber11">Phone Number <span>*</span></label>
                                            <input class="form-control" placeholder="Phone Number" type="text" name="phone" id="reg_Pnumber11" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="reg_Padd11">Address <span>*</span></label>
                                            <input class="form-control" placeholder="Address" type="text" name="address" id="reg_Padd11" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="v1">Shop Name <span>*</span></label>
                                            <input type="text" class="form-control" name="shop_name" id="v1" placeholder="Shop Name" required="">

                                        </div>
                                        <div class="form-group ">
                                            <label for="v2">Owner Name <span>*</span></label>

                                            <input type="text" class="form-control" name="owner_name" id="v2" placeholder="Owner Name" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="v3">Shop Contact Number <span>*</span></label>
                                            <input type="text" class="form-control" name="shop_number" id="v3" placeholder="Shop Contact Number" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="v4">Shop Address <span>*</span></label>
                                            <input type="text" class="form-control" name="shop_address" id="v4" placeholder="Shop Address" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="v5">Registration Number <span>*</span><span style="font-size: 10px;">(This Field is Optional)</span></label>
                                            <input type="text" class="form-control" name="reg_number" id="v5" placeholder="Registration Number">
                                        </div>
                                        <div class="form-group ">
                                            <label for="v6">Message *<span style="font-size: 10px;">(This Field is Optional)</span></label>

                                            <textarea class="form-control" id="v6" name="shop_message" placeholder="Message" rows="10"></textarea>
                                        </div>
                                        <div class="form-group ">
                                            <label for="reg_password11">Password <span>*</span></label>
                                            <input class="form-control" placeholder="Password" type="password" name="password" id="reg_password11" required="">
                                        </div>
                                        <div class="form-group ">
                                            <label for="confirm_password11">Confirm Password <span>*</span></label>
                                            <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="confirm_password11" required="">
                                        </div>
                                        <input type="hidden" name="wish" value="1">
                                        <button type="submit" class="btn btn-default btn-block">Sign Up</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor Form Modal End -->
<!-- Single Page Cart End -->

<!-- Single Page Cart Start (When a user will click it, then it'll be invisible and cart popup visible.) -->
<div class="spc-wrap" style="display:{{ (request()->is('checkout')) ? 'none' : '' }} {{ (request()->is('payment')) ? 'none' : '' }}">
    <div class="spc-btn">
        <div class="spc-btn-item-count">
            <img src="{{asset('assets/front/images/paper-bag.svg')}}" alt="Cart">
            <p>
                <span><span class="spc_cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span>  Item</span>
            </p>
        </div>
        <div class="spc-btn-total-count">
            @if($gs->sign == 0)
                <span>{{$curr->sign}}</span>
                <span class="total-value spc_total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>
               @else
                <span class="total-value spc_total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span>
                <span>{{$curr->sign}}</span>
            @endif
        </div>
    </div>
</div>
<!-- Single Page Cart End (When a user will click it, then it'll be invisible and cart popup visible.) -->

<!-- Single page cart nav -->
<div class="spc-nav-wrap " style="display:{{ (request()->is('checkout')) ? 'block' : '' }} {{ (request()->is('payment')) ? 'block' : '' }}">
    <div class="spc-nav-inner">
        <!-- Single page cart nav Top Start -->
        <div class="spc-nav-cart-top">
            <div class="spc-nav-cart-item">
                <img src="{{asset('assets/front/images/paper-bag.svg')}}" alt="Cart">
                <span><span class="spc_cart-quantity">{{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}</span> Item</span>
            </div>
            <div class="spc-nav-cart-close">
                <span>close</span>
            </div>
        </div>
        <!-- Single page cart nav Top End -->

        <!-- Single page cart nav Offer Start -->
        <div class="spc-nav-cart-offer" data-toggle="modal" data-target="#spcNavCartOfferModal">
            <div class="spc-nav-cart-offer-text">
                <p>Shop <span>৳</span>1000 more and save <span>৳</span>20 fee</p>
            </div>
            <div class="spc-nav-cart-offer-info">
                <p><span>৳</span>50 <i class="fas fa-info-circle"></i></p>
            </div>
        </div>
        <!-- Single page cart nav Offer End -->

        <!-- Single page cart nav Express Delivery Start -->
        <div class="spc-nav-cart-delivery">
            <div class="spc-nav-cart-delivery-icon">
                <svg version="1.1" x="0px" y="0px" viewBox="-9 11 100 100"><path class="st0" d="M59.4,32.6c0.2,0.2-0.2,0.3-0.2,0.3s-1.2,0.3-1.5,0.8c-0.3,0.3-0.8,1.5-0.8,1.5c0.7-0.2,1.5-0.3,2.3-0.7 c0.2,0,0.3,0.2,0.5,0.3c0.2,0-2,0.8-2.5,1.2c-0.3,0.3-2,1.7-2.5,1.7S53,37.9,53,37.9c0.2,0.3,0.3,0.7,0.7,1.2c0,0-1.2,0.7-1.2,0.8 c-0.2,0.2-1,1.2-1,1.2s3,0.3,4-1.3c-1,1.7-3.3,3.3-8.2,3.3c-5,0-9-2-11.7-3c-2.8-1.2-6.5-2.5-9.5-2.5c-2.8,0-6.2,0.8-8.4,2.9 c-3.9-1.5-9.2-0.7-11.7,1.7c-2.3,2.3-4.7,5.2-5,7.2c-0.5,2.2-1.7,7.4-3.3,9.7c-2.3,3.8-5,4.8-5.9,6.5c-0.8,1.7-0.8,5.2-0.7,5.2 c0.3,0.2,1.5,0,2.2-0.3c1.3-0.5,5-4.3,6.4-6.2c1.3-1.8,5.9-9.9,6.5-12.7c0.7-2.8,1.3-5.7,3.3-7.2c2.2-1.5,4.8-0.8,4.8-0.7 c0,0-2.5,2-2.7,7.5c-0.2,5.5,3.2,4.9,1.5,8.4c-1.7,3-6.7,1-8.4,2.8c-1.3,1.5,0,6.9,0,7.9c0,1-0.5,5.7-0.8,6.9c-0.2,1,0,1.7-0.2,2.3 c-0.2,0.5,1,0.7,1,0.7s-1,1.3-1.5,1c-0.5-0.2-0.8-0.2-1.2,0c-0.3,0-1,0.3-1.7,0l-2.7,5.7c0.3,0.2,0.8,0.3,1.3,0.2 c0.7-0.2,4-1.7,4.4-2c0.5-0.2,3.3-1.8,3.8-2.8c0.3-1,1-4.2,1-5.2c0.2-1,0.3-4.2,0.3-5c0-0.8-0.2-2.3,0-3c0.3-0.5,0.8-1.2,1.5-1.5 c0.8-0.2,1.8-0.2,2-0.2c0.3,0,3.2,0.3,3.7,0.3c0.7,0,3.3-0.5,4-0.8c0.8-0.2,1.3,0,1.5,0.3c0.3,0.3-0.3,0.8-0.3,1 c-0.2,0.2-1.5,1.8-1.8,2.5c-0.3,0.8-1.5,2.3-1.2,3c0.3,0.7,0.3,0.8,1.3,1.3c1,0.3,4.9,2.3,7,4.3c2.3,2.2,4.5,4.8,4.9,6.2 c0.5,1.5,1.3,1.7,1.8,1.7c0.5,0.2,1.5,0.3,1.5,1c0,0.7-0.2,1.5-0.2,1.5l6.2,2.3c0,0,0-2.2-0.2-3c-0.2-1-1.2-2-2-3 c-0.8-1.2-9.5-9.7-10.4-10.4c-0.8-0.5-1.5-1.2-1.7-2.5c-0.2-1.3,1.5-2.3,2.5-3.5c0.7-0.8,2.5-4.7,2.8-5.2c0.3-0.5,1.5-1.8,2.2-1.8 c0.8,0,2.7,1.2,5,2c1,0.3,8.2,2.2,9.2,2.5c1,0.2,3.2,0,3.8,0.7c0.7,0.5,0,1.8-0.2,2.7c-0.2,1-2,4.7-2,4.7s0.3,1.3,0.3,2.4 c0,1.2-0.5,5.3-1,6.7c-0.3,1.5-2.7,5.4-3.2,6c-0.3,0.5-0.8,0.8-0.8,1.7c0,0.8,1.5,1,2,1.7c0.7,0.5,0.2,1.5,0,2.5l6.7,2.8 c0-0.5,0.3-1.3,0-1.7c-0.2-0.5-1-1.5-1.5-2.2c-0.3-0.5-1.5-2.3-1.8-2.7c-0.3-0.5-0.3-1.5,0-2.3c0.2-0.8,2.3-6.5,2.5-7.2 c0.3-0.8,3.5-7.5,3.8-8.4c0.3-1,3-5.9,3.3-6.7c0.3-1,2.5-1.8,3.2-1.8c0.8,0,5,1.5,5.7,1.8c0.5,0.2,4.4,1.8,5,2.2 c0.8,0.3,0.3,1-0.2,1.2c-0.5,0.3-6.7,4.5-7.2,4.7c-0.5,0.2-1,0.7-1.3,0.7c-0.5,0-1.2,0.5-1.2,0.7c0,0.3-0.2,1-1,1c-0.7,0-2-1-2.8-2 c-1.2,0.7-2,1.2-2.5,2.2c-0.8,0.8-1.2,1.5-1.7,2.7c0.3,0.3,1,0.5,1.5,0.5h5.4c0.5,0,1.2-0.2,1.7-0.3c0.5-0.3,13.7-9,13.7-9 s2.2-1.7,2.2-3.2c0-1.2-1-1.5-1.3-2c-0.5-0.3-3.5-2.3-4-2.7c-0.7-0.5-3-1.8-3.7-2.2c-0.5-0.3-2.4-1-2.4-1c0.5-1.5,0.8-2.7,1-3 c0.2-0.3,0.2-3.4,0.3-3.9c0-0.5,0.8-2.7,1.2-3c0.3-0.3,1.2-3,1.3-3.5c0.2-0.3,1.5-4.2,2.2-4.2c0.7-0.2,1.3,0.5,2,0.5 c0.7,0.2,3.2-0.2,4.5,0c1.2,0.2,2.7,1.7,3,1.8c0.5,0.2,1.7,0.7,2,0.7c0.2,0,1.8-1.2,1.8-1.5c0-0.3-1.2-1-1.3-1 c-0.2-0.2-1.3-0.8-1.3-0.8c0,0.2,0.5-0.3,1.3-0.3c0.7,0,1.3,0.7,1.5,0.8c0.3,0.2,1.2,0.7,1.3,0.3c0.2-0.2,0.8-1,0.8-1.5 c0-0.7-0.7-1.5-1-1.8c-0.3-0.3-4.2-4-4.5-4.2c-0.5-0.2-2.5-2-2.5-2.5c-0.2-0.3-1.2-1.2-1.3-1.3c-0.2-0.2-5.2-3.7-5.9-4.2 c-0.7-0.5-1.3-1.3-1.3-2.2c0-0.8-0.3-3-0.3-3s-1.2-0.2-1.7,0.3c-0.5,0.3-1.7,3-2.3,3c-1.8-0.3-4.2,0.2-4.2,0.5 c0.2,0.5,1.8,0.2,1.8,0.2c0,0.2-0.7,1-1.2,1c-0.3,0-1.3,0.3-1.5,0.5c-0.3,0-1,0.5-1,0.5c0.5,0,1,0,1.7,0.2c0,0-1,0.7-1.5,0.7 c-0.5,0-2.2,0.5-2.7,0.7c-0.3,0.3-1.7,1.3-1.7,1.3h-1.5l0.2,0.3h0.8L59.4,32.6L59.4,32.6z"></path></svg>
            </div>
            <span>Express delivery</span>
        </div>
        <!-- Single page cart nav Express Delivery Start -->
        <div class="spc_cart">
        <!-- Single page cart nav Order Item Start-->
        @if(Session::has('cart'))

            @forelse(Session::get('cart')->items as $product)
        <div class="spc-nav-cart-order-item" id="spc_del{{$product['item']['id']}}">
            <div class="quantity">
                <button class="caret-up adding" title="Add one more to bag">
                    <i class="fas fa-angle-up"></i>
                </button>
                <span class="quantity-value" id="spc_qty{{$product['item']['id']}}">{{$product['qty']}}</span>
                <input type="hidden" value="{{$product['item']['id']}}">
                <button class="caret-down reducing" title="Remove one from bag">
                    <i class="fas fa-angle-down"></i>
                </button>
            </div>
            <input type="hidden" id="spc_stock{{$product['item']['id']}}" value="{{$product['stock']}}">
            <div class="product-img">
                <img src="{{ asset('assets/images/'.$product['item']['photo']) }}" alt="Product Image">
            </div>

            <div class="product-name">
                <span>{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</span>
                <div class="product-price">
                    @if($gs->sign == 0)
                        <span>{{$curr->sign}}</span> <span >{{round($product['item']->cprice * $curr->value , 2) }}</span>
                    @else
                        <span id="spc_prc{{$product['item']['id']}}"> {{round($product['item']->cprice * $curr->value , 2) }}</span><span>{{$curr->sign}}</span>
                    @endif

                </div>
            </div>
            <div class="total-amount">
                <p>
                    @if($gs->sign == 0)
                    <span>{{$curr->sign}}</span><span id="spc_prc{{$product['item']['id']}}"> {{ round($product['price']* $curr->value,2)}}</span>
                    @else
                        <span id="spc_prc{{$product['item']['id']}}">  {{ round($product['price']*$curr->value,2)}}</span><span>{{$curr->sign}}</span>

                    @endif
                </p>

                {{--<p class="previous-price"><del><span>৳</span> 800</del></p>--}}

                <div class="remove-item-wrap" onclick="spc_remove({{$product['item']['id']}})" title="Remove from bag"></div>
            </div>

            <hr>
        </div>
        @empty
                <div class="spc-nav-cart-empty d-none">
                    <div class="spc-nav-cart-empty-img">
                        <img src="{{asset('assets/front/images/empty-shopping-bag.svg')}}" alt="Empty">
                    </div>
                    <p>Your shopping bag is empty. Start shopping now.</p>
                </div>
                @endforelse
    @endif
        </div>
        <!-- Single page cart nav Order Item End -->

        <!-- Single page cart nav Empty Item Start (When cart item exists then it'll be invisible)-->

        <!-- Single page cart nav Empty Item End (When cart item exists then it'll be invisible)-->

        <!-- Single page cart nav bottom Start-->
        <div class="spc-nav-cart-bottom-wrap">

            <div class="spc-nav-cart-bottom-inner">
                <!-- Single page cart nav Discount Start-->
                <div class="spc-nav-cart-order-discount-wrap">
                    <div class="spc-nav-cart-order-discount-inner">
                        <button class="spc-nav-cart-order-discount-btn collapsible">
                            <span>Have a special code?</span>
                        </button>

                        <div class="discountContent">
                            <div class="discountContent-inner">
                                <form class="form-inline" >
                                    <input type="text" id="spc_code" class="form-control discountContent-input" placeholder="Special Code">

                                    <button type="button" class="discountContent-go" id="spc_coupon_btn">Go</button>
                                    <button type="submit" class="discountContent-close">Close</button>
                                </form>

                               {{-- <form id="coupon">
                                    <div class="form-group">
                                        <label for="code">{{$lang->cpn}} <span>*</span></label>
                                        <input type="text" class="form-control" id="code" value="" placeholder="{{$lang->ecpn}}"
                                               required="" autocomplete="off">
                                        <input type="hidden" id="">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-md order-btn" type="submit" value="{{$lang->acpn}}">
                                    </div>
                                </form>--}}

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single page cart nav Discount End-->

                <!-- Single page cart nav Please Order bottom Start (It'll be visible when at least one item in card) -->
                <div class="spc-nav-cart-plz-order-btn-wrap">
                    <div class="spc-nav-cart-plz-order-btn-inner">
                        <button class="spc-nav-cart-plz-order-btn" onclick="window.location.replace('{{route('front.checkout')}}')">
                            <span>Please Order</span>
                            @if($gs->sign == 0)
                                <span > {{$curr->sign}}<span class="spc_total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }}</span></span>
                                @else
                                <span><span class="spc_total">{{ Session::has('cart') ? round(Session::get('cart')->totalPrice * $curr->value , 2) : '0.00' }} </span>{{$curr->sign}}</span>
                            @endif

                        </button>
                    </div>
                </div>
                <!-- Single page cart nav Please Order bottom End -->

                <!-- When Empty Cart Item Phone Number is visible -->
                @if($gs->phone != null)
                <div class="spc-nav-cart-phone-no text-center py-3">
                    <span><i class="fa fa-phone"></i> {{$gs->phone}}</span>
                </div>
            @endif
                <!-- When Empty Cart Item Phone Number is visible -->

            </div>
        </div>
        <!-- Single page cart nav bottom End-->

        <!-- Angel Close Button Start -->
        <div class="spc-nav-arrow-wrap"></div>
        <!-- Angel Close Button End -->
    </div>
</div>
<!-- Single page cart nav -->

<!-- Single page cart info modal -->
<div class="modal fade" id="spcNavCartOfferModal" tabindex="-1" role="dialog" aria-labelledby="spcNavCartOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="spcNavCartOfferModal-header">
                    What is your delivery charge policy?
                </div>

                <div class="spcNavCartOfferModal-des">
                    We charge <span>৳</span> 50 delivery fee for in side Dhaka orders below <span>৳</span> 1000, and <span>৳</span> 30 delivery fee for all other orders.
                </div>

                <div class="spcNavCartOfferModal-exp">
                  For Dhaka
                </div>

                <div class="spcNavCartOfferModal-exp-2">
                    <p>30 fee on orders of above </p>
                    <p><span>৳</span> 1000 <i class="fas fa-info-circle"></i></p>
                </div>

                <div class="spcNavCartOfferModal-exp-3">
                  Out Side of Dhaka
                </div>

                <div class="spcNavCartOfferModal-exp-4">
                    <p>80 fee on orders of above </p>
                    <p><span>৳</span> 1000 <i class="fas fa-info-circle"></i></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Starting of Scroll to Top Area -->
<a href="#" class="scrollup" style="display: flex;align-items: center;justify-content: center; z-index: 1;">
    <i class="fa fa-angle-double-up"></i>
</a>
<!-- Ending of Scroll to Top Area -->

<!-- jQuary Library -->
<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>

<!--Bootstrap Min JS-->
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>

<!--Zoom JQuery-->
<script src="{{asset('assets/front/js/jquery.zoom.js')}}"></script>

<!--Zoom active JS-->
<script src="{{asset('assets/front/js/zoom-active.js')}}"></script>

<!--Flickity Silder JS-->
{{--<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>--}}

<!--Owl Carousel JS-->
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>

<!--Wow JS-->
<script src="{{asset('assets/front/js/wow.js')}}"></script>

<!--SlickNav Menu JS-->
<script src="{{asset('assets/front/js/jquery.slicknav.min.js')}}"></script>

<!--Mean Menu JS-->
<script src="{{asset('assets/front/js/jquery.meanmenu.min.js')}}"></script>

<!--Countdown JS-->
<script src="{{asset('assets/front/js/countdown.js')}}"></script>

<!--Fancybox JS-->
<script src="{{asset('assets/front/js/fancybox.js')}}"></script>

<!--Bootstrap Slider JS-->
<script src="{{asset('assets/front/js/bootstrap-slider.min.js')}}"></script>

<!--Genious-home Carousel JS-->
<script src="{{asset('assets/front/js/genius-slider.js')}}"></script>

<!--Notify JS-->
<script src="{{asset('assets/front/js/notify.js')}}"></script>

<!--Easy Zoom JS-->
{{--<script src="{{asset('assets/front/js/easyzoom.min.js')}}"></script>--}}

<!-- Zoomsl JS-->
{{--<script src="{{asset('assets/front/js/zoomsl-3.0.min.js')}}"></script>--}}

<!-- Zoomsl JS-->
<script src="{{asset('assets/front/js/xzoom.min.js')}}"></script>

<!-- Flickity JS -->
<script src="{{asset('assets/front/js/flickity.pkgd.min.js')}}"></script>

<!-- Google Main JS(all jQuary activation code here and always it will be bottom of all script tag) -->
<script src="{{asset('assets/front/js/main.js')}}"></script>
<script src="{{asset('assets/front/js/app.js')}}"></script>
{{--<script src="{{asset('assets/front/js/custom.js')}}"></script>--}}

{!! $seo->google_analytics !!}
<script type="text/javascript">
    $(document).on("click", ".adding" , function(){
        var spc_pid =  $(this).parent().find('input[type=hidden]').val();
        var spc_stck = $("#spc_stock"+spc_pid).val();
        var spc_qty = $("#spc_qty"+spc_pid).html();
        if(spc_stck != "")
        {
            var stk = parseInt(spc_stck);
            if(spc_qty <= stk)
            {
                spc_qty++;
                $("#spc_qty"+spc_pid).html(spc_qty);
            }
        }
        else{
            spc_qty++;
            $("#spc_qty"+spc_pid).html(spc_qty);
        }
        $.ajax({
            type: "GET",
            url:"{{URL::to('/json/addbyone')}}",
            data:{id:spc_pid},
            success:function(data){
                if(data == 0)
                {
                }
                else
                {
                    $(".spc_total").html((data[0] * {{$curr->value}}).toFixed(2));
                    $(".spc_cart-quantity").html(data[3]);
                    $(".cart-quantity").html(data[3]);
                    $("#spc_cqty"+spc_pid).val("1");
                    $("#spc_prc"+spc_pid).html((data[2] * {{$curr->value}}).toFixed(2));
                    $("#spc_prct"+spc_pid).html((data[2] * {{$curr->value}}).toFixed(2));
                    $("#spc_cqt"+spc_pid).html(data[1]);
                    $("#spc_qty"+spc_pid).html(data[1]);
                }
            }
        });
    });

    $(document).on("click", ".reducing" , function(){
        var id =  $(this).parent().find('input[type=hidden]').val();
        var spc_stck = $("#spc_stock"+id).val();
        var spc_qty = $("#spc_qty"+id).html();
        spc_qty--;
        if(spc_qty < 1)
        {
            $("#spc_qty"+id).html("1");
        }
        else{
            $("#spc_qty"+id).html(spc_qty);
            $.ajax({
                type: "GET",
                url:"{{URL::to('/json/reducebyone')}}",
                data:{id:id},
                success:function(data){
                    $(".spc_total").html((data[0] * {{$curr->value}}).toFixed(2));
                    $(".spc_cart-quantity").html(data[3]);
                    $(".cart-quantity").html(data[3]);
                    $("#spc_cqty"+id).val("1");
                    $("#spc_prc"+id).html((data[2] * {{$curr->value}}).toFixed(2));
                    $("#spc_prct"+id).html((data[2] * {{$curr->value}}).toFixed(2));
                    $("#spc_cqt"+id).html(data[1]);
                    $("#spc_qty"+id).html(data[1]);
                }
            });
        }
    });

    function spc_remove(id) {
        $("#spc_del" + id).hide();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/json/removecart')}}",
            data: {id: id},
            success: function (data) {
                $(".spc_total").html((data[0] * {{$curr->value}}).toFixed(2));
                $(".spc_cart-quantity").html(data[2]);
                $(".cart-quantity").html(data[2]);
                var arr = $.map(data[1], function (el) {
                    return el
                });
                if (data[1] == null) {
                    $(".spc_total").html("0.00");
                    $(".spc_cart-quantity").html("0");
                    $(".cart-quantity").html("0");
                }
                $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                $(".spc_total").html((data[0] * {{$curr->value}}).toFixed(2));
                $(".cart-quantity").html(data[2]);
                $(".spc_cart-quantity").html(data[2]);
                var arr = $.map(data[1], function (el) {
                    return el
                });
                $(".spc_cart").html("");

                if(arr.length > 0){
                    for (var k in arr) {

                        var html = makeCartItem(arr,k)

                        $(".spc_cart").append(html);
                    }
                }else{
                    var html = ' <div class="spc-nav-cart-empty">\n' +
                        '                    <div class="spc-nav-cart-empty-img">\n' +
                        '                        <img src="{{asset('assets/front/images/empty-shopping-bag.svg')}}" alt="Empty">\n' +
                        '                    </div>\n' +
                        '                    <p>Your shopping bag is empty. Start shopping now.</p>\n' +
                        '                </div>';
                    $(".spc_cart").html(html);
                }
            }
        });

    }


    function makeCartItem(arr,k){
        var x = arr[k]['item']['name'];
        var p = x.length > 30 ? x.substring(0, 30) + '...' : x;

        var html = ' <div class="spc-nav-cart-order-item" id="spc_del'+arr[k]['item']['id']+'">\n' +
            '            <div class="quantity">\n' +
            '                <button class="caret-up adding" title="Add one more to bag">\n' +
            '                    <i class="fas fa-angle-up"></i>\n' +
            '                </button>\n' +
            '                <span class="quantity-value" id="spc_qty'+arr[k]['item']['id']+'">'+arr[k]['qty']+'</span>\n' +
            '                <input type="hidden" value="'+arr[k]['item']['id']+'">\n' +
            '                <button class="caret-down reducing" title="Remove one from bag">\n' +
            '                    <i class="fas fa-angle-down"></i>\n' +
            '                </button>\n' +
            '            </div>\n' +
            '            <input type="hidden" id="spc_stock'+arr[k]['item']['id']+'" value="'+arr[k]['stock']+'">\n' +
            '            <div class="product-img">\n' +
            '                <img src="{{ asset('/')}}/assets/images/'+arr[k]['item']['photo']+'" alt="Product Image">\n' +
            '            </div>\n' +
            '\n' +
            '            <div class="product-name">\n' +
            '                <span>'+p+'</span>\n' +
            '                <div class="product-price">\n' +
            '                        <span>{{$curr->sign}}</span> <span >'+(arr[k]['item']['cprice'] * {{$curr->value}}).toFixed(2)+'</span>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '            <div class="total-amount">\n' +
            '                <p><span>{{$curr->sign}}</span> <span id="spc_prc'+arr[k]['item']['id']+'">'+(arr[k]['price'] * {{$curr->value}}).toFixed(2)+'</span></p>\n' +
            '\n' +
            '                {{--<p class="previous-price"><del><span>৳</span> 800</del></p>--}}\n' +
            '\n' +
            '                <div class="remove-item-wrap" onclick="spc_remove('+arr[k]['item']['id']+')" title="Remove from bag"></div>\n' +
            '            </div>\n' +
            '\n' +
            '            <hr>\n' +
            '        </div>';
            return html;
    }
    $(document).on("click", "#addcrt", function () {
        var qty = $("#qval").html();
        var pid = $("#pid").val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/json/addnumcart')}}",
            data: {id: pid, qty: qty, size: sizes, color: colors},
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    $.notify("{{$gs->cart_error}}", "error");
                }else if(data == 3){
                    $.notify("Don't start Exclusive offer", "error");
                }else if(data == 4){
                    $.notify("Time out offer Exclusive offer", "error");
                }else if(data == 5){
                    $.notify("Please after login for Exclusive offer", "error");
                }else if(data == 6){
                    $.notify("Only one time for Exclusive offer", "error");
                }
                else {
                    $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                    $(".spc_total").html((data[0] * {{$curr->value}}).toFixed(2));
                    $(".cart-quantity").html(data[2]);
                    $(".spc_cart-quantity").html(data[2]);
                    var arr = $.map(data[1], function (el) {
                        return el
                    });
                    $(".spc_cart").html("");
                    if(arr.length > 0){
                        for (var k in arr) {

                            var html = makeCartItem(arr,k)

                            $(".spc_cart").append(html);
                        }
                    }else{
                        var html = ' <div class="spc-nav-cart-empty d-none">\n' +
                            '                    <div class="spc-nav-cart-empty-img">\n' +
                            '                        <img src="{{asset('assets/front/images/empty-shopping-bag.svg')}}" alt="Empty">\n' +
                            '                    </div>\n' +
                            '                    <p>Your shopping bag is empty. Start shopping now.</p>\n' +
                            '                </div>';
                        $(".spc_cart").html(html);
                    }

                    $.notify("{{$gs->cart_success}}", "success");
                    $("#qval").html("1");
                }
            }
        });

    });
    $(document).on("click", "#buy_now", function () {
        var qty = $("#qval").html();
        var pid = $("#pid").val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/json/addnumcart')}}",
            data: {id: pid, qty: qty, size: sizes, color: colors},
            success: function (data) {
                if (data == 0) {
                    $.notify("{{$gs->cart_error}}", "error");
                }else if(data == 3){
                    $.notify("Don't start Exclusive offer", "error");
                }else if(data == 4){
                    $.notify("Time out offer Exclusive offer", "error");
                }else if(data == 5){
                    $.notify("Please after login for Exclusive offer", "error");
                }else if(data == 6){
                    $.notify("Only one time for Exclusive offer", "error");
                }
                else {
                    $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                    $(".spc_total").html((data[0] * {{$curr->value}}).toFixed(2));
                    $(".cart-quantity").html(data[2]);
                    $(".spc_cart-quantity").html(data[2]);
                    var arr = $.map(data[1], function (el) {
                        return el
                    });
                    $(".spc_cart").html("");
                    if(arr.length > 0){
                        for (var k in arr) {

                            var html = makeCartItem(arr,k)

                            $(".spc_cart").append(html);
                        }
                    }else{
                        var html = ' <div class="spc-nav-cart-empty d-none">\n' +
                            '                    <div class="spc-nav-cart-empty-img">\n' +
                            '                        <img src="{{asset('assets/front/images/empty-shopping-bag.svg')}}" alt="Empty">\n' +
                            '                    </div>\n' +
                            '                    <p>Your shopping bag is empty. Start shopping now.</p>\n' +
                            '                </div>';
                        $(".spc_cart").html(html);
                    }

                    $.notify("{{$gs->cart_success}}", "success");
                    $("#qval").html("1");
                    window.location.replace('{{route('front.checkout')}}')
                }
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).on('click','#spc_coupon_btn',function () {
        var val = $("#spc_code").val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/json/coupon')}}",
            data: {code: val},
            success: function (data) {
                if (data == 0) {
                    $.notify("{{$gs->no_coupon}}", "error");
                    $("#spc_code").val("");
                } else if (data == 2) {
                    $.notify("{{$gs->coupon_already}}", "error");
                    $("#spc_code").val("");
                } else {
                    $.notify("{{$gs->coupon_found}}", "success");
                    $("#spc_code").val("");
                }
            }
        });
    });

</script>
<!-- ========================================== -->
<!--    SINGLE PAGE CHECKOUT ALL SCRIPTS HERE   -->
<!-- ========================================== -->
<!-- Discount Expand Script of SPC -->
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var discountContent = this.nextElementSibling;
            if (discountContent.style.display === "block") {
                discountContent.style.display = "none";
            } else {
                discountContent.style.display = "block";
            }
        });
    }

    $( document ).ready(function() {
        $('.discountContent-close').on('click', function(e) {
            e.preventDefault();
            $('.discountContent').css('display', 'none');
        });

        $('.spc-nav-arrow-wrap, .spc-nav-cart-close').on('click', function () {

            $('.spc-nav-wrap').fadeOut(800);
            $('.spc-wrap').fadeIn(500);
            $('.spc-wrap').css('display', 'block');

        });

        $('.spc-wrap').on('click', function() {
            $('.spc-nav-wrap').fadeIn(800);
            $('.spc-nav-wrap').css('display', 'block');
            $(this).fadeOut(500);
            $(this).css('display', 'none');
        });
        $('.myCart1').on('click', function() {
            spc_toggle();
        });
        function spc_toggle(){
            if ( $('.spc-nav-wrap').css('display') == 'none')
            {
                spc_open()
            }else{
                spc_close()
            }
        }
        function spc_open() {
            $('.spc-nav-wrap').fadeIn(800);
            $('.spc-nav-wrap').css('display', 'block');
            $('.spc-wrap').fadeOut(500);
            $('.spc-wrap').css('display', 'none');
        }
        function spc_close() {
            $('.spc-wrap').fadeIn(800);
            $('.spc-wrap').css('display', 'block');
            $('.spc-nav-wrap').fadeOut(500);
            $('.spc-nav-wrap').css('display', 'none');
        }
        function spc_empty(){
            $('.spc-nav-cart-empty').fadeIn(500);
            $('.spc-nav-cart-empty').css('display', 'block');
            $('.spc-nav-cart-order-item').fadeOut(500);
            $('.spc-nav-cart-order-item').css('display', 'none');
        }
        function spc_not_empty(){
            $('.spc-nav-cart-empty').fadeOut(500);
            $('.spc-nav-cart-empty').css('display', 'none');
            $('.spc-nav-cart-order-item').fadeIn(500);
            $('.spc-nav-cart-order-item').css('display', 'block');

        }
        // spc_not_empty();

        // spc_open();
        /*$('.remove-item-wrap').on('click', function () {
            $('.spc-nav-cart-order-item').fadeOut(500);
            $('.spc-nav-cart-order-item').css('display', 'none');
        });*/
    });


</script>


<script type="text/javascript">
    $(window).on('load', function () { // makes sure that whole site is loaded
        $('#cover').delay(350).fadeOut('slow');
    });

    // $(window).load(function () {
    //     setTimeout(function () {
    //         $('#cover').fadeOut(1000);
    //     }, 1000)
    // });
</script>

@if(Session::has('subscribe'))
    <script type="text/javascript">
        $.notify("{{ Session::get('subscribe') }}", "success");

    </script>
@endif
@foreach($errors->all() as $error)
    <script type="text/javascript">
        $.notify("{{$error}}", "error");

    </script>
@endforeach

<script type="text/javascript">
    $(".ss").keyup(function () {
        var search = $(this).val();
        if (search == "") {
            $(".header-searched-item-list-wrap").hide();
        }
        else {
            $.ajax({
                type: "GET",
                url: "{{URL::to('/json/suggest')}}",
                data: {search: search},
                success: function (data) {
                    if (!$.isEmptyObject(data)) {
                        $(".header-searched-item-list-wrap").show();
                        $(".header-searched-item-list-wrap ul").html("");
                        var arr = $.map(data, function (el) {
                            return el
                        });
                        for (var k in arr) {
                            var x = arr[k]['name'];
                            var p = x.length > 20 ? x.substring(0, 20) + '...' : x;
                            $(".header-searched-item-list-wrap ul").append(
                                '<li><a href="{{url('/')}}/product/' + arr[k]['id'] + '/' + arr[k]['name'] + '">' + p +
                                    @if($gs->sign == 0)
                                        ' - {{$curr->sign}}' + (arr[k]['cprice'] * {{$curr->value}}).toFixed(2) + '</a></li>'
                            @else
                                ' - ' + (arr[k]['cprice'] * {{$curr->value}}).toFixed(2) + '{{$curr->sign}}</a></li>'
                            @endif
                            );
                        }
                    }
                }
            })

        }
    });
</script>

<script type="text/javascript">
    function remove(id) {
        $("#del" + id).hide();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/json/removecart')}}",
            data: {id: id},
            success: function (data) {
                $(".empty").html("");
                $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                $(".cart-quantity").html(data[2]);
                $(".cart").html("");
                if (data[1] == null) {
                    $(".total").html("0.00");
                    $(".cart-quantity").html("0");
                    $(".empty").html("{{$lang->h}}");
                }

                var arr = $.map(data[1], function (el) {
                    return el
                });
                for (var k in arr) {
                    var x = arr[k]['item']['name'];
                    var p = x.length > 30 ? x.substring(0, 30) + '...' : x;
                    $(".cart").append(
                        '<div class="single-myCart">' +
                        '<div class="cart-info">' +
                        '<a href="{{url('/')}}/product/' + arr[k]['item']['id'] + '/' + arr[k]['item']['name'] + '" style="color: black; padding: 0 0;">' + '<h5>' + p + '</h5></a>' +
                        '<p class="removecart" onclick="remove(' + arr[k]['item']['id'] + ')"><i class="fa fa-close" style="cursor: pointer;"></i></p>' +
                        '</div>' +
                        '<p>{{$lang->cquantity}}: ' + arr[k]['qty'] + '</p>' +
                            @if($gs->sign == 0)
                                '<p>{{$curr->sign}}' + (arr[k]['price'] * {{$curr->value}}).toFixed(2) + '</p>' +
                            @else
                                '<p>' + (arr[k]['price'] * {{$curr->value}}).toFixed(2) + '{{$curr->sign}}</p>' +
                            @endif
                                '</div>');
                }

            }
        });

    }
</script>

<script type="text/javascript">
    $(document).on("click", ".wish-list", function () {
        var max = '';
        var pid = $(this).parent().find('input[type=hidden]').val();
        $("#myModal .modal-content").html('');
        $.ajax({
            type: "GET",
            url: "{{URL::to('/json/quick')}}",
            data: {id: pid},
            success: function (data) {
                $("#myModal .modal-content").append('' +
                    '<div class="modal-header">' +
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
                    '</div>' +
                    '<div class="modal-body">' +
                    '<div class="row">' +
                    '<div class="col-md-3 col-sm-12">' +
                    '<div class="product-review-details-img">' +
                    '<img src="{{asset('assets/images/')}}/' + data[0] + '" alt="Product image">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-9 col-sm-12">' +
                    '<div class="product-review-details-description">' +
                    '<h3>' + data[1] + '</h3>' +
                    '<p class="modal-product-review">' +
                    '<i class="fa fa-star"></i>' +
                    '</p>' +
                    '<div class="product-price">' +
                    '<div class="single-product-price">' +
                        @if($gs->sign == 0)
                            '{{$curr->sign}}' + data[2] + ' <span>{{$curr->sign}}' + data[3] + '</span> ' +
                        @else
                            '' + data[2] + '{{$curr->sign}} <span>' + data[3] + '{{$curr->sign}}</span> ' +
                        @endif
                            '</div>' +
                    '<div class="product-availability">' +

                    '</div>' +
                    ' </div>' +
                    '<div class="product-review-description">' +
                    '<h4>{{$lang->dol}}</h4>' +
                    '<p style="text-align:justify;">' + data[4] + '</p>' +
                    '</div>' +
                    '<div class="product-size">' +
                    '</div>' +
                    '<div class="product-color">' +
                    '</div>' +
                    '<div class="product-quantity">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="modal-footer">' +
                    '</div>');

                if (data[5] == "0") {
                    $(".product-availability").append('' +
                        'Availability ' +
                        '<span style="color:red;">' +
                        '<i class="fa fa-times-circle-o"></i> ' +
                        '{{$lang->dni}}' +
                        '</span>'
                    );
                }
                else {
                    max = data[5] == 'null' ? '' : data[5];
                    $(".product-availability").append('' +
                        'Availability ' +
                        '<span style="color:green;">' +
                        '<i class="fa fa-check-square-o"></i> ' +
                        '{{$lang->sbg}}' +
                        '</span>'
                    );
                    $(".product-quantity").append('' +
                        '<form>  <label>Qty &nbsp;</label>' +
                        '<input type="number" id="mqty" class="qty" min="1" max="' + max + '" value="1" style="width: 40px;">' +
                        '</form>' +
                        '<input type="hidden" id="mid" value="' + data[7] + '">' +
                        '<a style="cursor: pointer;" class="addToCart-btn" id="maddcart">Add to Cart</a>'
                    );

                }
                if (data[6] != null) {
                    $(".product-size").append(
                        '<p>{{$lang->doo}}</p>'
                    );
                    for (var size in data[6])
                        $(".product-size").append(
                            '<span style="cursor:pointer;" class="msize">' + data[6][size] + '</span> '
                        );
                }
                if (data[8] != null) {
                    $(".product-color").append(
                        '<p>{{$lang->colors}}</p>'
                    );
                    for (var color in data[8])
                        $(".product-color").append(
                            '<span style="cursor:pointer; background:' + data[8][color] + '" class="mcolor">' + data[8][color] + '</span> '
                        );
                }
            }

        });
        return false;
    });
</script>
<script>
    $(document).on("click", ".addcart", function () {
        var pid = $(this).parent().find('input[type=hidden]').val();
        $.ajax({
            type: "GET",
            url: "{{URL::to('/json/addcart')}}",
            data: {id: pid},
            success: function (data) {
                alert(data);
                if (data == 0) {
                    $.notify("{{$gs->cart_error}}", "error");
                }else if(data == 3){
                    $.notify("Don't start Exclusive offer", "error");
                }else if(data == 4){
                    $.notify("Time out offer Exclusive offer", "error");
                }else if(data == 5){
                    $.notify("Please after login for Exclusive offer", "error");
                }else if(data == 6){
                    $.notify("Only one time for Exclusive offer", "error");
                }else {
                    $(".empty").html("");
                    $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                    $(".cart-quantity").html(data[2]);
                    var arr = $.map(data[1], function (el) {
                        return el
                    });
                    $(".cart").html("");
                    for (var k in arr) {
                        var x = arr[k]['item']['name'];
                        var p = x.length > 30 ? x.substring(0, 30) + '...' : x;
                        $(".cart").append(
                            '<div class="single-myCart">' +
                            '<div class="cart-info">' +
                            '<a href="{{url('/')}}/product/' + arr[k]['item']['id'] + '/' + arr[k]['item']['name'] + '" style="color: black; padding: 0 0;">' + '<h5>' + p + '</h5></a>' +
                            '<p class="removecart" onclick="remove(' + arr[k]['item']['id'] + ')"><i class="fa fa-close" style="cursor: pointer;"></i></p>' +
                            '</div>' +
                            '<p>{{$lang->cquantity}}: ' + arr[k]['qty'] + '</p>' +
                                @if($gs->sign == 0)
                                    '<p>{{$curr->sign}}' + (arr[k]['price'] * {{$curr->value}}).toFixed(2) + '</p>' +
                                @else
                                    '<p>' + (arr[k]['price'] * {{$curr->value}}).toFixed(2) + '{{$curr->sign}}</p>' +
                                @endif
                                    '</div>');
                    }
                    $.notify("{{$gs->cart_success}}", "success");
                }
            }
        });
        return false;
    });
</script>
<script>
    $(document).on("click", ".removecart", function (e) {
        $(".addToMycart").show();
    });
</script>
<script>
    var size = "";
    var colorss = "";
    $(document).on("click", ".msize", function () {
        $('.msize').removeClass('mselected-size');
        $(this).addClass('mselected-size');
        size = $(this).html();
    });

    $(document).on("click", ".mcolor", function () {
        $('.mcolor').removeClass('mselected-color');
        $(this).addClass('mselected-color');
        colorss = $(this).html();
    });
    $(document).on("click", "#maddcart", function () {
        var qty = $("#mqty").val();
        if (qty < 1) {
            $.notify("{{$gs->invalid}}", "error");
        }
        else {
            var pid = $("#mid").val();
            $.ajax({
                type: "GET",
                url: "{{URL::to('/json/addnumcart')}}",
                data: {id: pid, qty: qty, size: size, color: colorss},
                success: function (data) {
                    if (data == 0) {
                        $.notify("{{$gs->cart_error}}", "error");
                    }
                    else {
                        $(".empty").html("");
                        $(".total").html((data[0] * {{$curr->value}}).toFixed(2));
                        $(".cart-quantity").html(data[2]);
                        var arr = $.map(data[1], function (el) {
                            return el
                        });
                        $(".cart").html("");
                        for (var k in arr) {
                            var x = arr[k]['item']['name'];
                            var p = x.length > 30 ? x.substring(0, 30) + '...' : x;
                            $(".cart").append(
                                '<div class="single-myCart">' +
                                '<div class="cart-info">' +
                                '<a href="{{url('/')}}/product/' + arr[k]['item']['id'] + '/' + arr[k]['item']['name'] + '" style="color: black; padding: 0 0;">' + '<h5>' + p + '</h5></a>' +
                                '<p class="removecart" onclick="remove(' + arr[k]['item']['id'] + ')"><i class="fa fa-close" style="cursor: pointer;"></i></p>' +
                                '</div>' +
                                '<p>{{$lang->cquantity}}: ' + arr[k]['qty'] + '</p>' +
                                    @if($gs->sign == 0)
                                        '<p>{{$curr->sign}}' + (arr[k]['price'] * {{$curr->value}}).toFixed(2) + '</p>' +
                                    @else
                                        '<p>' + (arr[k]['price'] * {{$curr->value}}).toFixed(2) + '{{$curr->sign}}</p>' +
                                    @endif
                                        '</div>');
                        }
                        $.notify("{{$gs->cart_success}}", "success");
                        $("#mqty").val("1");
                    }
                }
            });
        }
    });
</script>
<script>
    $(document).on("click", ".lwish", function () {
        var pid = $(this).parent().find('input[type=hidden]').val();
        window.location = "{{url('user/wishlist/product/')}}/" + pid;
        return false;
    });
</script>


<script>
    $(document).on("click", ".uwish", function () {
        var pid = $(this).parent().find('input[type=hidden]').val();
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
    $(document).on("click", ".no-wish", function () {
        return false;
    });
</script>
<script type="text/javascript">
    $(document).on("submit", "#emailreply", function () {
        var token = $(this).find('input[name=_token]').val();
        var subject = $(this).find('input[name=subject]').val();
        var message = $(this).find('textarea[name=message]').val();
        var email = $(this).find('input[name=email]').val();
        var name = $(this).find('input[name=name]').val();
        var user_id = $(this).find('input[name=user_id]').val();
        var vendor_id = $(this).find('input[name=vendor_id]').val();
        $('#subj').prop('disabled', true);
        $('#msg').prop('disabled', true);
        $('#emlsub').prop('disabled', true);
        $.ajax({
            type: 'post',
            url: "{{URL::to('/vendor/contact')}}",
            data: {
                '_token': token,
                'subject': subject,
                'message': message,
                'email': email,
                'name': name,
                'user_id': user_id,
                'vendor_id': vendor_id
            },
            success: function () {
                $('#subj').prop('disabled', false);
                $('#msg').prop('disabled', false);
                $('#subj').val('');
                $('#msg').val('');
                $('#emlsub').prop('disabled', false);
                $.notify("Message Sent !!", "success");
                $('.ti-close').click();
            }
        });
        return false;
    });
</script>

@if($gs->is_talkto == 1)
    <!--Start of Tawk.to Script-->
    {!! $gs->talkto !!}
    <!--End of Tawk.to Script-->
@endif

@yield('scripts')