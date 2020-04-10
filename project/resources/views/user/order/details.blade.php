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
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Order Details <a href="{{ route('vendor-order-index') }}" class="btn add-newProduct-btn" style="padding: 5px 12px;"  class="print-order-btn">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </a> <a href="{{ route('vendor-order-invoice',$order->order_number) }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-file"></i> Invoice</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendor Orders <i class="fa fa-angle-right" style="margin: 0 2px;"></i>Order Details</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Order ID#</strong></td>
                                <td>{{$order->order_number}}</td>
                            </tr>
                            @if($gs->ship_info == 1)
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Name:</strong></td>
                                <td>{{$order->customer_name}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Email:</strong></td>
                                <td>{{$order->customer_email}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Phone:</strong></td>
                                <td>{{$order->customer_phone}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Address:</strong></td>
                                <td>{{$order->customer_address}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Country:</strong></td>
                                <td>{{$order->customer_country}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer City:</strong></td>
                                <td>{{$order->customer_city}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Postal Code:</strong></td>
                                <td>{{$order->customer_zip}}</td>
                            </tr>

                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Shipping Option:</strong></td>
                                <td>
                                    @if($order->shipping == "pickup")
                                        Pick Up
                                    @else
                                        Ship To Address
                                    @endif
                                </td>
                            </tr>
                            @if($order->shipping == "pickup")
                        <tr>
                                    <td width="30%" style="text-align: right;"><strong>Pickup Location:</strong></td>
                                    <td>{{$order->pickup_location}}</td>
                                </tr>
                            @else
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Shipping Name:</strong></td>
                <td>{{$order->shipping_name == null ? $order->customer_name : $order->shipping_name}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Shipping Email:</strong></td>
                <td>{{$order->shipping_email == null ? $order->customer_email : $order->shipping_email}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Shipping Phone:</strong></td>
                <td>{{$order->shipping_phone == null ? $order->customer_phone : $order->shipping_phone}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Shipping Address:</strong></td>
                <td>{{$order->shipping_address == null ? $order->customer_address : $order->shipping_address}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Shipping Country:</strong></td>
                <td>{{$order->shipping_country == null ? $order->customer_country : $order->shipping_country}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Shipping City:</strong></td>
                <td>{{$order->shipping_city == null ? $order->customer_city : $order->shipping_city}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Shipping Postal Code:</strong></td>
                <td>{{$order->shipping_zip == null ? $order->customer_zip : $order->shipping_zip}}</td>
                                </tr>
                            @endif
                            @endif
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Total Product:</strong></td>
                                <td>
                                    @php
                                    $x = 0;
                                    @endphp
                                @foreach($cart->items as $product)
                                @if($product['item']['user_id'] != 0)
                                    @if($product['item']['user_id'] == $user->id)
                                    @php
                                    $x += $product['qty'];
                                    @endphp
                                    @endif
                                @endif
                                @endforeach
                                {{$x}}

                                </td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Total Cost:</strong></td>
                                <td>{{$order->currency_sign}}
                                    @php
                                    $x = 0;
                                    @endphp
                                @foreach($cart->items as $product)
                                @if($product['item']['user_id'] != 0)
                                    @if($product['item']['user_id'] == $user->id)
                                    @php
                                    $x += $product['price'];
                                    @endphp
                                    @endif
                                @endif
                                @endforeach
                                {{round($x * $order->currency_value , 2)}}
</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Ordered Date:</strong></td>
                                <td>{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Payment Method:</strong></td>
                                <td>{{$order->method}}</td>
                            </tr>
                        @if($order->method != "Cash On Delivery")
                            @if($order->method=="Stripe")
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>{{$order->method}} Charge ID:</strong></td>
                                    <td>{{$order->charge_id}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>{{$order->method}} Transaction ID:</strong></td>
                                <td>{{$order->txnid}}</td>
                            </tr>
                        @endif
                            <table id="example" class="table">
                                <h4 class="text-center">Products Ordered</h4><hr>
                                <thead>
                                <tr>
                                    <th width="10%">Product ID#</th>
                                    <th>Product Title</th>
                                    <th width="5%">Quantity</th>
                                    <th width="10%">Size</th>
                                    <th width="10%">Color</th>
                                    <th width="20%">Product Price</th>
                                    <th width="10%">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cart->items as $product)
                                @if($product['item']['user_id'] != 0)
                                    @if($product['item']['user_id'] == $user->id)
                                        <tr>
                                                <td>{{ $product['item']['id'] }}</td>
                                                <td><a target="_blank" href="{{route('front.product',['id1' => $product['item']['id'], $product['item']['name']])}}">{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</a></td>
                                                <td>{{$product['qty']}}</td>
                                                <td>{{$product['size']}}</td>
                                                <td><span style="width: 40px; height: 20px; display: block; background: {{$product['color']}};"></span></td>
                                                <td>{{$order->currency_sign}}{{ round($product['item']['cprice'] * $order->currency_value , 2) }}</td>
                                                <td>{{$order->currency_sign}}{{ round($product['price'] * $order->currency_value , 2)}}</td>

                                        </tr>
                                    @endif
                                @endif
                                @endforeach


                                </tbody>
                            </table>
                            <tr>
                                <td width="30%"></td>
                                <td>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                            @if($gs->ship_info == 1)
                        <hr>
                        <div class="text-center">
                            <a href="{{route('vendor-order-email',$order->customer_email)}}" class="btn btn-primary"><i class="fa fa-send"></i> Contact Customer</a>
                        </div>
                            @endif
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

@section('scripts')

<script type="text/javascript">
$('#example').dataTable( {
  "ordering": false,
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'responsive'  : true
} );
</script>

@endsection