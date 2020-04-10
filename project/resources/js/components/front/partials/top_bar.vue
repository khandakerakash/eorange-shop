<template>
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="top_bar-shorcutr">
                        <ul>
                            @if($gs->email != null)
                            <li id="front-top-mail"><a href="mailto:info@eorange.shop"><i
                                    class="fa fa-envelope"></i> {{$gs->email}} </a></li>
                            @endif
                            @if($gs->phone != null)
                            <li><span class="sc-line"></span></li>
                            <li><a href="tel:01714-070175"><i class="fa fa-phone"></i> 01714-070175</a></li>
                            @endif
                            <li><span class="sc-line"></span></li>
                            <li><a href="{{url('user/orders')}}"><i class="fa fa-eye"></i> Track Order</a></li>
                            <li><span class="sc-line"></span></li>
                            <li class="last_li">
                                <a data-toggle="modal" data-target="#vendorloginModal"><i class="fa fa-credit-card"></i>
                                    Merchant Corner</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "top_bar"
    }
</script>

<style scoped>

</style>