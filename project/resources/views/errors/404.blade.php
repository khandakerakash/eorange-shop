@extends('layouts.front')

@section('title', '404 - eOrange.shop')

@section('content')

<!--  404 page start  -->


<section style="background:#f0ecec;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
               <div class="error_img" style="margin:auto;">
                    <img src="{{ asset('assets/front/images/404.png') }}" class="img-fluid" alt="">
                    <h2>Opps we can’t seems to find the page you are looking for</h2>
               <a href="{{url('/')}}">Go Back To Home</a>
               </div>
            </div>
        </div>
    </div>
</section>

<!--  404 page end  -->



@endsection
