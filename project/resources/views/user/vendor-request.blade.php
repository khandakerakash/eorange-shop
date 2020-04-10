@extends('layouts.user')
@section('content')
    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-product-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Apply For Vendor</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Apply For Vendor</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>
                                    </div>
                                    @if($user->is_vendor == 0)
                                    <form class="form-horizontal" action="{{route('user-vendor-request-submit')}}" method="POST">
                                        {{ csrf_field() }}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v1">Shop Name *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="shop_name" id="v1" placeholder="Shop Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v2">Owner Name *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="owner_name" id="v2" placeholder="Owner Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v3">Mobile Number *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="shop_number" id="v3" placeholder="Mobile Number" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v4">Address *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="shop_address" id="v4" placeholder="Address" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v5">Registration Number *<span>(This Field is Optional)</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="reg_number" id="v5" placeholder="Registration Number" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v6">Message *<span>(This Field is Optional)</span></label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" id="v6" name="shop_message" placeholder="Message" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">Send Request</button>
                                        </div>
                                    </form>
                                    @else
                                    <div class="container">
                                        <div class="row">
                                          <div class="alert alert-success validation">

            <h3 class="text-center">You Have Successfully Applied For Vendor. Please Wait Until Your Application is being procesed.</h3>
            </div>
            </div>
      </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Account Dashboard area -->
@endsection