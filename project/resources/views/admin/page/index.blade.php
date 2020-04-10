@extends('layouts.admin')

@section('styles')

@endsection

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
                                                    <h2>Others Pages</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Home Page Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Others Pages</p>
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
                                                  <tr role="row">
                                                    <th style="width: 194px;">Title</th>
                                                    <th style="width: 420px;">Text</th>
                                                    <th style="width: 314px;">Actions</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($pages as $page)    
                                              <tr>

                                                <input type="hidden" name="pos[]" value="{{$page->id}}">
                                                      <td>{{$page->title}}</td>
                                                      <td>{{(substr(strip_tags($page->text), 0, 700))}}</td>
                                                      <td>
                                                        <a href="{{route('admin-page-edit',$page->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{route('admin-page-delete',$page->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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
<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script> 
<script type="text/javascript">
$( "tbody" ).css('cursor','pointer');
$( "tbody" ).sortable({
    update: function( event, ui ) {
      var pos = $("input[name='pos[]']").map(function(){return $(this).val();}).get();
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/pos')}}",
                    data:{pos:pos},
                    success:function(data){
                      }
              }); 

    }
});

  $( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">'+
          '<a href="{{route('admin-page-create')}}" class="add-newProduct-btn">'+
          '<i class="fa fa-plus"></i> Create New Page</a>'+
          '</div>');                                                                       
});
</script>

@endsection