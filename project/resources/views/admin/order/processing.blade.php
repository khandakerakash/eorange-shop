@extends('layouts.admin')

@section('content')

<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard data-table area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Processing Orders</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Orders <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Processing Orders</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                      <hr>
                  <div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr>
                                                    <th style="width: 130px;">Customer Email</th>
                                                    <th style="width: 150px;">Order ID</th>
                                                    <th style="width: 90px;">Total Qty</th>
                                                    <th style="width: 100px;">Total Cost</th>
                                                    <th style="width: 160px;">Payment Method</th>
                                                    <th style="width: 380px;">Actions</th></tr>
                                              </thead>

                                              <tbody>
                                                @foreach($orders as $order)                                                  

                                                    <tr>
                                                    <td> {{$order->customer_email}}</td>
                                                    <td> {{$order->order_number}}</td>
                                                    <td> {{$order->totalQty}}</td>
                                                    <td> {{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}</td>
                                                    <td> {{$order->method}}</td>
                                                      <td>
                                                        <a href="{{route('admin-order-show',$order->id)}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details</a>
                                                        <a href="{{route('admin-order-email',$order->id)}}" class="btn btn-success product-btn"><i class="fa fa-send"></i> Send Email</a>
                                                        <span class="dropdown">
                                            <button class="btn btn-danger product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;
                                                        @if($order->status == "completed")
                                                        {{ "background-color: #01c004;" }}
                                                        @elseif($order->status == "processing")
                                                        {{ "background-color: #02abff;" }}
                                                        @elseif($order->status == "declined")
                                                        {{ "background-color: #d9534f;" }}
                                                        @else
                                                        {{"background-color: #ff9600;"}}
                                                        @endif
                                                        
                                            ">{{ucfirst($order->status)}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-order-status',['id1' => $order->id, 'status' => 'processing'])}}">Processing</a></li>
                                                            <li><a href="{{route('admin-order-status',['id1' => $order->id, 'status' => 'completed'])}}">Completed</a></li>
                                                            <li><a href="{{route('admin-order-status',['id1' => $order->id, 'status' => 'declined'])}}">Declined</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                  </tr>
                                                  @endforeach
                                                  </tbody>
                                          </table></div></div>
                                        </div>
                                        </div>
                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard data-table area -->
                </div>
            </div>
        </div>

@endsection