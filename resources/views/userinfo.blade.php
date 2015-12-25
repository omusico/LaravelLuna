<div xmlns="http://www.w3.org/1999/html">
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
        @if(env("SITE_TYPE","")=="five")
            <div style="padding-top: 30px">
                {!! Form::open(['url' => '/login', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                <div class="form-group col-md-offset-2">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'
                    =>'用户名...','required']) !!}

                    {!! Form::password('password', ['class' => 'form-control',
                    'placeholder'=>'密码...','required','style'=>'margin-top:10px;margin-bottom:10px'])
                    !!}
                </div>
                <br>
                <br>

                <div class="form-group">
                    <div style="display: inline-block;margin-top: 15px">
                        {!! Form::submit('', ['class' => 'fivebtnlogin']) !!}
                        <a href="{{ url('/register') }}">
                        <input class="fivebtnreg" type="button">
                        </a>
                        <a href="{{ url('/dailiregister') }}">
                        <input class="fivebtndreg" type="button">
                        </a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="nk3_login_bottom"></div>
        @else
            <div style="margin-top: 20px">
                {!! Form::open(['url' => '/login', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
                <div class="form-group">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'
                    =>'用户名...','required']) !!}
                    {!! Form::password('password', ['class' => 'form-control',
                    'placeholder'=>'密码...','required','style'=>'margin-top:10px;margin-bottom:10px'])
                    !!}
                </div>
                {!! Form::submit('登陆', ['class' => 'btn btn-sm btn-primary']) !!}
                <a class="btn btn-sm btn-info" href="{{ url('/register') }}">免费注册</a>
                <a class="btn btn-sm btn-warning" href="{{ url('/dailiregister') }}">代理注册</a>
                {!! Form::close() !!}
            </div>
            <div class="nk3_login_bottom"></div>
        @endif
    @endif
</div>
