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
                                                    <h2>Main Category</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i>  Main Category</p>
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
                                                    <th style="width: 250px;">Name</th>
                                                    <th style="width: 250px;">Slug</th>
                                                    <th style="width: 250px;">Status</th>
                                                    <th style="width: 250px;">Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                              @foreach($cats as $cat)    
                                              <tr role="row" class="odd">
                                                      <td>{{$cat->name}}</td>
                                                      <td>{{$cat->slug}}</td>
                                                      <td>
                                                        <span class="dropdown">
                                            <button class="btn btn-{{$cat->status == 1 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$cat->status == 1 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-cat-st',['id1'=>$cat->id,'id2'=>1])}}">Active</a></li>
                                                            <li><a href="{{route('admin-cat-st',['id1'=>$cat->id,'id2'=>0])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                      <td>
                                                        <a href="{{route('admin-cat-edit',$cat->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{route('admin-cat-delete',$cat->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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

@section('scripts')

<script type="text/javascript">
  $( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">'+
          '<a href="{{route('admin-cat-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Create New Category</a>'+
          '</div>');                                                                       
});
</script>

@endsection