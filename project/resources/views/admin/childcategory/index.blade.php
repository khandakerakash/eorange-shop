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
                                                    <h2>Child Category</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Manage Category <i class="fa fa-angle-right" style="margin: 0 2px;"></i>  Child Category</p>
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
                                                    <th style="width: 150px;">Category</th>
                                                    <th style="width: 150px;">Sub Category</th>
                                                    <th style="width: 150px;">Name</th>
                                                    <th style="width: 150px;">Slug</th>
                                                    <th style="width: 150px;">Status</th>
                                                    <th style="width: 200px;">Actions</th></tr>
                                              </thead>

                                              <tbody>
                                              @foreach($childcats as $cat)
                                                  @if(count($cat->subCategory)>0)
                                                      @foreach($cat->subCategory as $sub)
                                                          @if(count($sub->subCategory)>0)
                                                              @foreach($sub->subCategory as $child)
                                                                  <tr role="row" class="odd">
                                                                      <td>{{$cat->name}}</td>
                                                                      <td>{{$sub->name}}</td>
                                                                      <td>{{$child->name}}</td>
                                                                      <td>{{$child->slug}}</td>
                                                                      <td>
                                                        <span class="dropdown">
                                            <button class="btn btn-{{$child->status == 1 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$child->status == 1 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-childcat-st',['id1'=>$child->id,'id2'=>1])}}">Active</a></li>
                                                            <li><a href="{{route('admin-childcat-st',['id1'=>$child->id,'id2'=>0])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                                      </td>
                                                                      <td>
                                                                          <a href="{{route('admin-childcat-edit',$child->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                                          <a href="{{route('admin-childcat-delete',$child->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                                                                      </td>
                                                                  </tr>
                                                              @endforeach
                                                          @endif
                                                      @endforeach
                                                  @endif

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
          '<a href="{{route('admin-childcat-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Create New Child Category</a>'+
          '</div>');                                                                       
});
</script>

@endsection