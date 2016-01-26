<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="">
    <meta name="Description" content="。">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/gpcmobile.css') }}">
    @yield('css')
</head>
<body>
<div class="container-fluid">
    <div class="navbar-default navbar-fixed-top">
        <div class="col-xs-12 mobiletop"></div>
    </div>
    <!--导航菜单 结束-->
    <!--商品列表 开始-->
    <div class="content-list row">
    </div>
    <!--商品列表 结束-->
    <!--底部菜单 开始-->
    <div id="footer">
        <footer class="navbar-fixed-bottom gpnav-footer">
            <div class="col-xs-3"><a href="" class="current"><span class="icon-iconfont-dian1 shop"></span>首页</a></div>
            <div class="col-xs-3"><a href=""><span class="icon-iconfont-fenlei"></span>个人中心</a></div>
            <div class="col-xs-3"><a href=""><span class="icon-iconfont-gouwuche cart"></span>交易记录</a></div>
            <div class="col-xs-3"><a href=""><span class="icon-iconfont-my"></span>优惠活动</a></div>
            <div class="clearfix"></div>
        </footer>
    </div>
    <!--底部菜单 结束-->
</div>
<!--container-fluid 结束-->

<script type="text/javascript" src="/js/all.js"></script>

</body><div></div><div></div></html>