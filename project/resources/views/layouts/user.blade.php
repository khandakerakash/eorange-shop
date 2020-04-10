<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{$seo->meta_keys}}">
    <meta name="author" content="eorangeshop">

    <title>{{$gs->title}}</title>
    <link href="{{asset('assets/user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/user/css/responsive.css')}}" rel="stylesheet">
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
                            @if(Auth::guard('user')->user()->is_provider == 1)
                                    <img src="{{ Auth::guard('user')->user()->photo ? Auth::guard('user')->user()->photo:asset('assets/images/noimage.png')}}" alt="profile image">
                                    @else
                                    <img src="{{ Auth::guard('user')->user()->photo ? asset('assets/images/'.Auth::guard('user')->user()->photo):asset('assets/images/noimage.png') }}" alt="profile image">
                                    @endif
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <a>{{ Auth::guard('user')->user()->name}}<span>Customer</span></span></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled components">
                        <li>
                            <a href="{{route('front.index')}}" target="_blank"><i class="fa fa-eye"></i>{{$lang->view_website}}</a>
                        </li>
                        <li>
                            <a href="{{route('user-dashboard')}}"><i class="fa fa-home"></i>{{$lang->dashboard}}</a>
                        </li>
                        <li>
                            <a href="{{route('user-wishlist')}}"><i class="fa fa-heart"></i>{{$lang->wish_list}}</a>
                        </li>
                        <li>
                            <a href="{{route('user-favorites')}}"><i class="fa fa-plus"></i>Favorite Sellers</a>
                        </li>
                        <li>
                            <a href="{{route('user-messages')}}"><i class="fa fa-envelope"></i>Messages</a>
                        </li>
                        <li>
                            <a href="{{route('user-orders')}}"><i class="fa fa-fw fa-usd"></i>{{$lang->cn}}</a>
                        </li>

                        <li>
                            <a href="{{route('members_create')}}"><i class="fa fa-fw fa-gift"></i>Apply For Membership</a>
                        </li>
                        <li>
                        <a href="#affilalte" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-money"></i>Affilate Settings</a>
                            <ul class="collapse list-unstyled submenu" id="affilalte">
                                <li><a href="{{route('user-wwt-index')}}"><i class="fa fa-angle-right"></i> Affilate Withdraw</a></li>
                                <li><a href="{{route('user-affilate-code')}}"><i class="fa fa-angle-right"></i> Affilate Code</a></li>
                            </ul>
                        </li>
                        @if(!Auth::guard('user')->user()->IsVendor())
                        @if($gs->reg_vendor == 1)
                        <li>
    <a href="{{route('user-vendor-request')}}"><i class="fa fa-fw fa-users"></i>Apply For Vendor</a>
                        @endif
                        </li>
                        @endif
              @if(Auth::guard('user')->user()->IsVendor()) 
                        <li>
                            <a href="{{route('user-prod-index')}}"><i class="fa fa-fw fa-shopping-cart"></i>Vendor Products</a>
                        </li>
                        <li>
                            <a href="{{route('vendor-order-index')}}"><i class="fa fa-fw fa-money"></i>Vendor Orders</a>
                        </li>
                        <li>
                            <a href="{{route('user-wt-index')}}"><i class="fa fa-fw fa-list"></i>Withdraw</a>
                        </li>
                        <li>
                        <a href="#generalSettings" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-cogs"></i> Settings</a>
                            <ul class="collapse list-unstyled submenu" id="generalSettings">
                                <li><a href="{{route('user-sl-index')}}"><i class="fa fa-angle-right"></i> Sliders</a></li>
                                <li><a href="{{route('user-shop-desc')}}"><i class="fa fa-angle-right"></i> Shop Description</a></li>
                                <li><a href="{{route('user-shop-ship')}}"><i class="fa fa-angle-right"></i> Shipping Cost</a></li>
                                <li><a href="{{route('user-social-index')}}"><i class="fa fa-angle-right"></i> Social Links</a></li>  
                            </ul>
                        </li>
                @endif

                    </ul>
                </nav>
            </div>
        </div>
        <!-- Ending of Dashboard Sidebar menu area -->
    </div>
    @yield('content')
</div>

    <div class="modal vendor" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
            <h4 class="modal-title" id="myModalLabel">New Message</h4>
          </div>
          <form id="emailreply"  method="POST">
            {{csrf_field()}}
          <div class="modal-body">
                <div class="form-group">
                    <input type="email" class="form-control" id="eml" name="email" placeholder="Email"  value="">
                </div>
                <div class="form-group">
                    <input type="text" name="subject" id="subj" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg" class="form-control" rows="5" placeholder="Message *" required=""></textarea>
                </div>
                <input type="hidden" name="name" value="{{Auth::guard('user')->user()->name}}">
                <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
          </div>
          <div class="modal-footer">
            <button type="submit" id="emlsub" class="btn btn-default email-btn">Send</button>
          </div>
           </form>
        </div>
      </div>
    </div>



<script src="{{asset('assets/user/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/user/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.canvasjs.min.js')}}"></script>
<script src="{{asset('assets/user/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/user/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/user/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('assets/user/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/user/js/notify.js')}}"></script>
<script src="{{asset('assets/user/js/main.js')}}"></script>
<script src="{{asset('assets/user/js/user-main.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>
@if($gs->rtl ==1)
<style type="text/css">
input[type="text"],input[type="email"], input[type="password"], textarea, select {
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
<script type="text/javascript">
$(document).ready(function(){
    setInterval(function(){
            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/conv/notf')}}",
                    success:function(data){
                        $("#notf_conv").html(data);
                      }
              }); 
    }, 5000);
});
            $(document).on("click", "#conv_notf" , function(){
                $("#notf_conv").html('0');
                $('.profile-comments-content').load('{{URL::to('conv/notf')}}');
            });
            $(document).on("click", "#conv_clear" , function(){

            $.ajax({
                    type: "GET",
                    url:"{{URL::to('/json/conv/notf/clear')}}"
              }); 
            });
</script>
<script type="text/javascript">
          $(document).on("submit", "#emailreply" , function(){
          var token = $(this).find('input[name=_token]').val();
          var subject = $(this).find('input[name=subject]').val();
          var message =  $(this).find('textarea[name=message]').val();
          var email = $(this).find('input[name=email]').val();
          var name = $(this).find('input[name=name]').val();
          var user_id = $(this).find('input[name=user_id]').val();
          $('#eml').prop('disabled', true);
          $('#subj').prop('disabled', true);
          $('#msg').prop('disabled', true);
          $('#emlsub').prop('disabled', true);
     $.ajax({
            type: 'post',
            url: "{{URL::to('/user/user/contact')}}",
            data: {
                '_token': token,
                'subject'   : subject,
                'message'  : message,
                'email'   : email,
                'name'  : name,
                'user_id'   : user_id
                  },
            success: function( data) {
          $('#eml').prop('disabled', false);
          $('#subj').prop('disabled', false);
          $('#msg').prop('disabled', false);
          $('#subj').val('');
          $('#msg').val('');
        $('#emlsub').prop('disabled', false);
        if(data ==1)
        $.notify("Message Sent !!","success");
        else
        $.notify("Email Not Found !!","error");
        $('.ti-close').click();
            }
        });          
          return false;
        });
</script>
@yield('scripts')

</body>
</html>
