@extends('layouts.front')
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/orange-bg.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Help and Support</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Section title overlay area -->

    <!-- Starting of faq area -->
    <div class="container">
        <div class="section-padding">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="styled-faq header-foot-page">
                        <h3>How to Order:</h3>
                        <p>Shopping at <a href="/" target="_blank">Eorange.shop</a> is easy. Simply follow the steps below.</p>
                    </div>

                    <div class="foot-content">
                        <div class="bullet-points">
                            <h5>Step-1</h5>
                            <ul>
                                <li>Add some item into your Shopping Bag.</li>
                                <li>Select the size, color or quantity if necessary. For some items, we may recommend a size for you. Just click Check My Size.</li>
                            </ul>

                            <h5>Step-2</h5>
                            <ul>
                                <li>Click the VIEW Chart button to review the item(s) selected and make some modifications if necessary.</li>
                                <li>Click on “CHECKOUT” if you are ready to place the order. Otherwise, click CONTINUES SHOPPING.</li>
                            </ul>

                            <h5>Step-3</h5>
                            <ul>
                                <li>Check Order details.</li>
                                <li>Fill in the shipping/ billing address.</li>
                                <li>Select a payment method.</li>
                                <li>Choose one shipping option.</li>
                                <li>Apply a coupon  and points.</li>
                            </ul>
                        </div>

                        <div class="foot-content-desc">
                            <p>EMI (Equated Monthly Installment) is one of the payment methods of online shopping, only for the customers using any of the accepted Credit Cards on eorange. bangladesh. It allows customers to pay for their ordered products in easy equal monthly installments.</p>
                        </div>

                        <div class="bullet-points">
                            <h5>Note</h5>
                            <ul>
                                <li>Customers wanting to avail EMI facility must have a Credit Card from any one of the banks in the table below.</li>
                                <li>EMI facilities are only available for Specific Products which costs over BDT ******.</li>
                                <li>EMI charges may vary on promotional offers.</li>
                                <li>Eorange may charge additional interest rate if the customer extends the period of EMI offered.</li>
                                <li>EMI facilities vary from one product type to another. Please carefully check the EMI tenure period for your preferred product on each product page and on the checkout page as well.</li>
                            </ul>
                        </div>

                        <div class="foot-content-desc">
                            <p><strong>You can pay with equal monthly installment payment option using the Credit Card of any of the following banks:</strong></p>

                            <div class="bullet-points">
                                <ul>
                                   <li>City bank</li>
                                   <li>Brac bank</li>
                                   <li>Eastern Bank Limited</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of faq area -->
@endsection