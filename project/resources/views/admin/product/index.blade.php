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
                                                    <h2>All Products</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right"
                                                                    style="margin: 0 2px;"></i> Products <i
                                                                class="fa fa-angle-right" style="margin: 0 2px;"></i>
                                                        All Products</p>
                                                </div>
                                                <div>
                                                    @include('includes.form-error')
                                                    @include('includes.form-success')
                                                </div>
                                            </div>
                                            @include('includes.notification')
                                        </div>
                                    </div>
                                    <admin_product_index route="{{route('admin-prod-get-data')}}"></admin_product_index>
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
        $(document).ready(function() {
            /*$('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('admin-prod-get-data')}}",
                "columns": [
                    { "data": "id" },

                    {
                        "data": "photo",
                        "name":"photo",
                        "render":function (data,type,full,meta) {
                            return '<img src="{{ URL::to('/') }}/assets/images/'+data+'" alt="" style="height: 50px;">';
                        }
                    },
                    {
                        "data": "shop_name",
                        "name":"shop_name",
                        "render":function (data,type,full,meta) {
                            if(data.name){
                            return '<a href="'+data.route+'" target="_blank">'+data.name+'</a>'
                            }
                            return '';
                        }
                    },
                    {
                        "data": "name",
                        "name":"name",
                        "render":function (data,type,full,meta) {
                            return '<a href="'+data.route+'" target="_blank">'+data.name+'</a>'
                        }
                    },
                    {
                        "data": "price",
                        "name":"price",
                        "render":function (data,type,full,meta) {
                            return data.sign+''+data.price;
                        }
                    },
                    {
                        "data": "latest_category",
                        "name":"latest_category",
                        "render":function (data,type,full,meta) {
                            return '';
                        }
                    },
                    {"data": "stock"},
                    {
                        "data": "status",
                        "name":"status",
                        "render":function (data,type,full,meta) {
                                    var classs =  data.value == 1?'success':'danger';
                                    var label = data.value == 1?'Active':'Inactive';
                            return '<div class="dropdown"><button class="btn btn-'+classs+' product-btn dropdown-toggle btn-xs" type="button" data-toggle="dropdown" style="font-size: 14px;">'+label+'<span class="caret"></span></button>\n' +
                                '                                                        <ul class="dropdown-menu">\n' +
                                '                                                            <li><a href="'+data.active_route+'">Active</a></li>\n' +
                                '                                                            <li><a href="'+data.inactive_route+'">Deactive</a></li>\n' +
                                '                                                        </ul>\n' +
                                '                                                        </span></div>';
                        }
                    },
                    {
                        "data": "action",
                        "name":"action",
                        "render":function (data,type,full,meta) {
                                   var html = '';
                            html +=' <a href="'+data.route.edit+'" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>';
                            html +='<a href="'+data.route.delete+'" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>';
                            html +='<a style="cursor: pointer;"  class="btn btn-info product-btn feature" data-toggle="modal" data-target="#feature"> <input type="hidden" value="'+data.id+'">  <i class="fa fa-star"></i> Highlight </a>';
                                return html;
                        }
                    },

                ]
            } );*/
        } );
        $(document).on("click", ".feature", function () {
            var max = '';
            var pid = $(this).parent().find('input[type=hidden]').val();
            $("#feature .modal-content").html('');
            $.ajax({
                type: "GET",
                url: "{{URL::to('/json/feature')}}",
                data: {id: pid},
                success: function (data) {
                    data[0] = data[0] == 1 ? "checked" : "";
                    data[1] = data[1] == 1 ? "checked" : "";
                    data[2] = data[2] == 1 ? "checked" : "";
                    data[3] = data[3] == 1 ? "checked" : "";
                    data[4] = data[4] == 1 ? "checked" : "";
                    data[5] = data[5] == 1 ? "checked" : "";
                    $("#feature .modal-content").append('' +
                        '<form class="form-horizontal" action="{{url('/')}}/admin/product/feature/' + data[6] + '" method="POST">' +
                        '{{csrf_field()}}' +
                        '<div class="modal-header">' +
                        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                        '<h4 class="modal-title text-center" id="myModalLabel2">Product Title:' + data[7] + '</h4>' +
                        '</div>' +
                        '<div class="modal-body">' +
                        '<div class="form-group">' +
                        '<label class="control-label" for="check1"></label>' +
                        '<div class="col-sm-9 col-sm-offset-3">' +
                        '<div class="btn btn-default checkbox1">' +
                        '<input type="checkbox" id="check1" name="featured" value="1" ' + data[0] + '>' +
                        '<label for="check1">Add Product to {{$lang->bg}}</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="control-label" for="check2"></label>' +
                        '<div class="col-sm-9 col-sm-offset-3">' +
                        '<div class="btn btn-default checkbox1">' +
                        '<input type="checkbox" id="chec2" name="best" value="1" ' + data[1] + '>' +
                        '<label for="chec2">Add Product to {{$lang->lm}}</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="control-label" for="check3"></label>' +
                        '<div class="col-sm-9 col-sm-offset-3">' +
                        '<div class="btn btn-default checkbox1">' +
                        '<input type="checkbox" id="chec3" name="top" value="1" ' + data[2] + '>' +
                        '<label for="chec3">Add Product to {{$lang->rds}}</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="control-label" for="check4"></label>' +
                        '<div class="col-sm-9 col-sm-offset-3">' +
                        '<div class="btn btn-default checkbox1">' +
                        '<input type="checkbox" id="check4" name="hot" value="1" ' + data[3] + '>' +
                        '<label for="check4">Add Product to {{$lang->hot_sale}}</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="control-label" for="check5"></label>' +
                        '<div class="col-sm-9 col-sm-offset-3">' +
                        '<div class="btn btn-default checkbox1">' +
                        '<input type="checkbox" id="check5" name="latest" value="1" ' + data[4] + '>' +
                        '<label for="check5">Add Product to {{$lang->latest_special}}</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="control-label" for="check6"></label>' +
                        '<div class="col-sm-9 col-sm-offset-3">' +
                        '<div class="btn btn-default checkbox1">' +
                        '<input type="checkbox" id="check6" name="big" value="1" ' + data[5] + '>' +
                        '<label for="check6">Add Product to {{$lang->big_sale}}</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="modal-footer" style="text-align: center;">' +
                        '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>' +
                        '<button type="submit" class="btn btn-primary btn-ok">Update</button>' + '</div>' +
                        '</form>'
                    );
                }
            });
        });
        $(document).ready(function () {
            /*$(".add-button").append('<div class="col-sm-4 add-product-btn text-right">' +
                '<a href="{{route('admin-prod-create')}}" class="add-newProduct-btn">' +
                '<i class="fa fa-plus"></i> Create New Product</a>' +
                '</div>');*/
        });
    </script>

@endsection