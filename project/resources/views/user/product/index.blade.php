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
                                                    <h2>Products</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right"
                                                                    style="margin: 0 2px;"></i> Products</p>
                                                </div>
                                            </div>
                                            @include('includes.user-notification')
                                        </div>
                                    </div>
                                    <div>
                                        @include('includes.form-success')

                                        <user_product_index route="{{route('user-prod-get-data')}}"></user_product_index>

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

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">' +
                '<a href="{{route('user-prod-create')}}" class="btn add-newProduct-btn">' +
                '<i class="fa fa-plus"></i> Add New Product</a>' +
                '</div>');
        });
    </script>

@endsection