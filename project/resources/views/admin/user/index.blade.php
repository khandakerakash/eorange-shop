@extends('layouts.admin')

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
                                                    <h2>Customers</h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Customers</p>
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                      <hr>
                  <div>
                                          @include('includes.form-error')
                                          @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
                                    <div class="table-responsive">
                                      <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                              <thead>
                                                  <tr>
                                                    <th style="width: 239px;">Customer's Name</th>
                                                    <th style="width: 171px;">Customer's Email</th>
                                                    <th style="width: 134px;">Address</th>
                                                    <th style="width: 340px;">Actions</th>
                                                  </tr>
                                              </thead>

                                              <tbody>
                                                @foreach($users as $user)                                                  
                                              <tr role="row" class="odd">

                                                      <td tabindex="0" class="sorting_1">{{$user->name}}</td>
                                                      <td>{{$user->email}}</td>
                                                 <td>
                                                    {{$user->address}}
                                                        </td>
                                                      <td>
                                                      <a href="{{route('admin-user-show',$user->id)}}" class="btn btn-primary product-btn"><i class="fa fa-check"></i> View Details</a>
                                                      <a href="{{route('admin-user-email',$user->id)}}" class="btn btn-success product-btn"><i class="fa fa-send"></i> Send Email</a>
                                                        <a href="{{route('admin-user-delete',$user->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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