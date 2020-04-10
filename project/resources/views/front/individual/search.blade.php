@extends('layouts.front')
@section('content')
    <front-search search="{{request()->product}}"></front-search>
@endsection