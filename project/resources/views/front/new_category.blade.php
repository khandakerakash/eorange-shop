@extends('layouts.front')
@section('content')

    <front-category ></front-category>
@endsection

@section('scripts')
    {{--<script>
        //---------Countdown-----------
        $('#clock').countdown('{{$gs->count_date}}', function (event) {
            $(this).html(event.strftime('<span class="countdown-timer-wrap"></span><span class="single-countdown-item">%w <br/><span>{{$lang->week}}</span></span> <span class="single-countdown-item">%d <br/><span>{{$lang->day}}</span></span> <span class="single-countdown-item">%H <br/><span>{{$lang->hour}}</span></span> <span class="single-countdown-item">%M <br/><span>{{$lang->minute}}</span></span> <span class="single-countdown-item">%S <br/><span>{{$lang->second}}</span></span> </span>'));
        });
    </script>--}}
@endsection