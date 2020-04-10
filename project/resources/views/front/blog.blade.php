@extends('layouts.front')
@section('content')


    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{$lang->blogs}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->

    <div class="section-padding blog-wrap">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-title pb_50 text-center">

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                        <a href="{{route('front.blogshow',$blog->id)}}" class="single-news-list">
                            <div class="news-img">
                                <img class="news-img" src="{{asset('assets/images/'.$blog->photo)}}" alt="">
                                <div class="news-list-meta"><span>{{ date('d',strtotime($blog->created_at))}}</span> {{ date('M',strtotime($blog->created_at))}}</div>
                            </div>
                            <div class="news-list-text">   
                                <h4 dir="{{$gs->rtl == 1 ? 'rtl':''}}">{{strlen($blog->title) > 50 ? substr($blog->title,0,50)."..." : $blog->title}}</h4>
                                <p dir="{{$gs->rtl == 1 ? 'rtl':''}}">{{substr(strip_tags($blog->details),0,250)}}</p>
                            </div>
                            <hr>
                            <div class="news-list-button" dir="{{$gs->rtl == 1 ? 'rtl':''}}">
                                <span class="news-btn">{{$lang->vd}}</span>
                            </div>

                        </a>
                   </div>
                    @endforeach


                     </div>
                    <div class="text-center">
                    {!! $blogs->links() !!}                 
                    </div>
                </div>
            </div>

@endsection