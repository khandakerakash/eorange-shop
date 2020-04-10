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
                                                    <h2>Apply For Member</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Apply For Member</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                    @if($user->is_vendor == 0)
                                    <form class="form-horizontal" action="{{route('members_store')}}" method="POST">
                                        {{ csrf_field() }}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v1"> Name *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="v1" placeholder=" Name" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v2"> Email *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="email" value="{{$user->email}}" id="v2" placeholder="Email" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v3">Mobile Number *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="phone" id="v3" placeholder="Mobile Number" value="{{$user->phone}}" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v4">Address *</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="address" value="{{$user->address}}" id="v4" placeholder="Address" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="v4">Date Of Birth *</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" name="dob"  id="v4" placeholder="Address" required >
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

            <h5 class="text-center">Sorry this option is only for user not vendor</h5>
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