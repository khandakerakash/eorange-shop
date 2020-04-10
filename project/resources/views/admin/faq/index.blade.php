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
                                                    <h2>FAQ Page</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> FAQ Page</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                      <hr>
                                    <form action="{{route('admin-faq-update')}}" method="POST">
                                      {{csrf_field()}}
                                      <div class="add-product-header products" style="justify-content: unset;">
                                        <label class="control-label" for="about_page_content" style=" padding-top: 10px;">Disable/Enable Faq Page *</label>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="switch" style="padding-top: 5px">
                                        <input type="checkbox" name="f_status" value="1" {{$pagedata->f_status==1?"checked":""}}>
                                        <span class="slider round"></span>
                                        </label>
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update</button> 
                                      </div>
                                    </form>
                                      <hr>



                  <div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
        


                                      <div class="row">
                                        <div class="col-sm-12">

                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr role="row">
                                                    <th style="width: 194px;">Title</th>
                                                    <th style="width: 420px;">Text</th>
                                                    <th style="width: 314px;">Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                              @foreach($faqs as $faq)    
                                              <tr role="row" class="odd">
                                                      <td tabindex="0" class="sorting_1">{{$faq->title}}</td>
                                                      <td>{{$faq->text}}</td>
                                                      <td>
                                                        <a href="{{route('admin-fq-edit',$faq->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{route('admin-fq-delete',$faq->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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
          '<a href="{{route('admin-fq-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Create New FAQ</a>'+
          '</div>');                                                                       
});
</script>

@endsection