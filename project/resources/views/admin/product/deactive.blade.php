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
                                                    <h2>Deactivated Products</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Products <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Deactivated Products</p>
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
                                                    <th style="width: 50px;">ID#</th>
                                                    <th style="width: 150px;">Product Title</th>
                                                    <th style="width: 100px;">Price</th>
                                                    <th style="width: 150px;">Category</th>
                                                    <th style="width: 150px;">Stock</th>
                                                    <th style="width: 130px;">Status</th>
                                                    <th style="width: 370px;">Actions</th></tr>
                                              </thead>

                                              <tbody>
                                              @foreach($prods as $prod)    
                                                        <tr>
                                                      <td>{{$prod->id}}</td>
                                                      <td>{{strlen($prod->name) > 50 ? substr($prod->name, 0, 50) : $prod->name}}</td>
                                                      <td> {{$sign->sign}}{{round(($prod->cprice * $sign->value), 2)}} </td>
                                                      <td>
                                                        {{$prod->category->cat_name}} <br>

                                                        @if($prod->subcategory_id != null)

                                                        {{$prod->subcategory->sub_name}} <br>

                                                        @if($prod->childcategory_id != null)
                                                        {{$prod->childcategory->child_name}}
                                                        @endif

                                                        @endif
                                                      </td>
  <td>
    @php
    $stck = (string)$prod->stock;
    @endphp
    @if($stck == "0")
    {{"Out Of Stock"}}
    @elseif($stck == null)
    {{"Unlimited"}}
    @else
    {{$prod->stock}}
    @endif
  </td>
                                                      <td>                                                        <span class="dropdown">
                                            <button class="btn btn-{{$prod->status == 1 ? "success" : "danger"}} product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">{{$prod->status == 1 ? "Activated" : "Deactivated"}}
                                                <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="{{route('admin-prod-st',['id1'=>$prod->id,'id2'=>1])}}">Active</a></li>
                                                            <li><a href="{{route('admin-prod-st',['id1'=>$prod->id,'id2'=>0])}}">Deactive</a></li>
                                                        </ul>
                                                        </span>
                                                      </td>
                                                      <td>

                                                        <a href="{{route('admin-prod-edit',$prod->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{route('admin-prod-delete',$prod->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                                                        <a style="cursor: pointer;" class="btn btn-info product-btn feature" data-toggle="modal" data-target="#feature">
                                                          <input type="hidden" value="{{$prod->id}}">
                                                          <i class="fa fa-star"></i> Highlight

                                                        </a>
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

    <div class="modal fade" id="feature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
    $(document).on("click", ".feature" , function(){
        var max = '';
        var pid = $(this).parent().find('input[type=hidden]').val();
        $("#feature .modal-content").html('');
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/feature')}}",
                    data:{id:pid},
                    success:function(data){
                      data[0] = data[0] == 1 ? "checked":"";
                      data[1] = data[1] == 1 ? "checked":"";
                      data[2] = data[2] == 1 ? "checked":"";
                      data[3] = data[3] == 1 ? "checked":"";
                      data[4] = data[4] == 1 ? "checked":"";
                      data[5] = data[5] == 1 ? "checked":"";
                        $("#feature .modal-content").append(''+
        '<form class="form-horizontal" action="{{url('/')}}/admin/product/feature/'+data[6]+'" method="POST">'+
        '{{csrf_field()}}'+
            '<div class="modal-header">'+
              '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                '<h4 class="modal-title text-center" id="myModalLabel2">Product Title:'+data[7]+'</h4>'+
                '</div>'+
                '<div class="modal-body">'+
                  '<div class="form-group">'+
                     '<label class="control-label" for="check1"></label>'+
                        '<div class="col-sm-9 col-sm-offset-3">'+
                           '<div class="btn btn-default checkbox1">'+
                              '<input type="checkbox" id="check1" name="featured" value="1" '+data[0]+'>'+ 
                                '<label for="check1">Add Product to {{$lang->bg}}</label>'+
                                  '</div>'+
                                  '</div>'+          
                                  '</div>'+
                                  '<div class="form-group">'+
                                '<label class="control-label" for="check2"></label>'+
                                '<div class="col-sm-9 col-sm-offset-3">'+
                                    '<div class="btn btn-default checkbox1">'+
                                    '<input type="checkbox" id="chec2" name="best" value="1" '+data[1]+'>'+
                                    '<label for="chec2">Add Product to {{$lang->lm}}</label>'+
                                  '</div>'+
                                  '</div>'+
                                 '</div>'+
                              '<div class="form-group">'+
                              '<label class="control-label" for="check3"></label>'+
                                '<div class="col-sm-9 col-sm-offset-3">'+
                                  '<div class="btn btn-default checkbox1">'+
                                    '<input type="checkbox" id="chec3" name="top" value="1" '+data[2]+'>'+
                                      '<label for="chec3">Add Product to {{$lang->rds}}</label>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>'+
                                      '<div class="form-group">'+
                                        '<label class="control-label" for="check4"></label>'+
                                          '<div class="col-sm-9 col-sm-offset-3">'+
                                            '<div class="btn btn-default checkbox1">'+
                                              '<input type="checkbox" id="check4" name="hot" value="1" '+data[3]+'>'+
                                                '<label for="check4">Add Product to {{$lang->hot_sale}}</label>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                              '<label class="control-label" for="check5"></label>'+
                                                '<div class="col-sm-9 col-sm-offset-3">'+
                                                  '<div class="btn btn-default checkbox1">'+
                                                    '<input type="checkbox" id="check5" name="latest" value="1" '+data[4]+'>'+
                                        '<label for="check5">Add Product to {{$lang->latest_special}}</label>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label class="control-label" for="check6"></label>'+
                                                '<div class="col-sm-9 col-sm-offset-3">'+
                                                  '<div class="btn btn-default checkbox1">'+
                                                    '<input type="checkbox" id="check6" name="big" value="1" '+data[5]+'>'+
                                                '<label for="check6">Add Product to {{$lang->big_sale}}</label>'+
                                                  '</div>'+
                                                '</div>'+
                                            '</div>'+
                '</div>'+
                '<div class="modal-footer" style="text-align: center;">'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>'+
                  '<button type="submit" class="btn btn-primary btn-ok">Update</button>'+'</div>'+
                  '</form>'
                  );            
              }
            });
    });
    </script>

@endsection