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
<div class="top_main_back"></div>
<div class="container header" style="margin-top: 50px" id="indexHeader">
    <div class="logoWrap">
        <h1 class="logo"><a href="#" title="中国快三网" class="logoLink"><img src="/css/m_logo.png" alt="中国快三网"></a></h1>
    </div>
    <ul class="part_nav">
        <li class="home_cur " style="background-color: red"><a href="/" title="中国快三网首页" id="link83">首页</a></li>
        <li class="m_li "><a href="/k3GameRule" target="_blank" title="游戏规则">游戏规则</a></li>
        <li class="m_li "><a href="#" target="_blank" title="优惠活动">优惠活动</a></li>
        <li class="m_li "><a href="#" title="走势图">走势图</a></li>
        <li class="m_li "><a title="合作代理" target="_blank" href="/inviteurl">合作代理</a></li>
        <li class="m_li "><a href="/userLotteryBetting" target="_blank" title="交易记录">交易记录</a></li>
        <li class="m_li "><a href="#" title="手机下注">手机下注</a></li>
        <li class="m_li last"><a title="网址" href="#">网址</a></li>
    </ul>
    <div class="contact_r" style="width: auto; margin: 10px 20px 0 0; right: 70px;"><img src="/css/kftel.png" title="7×24小时服务热线：zgk3wz@@126.com" alt="7×24小时服务热线：zgk3wz@@126.com">
    </div>
    <div class="home_hb" style="background-color: red">
        <ul>
            <li>
                <marquee scrollamount=3 style="color:white">{{Cache::get('marquee','请到后台设置滚动文字')}}</marquee>
                {{--<a target="_blank" href="" title="" id="link100"></a>--}}
            </li>
        </ul>

    </div>
</div>
{{--{{$_SERVER['REQUEST_URI']}}--}}
@if($_SERVER['REQUEST_URI']=='/index' || $_SERVER['REQUEST_URI']=='/')

@else
    <div class="container" style="text-align: center">
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav nav col-md-offset-2">
                <li><a href="/lotteryIndex?lottery_type=jsold">江苏快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=beijin">北京快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=fjk3">福建快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=anhui">安徽快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=jilin">吉林快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=jsnew">广西快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=hubei">湖北快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=hebei">河北快三</a></li>
                <li><a href="/lotteryIndex?lottery_type=nmg">内蒙快三</a></li>
            </ul>
        </div>
    </div>
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