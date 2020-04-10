@extends('layouts.user')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header" style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Order Invoice <a href="{{ route('vendor-order-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Orders <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Order Invoice</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
<main>
                                        <div class="invoice-wrap">
                                            <div class="invoice__title">
                                                <div class="row reorder-xs">
                                                    <div class="col-sm-6">
                                                        <div class="invoice__logo text-left">
                                                            <img src="{{asset('assets/images/'.$gs->logo)}}" alt="woo commerce logo">
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="invoice__metaInfo">
                                                        <div class="buyer">
                                                            <p>Billing Address</p>
                                                            <strong>{{$order->customer_name}}</strong>
                                                            <address>
                                                                {{$order->customer_address}}<br>
                                                                {{$order->customer_city}}<br>
                                                                {{$order->customer_country}}<br>
                                                            </address>
                                                        </div>

                                                        <div class="invoce__date">
                                                            <strong>Invoice Number</strong>
                                                            <p>Order Date</p>
                                                            <p>Order ID</p>
                                                        </div>

                                                        <div class="invoce__number">
                                                            <strong>{{sprintf("%'.08d", $order->id)}}</strong>
                                                            <p>{{date('d-M-Y',strtotime($order->created_at))}}</p>
                                                            <p>{{$order->order_number}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="invoice__table">
                                                        <div class="table-responsive">
                                                          <table class="table table-hover">
                                                            <thead>
                                                              <tr>
                                                                <th>Product</th>
                                                                <th>Size</th>
                                                                <th>Color</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Line Total</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                    @php
                                    $subtotal = 0;
                                    $tax = 0;
                                    $ship = 0;
                                    @endphp                                   
                                @foreach($cart->items as $product)
                                @if($product['item']['user_id'] != 0)
                                    @if($product['item']['user_id'] == $user->id)
                                    <tr>
                                            <td><a target="_blank" href="{{route('front.product',['id1' => $product['item']['id'], $product['item']['name']])}}">{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</a></td>
                                            <td>{{$product['size']}}</td>
                                            <td><span style="float: right; width: 40px; height: 20px; display: block; background: {{$product['color']}};"></span></td>
                                            <td>{{$order->currency_sign}}{{ round($product['item']['cprice'] * $order->currency_value , 2) }}</td>
                                            <td>{{$product['qty']}}</td>
                                            <td>{{$order->currency_sign}}{{ round($product['price'] * $order->currency_value , 2) }}</td>
                                            @php
                                            $ship += $user->shipping_cost;
                                            $subtotal += $product['price'];
                                            @endphp

                                    </tr>
                                    @endif
                                @endif
                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                              <tr>
                                                                <td colspan="5">Subtotal</td>
                                                                <td>{{$order->currency_sign}}{{ round($subtotal * $order->currency_value , 2) }}</td>
                                                              </tr>
                                                              @if($ship != 0)
                                                              <tr>
                                                                <td colspan="5">Shipping Cost({{$order->currency_sign}})</td>
                                                                <td>{{ round($ship * $order->currency_value , 2) }}</td>
                                                              </tr>
                                                              @endif
                                                              @if($order->tax != 0)
                                                              <tr>
                                                                <td colspan="5">TAX({{$order->currency_sign}})</td>
                                                                @php 
                                                                $tax = ($subtotal / 100) * $order->tax;
                                                                $total =  $subtotal + $ship + $tax;
                                                                @endphp
                                                                <td>{{$tax}}</td>
                                                              </tr>
                                                              @endif
                                                              <tr>
                                                                <td colspan="4"></td>
                                                                <td>Total</td>
                                                                <td>{{$order->currency_sign}}{{ round($total * $order->currency_value , 2) }}</td>
                                                              </tr>
                                                            </tfoot>         
                                                          </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="invoice__orderDetails">
                                                        <p><strong>Order Details</strong></p>

                                                        <p>Shipping Method:                                    @if($order->shipping == "pickup")
                                        Pick Up
                                    @else
                                        Ship To Address
                                    @endif</p>
                                                        <p>Payment Method: {{$order->method}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="invoice__shipping">
                                                        <p style="text-align: left;"><strong>Shipping Address</strong></p>
                                                        <p style="text-align: left;">{{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}</p>
                                                        <address>
                                                            {{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}<br>
                                                            {{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}<br>
                                                            {{$order->shipping_country == null ? $order->customer_country : $order->shipping_country}}<br>
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <a class="btn  add-newProduct-btn print" href="{{route('vendor-order-print',$order->order_number)}}" target="_blank"><i class="fa fa-print"></i> Print Invoice</a>
                                                </div>
                                            </div>
                                        </div>
                                    </main>

                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
                </div>
            </div>
        </div>
    </div>
@endsection
