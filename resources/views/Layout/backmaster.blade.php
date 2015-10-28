<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="彩票合买,快三">
    <meta name="Description" content="中国快三网彩票购买平台提供快三的彩票，是一家服务于中国彩民的互联网彩票合买代购交易平台，是当前中国彩票互联网交易行业的领导者。">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    @yield('css')
</head>
<body>
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
                <li class="active"><a href="/" class="btn-primary">网站首页</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button">投注管理<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">快3手动开奖</a></li>
                        <li><a href="#">撤单</a></li>
                        <li><a href="/userreturns">返水管理</a></li>
                    </ul>
                </li>
                <li><a href="/k3odds">快三赔率管理</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button">内容<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/marquee">滚动文字</a></li>
                        <li><a href="/news">新闻中心</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button">会员<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/admin/create">添加会员</a></li>
                        <li><a href="/bettingList">会员投注统计</a></li>
                        <li><a href="/admin">会员列表</a></li>
                        <li><a href="#">用户组添加</a></li>
                        <li><a href="#">操作日志</a></li>
                        <li><a href="#">会员统计</a></li>
                        <li><a href="#">代理管理</a></li>
                        <li><a href="#">返水记录</a></li>
                        <li><a href="#">支付等级设置</a></li>
                        <li><a href="#">已删除会员</a></li>
                    </ul>
                </li>
                <li><a href="#">设置</a></li>
                <li><a href="#">彩票</a></li>
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
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@yield('script')
</body>
</html>