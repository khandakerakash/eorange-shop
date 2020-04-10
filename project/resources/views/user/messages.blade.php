@extends('layouts.user')
@section('content')
  <div class="right-side">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Starting of Dashboard data-table area -->
        <div class="section-padding add-product-1">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="add-product-box">
                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Messages</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Messages</p>
                                                </div>
                                            </div>
                                              @include('includes.user-notification')
                                        </div>   
                                    </div>
                <div>
                        @include('includes.form-success')
                                          @include('includes.form-error')
                  <div class="row">
                    <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                        <thead style="display: none;">
                        <tr class="table-header-row">
                          <th>Name</th>
                          <th>Message</th>
                          <th>Sent</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($convs as $conv)
                        
                          <tr class="conv">
                            <input type="hidden" value="{{$conv->id}}">
                            @if($user->id == $conv->sent->id)
                            <td>{{$conv->recieved->name}}</td>    
                            @else
                            <td>{{$conv->sent->name}}</td>
                            @endif
                            <td>{{$conv->subject}}</td>
                            <td>{{$conv->created_at->diffForHumans()}}</td>
                            <td>
                              <a href="{{route('user-message',$conv->id)}}" class="btn btn-primary product-btn"><i class="fa fa-eye"></i> View Details</a>
                              <a href="{{route('user-message-delete',$conv->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                            </td>

                          </tr>
                        @endforeach
                        </tbody>
                      </table></div></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Ending of Dashboard data-table area -->
    </div>
  </div>
  </div>


@endsection
@section('scripts')

<script type="text/javascript">
  $( document ).ready(function() {
        $(".add-button").append('<div class="col-sm-4 add-product-btn text-right">'+
          '<a id="product-email" style="cursor: pointer;" class="add-newProduct-btn" data-toggle="modal" data-target="#emailModal">'+
          '<i class="fa fa-envelope-o"></i> Compose Email</a>'+
          '</div>');                                                                       
});
</script>

@endsection