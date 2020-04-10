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
                                                    <h2>Customer Details <a href="{{ route('admin-user-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customers <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customer Details
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>

                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer ID#</strong></td>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Name:</strong></td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Email:</strong></td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Phone:</strong></td>
                                <td>{{$user->phone}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Fax:</strong></td>
                                <td>{{$user->fax}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Address:</strong></td>
                                <td>{{$user->address}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer City:</strong></td>
                                <td>{{$user->city}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Customer Zip:</strong></td>
                                <td>{{$user->zip}}</td>
                            </tr>
                            <tr>
                                <td width="30%" style="text-align: right;"><strong>Joined:</strong></td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>
                            <tr>
                                <td width="30%"></td>
                                <td><a href="{{route('admin-user-email',$user->id)}}" class="btn btn-primary"><i class="fa fa-send"></i> Contact Customer</a>
                                </td>
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

