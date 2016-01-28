<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="">
    <meta name="Description" content="。">
    <title>高频彩</title>
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
    <div class="row gp_person" style="padding-top: 88px">
        <div class="col-xs-3">
            <a href="recharge">
                <div class="gp_mobile_recharge"></div>
                <span>充值</span>
            </a>
        </div>

        <div class="col-xs-3">
            <a href="deposit">
                <div class="gp_mobile_deposit"></div>
                <span>提款</span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="inviteurl">
                <div class="gp_mobile_proxy"></div>
                <span>代理</span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="fivelotterytrend?lottery_type=sdfive">
                <div class="gp_mobile_trend"></div>
                <span>走势</span>
            </a>
        </div>
    </div>
    <div class="row gp_person" style="padding-top: 10px;padding-bottom: 10px">
        <div class="col-xs-3">
            <a href="account">
                <div class="gp_mobile_personal"></div>
                <span>个人资料</span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="getaccountdetail">
                <div class="gp_mobile_pdetail"></div>
                <span>账户明细</span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="editpwd">
                <div class="gp_mobile_record"></div>
                <span>修改密码</span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="bank">
                <div class="gp_mobile_drecord"></div>
                <span>绑定银行卡</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="height: 1px;background-color: #808080"></div>
    </div>
    <div class="row" style="padding-top: 10px">
        <div class="col-xs-3">
            <a href="ssclotteryIndex?lottery_type=cqssc">
                <div class="gp_mobile_cq"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;border-right: solid #000000 1px;">
            <a href="ssclotteryIndex?lottery_type=cqssc">
                <div class="gp_mobile_text"><span>重庆时时彩</span></div>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="ssclotteryIndex?lottery_type=xjssc">
                <div class="gp_mobile_xj"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;">
            <a href="ssclotteryIndex?lottery_type=xjssc">
                <div class="gp_mobile_text"><span>新疆时时彩</span></div>
            </a>
        </div>
    </div>
    <div class="row" style="padding-top: 10px">
        <div class="col-xs-3">
            <a href="ssclotteryIndex?lottery_type=jxssc">
                <div class="gp_mobile_jx"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;border-right: solid #000000 1px;">
            <a href="ssclotteryIndex?lottery_type=jxssc">
                <div class="gp_mobile_text"><span>江西时时彩</span></div>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="lotteryIndex?lottery_type=jsnew">
                <div class="gp_mobile_xk3"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;">
            <a href="lotteryIndex?lottery_type=jsnew">
                <div class="gp_mobile_text"><span>新快3</span></div>
            </a>
        </div>
    </div>
    <div class="row" style="padding-top: 10px">
        <div class="col-xs-3">
            <a href="lotteryIndex?lottery_type=jsold">
                <div class="gp_mobile_lk3"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;border-right: solid #000000 1px;">
            <a href="lotteryIndex?lottery_type=jsold">
                <div class="gp_mobile_text"><span>老快3</span></div>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="fivelotteryIndex?lottery_type=gdfive">
                <div class="gp_mobile_gd"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;">
            <a href="fivelotteryIndex?lottery_type=gdfive">
                <div class="gp_mobile_text"><span>广东11选5</span></div>
            </a>
        </div>
    </div>
    <div class="row" style="padding-top: 10px">
        <div class="col-xs-3">
            <a href="fivelotteryIndex?lottery_type=sdfive">
                <div class="gp_mobile_sd"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;border-right: solid #000000 1px;">
            <a href="fivelotteryIndex?lottery_type=sdfive">
                <div class="gp_mobile_text"><span>山东11选5</span></div>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="">
                <div class="gp_mobile_xj"></div>
            </a>
        </div>
        <div class="col-xs-3" style="padding-left: 0px;padding-right: 0px;">
            <div class="gp_mobile_text"><span>新疆时时彩</span></div>
        </div>
    </div>
    <div id="footer">
        <footer class="navbar-fixed-bottom gpnav-footer">
            <div class="col-xs-3"><a href="/mobileindex" css="current"><img
                            src="/css/down_main.png"><span>首页</span></a></div>
            <div class="col-xs-3"><a href="account"><img src="/css/down_center.png"><span>个人中心</span></a></div>
            <div class="col-xs-3"><a href="userLotteryBetting"><img src="/css/down_jilu.png"><span>投注记录</span></a></div>
            <div class="col-xs-3"><a href="favourable"><img src="/css/down_hdong.png"><span>优惠活动</span></a></div>
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