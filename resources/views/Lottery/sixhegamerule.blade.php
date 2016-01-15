@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    六合彩游戏规则
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
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                <img src="/css/liuherule.jpg" alt="优惠活动" width="100%" height="100%"></div>
        </div>
    </div>
@stop