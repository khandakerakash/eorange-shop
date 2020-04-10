@extends('layouts.front_master')
        @section('title',$gs->title)
        @section('meta_data')
            <meta name="keywords" content="{{$seo->meta_keys}}">
            <meta property="og:url" content="https://www.eorange.shop/" />
            <meta property="og:type" content="website">
            <meta property="og:title" content="Online Shopping In Bangladesh: Fashion, Electronics, Mobiles - www.eorange.shop" />
            <meta property="og:description" content="www.eorange.shop online shopping in bangladesh with free home delivery. Shop online for latest electronics, mobiles, fashion apparels. ✓Cash On Delivery ✓Low Prices" />
            <meta property="og:image" content="https://eorange.shop/assets/images/facebook.jpg" />
        @endsection
        @section('header_script')
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
                     src="https://www.facebook.com/tr?id=679276649171116&ev=PageView &noscript=1"/>
            </noscript>
        @endsection

