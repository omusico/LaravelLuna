@extends('master')
@section('title')
    中国快三网
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
            line-height: 19px;
            border-bottom: dotted 1px #888;
            padding: 10px 0 10px 0;
            width: 201px;
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
            <div class="col-md-3" style="margin-right: 0px">
                <div class="h_l_cp" style="height: 211px">
                    @include('userinfo')
                </div>
                <div class="h_l_cp" style="background-color: #fbf8e9;font-size: 90%">
                    <div style="border-bottom: #808080 solid 1px;text-align: center;font-family: bold">
                        <a><br/>购买快三 快速导航<br/><br/></a>
                    </div>
                    <ul class="lottery_box" style="list-style: none;padding-top: 15px">
                        <li>
                            <div class="sub_lottery_tip"><a href="/lotteryIndex?lottery_type=jsold" target="_blank"
                                                            title="" id="link115">猜一场，易中奖，87%返奖率！</a></div>
                            <br/>

                            <p class="sub_lottery">
                                <a target="_blank" href="/lotteryIndex?lottery_type=jsold"
                                   style="font-weight: bold; color: #E60010;" title="江苏快三" id="link116">江苏快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b style="color:#00a1ff;">中奖贼简单</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=beijin" title="北京快三" id="link117">北京快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b style="color:#47ff36">摇骰子,易中奖</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=fjk3" title="福建快三" id="link118">福建快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b style="color:#ff44dc">买三个号就中</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=anhui" title="安徽快三" id="link119">安徽快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span></a> <br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=jilin" title="吉林快三" id="link120">吉林快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b>一天77期(中奖容易)</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=jsnew" title="广西快三" id="link121">广西快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span></a><b>一天78期</b><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=hubei" title="湖北快三" id="link122">湖北快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=nmg" title="内蒙古快三" id="link123">内蒙快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b style="color:#ff6c00">100%中奖</b></a>
                            </p>
                        </li>
                        <li><a href="/k3GameRule" style="padding-left: 30px;list-style: none">如何投注？&nbsp;</a><a
                                    href="/k3GameRule">如何领奖？</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6" style="padding-left: 0px;padding-right: 0px">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"
                     xmlns="http://www.w3.org/1999/html">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="/css/001.png" alt="...">

                            <div class="carousel-caption">
                                {{--<p>中奖率高、赔率高、信誉100%</p>--}}
                            </div>
                        </div>
                        <div class="item">
                            <img src="/css/002.png" alt="...">

                            <div class="carousel-caption">
                                {{--<p>优惠多多、取款5分钟内到帐</p>--}}
                            </div>
                        </div>
                        <div class="item">
                            <img src="/css/003.png" alt="...">

                            <div class="carousel-caption">
                                {{--<p>中奖金额免税收</p>--}}
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="clearfix" style="padding-top: 10px">
                    <div class="bettingBox">
                        <div class="bet_title">
                            {{--<h3>老快三：</h3>--}}
                            <ul class="quickbuy_menu">
                                <li class="active"><a
                                            href="">江苏快三</a>
                                </li>
                            </ul>
                            <p class="popularize">
                                <a target="_top"
                                   href="#"></a>
                            </p>
                        </div>
                        <dl class="gpcBet_con">
                            <dd>
                                <div class="clearfix">
                                    <h3 class="czLogo icon_gdxuan5">
                                        <a href="" title="快三"></a>
                                    </h3>

                                    <div class="gpc_main">
                                        <p class="gpc_title">
                                            <a href="/lotteryIndex?lottery_type=jsold"><strong>江苏快三</strong>&nbsp;&nbsp;第<strong
                                                        class="gpc_period">&nbsp;20151018-061&nbsp;</strong>期</a>
                                            <span style="display: none;" class="retimeBlock"><span
                                                        class="retime"><em>00</em>分<em>00</em>秒</span>后截止</span>
                                        </p>

                                        <p class="gpc_con">
                                            <a href="">掷骰子，易入门，返奖率超过<span class="c_ba2636">83%</span>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="gpc_betBtn">
                                        <a href="/lotteryIndex?lottery_type=jsold"
                                           class="btnSubmint"></a>
                                    </div>
                                    <div class="czTitle clearfix">
                                        <div class="moreLinks">
                                            <a class="trendLink" target="_top"
                                               href="#"><i></i>走势图</a>
                                            <a class="gameintroLink" target="_top"
                                               href="#"><i></i>玩法说明</a>
                                        </div>
                                    </div>
                                </div>
                                <p style="text-align: center">
                                    <em class="smallRedball">3</em>
                                    <em class="smallRedball">3</em>
                                    <em class="smallRedball">4</em>

                                </p>
                            </dd>
                        </dl>
                    </div>
                    <div class="bettingBox">
                        <div class="bet_title">
                            {{--<h3>新快三：</h3>--}}
                            <ul class="quickbuy_menu">
                                <li class="active"><a
                                            href="/lotteryIndex?lottery_type=jsnew">广西快三</a>
                                </li>
                            </ul>
                            <p class="popularize">
                                <a target="_top"
                                   href="/lotteryIndex?lottery_type=jsnew"></a>
                            </p>
                        </div>
                        <dl class="gpcBet_con">
                            <dd>
                                <div class="clearfix">
                                    <h3 class="czLogo icon_gdxuan5">
                                        <a href="/LotteryIndex?lottery_type=jsnew"
                                           title="新快三"></a>
                                    </h3>

                                    <div class="gpc_main">
                                        <p class="gpc_title">
                                            <a href=""><strong>广西快三</strong>&nbsp;&nbsp;第<strong class="gpc_period">
                                                    20151018-033&nbsp;&nbsp;</strong>期</a>
                                            <span style="display: none;" class="retimeBlock"><span
                                                        class="retime"><em>00</em>分<em>00</em>秒</span>后截止</span>
                                        </p>

                                        <p class="gpc_con">
                                            <a href="">中大奖，赔率高，独特玩法<span class="c_ba2636">单双大小</span>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="gpc_betBtn">
                                        <a href="/lotteryIndex?lottery_type=jsnew"
                                           class="btnSubmint"></a>
                                    </div>
                                    <div class="czTitle clearfix">
                                        <div class="moreLinks">
                                            <a class="trendLink" target="_top"
                                               href="#"><i></i>走势图</a>
                                            <a class="gameintroLink" target="_top"
                                               href="#"><i></i>玩法说明</a>
                                        </div>
                                    </div>
                                </div>
                                <p style="text-align: center">
                                    <em class="smallRedball">3</em>
                                    <em class="smallRedball">4</em>
                                    <em class="smallRedball">5</em>
                                </p>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="distance nk3_kjgg">
                    <h2 style="margin-top: 0px"><a href="/award/">更多&gt;&gt;</a>快3近期开奖公告</h2>
                    <ul>
                        <li><strong>老快3</strong> 第<em>151023-082</em>期开奖号码<br>
                            开奖时间：2015-10-23 22:10:00
                            <br>
                            <a href="/lotteryIndex?lottery_type=jsold">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/2x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/2x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/4x24.png">                </li>
                        <li><strong>快3</strong> 第<em>151023-080</em>期开奖号码<br>
                            开奖时间：2015-10-23 22:00:00
                            <br>
                            <a href="/lotteryIndex?lottery_type=jilin">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/2x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/2x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/5x24.png">                </li>
                        <li><strong>欢乐快3</strong> 第<em>150722-017</em>期开奖号码<br>
                            开奖时间：2015-07-22 11:50:00
                            <br>
                            <a href="/lotteryIndex?lottery_type=hubei">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/2x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/3x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/4x24.png">                </li>
                        <li style="border-bottom:none; padding-bottom:0;"><strong>新快3</strong> 第<em>151023-073</em>期开奖号码<br>
                            开奖时间：2015-10-23 21:45:00
                            <br>
                            <a href="/lotteryIndex?lottery_type=nmg">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/2x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/3x24.png"><img style="display: inline;margin: 3px 5px;" src="http://res.kuai3.com/resources/kuai3/images/sz/6x24.png">                </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </div>
@stop