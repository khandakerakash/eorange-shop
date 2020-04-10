@extends('layouts.front_master')
@section('title',substr($product->name, 0,10)."-".$gs->title)
@section('meta_data')
    <meta name="keywords" content="{{$product->meta_tag != null ? $product->meta_tag : $pmeta}}">
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:description" content="{{ $product->meta_description != null ? $product->meta_description : strip_tags($product->description) }}" />
    <meta property="og:image" content="{{asset('assets/images/'.$product->photo)}}" />

    <title>{{substr($product->name, 0,10)."-"}}{{$gs->title}}</title>
    <!-- End Facebook Pixel Code -->
@endsection
