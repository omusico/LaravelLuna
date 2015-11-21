<div>
    @if(!Auth::guest())
        <div class="distance nk3_login">
            <div class="nk3_login_top"></div>
            <h4>
                <b>你好：</b><span>
                    @if(Auth::user()->groupId ==3)
                        <a style="color: red">代理</a>
                    @elseif(Auth::user()->groupId==5)
                        <a style="color: green">大代理</a>
                    @elseif(Auth::user()->groupId ==2)
                        <a>会员</a>
                    @endif
                    <a style="color:red;font-size: large;font-family: bold"
                       href="account">{{Auth::user()->name}}</a></span><a
                        href="/logout">&nbsp;&nbsp;&nbsp;&nbsp;[退出]</a>
            </h4>
            <h4 class="h_money1">用户余额：<span class="h_m_h" onclick="$(this).hide(); $('.h_money1 .h_m_s').show();"
                                            style="display: none;">￥****元&nbsp;&nbsp;<a>显示余额</a></span>
                <span class="h_m_s" onclick="$(this).hide(); $('.h_money1 .h_m_h').show();"
                      style="display: inline;">￥{{ Auth::user()->lu_user_data->points}}元&nbsp;&nbsp;<a>隐藏余额</a></span>
            </h4>

            <div class="nk3_cztx">
                <a href="/recharge">充 值</a> <a href="/deposit" class="nk3_tx">提 现</a>
            </div>
            <div style="text-align: center">
                <a href="/userLotteryBetting">我的投注</a> <a href="#">追号记录</a><br/>
                <a href="/getLotteryWin">中奖记录</a> <a href="/getaccountdetail">账户明细</a><br/>
                <a href="/account">我的账户</a> <a href="#">站内信(0)</a>
            </div>
            <div class="nk3_login_bottom"></div>
        </div>
    @else
        <div style="margin-top: 20px;">
            <div class="fiveindexbutton" onclick="userclick(1)" id="btn1"><span>我要开户</span></div>
            <div class="fiveindexbutton" onclick="userclick(2)" id="btn2"><span>账户充值</span></div>
            <div class="fiveindexbutton" onclick="userclick(3)" id="btn3"><span>账户提款</span></div>
            <div class="fiveindexbutton" onclick="userclick(4)" id="btn4"><span>代理注册</span></div>
            <div class="crown" onclick="userclick(5)" id="btn5"><span>会员登陆</span></div>
        </div>
        <div class="nk3_login_bottom"></div>
    @endif
</div>
