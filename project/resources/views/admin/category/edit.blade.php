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
                                                    <h2>Update Category <a href="{{ route('admin-cat-index') }}"
                                                                           style="padding: 5px 12px;"
                                                                           class="btn add-back-btn"><i
                                                                    class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right"
                                                                    style="margin: 0 2px;"></i> Manage Category <i
                                                                class="fa fa-angle-right" style="margin: 0 2px;"></i>
                                                        Main Category <i class="fa fa-angle-right"
                                                                         style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                            @include('includes.notification')
                                        </div>
                                    </div>
                                    <hr>
                                    <form class="form-horizontal" action="{{route('admin-cat-update',$cat->id)}}"
                                          method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group_display_name">
                                                Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="name"
                                                       id="edit_blood_group_display_name"
                                                       placeholder="Enter Category Name" required="" type="text"
                                                       value="{{$cat->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_blood_group_slug">Slug*
                                                <span>(In English)</span></label>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="slug" id="edit_blood_group_slug"
                                                       placeholder="Enter Category Slug" required="" type="text"
                                                       value="{{$cat->slug}}">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Current
                                                Photo*</label>
                                            <div class="col-sm-6">
                                                <img width="130px" height="90px" id="adminimg"
                                                     src="{{ $cat->photo ? asset('assets/images/'.$cat->photo):'http://fulldubai.com/SiteImages/noimage.png'}}"
                                                     alt="" id="adminimg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Edit Photo
                                                *</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                                <button type="button" id="uploadTrigger" onclick="uploadclick()"
                                                        class="form-control"><i class="fa fa-download"></i> Edit
                                                    Category Photo
                                                </button>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Category Backgroud Photo*</label>
                                            <div class="col-sm-6">
                                                <img width="130px" height="90px" id="catbackground" src="{{ $cat->cat_bg ? asset('assets/images/'.$cat->cat_bg):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Add Category Backgroud Photo *</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFilebg" class="hidden" name="catbg" value="">
                                                <button type="button" id="catbg"  onclick="uploadclick1()" class="form-control"><i class="fa fa-download"></i> Add Category Photo</button>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Category Slider 1 Photo*</label>
                                            <div class="col-sm-6">
                                                <img width="130px" height="90px" id="catslider1" src="{{ $cat->slider_1 ? asset('assets/images/'.$cat->slider_1):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Add Category Slider 1 Photo *</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile1" class="hidden" name="slider[]" value="">
                                                <button type="button" id="uploadSliderTrigger1"  onclick="uploadclick2('1')" class="form-control"><i class="fa fa-download"></i> Add Category Photo</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Category Slider 2 Photo*</label>
                                            <div class="col-sm-6">
                                                <img width="130px" height="90px" id="catslider2" src="{{ $cat->slider_2 ? asset('assets/images/'.$cat->slider_2):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Add Category Slider 2 Photo *</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile2" class="hidden" name="slider[]" value="">
                                                <button type="button" id="uploadSliderTrigger2"  onclick="uploadclick2('2')" class="form-control"><i class="fa fa-download"></i> Add Category Photo</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Category Slider 3 Photo*</label>
                                            <div class="col-sm-6">
                                                <img width="130px" height="90px" id="catslider3" src="{{ $cat->slider_3 ? asset('assets/images/'.$cat->slider_3):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Add Category Slider 3 Photo *</label>
                                            <div class="col-sm-6">
                                                <input type="file" id="uploadFile3" class="hidden" name="slider[]" value="">
                                                <button type="button"  id="uploadSliderTrigger3" onclick="uploadclick2('3')" class="form-control"><i class="fa fa-download"></i> Add Category Photo</button>
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

        function uploadclick(){
            $("#uploadFile").click();
            $("#uploadFile").change(function(event) {
                readURL(this);
                $("#uploadTrigger").html($("#uploadFile").val());
            });


        }

        function uploadclick1(){
            $("#uploadFilebg").click();
            $("#uploadFilebg").change(function(event) {
                readURL(this,("catbackground"));
                $("#catbg").html($("#uploadFilebg").val());
            });


        }

        function uploadclick2(id){
            $("#uploadFile"+id).click();
            $("#uploadFile"+id).change(function(event) {
                readURL(this,("catslider"+id));
                $("#uploadSliderTrigger"+id).html($("#uploadFile"+id).val());
            });


        }

        function readURL(input,id=null){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if(id==null){
                        $('#adminimg').attr('src', e.target.result);
                    }else{
                        $('#'+id).attr('src', e.target.result);
                    }

                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection