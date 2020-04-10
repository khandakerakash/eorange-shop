@extends('layouts.front')
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/orange-bg.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1>Return and replacement policy</h1>
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
                        <p>
                            Before returning or replacing an item, please read through our return and replacement related Frequently Asked Questions (FAQs) on this page, to make sure your purchased item is eligible for return.
                            <br><br>
                            You have 3 calendar days after item delivery, to notify us that you want to return your product. If your item meets all the requirements, your return can be initiated by calling our Customer Service at 88018
                        </p>
                    </div>

                    <div class="foot-content">
                        <div class="bullet-points">
                            <ul>
                                <li>Step 1: Check if your product meets all the conditions for returning a product.</li>
                                <li>Step 2: Contact eorange.shop Customer Service to submit a complaint / request for return.</li>
                                <li>Step 3: Fill in the return form given with the invoice.</li>
                                <li>Step 4: Choose your preferred method of product return when you call Customer Service..</li>
                                <li>Step 5: Your returned product will go through a Quality Check.</li>
                                <li>Step 6: If validated, you will get product Return / Replacement.</li>
                            </ul>

                            <h5>NOTE:</h5>
                            <p>You must show the original Customer Copy of the Invoice to authenticate your purchase, at the time of handing over the product.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of faq area -->
@endsection