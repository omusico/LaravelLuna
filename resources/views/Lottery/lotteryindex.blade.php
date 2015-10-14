@extends('master')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/k3_betting.css') }}">
@stop
@section('content')

    <div class="container">
        <div class="banner_content">
            <div class="kj_info_box">

                <div class="k_top">
                    <div class="kj_info_l">
                        <div class="cz_name">
                            <h1>
                                {{$czName}}
                            </h1>
                        </div>
                        <div class="cz_ico">
                            <span class="other ks78"></span>
                        </div>
                        <div class="cz_info">
                            <span class="jieshao">10分钟一期，返奖率75%</span> <span class="jieshao">销售时间：
                                {{$config ['beginTime'] . '-' . $config ['endTime']}}
					</span>
                        </div>
                    </div>
                    <div class="kj_info_c">
                        <div class="djs_01">
                            距<span class="c_red" id="theCur">...</span>期投注截止还有：
                        </div>
                        <div class="djs_02">
                            <div class="djs_time" id="countDownTime">00:00</div>
                            <div class="djs_jz">
                                已截止<span class="c_red" id="curperiod">...</span>期，还有<span
                                        class="c_red" id="remainperiod">...</span>期。
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="proName"/> <input type="hidden"
                                                               id="getOdds"/>

                    <div class="kj_info_r">
                        <div class="kj_hao" id="kjjxz">
                            <div class="kj_qs" id="kjz">
                                第<span class="c_red" id="prevWin">...</span>期开奖号码:
                            </div>
                            <div class="kj_nub" id="awerdNum_balls">
                                <span class="hm_6"></span>&nbsp;&nbsp;<span class="hm_6"></span>&nbsp;&nbsp;<span
                                        class="hm_6"></span>&nbsp;&nbsp;
                            </div>
                            <div style="display: none;" id="kjzimg" class="kj_nub">
                                <img src=" " alt="开奖中" height="63" width="259"/>
                            </div>
                            <div class="hz_xt" id="kjxthz" style="">
                                和值：<span id="lottery_hz">...</span> 型态：<span class="da_ico">...</span>&nbsp;&nbsp;<span
                                        class="dan_ico">...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <main class="col-md-7">
                    <ul class="nav nav-tabs" role="tablist" id="myTab"> 
                        <li class="active"><a href="#HZ" role="tab" data-toggle="tab">和值</a></li>
                         
                        <li><a href="#3THTX" role="tab" data-toggle="tab">三同号通选</a></li>
                         
                        <li><a href="#3THDX" role="tab" data-toggle="tab">三同号单选</a></li>
                         
                        <li><a href="#3BTH" role="tab" data-toggle="tab">三不同号</a></li>
                         
                        <li><a href="#3LHTX" role="tab" data-toggle="tab">三连号通选</a></li>
                         
                        <li><a href="#2THFX" role="tab" data-toggle="tab">二同号复选</a></li>
                         
                        <li><a href="#2THDX" role="tab" data-toggle="tab">二同号单选</a></li>

                        <li><a href="#2BTH" role="tab" data-toggle="tab">二不同号</a></li>
                         
                    </ul>
                      
                    <div class="tab-content"> 
                        <div class="tab-pane active" id="HZ">  <p>慕课网是一家从事互联网免费教学的网络教育公司。秉承"开拓、创新、公平、分享"的精神， 
                                将互联网特性全面的应用在教育领域，致力于为教育机构及求学者打造一站式互动在线教育品牌。</p> 
                        </div>
                         
                        <div class="tab-pane" id="3THTX">  <p>慕课网是做什么的？<br>  互联网技能教育，免费的哦</p> </div>
                         
                        <div class="tab-pane" id="3THDX">  <p>慕课网都有哪些讲师？课程质量高吗？<br>  学了就知道，我们不爱吹，低调是最牛逼的炫耀</p> </div>
                         
                        <div class="tab-pane" id="3BTH">  <p>我在慕课网学习能得到什么？<br>  屌丝逆袭不是传说,但关键是你学不学</p> </div>
                         
                    </div>
                    <div style="display:block">
                        <div>
                            <div class="blank10"></div>
                        </div>
                        <div class="blank10"></div>
                        <div class="select_list_box">
                            <div class="selected_list">
                                <dl class="select_list">
                                    <dd>选项[最多200项]</dd>
                                </dl>
                                <ul class="has_add_ball" id="has_add_ball">
                                </ul>
                            </div>
                        </div>
                        <div class="select_line" style="display: none">
                            <div class="diyBox" style="display: none;">
                                <span>倍投：</span> <span class="more_tool"><i class="minus"
                                                                            id="curAmountSub">-</i> <input value="1" id="curAmount"
                                                                                                           class="input1"
                                                                                                           onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                                                                           onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                                                                                           maxlength="8" type="text" /> <i id="curAmountAdd"
                                                                                                                                           class="add">+</i> </span>元 <span style="display: none;">倍(最多999倍)共<e
                                            class="c_727171"> <strong class="c_ba2636">0</strong>注 <strong
                                                class="c_ba2636">0</strong>元</e>
														</span>
                            </div>
                        </div>
                        <div class="step_box step_buy" style="display: block">
                            <div class="step_main">
                                <div class="step_main_in">
                                    <div class="mode">
                                        购买方式： <input name="buyType" type="radio" value='daigou'
                                                     checked="checked" id='daigou' /><label>代购</label> <input
                                                name="buyType" type="radio" value='zhuihao'
                                                id='buyTypeZh' /><label>追号</label>
                                        <label class="c_red">(追号需谨慎，注意看中奖次数)</label>
                                    </div>
                                    <div class="expand" style="display: none;">
                                        <!--追号开始-->
                                        <div style="display: inline-block;" class="zhuihao"
                                             id="chaseSelect">
                                            <div class="zhuiTop">
                                                <label> <input id="chaseStopCondition" value="0" checked="checked"
                                                               type="checkbox" /></label> <span
                                                        id="continueChaseSpan" style="display: none;"> <label
                                                            for="chaseStopCondition"> 中奖后停止追号</label></span> <span
                                                        id="Span2"> <label for="chaseStopCondition"> 中奖</label>
																			<select id="bingoPrize" name="bingoPrize">
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                            </select> <label>次停止追号。</label></span><label> 选择所追期数：</label><select
                                                        id="chaseCountSelect" name="chaseCountSelect">
                                                    <option value="5">==追5期==</option>
                                                    <option value="10">==追10期==</option>
                                                    <option value="15">==追15期==</option>
                                                    <option value="20">==追20期==</option>
                                                    <option value="25">==追25期==</option>
                                                    <option value="30">==追30期==</option>
                                                    <option value="35">==追35期==</option>
                                                    <option value="40">==追40期==</option>
                                                    <option value="45">==追45期==</option>
                                                    <option value="50">==追50期==</option>
                                                </select> <label for="allSelect"> <input
                                                            checked="checked" id="allSelect" value="全选"
                                                            type="checkbox" />全选
                                                </label>
                                            </div>
                                            <div id="chaseTermSubShow" class="chaseNum">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <td width="50">序号</td>
                                                        <td width="150">期数</td>
                                                        <td width="120">类型</td>
                                                        <td width="65">投注金额</td>
                                                        <td width="120">累计金额(元)</td>
                                                        <td width="120">盈利(元)</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="zhuihaoBody">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--追号结束-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="paybox clear">
                            <input id="playType" value="HZ" type="hidden" /> <input
                                    id="gameName" value="和值" type="hidden" /> <input
                                    id="totalVals" value="0" type="hidden" /><a href="#"
                                                                                class="submit_btn" onclick="CP.submit();return false;">立即投注</a>
                        </div>
                    </div>
                </main>
                <aside class="col-md-5">
                    <div class="login_weizhi">
                    </div>
                    <div class="blank4"></div>
                    <div class="kj_open_box">
                        <div class="r_middle">
                            <div class="kjgg_box">
                                <div class="kjgg_tit">
                                    <div class="kjgg_name">
                                        <h3></h3>
                                    </div>
                                    <div class="kjgg_more">
                                        <a target="_top"></a>

                                    </div>
                                </div>
                                <div class="kjgg_con">
                                    <table id="drawedIssueTable">
                                        <thead>
                                        <tr>
                                            <td width="120">期数</td>
                                            <td width="120">奖号</td>
                                            <td width="80">和值</td>
                                            <td width="80">形态</td>
                                        </tr>
                                        </thead>
                                        <tbody id="awardNumBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            {{--<div class="period">--}}

                {{--<div class="period-l">--}}
                    {{--<!--彩种nav开始-->--}}
                    {{--<div class="period-nav">--}}

                        {{--<div class="kj_middle_box">--}}

                            {{--<div class="k_middle">--}}
                                {{--<div class="right_top">--}}
                                    {{--<div class="TabTitle1">--}}
                                        {{--<a name="lottery"></a>--}}
                                        {{--<ul class="nav nav-tabs" role="tablist" id="myTab"> --}}
                                            {{--<li class="active"><a href="#home" role="tab" data-toggle="tab">和值</a></li>--}}
                                            {{-- --}}
                                            {{--<li><a href="#profile" role="tab" data-toggle="tab">三同号通选</a></li>--}}
                                            {{-- --}}
                                            {{--<li><a href="#messages" role="tab" data-toggle="tab">三同号单选</a></li>--}}
                                            {{-- --}}
                                            {{--<li><a href="#settings" role="tab" data-toggle="tab">三不同号</a></li>--}}
                                            {{-- --}}
                                            {{--<li><a href="#settings" role="tab" data-toggle="tab">三连号通选</a></li>--}}
                                            {{-- --}}
                                            {{--<li><a href="#settings" role="tab" data-toggle="tab">二同号复选</a></li>--}}
                                            {{-- --}}
                                            {{--<li><a href="#settings" role="tab" data-toggle="tab">二同号单选</a></li>--}}
                                            {{-- --}}
                                        {{--</ul>--}}
                                        {{--  --}}
                                        {{--<div class="tab-content"> --}}
                                        {{--<div class="tab-pane active" id="home">  <p>--}}
                                        {{--慕课网是一家从事互联网免费教学的网络教育公司。秉承"开拓、创新、公平、分享"的精神， --}}
                                        {{--将互联网特性全面的应用在教育领域，致力于为教育机构及求学者打造一站式互动在线教育品牌。</p> --}}
                                        {{--</div>--}}
                                        {{-- --}}
                                        {{--<div class="tab-pane" id="profile">  <p>慕课网是做什么的？<br>  互联网技能教育，免费的哦</p> --}}
                                        {{--</div>--}}
                                        {{-- --}}
                                        {{--<div class="tab-pane" id="messages">  <p>慕课网都有哪些讲师？课程质量高吗？<br> --}}
                                        {{--学了就知道，我们不爱吹，低调是最牛逼的炫耀</p> --}}
                                        {{--</div>--}}
                                        {{-- --}}
                                        {{--<div class="tab-pane" id="settings">  <p>我在慕课网学习能得到什么？<br> --}}
                                        {{--屌丝逆袭不是传说,但关键是你学不学</p> --}}
                                        {{--</div>--}}
                                        {{-- --}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="kj_bottom_box">--}}
                            {{--<div class="k_bottom">--}}
                                {{--<div class="right_middle">--}}
                                    {{--<div class="TabContent" id="TabContent">--}}
                                        {{--<div id="myTab2_Content0">--}}
                                            {{--<div class="nTab">--}}
                                                {{--<div class="TabContent1">--}}
                                                    {{--//todo--}}
                                                    {{--<div style="display:block">--}}
                                                        {{--<div>--}}
                                                            {{--<div class="blank10"></div>--}}

                                                        {{--</div>--}}
                                                        {{--<div class="blank10"></div>--}}
                                                        {{--<div class="select_list_box">--}}
                                                            {{--<div class="selected_list">--}}
                                                                {{--<dl class="select_list">--}}
                                                                    {{--<dd>选项[最多200项]</dd>--}}
                                                                {{--</dl>--}}
                                                                {{--<ul class="has_add_ball" id="has_add_ball">--}}
                                                                {{--</ul>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="select_line" style="display: none">--}}
                                                            {{--<div class="diyBox" style="display: none;">--}}
                                                                {{--<span>倍投：</span> <span class="more_tool"><i--}}
                                                                            {{--class="minus"--}}
                                                                            {{--id="curAmountSub">-</i> <input--}}
                                                                            {{--value="1" id="curAmount"--}}
                                                                            {{--class="input1"--}}
                                                                            {{--onkeyup="this.value=this.value.replace(/\D/g,'')"--}}
                                                                            {{--onafterpaste="this.value=this.value.replace(/\D/g,'')"--}}
                                                                            {{--maxlength="8" type="text"/> <i--}}
                                                                            {{--id="curAmountAdd"--}}
                                                                            {{--class="add">+</i> </span>元 <span--}}
                                                                        {{--style="display: none;">倍(最多999倍)共<e--}}
                                                                            {{--class="c_727171"><strong--}}
                                                                                {{--class="c_ba2636">0</strong>注--}}
                                                                        {{--<strong--}}
                                                                                {{--class="c_ba2636">0</strong>元--}}
                                                                    {{--</e>--}}
														{{--</span>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="step_box step_buy" style="display: block">--}}
                                                            {{--<div class="step_main">--}}
                                                                {{--<div class="step_main_in">--}}
                                                                    {{--<div class="mode">--}}
                                                                        {{--购买方式： <input name="buyType" type="radio"--}}
                                                                                     {{--value='daigou'--}}
                                                                                     {{--checked="checked"--}}
                                                                                     {{--id='daigou'/><label>代购</label>--}}
                                                                        {{--<input--}}
                                                                                {{--name="buyType" type="radio"--}}
                                                                                {{--value='zhuihao'--}}
                                                                                {{--id='buyTypeZh'/><label>追号</label>--}}
                                                                        {{--<label class="c_red">(追号需谨慎，注意看中奖次数)</label>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="expand" style="display: none;">--}}
                                                                        {{--<!--追号开始-->--}}
                                                                        {{--<div style="display: inline-block;"--}}
                                                                             {{--class="zhuihao"--}}
                                                                             {{--id="chaseSelect">--}}
                                                                            {{--<div class="zhuiTop">--}}
                                                                                {{--<label> <input id="chaseStopCondition"--}}
                                                                                               {{--value="0"--}}
                                                                                               {{--checked="checked"--}}
                                                                                               {{--type="checkbox"/></label> <span--}}
                                                                                        {{--id="continueChaseSpan"--}}
                                                                                        {{--style="display: none;"> <label--}}
                                                                                            {{--for="chaseStopCondition">--}}
                                                                                        {{--中奖后停止追号</label></span> <span--}}
                                                                                        {{--id="Span2"> <label--}}
                                                                                            {{--for="chaseStopCondition">--}}
                                                                                        {{--中奖</label>--}}
																			{{--<select id="bingoPrize" name="bingoPrize">--}}
                                                                                {{--<option value="1">1</option>--}}
                                                                                {{--<option value="2">2</option>--}}
                                                                                {{--<option value="3">3</option>--}}
                                                                                {{--<option value="4">4</option>--}}
                                                                                {{--<option value="5">5</option>--}}
                                                                            {{--</select> <label>次停止追号。</label></span><label>--}}
                                                                                    {{--选择所追期数：</label><select--}}
                                                                                        {{--id="chaseCountSelect"--}}
                                                                                        {{--name="chaseCountSelect">--}}
                                                                                    {{--<option value="5">==追5期==</option>--}}
                                                                                    {{--<option value="10">==追10期==</option>--}}
                                                                                    {{--<option value="15">==追15期==</option>--}}
                                                                                    {{--<option value="20">==追20期==</option>--}}
                                                                                    {{--<option value="25">==追25期==</option>--}}
                                                                                    {{--<option value="30">==追30期==</option>--}}
                                                                                    {{--<option value="35">==追35期==</option>--}}
                                                                                    {{--<option value="40">==追40期==</option>--}}
                                                                                    {{--<option value="45">==追45期==</option>--}}
                                                                                    {{--<option value="50">==追50期==</option>--}}
                                                                                {{--</select> <label for="allSelect"> <input--}}
                                                                                            {{--checked="checked"--}}
                                                                                            {{--id="allSelect"--}}
                                                                                            {{--value="全选"--}}
                                                                                            {{--type="checkbox"/>全选--}}
                                                                                {{--</label>--}}
                                                                            {{--</div>--}}
                                                                            {{--<div id="chaseTermSubShow" class="chaseNum">--}}
                                                                                {{--<table>--}}
                                                                                    {{--<thead>--}}
                                                                                    {{--<tr>--}}
                                                                                        {{--<td width="50">序号</td>--}}
                                                                                        {{--<td width="150">期数</td>--}}
                                                                                        {{--<td width="120">类型</td>--}}
                                                                                        {{--<td width="65">投注金额</td>--}}
                                                                                        {{--<td width="120">累计金额(元)</td>--}}
                                                                                        {{--<td width="120">盈利(元)</td>--}}
                                                                                    {{--</tr>--}}
                                                                                    {{--</thead>--}}
                                                                                    {{--<tbody id="zhuihaoBody">--}}
                                                                                    {{--</tbody>--}}
                                                                                {{--</table>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--<!--追号结束-->--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}

                                                        {{--<div class="paybox clear">--}}
                                                            {{--<input id="playType" value="HZ" type="hidden"/> <input--}}
                                                                    {{--id="gameName" value="和值" type="hidden"/> <input--}}
                                                                    {{--id="totalVals" value="0" type="hidden"/><a href="#"--}}
                                                                                                               {{--class="submit_btn"--}}
                                                                                                               {{--onclick="CP.submit();return false;">立即投注</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="period-r">--}}
                    {{--<div class="login_weizhi">--}}
                    {{--</div>--}}
                    {{--<div class="blank4"></div>--}}
                    {{--<div class="kj_open_box">--}}
                        {{--<div class="r_middle">--}}
                            {{--<div class="kjgg_box">--}}
                                {{--<div class="kjgg_tit">--}}
                                    {{--<div class="kjgg_name">--}}
                                        {{--<h3></h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="kjgg_more">--}}
                                        {{--<a target="_top"></a>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="kjgg_con">--}}
                                    {{--<table id="drawedIssueTable">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<td width="120">期数</td>--}}
                                            {{--<td width="120">奖号</td>--}}
                                            {{--<td width="80">和值</td>--}}
                                            {{--<td width="80">形态</td>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody id="awardNumBody">--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="clear"></div>--}}
            {{--</div>--}}
        </div>
    </div>
@stop
