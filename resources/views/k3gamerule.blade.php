@extends('master')
@section('title')
    中国快三网-游戏规则
@stop
@section('css')
    <style type="text/css">
        .cm_wrapper {
            min-width: 1000px;
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
    <div style="text-align: center;background: #fff1b4;">

        <div class="cm_wrapper clear">
            <div class="cm_w1000"><img src="/css/cm_banner.jpg" alt="拿起3枚骰子 快3号就有了"
                                       width="1000" height="441"></div>
            <div class="cm_left_banner"></div>
            <div class="cm_right_banner"></div>
        </div>
        <div class="cm_wrapper clear">
            <div class="cm_w1000"><img src="/css/middlerule.png" alt="拿起3枚骰子 快3号就有了"
                                       width="1000" height="auto"></div>
        </div>
        <div class="cm_wrapper clear" style="margin-bottom: 10px;border-bottom: 1px solid">
            <div class="cm_w1000"><img src="/css/bottomrule.png" alt="拿起3枚骰子 快3号就有了"
                                       width="1000" height="auto"></div>
        </div>
    </div>
@stop