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
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Pending Vendors <a href="{{ route('admin-vendor-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Vendors List <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Pending Vendors
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
                                                    <th>Vendor Name</th>
                                                    <th>Vendor Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                                @foreach($users as $user)                                                  
                                              <tr role="row" class="odd">

                                                      <td>{{$user->shop_name}}</td>
                                                      <td>{{$user->email}}</td>
                                                      <td>{{$user->shop_number}}</td>
                                                      <td>{{$user->shop_address}}</td>
                                                      <td>
                                                      <a href="{{route('admin-vendor-show',$user->id)}}" class="btn btn-primary product-btn"><i class="fa fa-send"></i> View Details</a>
                                                      <a href="{{route('admin-vendor-st',['id1'=>$user->id,'id2'=>1])}}" class="btn btn-success product-btn"><i class="fa fa-check"></i> Accept</a>
                                                        <a href="{{route('admin-vendor-st',['id1'=>$user->id,'id2'=>0])}}" class="btn btn-danger product-btn"><i class="fa fa-times"></i> Reject</a>
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
$('#example').dataTable( {
  "ordering": false
} );
</script>

@endsection