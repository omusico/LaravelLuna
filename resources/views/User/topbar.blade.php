<div class="row gp_person mobilShow" style="display: none;padding-top: 18px">
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
        @if(env('SITE_TYPE',"")=="five")
            <a href="fivelotterytrend?lottery_type=sdfive">
                <div class="gp_mobile_trend"></div>
                <span>走势</span>
            </a>
        @else
            <a href="lotterytrend?lottery_type=jsold">
                <div class="gp_mobile_trend"></div>
                <span>走势</span>
            </a>
        @endif
    </div>
</div>
<div class="row gp_person mobilShow" style="display: none;padding-top: 10px;padding-bottom: 10px">
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
<div class="row mobilShow" style="display: none;">
    <div class="col-xs-12" style="height: 1px;background-color: #808080"></div>
</div>