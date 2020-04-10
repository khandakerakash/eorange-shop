@extends('layouts.admin')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Contact Page Content -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                    <div class="product__header"  style="border-bottom: none;">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>Update Language <a href="{{ route('admin-lang-index') }}" style="padding: 5px 12px;" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a></h2>
                                                    <p>Dashboard <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Language Settings <i class="fa fa-angle-right" style="margin: 0 2px;"></i> Update
                                                </div>
                                            </div>
                                              @include('includes.notification')
                                        </div>   
                                    </div>
                                        <hr>
                              <form class="form-horizontal" action="{{route('admin-lang-update',$data->id)}}" method="POST">
                                          @include('includes.form-error')
                                          @include('includes.form-success')      
                                        {{csrf_field()}}

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Language Name *</label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="language" placeholder="Language Name" value="{{$data->language}}" required="">
                                            </div>
                                          </div>
<hr style="margin-top: 20px; margin-bottom: 20px;">

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">All Categories Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="all_categories" placeholder="All Categories Text" value="{{$data->all_categories}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Home Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="home" placeholder="Home" value="{{$data->home}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">About Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="about" placeholder="About Text" value="{{$data->about}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blog" placeholder="blog Text" value="{{$data->blog}}" required="">
                                            </div>
                                          </div>       
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blogs Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogs" placeholder="Blogs Text" value="{{$data->blogs}}" required="">
                                            </div>
                                          </div>                                                                
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Details Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogss" placeholder="Blog Details" value="{{$data->blogss}}" required="">
                                            </div>
                                          </div>   
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Recent Posts Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="blogsss" placeholder="Recent Posts Text" value="{{$data->blogsss}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Contact Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contacts" placeholder="Blog Contact Text" value="{{$data->contacts}}" required="">
                                            </div>
                                          </div>                
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="faq" placeholder="Faq Text" value="{{$data->faq}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Title Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="faqs" placeholder="Faq Title Text" value="{{$data->faqs}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Faq Page Header Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="maq" placeholder="Faq Page Header Text" value="{{$data->maq}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="contact" placeholder="Contact Text" value="{{$data->contact}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Others Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="others" placeholder="Others Text" value="{{$data->others}}" required="">
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Support Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="support" placeholder="Support Text" value="{{$data->support}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Heading Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="search" placeholder="Search Heading Text" value="{{$data->search}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Placeholder Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ec" placeholder="Search Placeholder Text" value="{{$data->ec}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Front Page Wish List Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wishlists" placeholder="Front Page Wish List Text" value="{{$data->wishlists}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Front Page Wish List Heading Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_head" placeholder="Front Page Wish List Heading Text" value="{{$data->wish_head}}" required="">
                                            </div>
                                          </div>                                          
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Account Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fh" placeholder="My Account Text" value="{{$data->fh}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">My Cart Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fht" placeholder="My Cart Text " value="{{$data->fht}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Empty Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="h" placeholder="Cart Empty Text" value="{{$data->h}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Total Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vt" placeholder="Total Text" value="{{$data->vt}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Checkout Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="gt" placeholder="Checkout Text" value="{{$data->gt}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Cart Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vdn" placeholder="View Cart Text " value="{{$data->vdn}}" required="">
                                            </div>
                                          </div> 

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Top Category Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bgs" placeholder="Top Category Text" value="{{$data->bgs}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Featured Products Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="featured_product" placeholder=">Featured Products Text" value="{{$data->featured_product}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Featured Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bg" placeholder="Featured Text" value="{{$data->bg}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Best Seller Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="lm" placeholder="Best Seller Text" value="{{$data->lm}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Top Rate Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="rds" placeholder="Top Rate Text" value="{{$data->rds}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Arrival Products Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="new_arrival" placeholder=">New Arrival Products Text" value="{{$data->new_arrival}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Hot Sale Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hot_sale" placeholder=">Hot Sale Text" value="{{$data->hot_sale}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Latest Special Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="latest_special" placeholder="Latest Special Text" value="{{$data->latest_special}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Big Save Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="big_sale" placeholder="Big Save Text" value="{{$data->big_sale}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Weeks Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="week" placeholder="Weeks Text" value="{{$data->week}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Days Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="day" placeholder="Days Text" value="{{$data->day}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Hours Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hour" placeholder="Hours Text" value="{{$data->hour}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Minutes Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="minute" placeholder="Minutes Text" value="{{$data->minute}}" required="">
                                            </div>
                                          </div>                                                       
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Seconds Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="second" placeholder="Seconds Text" value="{{$data->second}}" required="">
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Now Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_now" placeholder="Shop Now Text" value="{{$data->shop_now}}" required="">
                                            </div>
                                          </div>                               
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Add To Cart Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="hcs" placeholder="Add To Cart Text" value="{{$data->hcs}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Out Of Stock Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dni" placeholder="Out Of StockText" value="{{$data->dni}}" required="">
                                            </div>
                                          </div>
 
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Available Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sbg" placeholder="Available Text" value="{{$data->sbg}}" required="">
                                            </div>
                                          </div>
  
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quantity Text*<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dopd" placeholder="Quantity Text" value="{{$data->dopd}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Size Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doo" placeholder="Size Text" value="{{$data->doo}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Color Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="colors" placeholder="Color Text" value="{{$data->colors}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Quick Review Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dol" placeholder="Quick Review Text" value="{{$data->dol}}">
                                            </div>
                                          </div>                                         
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Filter Option Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doa" placeholder="Filter Option Text" value="{{$data->doa}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Latest Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doe" placeholder="Sort Latest Text " value="{{$data->doe}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Oldest Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dor" placeholder="Sort Oldest Text " value="{{$data->dor}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Lowest Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dopr" placeholder="Sort Lowest Text " value="{{$data->dopr}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sort Highest Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doc" placeholder="Sort Highest Text" value="{{$data->doc}}">
                                            </div>
                                          </div>
<!-- ****************************** DONE ******************** -->   
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">All Categories Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doci" placeholder="All Categories Text" value="{{$data->doci}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Price Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dosp" placeholder="Price Text" value="{{$data->dosp}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Price Search Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="don" placeholder="Price Search Text" value="{{$data->don}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Popular Tags Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doem" placeholder="Popular Tags Text" value="{{$data->doem}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Tag Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dom" placeholder="Tag Text" value="{{$data->dom}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Search Result Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ss" placeholder="Search Result Text" value="{{$data->ss}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reviews Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dttl" placeholder="Reviews Text" value="{{$data->dttl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Product Details Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="product_detail" placeholder="Product Details Text" value="{{$data->product_detail}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Full Description Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ddesc" placeholder="Full Description Text" value="{{$data->ddesc}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Return & Policy Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ppr" placeholder="Return & Policy Text" value="{{$data->ppr}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Write a Review Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpr" placeholder="Write a Review Text" value="{{$data->fpr}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Submit Review Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="size" placeholder="Submit Review Text" value="{{$data->size}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">No Review Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="md" placeholder="No Review Text" value="{{$data->md}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Related Products Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="amf" placeholder="Related Products Text" value="{{$data->amf}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Your Rating Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dofpl" placeholder="Your Rating Text" value="{{$data->dofpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Remove Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cremove" placeholder="Cart Remove Text" value="{{$data->cremove}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Image Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cimage" placeholder="Cart Image Text" value="{{$data->cimage}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Product Name Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cproduct" placeholder="Cart Product Name Text" value="{{$data->cproduct}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Edit Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cedit" placeholder="Cart Edit Text" value="{{$data->cedit}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Quantity Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cquantity" placeholder="Cart Quantity Text" value="{{$data->cquantity}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Unit Price Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cupice" placeholder="Cart Unit Price Text" value="{{$data->cupice}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cart Sub Total Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cst" placeholder="Cart Sub Total Text" value="{{$data->cst}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Continue Shopping Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ccs" placeholder="Continue Shopping Text" value="{{$data->ccs}}" required="">
                                            </div>
                                          </div>



                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Proceed Checkout Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cpc" placeholder="Proceed Checkout Text" value="{{$data->cpc}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Details Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="odetails" placeholder="Order Details Text " value="{{$data->odetails}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Billing Details Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bdetails" placeholder="Billing Details Text " value="{{$data->bdetails}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shipping Cost Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ship" placeholder="Shipping Cost Text " value="{{$data->ship}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Now Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="onow" placeholder="Order Now Text " value="{{$data->onow}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Payment Method Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cup" placeholder="Payment Method Text" value="{{$data->cup}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Paypal Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pp" placeholder="Paypal Text" value="{{$data->pp}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Credit Card Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="app" placeholder="Credit Card Text" value="{{$data->app}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Mobile Money Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dotpl" placeholder="Mobile Money Text " value="{{$data->dotpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Bank Wire Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dogpl" placeholder="Bank Wire Text" value="{{$data->dogpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Cash On Delivery Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dolpl" placeholder="Cash On Delivery Text" value="{{$data->dolpl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Ship To Address Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ships" placeholder="Ship To Address Text " value="{{$data->ships}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Ship To Another Address Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shipss" placeholder="Ship To Another Address Text " value="{{$data->shipss}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Pick Up Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickup" placeholder="Pick Up Text" value="{{$data->pickup}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Pick Up Location Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickups" placeholder="Pick Up Location Text" value="{{$data->pickups}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Notes Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="onotes" placeholder="Order Notes Text" value="{{$data->onotes}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Transaction Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="tid" placeholder="Transaction Text" value="{{$data->tid}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">PickUp Location Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="pickupss" placeholder="Transaction Text" value="{{$data->pickupss}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Name Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="con" placeholder="Contact Name Text" value="{{$data->con}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Phone Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cop" placeholder="Contact Phone Text" value="{{$data->cop}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Email Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="coe" placeholder="Contact Email Text" value="{{$data->coe}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Reply Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cor" placeholder="Contact Replay Text" value="{{$data->cor}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Enter Code Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="enter_code" placeholder="Contact Enter Code Text" value="{{$data->enter_code}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign In Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signin" placeholder="Sign In Text" value="{{$data->signin}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Login Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sie" placeholder="Login Text" value="{{$data->sie}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="spe" placeholder="Sign Up Password Text" value="{{$data->spe}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="signup" placeholder="Sign Up Text" value="{{$data->signup}}" required="">
                                            </div>
                                          </div>



                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sup" placeholder="Sign Up Password Text" value="{{$data->sup}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Up Confirm Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sucp" placeholder="Sign Up Confirm Password Text" value="{{$data->sucp}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Dashboard Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dashboard" placeholder=">Dashboard Text" value="{{$data->dashboard}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Edit Profile Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="edit" placeholder="Edit Profile Text" value="{{$data->edit}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Reset Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="reset" placeholder="Reset Password Text" value="{{$data->reset}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Orders Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cn" placeholder="Create New Account Text" value="{{$data->cn}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Sign Out Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="logout" placeholder="Sign Out Text" value="{{$data->logout}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Current Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cp" placeholder="Current Password Text" value="{{$data->cp}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">New Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="np" placeholder="New Password Text" value="{{$data->np}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Re-Type New Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="rnp" placeholder="Re-Type New Password Text" value="{{$data->rnp}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Change Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="chnp" placeholder="Change Password Text" value="{{$data->chnp}}" required="">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Video Title Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="video_title" placeholder="Video Title Text" value="{{$data->video_title}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Latest Blogs Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="lns" placeholder="Latest Blogs Text" value="{{$data->lns}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Details Button Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vd" placeholder="View Details Text" value="{{$data->vd}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Review Title Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="review_title" placeholder="Review Title Text" value="{{$data->review_title}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Happy Customer Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sue" placeholder="Happy Customer Text" value="{{$data->sue}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ston" placeholder="Subscribe Text" value="{{$data->ston}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Button Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="s" placeholder="Subscribe Button Text" value="{{$data->s}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Subscribe Placeholder Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="supl" placeholder="Subscribe Placeholder Text" value="{{$data->supl}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Footer Links Text*<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fl" placeholder="Footer Links Text" value="{{$data->fl}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Contact Button Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sm" placeholder="Contact Button Text" value="{{$data->sm}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpw" placeholder="Forgot Password Text" value="{{$data->fpw}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Title *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpt" placeholder="Forgot Password Title" value="{{$data->fpt}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Email *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpe" placeholder="Forgot Password Email" value="{{$data->fpe}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Forgot Password Button *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fpb" placeholder="Forgot Password Button" value="{{$data->fpb}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Already Account Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="al" placeholder="Already Account Text" value="{{$data->al}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Blog Source Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="bs" placeholder="Blog Source Text" value="{{$data->bs}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Full Name Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="fname" placeholder="Full Name Text" value="{{$data->fname}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Phone Number Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doph" placeholder="HandyMan Phone Text" value="{{$data->doph}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Email Address Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doeml" placeholder="HandyMan Emali Text" value="{{$data->doeml}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">City Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doct" placeholder="City Text" value="{{$data->doct}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Address Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doad" placeholder="Address Text" value="{{$data->doad}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Fax Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="dofx" placeholder="Fax Text" value="{{$data->dofx}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Postal Code Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="suph" placeholder="Postal Code Text" value="{{$data->suph}}" required="">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Review Description Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="suf" placeholder="Sign Up Name Text" value="{{$data->suf}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Button Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="doupl" placeholder="Update Button Text" value="{{$data->doupl}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Update Success Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="success" placeholder=" Update Success Text" value="{{$data->success}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Country Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ctry" placeholder=" Enter Your Input" value="{{$data->ctry}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Select Country Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="sctry" placeholder=" Enter Your Input" value="{{$data->sctry}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Coupon Code Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="cpn" placeholder=" Enter Your Input" value="{{$data->cpn}}" required="">
                                            </div>
                                          </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Enter Coupon Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ecpn" placeholder=" Enter Your Input" value="{{$data->ecpn}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Apply Coupon Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="acpn" placeholder=" Enter Your Input" value="{{$data->acpn}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Discount Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ds" placeholder=" Enter Your Input" value="{{$data->ds}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Final Total Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="ft" placeholder=" Enter Your Input" value="{{$data->ft}}" required="">
                                            </div>
                                          </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View Website Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_website" placeholder=" Enter Your Input" value="{{$data->view_website}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Wishlist Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="wish_list" placeholder=" Enter Your Input" value="{{$data->wish_list}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Favorite Product Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="favorite_product" placeholder=" Enter Your Input" value="{{$data->favorite_product}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Processing Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="order_processing" placeholder=" Enter Your Input" value="{{$data->order_processing}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Order Completed Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="order_completed" placeholder=" Enter Your Input" value="{{$data->order_completed}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">View All Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="view_all" placeholder=" Enter Your Input" value="{{$data->view_all}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Shop Name Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="shop_name" placeholder=" Enter Your Input" value="{{$data->shop_name}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Vendor Description Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="vendor_description" placeholder=" Enter Your Input" value="{{$data->vendor_description}}" required="">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="contact_form_success_text">Linked Accounts Text *<span>(In Any Language)</span></label>
                                            <div class="col-sm-6">
                                              <input id="contact_form_success_text" class="form-control" type="text" name="linked_accounts" placeholder=" Enter Your Input" value="{{$data->linked_accounts}}" required="">
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Submit</button>   
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard FAQ Page -->
                </div>
            </div>
        </div>
    </div>
@endsection