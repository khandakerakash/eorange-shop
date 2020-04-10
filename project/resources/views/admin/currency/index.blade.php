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
                                                    <h2>Currencies</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Payment Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Currencies</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                      <hr>
                                    <form action="{{route('admin-cur-update')}}" method="POST">
                                      {{csrf_field()}}
                                      <div class="add-product-header products" style="justify-content: unset;">
                                        <label class="control-label" for="about_page_content" style=" padding-top: 10px;">Disable/Enable Currency *</label>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="switch" style="padding-top: 5px">
                                        <input type="checkbox" name="is_currency" value="1" {{$pagedata->is_currency==1?"checked":""}}>
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
                                                    <th style="width: 184px;">Name</th>
                                                    <th style="width: 184px;">Sign</th>
                                                    <th style="width: 184px;">Value</th>
                                                    <th style="width: 314px;">Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                              @foreach($faqs as $faq)    
                                              <tr>
                                                      <td> &nbsp;{{$faq->name}}</td>
                                                      <td> &nbsp;{{$faq->sign}}</td>
                                                      <td> &nbsp;{{$faq->value}}</td>
                                                      <td>
                                                        <a href="{{route('admin-currency-edit',$faq->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{route('admin-currency-delete',$faq->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                                                        @if($faq->is_default == 1)
                                                        <a class="btn btn-success product-btn"><i class="fa fa-check"></i> Default</a>
                                                        @else
                                                        <a class="btn btn-info product-btn" href="{{route('admin-currency-st',['id1'=>$faq->id,'id2'=>1])}}">Set Default</a>
                                                        @endif
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
          '<a href="{{route('admin-currency-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Create New Currency</a>'+
          '</div>');                                                                       
});
</script>

@endsection