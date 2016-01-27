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
    <!--关注开始-->
    <div class="navbar-default navbar-fixed-top fixed attent" role="navigation" style="display:none">
        <div class="attent-con">
            <div><span>欢迎进入<a>车联万物</a></span><span>关注公众号，享专属服务</span></div>
            <a class="btn btn-success btn-xs" href="http://m.tescar.cn/common/focus.aspx">立即关注</a>
        </div>
    </div>
    <!--关注结束-->

    <!--导航菜单 开始-->
    <header>
        <nav role="navigation">
            <ul class="row text-center">
                <li class="col-xs-3"><a href="./车联万物_files/车联万物.html">首页</a></li>
                <li class="col-xs-3"><a href="http://m.tescar.cn/list.aspx?did=1">新品上架</a></li>
                <li class="col-xs-3"><a href="http://m.tescar.cn/list.aspx?did=1&amp;cateid=8">积分专区</a></li>
                <li class="col-xs-3"><a href="http://m.tescar.cn/list.aspx?did=1&amp;type=B">特惠商品</a></li>
            </ul>
        </nav>
    </header>
    <!--导航菜单 结束-->
    <!--商品列表 开始-->
    <div class="content-list row">
        <div class="title">
            <div class="col-xs-6 hot"><strong>|</strong>热卖推荐</div>
            <div class="col-xs-6 text-right"></div>
        </div>
        <div class="list">
            <!--商品循环列表-->

            <div class="col-xs-6">
                <div><a href="http://m.tescar.cn/detail.aspx?did=1&amp;itemid=2"></a>

                    <div class="txt">
                        <div class="name"><a href="http://m.tescar.cn/detail.aspx?did=1&amp;itemid=2">腾兴迷宝</a></div>
                        <div class="col-xs-3 price">￥10.00</div>
                        <div class="col-xs-9 text-right">已售：14件</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="col-xs-6">
                <div>
                    <div class="txt">
                        <div class="name"><a href="http://m.tescar.cn/detail.aspx?did=1&amp;itemid=1">腾兴车宝</a></div>
                        <div class="col-xs-3 price">￥588.00</div>
                        <div class="col-xs-9 text-right">已售：36件</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--商品循环列表-->
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <div class="gp_mobile_recharge"></div>
        </div>
        <div class="col-xs-3">
            <div class="gp_mobile_deposit"></div>
        </div>
        <div class="col-xs-3">
            <div class="gp_mobile_proxy"></div>
        </div>
        <div class="col-xs-3">
            <div class="gp_mobile_trend"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <div class="gp_mobile_personal"></div>
        </div>
        <div class="col-xs-3">
            <div class="gp_mobile_pdetail"></div>
        </div>
        <div class="col-xs-3">
            <div class="gp_mobile_record"></div>
        </div>
        <div class="col-xs-3">
            <div class="gp_mobile_drecord"></div>
        </div>
    </div>
    <!--商品列表 结束-->
    <!--底部菜单 开始-->
    <div id="footer">
        <footer class="navbar-fixed-bottom gpnav-footer">
            <div class="col-xs-3"><a href="" class="current"><span class="icon-iconfont-dian1 shop"></span>微店</a></div>
            <div class="col-xs-3"><a href=""><span class="icon-iconfont-fenlei"></span>分类</a></div>
            <div class="col-xs-3"><a href=""><span class="icon-iconfont-gouwuche cart"></span>购物车</a></div>
            <div class="col-xs-3"><a href=""><span class="icon-iconfont-my"></span>个人中心</a></div>
            <div class="clearfix"></div>
        </footer>
    </div>
    <!--底部菜单 结束-->
</div>
<!--container-fluid 结束-->

<script type="text/javascript" src="/js/all.js"></script>

</body>
<div></div>
<div></div>
</html>