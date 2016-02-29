@extends('Layout.fivemaster')
@section('title')
    11x5娱乐平台
@stop
@section('css')
    <style type="text/css">
        .carousel-caption p {
            font-size: 150%;
        }

        .lottery_box .lottery_tit {
            float: left;
            display: block;
            margin-right: 17px;
            text-align: center;
            color: #999;
            cursor: pointer;
            position: relative;
            z-index: 10;
        }

        .sub_lottery_tip a {
            margin-right: 0 !important;
            color: #e17f1a;
        }

        .notice_nav li.cur {
            color: #333;
        }

        .notice_nav .cur {
            background-color: #fff;
            border-left: 1px solid #e5e5e5;
            border-right: 1px solid #e5e5e5;
            position: relative;
            height: 25px;
        }

        .notice_nav li {
            width: 65px;
            text-align: center;
            height: 24px;
            line-height: 25px;
            float: left;
            border-left: 1px solid #f4f4f4;
            border-right: 1px solid #f4f4f4;
            cursor: default;
            margin-left: -1px;
        }

        a {
            color: #000000;
        }

        .distance {
            overflow: hidden;
            /*margin-top: 15px;*/
            /*border: 1px solid #ccc;*/
            background: #fff;
        }

        .nk3_kjgg h2 a {
            float: right;
            font-weight: normal;
            color: #666;
            padding-right: 8px;
            display: inline;
            font-size: 12px;
        }

        .nk3_kjgg li a {
            float: left;
        }

        .nk3_kjgg ul {
            margin: 3px 0 10px 0;
        }

        .nk3_kjgg li {
            background-color: white;
            /*margin-left: 4px;*/
            line-height: 32px;
            border-bottom: dotted 1px #888;
            padding: 10px 0 10px 0;
            width: 341px;
            color: #8c8a8b;
            height: 203px;
        }

        .nk3_kjgg li em {
            font-style: normal;
            color: #d80000;
        }

        .nk3_kjgg li strong {
            color: #e26f28;
            font-size: larger;
        }

        .navbar-nav > li {
            padding-left: 18px;
            padding-right: 18px;
        }

        /*.nav > li > a:focus, .nav > li > a:hover {*/
        /*text-decoration: none;*/
        /*background-color: #70c3ab;*/
        /*}*/
    </style>
@stop
@section('content')
    <div class="row" style="display: none">
        <div class="col-md-10 col-md-offset-1">
            <marquee scrollamount=3 style="color:white">{{Cache::get('marquee','请到后台设置滚动文字')}}</marquee>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="fivetop"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="carousel-generic" class="carousel slide" data-ride="carousel"
             xmlns="http://www.w3.org/1999/html">
            <div class="fiveindexlogin">
                <div style="margin-top: 40px">
                    @include('userinfo')
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-generic" data-slide-to="1"></li>
                <li data-target="#carousel-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active" style="background: no-repeat scroll">
                    <div class="fiveindex01">
                    </div>

                    <div class="carousel-caption">
                        {{--<p>中奖率高、赔率高、信誉100%</p>--}}
                    </div>
                </div>
                <div class="item">
                    <div class="fiveindex02">
                    </div>

                    <div class="carousel-caption">
                        {{--<p>中奖率高、赔率高、信誉100%</p>--}}
                    </div>
                </div>
                <div class="item">
                    <div class="fiveindex03">
                    </div>

                    <div class="carousel-caption">
                        {{--<p>优惠多多、取款5分钟内到帐</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="fivecenter"></div>
    </div>
    @include('User.mobilebottom')
@stop
@section('script')
    <script type="text/javascript">
        function userclick(type) {
            if (type == 1) {

                window.location.href = 'register';
            }
            if (type == 2) {

                window.location.href = 'recharge';
            }
            if (type == 3) {

                window.location.href = 'deposit';
            }
            if (type == 4) {

                window.location.href = 'dailiregister';
            }
            if (type == 5) {
                $('#myModal').modal('show');
            }
        }
    </script>
@stop
