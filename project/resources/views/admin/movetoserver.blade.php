@extends('layouts.admin')

@section('content')

            <div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard add-product-1 area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                        <div class="add-product-header text-center">
                                            <h2>Backup The System For Another Server</h2>
                                        </div>
                                        <hr/>
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        <div style="padding: 10px;" class="text-center">
                                                @if($bkuplink == "")
                                                    <span id="bkupData">No Backup File Generated.</span>
                                                @else
                                                    <span id="bkupData"><a href="{{$bkuplink}}">{{$chk}}</a><a href="{{route('admin-clear-backup')}}"> <i class="fa fa-times-circle"></i></a></span>
                                                @endif
                                            </div>
                                          <hr/>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" id="generateBkup" type="button" class="btn add-product_btn">Generate Backup</button>
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">

        $("#generateBkup").click(function(){
            $('#bkupData').html('<img style="height:100px;" src="{{asset("assets/images/".$gs->loader)}}"><br>Generating Backup... Please wait....');
            $.ajax({
                url: "{{url('admin/check/movescript')}}",
                success: function(result){
                    if(result.status == 'success'){
                        $("#bkupData").html('<a href="'+result.backupfile+'">'+result.filename+'</a>');
                    }
                }
            });
        });

    </script>

@endsection
