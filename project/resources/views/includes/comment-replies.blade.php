@if(Auth::guard('user')->check())

      <!--  Starting of product detail comments area   -->
    <div class="container pt-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-comments-area product">
                    <h3 id="cmnt-text">{{ count($product->comments) > 1 ? "COMMENTS":"COMMENT"}} (<span id="cmnt_count">{{count($product->comments)}}</span>)</h3>

                <div class="blog-comments-msg-area">
                    <form action="" method="POST" id="cmnt">
                      {{csrf_field()}}
                            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                            <input type="hidden" name="user_id" id="user_id" value="{{Auth::guard('user')->user()->id}}">
                        <div class="form-group">
                            <textarea name="text" placeholder="Write Your Comments Here..." id="txtcmnt" rows="5" class="form-control" style="resize: vertical;" required></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn blog-btn comments">COMMENT</button>
                        </div>
                    </form>
                </div>
                <div id="comments">
        @if($product->comments)
            @foreach($product->comments()->orderBy('created_at','desc')->get() as $comment)
              <div id="comment{{$comment->id}}">
                        <div class="row single-blog-comments-wrap">
                            <div class="col-lg-12">
                                <h4><a class="comments-title">{{$comment->user->name}}</a></h4>
                                <div class="comments-reply-area">{{ $comment->created_at->diffForHumans() }}</div>
                                <p id="cmntttl{{$comment->id}}">{{$comment->text}}</p>
                                <div class="replay-form">
                                    <p class="text-right">
                                      <button class="replay-btn">Reply <i class="fa fa-reply-all"></i></button>
                                      @if(Auth::guard('user')->user()->id == $comment->user_id)
                                      <button class="replay-btn-edit">Edit <i class="fa fa-edit"></i></button>
                                      <button class="replay-btn-delete">Remove <i class="fa fa-trash"></i></button>
                                      @endif
                                    </p>
                                    <form action="" method="POST" class="reply">
                                      {{csrf_field()}}
                                  <input type="hidden" name="comment_id" id="comment_id{{$comment->id}}" value="{{$comment->id}}">
                                  <input type="hidden" name="user_id" id="user_id{{$comment->id}}" value="{{Auth::guard('user')->user()->id}}">
                                      <div class="form-group">
                                        <input type="text " name="text" id="txtcmnt{{$comment->id}}" class="form-control" placeholder="Write Your Replies Here..." required="">
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">Reply</button>
                                      </div>
                                    </form>
                                    <form action="" method="POST" class="comment-edit">
                                      {{csrf_field()}}
                                  <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                      <div class="form-group">
                                        <input type="text" id="editcmnt{{$comment->id}}" name="text" class="form-control" placeholder="Edit Your Comment..." required="">
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">Update</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="replies{{$comment->id}}" style="display: none;">
                   @if($comment->replies)
                   @foreach($comment->replies as $reply)
                   <div id="reply{{$reply->id}}">                   
                        <div class="row single-blog-comments-wrap replay">
                            <div class="col-lg-12">
                                <h4><a class="comments-title">{{$reply->user->name}}</a></h4>
                                <div class="comments-reply-area">{{ $reply->created_at->diffForHumans() }}</div>
                                <p id="rplttl{{$reply->id}}">{{$reply->text}}</p>
                                <div class="replay-form">
                                    <p class="text-right">
                                      <button class="subreplay-btn">Reply <i class="fa fa-reply-all"></i></button>
                                      @if(Auth::guard('user')->user()->id == $reply->user_id)
                                      <button class="replay-btn-edit1">Edit <i class="fa fa-edit"></i></button>
                                      <button class="replay-btn-delete1">Remove <i class="fa fa-trash"></i></button>
                                      @endif
                                    </p>
                                    <form action="" method="POST" class="subreply">
                                      {{csrf_field()}}
                                  <input type="hidden" name="reply_id" id="reply_id{{$reply->id}}" value="{{$reply->id}}">
                                  <input type="hidden" name="user_id" id="user_id{{$reply->id}}" value="{{Auth::guard('user')->user()->id}}">
                                      <div class="form-group">
                                        <input type="text " name="text" id="txtrpl{{$reply->id}}" class="form-control" placeholder="Write Your Replies Here..." required="">
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">Reply</button>
                                      </div>
                                    </form>
                                    <form action="" method="POST" class="reply-edit">
                                      {{csrf_field()}}
                                  <input type="hidden" name="reply_id" value="{{$reply->id}}">
                                      <div class="form-group">
                                        <input type="text" id="editrpl{{$reply->id}}" name="text" class="form-control" placeholder="Edit Your Reply..." required="">
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">Update</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="subreplies{{$reply->id}}" style="display: none;">
                          @if($reply->subreplies)
                            @foreach($reply->subreplies as $subreply)
                            <div id="subreply{{$subreply->id}}">
                        <div class="row single-blog-comments-wrap subreplay">
                            <div class="col-lg-12">
                                <h4><a class="comments-title">{{$subreply->user->name}}</a></h4>
                                <div class="comments-reply-area">{{ $subreply->created_at->diffForHumans() }}</div>
                                <p id="subrplttl{{$subreply->id}}">{{$subreply->text}}</p>
                                <div class="replay-form">
                                    <p class="text-right">
                                      @if(Auth::guard('user')->user()->id == $subreply->user_id)
                                      <button class="replay-btn-edit2">Edit <i class="fa fa-edit"></i></button>
                                      <button class="replay-btn-delete2">Remove <i class="fa fa-trash"></i></button>
                                      @endif
                                    </p>
                                    <form action="" method="POST" class="subreply-edit">
                                      {{csrf_field()}}
                                      <div class="form-group">
                                        <input type="hidden" name="subreply_id" value="{{$subreply->id}}">
                                        <input type="text" id="editsubrpl{{$subreply->id}}" name="text" class="form-control" placeholder="Edit Your Reply..." required="">
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-no-border hvr-shutter-out-horizontal">Update</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                          </div>
                            @endforeach
                          @endif
                        </div>
                      </div>
                    @endforeach
                    @endif
                  </div>

              </div>
          @endforeach
        @endif
        </div>
                </div>
        </div>
      </div>
    </div>
    <!--  Ending of product detail comments area   -->

@else

    <div class="container pt-50">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-comments-area product">
            <hr>
            <h2 class="text-center">PLEASE <a style="cursor: pointer;"  class="no-wish" data-toggle="modal" data-target="#loginModal">SIGNIN</a> FIRST FOR DISCUSSION </h2>
            <hr>
          </div>
        </div>
      </div>
    </div>


@endif