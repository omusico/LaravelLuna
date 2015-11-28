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
        @if(env('SITE_TYPE','')=='five')
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                    @endif
                    <div class="cm_wrapper clear">
                        <div class="cm_w1000" style="width: 100%;background-color: transparent"><img src="/css/favourable.gif" alt="优惠活动"
                                                   width="1000" height="100%"></div>
                    </div>
                    @if(env('SITE_TYPE','')=='five')
                </div>
            </div>
        @endif
    </div>
@stop