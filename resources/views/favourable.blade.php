@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    优惠活动
@stop
@section('css')
    <style type="text/css">
        .cm_wrapper {
            /*min-width: 100%;*/
            position: relative;
            /*border-bottom: 4px solid #530000;*/
        }

        .clear {
            clear: both;
            overflow: hidden;
            zoom: 1;
        }
    </style>
@stop
@section('content')
    <div class="container" style="text-align: center;">
        @if(env("SITE_TYPE")=="five")
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                    <img src="/css/fivefav1.jpg" alt="优惠活动" width="100%" height="100%"></div>
            </div>
        @elseif(env("SITE_TYPE","")=="gaopin")
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                    <img src="/css/gpfav1.jpg" alt="优惠活动" width="100%" height="100%"></div>
            </div>
        @else
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                    <img src="/css/k3fav7.jpg" alt="优惠活动" width="100%" height="100%"></div>
            </div>
        @endif
    </div>
    @include('User.mobilebottom')
@stop