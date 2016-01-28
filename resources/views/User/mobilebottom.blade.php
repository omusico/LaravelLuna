<div id="footer" class="mobilShow" style="display: none;margin-top: 78px">
    <footer class="navbar-fixed-bottom gpnav-footer">
        <div class="col-xs-3">
            @if(env('SITE_TYPE','')=="gaopin")
                <a href="/mobileindex" css="current"><img src="/css/down_main.png"><span>首页</span></a>
            @else
                <a href="/" css="current"><img src="/css/down_main.png"><span>首页</span></a>
            @endif
        </div>
        <div class="col-xs-3"><a href="account"><img src="/css/down_center.png"><span>个人中心</span></a></div>
        <div class="col-xs-3"><a href="userLotteryBetting"><img src="/css/down_jilu.png"><span>投注记录</span></a></div>
        <div class="col-xs-3"><a href="favourable"><img src="/css/down_hdong.png"><span>优惠活动</span></a></div>
        <div class="clearfix"></div>
    </footer>
</div>
