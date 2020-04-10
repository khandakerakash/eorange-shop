@extends('layouts.user')

@section('styles')

<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<style type="text/css">
    .colorpicker-alpha {display:none !important;}
    .colorpicker{ min-width:128px !important;}
    .colorpicker-color {display:none !important;}
    .add-product-box .form-horizontal .form-group:last-child {margin-bottom: 20px; }
</style>

@endsection

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
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Edit Product <a href="{{ route('user-prod-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Products <i class="fa fa-angle-right" style="margin: 0 2px;"></i>Update</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                                        <form class="form-horizontal" action="{{route('user-prod-update',$prod->id)}}" method="POST" enctype="multipart/form-data">
                        @include('includes.form-success')
                                          @include('includes.form-error')
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Name* <span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="name" id="blood_group_display_name" placeholder="Enter Product Name" required="" value="{{$prod->name}}" type="text" >
                                            </div>
                                          </div>

                 <div class="form-group">
                                                <label class="control-label col-sm-4" for="sku">Product SKU* </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="sku" id="sku" placeholder="Enter Product SKU" required="" value="{{$prod->sku}}" type="text" >
                                                </div>
                                            </div>

                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check10" name="pccheck" value="1" {{$prod->product_condition != 0 ? "checked":""}}> 
                                              <label for="check10">Allow Product Condition</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg2" {!! $prod->product_condition == 0 ? "style='display: none;'":"" !!}>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="product_condition">Product Condition*</label>
                                            <div class="col-sm-6"> 
                                            <select class="form-control" id="product_condition" name="product_condition">
                                                  <option value="0" >Select Condition</option>
                                                  <option value="1" {{$prod->product_condition == 1 
                                                    ? "selected":""}}>Used</option>
                                                  <option value="2" {{$prod->product_condition == 2 
                                                    ? "selected":""}}>New</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="cat">Category*</label>
                                                <div class="col-sm-6">

                                                    <select class="js-example-basic-multiple form-group" name="categories[]"
                                                            multiple="multiple">

                                                        @foreach($cats as $cat)

                                                            <optgroup label="{{$cat->name}}">

                                                                @if(count($cat->subCategory))
                                                                    @foreach($cat->subCategory as $sub)
                                                                        @if(count($sub->subCategory))
                                                                            <optgroup label="{{$sub->name}}">
                                                                                @foreach($sub->subCategory as $child)
                                                                                    <option {{ $selectedCategory->contains($child->id)==true?" selected":"" }} value="{{$child->id}}">{{$child->name}}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @else
                                                                            <option {{ $selectedCategory->contains($sub->id)==true?" selected":"" }} value="{{$sub->id}}">{{$sub->name}}</option>
                                                                        @endif

                                                                    @endforeach

                                                                @endif
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="cat">Brands**</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control"  name="brand_id"  >
                                                        <option value="" >Select Brand</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{$brand->id}}" {{$brand->id == $prod->brand_id ? "selected":""}} >{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_photo">Current Featured Image*</label>
                                            <div class="col-sm-6">
                                             <img id="adminimg" src="{{asset('assets/images/'.$prod->photo)}}" alt="" style="width: 400px; height: 300px;">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Select Image *</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Edit Featured Image</button>
                                              <p>Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                          </div>
                                      <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox3">
                                              <input type="checkbox" id="check33" name="galdel" value="1"> 
                                              <label for="check33">Delete Old Gallery Images</label>
                                              </div>
                                            </div>          
                                        </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_photo">Product Gallery Images *<span></span></label>
                                            <div class="col-sm-6">
                                            <input type="file" accept="image/*" name="gallery[]" multiple/>
                                              <p style="text-align: left;">Multiple Image Allowed</p>
                                            </div>
                                          </div>
                                        <hr>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check11" name="shcheck" value="1" {{$prod->ship != null ? "checked":""}}> 
                                              <label for="check11">Allow Estimated Shipping Time</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg3" {!! $prod->ship == null ? "style='display: none;'":"" !!}>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="ship_time">Product Estimated Shipping Time*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="ship" id="ship_time" placeholder="Estimated Shipping Time" value=" {{ $prod->ship != null ? $prod->ship:"" }}" type="text">
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check2" name="scheck" value="1" {{$prod->size != null ? "checked":""}}> 
                                              <label for="check2">Allow Product Sizes</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg" {!! $prod->size == null ? "style='display: none;'":"" !!}>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Sizes* <span>(Write your own size Separated by Comma[,])</span></label>
                                            <div class="col-sm-6">
                                              <ul id="size">
                                                @if(!empty($size))
                                                @foreach($size as $sz)
                                                <li>{{$sz}}</li>
                                                @endforeach
                                                @else
                                                <li>X</li>
                                                <Li>XL</Li>
                                                <li>XXL</li>
                                                <li>M</li>
                                                <li>L</li>
                                                <li>S</li>
                                                @endif
                                              </ul>
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check9" name="colcheck" value="1" {{$prod->color != null ? "checked":""}}> 
                                              <label for="check9">Allow Product Colors</label>
                                              </div>
                                            </div>          
                                        </div> 

                                        <div id="fimg1" {!! $prod->color == null ? "style='display: none;'":"" !!}>
                                          <div class="color-area" id="q1">
                                          @if(!empty($colrs))
                                          @foreach($colrs as $colr)
                                           <div class="form-group  single-color">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Colors* <span>(Choose Your Favourite Color.)</span></label>
                                            <div class="col-sm-6">
                  <div class="input-group colorpicker-component">
                <input type="text" name="color[]" value="{{$colr}}"    class="form-control colorpick"  />
                    <span class="input-group-addon"><i></i></span>
                      </div>
                                            </div>
                                          <span class="ui-close1" id="parentclose">X</span>
                                          </div> 
                                          @endforeach
                                          @else
                                           <div class="form-group  single-color">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Colors* <span>(Choose Your Favourite Color.)</span></label>
                                            <div class="col-sm-6">
                  <div class="input-group colorpicker-component">
                <input type="text" name="color[]" value="#000000"    class="form-control colorpick"  />
                    <span class="input-group-addon"><i></i></span>
                      </div>
                                            </div>
                                          <span class="ui-close1" id="parentclose">X</span>
                                          </div> 
                                          @endif  
                                          </div>

                                          <br>
                            <div class="form-group">
                                <div class="col-sm-5 col-sm-offset-4">
                                  <button class="btn btn-default featured-btn" type="button" id="add-color"><i class="fa fa-plus"></i> Add More Color</button>
                                </div>
                              </div>
                              <br>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="profile_description">Product Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="description" id="profile_description" rows="5" style="resize: vertical;" placeholder="Enter Profile Description">{{$prod->description}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Current Price* <span>(In {{$sign->name}})</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="cprice" id="blood_group_display_name" placeholder="e.g 20" required=""  value="{{round($prod->cprice * $sign->value , 2)}}" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Previous Price* <span>(In {{$sign->name}}, Leave Blank if not Required)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="pprice" id="blood_group_display_name" placeholder="e.g 25"  value="{{round($prod->pprice * $sign->value , 2)}}"  type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="blood_group_display_name">Product Stock* <span>(Leave Empty will Show Always Available)</span></label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="stock" id="blood_group_display_name" placeholder="e.g 15"  value="{{$prod->stock}}"  type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="policy">Product Buy/Return Policy*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="policy" id="policy" rows="5" style="resize: vertical;" placeholder="Enter Profile Description">{{$prod->policy}}</textarea>
                                            </div>
                                          </div>
                                  <div class="form-group">
                                            <label class="control-label col-sm-4" for="email"></label>
                                            <div class="col-sm-6">
                                              <div class="checkbox2">
                                              <input type="checkbox" id="check12" name="secheck" value="1"  {{ ($prod->meta_tag != null || $prod->meta_description != null) ? 'checked':'' }}>

                                              <label for="check12">Allow Product SEO</label>
                                              </div>
                                            </div>          
                                        </div> 
                                        <div id="fimg4" {!! ($prod->meta_tag == null || $prod->meta_description == null) ? "style='display: none;'":"" !!}>  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="metaTags">Product Meta Tags*<span>(Write meta tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="metaTags">
                                                        @if(!empty($metatags))
                                                            @foreach($metatags as $tag)
                                                                <li>{{$tag}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="meta_description">Meta Description*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="meta_description" id="meta_description" rows="5" style="resize: vertical;" placeholder="Enter Meta Description">{{$prod->meta_description}}</textarea>
                                            </div>
                                          </div>
                                          <br>
                                        </div>
                          <div class="profile-filup-description-box margin-bottom-30">
                            <h2 class="text-center">Feature Tags</h2>
                            <div class="qualification" id="q">
                              @if($prod->features!=null && $prod->colors!=null)
                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                              <div class="qualification-area">
                                  <div class="form-group">
                                      <div class="col-xs-10 col-sm-5 col-md-offset-1">
                                        <input class="form-control" name="features[]" id="title" placeholder="Name" type="text" value="{{$ttl}}">
                                      </div>
                                      <div class="col-xs-4 col-sm-2">
                                        <label class="control-label"> Choose Your Color: </label>
                                      </div>
                                      <div class="col-xs-6 col-sm-3">
                                              <div  class="input-group colorpicker-component">
                                  <input type="text" name="colors[]"   value="{{$dtl}}"  class="form-control colorpick"  />
                                    <span class="input-group-addon"><i></i></span>
                                    </div>
                                      </div>
                                </div>
                                <span class="ui-close">X</span>
                              </div>
                              @endforeach
                              @else
                              <div class="qualification-area">
                                  <div class="form-group">
                                      <div class="col-sm-5 col-md-offset-1">
                                        <input class="form-control" name="features[]" id="title" placeholder="Name" type="text" value="">
                                      </div>
                                      <div class="col-sm-2">
                                        <label class="control-label"> Choose Your Color: </label>
                                      </div>
                                      <div class="col-sm-3">
                                              <div  class="input-group colorpicker-component">
                                  <input type="text" name="colors[]" value="#000000"    class="form-control colorpick"  />
                                    <span class="input-group-addon"><i></i></span>
                                    </div>
                                      </div>
                                </div>
                                <span class="ui-close" id="parentclose">X</span>
                              </div>
                              @endif

    </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for=""></label>
                                <div class="col-sm-12 text-center">
                                  <input type="hidden" id="tttl" value="Name">
                                  <input type="hidden" id="dddc" value="Color">
                                  <button class="btn btn-default featured-btn" type="button" name="add-field-btn" id="add-field-btn"><i class="fa fa-plus"></i> Add More Field</button>
                                </div>
                              </div>
                          </div>


                          <br>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="blood_group_display_name">Product Tags* <span>(Write your product tags Separated by Comma[,])</span></label>
                                                <div class="col-sm-6">
                                                    <ul id="myTags">
                                                        @if(!empty($tags))
                                                            @foreach($tags as $tag)
                                                                <li>{{$tag}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>
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

@if($gs->rtl ==1)
<style type="text/css">
  ul.tagit li {
    float: right;
  }
  ul.tagit input[type="text"] {
    direction: rtl;
  }
.nicEdit-main{
     text-align: right;
     direction: rtl;
}
</style>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script type="text/javascript">

    $('.colorpicker-component').colorpicker();
    $('.colorpick').colorpicker();
</script>
<script type="text/javascript">
$("#check2").change(function() {
    if(this.checked) {
        $("#fimg").show();
    }
    else
    {
        $("#fimg").hide();

    }
});
</script>

<script type="text/javascript">
$("#check9").change(function() {
    if(this.checked) {
        $("#fimg1").show();
    }
    else
    {
        $("#fimg1").hide();

    }
});
$("#check10").change(function() {
    if(this.checked) {
        $("#fimg2").show();
    }
    else
    {
        $("#fimg2").hide();

    }
});
$("#check11").change(function() {
    if(this.checked) {
        $("#fimg3").show();
    }
    else
    {
        $("#fimg3").hide();

    }
});
$("#check12").change(function() {
    if(this.checked) {
        $("#fimg4").show();
    }
    else
    {
        $("#fimg4").hide();

    }
});
</script>

<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { 
            new nicEditor().panelInstance('profile_description');
            new nicEditor().panelInstance('policy');
        });
  //]]>
</script>

<script type="text/javascript">
  
  function uploadclick(){
    $("#uploadFile").click();
    $("#uploadFile").change(function(event) {
          readURL(this);
        $("#uploadTrigger").html($("#uploadFile").val());
    });
}


  function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#adminimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
}

</script>

<script type="text/javascript">

  $('#cat').on('change', function() {
    var cat = $(this).val();

      $('#subcat').html('<option >Select Sub Category</option>');
      $('#subcat').attr('disabled', true);  
      $('#childcat').html('<option >Select Child Category</option>');
      $('#childcat').attr('disabled', true);   
    
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/subcats')}}",
            data:{id:cat},
            success:function(data){
                  $('#subcat').html('<option  value="">Select Sub Category</option>');

                   for(var k in data)
                    {
                      $('#subcat').append('<option  value="'+data[k]['id']+'">'+data[k]['sub_name']+'</option>');                      
                    } 
                    if(data != "")
                    {
                     $('#subcat').attr('disabled', false);                        
                    }
                
                }
              
      });      
    
});

  $('#subcat').on('change', function() {
    var subcat = $(this).val();

      $('#childcat').html('<option >Select Child Category</option>'); 
      $('#childcat').attr('disabled', true);  
        $.ajax({
            type: "GET",
            url:"{{URL::to('json/childcats')}}",
            data:{id:subcat},
            success:function(data){
                  $('#childcat').html('<option  value="">Select Child Category</option>');

                   for(var k in data)
                    {
                      $('#childcat').append('<option  value="'+data[k]['id']+'">'+data[k]['child_name']+'</option>');                      
                    } 
                    if(data != "")
                    {
                      $('#childcat').attr('disabled', false); 
                      }              
                }
              
      });      
    


});
</script>
  
<script type="text/javascript">
      $(document).on('click','#add-color',function() {

        $(".color-area").append('<div class="form-group single-color">'+
                ' <label class="control-label col-sm-4" for="blood_group_display_name">'+
                 ' Product Colors* <span>(Choose Your Favourite Color.)</span></label>'+
                  '<div class="col-sm-6">'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="color[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                      '</div>'+
                   '</div>'+
                   '<span class="ui-close1">X</span>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();

    });

  function isEmpty(el){
      return !$.trim(el.html())
  }


  $(document).on('click', '.ui-close1' ,function() {
    $(this.parentNode).hide();
    $(this.parentNode).remove();
    if (isEmpty($('#q1'))) {

        $(".color-area").append('<div class="form-group single-color">'+
                ' <label class="control-label col-sm-4" for="blood_group_display_name">'+
                 ' Product Colors* <span>(Choose Your Favourite Color.)</span></label>'+
                  '<div class="col-sm-6">'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="color[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                      '</div>'+
                   '</div>'+
                   '<span class="ui-close1">X</span>'+
                 '</div>');
        
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();
    }
  });
</script>


<script type="text/javascript">
      $(document).on('click','#add-field-btn',function() {
      var title = $('#tttl').val();
        $(".qualification").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-10 col-sm-5 col-md-offset-1">'+
'<input type="text" class="form-control"  name="features[]" id="title" placeholder="'+title+'" required="">'+
                   '</div>'+
                   '<div class="col-xs-4 col-sm-2">'+
                   '<label class="control-label"> Choose Your Color: </label>'+
                   '</div>'+                  
                   '<div class="col-xs-6 col-sm-3">'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '<span class="ui-close">X</span>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();

    });

  function isEmpty(el){
      return !$.trim(el.html())
  }


  $(document).on('click', '.ui-close' ,function() {
    $(this.parentNode).hide();
    $(this.parentNode).remove();
    if (isEmpty($('#q'))) {
      var title = $('#tttl').val();

        $(".qualification").append('<div class="qualification-area">'+
                '<div class="form-group">'+
                 '<div class="col-xs-10 col-sm-5 col-md-offset-1">'+
'<input  type="text" class="form-control" name="features[]" id="title" placeholder="'+title+'" required="">'+
                   '</div>'+
                   '<div class="col-xs-4 col-sm-2">'+
                   '<label class="control-label"> Choose Your Color: </label>'+
                   '</div>'+                  
                   '<div class="col-xs-6 col-sm-3">'+
                  '<div class="input-group colorpicker-component">'+
                '<input  type="text" name="colors[]" value="#000000"  class="form-control colorpick"  />'+
                    '<span class="input-group-addon"><i></i></span>'+
                      '</div>'+
                    '</div>'+
                    '</div>'+
                  '<span class="ui-close">X</span>'+
                  '</div>'+
                 '</div>');
            $('.colorpicker-component').colorpicker();
            $('.colorpick').colorpicker();
    }
  });
</script>

<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>    
<script src="{{asset('assets/admin/js/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#size").tagit({
          fieldName: "size[]",
          allowSpaces: true 
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#myTags").tagit({
          fieldName: "tags[]",
          allowSpaces: true 
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#metaTags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
        });
    });
</script>

@endsection