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
                                                    <h2>Withdraws</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Withdraws</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                      <hr>
                  <div >
                                          @include('includes.form-error')
                                          @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>

                                <th>Company Name</th>
                                <th width="10%">Vendors Email</th>
                                <th>Phone</th>
                                <th width="10%">Method</th>
                                <th width="10%">Status</th>
                                <th>Withdraw Date</th>
                                <th>Actions</th>
                                              </thead>

                                              <tbody>
                            @foreach($withdraws as $withdraw)
                                <tr>
                                    <td><a href="{{route('admin-vendor-show',$withdraw->user->id)}}" target="_blank">{{$withdraw->user->shop_name}}</a></td>
                                    <td>{{$withdraw->user->email}}</td>
                                    <td>{{$withdraw->user->shop_number}}</td>
                                    <td>{{$withdraw->method}}</td>
                                    <td>{{ucfirst($withdraw->status)}}</td>
                                    <td>{{$withdraw->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin-vendor-wtd',$withdraw->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                                        @if($withdraw->status == "pending")
                                        <a href="{{route('admin-wt-accept',$withdraw->id)}}" class="btn btn-success product-btn"><i class="fa fa-send"></i> Accept</a>
                                        <a href="{{route('admin-wt-reject',$withdraw->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Reject</a>
                                        @endif
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
          '<a href="{{route('admin-wt-pending')}}" class="add-newProduct-btn">'+
          'Pending Withdraws ({{$pending}})</a>'+
          '</div>');                                                                       
});
</script>

@endsection

