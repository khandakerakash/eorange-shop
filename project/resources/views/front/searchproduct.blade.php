@extends('layouts.front')
@section('content')
@php
$i=1;
$j=1;
@endphp
    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{$lang->ss}}: {{$search}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->


 <!-- Starting of product category area -->
    <div class="section-padding product-category-wrap">
        <div class="container">
            <div class="row">

                @include('includes.catalog')

                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <div class="category-wrap">
                        <div class="row">
                @foreach($sproducts as $prod)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                @php
                                $name = str_replace(" ","-",$prod->name);
                                @endphp
                                <a href="{{route('front.product',['id' => $prod->id, 'slug' => $name])}}" class="single-product-area text-center">
                        <div class="product-image-area">
                            @if($prod->features!=null && $prod->colors!=null)
                            @php
                            $title = explode(',', $prod->features);
                            $details = explode(',', $prod->colors);
                            @endphp
                            <div class="featured-tag" style="width: 100%;"> 
                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                              <style type="text/css">
span#d{{$j++}}:after {
    border-left: 10px solid {{$dtl}};
}                                  
                              </style>
                              <span id="d{{$i++}}" style="background: {{$dtl}}">{{$ttl}}</span>
                              @endforeach
                            </div>
                            @endif
                            <img src="{{asset('assets/images/'.$prod->photo)}}" alt="new arrival product">
                                <div class="gallery-overlay"></div>
                                <div class="gallery-border"></div>
                                <div class="product-hover-area">
                                     @if(Auth::guard('user')->check())
                                            <span class="uwish"><i class="icofont">heart</i></span>
                                            @else
                                            <span class="no-wish" data-toggle="modal" data-target="#loginModal"><i class="icofont">heart</i></span>
                                    @endif
                                <input type="hidden" value="{{$prod->id}}">
                                <span class="wish-list" data-toggle="modal" data-target="#myModal"><i class="icofont">eye</i></span>
                                <span class="addcart"><i class="icofont">cart</i></span>
                                <span><i class="icofont">exchange</i></span>
                            </div>
                        </div>
                        <div class="product-description text-center">
                                        <div class="product-name">{{strlen($prod->name) > 50 ? substr($prod->name,0,50)."..." : $prod->name}}</div>
                            <div class="product-review">
                        <div class="ratings">
                          <div class="empty-stars"></div>
                          <div class="full-stars" style="width:{{App\Review::ratings($prod->id)}}%"></div>
                        </div>
                            </div>
                                    @if($gs->sign == 0)
                                        <div class="product-price">{{$curr->sign}}
                    @if($prod->user_id != 0)
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                      {{round($price * $curr->value,2)}}
                    @else
                      {{round($prod->cprice * $curr->value,2)}}
                    @endif  

                                        </div>
                                    @else
                                        <div class="product-price">
                    @if($prod->user_id != 0)
                      @php
                      $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
                      @endphp
                      {{round($price * $curr->value,2)}}
                    @else
                      {{round($prod->cprice * $curr->value,2)}}
                    @endif  
{{$curr->sign}}
                                        </div>
                                    @endif
                        </div>
                    </a>
                </div>
                @endforeach
                    <div class="row">
                        <div class="col-md-12 text-center"> 
                            {!! $sproducts->appends(['product' => $search])->links() !!}               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
    <!-- Ending of product search area -->
@endsection

@section('scripts')

@if(isset($min) || isset($max))
<script type="text/javascript">
        var min = $("#price-min").val();
        var max = $("#price-max").val();
        $("#sortby").change(function () {
        var sort = $("#sortby").val();
        window.location = "{{url('/search')}}/{{$search}}/"+sort+"?min="+min+"&max="+max;
    });
</script>
@else
<script type="text/javascript">
        $("#sortby").change(function () {
        var sort = $("#sortby").val();
        window.location = "{{url('/search')}}/{{$search}}/"+sort;
    });
</script>
@endif

<script type="text/javascript">
            $("#ex2").slider({});
        $("#ex2").on("slide", function(slideRange) {
            var totals = slideRange.value;
            var value = totals.toString().split(',');
            $("#price-min").val(value[0]);
            $("#price-max").val(value[1]);
        });
</script>

@endsection