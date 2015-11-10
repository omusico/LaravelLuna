<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="彩票合买,快三">
    <meta name="Description" content="中国快三网彩票购买平台提供快三的彩票，是一家服务于中国彩民的互联网彩票合买代购交易平台，是当前中国彩票互联网交易行业的领导者。">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/easyui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    @yield('css')
</head>
<body>
{{--<embed autoplay="false" src="/css/1.wav" width="0" height="0" id="Player"/>--}}
{{--<embed autoplay="false" src="/css/2.mp3" width="0" height="0" id="Player2"/>--}}
{{--{{date('Y-m-d H:i:s',strtotime('-1 minute'))}}--}}
<audio src="/css/2.mp3" id="audio1" controls="controls" style="display: none"></audio>
{{--<audio src="/css/1.wav" id="audio2" controls="controls" style="display: none"></audio>--}}
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            　<!-- .navbar-toggle样式用于toggle收缩的内容，即nav-collapse collapse样式所在元素 -->
            <button class="navbar-toggle" type="button" data-toggle="collapse"
                    data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
            @if(Auth::guest())
                <a class="navbar-brand" href="/">中国快三网</a>
            @else
                @if (Auth::user()->is_admin)
                    <a class="navbar-brand" href="/admin">后台管理</a>
                @else
                    <a class="navbar-brand" href="/">中国快三网</a>
                @endif
            @endif
        </div>
        <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav nav">
                @if(!Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            {{--<li><a href="{{ url('/logout') }}">个人中心</a></li>--}}
                            <li><a href="{{ url('/logout') }}">退出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@if($_SERVER['REQUEST_URI']=='/index' || $_SERVER['REQUEST_URI']=='/')

@else

@endif
<div class="container" style="padding: 0px;margin: 0px">
    <marquee scrollamount=3 style="color:red" id="backmar"></marquee>
</div>
<div class="container">
    @include('flash')
</div>
@yield('content')
<div class="footer">
    <div class="f-link"><a title="关于我们" href="#">关于我们</a> | <a title="用户注册" target="_blank" href="/register">用户注册</a> |
        <a title="加盟合作" href="#">加盟合作</a> | <a href="#" title="进入网盟">进入网盟</a> | <a title="网站地图">网站地图</a> | <a
                title="友情链接" href="" id="link431">友情链接</a></div>
</div>
<script type="text/javascript" src="/js/all.js"></script>
<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
<script type="text/javascript">

    audio = document.getElementById('audio1');
    var applyUser = "";
    var rechargeUser = "";
    var rechargecompanyUser = "";
    $(document).ready(function () {
        checkapply();
        checkrecharge();
        checkcompanyrecharge();

    });

    function checkapply() {
        $.ajax({
            type: "get",
            url: '/checkapply',
            dataType: "json",
            cache: false,
            success: function (json) {
                if (json.length > 0) {
                    applyUser = "";
                    for (var i = 0; i < json.length; i++) {
                        applyUser += json[i].userName;
                    }
//                    alert("会员" + applyUser + "申请提现，请马上处理");
                    applyUser= "会员" + applyUser + "申请提现，请马上处理/";
                    $("#backmar").html(applyUser+rechargecompanyUser+rechargeUser);
                    audio.play();
                }
            }
        });

        setTimeout('checkapply()', 12000);
    }

    function checkrecharge() {
        $.ajax({
            type: "get",
            url: '/checkrecharge',
            dataType: "json",
            cache: false,
            success: function (json) {
                if (json.length > 0) {
                    console.log(json);
                    rechargeUser = "";
                    for (var i = 0; i < json.length; i++) {
                        rechargeUser += json[i].userName;
                    }
//                    alert("会员" + rechargeUser + "申请公司充值审批，请马上处理");
                    rechargeUser = "会员" + rechargeUser + "通过第三方付款已经到账，请知悉/";
                    $("#backmar").html(rechargeUser + rechargecompanyUser + applyUser);
                    audio.play();
                }
            }
        });
        setTimeout('checkrecharge()', 12000);
    }

    function checkcompanyrecharge() {
        $.ajax({
            type: "get",
            url: '/checkcompanyrecharge',
            dataType: "json",
            cache: false,
            success: function (json) {
                if (json.length > 0) {
                    console.log(json);
                    rechargecompanyUser = "";
                    for (var i = 0; i < json.length; i++) {
                        rechargecompanyUser += json[i].userName;
                    }
//                    alert("会员" + rechargeUser + "申请公司充值审批，请马上处理");
                    rechargecompanyUser= "会员" + rechargecompanyUser + "申请公司充值审批，请马上处理/";
                    $("#backmar").html(rechargecompanyUser+rechargeUser+applyUser);
                    audio.play();
                }
            }
        });
        setTimeout('checkcompanyrecharge()', 12000);
    }
</script>
@yield('script')
</body>
</html>