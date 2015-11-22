@extends('Layout.fivemaster')
@section('title')
    11x5娱乐平台
@stop
@section('css')
    <style type="text/css">
        .carousel-caption p {
            font-size: 150%;
        }

        .h_l_cp {
            border: 1px solid #e6c9a0;
            /*background: #faf9f9;*/
            float: none;
            margin-bottom: 10px;
            position: relative;
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
            border: 1px solid #ccc;
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

        .nk3_kjgg ul {
            margin: 3px 0 10px 0;
        }

        .nk3_kjgg li {
            margin-left: 4px;
            line-height: 32px;
            border-bottom: dotted 1px #888;
            padding: 10px 0 10px 0;
            width: 301px;
            color: #f9d450;
            height: 120px;
        }

        .nk3_kjgg li em {
            font-style: normal;
            color: #d80000;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-md-offset-1 " style="margin-right: 0px">
                <div class="h_l_cp" style="height: 600px;">
                    @include('fiveuserinfo')
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mobilhide"
                     style="padding-left: 0px;padding-right: 0px;margin-right: 0px;border: 3px solid #EFE697">
                    <div id="carousel-generic" class="carousel slide" data-ride="carousel"
                         xmlns="http://www.w3.org/1999/html">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/css/five01.png" alt="...">

                                <div class="carousel-caption">
                                    {{--<p>中奖率高、赔率高、信誉100%</p>--}}
                                </div>
                            </div>
                            <div class="item">
                                <img src="/css/five02.png" alt="...">

                                <div class="carousel-caption">
                                    {{--<p>优惠多多、取款5分钟内到帐</p>--}}
                                </div>
                            </div>
                            <div class="item">
                                <img src="/css/five03.png" alt="...">

                                <div class="carousel-caption">
                                    {{--<p>中奖金额免税收</p>--}}
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-generic" role="button"
                           data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-generic" role="button"
                           data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 mobilhide" style="margin-left: 0px;padding-left: 0px">
                    <div class="notice m_b10" id="notice" style="border: 3px solid #EFE697">
                        <ul class="tabs-nav notice_nav" style="background-color: transparent">
                            <li class="cur" style="background-color: transparent"><a href="#" style="color: #f9d450">最新优惠</a>
                            </li>
                        </ul>
                        <div class="tabs-cnt notice_cont" style="height: 184px;background-color: transparent">
                            <ul class="list_icon" style="padding-left: 0px;color: red;">
                                @if(null!==Cache::get('news'))
                                    @foreach(Cache::get('news') as $key=>$value)
                                        <li><a style="width: 205px;color: red;"
                                               href="{{isset($value['url'])?$value['url']:'#'}}"
                                               target="_blank">{{isset($value['title'])?$value['title']:''}}</a><span
                                                    class="time"></span></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mobilhide" style="padding-left: 0px;padding-right: 0px;border-right: none">
                    <div class="distance nk3_kjgg" style="border-right: none;background-color: transparent">
                        <ul class="col-md-4">
                            @if(null !=$recentArray['SDFIVE'])
                                <li><strong>山东11选5</strong> 第<em>{{$recentArray['SDFIVE']->proName}}</em>期开奖号码<br>
                                    开奖时间：{{$recentArray['SDFIVE']->created_at}}
                                    <br>
                                    <a href="/fivelotteryIndex?lottery_type=sdfive">立即购买</a>

                                    <div class="fiveNum">{{explode(',', $recentArray['SDFIVE']->codes)[0]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SDFIVE']->codes)[1]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SDFIVE']->codes)[2]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SDFIVE']->codes)[3]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SDFIVE']->codes)[4]}}</div>
                                </li>
                            @endif
                            @if(null !=$recentArray['GDFIVE'])
                                <li><strong>广东11选5</strong> 第<em>{{$recentArray['GDFIVE']->proName}}</em>期开奖号码<br>
                                    开奖时间：{{$recentArray['GDFIVE']->created_at}}
                                    <br>
                                    <a href="/fivelotteryIndex?lottery_type=gdfive">立即购买</a>

                                    <div class="fiveNum">{{explode(',', $recentArray['GDFIVE']->codes)[0]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['GDFIVE']->codes)[1]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['GDFIVE']->codes)[2]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['GDFIVE']->codes)[3]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['GDFIVE']->codes)[4]}}</div>
                                </li>
                            @endif
                            @if(null !=$recentArray['SHFIVE'])
                                <li><strong>上海11选5</strong> 第<em>{{$recentArray['SHFIVE']->proName}}</em>期开奖号码<br>
                                    开奖时间：{{$recentArray['SHFIVE']->created_at}}
                                    <br>
                                    <a href="/fivelotteryIndex?lottery_type=shfive">立即购买</a>

                                    <div class="fiveNum">{{explode(',', $recentArray['SHFIVE']->codes)[0]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SHFIVE']->codes)[1]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SHFIVE']->codes)[2]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SHFIVE']->codes)[3]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['SHFIVE']->codes)[4]}}</div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 mobilhide" style="padding-left: 0px;">
                    <div class="distance nk3_kjgg" style="border-right: none;background-color: transparent">
                        <ul class="col-md-3">
                            @if(null !=$recentArray['JXFIVE'])
                                <li><strong>江西11选5</strong> 第<em>{{$recentArray['JXFIVE']->proName}}</em>期开奖号码<br>
                                    开奖时间：{{$recentArray['JXFIVE']->created_at}}
                                    <br>
                                    <a href="/fivelotteryIndex?lottery_type=jxfive">立即购买</a>

                                    <div class="fiveNum">{{explode(',', $recentArray['JXFIVE']->codes)[0]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['JXFIVE']->codes)[1]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['JXFIVE']->codes)[2]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['JXFIVE']->codes)[3]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['JXFIVE']->codes)[4]}}</div>
                                </li>
                            @endif
                            @if(null !=$recentArray['ZJFIVE'])
                                <li><strong>浙江11选5</strong> 第<em>{{$recentArray['ZJFIVE']->proName}}</em>期开奖号码<br>
                                    开奖时间：{{$recentArray['ZJFIVE']->created_at}}
                                    <br>
                                    <a href="/fivelotteryIndex?lottery_type=zjfive">立即购买</a>

                                    <div class="fiveNum">{{explode(',', $recentArray['ZJFIVE']->codes)[0]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['ZJFIVE']->codes)[1]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['ZJFIVE']->codes)[2]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['ZJFIVE']->codes)[3]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['ZJFIVE']->codes)[4]}}</div>
                                </li>
                            @endif
                            @if(null !=$recentArray['LIAONINGFIVE'])
                                <li><strong>辽宁11选5</strong> 第<em>{{$recentArray['LIAONINGFIVE']->proName}}</em>期开奖号码<br>
                                    开奖时间：{{$recentArray['LIAONINGFIVE']->created_at}}
                                    <br>
                                    <a href="/fivelotteryIndex?lottery_type=sdfive">立即购买</a>

                                    <div class="fiveNum">{{explode(',', $recentArray['LIAONINGFIVE']->codes)[0]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['LIAONINGFIVE']->codes)[1]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['LIAONINGFIVE']->codes)[2]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['LIAONINGFIVE']->codes)[3]}}</div>
                                    <div class="fiveNum">{{explode(',', $recentArray['LIAONINGFIVE']->codes)[4]}}</div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
