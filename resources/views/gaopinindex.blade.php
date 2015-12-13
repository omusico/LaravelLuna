<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/gaopin.css') }}">
    <link rel="icon" href="gaopinfavicon.ico" type="image/x-icon"/>
    <title>高频彩票吧</title>
<body>
<div class="header-plus" id="header_plus">
    <div class="header-toptray-plus">
        <div class="toptray-plus clearfix auto990">
            <div class="toptray-left fl">
                <span>hi，
                    @if(!Auth::guest())
                        {{Auth::user()->name}}
                    @endif
                    欢迎来到高频彩票吧</span>
            </div>
            <div class="toptray-right fr">
                <ul id="toptray_login" class="hidden toptray clearfix">
                    <li><span id="toptray_username"></span><a href="#" class="exit-btn ml14 color666 js-trigger-logout">退出</a>
                    </li>
                    <li class="m14">|</li>
                    <li class="header-show-money">
                        <div id="wallet_container">
                            <span class="span-login-rmb colorRed" style="font-family: Verdana,Arial;">￥</span>
                            <span id="header_user_money" class="colorRed">*****</span><input type="hidden"
                                                                                             id="header_user_money_hidden"
                                                                                             value="">

                            <div id="wallet_detail" style="display:none;"></div>
                        </div>
                        <a href="#" id="header_show_money" class="color666">显示余额</a>
                        <i id="header_money_refresh" class="img-login-refresh icon"></i>
                    </li>
                    <li class="mylottery" id="mylottery">
                        <a href="#" target="_blank" class="my-lottery color666"><i class="nosign-hd"
                                                                                   id="header_sign"></i>我的彩票<em
                                    class="icon"></em></a>
                    </li>
                    <li><a href="#" target="_blank" class="mr10 color666 mr">充值</a><a href="#" target="_blank"
                                                                                      class="color666">提款</a></li>
                    <li class="toptray-r-hd ml14">
                        <div id="unread_count_num">
                            <a class="message-nums-hd color666" href="#" target="_blank">消息<em id="unread_num_new"
                                                                                               class="icon"></em></a>
                        </div>
                    </li>
                </ul>
                <ul id="toptray_not_login" class="toptray-plus clearfix">
                    <li>
                        @if(Auth::guest())
                            <a href="/login" class="colorRed">登录</a> &nbsp;
                            <a href="/register" class="colorRed">注册</a>
                        @endif
                    </li>
                    <li class="m14">|</li>
                    <li class="mylottery"><a href="/userLotteryBetting" target="_blank" class="my-lottery color666">我的彩票<em
                                    class="icon"></em></a></li>
                    <li>
                        <a href="/recharge" target="_blank" class="color666 mr10">充值</a>
                        <a href="/deposit" target="_blank" class="color666">提款</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="head-toptray-logo clearfix auto990">
        <div class="logo-box clearfix" style="width:420px;padding: 15px 0">
            <a title="高频彩票吧" href="#">
                <h1>高频彩票吧</h1>
                <img title="高频彩票吧" alt="高频彩票吧" src="/css/gaopinlogo.png" class="logo-index-hd"
                     style="width:122px;height:30px;margin:0 8px 0 0">
            </a>
            <a><img alt="为梦想买单" src="/css/logo_dream.png"></a>
        </div>
        <ul class="customerService-plus">
            <li><i class="icon"></i><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=583893899&amp;site=qq&amp;menu=yes"
                                       target="_blank" title="">QQ:583893899</a> &nbsp;</li>
            <li class="online_service">
                <a href="#" target="_blank" class="colorRed kf-top">在线客服</a>
                <a href="#" target="_blank" class="colorRed kf-top">玩法</a>
                <a href="#" target="_blank" class="colorRed kf-top">帮助</a>
                <a href="#" target="_blank" class="colorRed">公益</a>
            </li>
        </ul>
    </div>
    <div class="header-navbar-plus">
        <div class="auto990 clearfix" id="header_box">
            <div class="lottery-plus mr20" id="lotterys">
                <h2>全部彩种</h2>

                <div class="lotterys-list-hd" id="lotterysList">
                    <ul class="lottery-list-box">
                        <li class="mainGame" style="padding-top:16px;">
                            <a href="/ssclotteryIndex?lottery_type=cqssc" target="_blank" class="mainA"><i class="icon nav40-ssq"></i><span
                                        class="color333">重庆时时彩</span></a>
                        </li>
                        <li class="mainGame">
                            <a href="/ssclotteryIndex?lottery_type=xjssc" target="_blank" class="mainA"><i class="icon nav40-dlt"></i><span
                                        class="color333">新疆时时彩</span></a>
                        </li>
                        <li class="mainGame">
                            <a href="/ssclotteryIndex?lottery_type=jxssc" target="_blank" class="mainA"><i class="icon nav40-jczq"></i><span
                                        class="color333">江西时时彩</span></a>
                        </li>
                        <li class="mainGame">
                            <a href="/lotteryIndex?lottery_type=jsnew" target="_blank" class="mainA"><i class="icon nav40-sd11x5"></i><span
                                        class="color333">新快3</span></a>
                        </li>
                        <li class="mainGame">
                            <a href="/lotteryIndex?lottery_type=jsold" target="_blank" class="mainA"><i class="icon nav40-jxssc"></i><span
                                        class="color333">老快3</span></a>
                        </li>
                        <li class="mainGame">
                            <a href="/fivelotteryIndex?lottery_type=gdfive" target="_blank" class="mainA"><i class="icon nav40-3D"></i><span
                                        class="color333">广东11选5</span></a>
                        </li>
                        <li class="mainGame" style="margin-bottom: 25px">
                            <a href="/lotteryIndex?lottery_type=jsold" target="_blank" class="mainA"><i class="icon nav40-qlc"></i><span
                                        class="color333">山东11选5</span></a>
                        </li>
                        <li class="allGames clearfix" data-type="1" >
                            <h3><span>时时彩</span></h3>
                            <ul class="clearfix game-list">
                                <li><a href="/ssclotteryIndex?lottery_type=cqssc" target="_blank">重庆</a></li>
                                <li><a href=/ssclotteryIndex?lottery_type=jxssc" target="_blank">江西</a></li>
                                <li style="margin-right: 0"><a href="/ssclotteryIndex?lottery_type=tjssc" target="_blank">天津</a></li>
                                <li><a href="/ssclotteryIndex?lottery_type=xjssc" target="_blank">新疆</a></li>
                            </ul>
                        </li>
                        <li class="allGames" data-type="2">
                            <h3><span>11选5</span></h3>
                            <ul class="clearfix game-list">
                                <li><a href=/fivelotteryIndex?lottery_type=sdfive" target="_blank">山东</a></li>
                                <li><a href="/fivelotteryIndex?lottery_type=gdfive" target="_blank">广东</a></li>
                                <li style="margin-right: 0"><a href="/fivelotteryIndex?lottery_type=shfive" target="_blank">上海</a></li>
                                <li><a href="/fivelotteryIndex?lottery_type=zjfive" target="_blank" class="colorRed">浙江</a></li>
                                <li><a href="/fivelotteryIndex?lottery_type=jxfive" target="_blank" class="colorRed">江西</a></li>
                                <li style="margin-right: 0"><a href="/fivelotteryIndex?lottery_type=liaoningfive" target="_blank">辽宁</a></li>
                            </ul>
                        </li>
                        <li class="allGames clearfix" data-type="3">
                            <h3><span style="top:10px">快3</span></h3>
                            <ul class="clearfix game-list">
                                <li><a href="/lotteryIndex?lottery_type=jsold" target="_blank" class="colorRed">江苏</a></li>
                                <li><a href="/lotteryIndex?lottery_type=beijin" target="_blank">北京</a></li>
                                <li style="margin-right: 0"><a href="/lotteryIndex?lottery_type=anhui" target="_blank" class="colorRed">安徽</a></li>
                                <li><a href="/lotteryIndex?lottery_type=jilin" target="_blank">吉林</a></li>
                                <li style="width: 54px;margin-right: 4px;"><a href="/lotteryIndex?lottery_type=jsnew" target="_blank">广西</a></li>
                                <li style="margin-right: 0"><a href="/lotteryIndex?lottery_type=hubei" target="_blank">湖北</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav-plus clearfix">
                <li class="navw1 on"><a href="/">首页</a></li>
                <li class="navw2 "><a href="/lotteryIndex?lottery_type=jsold">购彩大厅</a></li>
                <li class="navw2 "><a href="/favourable" class="dropdown-desc">优惠活动</a></li>
                <li class="navw2 "><a href="/lotterytrend?lottery_type=jsold">走势图表</a></li>
                <li class="navw2 "><a href="/inviteurl">合作代理</a></li>
                <li class="navw2 "><a href="/userLotteryBetting" target="_blank">交易记录</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="main-box clearfix auto990" id="main">
    <div class="part-1 clearfix">
        <div class="part-1-cont-left mr20">
            <div id="carousel-generic" class="carousel slide" data-ride="carousel"
                 xmlns="http://www.w3.org/1999/html">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="/css/001.png" alt="...">

                        <div class="carousel-caption">
                            {{--<p>中奖率高、赔率高、信誉100%</p>--}}
                        </div>
                    </div>
                    <div class="item">
                        <img src="/css/002.png" alt="...">

                        <div class="carousel-caption">
                            {{--<p>优惠多多、取款5分钟内到帐</p>--}}
                        </div>
                    </div>
                    <div class="item">
                        <img src="/css/003.png" alt="...">

                        <div class="carousel-caption">
                            {{--<p>中奖金额免税收</p>--}}
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-generic" role="button"
                   data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-generic" role="button"
                   data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="quick-buy-box mt15">
                <div class="quick-tpis">
                    <i class="icon-lb"></i>
                    <b>最新中奖：</b>

                    <div class="quick-list" id="scroll" style="width: 380px; height: 30px; overflow: hidden;">
                        <ul class="claearfix" style="width: 1140px;">
                            <li style="width: 190px; display: inline-block; height: 30px;"><a
                                        href="#"
                                        title="高频彩神单赏析：独占鳌头">高频彩神单赏析：290万独占鳌头</a></li>
                        </ul>
                    </div>
                </div>
                <div class="quick-buy">
                    <ul class="quick-tab-list">
                        <li lottery_type="fc3d" class="on"><a href="/lotteryIndex?lottery_type=jsnew" target="_blank">新快三</a>
                        </li>
                    </ul>
                    <div class="qb-box-list">
                        <!--快速购彩 ssq-->
                        <!--快速购彩-dlt-->
                        <!--快速购彩-fc3d-->
                        <div class="qb" id="qb_fc3d" style="">
                            <ul class="qb-info clearfix">
                                <li style="border-bottom:none; padding-bottom:0;"><strong>广西快3</strong>
                                    第<em>{{$recentArray['JSNEW']->proName}}</em>期开奖号码<br>
                                    开奖时间：{{$recentArray['JSNEW']->created_at}}
                                    <br>
                                    <a href="/lotteryIndex?lottery_type=jsnew">立即购买</a>
                                    <img style="display: inline;margin: 3px 5px;"
                                         src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSNEW']->codes)[0]}}x24.png"><img
                                            style="display: inline;margin: 3px 5px;"
                                            src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSNEW']->codes)[1]}}x24.png"><img
                                            style="display: inline;margin: 3px 5px;"
                                            src="http://res.kuai3.com/resources/kuai3/images/sz/{{explode(',', $recentArray['JSNEW']->codes)[2]}}x24.png">
                                </li>
                            </ul>
                        </div>
                        <!--快速购彩-jczq-->
                        {{--<div class="qb-tz-box clearfix">--}}
                            {{--<span class="fl-l bei-box clearfix"><a href="javascript:;" class="tz_bei_sub"--}}
                                                                   {{--data-type="fc3d">−</a><input type="text" value="1"--}}
                                                                                                {{--class="multiple"--}}
                                                                                                {{--id="fc3d_multiple"--}}
                                                                                                {{--name="input"--}}
                                                                                                {{--maxlength="3"--}}
                                                                                                {{--data-type="fc3d"><a--}}
                                        {{--href="javascript:;" class="tz_bei_add" data-type="fc3d">+</a><span class="mr10">倍</span>共 <strong--}}
                                        {{--class="money colorRed" id="fc3d_amount">2</strong> 元&nbsp;</span>--}}
                            {{--<span class="dg-btn-box"><a href="#" class="change-btn" id="fc3d_random"><i--}}
                                            {{--class="icon"></i> 换一注</a><a href="#" id="fc3d_submit_index"--}}
                                                                        {{--class="dg-tz-btn icon"></a> </span>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="part-1-cont-right">
            <div class="login-box">
                <div class="not-login">
                    @include('userinfo')
                </div>
            </div>
            <div class="help-tab-box">
                <ul class="help-tab">
                    <li class="on"><a href="#" class="user-help">新手引导</a></li>
                </ul>
                <ul class="user-help-box help-ul">
                    <li><a href="#" target="_blank">如何注册成为高频彩票吧会员？</a></li>
                    <li><a href="#" target="_blank">2元如何揽入1000万</a><span class="icon20"></span></li>
                    <li><a href="#" target="_blank">新手如何玩转竞彩足球？</a></li>
                </ul>
            </div>
            <div class="phone-box">
                {{--<div class="phone-box-text">扫我下载，畅享极致购彩体验!</div>--}}
                {{--<i class="code-icon"></i>--}}
            </div>
        </div>
    </div>
</div>
<div class="jc-footer">
    <div class="footer-cn js-lazy">
        <div class="cnLeft">

            <div style="width: 108px;height: 108px">
            </div>
        </div>
        <div class="cnRight">
            <div class="cnTop">
                <div class="cn-list">
                    <h3>账户相关</h3>
                    <ul>
                        <li><a href="#" target="_blank" title="">如何注册账号</a></li>
                        <li><a href="#" target="_blank" title="">怎么找回登录密码</a></li>
                        <li><a href="#" target="_blank" title="">怎么找回支付密码</a></li>
                        {{--<li><a href="#" target="_blank" title="">如何修改手机号码</a></li>--}}
                    </ul>
                </div>
                <div class="cn-list">
                    <h3>充值购彩</h3>
                    <ul>
                        <li><a href="#" target="_blank" title="">如何进行充值</a></li>
                        <li><a href="#" target="_blank" title="">如何购买彩票</a></li>
                        <li><a href="#" target="_blank" title="">如何查询购彩记录</a></li>
                        <li><a href="#" target="_blank" title="">充值没到账怎么办</a></li>
                    </ul>
                </div>
                <div class="cn-list">
                    <h3>兑奖提款</h3>
                    <ul>
                        <li><a href="#" target="_blank" title="">怎样进行兑奖</a></li>
                        <li><a href="#" target="_blank" title="">如何进行提款</a></li>
                        <li><a href="#" target="_blank" title="">提款多久到账</a></li>
                        <li><a href="#" target="_blank" title="">领奖是否收手续费</a></li>
                    </ul>
                </div>
                <div class="cn-list service">
                    <h3>在线客服</h3>
                    <ul>
                        <li>QQ咨询：<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=583893899&amp;site=qq&amp;menu=yes"
                                    target="_blank" title="">583893899</a></li>
                        <li></li>
                        <li>工作时间：早08:30-凌晨00:30</li>
                    </ul>
                </div>
            </div>
            <div class="cnBtn">
                <p><span class="explain01 icon"></span>账户安全</p>

                <p><span class="explain02 icon"></span>购彩便捷</p>

                <p><span class="explain03 icon"></span>兑奖简单</p>

                <p><span class="explain04 icon"></span>提款快速</p>
            </div>
        </div>
    </div>
    <div class="clear nospace"></div>
    <div class="footerBox">
        <div class="about_box">
            <ul class="clearfix">
                <li class="color333">战略合作伙伴：</li>
                <li><a target="_blank">百度</a></li>
                <li><a target="_blank">hao123彩票</a></li>
                <li><a target="_blank">虎扑篮球</a></li>
                <li><a target="_blank">虎扑足球</a></li>
                <li><a target="_blank">虎扑彩票</a></li>
                <li><a target="_blank">最乐彩</a></li>
                <li><a target="_blank">智胜彩票</a></li>
                <li><a target="_blank">必发指数网</a></li>
                <li><a target="_blank">中国足彩网</a></li>
                <li><a target="_blank">足球魔方</a></li>
                <li><a target="_blank">懒财网</a></li>
                <li><a target="_blank">9188彩票</a></li>
                <li><a target="_blank">彩票宝</a></li>
            </ul>
            <p class="about_link">
                <a target="_blank">关于我们</a>|
                <a target="_blank">用户注册</a>|
                <a target="_blank">联系我们</a>|
                <a target="_blank">合作伙伴</a>|
                <a target="_blank">人才招聘</a>|
                <a target="_blank">友情链接</a>|
                <a target="_blank">网站地图</a>|
                <a target="_blank">公益</a>
            </p>

            <p class="about_mt">2009-2015 © <a target="_blank">高频彩票吧</a> 京ICP备12008186号 京公网安备110105011135号</p>

            <p class="about_mt"><a target="_blank">电信与信息服务业务经营许可证100831号</a> <a target="_blank">电子公告服务许可证</a></p>

            <p class="about_mt remind">提醒：购买彩票有风险，在线投注需谨慎，不向未满18周岁的青少年出售彩票！</p>

            <p class="about_img">
                <a target="_blank" class="a-police"></a>
                <a target="_blank" class="a-beian"></a>
                <a target="_blank" class="a-kexin"></a>
                <a target="_blank" class="a-baidu"></a>
                <a target="_blank" class="a-baifubao"></a>
            </p>
        </div>
    </div>
    <script type="text/javascript" src="/js/all.js"></script>
</div>

