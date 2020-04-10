<template>
    <div>

        <!-- Single Page Cart Start (When a user will click it, then it'll be invisible and cart popup visible.) -->
        <div class="spc-wrap">
            <div class="spc-btn">
                <div class="spc-btn-item-count">
                    <img src="asset('assets/front/images/paper-bag.svg')" alt="Cart">
                    <p>
                        <span>0 Item</span>
                    </p>
                </div>
                <div class="spc-btn-total-count">
                    <span>৳</span>
                    <span class="total-value">0</span>
                </div>
            </div>
        </div>
        <!-- Single Page Cart End (When a user will click it, then it'll be invisible and cart popup visible.) -->

        <!-- Single page cart nav -->
        <div class="spc-nav-wrap">
            <div class="spc-nav-inner">
                <!-- Single page cart nav Top Start -->
                <div class="spc-nav-cart-top">
                    <div class="spc-nav-cart-item">
                        <img src="asset('assets/front/images/paper-bag.svg')" alt="Cart">
                        <span>0 Item</span>
                    </div>
                    <div class="spc-nav-cart-close">
                        <span>close</span>
                    </div>
                </div>
                <!-- Single page cart nav Top End -->

                <!-- Single page cart nav Offer Start -->
                <div class="spc-nav-cart-offer" data-toggle="modal" data-target="#spcNavCartOfferModal">
                    <div class="spc-nav-cart-offer-text">
                        <p>Shop <span>৳</span>300 more and save <span>৳</span>19 free</p>
                    </div>
                    <div class="spc-nav-cart-offer-info">
                        <p><span>৳</span>39 <i class="fas fa-info-circle"></i></p>
                    </div>
                </div>
                <!-- Single page cart nav Offer End -->

                <!-- Single page cart nav Express Delivery Start -->
                <div class="spc-nav-cart-delivery">
                    <div class="spc-nav-cart-delivery-icon">
                        <svg version="1.1" x="0px" y="0px" viewBox="-9 11 100 100"><path class="st0" d="M59.4,32.6c0.2,0.2-0.2,0.3-0.2,0.3s-1.2,0.3-1.5,0.8c-0.3,0.3-0.8,1.5-0.8,1.5c0.7-0.2,1.5-0.3,2.3-0.7 c0.2,0,0.3,0.2,0.5,0.3c0.2,0-2,0.8-2.5,1.2c-0.3,0.3-2,1.7-2.5,1.7S53,37.9,53,37.9c0.2,0.3,0.3,0.7,0.7,1.2c0,0-1.2,0.7-1.2,0.8 c-0.2,0.2-1,1.2-1,1.2s3,0.3,4-1.3c-1,1.7-3.3,3.3-8.2,3.3c-5,0-9-2-11.7-3c-2.8-1.2-6.5-2.5-9.5-2.5c-2.8,0-6.2,0.8-8.4,2.9 c-3.9-1.5-9.2-0.7-11.7,1.7c-2.3,2.3-4.7,5.2-5,7.2c-0.5,2.2-1.7,7.4-3.3,9.7c-2.3,3.8-5,4.8-5.9,6.5c-0.8,1.7-0.8,5.2-0.7,5.2 c0.3,0.2,1.5,0,2.2-0.3c1.3-0.5,5-4.3,6.4-6.2c1.3-1.8,5.9-9.9,6.5-12.7c0.7-2.8,1.3-5.7,3.3-7.2c2.2-1.5,4.8-0.8,4.8-0.7 c0,0-2.5,2-2.7,7.5c-0.2,5.5,3.2,4.9,1.5,8.4c-1.7,3-6.7,1-8.4,2.8c-1.3,1.5,0,6.9,0,7.9c0,1-0.5,5.7-0.8,6.9c-0.2,1,0,1.7-0.2,2.3 c-0.2,0.5,1,0.7,1,0.7s-1,1.3-1.5,1c-0.5-0.2-0.8-0.2-1.2,0c-0.3,0-1,0.3-1.7,0l-2.7,5.7c0.3,0.2,0.8,0.3,1.3,0.2 c0.7-0.2,4-1.7,4.4-2c0.5-0.2,3.3-1.8,3.8-2.8c0.3-1,1-4.2,1-5.2c0.2-1,0.3-4.2,0.3-5c0-0.8-0.2-2.3,0-3c0.3-0.5,0.8-1.2,1.5-1.5 c0.8-0.2,1.8-0.2,2-0.2c0.3,0,3.2,0.3,3.7,0.3c0.7,0,3.3-0.5,4-0.8c0.8-0.2,1.3,0,1.5,0.3c0.3,0.3-0.3,0.8-0.3,1 c-0.2,0.2-1.5,1.8-1.8,2.5c-0.3,0.8-1.5,2.3-1.2,3c0.3,0.7,0.3,0.8,1.3,1.3c1,0.3,4.9,2.3,7,4.3c2.3,2.2,4.5,4.8,4.9,6.2 c0.5,1.5,1.3,1.7,1.8,1.7c0.5,0.2,1.5,0.3,1.5,1c0,0.7-0.2,1.5-0.2,1.5l6.2,2.3c0,0,0-2.2-0.2-3c-0.2-1-1.2-2-2-3 c-0.8-1.2-9.5-9.7-10.4-10.4c-0.8-0.5-1.5-1.2-1.7-2.5c-0.2-1.3,1.5-2.3,2.5-3.5c0.7-0.8,2.5-4.7,2.8-5.2c0.3-0.5,1.5-1.8,2.2-1.8 c0.8,0,2.7,1.2,5,2c1,0.3,8.2,2.2,9.2,2.5c1,0.2,3.2,0,3.8,0.7c0.7,0.5,0,1.8-0.2,2.7c-0.2,1-2,4.7-2,4.7s0.3,1.3,0.3,2.4 c0,1.2-0.5,5.3-1,6.7c-0.3,1.5-2.7,5.4-3.2,6c-0.3,0.5-0.8,0.8-0.8,1.7c0,0.8,1.5,1,2,1.7c0.7,0.5,0.2,1.5,0,2.5l6.7,2.8 c0-0.5,0.3-1.3,0-1.7c-0.2-0.5-1-1.5-1.5-2.2c-0.3-0.5-1.5-2.3-1.8-2.7c-0.3-0.5-0.3-1.5,0-2.3c0.2-0.8,2.3-6.5,2.5-7.2 c0.3-0.8,3.5-7.5,3.8-8.4c0.3-1,3-5.9,3.3-6.7c0.3-1,2.5-1.8,3.2-1.8c0.8,0,5,1.5,5.7,1.8c0.5,0.2,4.4,1.8,5,2.2 c0.8,0.3,0.3,1-0.2,1.2c-0.5,0.3-6.7,4.5-7.2,4.7c-0.5,0.2-1,0.7-1.3,0.7c-0.5,0-1.2,0.5-1.2,0.7c0,0.3-0.2,1-1,1c-0.7,0-2-1-2.8-2 c-1.2,0.7-2,1.2-2.5,2.2c-0.8,0.8-1.2,1.5-1.7,2.7c0.3,0.3,1,0.5,1.5,0.5h5.4c0.5,0,1.2-0.2,1.7-0.3c0.5-0.3,13.7-9,13.7-9 s2.2-1.7,2.2-3.2c0-1.2-1-1.5-1.3-2c-0.5-0.3-3.5-2.3-4-2.7c-0.7-0.5-3-1.8-3.7-2.2c-0.5-0.3-2.4-1-2.4-1c0.5-1.5,0.8-2.7,1-3 c0.2-0.3,0.2-3.4,0.3-3.9c0-0.5,0.8-2.7,1.2-3c0.3-0.3,1.2-3,1.3-3.5c0.2-0.3,1.5-4.2,2.2-4.2c0.7-0.2,1.3,0.5,2,0.5 c0.7,0.2,3.2-0.2,4.5,0c1.2,0.2,2.7,1.7,3,1.8c0.5,0.2,1.7,0.7,2,0.7c0.2,0,1.8-1.2,1.8-1.5c0-0.3-1.2-1-1.3-1 c-0.2-0.2-1.3-0.8-1.3-0.8c0,0.2,0.5-0.3,1.3-0.3c0.7,0,1.3,0.7,1.5,0.8c0.3,0.2,1.2,0.7,1.3,0.3c0.2-0.2,0.8-1,0.8-1.5 c0-0.7-0.7-1.5-1-1.8c-0.3-0.3-4.2-4-4.5-4.2c-0.5-0.2-2.5-2-2.5-2.5c-0.2-0.3-1.2-1.2-1.3-1.3c-0.2-0.2-5.2-3.7-5.9-4.2 c-0.7-0.5-1.3-1.3-1.3-2.2c0-0.8-0.3-3-0.3-3s-1.2-0.2-1.7,0.3c-0.5,0.3-1.7,3-2.3,3c-1.8-0.3-4.2,0.2-4.2,0.5 c0.2,0.5,1.8,0.2,1.8,0.2c0,0.2-0.7,1-1.2,1c-0.3,0-1.3,0.3-1.5,0.5c-0.3,0-1,0.5-1,0.5c0.5,0,1,0,1.7,0.2c0,0-1,0.7-1.5,0.7 c-0.5,0-2.2,0.5-2.7,0.7c-0.3,0.3-1.7,1.3-1.7,1.3h-1.5l0.2,0.3h0.8L59.4,32.6L59.4,32.6z"></path></svg>
                    </div>
                    <span>Express delivery</span>
                </div>
                <!-- Single page cart nav Express Delivery Start -->

                <!-- Single page cart nav Order Item Start-->
                <div class="spc-nav-cart-order-item">
                    <div class="quantity">
                        <button class="caret-up" title="Add one more to bag">
                            <i class="fas fa-angle-up"></i>
                        </button>
                        <span class="quantity-value">1</span>
                        <button class="caret-down" title="Remove one from bag">
                            <i class="fas fa-angle-down"></i>
                        </button>
                    </div>

                    <div class="product-img">
                        <img src="asset('assets/front/images/new-arrival/newarrival-2.jpg')" alt="Product Image">
                    </div>

                    <div class="product-name">
                        <span>This is Qurta for female. It is new arrival.</span>
                        <div class="product-price">
                            <span>৳</span> 500
                        </div>
                    </div>

                    <div class="total-amount">
                        <p><span>৳</span> 500</p>

                        <p class="previous-price"><del><span>৳</span> 800</del></p>

                        <div class="remove-item-wrap" title="Remove from bag"></div>
                    </div>

                    <hr>
                </div>
                <!-- Single page cart nav Order Item End -->

                <!-- Single page cart nav Empty Item Start (When cart item exists then it'll be invisible)-->
                <div class="spc-nav-cart-empty">
                    <div class="spc-nav-cart-empty-img">
                        <img src="asset('assets/front/images/empty-shopping-bag.svg')" alt="Empty">
                    </div>
                    <p>Your shopping bag is empty. Start shopping now.</p>
                </div>
                <!-- Single page cart nav Empty Item End (When cart item exists then it'll be invisible)-->

                <!-- Single page cart nav bottom Start-->
                <div class="spc-nav-cart-bottom-wrap">

                    <div class="spc-nav-cart-bottom-inner">
                        <!-- Single page cart nav Discount Start-->
                        <div class="spc-nav-cart-order-discount-wrap">
                            <div class="spc-nav-cart-order-discount-inner">
                                <button class="spc-nav-cart-order-discount-btn collapsible">
                                    <span>Have a special code?</span>
                                </button>

                                <div class="discountContent">
                                    <div class="discountContent-inner">
                                        <form class="form-inline">
                                            <input type="text" class="form-control discountContent-input" placeholder="Special Code">

                                            <button type="submit" class="discountContent-go">Go</button>
                                            <button type="submit" class="discountContent-close">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single page cart nav Discount End-->

                        <!-- Single page cart nav Please Order bottom Start (It'll be visible when at least one item in card) -->
                        <div class="spc-nav-cart-plz-order-btn-wrap">
                            <div class="spc-nav-cart-plz-order-btn-inner">
                                <button class="spc-nav-cart-plz-order-btn">
                                    <span>Please Order</span>
                                    <span>৳ 500</span>
                                </button>
                            </div>
                        </div>
                        <!-- Single page cart nav Please Order bottom End -->

                        <!-- When Empty Cart Item Phone Number is visible -->
                        <div class="spc-nav-cart-phone-no text-center py-3">
                            <span>Phone: 01714-070175</span>
                        </div>
                        <!-- When Empty Cart Item Phone Number is visible -->

                    </div>
                </div>
                <!-- Single page cart nav bottom End-->

                <!-- Angel Close Button Start -->
                <div class="spc-nav-arrow-wrap"></div>
                <!-- Angel Close Button End -->
            </div>
        </div>

        <!-- Single page cart info modal -->
        <div class="modal fade" id="spcNavCartOfferModal" tabindex="-1" role="dialog" aria-labelledby="spcNavCartOfferModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="spcNavCartOfferModal-header">
                            What is your delivery charge policy?
                        </div>

                        <div class="spcNavCartOfferModal-des">
                            We charge <span>৳</span> 39 delivery fee for all orders below <span>৳</span> 300, and <span>৳</span> 20 delivery fee for all other orders.
                        </div>

                        <div class="spcNavCartOfferModal-exp">
                            1. <span>৳</span> 20 fee on orders of <span>৳</span> 300 and above.
                        </div>

                        <div class="spcNavCartOfferModal-exp-2">
                            <p>You have reduced delivery charge</p>
                            <p><span>৳</span> 20 <i class="fas fa-info-circle"></i></p>
                        </div>

                        <div class="spcNavCartOfferModal-exp-3">
                            2. <span>৳</span> 39 fee on orders of <span>৳</span> 300 and above.
                        </div>

                        <div class="spcNavCartOfferModal-exp-4">
                            <p>Shop <span>৳</span> 39 more and save <span>৳</span> 19 free</p>
                            <p><span>৳</span> 20 <i class="fas fa-info-circle"></i></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "spc"
    }
</script>

<style scoped>

</style>