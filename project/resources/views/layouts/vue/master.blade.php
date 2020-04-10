<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{$seo->meta_keys}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="eorangeshop">
    <title>{{$gs->title}}</title>

    <meta property="og:url" content="https://www.eorange.shop/" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="Online Shopping In Bangladesh: Fashion, Electronics, Mobiles - www.eorange.shop" />
    <meta property="og:description" content="www.eorange.shop online shopping in bangladesh with free home delivery. Shop online for latest electronics, mobiles, fashion apparels. ✓Cash On Delivery ✓Low Prices" />

    <meta property="og:image" content="https://eorange.shop/assets/images/facebook.jpg" />
@include('layouts.particles.header')

<!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '679276649171116');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=679276649171116&ev=PageView
&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

</head>
<body>

<div id="app">
    <front-nav-bar></front-nav-bar>

@php
    $i=1;
    $j=1;
@endphp
<!--  Ending of header area   -->

@yield('content')





<!-- Starting of Product View Modal -->
@include('layouts.particles.modal')

@if(isset($vendor))
    @if(Auth::guard('user')->check())
        <!-- Starting of Product email Modal -->
            <div class="modal vendor" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true"><i class="ti-close"></i></span></button>
                            <h4 class="modal-title" id="myModalLabel">New Message</h4>
                        </div>
                        <form id="emailreply" method="POST">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly=""
                                           value="Send to {{$vendor->shop_name}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" id="subj" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                <textarea name="message" id="msg" class="form-control" rows="5" placeholder="Message *"
                                          required=""></textarea>
                                </div>
                                <input type="hidden" name="email" value="{{Auth::guard('user')->user()->email}}">
                                <input type="hidden" name="name" value="{{Auth::guard('user')->user()->name}}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
                                <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="emlsub" class="btn btn-default email-btn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endif
    <!-- Ending of Product email Modal -->

    @endif
</div>
@routes
@include('layouts.particles.footer')

</body>
</html>
