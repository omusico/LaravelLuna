@extends('Layout.master')
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
            </div>
            <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;margin-right: 0px">
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
                    <a class="left carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button"
                       data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="margin-left: 0px;padding-left: 0px">
                <div class="notice m_b10" id="notice" style="border-bottom: none">
                    <ul class="tabs-nav notice_nav">
                        <li class="cur"><a href="#">最新优惠</a></li>
                    </ul>
                    <div class="tabs-cnt notice_cont">
                        <ul class="list_icon" style="padding-left: 0px">
                            @if(null!==Cache::get('news'))
                                @foreach(Cache::get('news') as $key=>$value)
                                    <li><a style="width: 205px;" href="{{isset($value['url'])?$value['url']:'#'}}" target="_blank">{{isset($value['title'])?$value['title']:''}}</a><span
                                                class="time"></span></li>
                                @endforeach
                            @endif
                            {{--<li><a style="width: 205px;" href="http://tieba.baidu.com/p/3493429781" target="_blank">快3技巧--}}
                                    {{--近期数据更有价值</a><span class="time"></span></li>--}}
                            {{--<li><a style="width: 205px;" href="http://tieba.baidu.com/p/3454498923" target="_blank">快3技巧：五种杀号技巧手到擒来</a><span--}}
                                        {{--class="time"></span></li>--}}
                            {{--<li><a style="width: 205px;" href="http://tieba.baidu.com/p/3389052828" target="_blank">快3玩法中奖妙招：模式选号法</a><span--}}
                                        {{--class="time"></span></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-right: 0px;">
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
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b
                                            style="color:#00a1ff;">中奖贼简单</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=beijin" title="北京快三"
                                   id="link117">北京快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b
                                            style="color:#47ff36">摇骰子,易中奖</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=fjk3" title="福建快三" id="link118">福建快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b
                                            style="color:#ff44dc">买三个号就中</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=anhui" title="安徽快三"
                                   id="link119">安徽快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span></a> <br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=hebei" title="河北快三"
                                   id="link119">河北快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span></a> <br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=jilin" title="吉林快三"
                                   id="link120">吉林快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b>一天77期(中奖容易)</b></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=jsnew" title="广西快三"
                                   id="link121">广西快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span></a><b>一天78期</b><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=hubei" title="湖北快三"
                                   id="link122">湖北快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span></a><br>
                                <a target="_blank" href="/lotteryIndex?lottery_type=nmg" title="内蒙古快三" id="link123">内蒙快三<span
                                            style="color: red">&nbsp;&nbsp;进入 &gt;&gt;</span><b
                                            style="color:#ff6c00">100%中奖</b></a>
                            </p>
                        </li>
                        <li><a href="/k3GameRule" style="padding-left: 30px;list-style: none">如何投注？&nbsp;</a><a
                                    href="/k3GameRule">如何领奖？</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;border-right: none">
                <div class="distance nk3_kjgg" style="border-right: none;">
                    <h2 style="margin-top: 0px">
                        快3近期开奖公告
                    </h2>

                    <ul class="col-md-3">
                        <li><strong>安徽快3</strong> 第<em>{{$recentArray['ANHUI']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['ANHUI']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=anhui">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['ANHUI']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['ANHUI']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['ANHUI']->codes)[2]}}x24.png">
                        </li>
                        <li><strong>江苏快3</strong> 第<em>{{$recentArray['JSOLD']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['JSOLD']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=jsold">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSOLD']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSOLD']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSOLD']->codes)[2]}}x24.png">
                        </li>
                        <li style="border-bottom:none; padding-bottom:0;"><strong>福建快3</strong>
                            第<em>{{$recentArray['FJK3']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['FJK3']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=fjk3">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['FJK3']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['FJK3']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['FJK3']->codes)[2]}}x24.png">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
                <div class="distance nk3_kjgg" style="border-right: none;border-left: none">
                    <h2 style="margin-top: 0px">
                    </h2>

                    <ul class="col-md-3">
                        <li><strong>湖北快3</strong> 第<em>{{$recentArray['HUBEI']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['HUBEI']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=hubei">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['HUBEI']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['HUBEI']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['HUBEI']->codes)[2]}}x24.png">
                        </li>
                        <li><strong>吉林快3</strong> 第<em>{{$recentArray['JILIN']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['JILIN']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=jilin">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JILIN']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JILIN']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JILIN']->codes)[2]}}x24.png">
                        </li>
                        <li style="border-bottom:none; padding-bottom:0;"><strong>广西快3</strong>
                            第<em>{{$recentArray['JSNEW']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['JSNEW']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=jsnew">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSNEW']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSNEW']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSNEW']->codes)[2]}}x24.png">
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-3" style="padding-left: 0px;">
                <div class="distance nk3_kjgg" style="border-left: none">
                    <h2 style="margin-top: 0px">
                        <a href="/lotteryIndex?lottery_type=beijin">更多&gt;&gt;</a>
                    </h2>

                    <ul class="col-md-3">
                        <li><strong>北京快3</strong> 第<em>{{$recentArray['BEIJIN']->proName}}</em>期开奖号码<br><br>
                            开奖时间：{{$recentArray['BEIJIN']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=beijin">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['BEIJIN']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['BEIJIN']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['BEIJIN']->codes)[2]}}x24.png">
                        </li>
                        <li><strong>内蒙古快3</strong> 第<em>{{$recentArray['NMG']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['NMG']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=nmg">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['NMG']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['NMG']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['NMG']->codes)[2]}}x24.png">
                        </li>
                        <li style="border-bottom:none; padding-bottom:0;"><strong>河北快3</strong>
                            第<em>{{$recentArray['HEBEI']->proName}}</em>期开奖号码<br>
                            开奖时间：{{$recentArray['HEBEI']->created_at}}
                            <br>
                            <a href="/lotteryIndex?lottery_type=hebei">立即购买</a>
                            <img style="display: inline;margin: 3px 5px;"
                                 src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['HEBEI']->codes)[0]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['HEBEI']->codes)[1]}}x24.png"><img
                                    style="display: inline;margin: 3px 5px;"
                                    src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['HEBEI']->codes)[2]}}x24.png">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
@stop