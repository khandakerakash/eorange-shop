@extends('layouts.front')
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}});">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h1>{{$lang->blogss}}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Ending of Section title overlay area -->
<div class="section-padding blog-post-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
            @if(strlen($blog->title) > 50)
              @if($gs->rtl == 1)
              <h1 dir="rtl">{{$blog->title}}</h1>
              @else
              <h1>{{$blog->title}}</h1>
              @endif
            @else
              <h1>{{$blog->title}}</h1>
            @endif
                            <ul style="direction: ltr;">
                                <li><i class="fa fa-clock-o"></i> {{$blog->created_at->diffForHumans()}}</li>
                                <li>{{$lang->bs}}: {{$blog->source}}</li>
                                <li><i class="fa fa-eye"></i> {{$blog->views}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p><img src="{{asset('assets/images/'.$blog->photo)}}" alt=""></p>
                        <div class="entry-content" dir="{{$gs->rtl == 1 ? 'rtl':''}}">
                          {!!$blog->details!!}
                        </div>

                        <div class="social-sharing a2a_kit a2a_kit_size_32">
                            <a class="facebook a2a_button_facebook" href=""><i class="fa fa-facebook"></i> Share </a>
                            <a class="twitter a2a_button_twitter" href=""><i class="fa fa-twitter"></i> Tweet</a>
                            <a class="pinterest a2a_button_google_plus" href=""><i class="fa fa-pinterest"></i> Pinterest</a>
                        </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>

                        <div class="blog-comments-msg-area">
                            <h2>{{$lang->contacts}}</h2>
                            <hr>
                             @include('includes.form-success') 
                            <form action="{{route('front.contact.submit')}}" method="POST">
                                <input type="hidden" name="to" value="{{$ps->contact_email}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">{{$lang->con}}</label>
                                    <input class="form-control" name="name" placeholder="" required="" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{$lang->coe}}</label>
                                    <input class="form-control" name="email" placeholder="" required="" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">{{$lang->cor}}</label>
                                    <textarea name="message" class="form-control" id="comments-msg" rows="5" style="resize: vertical;" required=""></textarea>
                                </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <img id="codeimg" src="{{url('assets/images')}}/capcha_code.png">
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2">
                                            <span style="cursor: pointer;" class="refresh_code"><i class="fa fa-refresh fa-2x" style="margin-top: 10px;"></i></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-8">

                                            <input class="form-control" name="codes" placeholder="Enter Code" required="" type="text">
                                        </div>
                                    </div>
                                    <br>
                                <div class="form-group">
                                    <button class="btn blog-btn comments" type="submit">{{$lang->sm}}</button>
                                </div>
                            </form>
                        </div>  

                        </div>

                    <div class="col-md-4">
                       <div class="post-sidebar-area">
                           <h2 class="post-heading">{{$lang->blogsss}}</h2>
                           <ul style="direction: ltr;">
                              @foreach($lblogs as $lblog)
                               <li>
                                   <div class="row post-row">
                                       <div class="col-xs-4">

                                           <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                       </div>
                                       <div class="col-xs-8">
                                           <p class="post-meta-date">{{date('d M Y',(strtotime($lblog->created_at)))}}</p>
                                           <a href="{{route('front.blogshow',$lblog->id)}}">{{strlen($lblog->title) > 30 ? substr($lblog->title,0,30)."..." : $lblog->title}}</a>
                                       </div>
                                   </div>
                               </li>
                               @endforeach
                           </ul>
                       </div>
                   </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        $('.refresh_code').click(function () {
            $.get('{{url('contact/refresh_code')}}', function(data, status){
                $('#codeimg').attr("src","{{url('assets/images')}}/capcha_code.png?time="+ Math.random());
            });
        })
    </script>
@stop