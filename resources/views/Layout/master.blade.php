<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="快三娱乐平台">
    <meta name="Description" content="快三娱乐平台。">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/online4.css') }}">
    @yield('css')
</head>
<body>
<div id="floatDivBoxs">
    <div class="floatDtt">在线客服</div>
    <div class="floatShadow">
        <ul class="floatDqq">
            <li><a target="_blank" href="tencent://message/?uin=67276099&Site=k3558.com&Menu=yes"><img
                            src="{{ asset('/css/qq.png')}}" align="absmiddle">在线客服1号</a></li>
            <li><a target="_blank" href="tencent://message/?uin=67276099&Site=k3558.com&Menu=yes"><img
                            src="{{ asset('/css/qq.png')}}" align="absmiddle">在线客服2号</a></li>
        </ul>
    </div>
</div>
<div class="top_main_back"></div>
<div id="rightArrow"><a href="javascript:;" title="在线客服"></a></div>
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
                <li class="active"><a href="/" class="btn-danger" style="background-color: red;font-weight: bold">首页</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle " style="color:red;font-weight: bold" data-toggle="dropdown"
                       role="button">玩法<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/lotteryIndex?lottery_type=jsold">江苏快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=beijin">北京快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=anhui">安徽快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=hebei">河北快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=jilin">吉林快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=jsnew">广西快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=hubei">湖北快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=nmg">内蒙古快三</a></li>
                    </ul>
                </li>
                <li><a href="/k3GameRule" style="color:red;font-weight: bold" title="游戏规则">游戏规则</a></li>
                <li><a href="/favourable" style="color:red;font-weight: bold" title="优惠活动">优惠活动</a></li>
                <li><a href="/lotterytrend?lottery_type=jsold" style="color:red;font-weight: bold" title="走势图">走势图</a>
                </li>
                <li><a title="合作代理" style="color:red;font-weight: bold" href="/inviteurl">合作代理</a></li>
                <li><a href="/userLotteryBetting" target="_blank" style="color:red;font-weight: bold"
                       title="交易记录">交易记录</a>
                </li>
                <li><a href="/lotteryIndex?lottery_type=jsold" title="手机下注" style="color:red;font-weight: bold">手机下注</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container header" style="margin-top: 50px">
    {{--<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes"><img border="0"--}}
    {{--src="http://wpa.qq.com/pa?p=2::53"--}}
    {{--alt="点击这里给我发消息" title="点击这里给我发消息"/></a>--}}

    <div class="logoWrap">
        <h1 class="logo"><a href="/" title="中国快三网" class="logoLink"><img src="/css/m_logo.png" alt="中国快三网"></a></h1>
    </div>
    <div class="collapse navbar-collapse navbar-responsive-collapse"
         style="position: absolute; top: 62px; left: 200px;">
        <ul class="nav navbar-nav nav">
            <li class="active"><a href="/" class="btn-danger" style="background-color: red;font-weight: bold">首页</a>
            </li>
            <li><a href="/k3GameRule" style="color:red;font-weight: bold" title="游戏规则">游戏规则</a></li>
            <li><a href="/favourable" style="color:red;font-weight: bold" title="优惠活动">优惠活动</a></li>
            <li><a href="/lotterytrend?lottery_type=jsold" style="color:red;font-weight: bold" title="走势图">走势图</a></li>
            <li><a title="合作代理" style="color:red;font-weight: bold" href="/inviteurl">合作代理</a></li>
            <li><a href="/userLotteryBetting" target="_blank" style="color:red;font-weight: bold" title="交易记录">交易记录</a>
            </li>
            <li><a href="#" title="手机下注" style="color:red;font-weight: bold">手机下注</a></li>
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
    <div class="contact_r" style="width: auto; margin: 10px 20px 0 0; right: 70px;"><img src="/css/kftel.png"
                                                                                         title="7×24小时服务热线：zgk3wz@126.com"
                                                                                         alt="7×24小时服务热线：zgk3wz@126.com">
    </div>
    <div class="home_hb" style="background-color: red">
        <ul>
            <li>
                <marquee scrollamount=3 style="color:white">{{Cache::get('marquee','请到后台设置滚动文字')}}</marquee>
            </li>
        </ul>

    </div>
</div>
<div class="container mobilShow" style="display: none">
    @if(!Auth::guest())
        <label class="form-control" style="text-align: center">余额：{{Auth::user()->lu_user_data->points}}</label>
        <a class="btn-danger btn-lg form-control" href="/logout" style="text-align: center">退出登陆</a>

        <input type="hidden" id="isLogin">
        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                玩法选择
                <span class="caret"></span>
            </button>
            @if(!empty(strstr($_SERVER['REQUEST_URI'],'lotterytrend')))
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="/lotterytrend?lottery_type=jsold">江苏快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=beijin">北京快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=anhui">安徽快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=jilin">吉林快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=jsnew">广西快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=hubei">湖北快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=hebei">河北快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=nmg">内蒙快三</a></li>
                </ul>
            @else
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="/lotteryIndex?lottery_type=jsold">江苏快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=beijin">北京快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=anhui">安徽快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=hebei">河北快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=jilin">吉林快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=jsnew">广西快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=hubei">湖北快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=nmg">内蒙古快三</a></li>
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
        <div class="container" style="text-align: center">
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav nav col-md-offset-2">
                    <li><a href="/lotterytrend?lottery_type=jsold">江苏快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=beijin">北京快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=anhui">安徽快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=jilin">吉林快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=jsnew">广西快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=hubei">湖北快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=hebei">河北快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=fjk3">福建快三</a></li>
                    <li><a href="/lotterytrend?lottery_type=nmg">内蒙快三</a></li>
                </ul>
            </div>
        </div>
    @else
        <div class="container" style="text-align: center">
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav nav col-md-offset-2">
                    <li><a href="/lotteryIndex?lottery_type=jsold">江苏快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=beijin">北京快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=anhui">安徽快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=jilin">吉林快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=jsnew">广西快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=hubei">湖北快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=hebei">河北快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=fjk3">福建快三</a></li>
                    <li><a href="/lotteryIndex?lottery_type=nmg">内蒙快三</a></li>
                </ul>
            </div>
        </div>
    @endif
@endif
<div class="container">
    @include('flash')
</div>
@yield('content')
<div class="footer mobilhide">
    <div class="f-link"><a title="关于我们" href="#">关于我们</a> | <a title="用户注册" href="/register">用户注册</a> |
        <a title="加盟合作" href="#">加盟合作</a> | <a href="#" title="进入网盟">进入网盟</a> | <a title="网站地图">网站地图</a> | <a
                title="友情链接" href="" id="link431">友情链接</a></div>
</div>
<script type="text/javascript" src="/js/all.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        if ($("#isLogin").val() != undefined) {
            checkwin();
        }
    });

    $(function () {
        var flag = 0;
        $('#rightArrow').on("mouseover", function () {
            if (flag == 1) {
                $("#floatDivBoxs").animate({right: '-175px'}, 300);
                $(this).animate({right: '-5px'}, 300);
                flag = 0;
            } else {
                $("#floatDivBoxs").animate({right: '0'}, 300);
                $(this).animate({right: '170px'}, 300);
                flag = 1;
            }
        });
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
//                console.log(json);
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
<script language="javascript" src="http://dft.zoosnet.net/JS/LsJS.aspx?siteid=DFT23548681&float=1&lng=cn"></script>
@yield('script')
</body>
</html>