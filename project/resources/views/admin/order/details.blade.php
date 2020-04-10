@extends('layouts.admin')
        
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
                                                    <h2>Order Details <a href="{{ route('admin-order-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a> <a href="{{ route('admin-order-invoice',$order->id) }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-file"></i> Invoice</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Orders <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Order Details</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Order ID#</strong></td>
                                <td>{{$order->order_number}}</td>
                            </tr>
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
                            @if($order->coupon_code != null)
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Coupon Code:</strong></td>
                                <td>{{$order->coupon_code}}</td>
                            </tr>
                            @endif
                            @if($order->coupon_discount != null)
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Coupon Discount:</strong></td>
                                <td>{{$order->coupon_discount}}</td>
                            </tr>
                            @endif
                            @if($order->affilate_user != null)
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Affilate User:</strong></td>
                                <td>{{$order->affilate_user}}</td>
                            </tr>
                            @endif
                            @if($order->affilate_charge != null)
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Affilate Charge:</strong></td>
                                <td>{{$order->affilate_charge}}</td>
                            </tr>
                            @endif
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

                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Total Product:</strong></td>
                                <td>{{$order->totalQty}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Total Cost:</strong></td>
                                <td>{{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Ordered Date:</strong></td>
                                <td>{{date('d-M-Y H:i:s a',strtotime($order->created_at))}}</td>
                            </tr>
                            @if ($order->order_note != null)

                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Order Note:</strong></td>
                                <td>{{$order->order_note}}</td>
                            </tr>

                            @endif

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
                                    <th>Shop Name</th>
                                    <th>Status</th>
                                    <th>Product Title</th>
                                    <th width="5%">Quantity</th>
                                    <th width="10%">Size</th>
                                    <th width="10%">Color</th>
                                    <th width="10%">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cart->items as $product)
                                    <tr>
                                            <td>{{ $product['item']['id'] }}</td>
                                            <td>
                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\User::find($product['item']['user_id']);
                                                @endphp
                                                @if(isset($user))
                                                <a target="_blank" href="{{route('admin-vendor-show',$user->id)}}">{{$user->shop_name}}</a>
                                                @else
                                                Vendor Removed
                                                @endif
                                                @endif

                                            </td>
                                            <td>
                                                @if($product['item']['user_id'] != 0)
                                                @php
                                                $user = App\VendorOrder::where('order_id','=',$order->id)->where('user_id','=',$product['item']['user_id'])->first();
                                                @endphp
                                                {{$user->status}}
                                                @endif
                                            </td>
                                            <td><a target="_blank" href="{{route('front.product',['id1' => $product['item']['id'], $product['item']['name']])}}">{{strlen($product['item']['name']) > 30 ? substr($product['item']['name'],0,30).'...' : $product['item']['name']}}</a></td>
                                            <td>{{$product['qty']}}</td>
                                            <td>{{$product['size']}}</td>
                                            <td><span style="width: 40px; height: 20px; display: block; background: {{$product['color']}};"></span></td>
                                            <td>{{$order->currency_sign}}{{ round($product['price'] * $order->currency_value , 2) }}</td>

                                    </tr>
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
                        <hr>
                        <div class="text-center">
                            <a href="{{route('admin-order-email',$order->id)}}" class="btn btn-primary"><i class="fa fa-send"></i> Contact Customer</a>
                        </div>
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