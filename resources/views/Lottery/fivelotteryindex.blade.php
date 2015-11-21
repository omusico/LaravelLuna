@extends('Layout.fivemaster')
@section('title')
    11x5娱乐平台-{{$czName}}
@stop
@section('css')
        {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/betting.css') }}">--}}
    <script type="text/javascript">
        var lottery_type = '{{$config['lotterytype']}}';
        var num ={{$lotterystatus[$config['lotterytype']]['num']}};
    </script>
@stop
@section('content')
    <div class="container">
        <div class="banner_content">
            <div class="zgk3_info_box">

                <div class=" zgk3_top container">
                    <div class="zgk3_info_l col-md-4">
                        <div class="zgk3_name">
                            <h1>
                                {{$czName}}
                            </h1>
                        </div>
                        <div class="zgk3_ico">
                        </div>
                        <div class="zgk3_info">
                            <span class="yaoshao">10分钟一期,返奖率80%</span> <span class="yaoshao">销售时间：
                                {{$config ['beginTime'] . '-' . $config ['endTime']}}
                            </span>
                        </div>
                    </div>
                    <div class="zgk3_info_c col-md-4">
                        <div class="zgk3_ju">
                            距<span class="c_red" id="theCur">本期</span>期投注截止还有：
                        </div>
                        <div class="zgk3_li">
                            <div class="zgk3_jusecond" id="countDownTime">00:00</div>
                            <div class="zgk3_jz">
                                已截止<span class="c_red" id="curperiod">...</span>期，还有<span
                                        class="c_red" id="remainperiod">...</span>期。
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="proName"/> <input type="hidden"
                                                               id="getOdds"/>

                    <div class="zgk3_info_r col-md-4">
                        <div style="" class="zgk3_hao" id="kjjxz">
                            <div class="zgk3_qs" id="kjz">
                                第<span class="c_red" id="prevWin">上一期</span>期开奖号码:
                            </div>
                            <div class="five_nub" id="awerdNum_balls">
                                <em class=" awardBall1">01</em>&nbsp;<em class="awardBall1">02</em>&nbsp;<em
                                        class="awardBall1">03</em>&nbsp;<em class="awardBall1">04</em>&nbsp;<em
                                        class="awardBall1">05</em>
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
                <main class="col-md-8" style="border-right: 1px solid rgb(218, 218, 218)">
                    <ul class="nav nav-tabs" role="tablist" id="myTab"> 
                        <?php $i = 1; ?>
                        @foreach($lotterytypes as $key =>$value)
                            @if($i==1)
                                <li class="active"><a href="#{{$value['slug']}}" role="tab"
                                                      data-toggle="tab">{{$value['name']}}</a></li>
                            @else
                                <li><a href="#{{$value['slug']}}" role="tab" data-toggle="tab">{{$value['name']}}</a>
                                </li>
                            @endif
                            <?php $i += 1; ?>
                        @endforeach
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="HZ">
                            <input type="hidden" id="HZ_chipin_l"
                                   value="{{$chipins['HZ']['low']}} "/>

                            <input type="hidden" id="HZ_chipin_h"
                                   value="{{$chipins['HZ']['hight']}}"/>

                            <input type="hidden" id="HZ_other_chipin_l"
                                   value="{{$chipins['HZ']['other_low']}}"/>

                            <input type="hidden" id="HZ_other_chipin_h"
                                   value="{{$chipins['HZ']['other_hight']}}"/>

                            <div class="content0 all_box" id="box_ball_HZ">
                                <p>投注说明：至少选择1个和值投注，选号与开奖的五个号码相加的数值一致即中奖。</p>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：15</a></li>
                                                <li><a>开奖：01,02,03,04,05</a></li>
                                                <li><a>中奖：赔率350</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num2" id="box_ball_HZ_num">
                                    <ul>
                                        @foreach($fiveOdds['HZ'] as $key => $value)
                                            @if(is_numeric($key))
                                                <li class="OneNum">
                                                    <div class="num" id="box_ball_HZ_{{$key}} ">
                                                        {{$key}}
                                                    </div>

                                                    <div>
                                                        赔率:<span
                                                                id="HZ_getodds_{{$key}}">{{$value}}</span>
                                                    </div>
                                                </li>

                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_num1">
                                    <ul>
                                        <li class="OneNum" id="box_ball_HZ_a">单</li>
                                        <li class="OneNum" id="box_ball_HZ_b">双</li>
                                        <li class="OneNum" id="box_ball_HZ_c">小</li>
                                        <li class="OneNum" id="box_ball_HZ_d">大</li>
                                    </ul>
                                </div>
                                <div class="select_txt1" style="width: 425px">
                                    <ul>
                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_46">{{(float)($fiveOdds['HZ']['dan'])}}</span>
                                        </li>

                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_47">{{(float)($fiveOdds['HZ']['shuang'])}}</span>
                                        </li>

                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_48">{{(float)($fiveOdds['HZ']['xiao'])}}</span>
                                        </li>

                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_49">{{(float)($fiveOdds['HZ']['da'])}}</span>
                                        </li>

                                    </ul>

                                </div>
                                <div class="blank10"></div>
                                <div class="user_content">
                                    <div class="w700">
                                        <div class="kj_tab">
                                            <div class="kj_szc">
                                                <div class="hmList">
                                                    <ul class="hm-con">
                                                        <li class="kj-w110 kongge"></li>
                                                        <li class="kj-w110 open_Ball">第一位</li>
                                                        <li class="kj-w110 open_Ball">第二位</li>
                                                        <li class="kj-w110 open_Ball">第三位</li>
                                                        <li class="kj-w110 open_Ball">第四位</li>
                                                        <li class="kj-w110 open_Ball">第五位</li>
                                                    </ul>
                                                    <ul class="hm-con" id="box_ball_HZ_single">
                                                        <span id="box_ball_HZ_single_odds"
                                                              style="display: none;"> {{(float)($fiveOdds['HZ']['qdan'])}}</span>
                                                        <li class="kj-w110 kongge">
                                                            <span>赔率：{{(float)($fiveOdds['HZ']['qdan'])}}</span>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_single1">单</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_single2">单</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_single3">单</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_single4">单</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_single5">单</div>
                                                        </li>
                                                    </ul>

                                                    <ul class="hm-con" id="box_ball_HZ_double">
                                                        <span id="box_ball_HZ_double_odds"
                                                              style="display: none;"> {{(float)($fiveOdds['HZ']['qshuang'])}}</span>
                                                        <li class="kj-w110 kongge">
                                                            赔率：{{(float)($fiveOdds['HZ']['qshuang'])}}</li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_double1">双</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_double2">双</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_double3">双</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_double4">双</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_double5">双</div>
                                                        </li>
                                                    </ul>
                                                    <ul class="hm-con" id="box_ball_HZ_big">
                                                        <span id="box_ball_HZ_big_odds"
                                                              style="display: none;"> {{(float)($fiveOdds['HZ']['qda'])}}</span>
                                                        <li class="kj-w110 kongge">
                                                            赔率：{{(float)($fiveOdds['HZ']['qda'])}}</li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_big1">大</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_big2">大</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_big3">大</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_big4">大</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_big5">大</div>
                                                        </li>
                                                    </ul>
                                                    <ul class="hm-con" id="box_ball_HZ_small">
                                                        <span id="box_ball_HZ_small_odds"
                                                              style="display: none;"> {{(float)($fiveOdds['HZ']['qxiao'])}}</span>
                                                        <li class="kj-w110 kongge">
                                                            赔率：{{(float)($fiveOdds['HZ']['qxiao'])}}</li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_small1">小</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_small2">小</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_small3">小</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_small4">小</div>
                                                        </li>
                                                        <li class="kj-w110">
                                                            <div class="OneNum" id="box_ball_HZ_small5">小</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div style="display:block">
                        <div class="blank10"></div>
                        <div class="choose_list_box">
                            <div class="chose_list">
                                <dl class="choose_list">
                                    <dd>项[最多200项]</dd>
                                </dl>
                                <ul class="has_add_ball" id="has_add_ball">
                                </ul>
                            </div>
                        </div>
                        <div class="select_line" style="display: none">
                            <div class="diyBox" style="display: none;">
                                <span>倍投：</span> <span class="more_tool"><i class="minus"
                                                                            id="curAmountSub">-</i> <input
                                            value="1" id="curAmount"
                                            class="input1"
                                            onkeyup="this.value=this.value.replace(/\D/g,'')"
                                            onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                            maxlength="8" type="text"/> <i id="curAmountAdd"
                                                                           class="add">+</i> </span>元 <span
                                        style="display: none;">倍(最多999倍)共<e
                                            class="c_727171"><strong class="c_ba2636">0</strong>注
                                        <strong
                                                class="c_ba2636">0</strong>元
                                    </e>
														</span>
                            </div>
                        </div>

                        <div class="step_box step_buy">
                            <div class="step_main">
                                <div class="step_main_in">
                                    <div class="mode">
                                        购买方式： <input name="buyType" type="radio" value='daigou'
                                                     checked="checked" id='daigou'/><label>代购</label> <input
                                                name="buyType" type="radio" value='zhuihao'
                                                id='buyTypeZh'/><label>追号</label>
                                    </div>
                                    <div class="expand" style="display: none;">
                                        <!--追号开始-->
                                        <div style="display: inline-block;" class="zhuihao"
                                             id="chaseSelect">
                                            <div class="zhuiTop">
                                                <label> <input id="chaseStopCondition" value="0"
                                                               type="checkbox"/></label> <span
                                                        id="continueChaseSpan" style="display: none;"> <label
                                                            for="chaseStopCondition"> 中奖后停止追号</label></span> <span
                                                        id="Span2"> <label for="chaseStopCondition"> 中奖</label>
																			<select id="bingoPrize" name="bingoPrize">
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                            </select> <label>次停止追号。</label></span><label>
                                                    选择所追期数：</label><select
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
                                                            type="checkbox"/>全选
                                                </label>
                                            </div>
                                            <div style="padding: 10px 0px;"></div>
                                            <div id="chaseTermSubShow">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <td width="50px">序号</td>
                                                        <td width="175px">期数</td>
                                                        <td width="65px">类型</td>
                                                        <td width="125px">投注金额</td>
                                                        <td width="125px">累计金额(元)</td>
                                                        <td width="125px">盈利(元)</td>
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

                        <div class="donecommit clear">
                            <input id="playType" value="HZ" type="hidden"/> <input
                                    id="gameName" value="和值" type="hidden"/> <input
                                    id="totalVals" value="0" type="hidden"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a class="btn-lg btn-danger" href="#" onclick="Five.submit();return false">投注</a>
                            {{--<a href="#"--}}
                                                                                {{--class="submit_btn"--}}
                                                                                {{--onclick="Five.submit(); return false;">立即投注</a>--}}
                        </div>
                    </div>
                </main>
                <aside class="col-md-4">
                    <div class="login_weizhi">
                        @include('userinfo')
                    </div>
                    {{--<div class="blank4"></div>--}}
                    <div class="zgk3_open_box">
                        <div class="r_middle">
                            <div class="kjgg_box">
                                <div class="kjgg_tit">
                                    <div class="kjgg_name">
                                        <h3>{{$czName}}开奖公告</h3>
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


            <div class="clear"></div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/fivebetting.js"></script>
    <script type="text/javascript">
        $(function () {
            setOutTime();
            setTimeout("loadRecent()", 2500);
        });

    </script>
@stop
