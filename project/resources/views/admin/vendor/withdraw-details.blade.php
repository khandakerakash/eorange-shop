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
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Withdraw Details <a href="{{ route('admin-wt-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Withdraws <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Withdraw Details
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors ID#</strong></td>
                                <td>{{$withdraw->user->id}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendor Company</strong></td>
                                <td><a href="{{route('admin-vendor-show',$withdraw->user->id)}}" target="_blank">{{$withdraw->user->shop_name}}</a></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Amount:</strong></td>
                                <td><strong style="color:green">${{$withdraw->amount}}</strong></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Charge:</strong></td>
                                <td><strong style="color:green">${{$withdraw->fee}}</strong></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Process Date:</strong></td>
                                <td>{{date('d-M-Y',strtotime($withdraw->created_at))}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Status:</strong></td>
                                <td><strong>{{ucfirst($withdraw->status)}}</strong></td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors Name:</strong></td>
                                <td>{{$withdraw->user->name}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors Email:</strong></td>
                                <td>{{$withdraw->user->email}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Vendors Phone:</strong></td>
                                <td>{{$withdraw->user->shop_number}}</td>
                            </tr>

                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Withdraw Method:</strong></td>
                                <td>{{$withdraw->method}}</td>
                            </tr>
                            @if($withdraw->method != "Bank")
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>{{$withdraw->method}} Email:</strong></td>
                                <td>{{$withdraw->acc_email}}</td>
                            </tr>
                            @else
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>{{$withdraw->method}} Account:</strong></td>
                                    <td>{{$withdraw->iban}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Account Name:</strong></td>
                                    <td>{{$withdraw->acc_name}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Country:</strong></td>
                                    <td>{{ucfirst(strtolower($withdraw->country))}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>Address:</strong></td>
                                    <td>{{$withdraw->address}}</td>
                                </tr>
                                <tr>
                                    <td width="30%" style="text-align: right;"><strong>{{$withdraw->method}} Swift Code:</strong></td>
                                    <td>{{$withdraw->swift}}</td>
                                </tr>
                            @endif
                            <tr>
                                @if($withdraw->status == "pending")
                                <td width="30%" style="text-align: right;"><a href="{{route('admin-wt-accept',$withdraw->id)}}" class="btn btn-success btn-xs"><i class="fa fa-check-circle"></i> Accept</a></td>

                                <td><a href="{{route('admin-wt-reject',$withdraw->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i> Reject</a></td>
                                @endif
                            </tr>

                            </tbody>
                        </table>
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

