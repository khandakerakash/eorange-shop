@extends('layouts.front')
@section('content')
    <!-- Starting of checkOut area -->
    <div class="section-padding product-checkOut-wrap payment-checkOut-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="payment-checkOut-header">

                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1">
                                <div class="orderSuccessPayment">
                                    <img src="{{ asset('assets/images/grocery-bag.png') }}" alt="grocery-bag" class="img-fluid payment-success-img">
                                    <div class="orderSuccessMessage">
                                        <div class="orderNum">
                                            <span>Order Number </span>
                                            <b><span>{{$order->order_number}}</span></b>
                                        </div>
                                        <div class="thankYou">
                                            <div>
                                                <span class="{{$order->status ==='declined'?'text-danger':''}}">{{$order->status ==='declined'?'Your order has been cancel':'Your order is pending'}}</span>
                                            </div>
                                            @if($order->status !=='declined')
                                            <div>
                                                <span>please pay with <b>{{$order->method}}</b></span>
                                            </div>
                                                @endif
                                        </div>
                                    </div>
                                </div><!-- /.orderSuccessPayment -->
                            </div>
                        </div>

                    </div><!-- /.payment-checkOut-header -->
                    <form action="{{ route('sslcz_gw.pay') }}" method="POST" class="needs-validation" id="pay_form">
                        @csrf
                        <input type="hidden" name="order_number" value="{{$order->order_number}}">
                    </form>
                    @if($order->status !=='declined')
                    <div class="paymentMethods">
                        <div class="inlinePaymentComponent">
                            <div>
                                <h4><span>Do you want to <b>Pay Now</b>?</span></h4>
                                <section class="paymentMethods">
                                    <div class="paymentMethodItem" data-payment="2" onclick="$('#pay_form').submit()">
                                        <div class="Portwallet paymentMethodItemContent">
                                            <img src="{{ asset('assets/front/images/footer/maestro.png') }}">
                                            <img src="{{ asset('assets/front/images/footer/american.png') }}">
                                            <img src="{{ asset('assets/front/images/footer/visa.png') }}">
                                            <p>Bangladeshi Credit / Debit Card</p>
                                        </div>
                                    </div>
                                    <div class="paymentMethodItem" data-payment="2">
                                        <div class="Bkash paymentMethodItemContent">
                                            <img src="{{ asset('assets/images/bkash.png') }}">
                                            <p>bKash</p>
                                        </div>
                                    </div>
                                </section>
                                <br>
                            </div>
                        </div>
                    </div><!-- /.paymentMethods -->
                    @endif
                    <div class="orderDetails mt-3 mb-5">
                        <div class="orderSummary">
                            <div class="orderSummaryContent">
                                <h6>Order Summary</h6>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="label">Subtotal</td>
                                        <td class="value">
                                            <span>{{$order->currency_sign}}</span>
                                            <span>{{$order->pay_amount}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Delivery Charge</td>
                                        <td class="value">
                                            <span>{{$order->currency_sign}}</span>
                                            <span>{{$order->shipping_cost}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Order Total</td>
                                        <td class="value">
                                            <span>{{$order->currency_sign}}</span>
                                            <span>{{$order->pay_amount+$order->shipping_cost}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label walletRed">Amount Paid</td>
                                        <td class="value">
                                            <span>{{$order->currency_sign}}</span>
                                            <span>0</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <br><br>
                                    <tfoot>
                                    <tr>
                                        <td class="label labelDue">Due</td>
                                        <td class="value">
                                            <span>{{$order->currency_sign}}</span>
                                            <span>{{$order->pay_amount+$order->shipping_cost}}</span>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="orderSummary">
                            <div class="deliveryDetails">
                                <h6>Contact</h6>
                                <p>{{$order->customer_name}} {{$order->customer_phone}}   </p>

                                <h6>Delivery Address</h6>
                                <p>
                                    {{$order->customer_address}}

                                    {{$order->customer_zip}}

                                    {{$order->customer_country}}

                                </p>
                                <h6>Delivery Zone</h6>
                                <p>
                                    {{$order->customer_city==1?'Dhaka':'Out side of dhaka'}}


                                </p>
                                <h6>Preferred Delivery Timings</h6>
                                <div class="deliveryTimeSelectionContainer singleSlotShipment">
                                    <div class="expressDelivery">
{{--                                        <div class="deliveryTypeTitle">Express delivery</div>--}}
{{--                                        <div class="deliveryDate">28 Aug</div>--}}
                                        <div class="deliveryTimeRange">
                                            <span>2</span>
                                            <span> - </span>
                                            <span>3 Working Days</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.orderDetails -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="restOfThePage orderDetails">
                        <div class="orderInstructionList">
                            <label>Order Instructions</label>
                            <table>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="orderInstructionContainer">
                            <form action="{{route('front.order_note',[$order->order_number])}}" method="post">@csrf
                                <div class="OrderInstructionForm">
                                    <textarea name="order_note" placeholder="E.g. Call me when you arrive" spellcheck="false" required></textarea>
                                    <button type="submit"><span>Submit</span></button>
                                </div>
                            </form>
                        </div>
                        @if($order->status !=='declined')
<form action="{{route('front.order_cancel',$order->order_number)}}" method="post" id="cancel_form">@csrf

</form>
                        <div class="cancelContainer">
                            <div class="cancelContent">
                                <label>Would you like to cancel this order?</label>
                                <button class="cancelOrderBtn" onclick="confirm('Are you sure your order cancel?')?$('#cancel_form').submit():null">Cancel Order</button>
                            </div>
                        </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.product-checkOut-wrap -->
    <!-- Ending of product shipping form -->


@endsection

@section('scripts')
    <script>
        var obj = {};
        obj.cus_name = 'rowjat';
        obj.cus_phone = '01811903004';
        obj.cus_email = 'rowjat@gmail.com';
        obj.cus_addr1 = 'dsdsd';
        obj.amount = 1000;
        $('#sslczPayBtn').prop('postdata', obj);
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };
            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
@endsection
