<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="高频彩票吧">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/gaopin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ssc.css') }}">
    <link rel="icon" href="gaopinfavicon.ico" type="image/x-icon"/>
    <style type="text/css">
    </style>
    @yield('css')
</head>
<body>
<div class="header-plus mobilhide">
    <div class="header-toptray-plus">
        <div class="toptray-plus clearfix auto990">
            <div class="toptray-left fl">
                <span>hi，
                    @if(!Auth::guest())
                        {{Auth::user()->name}}
                    @endif
                    欢迎来到高频彩票吧</span>
            </div>
            <div class="toptray-right fr">
                <ul id="toptray_login" class="hidden toptray clearfix">
                    <li><span id="toptray_username"></span><a href="#" class="exit-btn ml14 color666 js-trigger-logout">退出</a>
                    </li>
                    <li class="m14">|</li>
                    <li class="header-show-money">
                        <div id="wallet_container">
                            <span class="span-login-rmb colorRed" style="font-family: Verdana,Arial;">￥</span>
                            <span id="header_user_money" class="colorRed">*****</span><input type="hidden"
                                                                                             id="header_user_money_hidden"
                                                                                             value="">

                            <div id="wallet_detail" style="display:none;"></div>
                        </div>
                        <a href="#" id="header_show_money" class="color666">显示余额</a>
                        <i id="header_money_refresh" class="img-login-refresh icon"></i>
                    </li>
                    <li class="mylottery" id="mylottery">
                        <a href="#" target="_blank" class="my-lottery color666"><i class="nosign-hd"
                                                                                   id="header_sign"></i>我的彩票<em
                                    class="icon"></em></a>

                        <div id="mylottery_dropdown" style="display: none;" class="lot_list">
                            <ul>
                                <li><a href="#" target="_blank">投注记录</a></li>
                                <li><a href="#" target="_blank">中奖记录</a></li>
                                <li><a href="#" target="_blank">我的战绩</a></li>
                                <li><a href="#" target="_blank">我的彩贝</a></li>
                                <li><a href="#" target="_blank">账户信息</a></li>
                                <li><a href="#" target="_blank">未支付订单</a><span id="header_notpaid_counter_hd"
                                                                               class="notpaid"></span></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#" target="_blank" class="mr10 color666 mr">充值</a><a href="#" target="_blank"
                                                                                      class="color666">提款</a></li>
                    <li class="toptray-r-hd ml14">
                        <div id="unread_count_num">
                            <a class="message-nums-hd color666" href="#" target="_blank">消息<em id="unread_num_new"
                                                                                               class="icon"></em></a>
                        </div>
                    </li>
                </ul>
                <ul id="toptray_not_login" class="toptray-plus clearfix">
                    <li>
                        @if(Auth::guest())
                            <a href="/login" class="colorRed">登录</a> &nbsp;
                            <a href="/register" class="colorRed">注册</a>
                        @endif
                    </li>
                    <li class="m14">|</li>
                    <li class="mylottery"><a href="/userLotteryBetting" target="_blank" class="my-lottery color666">我的彩票<em
                                    class="icon"></em></a></li>
                    <li>
                        <a href="/recharge" target="_blank" class="color666 mr10">充值</a>
                        <a href="/deposit" target="_blank" class="color666">提款</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="head-toptray-logo clearfix auto990">
        <div class="logo-box clearfix" style="width:420px;padding: 15px 0">
            <a title="高频彩票吧" href="#">
                <img title="高频彩票吧" alt="高频彩票吧" src="/css/gaopinlogo.png" class="logo-index-hd"
                     style="width:122px;height:30px;margin:0 8px 0 0">
            </a>
            <a><img alt="为梦想买单" src="/css/logo_dream.png"></a>
        </div>
        <ul class="customerService-plus">
            <li><i class="icon"></i><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=583893899&amp;site=qq&amp;menu=yes"
                                       target="_blank" title="">QQ:583893899</a> &nbsp;</li>
            <li class="online_service">
                <a href="#" target="_blank" class="colorRed kf-top">在线客服</a>
                <a href="#" target="_blank" class="colorRed kf-top">玩法</a>
                <a href="#" target="_blank" class="colorRed kf-top">帮助</a>
                <a href="#" target="_blank" class="colorRed">公益</a>
            </li>
        </ul>
    </div>
    <div class="header-navbar-plus">
        <div class="auto990 clearfix " id="header_box">
            {{--<div class="lottery-plus mr20" id="lotterys">--}}
            {{--<h2>全部彩种</h2>--}}
            {{--</div>--}}
            <ul class="nav-plus clearfix">
                <li class="navw1 on"><a href="/">首页</a></li>
                <li class="navw2 "><a href="/lotteryIndex?lottery_type=jsold">购彩大厅</a></li>
                <li class="navw2 "><a href="/favourable" class="dropdown-desc">优惠活动</a></li>
                <li class="navw2 "><a href="/lotterytrend?lottery_type=jsold">走势图表</a></li>
                <li class="navw2 "><a href="/inviteurl">合作代理</a></li>
                <li class="navw2 "><a href="/userLotteryBetting" target="_blank">交易记录</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="mobilShow" style="display: none">
    <div class="logo-box clearfix" style="width:auto;padding: 15px 0">
        <a href="#">
            <img title="高频彩票吧" alt="高频彩票吧" src="/css/gaopinlogo.png" class="logo-index-hd"
                 style="width:122px;height:30px;margin:0 8px 0 0">
        </a>
        <a><img alt="为梦想买单" src="/css/logo_dream.png"></a>
    </div>
</div>
<div class="container mobilShow" style="display: none">
    @if(!Auth::guest())
        <label class="form-control" style="text-align: center">余额：{{Auth::user()->lu_user_data->points}}</label>
        <a class="btn-danger btn-lg form-control" href="/logout" style="text-align: center;background-color: #f9d450">退出登陆</a>
        <input type="hidden" id="isLogin">
    @endif
</div>
{{--隐藏登陆框--}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #242001">
        <div class="modal-content" style="background-color: #242001">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal" style="color: #242001"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: #f9d450;font-family: bold">
                    尊敬的用户,您当前还未登陆，请先登陆再操作
                </h4>
            </div>
            {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('name', '用户名', ['class' => 'col-md-4 control-label','style'=>'color:white']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password', '密码', ['class' => 'col-md-4 control-label','style'=>'color:white']) !!}
                <div class="col-md-6">
                    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label style="color: white">
                            <input type="checkbox" name="remember">记住我
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit('登陆', ['class' => 'btn btn-default
                    btn-primary','style'=>'background-color:#f9d450']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade" id="winDialog" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: red;font-family: bold">
                    中奖信息
                </h4>
            </div>
            <div class="modal-body" style="background-color: red">
                <a style="color: white;" id="winText"></a>
            </div>
        </div>
    </div>
</div>
@if($_SERVER['REQUEST_URI']=='/index' || $_SERVER['REQUEST_URI']=='/')
@else
    @if(!empty(strstr($_SERVER['REQUEST_URI'],'lotterytrend')))
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                    <ul class="nav navbar-nav">
                        <li><a href="/lotterytrend?lottery_type=jsold">江苏快三</a></li>
                        <li><a href="/lotterytrend?lottery_type=beijin">北京快三</a></li>
                        <li><a href="/lotterytrend?lottery_type=anhui">安徽快三</a></li>
                        <li><a href="/lotterytrend?lottery_type=jilin">吉林快三</a></li>
                        <li><a href="/lotterytrend?lottery_type=jsnew">广西快三</a></li>
                        <li><a href="/lotterytrend?lottery_type=hubei">湖北快三</a></li>
                        <li><a href="/lotterytrend?lottery_type=hebei">河北快三</a></li>
                        <li><a href="/lotterytrend?lottery_type=nmg">内蒙快三</a></li>
                    </ul>
                </div>
                <div class="col-md-4" style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                    <ul class="nav navbar-nav">
                        <li><a href="/fivelotterytrend?lottery_type=sdfive">山东11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=gdfive">广东11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=shfive">上海11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=zjfive">浙江11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=jxfive">江西11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=liaoningfive">辽宁11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=hljfive">黑龙江11选5</a></li>
                    </ul>
                </div>
                <div class="col-md-2" style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                    <ul class="nav navbar-nav">
                        <li><a href="/ssclotterytrend?lottery_type=cqssc">重庆时时彩</a></li>
                        <li><a href="/ssclotterytrend?lottery_type=jxssc">江西时时彩</a></li>
                        <li><a href="/ssclotterytrend?lottery_type=tjssc">天津时时彩</a></li>
                        <li><a href="/ssclotterytrend?lottery_type=xjssc">新疆时时彩</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                    <ul class="nav navbar-nav">
                        <li><a href="/lotteryIndex?lottery_type=jsold">江苏快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=beijin">北京快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=anhui">安徽快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=jilin">吉林快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=jsnew">广西快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=hubei">湖北快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=hebei">河北快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=nmg">内蒙快三</a></li>
                    </ul>
                </div>
                <div class="col-md-4" style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                    <ul class="nav navbar-nav">
                        <li><a href="/fivelotteryIndex?lottery_type=sdfive">山东11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=gdfive">广东11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=shfive">上海11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=zjfive">浙江11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=jxfive">江西11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=liaoningfive">辽宁11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=hljfive">黑龙江11选5</a></li>
                    </ul>
                </div>
                <div class="col-md-2" style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                    <ul class="nav navbar-nav">
                        <li><a href="/ssclotteryIndex?lottery_type=cqssc">重庆时时彩</a></li>
                        <li><a href="/ssclotteryIndex?lottery_type=jxssc">江西时时彩</a></li>
                        <li><a href="/ssclotteryIndex?lottery_type=tjssc">天津时时彩</a></li>
                        <li><a href="/ssclotteryIndex?lottery_type=xjssc">新疆时时彩</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endif
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            @include('flash')
        </div>
    </div>
</div>
@yield('content')
<div class="container">
    <div class="row">
        <div class="footer mobilhide">
            <div class="f-link"><a title="关于我们" href="#">关于我们</a> | <a title="用户注册" target="_blank" href="/register">用户注册</a>
                |
                <a title="加盟合作" href="#">加盟合作</a> | <a href="#" title="进入网盟">进入网盟</a> | <a title="网站地图">网站地图</a> | <a
                        title="友情链接" href="">友情链接</a></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/all.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        if ($("#isLogin").val() != undefined) {
            checkwin();
        }
    });


    (function (a) {
        if (/Mobile|Android|iPhone|iPod|Nokia|WP7|Symbian|MIDP|UCWEB|Minimo|Opera M(ob|in)i/.test(a) && !/iPad/.test(a) && !/(^|\s)mobi_redi=1(;|$)/.test(document.cookie)) {
            a = null;
            $(".mobilhide").hide();
            $(".mobilShow").show();

            $(".btn").addClass("btn-lg");
            <?php
            $islogin = strstr($_SERVER['REQUEST_URI'],'login');
            $isregister = strstr($_SERVER['REQUEST_URI'],'register');
             ?>
            @if(Auth::guest() && empty($islogin) && empty($isregister))
            location.replace('/login');
            @endif










        }
    })(navigator.userAgent);

    function checkwin() {
        $.ajax({
            type: "Get",
            url: '/getPersonalwin',
            dataType: "json",
            success: function (json) {
                if (json.length > 0) {
                    @if(!Auth::guest())
                    var content = "恭喜,亲爱的{{Auth::user()->name}}，您的";
                    for (var i = 0; i < json.length; i++) {
                        if (i == json.length - 1) {
                            content += json[i].provinceName + "第" + json[i].proName + "买" + json[i].codes + "中奖了!";
                        } else {
                            content += json[i].provinceName + "第" + json[i].proName + "买" + json[i].codes + " 、 ";
                        }
                    }
                    $("#winText").html(content);
                    $('#winDialog').modal('show');
                    @endif





                }
            }

        });
        setTimeout('checkwin()', 30000);
    }
</script>
<script language="javascript" src="http://dft.zoosnet.net/JS/LsJS.aspx?siteid=DFT68330066&float=1&lng=cn"></script>
@yield('script')
</body>
</html>