@extends('layouts.admin')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Google Analytics Page -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Payment Informations</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> SEO Tools <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Google Analytics
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-seotool-analytics-update')}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')     
                                        {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="google_analytics_script">Google Analytics Script *</label>
                                            <div class="col-sm-6">
                                              <textarea name="google_analytics" id="google_analytics_script" class="form-control" style="resize: vertical;" rows="5" placeholder="Enter Google Analytics Script" required="">{{$tool->google_analytics}}</textarea>
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>   
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Google Analytics Page -->
                </div>
            </div>
        </div>
    </div>
@endsection