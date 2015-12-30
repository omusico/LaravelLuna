<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="11选5娱乐平台">
    <meta name="Description" content="11选5娱乐平台。">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/five.css') }}">
    <link rel="icon" href="fivefavicon.ico" type="image/x-icon"/>
    <style type="text/css">
        .fivemologo {
            height: 100px;
            width: 100%;
            background: url({{asset('/css/fivemlogo.jpg')}}) no-repeat;
        }

        .hm-conmobile {
            float: left;
            width: auto;
            overflow: hidden;
            clear: none;
            padding: 0px;
        }

        .kj-w110mobile {
            width: auto;
        }

        .navbar-nav > li {
            padding-left: 18px;
            padding-right: 18px;
        }

        .nav > li > a:focus, .nav > li > a:hover {
            text-decoration: none;
            background-color: #808080;
        }

        .footer {
            border-top: 0px solid #3C7EC8;
        }
    </style>
    @yield('css')
</head>
<body style="background-color: #fefced">
<div class="mobilhide" style="width: 100%;height: 30px;background-color: white">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10" style="padding-top: 5px">
                <div style="float: left">
                    hi，
                    @if(!Auth::guest())
                        <span style="color: red">  {{Auth::user()->name}}</span>
                        欢迎回到11选5娱乐平台
                    @else
                        亲爱的游客
                        欢迎来到11选5娱乐平台
                    @endif
                </div>
                <div style="float: right">
                    @if(!Auth::guest())
                        <a style="color: red" href="logout">退出</a>&nbsp;&nbsp;<a style="color: #666">余额:&nbsp;</a> <a
                                style="color: red">{{ Auth::user()->lu_user_data->points}}元</a>&nbsp;&nbsp;<a
                                href="userLotteryBetting" style="color: #666">我的彩票</a>&nbsp;&nbsp;<a href="recharge"
                                                                                                     style="color: #666">充值</a>
                        &nbsp;&nbsp;<a href="deposit" style="color: #666">提款</a>
                    @else
                        <a href="login" style="color: red">登陆</a>&nbsp;<a href="register" style="color: red">注册</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fivelogo mobilhide"></div>
<div style="height: 100px;text-align: center;display: none" class="contain-fluid mobilShow">
    <div class="col-md-12 fivemologo">
    </div>
</div>
<nav class="navbar navbar-default mobilShow" role="navigation" style="display: none;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-target">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">导航栏</a>
        </div>

        <div class="collapse navbar-collapse" id="nav-target">
            <ul class="nav navbar-nav nav">
                <li><a href="/" style="color:red;font-weight: bold">网站首页</a></li>
                <li><a href="/fiveGameRule" style="color:red;font-weight: bold" title="游戏规则">游戏规则</a></li>
                <li><a href="/favourable" style="color:red;font-weight: bold" title="优惠活动">优惠活动</a></li>
                <li><a href="/fivelotterytrend?lottery_type=sdfive" style="color:red;font-weight: bold"
                       title="走势图">走势图</a>
                </li>
                <li><a title="合作代理" target="_blank" style="color:red;font-weight: bold" href="/inviteurl">合作代理</a></li>
                <li><a href="/userLotteryBetting" target="_blank" style="color:red;font-weight: bold"
                       title="交易记录">交易记录</a>
                </li>
                <li><a href="/fivelotteryIndex?lottery_type=sdfive" title="手机下注" style="color:red;font-weight: bold">手机下注</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color:red;font-weight: bold" data-toggle="dropdown"
                       role="button">网址<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">网址一</a></li>
                        <li><a href="#">网址二</a></li>
                        <li><a href="#">网址三</a></li>
                        <li><a href="#">网址四</a></li>
                        <li><a href="#">网址五</a></li>
                    </ul>
            </ul>
        </div>
    </div>
</nav>
<div style="width: 100%;background-color:#FCAB1D ">
    <div class="container" style="background-color: #FCAB1D;">
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav nav">
                <li><a href="/" style="color:white;font-weight: bold">网站首页</a></li>
                <li><a href="/fiveGameRule" style="color:white;font-weight: bold" title="游戏规则">游戏规则</a></li>
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
            </ul>
        </div>
    </div>
</div>
<div class="container mobilShow" style="display: none">
    @if(!Auth::guest())
        <label class="form-control" style="text-align: center">余额：{{Auth::user()->lu_user_data->points}}</label>
        <a class="btn-danger btn-lg form-control" href="/logout" style="text-align: center;background-color: #f9d450">退出登陆</a>
        <input type="hidden" id="isLogin">
        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                玩法选择
                <span class="caret"></span>
            </button>
            @if(!empty(strstr($_SERVER['REQUEST_URI'],'fivelotterytrend')))
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="/fivelotterytrend?lottery_type=sdfive">山东11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=gdfive">广东11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=shfive">上海11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=zjfive">浙江11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=jxfive">江西11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=liaoningfive">辽宁11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=hljfive">黑龙江11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=cqfive">重庆11选5</a></li>
                </ul>

            @else
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="/fivelotteryIndex?lottery_type=sdfive">山东11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=gdfive">广东11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=shfive">上海11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=zjfive">浙江11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=jxfive">江西11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=liaoningfive">辽宁11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=hljfive">黑龙江11选5</a></li>
                </ul>
            @endif
        </div>
    @endif
</div>
{{--隐藏登陆框--}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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

    @if(!empty(strstr($_SERVER['REQUEST_URI'],'fivelotterytrend')))
        <div class="container" style="text-align: center">
            {{--<div class="row">--}}
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav nav ">
                    <li><a href="/fivelotterytrend?lottery_type=sdfive">山东11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=gdfive">广东11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=shfive">上海11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=zjfive">浙江11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=jxfive">江西11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=liaoningfive">辽宁11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=hljfive">黑龙江11选5</a></li>
                    <li><a href="/fivelotterytrend?lottery_type=cqfive">重庆11选5</a></li>
                </ul>
            </div>
            {{--</div>--}}
        </div>
    @else
        <div class="container" style="text-align: center">
            {{--<div class="row">--}}
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/fivelotteryIndex?lottery_type=sdfive">山东11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=gdfive">广东11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=shfive">上海11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=zjfive">浙江11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=jxfive">江西11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=liaoningfive">辽宁11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=hljfive">黑龙江11选5</a></li>
                    <li><a href="/fivelotteryIndex?lottery_type=cqfive">重庆11选5</a></li>
                </ul>
            </div>
            {{--</div>--}}
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
            $(".kj_tab .hm-con").addClass("hm-conmobile");
            $(".kj_tab .hm-con").css("width", "auto").css("float", "left");
            $(".kj_tab .hm-con div").css("margin", "0px");
            $(".kj_tab").css("width", "auto");
            $(".w700").css("width", "500px");
            $(".kj-w110").addClass("kj-w110mobile");

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