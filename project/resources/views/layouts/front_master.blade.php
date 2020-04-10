<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="eorangeshop">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta_data')
    <title>@yield('title')</title>
    @include('layouts.particles.header')
    @yield('header_script')

</head>
<body>

<div id="app">
@include('layouts.particles.new_header-nav')

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
@routes


</div>
@include('layouts.particles.footer')
</body>
</html>

