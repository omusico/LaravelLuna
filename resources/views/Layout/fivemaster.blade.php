<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="11选5娱乐平台">
    <meta name="Description" content="11选5娱乐平台。">
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/five.css') }}">
    @yield('css')
</head>
<body class="top_main_back_five" style="background-color: #797002">
{{--<div class="top_main_back_five"></div>--}}
<div style="height: 100px;text-align: center;">
    <div style="padding-top: 40px;color:#f9d450;font-size: xx-large ">
        11选5娱乐平台
    </div>
</div>
<div class="container fiveheader" id="indexHeader">
    <div class="col-md-10 col-md-offset-1" style="background-color: #EFE697;height: 3px"></div>
    <div class="collapse navbar-collapse navbar-responsive-collapse"
         style="position: absolute; left: 100px;border-width: 3px;border-color: #f9d450">
        <ul class="nav navbar-nav nav">
            <li><a href="/" style="color:white;font-weight: bold">网站首页</a></li>
            {{--<li><a href="/k3GameRule" target="_blank" style="color:white;font-weight: bold" title="游戏规则">游戏规则</a></li>--}}
            <li><a href="/recharge" target="_blank" style="color:white;font-weight: bold">在线存款</a></li>
            <li><a href="#" target="_blank" style="color:white;font-weight: bold" title="优惠活动">优惠活动</a></li>
            <li><a href="/fivelotterytrend?lottery_type=jsold" style="color:white;font-weight: bold" title="走势图">走势图</a>
            </li>
            <li><a title="合作代理" target="_blank" style="color:white;font-weight: bold" href="/inviteurl">合作代理</a></li>
            <li><a href="/userLotteryBetting" target="_blank" style="color:white;font-weight: bold"
                   title="交易记录">交易记录</a>
            </li>
            <li><a href="#" title="手机下注" style="color:white;font-weight: bold">手机下注</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" style="color:white;font-weight: bold" data-toggle="dropdown"
                   role="button">网址<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">网址一</a></li>
                    <li><a href="#">网址二</a></li>
                    <li><a href="#">网址三</a></li>
                    <li><a href="#">网址四</a></li>
                    <li><a href="#">网址五</a></li>
                </ul>
        </ul>
    </div>
    <div class="col-md-10 col-md-offset-1" style="background-color: #EFE697;height: 3px;margin-top: 50px"></div>
    {{--<div class="home_hb" style="background-color: red">--}}
    {{--<ul>--}}
    {{--<li>--}}
    {{--<marquee scrollamount=3 style="color:white">{{Cache::get('marquee','请到后台设置滚动文字')}}</marquee>--}}
    {{--</li>--}}
    {{--</ul>--}}

    {{--</div>--}}
</div>
<div class="container mobilShow" style="display: none">
    @if(!Auth::guest())
        <label class="form-control" style="text-align: center">余额：{{Auth::user()->lu_user_data->points}}</label>
        <a class="btn-danger btn-lg form-control" href="/logout" style="text-align: center">退出登陆</a>
        <input type="hidden" id="isLogin">
    @endif
</div>
{{--隐藏登陆框--}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #242001">
        <div class="modal-content" style="background-color: #242001">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal" style="color: #242001"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: #f9d450;font-family: bold">
                    尊敬的用户,您当前还未登陆，请先登陆再操作
                </h4>
            </div>
            {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('name', '用户名', ['class' => 'col-md-4 control-label','style'=>'color:white']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password', '密码', ['class' => 'col-md-4 control-label','style'=>'color:white']) !!}
                <div class="col-md-6">
                    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label style="color: white">
                            <input type="checkbox" name="remember">记住我
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit('登陆', ['class' => 'btn btn-default
                    btn-primary','style'=>'background-color:#f9d450']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade" id="winDialog" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: red;font-family: bold">
                    中奖信息
                </h4>
            </div>
            <div class="modal-body" style="background-color: red">
                <a style="color: white;" id="winText"></a>
            </div>
        </div>
    </div>
</div>
@if($_SERVER['REQUEST_URI']=='/index' || $_SERVER['REQUEST_URI']=='/')

@else

    @if(!empty(strstr($_SERVER['REQUEST_URI'],'fivelotterytrend')))
        <div class="container" style="text-align: center">
            <div class="row">
                <div class="collapse navbar-collapse navbar-responsive-collapse navbar-inverse col-md-offset-1 col-md-10">
                    <ul class="nav navbar-nav nav ">
                        <li><a href="/fivelotterytrend?lottery_type=sdfive">山东11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=gdfive">广东11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=shfive">上海11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=zjfive">浙江11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=jxfive">江西11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=liaoningfive">辽宁11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=hljfive">黑龙江11选5</a></li>
                        <li><a href="/fivelotterytrend?lottery_type=cqfive">重庆11选5</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="container" style="text-align: center">
            <div class="row">
                <div class="collapse navbar-collapse navbar-responsive-collapse navbar-inverse col-md-offset-1 col-md-10">
                    <ul class="nav navbar-nav nav ">
                        <li><a href="/fivelotteryIndex?lottery_type=sdfive">山东11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=gdfive">广东11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=shfive">上海11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=zjfive">浙江11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=jxfive">江西11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=liaoningfive">辽宁11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=hljfive">黑龙江11选5</a></li>
                        <li><a href="/fivelotteryIndex?lottery_type=cqfive">重庆11选5</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endif
<div class="container">
    @include('flash')
</div>
@yield('content')
<div class="footer mobilhide" style="background-color: #242000;">
    <div class="f-link"><a title="关于我们" href="#">关于我们</a> | <a title="用户注册" target="_blank" href="/register">用户注册</a> |
        <a title="加盟合作" href="#">加盟合作</a> | <a href="#" title="进入网盟">进入网盟</a> | <a title="网站地图">网站地图</a> | <a
                title="友情链接" href="" id="link431">友情链接</a></div>
</div>
<script type="text/javascript" src="/js/all.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
//        checkwin();
    });


    (function (a) {
        if (/Mobile|Android|iPhone|iPod|Nokia|WP7|Symbian|MIDP|UCWEB|Minimo|Opera M(ob|in)i/.test(a) && !/iPad/.test(a) && !/(^|\s)mobi_redi=1(;|$)/.test(document.cookie)) {
            a = null;
            $(".mobilhide").hide();
            $(".mobilShow").show();

            $(".btn").addClass("btn-lg");
            <?php
            $islogin = strstr($_SERVER['REQUEST_URI'],'login');
            $isregister = strstr($_SERVER['REQUEST_URI'],'register');
             ?>
            @if(Auth::guest() && empty($islogin) && empty($isregister))
            location.replace('/login');
            @endif


        }
    })(navigator.userAgent);

    function checkwin() {
        $.ajax({
            type: "Get",
            url: '/getPersonalwin',
            dataType: "json",
            success: function (json) {
                if (json.length > 0) {
                    @if(!Auth::guest())
                    var content = "恭喜,亲爱的{{Auth::user()->name}}，您的";
                    for (var i = 0; i < json.length; i++) {
                        if (i == json.length - 1) {
                            content += json[i].provinceName + "第" + json[i].proName + "买" + json[i].codes + "中奖了!";
                        } else {
                            content += json[i].provinceName + "第" + json[i].proName + "买" + json[i].codes + " 、 ";
                        }
                    }
                    $("#winText").html(content);
                    $('#winDialog').modal('show');
                    @endif



                }
            }

        });
        setTimeout('checkwin()', 30000);
    }
</script>
{{--<script language="javascript" src="http://dft.zoosnet.net/JS/LsJS.aspx?siteid=DFT23548681&float=1&lng=cn"></script>--}}
@yield('script')
</body>
</html>