<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="eorangeshop">

        <title>{{$gs->title}}</title>
        <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}"> 

        @include('styles.admin-design') 
        @yield('styles')
    </head>
    <body>
        <div class="dashboard-wrapper" id="app">
            <div class="left-side">
            <!-- Starting of Dashboard Sidebar menu area -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-right">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </nav>
                
                <div class="dashboard-sidebar-area">
                    <img src="{{asset('assets/images/'.$gs->bimg)}}" alt="">
                    <div class="sidebar-menu-body">
                        <nav id="sidebar-menu">
                            <ul class="list-unstyled profile">
                                <li class="active">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <img src="{{ Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo):asset('assets/images/noimage.png') }}" alt="profile image">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">    
                                            <a>{{ Auth::guard('admin')->user()->name}} <span>{{ Auth::guard('admin')->user()->role}}</span></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled components">
                                <li>
                                    <a href="{{route('admin-dashboard')}}"><i class="fa fa-home"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="#order" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-usd"></i> Orders</a>
                                    <ul class="collapse list-unstyled submenu" id="order">
                                        <li>
                                            <a href="{{route('admin-order-index')}}"><i class="fa fa-angle-right"></i> All Orders</a>
                                            <a href="{{route('admin-order-pending')}}"><i class="fa fa-angle-right"></i> Pending Orders</a>
                                            <a href="{{route('admin-order-processing')}}"><i class="fa fa-angle-right"></i> Processing Orders</a>
                                            <a href="{{route('admin-order-completed')}}"><i class="fa fa-angle-right"></i> Completed Orders</a>
                                            <a href="{{route('admin-order-declined')}}"><i class="fa fa-angle-right"></i> Declined Orders</a>
                                        </li>  
                                    </ul>
                                </li>
                                <li>
                                    <a href="#prod" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-shopping-cart"></i> Products</a>
                                    <ul class="collapse list-unstyled submenu" id="prod">
                                        <li>
                                            <a href="{{route('admin-prod-index')}}"><i class="fa fa-angle-right"></i>All Products</a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin-prod-create')}}"><i class="fa fa-angle-right"></i>Create Product</a>
                                        </li>
{{--                                        <li>--}}
{{--                                            <a href="{{route('admin-prod-deactive')}}"><i class="fa fa-angle-right"></i>Deactivated Products</a>--}}
{{--                                        </li>  --}}
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('admin-img-index')}}"><i class="fa fa-home"></i> Brands</a>
                                </li>
                                <li>
                                    <a href="#customer" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-users"></i> Customers</a>
                                    <ul class="collapse list-unstyled submenu" id="customer">
                                        <li>
                                            <a href="{{route('admin-user-index')}}"><i class="fa fa-angle-right"></i>Customers List</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-vendor-wtt')}}"><i class="fa fa-angle-right"></i>Withdraws</a>
                                        </li>  
                                    </ul>
                                </li>
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="#vendor" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-users"></i> Vendors</a>
                                    <ul class="collapse list-unstyled submenu" id="vendor">
                                        <li>
                                            <a href="{{route('admin-vendor-index')}}"><i class="fa fa-angle-right"></i>Vendors List</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-vendor-wt')}}"><i class="fa fa-angle-right"></i>Withdraws</a>
                                        </li>  
                                    </ul>
                                </li>
                                @endif
                                <li>
                                    <a href="#category" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-sitemap"></i> Manage Category</a>
                                    <ul class="collapse list-unstyled submenu" id="category">
                                        <li>
                                            <a href="{{route('admin-cat-index')}}"><i class="fa fa-angle-right"></i>Main Category</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-subcat-index')}}"><i class="fa fa-angle-right"></i>Sub Category</a>
                                        </li>  
                                        <li>
                                            <a href="{{route('admin-childcat-index')}}"><i class="fa fa-angle-right"></i>Child Category</a>
                                        </li> 
                                    </ul>
                                </li>
                                <li><a href="{{route('admin-cp-index')}}"><i class="fa fa-fw fa-percent"></i> Set Coupons</a>
                                </li>
                                <li><a href="{{route('admin-blog-index')}}"><i class="fa fa-fw fa-file-text"></i> Blog</a>
                                </li>
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="#generalSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-cogs"></i> General Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="generalSettings">
                                        <li><a href="{{route('admin-gs-logo')}}"><i class="fa fa-angle-right"></i> Logo</a></li>
                                        <li><a href="{{route('admin-gs-fav')}}"><i class="fa fa-angle-right"></i> Favicon</a></li>
                                        <li><a href="{{route('admin-gs-load')}}"><i class="fa fa-angle-right"></i> Loader</a></li>
                                        <li><a href="{{route('admin-gs-bgimg')}}"><i class="fa fa-angle-right"></i> Background Image</a></li>
                                        <li><a href="{{route('admin-gs-cimg')}}"><i class="fa fa-angle-right"></i> Review Background Image</a></li>
                                       <li><a href="{{route('admin-gs-successm')}}"><i class="fa fa-angle-right"></i> Success Messages</a></li>
                                       <li><a href="{{route('admin-pick-index')}}"><i class="fa fa-angle-right"></i> Pickup Location</a></li>
                                        <li><a href="{{route('admin-gs-contents')}}"><i class="fa fa-angle-right"></i> Website Contents</a></li>
                                        <li><a href="{{route('admin-gs-about')}}"><i class="fa fa-angle-right"></i> Footer</a></li>
                                        <li>
                                            <a href="{{route('admin-gs-reg')}}"><i class="fa fa-angle-right"></i>Vendor Registration Option</a>
                                        </li> 
                                    </ul>
                                </li>
                                @endif
                                <li>
                                    <a href="#homeSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-edit"></i> Home Page Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="homeSettings">
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="{{route('admin-sl-index')}}"><i class="fa fa-angle-right"></i> Sliders</a>
                                </li>
                                <li>
                                    <a href="{{route('admin-service-index')}}"><i class="fa fa-angle-right"></i> Service Section</a>
                                </li>
                                @endif
                                <li><a href="{{route('admin-banner-top')}}"><i class="fa fa-angle-right"></i> Top Banners</a></li>
                                <li><a href="{{route('admin-img1-index')}}"><i class="fa fa-angle-right"></i> Bottom Banners</a></li>
                                     <li><a href="{{route('admin-img2-index')}}"><i class="fa fa-angle-right"></i> Small Banners</a></li>
                                
                                <li><a href="{{route('admin-gs-countdown')}}"><i class="fa fa-angle-right"></i> Countdown Section</a></li>
                                <li>
                                    <a href="{{route('admin-video')}}"><i class="fa fa-angle-right"></i> Home Page Video</a>
                                </li>
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li><a href="{{route('admin-ad-index')}}"><i class="fa fa-angle-right"></i> Testimonials</a></li>
                                <li>
                                    <a href="{{route('admin-img-index')}}"><i class="fa fa-angle-right"></i> Brands</a>
                                </li>
                                <li><a href="{{route('admin-gs-popup')}}"><i class="fa fa-angle-right"></i> Subscribe Popup Form</a></li>
                                <li><a href="{{route('admin-gs-bginfo')}}"><i class="fa fa-angle-right"></i> Customizations</a></li>   
                                @endif
                                    </ul>
                                </li>
                                 @if(Auth::guard('admin')->user()->isAdmin())
                                <li>
                                    <a href="#pageSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-code-o"></i> Menu Page Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="pageSettings">
                                        <li><a href="{{route('admin-fq-index')}}"><i class="fa fa-angle-right"></i> FAQ page</a></li>
                                        <li><a href="{{route('admin-ps-contact')}}"><i class="fa fa-angle-right"></i> Contact us page</a></li>
                                        <li><a href="{{route('admin-page-index')}}"><i class="fa fa-angle-right"></i> Other pages</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#payments" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-code-o"></i> Payment Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="payments">
                                        <li><a href="{{route('admin-gs-payments')}}"><i class="fa fa-angle-right"></i> Payment Informations</a></li>
                                        <li><a href="{{route('admin-payment-index')}}"><i class="fa fa-angle-right"></i> Payment Gateways</a>
                                        </li>
                                        <li><a href="{{route('admin-currency-index')}}"><i class="fa fa-angle-right"></i>  Currency Settings</a></li>
                                    </ul>
                                </li>            
                                <li>
                                    <a href="#socialSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-paper-plane"></i> Social Settings</a>
                                    <ul class="collapse list-unstyled submenu" id="socialSettings">
                                        <li><a href="{{route('admin-social-index')}}"><i class="fa fa-angle-right"></i> Social Links</a></li>   
                                        <li><a href="{{route('admin-social-facebook')}}"><i class="fa fa-angle-right"></i> Facebook Login</a></li>
                                        <li><a href="{{route('admin-social-google')}}"><i class="fa fa-angle-right"></i> Google Login</a></li>
                                    </ul>
                                </li>  
                                <li>
                                    <a href="{{route('admin-staff-index')}}"><i class="fa fa-fw fa-user-secret"></i> Manage Staffs</a>
                                </li>
                                <li><a href="{{route('admin-lang-index')}}"><i class="fa fa-fw fa-language"></i>  Language Settings</a></li>                              
                                <li>
                                    <a href="#seoTools" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-wrench"></i> SEO Tools</a>
                                    <ul class="collapse list-unstyled submenu" id="seoTools">
                                        <li><a href="{{route('admin-seotool-analytics')}}"><i class="fa fa-angle-right"></i> Google analytics</a></li>
                                        <li><a href="{{route('admin-seotool-keywords')}}"><i class="fa fa-angle-right"></i> Meta Keys</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{route('admin-subs-index')}}"><i class="fa fa-fw fa-group"></i> Subscribers</a></li>
                                {{--<li>--}}
                                    {{--<a href="#sysTools" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-wrench"></i> System Settings</a>--}}
                                    {{--<ul class="collapse list-unstyled submenu" id="sysTools">--}}
                                        {{--<li><a href="{{route('admin-generate-backup')}}"><i class="fa fa-fw fa-download"></i> Generate BackUp</a></li>--}}
                                        {{--<li><a href="{{route('admin-activation-form')}}"><i class="fa fa-fw fa-user-secret"></i> Activation</a></li>--}}
                                    {{--</ul>--}}

                                {{--</li>--}}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            <!-- Ending of Dashboard Sidebar menu area --> 
            </div>
            @yield('content')
</div>
        

                
        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.canvasjs.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap-colorpicker.js')}}"></script>
        <script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/js/app.js')}}"></script>

@if($gs->rtl ==1)
<style type="text/css">
input[type="text"], input[type="email"], input[type="password"], textarea, select {
    direction: rtl;
}
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
.col-sm-6 img{
float: right;
}
</style>
@endif
<script>
$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/user/notf')}}",
                    success:function(data){
                        $("#notf_user").html(data);
                      }
              }); 
    }, 5000);
});

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/product/notf')}}",
                    success:function(data){
                        $("#notf_product").html(data);
                      }
              }); 
    }, 5000);
});

$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/order/notf')}}",
                    success:function(data){
                        $("#notf_order").html(data);
                      }
              }); 
    }, 5000);
});
</script>
<script type="text/javascript">
            $(document).on("click", "#user_notf" , function(){
                $("#notf_user").html('0');
                $('.profile-wishlist-content').load('{{URL::to('user/notf')}}');
            });
            $(document).on("click", "#order_notf" , function(){
                $("#notf_order").html('0');
                $('.profile-notifi-content').load('{{URL::to('order/notf')}}');
            });
            $(document).on("click", "#product_notf" , function(){
                $("#notf_product").html('0');
                $('.profile-comments-content').load('{{URL::to('product/notf')}}');
            });
            $(document).on("click", "#user_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/user/notf/clear')}}"
              }); 
            });
            $(document).on("click", "#order_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/order/notf/clear')}}"
              }); 
            });
            $(document).on("click", "#product_clear" , function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/product/notf/clear')}}"
              }); 
            });
</script>
        @yield('scripts')

    </body>
</html>
