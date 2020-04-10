@extends('layouts.user')

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
                                                    <h2>Favorite Sellers</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Favorite Sellers</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                    <div>
                                        @include('includes.form-success')



                                        <div class="row">
                                            <div class="col-sm-12">

                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr role="row">
                                                        <th style="width: 50px;">ID#</th>
                                                        <th style="width: 150px;">Shop Name</th>
                                                        <th style="width: 100px;">Owner Name</th>
                                                        <th style="width: 150px;">Address</th>
                                                        <th style="width: 370px;">Actions</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($favorites as $vendor)
                                                    @php
                                                    $seller = App\User::findOrFail($vendor->vendor_id);
                                                    @endphp
                                                        <tr>
                                                            <td>{{$seller->id}}</td>
                                                            <td>{{$seller->shop_name}}</td>
                                                            <td>{{$seller->owner_name}}</td>
                                                            <td>{{$seller->shop_address}}</td>
                                                            <td>
                                                                <a target="_blank" href="{{route('front.vendor',str_replace(' ', '-',($seller->shop_name)))}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                                                                <a href="{{route('user-favorite-delete',$vendor->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
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