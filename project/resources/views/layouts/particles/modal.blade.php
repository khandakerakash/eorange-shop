
<!-- Starting of footer area -->
<footer class="footer-wrap {{ (request()->is('checkout')) ? 'footer-mt-500' : '' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-content-wrap">
                    <h3 class="footer-title footer-title-first">Customer Care</h3>
                    <ul class="footer-list">
                        <li class="footer-li"><a href="#">Help Center</a></li>
                        <li class="footer-li"><a href="#">How to Buy</a></li>
                        <li class="footer-li"><a href="#">Track Your Order</a></li>
                        <li class="footer-li"><a href="#">Returns &amp; Refunds</a></li>
                        @if($ps->c_status == 1)
                            <li class="footer-li"><a href="{{route('front.contact')}}">Contact Us</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-content-wrap">
                    <h3 class="footer-title">Earn With Eorange</h3>

                    <ul class="footer-list">
                        @if($ps->f_status == 1)
                            <li class="footer-li"><a href="{{route('front.faq')}}">{{$lang->faq}}</a></li>
                        @endif
                        <li class="footer-li"><a href="#">Eorange University</a></li>
                        <li class="footer-li"><a href="#">Sell on <span>Eorange</span></a></li>
                        <li class="footer-li"><a href="">Code of Conduct</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-content-wrap footer-content-eorange">
                    <h3 class="footer-title">Eorange</h3>
                    <ul class="footer-list">
                        <li class="footer-li"><a href="{{ route('front.emi_policy') }}">EMI Policy</a></li>
                        <li class="footer-li"><a href="{{ route('front.return_policy') }}">Return policy</a></li>
                        <li class="footer-li"><a href="{{ route('front.privacy_policy') }}">Privacy policy</a></li>
                        <li class="footer-li"><a href="{{ route('front.gettoknowus') }}">Get To know us</a></li>
                        <li class="footer-li"><a href="{{ route('front.terms_or_condition') }}">Terms/Condition</a></li>
                        <li class="footer-li"><a href="{{ route('front.helpandsupport') }}">Help and Support</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer-content-wrap">
                    <div class="qr-eorange">
                        <div class="qr-code">
                            <img class="img-responsive" src="{{ asset('assets/front/images/qr-code.png') }}" alt="QR CODE">
                        </div>

                        <div class="eorange-mobile-icon">
                            <div class="e-mobile-i">
                                <img class="img-responsive" src="{{ asset('assets/front/images/eo.png') }}" alt="Eorange">
                                <div class="title">Happy Shopping</div>
                                <div class="text">Download App</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="download-app-link">
                        <a href="#" class="margin-r-10">
                            <img src="{{ asset('assets/front/images/appstore.png') }}" alt="appstore" class="appstore">
                        </a>
                        <a href="#" class="">
                            <img src="{{ asset('assets/front/images/googleplay.png') }}" alt="googleplay" class="googleplay">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer-content-wrap">

                    <div class="footer-social-head">
                        <h3 class="footer-title"><span>Eorange</span> Social</h3>
                    </div>

                    <div class="footer-social-links">
                        <ul>
                            @if($sl->f_status == 1)
                                <li>
                                    <a style="display: flex;align-items: center;justify-content: center;" class="facebook" href="{{$sl->facebook}}" target="_blank">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </li>
                            @endif
                            @if($sl->g_status == 1)
                                <li>
                                    <a style="display: flex;align-items: center;justify-content: center;" class="google" href="{{$sl->gplus}}" target="_blank">
                                        <i class="fab fa-google-plus-square"></i>
                                    </a>
                                </li>
                            @endif
                            @if($sl->t_status == 1)
                                <li>
                                    <a style="display: flex;align-items: center;justify-content: center;" class="twitter" href="{{$sl->twitter}}" target="_blank">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                            @endif
                            @if($sl->l_status == 1)
                                <li>
                                    <a style="display: flex;align-items: center;justify-content: center;" class="tumblr" href="{{$sl->linkedin}}" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="payment-icons">
                    <img class="img-responsive" src="{{ asset('assets/images/payment_icons-line.png') }}" alt="Payment Icons">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Ending of footer area -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- Ending of Product View Modal -->

<!-- Starting of Product View Modal -->
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="margin-right:10px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">
                <div class="row" style="margin: 15px;">
                    <div class="login-tab">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#login1">{{$lang->signin}}</a></li>
                            <li><a data-toggle="tab" href="#signup1">{{$lang->signup}}</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="login1" class="tab-pane fade in active">
                                <div class="login-title text-center">
                                    <h3>{{$lang->signin}}</h3>
                                </div>

                                <div class="login-form">
                                    <form action="{{route('user-login-submit')}}" method="POST">
                                        {{csrf_field()}}

                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="login_email1">{{$lang->doeml}}</label>
                                            <input type="email" name="email" class="form-control" id="login_email1"
                                                   placeholder="{{$lang->doeml}}" required>
                                        </div>
                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="login_pwd1">{{$lang->sup}}</label>
                                            <input type="password" name="password" class="form-control" id="login_pwd1"
                                                   placeholder="{{$lang->sup}}" required>
                                        </div>
                                        <input type="hidden" name="wish" value="1">
                                        <button type="submit" class="btn btn-default btn-block">{{$lang->sie}}</button>
                                        @if($sl->fcheck == 1  || $sl->gcheck == 1)
                                            <div class="text-center" style="margin-top: 10px;">OR</div>
                                            <div class="social-btn-area text-center">

                                                @if($sl->fcheck ==1)
                                                    <a href="{{route('social-provider','facebook')}}"><img
                                                                class="social"
                                                                src="{{asset('assets/front/images/'.'f123.png')}}"
                                                                style="width: 250px; height: 100px;"></a>
                                                @endif
                                                @if($sl->gcheck ==1)
                                                    <a href="{{route('social-provider','google')}}"><img class="social"
                                                                                                         src="{{asset('assets/front/images/'.'sign-in-button.png')}}"
                                                                                                         style="width: 220px; height: 49px;"></a>
                                                @endif
                                            </div>
                                        @endif
                                    </form>

                                </div>

                            </div>
                            <div id="signup1" class="tab-pane fade">
                                <div class="login-title text-center">
                                    <h3>{{$lang->signup}}</h3>
                                </div>
                                @include('includes.form-error')
                                <div class="login-form">
                                    <form action="{{route('user-register-submit')}}" method="POST">
                                        {{csrf_field()}}

                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="reg_email1">{{$lang->doeml}} <span>*</span></label>
                                            <input class="form-control" placeholder="{{$lang->doeml}}" type="email"
                                                   name="email" id="reg_email1" required>
                                        </div>
                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="reg_name1">{{$lang->fname}} <span>*</span></label>
                                            <input class="form-control" placeholder="{{$lang->fname}}" type="text"
                                                   name="name" id="reg_name1" required>
                                        </div>
                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="reg_Pnumber1">{{$lang->doph}} <span>*</span></label>
                                            <input class="form-control" placeholder="{{$lang->doph}}" type="text"
                                                   name="phone" id="reg_Pnumber1" required>
                                        </div>
                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="reg_Padd1">{{$lang->doad}} <span>*</span></label>
                                            <input class="form-control" placeholder="{{$lang->doad}}" type="text"
                                                   name="address" id="reg_Padd1" required>
                                        </div>
                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="reg_password1">{{$lang->sup}} <span>*</span></label>
                                            <input class="form-control" placeholder="{{$lang->sup}}" type="password"
                                                   name="password" id="reg_password1" required>
                                        </div>
                                        <div class="form-group {{$gs->rtl == 1 ? 'text-right' : ''}}">
                                            <label for="confirm_password1">{{$lang->sucp}} <span>*</span></label>
                                            <input class="form-control" placeholder="{{$lang->sucp}}" type="password"
                                                   name="password_confirmation" id="confirm_password1" required>
                                        </div>
                                        <input type="hidden" name="wish" value="1">
                                        <button type="submit" class="btn btn-default btn-block">{{$lang->spe}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
