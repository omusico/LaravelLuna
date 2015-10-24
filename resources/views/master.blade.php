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
<div class="navbar navbar-default" role="navigation" style="margin-bottom: 0px">
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
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button">进入<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/lotteryIndex?lottery_type=jsold">江苏快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=beijin">北京快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=fjk3">福建快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=anhui">安徽快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=jilin">吉林快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=jsnew">广西快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=hubei">湖北快三</a></li>
                        <li><a href="/lotteryIndex?lottery_type=nmg">内蒙快三</a></li>
                    </ul>
                </li>
                <li><a href="/k3GameRule">游戏规则</a></li>
                <li><a href="#">走势图</a></li>
                <li><a href="/inviteurl">合作代理</a></li>
                <li><a href="/userLotteryBetting">交易记录</a></li>
                @if (Auth::guest())
                    {!! Form::open(['url' => '/login', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                    <div class="form-group">
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'
                        =>'用户名...','required']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'密码...','required'])
                        !!}
                    </div>
                    {!! Form::submit('登陆', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                @else
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
<div class="top_main_back"></div>
<div class="container">
    @include('flash')
</div>
<div style="width: 100%;margin-top: 63px"></div>
@yield('content')
<div class="footer">
    <div class="f-link"><a title="关于我们" href="#">关于我们</a> | <a title="用户注册" target="_blank" href="/register">用户注册</a> |
        <a title="加盟合作" href="#">加盟合作</a> | <a href="#" title="进入网盟">进入网盟</a> | <a title="网站地图">网站地图</a> | <a
                title="友情链接" href="" id="link431">友情链接</a></div>
</div>
<script type="text/javascript" src="/js/all.js"></script>
@yield('script')
</body>
</html>