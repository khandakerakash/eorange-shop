                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="product-filter-option">
                        <h2 class="filter-title">{{$lang->doa}}</h2>

                            <div class="form-group from-group-left">
                              <select id="sortby" class="form-control">
                                @if($sort == "new")
                                    <option value="new" selected>{{$lang->doe}}</option>
                                @else
                                    <option value="new">{{$lang->doe}}</option>
                                @endif
                                @if($sort == "old")
                                    <option value="old" selected>{{$lang->dor}}</option>
                                @else
                                    <option value="old">{{$lang->dor}}</option>
                                @endif
                                @if($sort == "low")
                                    <option value="low" selected>{{$lang->dopr}}</option>
                                @else
                                    <option value="low">{{$lang->dopr}}</option>
                                @endif
                                @if($sort == "high")
                                    <option value="high" selected>{{$lang->doc}}</option>
                                @else
                                    <option value="high">{{$lang->doc}}</option>
                                @endif
                              </select>
                            </div>
                    </div>

@if($gs->rtl == 1)

@if(isset($vendor))
    <div class="product-filter-option">
        <h2 class="filter-title">{{$lang->doci}}</h2>
            <ul style="text-align: right;">
@php
$x=0;
$s = 0;
$c = 0;
@endphp
        @foreach($categories as $ctgry )
        @if(count($ctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
        <li>
         @if(count($ctgry->subs) > 0)
          @foreach($ctgry->subs()->where('status','=',1)->get() as $subctgry)
           @if(count($subctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
            @php
            $s = 1;
            break;
            @endphp
           @endif
          @endforeach
         @if($s == 1)
        <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                <i class="fa fa-plus"></i><i class="fa fa-minus"></i> </span>
         @else
                &nbsp;<i class="fa fa-angle-left"></i>
         @endif
        @php
        $s = 0;
        @endphp
        @else
        &nbsp;<i class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp;
        @endif
        <a href="{{route('front.vendor.category',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' => $ctgry->cat_slug])}}">{{$ctgry->cat_name}}</a>
         @if(count($ctgry->subs) > 0)
           <ul id="filter{{$x}}" class="collapse">

    @foreach($ctgry->subs()->where('status','=',1)->get() as $subctgry)
        @if(count($subctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
            <li>
        @if(count($subctgry->childs) > 0)
           @foreach($subctgry->childs()->where('status','=',1)->get() as $childctgry)
           @if(count($childctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
             @php
               $c = 1;
               break;
              @endphp
            @endif
            @endforeach
        @if($c == 1)
          <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                <i class="fa fa-plus"></i><i class="fa fa-minus"></i> </span>
         @else
          <i class="fa fa-angle-left"></i>
         @endif
        @php
        $c=0;
        @endphp
        @else
        <i class="fa fa-angle-left"></i>
        @endif
<a href="{{route('front.vendor.subcategory',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' => $subctgry->sub_slug])}}">{{$subctgry->sub_name}}</a>
    @if(count($subctgry->childs) > 0)
    <ul id="filter{{$x}}" class="collapse">


    @foreach($subctgry->childs()->where('status','=',1)->get() as $childctgry)
        @if(count($childctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
    <li><i class="fa fa-angle-left"></i><a href="{{route('front.vendor.childcategory',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' =>$childctgry->child_slug])}}">{{$childctgry->child_name}}</a></li>
        @endif
    @endforeach
    </ul>
 @endif
            </li>
          @endif
         @endforeach
         </ul>
        @endif
       </li>
      @endif
     @endforeach

      </ul>
  </div>
                    @else

                                    <div class="product-filter-option">
                                        <h2 class="filter-title">{{$lang->doci}}</h2>
                                        <ul style="text-align: right;">
                                            @php
                                            $x=0;
                                            @endphp
                                         @foreach($categories as $ctgry )
                                            <li>
                                                    @if(count($ctgry->subs) > 0)
                                                <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                                                    <i class="fa fa-plus"></i><i class="fa fa-minus"></i> 
                                                    @else
                                                    &nbsp;<i class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                </span>
                                                <a href="{{route('front.category',$ctgry->cat_slug)}}">{{$ctgry->cat_name}}</a>
                                                @if(count($ctgry->subs) > 0)
                                                <ul id="filter{{$x}}" class="collapse">
                                                    @foreach($ctgry->subs()->where('status','=',1)->get() as $subctgry)
                                                    <li>
                                                        @if(count($subctgry->childs) > 0)
                                                        <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                                                        <i class="fa fa-plus"></i><i class="fa fa-minus"></i> 
                                                        </span>
                                                        @else
                                                        <i class="fa fa-angle-left"></i>
                                                        @endif
                                                        <a href="{{route('front.subcategory',$subctgry->sub_slug)}}">{{$subctgry->sub_name}}</a>
                                                        @if(count($subctgry->childs) > 0)
                                                        <ul id="filter{{$x}}" class="collapse">
                                                            @foreach($subctgry->childs()->where('status','=',1)->get() as $childctgry)
                                                            <li><i class="fa fa-angle-left"></i><a href="{{route('front.childcategory',$childctgry->child_slug)}}">{{$childctgry->child_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                    @endif

@else

@if(isset($vendor))
    <div class="product-filter-option">
        <h2 class="filter-title">{{$lang->doci}}</h2>
            <ul style="direction: ltr;">
@php
$x=0;
$s = 0;
$c = 0;
@endphp
        @foreach($categories as $ctgry )
        @if(count($ctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
        <li>
         @if(count($ctgry->subs) > 0)
          @foreach($ctgry->subs()->where('status','=',1)->get() as $subctgry)
           @if(count($subctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
            @php
            $s = 1;
            break;
            @endphp
           @endif
          @endforeach
         @if($s == 1)
        <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                <i class="fa fa-plus"></i><i class="fa fa-minus"></i> </span>
         @else
                &nbsp;<i class="fa fa-angle-right"></i>
         @endif
        @php
        $s = 0;
        @endphp
        @else
        &nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;
        @endif
        <a href="{{route('front.vendor.category',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' => $ctgry->cat_slug])}}">{{$ctgry->cat_name}}</a>
         @if(count($ctgry->subs) > 0)
           <ul id="filter{{$x}}" class="collapse">

    @foreach($ctgry->subs()->where('status','=',1)->get() as $subctgry)
        @if(count($subctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
            <li>
        @if(count($subctgry->childs) > 0)
           @foreach($subctgry->childs()->where('status','=',1)->get() as $childctgry)
           @if(count($childctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
             @php
               $c = 1;
               break;
              @endphp
            @endif
            @endforeach
        @if($c == 1)
          <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                <i class="fa fa-plus"></i><i class="fa fa-minus"></i> </span>
         @else
          <i class="fa fa-angle-right"></i>
         @endif
        @php
        $c=0;
        @endphp
        @else
        <i class="fa fa-angle-right"></i>
        @endif
<a href="{{route('front.vendor.subcategory',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' => $subctgry->sub_slug])}}">{{$subctgry->sub_name}}</a>
    @if(count($subctgry->childs) > 0)
    <ul id="filter{{$x}}" class="collapse">


    @foreach($subctgry->childs()->where('status','=',1)->get() as $childctgry)
        @if(count($childctgry->products()->where('user_id','=',$vendor->id)->get()) > 0)
    <li><i class="fa fa-angle-right"></i><a href="{{route('front.vendor.childcategory',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' =>$childctgry->child_slug])}}">{{$childctgry->child_name}}</a></li>
        @endif
    @endforeach
    </ul>
 @endif
            </li>
          @endif
         @endforeach
         </ul>
        @endif
       </li>
      @endif
     @endforeach

      </ul>
  </div>
                    @else

                                    <div class="product-filter-option">
                                        <h2 class="filter-title">{{$lang->doci}}</h2>
                                        <ul style="direction: ltr;">
                                            @php
                                            $x=0;
                                            @endphp
                                         @foreach($categories as $ctgry )
                                            <li>
{{--                                                @dd($ctgry->subCategory)--}}
                                                    @if(count($ctgry->subCategory) > 0)
                                                <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                                                    <i class="fa fa-plus"></i><i class="fa fa-minus"></i> 
                                                    @else
                                                    &nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                </span>
                                                <a href="{{route('front.category',$ctgry->slug)}}">{{$ctgry->cat_name}}</a>
                                                @if(count($ctgry->subCategory) > 0)
                                                <ul id="filter{{$x}}" class="collapse">
                                                    @foreach($ctgry->subCategory()->where('status','=',1)->get() as $subctgry)
                                                    <li>
                                                        @if(count($subctgry->subCategory) > 0)
                                                        <span href="#filter{{++$x}}" aria-expanded="false" data-toggle="collapse">
                                                        <i class="fa fa-plus"></i><i class="fa fa-minus"></i> 
                                                        </span>
                                                        @else
                                                        <i class="fa fa-angle-right"></i>
                                                        @endif
                                                        <a href="{{route('front.subcategory',$subctgry->slug)}}">{{$subctgry->sub_name}}</a>
                                                        @if(count($subctgry->subCategory) > 0)
                                                        <ul id="filter{{$x}}" class="collapse">
                                                            @foreach($subctgry->subCategory()->where('status','=',1)->get() as $childctgry)
                                                            <li><i class="fa fa-angle-right"></i><a href="{{route('front.childcategory',$childctgry->slug)}}">{{$childctgry->child_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                    @endif

@endif


                    <div class="product-filter-option">
                        <h2 class="filter-title">{{$lang->dosp}}</h2>
                        @if(isset($cat))
                            <form action="{{route('front.category',$cat->slug)}}" method="GET">

                        @elseif(isset($subcat))
                            <form action="{{route('front.subcategory',$subcat->slug)}}" method="GET">
                        
                        @elseif(isset($childcat))
                            <form action="{{route('front.childcategory',$childcat->slug)}}" method="GET">
                        
                        @elseif(isset($vcats))
                            <form action="{{route('front.vendor.category',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' => $vcat->cat_slug])}}" method="GET">
                        
                        @elseif(isset($vsubcats))
                            <form action="{{route('front.vendor.subcategory',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' => $vsubcat->sub_slug])}}" method="GET">
                        
                        @elseif(isset($vchildcats))
                            <form action="{{route('front.vendor.childcategory',['slug1' => str_replace(' ', '-',($vendor->shop_name)), 'slug2' =>$vchildcat->child_slug])}}" method="GET">
                        
                        @elseif(isset($sproducts))
                            <form action="{{route('front.searchs',$search)}}" method="GET">
                        
                        @elseif(isset($wproducts))
                            <form action="{{route('user-wishlists')}}" method="GET">
                        
                        @elseif(isset($vprods))
                            <form action="{{route('front.vendor',str_replace(' ', '-',($vendor->shop_name)))}}" method="GET">
                        @endif
                                <div class="form-group padding-bottom-10">
                                    <input style="direction: ltr;" id="ex2" type="text" class="form-control" value="" data-slider-min="0" data-slider-max="1000" data-slider-step="5" data-slider-value="[{{ isset($min) ? $min:'0'}},{{ isset($max) ? $max:'250'}}]"/>
                                </div>
                                <div class="form-group">
                                    <input style="direction: ltr;" type="text" id="price-min" name="min" class="price-input" value="{{ isset($min) ? $min:'0'}}">
                                    <i class="fa fa-minus"></i>
                                    <input style="direction: ltr;" type="text" id="price-max" name="max" class="price-input" value="{{ isset($max) ? $max:'250'}}">
                                    <input style="direction: ltr;" type="submit" class="price-search-btn" value="{{$lang->don}}">
                                </div>
                            </form>
                    </div>



                    @if(!isset($vendor))

                    <div class="product-filter-option">
                        <h2 class="filter-title">{{$lang->doem}}</h2>
                            <div class="product-filter-content tags">
                                @if($gs->tags != null)
                                    @foreach(explode(',',$gs->tags) as $tag)
                                        <a href="{{route('front.tags',$tag)}}">{{$tag}}</a>
                                    @endforeach
                                @endif
                            </div>
                    </div>
                    @endif
                    @if(isset($vendor))
          {{--<div class="product-filter-option description">--}}
            {{--<h2 class="filter-title">{{$lang->vendor_description}}</h2>--}}
            {{--<p>{!! $vendor->shop_details !!}</p>--}}
            {{--<hr/>--}}

            {{--<h3 class="filter-title">{{$lang->linked_accounts}}</h3>--}}
            {{--<ul style="direction: ltr;">--}}
              {{--@if($vendor->f_check != null)--}}
              {{--<li><a href="{{$vendor->f_url}}"><i class="fa fa-facebook"></i> Facebook</a></li>--}}
              {{--@endif--}}
              {{--@if($vendor->g_check != null)--}}
              {{--<li><a href="{{$vendor->g_url}}"><i class="fa fa-google-plus"></i> Google</a></li>--}}
              {{--@endif--}}
              {{--@if($vendor->t_check != null)--}}
              {{--<li><a href="{{$vendor->t_url}}"><i class="fa fa-twitter"></i> Twitter</a></li>--}}
              {{--@endif--}}
              {{--@if($vendor->l_check != null)--}}
              {{--<li><a href="{{$vendor->l_url}}"><i class="fa fa-linkedin"></i> Linkedin</a></li>--}}
              {{--@endif--}}
            {{--</ul>--}}
          {{--</div>--}}
          @if(Auth::guard('user')->check())
                    <div class="product-filter-option description hidden">
            <div class="product-contact-info">
                         <div class="product-contact-info-buttons">
                           <div class="row">
                             {{--<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">--}}
                               {{--<a id="product-phone" class="btn btn-success btn-block" href="javascript:void(0)"><i class="fa fa-phone"></i> Phone Number</a>--}}

                               {{--<div class="contact-phone-details">--}}
                                  {{--<strong>Phone-Number:</strong> {{$vendor->shop_number}}--}}
                              {{--</div>--}}
                             {{--</div>--}}
                             {{--<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">--}}
                              {{--<a id="product-email" class="btn btn-primary btn-block" data-toggle="modal" data-target="#emailModal" style="cursor: pointer;"><i class="fa fa-envelope"></i> Send Message To Seller</a>--}}
{{--                               <div class="contact-email-details">--}}
                                {{--<form action="{{route('front.vendor.contact')}}" method="POST">--}}
                                  {{--{{csrf_field()}}--}}
                                  {{--<div class="form-group">--}}
                                    {{--<input type="email" name="email" class="form-control" placeholder="Email *" readonly="" value="{{Auth::guard('user')->user()->email}}">--}}
                                  {{--</div>--}}
                                  {{--<div class="form-group">--}}
                                    {{--<input type="text" name="name" class="form-control" placeholder="Name *" value="{{Auth::guard('user')->user()->name}}" readonly="">--}}
                                  {{--</div>--}}
                                  {{--<div class="form-group">--}}
                                    {{--<input type="text" name="subject" class="form-control" placeholder="Subject *" value="" required="">--}}
                                  {{--</div>--}}
                                  {{--<div class="form-group">--}}
                                    {{--<textarea name="message" class="form-control" rows="5" placeholder="Message *" required=""></textarea>--}}
                                  {{--</div>--}}
                                  {{--<input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">--}}
                                  {{--<input type="hidden" name="vendor_id" value="{{$vendor->id}}">--}}
                                  {{--<div class="form-group">--}}
                                    {{--<button class="btn-block btn-product-contact-email" type="submit">SEND</button>--}}
                                  {{--</div>--}}
                                {{--</form>--}}
                              {{--</div> --}}
                            {{--</div>--}}
                           </div>
                         </div>
                       </div>
                     </div>
              @else
                    {{--<div class="product-filter-option description">--}}
            {{--<div class="product-contact-info">--}}
                         {{--<div class="product-contact-info-buttons">--}}
                           {{--<div class="row">--}}
                             {{--<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">--}}
                               {{--<a style="cursor: pointer;" class="btn btn-success btn-block no-wish" data-toggle="modal" data-target="#loginModal"><i class="fa fa-phone"></i> Contact Seller</a>--}}
                             {{--</div>--}}
                           {{--</div>--}}
                         {{--</div>--}}
                       {{--</div>--}}
                     {{--</div>--}}
              @endif
                @endif
                </div>