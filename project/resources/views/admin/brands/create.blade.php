@extends('layouts.admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="product__header" style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Create Brand <a href="{{ route('admin-img-index') }}"
                                                                        style="padding: 5px 12px;"
                                                                        class="btn add-back-btn"><i
                                                                    class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right"
                                                                    style="margin: 0 2px;"></i> Home Page Settings <i
                                                                class="fa fa-angle-right" style="margin: 0 2px;"></i>
                                                        Brands <i class="fa fa-angle-right" style="margin: 0 2px;"></i>
                                                        Create
                                                </div>
                                            </div>
                                            @include('includes.notification')
                                        </div>
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('admin-img-create')}}" method="POST"
                                          enctype="multipart/form-data">
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="b1">Name *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="name" id="b1"
                                                       placeholder="enter brand name" value="" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="b1">URL *</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="url" id="b1"
                                                       placeholder="https://www.google.com" value="" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current
                                                Image*</label>
                                            <div class="col-sm-6">

                                                <img id="adminimg" src="" alt="" id="adminimg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Select
                                                Image</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                                <button type="button" id="uploadTrigger" onclick="uploadclick()"
                                                        class="form-control"><i class="fa fa-download"></i> Choose Image
                                                </button>
                                                <p>Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn add-product_btn">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')


    <script type="text/javascript">

        function uploadclick() {
            $("#uploadFile").click();
            $("#uploadFile").change(function (event) {
                readURL(this);
                $("#uploadTrigger").html($("#uploadFile").val());
            });

        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection

