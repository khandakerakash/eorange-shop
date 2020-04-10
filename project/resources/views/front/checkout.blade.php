@extends('layouts.front')
@section('content')
    <!-- Starting of checkOut area -->
    <div class="section-padding product-checkOut-wrap">
        <form action="{{route('cash.submit')}}" method="post">

            {{csrf_field()}}

            <div class="container">

                <div class="row">

                    <div class="col-lg-12 col-md-6 col-sm-12">

                        <div id="payment_form" class="checkoutFormWrap">

                            <h2 class="signIn-title order-title">{{$lang->bdetails}}</h2>
                            <hr/>

                            <div class="billing-details-area pl-3 pr-3">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <select class="form-control shipping-select-form"
                                                    onchange="sHipping(this)" id="shipop" name="shipping"
                                                    required="">
                                                <option value="shipto" selected="">{{$lang->ships}}</option>
                                                <option value="pickup">{{$lang->pickup}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div id="pick" style="display:none;">
                                            <div class="form-group">
                                                <select class="form-control shipping-select-form"
                                                        name="pickup_location">
                                                    <option value="">{{$lang->pickups}}</option>
                                                    @foreach($pickups as $pickup)
                                                        <option value="{{$pickup->location}}">{{$pickup->location}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(Auth::guard('user')->check())

                                    <div class="row">

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="shippingFull_name">{{$lang->fname}}
                                                    <span>*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                       value="{{Auth::guard('user')->user()->name}}"
                                                       placeholder="{{$lang->fname}}"
                                                       required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="shippingFull_name">{{$lang->doph}}<span>*</span></label>
                                                <input type="text" class="form-control" name="phone"
                                                       value="{{Auth::guard('user')->user()->phone}}"
                                                       placeholder="{{$lang->doph}} "
                                                       required="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="shippingFull_name">{{$lang->doeml}}
                                                    <span>*</span></label>
                                                <input type="email" class="form-control" name="email"
                                                       value="{{Auth::guard('user')->user()->email}}"
                                                       placeholder="{{$lang->doeml}} " required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="shipping_addresss">{{$lang->doad}}<span>*</span></label>

                                                <textarea placeholder="{{$lang->doad}} " class="form-control"
                                                          name="address"
                                                          id="shipping_addresss" cols="30" rows="2"
                                                          style="resize: vertical;">{{Auth::guard('user')->user()->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="shippingFull_name">{{$lang->doct}}<span>*</span></label>

                                                    <select class="form-control" name="city">
                                                        <option value="1">Dhaka</option>
                                                        <option value="2">Out Side of Dhaka</option>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="shippingFull_name">{{$lang->ctry}}</label>
                                                <select class="form-control shipping-select-form" required=""
                                                        name="customer_country">
{{--                                                    <option value="" >{{$lang->sctry}}</option>--}}

                                                    <option value="Bangladesh" selected="selected">Bangladesh</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="shippingFull_name">{{$lang->suph}}</label>
                                                <input type="text" class="form-control" name="zip"
                                                       value="{{Auth::guard('user')->user()->zip}}"
                                                       placeholder="Postal Code"
                                                       >
                                            </div>

                                            <input type="hidden" name="user_id"
                                                   value="{{Auth::guard('user')->user()->id}}">
                                        </div>


                                    </div>

                                @else

                                @endif

                                <div class="shipping-other-address">
                                    <div class="shipping-title">
                                        <label id="ship-diff">
                                            <input class="shippingCheck" name="shippingCheck" type="checkbox"
                                                   value="check"> {{$lang->shipss}}
                                        </label>
                                        <label id="pick-info" style="display: none;">
                                            {{$lang->pickupss}}
                                        </label>
                                    </div>


                                    <div class="shipping-details-area pl-3 pr-3" style="display: none;">
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="shippingFull_name">{{$lang->fname}} <span>*</span></label>
                                                    <input class="form-control" type="text" name="shipping_name"
                                                           id="shippingFull_name"
                                                           placeholder="{{$lang->fname}} ">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="shipingPhone_number">{{$lang->doph}} <span>*</span></label>
                                                    <input class="form-control" type="number" name="shipping_email"
                                                           id="shipingPhone_number"
                                                           placeholder="{{$lang->doph}} ">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="ship_email">{{$lang->doeml}} <span>*</span></label>
                                                    <input class="form-control" type="email" name="shipping_phone"
                                                           id="ship_email"
                                                           placeholder="{{$lang->doeml}} ">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                @include('includes.countries')
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="shipping_city">{{$lang->doct}}<span>*</span></label>

                                                    <select class="form-control" id="shipping_city" name="shipping_city">
                                                        <option value="1">Dhaka</option>
                                                        <option value="2">Out Side of Dhaka</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="shippingPostal_code">{{$lang->suph}} </label>
                                                    <input class="form-control" type="text" name="shipping_zip"
                                                           id="shippingPostal_code"
                                                           placeholder="{{$lang->suph}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="shipping_address">{{$lang->doad}} <span>*</span></label>
                                                    <textarea placeholder="{{$lang->doad}} " class="form-control"
                                                              name="shipping_address"
                                                              id="shipping_address" cols="30" rows="2"
                                                              style="resize: vertical;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="text-right">
                                    <div class="form-group">
                                        <input class="btn btn-md order-btn" type="submit" value="{{$lang->onow}}">
                                    </div>
                                </div>
                            </div>





                        </div><!-- /#payment_form -->

                    </div><!-- /.col-sm-12 -->

                </div><!-- /.row -->

            </div><!-- /.container -->

        </form><!-- /form -->

    </div><!-- /.product-checkOut-wrap -->
    <!-- Ending of product shipping form -->



@endsection

@section('scripts')
    <script type="text/javascript">

        function meThods(val) {
            var action1 = "{{route('payment.submit')}}";
            var action2 = "{{route('stripe.submit')}}";
            var action3 = "{{route('cash.submit')}}";
            var action6 = "{{route('gateway.submit')}}";
            if (val.value == "Paypal") {
                $("#payment_form").attr("action", action1);
                $("#stripes").hide();
                $("#gateway").hide();
            } else if (val.value == "Stripe") {
                $("#payment_form").attr("action", action2);
                $("#stripes").show();
                $("#gateway").hide();
            } else if (val.value == "Cash") {
                $("#payment_form").attr("action", action3);
                $("#stripes").hide();
                $("#gateway").hide();
            } else if (val.value == "") {
                $("#payment_form").attr("action", '');
                $("#gateway").hide();
                $("#stripes").hide();
            } else {
                $("#payment_form").attr("action", action6);
                var id = val.value;
                $(".gtext").hide();
                $("#gateway").show();
                $("#stripes").hide();
                $.ajax({
                    type: "GET",
                    url: "{{URL::to('/json/transhow')}}",
                    data: {id: id},
                    success: function (data) {
                        $("#gshow").html(data);
                        $("#gshow").show();
                    }
                });

            }
        }

        function sHipping(val) {
            var shipcost = parseFloat($("#ship-cost").html());
            var totalcost = parseFloat($("#total-cost").html());
            var finalcost = parseFloat($("#ft").html());
            var total = 0;
            var ft = 0;
            var ck = $("#ft").html();
            if (val.value == "shipto") {
                if (ck == "") {
                    total = shipcost + totalcost;
                    ft = shipcost + finalcost;
                    $("#pick").hide();
                    $("#ship-diff").show();
                    $("#pick-info").hide();
                    $("#shipshow").show();
                    $("#shipping-cost").html(shipcost);
                    $("#total-cost").html(total);
                    $("#ft").html(ft);
                    $("#grandtotal").val(total);
                    $("#shipto").find("input").prop('required', true);
                    $("#pick").find("select").prop('required', false);
                } else {
                    total = shipcost + totalcost;
                    ft = shipcost + finalcost;
                    $("#pick").hide();
                    $("#ship-diff").show();
                    $("#pick-info").hide();
                    $("#shipshow").show();
                    $("#shipping-cost").html(shipcost);
                    $("#total-cost").html(total);
                    $("#ft").html(ft);
                    $("#grandtotal").val(ft);
                    $("#shipto").find("input").prop('required', true);
                    $("#pick").find("select").prop('required', false);
                }
            }

            if (val.value == "pickup") {
                if (ck == "") {
                    total = totalcost - shipcost;
                    ft = finalcost - shipcost;
                    $("#pick").show();
                    $("#pick-info").show();
                    $("#ship-diff").hide();
                    $("#shipshow").hide();
                    $("#shipping-cost").html('0');
                    $("#total-cost").html(total);
                    $("#ft").html(ft);
                    $("#grandtotal").val(total);
                    $("#shipto").find("input").prop('required', false);
                    $("#pick").find("select").prop('required', true);
                } else {
                    total = totalcost - shipcost;
                    ft = finalcost - shipcost;
                    $("#pick").show();
                    $("#pick-info").show();
                    $("#ship-diff").hide();
                    $("#shipshow").hide();
                    $("#shipping-cost").html('0');
                    $("#total-cost").html(total);
                    $("#ft").html(ft);
                    $("#grandtotal").val(ft);
                    $("#shipto").find("input").prop('required', false);
                    $("#pick").find("select").prop('required', true);
                }
            }
        }

    </script>


@endsection