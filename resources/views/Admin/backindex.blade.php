<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> 后台管理 </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/icon.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/easyui.css') }}">
</head>
<body id="main" class="easyui-layout" style="background-color: #DFE8F6">
<audio src="/css/2.mp3" id="audio1" controls="controls" style="display: none"></audio>
<div data-options="region:'north',split:true" style="height: 60px; position: static">
    <div id="header" style="background: grey; background-color: white; color: white">
        {{--<div style="float: left">--}}
        {{--<img src="/Images/logo.png" alt="图片无法显示" />--}}
        {{--</div>--}}
        <div style="float: right; text-align: right; width: 80%;">
            <a>
                <span style="font-weight: bold;color: #000000">欢迎您 {{Auth::user()->name}}</span>
            </a>
            {{--<a style="margin-right: 5px;" id="btnEditPwd" onclick=" EditPwd() " class="easyui-linkbutton"--}}
               {{--data-options="iconCls:'icon-edit',plain:true">修改密码</a>--}}
            <a style="margin-right: 5px;" id="btnLogOut" onclick=" Logout() " class="easyui-linkbutton"
               data-options="iconCls:'icon-undo',plain:true">退出</a><br/>
        </div>
    </div>
    <div class="container" style="padding: 0px;margin: 0px">
        <marquee scrollamount=3 style="color:red" id="backmar"></marquee>
    </div>
</div>
<div data-options="region:'west',split:true,title:'目录'" style="padding: 10px; width: 180px;">
    <div id="leftMenu">
        <ul class="easyui-tree">
            <li>
                <a href="/adminindex"><span>主页</span></a>
            </li>
            <li>
                <span>会员管理</span>
                <ul>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','会员列表','会员列表','/admin')"><span>会员列表</span></a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','添加会员','添加会员','/admin/create')"><span>添加会员</span></a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','会员投注统计','会员投注统计','/bettingcountList')"><span>会员投注统计</span></a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','会员投注列表','会员投注列表','/bettingList')"><span>会员投注列表</span></a>
                    </li>
                    {{--<li>--}}
                    {{--<a href="/admin"><span>反水统计</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="/admin"><span>锁定会员</span></a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            <li>
                <span>代理管理</span>
                <ul>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','代理列表','代理列表','/admin?groupid=3')">代理列表</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','代理条款设置','代理条款设置','/proxycert')">代理条款设置</a>
                    </li>
                </ul>
            </li>
            <li>
                <span>资金管理</span>
                <ul>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','提现审批申请','提现审批申请','/getdepositlist')">提现审批申请</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','公司充值','公司充值','/company')">公司充值</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','在线充值','在线充值','/rechargelist')">在线充值</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','添加公司充值账户','添加公司充值账户','/companybank/create')">添加公司充值账户</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','公司充值账户','公司充值账户','/companybank')">公司充值账户</a>
                    </li>
                </ul>
            </li>
            <li>
                <span>彩票管理</span>
                <ul>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','快三赔率管理','快三赔率管理','/k3odds')">快三赔率管理</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','快三手动开奖','快三手动开奖','/manualkj')">快三手动开奖</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','撤单','撤单','/cancelOrder')">撤单</a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','返水管理','返水管理','/userreturns')">返水管理</a>
                    </li>

                    <li>
                        <a onclick="$.addTopTab('#tabXG','手动返水','手动返水','/manualreturns')">手动返水</a>
                    </li>
                </ul>
            </li>
            <li>
                <span>网站设置</span>
                <ul>
                    <li>
                        {{--<a href="/marquee"><span>滚动文字</span></a>--}}
                        <a onclick="$.addTopTab('#tabXG','滚动文字','滚动文字','/marquee')">滚动文字</a>
                    </li>
                    <li>
                        {{--<a href="/news"><span>优惠新闻</span></a>--}}
                        <a onclick="$.addTopTab('#tabXG','优惠新闻','优惠新闻','/news')">优惠新闻</a>
                    </li>
                    {{--<li>--}}
                    {{--<a href="/admin"><span>手机版提醒</span></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="/admin"><span>线路</span></a>--}}
                    {{--</li>--}}
                </ul>
            </li>
        </ul>
    </div>
</div>
<div data-options="region:'center',border:false">
    <div id="tabXG" class="easyui-tabs" data-options="fit:true,tools:'#tabTools'">
    </div>
</div>
<div id="tabTools">
    <a id="btnMaxRestore" href="javascript:void(0)" class="easyui-linkbutton"
       data-options="iconCls:'icon-max',plain:true">全屏</a>
</div>
<div id="win">
</div>
<div id="dd">
</div>
<script type="text/javascript" src="/js/all.js"></script>
<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/js/easyui.gq.js"></script>
<script type="text/javascript" src="/js/easyui.package.js"></script>
<script type="text/javascript" src="/js/{{env('SITE_TYPE','')}}collect.js"></script>
<script type="text/javascript" defer="defer">
    $(function () {
        $('#tabXG').tabs('add', {
            title: '概况',
            content: $.createFrame('/bettingcountList')
        }).tabs({
            onSelect: function (title) {
                var currTab = $('#tabXG').tabs('getTab', title);
                var iframe = $(currTab.panel('options').content);
                var src = iframe.attr('src');
                if (src) {
                    currentPage = src;
                }
            }
        });
        $('#btnMaxRestore').bind('click', function () {
            $(this).maxRestore('#main');
        });

        $(".left_menu").find("li:nth-child(1)").addClass("nav_on");

    });

    function EditPwd() {
        GQ.OpenWindow("win", {
            title: "修改密码",
            href: "/Home/EditPwd",
            width: 350,
            height: 230,
            modal: true,
            callback: function () {
            }
        });
    }

    function Logout() {
        this.location.href = "/logout";
    }
</script>
<script type="text/javascript">
    audio = document.getElementById('audio1');
    var applyUser = "";
    var rechargeUser = "";
    var rechargecompanyUser = "";
    $(document).ready(function () {
        checkapply();
        checkrecharge();
        checkcompanyrecharge();

    });

    function checkapply() {
        $.ajax({
            type: "get",
            url: '/checkapply',
            dataType: "json",
            cache: false,
            success: function (json) {
                if (json.length > 0) {
                    applyUser = "";
                    for (var i = 0; i < json.length; i++) {
                        applyUser += json[i].userName;
                    }
//                    alert("会员" + applyUser + "申请提现，请马上处理");
                    applyUser = "会员" + applyUser + "申请提现，请马上处理/";
                    $("#backmar").html(applyUser + rechargecompanyUser + rechargeUser);
                    audio.play();
                }
            }
        });

        setTimeout('checkapply()', 12000);
    }

    function checkrecharge() {
        $.ajax({
            type: "get",
            url: '/checkrecharge',
            dataType: "json",
            cache: false,
            success: function (json) {
                if (json.length > 0) {
                    console.log(json);
                    rechargeUser = "";
                    for (var i = 0; i < json.length; i++) {
                        rechargeUser += json[i].userName;
                    }
//                    alert("会员" + rechargeUser + "申请公司充值审批，请马上处理");
                    rechargeUser = "会员" + rechargeUser + "通过第三方付款已经到账，请知悉/";
                    $("#backmar").html(rechargeUser + rechargecompanyUser + applyUser);
                    audio.play();
                }
            }
        });
        setTimeout('checkrecharge()', 12000);
    }

    function checkcompanyrecharge() {
        $.ajax({
            type: "get",
            url: '/checkcompanyrecharge',
            dataType: "json",
            cache: false,
            success: function (json) {
                if (json.length > 0) {
                    console.log(json);
                    rechargecompanyUser = "";
                    for (var i = 0; i < json.length; i++) {
                        rechargecompanyUser += json[i].userName;
                    }
//                    alert("会员" + rechargeUser + "申请公司充值审批，请马上处理");
                    rechargecompanyUser = "会员" + rechargecompanyUser + "申请公司充值审批，请马上处理/";
                    $("#backmar").html(rechargecompanyUser + rechargeUser + applyUser);
                    audio.play();
                }
            }
        });
        setTimeout('checkcompanyrecharge()', 12000);
    }
</script>
</body>
</html>
