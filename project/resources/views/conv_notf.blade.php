      @php
        $conv_notff = App\UserNotification::where('user_id','=',Auth::guard('user')->user()->id)->get();
        if($conv_notff->count() > 0){
          foreach($conv_notff as $notf){
            $notf->is_read = 1;
            $notf->update();
          }
        }
      @endphp   

                                                            <div class="profile-comments-title">
                                                                <h5>New Conversations.</h5>
                                                                @if($conv_notff->count() > 0)
                                                                <p  style="cursor: pointer;" id="conv_clear">Clear All</p>
                                                                @endif
                                                            </div>

                                                            @if($conv_notff->count() > 0)
                                                            @foreach($conv_notff as $notf)
                                                            <div class="single-comments-area">
                                                               <div class="comments-img">
                                                                    <img src="{{$notf->conversation->sent->photo != null ? asset('assets/images/'.$notf->conversation->sent->photo) : asset('assets/images/noimage.png')}}" alt="comments image">
                                                               </div>
                                                               <div class="single-comments-text">
                                                                   <h5><a href="{{route('user-message',$notf->conversation->id)}}" style="color: #333;">You Have a New Conversation.</a></h5>
                                                               </div>
                                                               </div>
                                                              @endforeach
                                                            @else
                                                            <div class="single-comments-area">
                                                            <h5>No New Conversation.</h5> 
                                                            </div>  
                                                            @endif