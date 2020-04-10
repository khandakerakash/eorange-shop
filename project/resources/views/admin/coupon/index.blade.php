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
                                                    <h2>Coupons</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Coupons</p>
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
                                                    <th style="width: 60px;">Code</th>
                                                    <th style="width: 80px;">Type</th>
                                                    <th style="width: 45px;">Amount</th>
                                                    <th style="width: 65px;">From</th>
                                                    <th style="width: 65px;">To</th>
                                                    <th style="width: 35px;">Used</th>
                                                    <th style="width: 65px;">Status</th>
                                                    <th style="width: 180px;">Actions</th></tr>
                                              </thead>

                                              <tbody>
                                            @foreach($datas as $data)                                                
                                              <tr role="row" class="odd">
                                                    <td>{{$data->code}}</td>
                                                    <td>{{$data->type == 0 ?"Discount By Percentage":"Discount By Amount"}}</td>
                                                    <td>{{$data->price}}{{$data->type == 0 ? "%":""}}</td>
                                                    <td>{{date('d-m-Y',strtotime($data->start_date))}}</td>
                                                    <td>{{date('d-m-Y',strtotime($data->end_date))}}
                                                    </td>
                                                    <td>{{$data->used}}</td>
                                                      <td>
                                                        <span class="dropdown">
                                            <button class="btn btn-{{$data->status == 1 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$data->status == 1 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-cp-st',['id1'=>$data->id,'id2'=>1])}}">Active</a></li>
                                                            <li><a href="{{route('admin-cp-st',['id1'=>$data->id,'id2'=>0])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                      <td>
                                                        <a href="{{route('admin-cp-edit',$data->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{route('admin-cp-delete',$data->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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

@section('scripts')

<script type="text/javascript">
  $( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">'+
          '<a href="{{route('admin-cp-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Create New Coupon</a>'+
          '</div>');                                                                       
});
</script>

@endsection

