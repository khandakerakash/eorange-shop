@extends('layouts.front')
@section('content')
<style>
    .flash-sale_inner {
        position: relative;
        padding: 2rem;
         display: block;
        justify-content: space-between;
        align-items: center;
    }
</style>
<div style="background: #F5F5F5;">
    <hr>
    <!-- FLASH SALE SECTION START -->
    <div class="flash-sale wow fadeInUp" id="flash-sale-single-page" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="flash-sale_outer">
                        <div class="row">
                            @foreach($flashSell as $flashItem)
                                @php
                                    $name = str_replace(" ","-",$flashItem->name);
                                @endphp
                                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                    <div class="single-flash_item">
                                        <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                           class="text-center">
                                            <div class="flash-product-image-area-details">
                                                <img src="{{asset('assets/images/'.$flashItem->photo)}}"
                                                     alt="new arrival product" class="img-responsive div-mx">
                                            </div>
                                        </a>

                                        <div class="single-flash_item-content price_new-style">
                                            <a href="{{route('front.product',['id' => $flashItem->id, 'slug' => $name])}}"
                                               class="title">{{strlen($flashItem->name) > 50 ? substr($flashItem->name,0,50)."..." : $flashItem->name}}</a>
                                            <p class="price">
                                                <span class="currency-taka">{{$gs->sign == 0?$curr->sign:""}}</span>
                                                @if($flashItem->user_id != 0)
                                                    @php
                                                        $price = $flashItem->cprice + $gs->fixed_commission + ($flashItem->cprice/100) * $gs->percentage_commission ;
                                                    @endphp
                                                    {{round($price * $curr->value,2)}}
                                                @else
                                                    {{round($flashItem->cprice * $curr->value,2)}}
                                                @endif
                                                <br>

                                                @if($flashItem->pprice != null)
                                                    <span class="off-taka"><del><span class="currency-taka">{{$curr->sign}}</span> {{round($flashItem->pprice * $curr->value,2)}}</del></span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div><!-- /.row-->

                        <div class="row text-center">
                            <div class="position-center">
                                {{ $flashSell->links() }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- FLASH SALE SECTION END -->
</div>

@endsection

@section('scripts')
    {{--<script>
        //---------Countdown-----------
        $('#clock').countdown('{{$gs->count_date}}', function (event) {
            $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
        });
    </script>--}}
@endsection