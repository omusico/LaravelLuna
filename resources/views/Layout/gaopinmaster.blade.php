<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="高频彩">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/gaopin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="icon" href="gaopinfavicon.ico" type="image/x-icon"/>
    <style type="text/css">
        .navbar-responsive-collapse > .navbar-nav > li {
            padding-left: 18px;
            padding-right: 18px;
        }

        .nav > li > a:focus, .nav > li > a:hover {
            text-decoration: none;
            background-color: #E49617;
        }

        .footer {
            border-top: 0px solid #fdc124;
        }
    </style>
    @yield('css')
</head>
<body style="background-color: #f2fcfd">
<div style="width: 100%;height: 30px;background-color: white">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10" style="padding-top: 5px">
                <div style="float: left">
                    hi，
                    @if(!Auth::guest())
                        <span style="color: red">  {{Auth::user()->name}}</span>
                    @else
                        亲爱的游客
                    @endif
                    欢迎来到高频彩
                </div>
                <div style="float: right">
                    @if(!Auth::guest())
                        <a style="color: red" href="logout">退出</a>&nbsp;&nbsp;<a style="color: #666">余额:&nbsp;</a> <a
                                style="color: red">{{ Auth::user()->lu_user_data->points}}元</a>&nbsp;&nbsp;<a
                                href="recharge"
                                style="color: #666">充值</a>&nbsp;&nbsp;<a href="deposit" style="color: #666">提款</a>&nbsp;
                        &nbsp;<a href="userLotteryBetting" style="color: #666">我的账户</a>
                    @else
                        <a href="login" style="color: red">登陆</a>&nbsp;<a href="register" style="color: red">注册</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gaopinlogo mobilhide"></div>
<div class="mobilShow" style="display: none">
    <div class="logo-box clearfix" style="width:auto;padding: 15px 0">
        <a href="#">
            <img title="高频彩" alt="高频彩" src="/css/gaopinlogo.png" class="logo-index-hd"
                 style="width:122px;height:30px;margin:0 8px 0 0">
        </a>
        <a><img alt="为梦想买单" src="/css/logo_dream.png"></a>
    </div>
</div>
<div style="width: 100%;background-color:#FCAB1D ">
    <div class="container" style="background-color: #FCAB1D;">
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav nav">
                <li><a href="/" style="color:white;font-weight: bold">网站首页</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color:white;font-weight: bold" data-toggle="dropdown"
                       role="button">游戏规则<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/k3GameRule">快三</a></li>
                        <li><a href="/fiveGameRule">11选5</a></li>
                        <li><a href="#">时时彩</a></li>
                        <li><a href="#">六合彩</a></li>
                    </ul>
                </li>
                <li><a href="/favourable" style="color:white;font-weight: bold" title="优惠活动">优惠活动</a></li>
                <li><a href="/fivelotterytrend?lottery_type=sdfive" style="color:white;font-weight: bold"
                       title="走势图">走势图</a>
                </li>
                <li><a title="合作代理" target="_blank" style="color:white;font-weight: bold" href="/inviteurl">合作代理</a>
                </li>
                <li><a href="/userLotteryBetting" target="_blank" style="color:white;font-weight: bold"
                       title="交易记录">交易记录</a>
                </li>
                <li><a href="/fivelotteryIndex?lottery_type=sdfive" title="手机下注" style="color:white;font-weight: bold">手机下注</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color:white;font-weight: bold" data-toggle="dropdown"
                       role="button">网址<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">网址一</a></li>
                        <li><a href="#">网址二</a></li>
                        <li><a href="#">网址三</a></li>
                        <li><a href="#">网址四</a></li>
                        <li><a href="#">网址五</a></li>
                    </ul>
                </li>
            </ul>
        </div>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: red;font-family: bold">
                    尊敬的用户,您当前还未登陆，请先登陆再操作
                </h4>
            </div>
            {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('name', '用户名', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password', '密码', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember">记住我
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit('登陆', ['class' => 'btn btn-lg btn-primary']) !!}
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
        <div class="container mobilhide">
            <div class="row"
                 style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                <ul class="nav navbar-nav">
                    <li><a href="/lotterytrend?lottery_type=jsold">江苏快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=beijin">北京快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=anhui">安徽快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=jilin">吉林快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=jsnew">广西快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=hubei">湖北快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=hebei">河北快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=nmg">内蒙快三</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=sdfive">山东11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=gdfive">广东11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=shfive">上海11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=zjfive">浙江11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=jxfive">江西11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=liaoningfive">辽宁11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=hljfive">黑龙江11选5</a></li>
                    <li><a href="/ssclotterytrend?lottery_type=cqssc">重庆时时彩</a></li>
                    <li><a href="/ssclotterytrend?lottery_type=jxssc">江西时时彩</a></li>
                    <li><a href="/ssclotterytrend?lottery_type=tjssc">天津时时彩</a></li>
                    <li><a href="/ssclotterytrend?lottery_type=xjssc">新疆时时彩</a></li>
                    <li><a href="/6helotterytrend">香港六合彩</a></li>
                </ul>
            </div>
        </div>
    @else
        <div class="container mobilhide">
            <div class="row"
                 style="padding: 0px;margin: 0px;border: solid #d3d3d3 1px;background-color: #fafafa">
                <ul class="nav navbar-nav">
                    <li><a href="/lotteryIndex?lottery_type=jsold">江苏快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=beijin">北京快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=anhui">安徽快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=jilin">吉林快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=jsnew">广西快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=hubei">湖北快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=hebei">河北快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=nmg">内蒙快三</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=sdfive">山东11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=gdfive">广东11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=shfive">上海11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=zjfive">浙江11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=jxfive">江西11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=liaoningfive">辽宁11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=hljfive">黑龙江11选5</a></li>
                    <li><a href="/ssclotteryIndex?lottery_type=cqssc">重庆时时彩</a></li>
                    <li><a href="/ssclotteryIndex?lottery_type=jxssc">江西时时彩</a></li>
                    <li><a href="/ssclotteryIndex?lottery_type=tjssc">天津时时彩</a></li>
                    <li><a href="/ssclotteryIndex?lottery_type=xjssc">新疆时时彩</a></li>
                    <li><a href="/6helotteryIndex">香港六合彩</a></li>
                </ul>
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
@yield('script')
</body>
</html>