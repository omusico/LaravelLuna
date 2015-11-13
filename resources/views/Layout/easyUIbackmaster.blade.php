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
<div data-options="region:'north',split:true" style="height: 40px; position: static">
    <div id="header" style="background: grey; background-color: white; color: white">
        {{--<div style="float: left">--}}
            {{--<img src="/Images/logo.png" alt="图片无法显示" />--}}
        {{--</div>--}}
        <div style="float: right; text-align: right; width: 80%;">
            <a style="margin-right: 5px;" id="btnEditPwd" onclick=" EditPwd() " class="easyui-linkbutton" data-options="iconCls:'icon-edit',plain:true">修改密码</a>
            <a style="margin-right: 5px;" id="btnLogOut" onclick=" Logout() " class="easyui-linkbutton" data-options="iconCls:'icon-undo',plain:true">退出</a><br />
            {{--<a style="float: right">--}}
                {{--<image src="@Url.Content("~/images/user.gif")" width="20" />--}}
                {{--<span style="font-weight: bold">欢迎您 @ViewBag.companyname : @ViewBag.USER_NAME</span>--}}
            {{--</a>--}}
        </div>

    </div>
</div>
<div data-options="region:'west',split:true,title:'目录'" style="padding: 10px; width: 150px;">
    <div id="leftMenu">
        <ul class="easyui-tree">
            <li>
                <a href="/admin"><span>主页</span></a>
            </li>
            <li>
                <span>会员管理</span>
                <ul>
                    <li>
                        <a href="/admin"><span>会员列表</span></a>
                    </li>
                    <li>
                        <a onclick="$.addTopTab('#tabXG','位置查看','位置查看','/admin/create')"><span>添加会员</span></a>
                    </li>
                    <li>
                        <a href="/bettingcountList"><span>会员投注统计</span></a>
                    </li>
                    <li>
                        <a href="/bettingList"><span>会员投注列表</span></a>
                    </li>
                    <li>
                        <a href="/admin"><span>反水统计</span></a>
                    </li>
                    <li>
                        <a href="/admin"><span>锁定会员</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <span>代理管理</span>
                <ul>
                    <li>
                        <a href="/admin?groupid=3"><span>代理列表</span></a>
                    </li>
                    <li>
                        <a href="/proxycert"><span>代理条款设置</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <span>资金管理</span>
                <ul>
                    <li>
                        <a href="/getdepositlist"><span>提现审批申请</span></a>
                    </li>
                    <li>
                        <a href="/company"><span>公司充值</span></a>
                    </li>
                    <li>
                        <a href="/rechargelist"><span>在线充值</span></a>
                    </li>
                    <li>
                        <a href="/companybank/create"><span>添加公司充值账户</span></a>
                    </li>
                    <li>
                        <a href="/companybank"><span>公司充值账户</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <span>彩票管理</span>
                <ul>
                    <li>
                        <a href="/k3odds"><span>快三赔率管理</span></a>
                    </li>
                    <li>
                        <a href="/manualkj"><span>快三手动开奖</span></a>
                    </li>
                    <li>
                        <a href="/cancelOrder"><span>撤单</span></a>
                    </li>
                    <li>
                        <a href="/userreturns"><span>返水管理</span></a>
                    </li>

                    <li>
                        <a href="/manualreturns"><span>手动返水</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <span>网站设置</span>
                <ul>
                    <li>
                        <a href="/marquee"><span>滚动文字</span></a>
                    </li>
                    <li>
                        <a href="/news"><span>优惠新闻</span></a>
                    </li>
                    <li>
                        <a href="/admin"><span>手机版提醒</span></a>
                    </li>
                    <li>
                        <a href="/admin"><span>线路</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div data-options="region:'center',border:false">
    <div id="tabXG" class="easyui-tabs" data-options="fit:true,tools:'#tabTools'">
    </div>
</div>
<div id="footer" data-options="region:'south',split:true" style="height: 25px">
    <span>技术支持:腾兴车联</span>
</div>
<div id="tabTools">
    <a id="btnMaxRestore" href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-max',plain:true">全屏</a>
</div>
<div id="win">
</div>
<div id="dd">
</div>
<script type="text/javascript" src="/js/all.js"></script>
<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/js/easyui.gq.js"></script>
<script type="text/javascript" src="/js/easyui.package.js"></script>
<script type="text/javascript" defer="defer">
    $(function () {
        $('#tabXG').tabs('add', {
            title: '概况',
            content: $.createFrame('/phpinfo')
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
        GQ.OpenWindow("win", { title: "修改密码", href: "/Home/EditPwd", width: 350, height: 230, modal: true, callback: function () { } });
    }

    function Logout() {
        this.location.href = "/logout";
    }
</script>
</body>
</html>
