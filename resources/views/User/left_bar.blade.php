<div class="nk3_center_left">
    <h2 style="margin-top: 0px;font-size: 90%">个人中心:
        @if(!Auth::guest())
            {{Auth::user()->name}}
            余额:<span style="font-style: italic"> {{Auth::user()->lu_user_data->points}}</span>
            <a href="/logout" style="color: #add8e6">[退出]</a>
        @endif
    </h2>

    <div class="nk3_center_left_box">
        <h3>我的账户</h3>
        <ul>
            <li><a href="/account" class="">我的账户</a></li>
        </ul>
        <h3>我的投注</h3>
        <ul>
            <li><a href="/userLotteryBetting">我的投注</a></li>
            <li><a href="#">追号投注</a></li>
            <li><a href="/getLotteryWin">中奖记录</a></li>
        </ul>
        <h3>资金管理</h3>
        <ul>
            <li><a href="/getaccountdetail" class="">账户明细</a></li>
            <li><a href="/recharge">立即充值</a></li>
            <li><a href="/deposit">我要提现</a></li>
        </ul>
        <h3>安全中心</h3>
        <ul>
            {{--<li><a href="#">安全中心</a></li>--}}
            <li><a href="/editpwd">修改密码</a></li>
            {{--<li><a href="#">绑定手机</a></li>--}}
            <li><a href="/bank">绑定银行卡</a></li>
            {{--<li><a href="/member/realnameauth/">实名认证</a></li>--}}
        </ul>
        {{--<h3>站内信</h3>--}}
        {{--<ul class="end">--}}
            {{--<li><a href="#">站内信</a></li>--}}
        {{--</ul>--}}
    </div>
</div>