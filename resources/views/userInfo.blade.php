<div>
    @if(isset(Auth::user()->name))
        <div class="distance nk3_login">
            <div class="nk3_login_top"></div>
            <h4>
                <b>你好：</b><span>
                    @if(Auth::user()->groupId ==3)
                        <a style="color: red">大代理</a>
                    @elseif(Auth::user()->groupId==5)
                        <a style="color: green">代理</a>
                    @elseif(Auth::user()->groupId ==8)
                        <a>注册会员</a>
                    @endif
                    <a style="color:red;">{{Auth::user()->name}}</a></span><a
                        href="/logout">&nbsp;&nbsp;&nbsp;&nbsp;[退出]</a>
            </h4>
            <h4 class="h_money1">用户余额：<span class="h_m_h" onclick="$(this).hide(); $('.h_money1 .h_m_s').show();"
                                            style="display: none;">￥****元&nbsp;&nbsp;<a>显示余额</a></span>
                <span class="h_m_s" onclick="$(this).hide(); $('.h_money1 .h_m_h').show();"
                      style="display: inline;">￥{{ \App\lu_user_data::where('uid',Auth::user()->id)->first()->points}}元&nbsp;&nbsp;<a>隐藏余额</a></span>
            </h4>

            <div class="nk3_cztx">
                <a href="/recharge">充 值</a> <a href="" class="nk3_tx">提 现</a>
            </div>
            <div style="text-align: center">
                <a href="/userLotteryBetting">我的投注</a> <a href="#">追号记录</a><br/>
                <a href="/getLotteryWin">中奖记录</a> <a href="#">账户明细</a><br/>
                <a href="#">我的账户</a> <a href="#">站内信(0)</a>
            </div>
            <div class="nk3_login_bottom"></div>
        </div>
    @else
        <div style="margin-top: 50px">
            尊敬的用户<br/>您还未登陆，请马上<a href="/login"><span
                        style="font-family: bold;color: red">登陆</span> </a>
            或<a><span style="color: red;">注册</span></a>
        </div>
    @endif
</div>
