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
                                                    <h2>Services</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Services</p>
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
                                                <tr>
                                                  <th style="width: 279px;">Service Text</th>
                                                  <th style="width: 110px;">Service Title</th>
                                                  <th style="width: 185px;">Service Photo</th>
                                                  <th style="width: 200px;">Actions</th>
                                                </tr>
                                              </thead>

                                              <tbody>
                                            @foreach($ads as $ad)                                                
                                              <tr role="row" class="odd">

                                                    <td>{{$ad->text}}</td>
                                                    <td>{{$ad->title}}</td>
                                                      <td tabindex="0" class="sorting_1"><img src="{{ $ad->photo ? asset('assets/images/'.$ad->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Ad Photo" style="height: 180px; width: 200px"></td>
                                                      <td>
                                                        <a href="{{route('admin-service-edit',$ad->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{route('admin-service-delete',$ad->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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
          '<a href="{{route('admin-service-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Create New Service</a>'+
          '</div>');                                                                       
});
</script>

@endsection

