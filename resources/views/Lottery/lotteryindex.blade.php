@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    {{$czName}}
@stop
@section('css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('/css/betting.css') }}">--}}
    <script type="text/javascript">
        var lottery_type = '{{$config['lotterytype']}}';
        var num ={{$lotterystatus[$config['lotterytype']]['num']}};
    </script>
    <style type="text/css">
        .all_box ul {
            padding: 0px;
        }
    </style>
@stop
@section('content')
    <div class="container" style="min-width:450px">
        <div class="banner_content">
            <div class="zgk3_info_box">
                <div class="zgk3_top container">
                    <div class="zgk3_info_l col-md-4">
                        <div class="zgk3_name">
                            <h1>
                                {{$czName}}
                            </h1>
                        </div>
                        <div class="zgk3_ico">
                            <span class="k3logo zgk3_bezc"></span>
                        </div>
                        <div class="zgk3_info">
                            <span class="yaoshao">10分钟一期，返奖率75%</span> <span class="yaoshao">销售时间：
                                {{$config ['beginTime'] . '-' . $config ['endTime']}}
					</span>
                        </div>
                    </div>
                    <div class="zgk3_info_c col-md-4">
                        <div class="zgk3_ju">
                            距<span class="c_red" id="theCur">...</span>期投注截止还有：
                        </div>
                        <div class="zgk3_li">
                            <div class="zgk3_jusecond" id="countDownTime">00:00</div>
                            <div class="zgk3_jz">
                                已截止<span class="c_red" id="curperiod">...</span>期，还有<span
                                        class="c_red" id="remainperiod">...</span>期。
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="proName"/> <input type="hidden" id="getOdds"/>

                    <div class="zgk3_info_r col-md-4">
                        <div class="zgk3_hao" id="kjjxz">
                            <div class="zgk3_qs" id="kjz">
                                第<span class="c_red" id="prevWin">...</span>期开奖号码:
                            </div>
                            <div class="zgk3_nub" id="awerdNum_balls">
                                <span class="hm_6"></span>&nbsp;&nbsp;<span class="hm_6"></span>&nbsp;&nbsp;<span
                                        class="hm_6"></span>&nbsp;&nbsp;
                            </div>
                            <div style="display: none;" id="kjzimg" class="zgk3_nub">
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
            <div class="container" style="padding: 0px;">
                <main class="col-md-8" style="border-right: 1px solid rgb(218, 218, 218)">
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

                        {{--和值--}}
                        <div class="tab-pane active" id="HZ"> 
                            <input type="hidden" id="HZ_limit_min" value="{{$chipins['HZ']['low']}} "/>
                            <input type="hidden" id="HZ_chipin_h" value="{{$chipins['HZ']['hight']}}"/>
                            {{--                            <input type="hidden" id="HZ_k3logo_chipin_l" value="{{ $chipins['HZ']['k3logo_low'] }}"/>--}}
                            {{--                            <input type="hidden" id="HZ_k3logo_chipin_h" value="{{ $chipins['HZ']['k3logo_hight'] }}"/>--}}

                            <div class="content0 all_box" id="box_ball_HZ">
                                <p>投注说明：至少选择1个和值投注，选号与开奖的三个号码相加的数值一致即中奖。奖金
                                    {{min($k3Odds['HZ'])}}-{{max($k3Odds['HZ'])}}
                                    倍
                                </p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：3</a></li>
                                                <li><a>开奖：1,1,1</a></li>
                                                <li><a>中奖：赔率149</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num2" id="box_ball_HZ_num">
                                    <ul>
                                        @foreach($k3Odds['HZ'] as $key => $value)
                                            @if($key <=18)
                                                <li class="OneNum">
                                                    <div class="num"
                                                         id="box_ball_HZ_{{$key}}">{{$key}}</div>
                                                    <div>
                                                        赔率: <span
                                                                id="HZ_getodds_{{$key}}">{{$value}}</span>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_num1" id="box_ball_HZ_single">
                                    <ul>
                                        <li class="OneNum" id="box_ball_HZ_a">单</li>
                                        <li class="OneNum" id="box_ball_HZ_b">双</li>
                                        <li class="OneNum" id="box_ball_HZ_c">小</li>
                                        <li class="OneNum" id="box_ball_HZ_d">大</li>
                                    </ul>
                                </div>
                                <div class="select_txt1" style="width:450px" id="box_ball_HZ_single_odds">
                                    <ul>
                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_19">{{$k3Odds['HZ'][19]}}</span>
                                        </li>
                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_20">{{$k3Odds['HZ'][20]}}</span>
                                        </li>
                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_21">{{$k3Odds['HZ'][21]}}</span>
                                        </li>
                                        <li class="OneNum">赔率:<span
                                                    id="HZ_getodds_22">{{$k3Odds['HZ'][22]}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="3THTX"> 
                            <input type="hidden" id="3THTX_chipin_l" value="{{$chipins['3THTX']['low']}}"/>
                            <input type="hidden" id="3THTX_chipin_h" value="{{$chipins['3THTX']['hight']}}"/>

                            <div id="box_ball_3THTX" class="all_box">
                                <p>投注说明：10元购买6个三同号(111,222,333,444,555,666)投注，选号与开奖号码一致即中奖{{$k3Odds['3THTX']['value']}}
                                    倍。</p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：三同号通选</a></li>
                                                <li><a>开奖：3,3,3</a></li>
                                                <li><a>中奖：赔率31</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num" id="box_ball_3THTX_num">
                                    <ul>
                                        <li class="long_select_btn">选择</li>
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_txt hidden" id="box_ball_3THTX_odds">
                                    <ul>

                                        <li class="OneNum">赔率： <span id="3THTX_getodds">
                                               {{$k3Odds['3THTX']['value']}}
                                            </span></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="3THDX"> 
                            <input type="hidden" id="3THDX_chipin_l" value="{{$chipins['3THDX']['low']}}"/>
                            <input type="hidden" id="3THDX_chipin_h" value="{{$chipins['3THDX']['hight']}}"/>

                            <div class="all_box" id="box_ball_3THDX">
                                <p>投注说明：至少选择1个三同号投注，选号与开奖号码一致即中奖{{$k3Odds['3THDX']['value']}}倍。</p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：5,5,5</a></li>
                                                <li><a>开奖：5,5,5</a></li>
                                                <li><a>中奖：赔率149</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num" id="box_ball_3THDX_num">
                                    <ul>
                                        @foreach($k3Odds['3THDX'] as $key => $value)
                                            @if($key !='value')
                                                <li class="OneNum" id="box_ball_3THDX_{{$key}}">{{$key}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_txt hidden" id="box_ball_3THDX_odds">
                                    <ul>
                                        {{$i=1}}
                                        @foreach($k3Odds['3THDX'] as $key => $value)
                                            <li class="OneNum">
                                                赔率：<span
                                                @if($i ==1)
                                                    id="3THDX_getodds"
                                                        @endif >{{$value}}</span>
                                            </li>
                                            {{$i += 1}}
                                        @endforeach
                                        {{--@foreach($k3baoziodds[$lottery_type] as $key => $value)--}}
                                        {{--<li class="OneNum">--}}
                                        {{--赔率：<span id="3THDX_getodds{{str_replace(",","",$key)}}" >{{$value}}</span>--}}
                                        {{--</li>--}}
                                        {{--@endforeach--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="3BTH"> 
                            <input type="hidden" id="3BTH_chipin_l" value="{{$chipins['3BTH']['low']}}"/>
                            <input type="hidden" id="3BTH_chipin_h" value="{{$chipins['3BTH']['hight']}}"/>

                            <div class="all_box" id="box_ball_3BTH">
                                <p>投注说明：至少选择3个号码投注，选号与开奖号码一致即中奖{{$k3Odds['3BTH']['value']}}倍。</p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：5,4,6</a></li>
                                                <li><a>开奖：5,4,6</a></li>
                                                <li><a>中奖：赔率28</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num" id="box_ball_3BTH_num">
                                    <ul>
                                        @foreach($k3Odds['3BTH'] as $key=>$value)
                                            @if($key!='value')
                                                <li class="OneNum">{{$key}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_txt hidden" id="box_ball_3BTH_odds">
                                    <ul>
                                        {{$i = 1}}
                                        @foreach($k3Odds['3BTH'] as $key=>$value):?>
                                        <li class="OneNum">
                                            赔率：<span @if ($i == 1)  id="3BTH_getodds"
                                                    @endif
                                                    >{{$value}}</span>
                                        </li>
                                        {{$i += 1}}
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank20"></div>
                                <div class="select_info_text">
                                    <a href="javascript:void(0);" class="addbtn_disabled" id="ball_add_btn">添加到投注列表</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="3LHTX"> 
                            <input type="hidden" id="3LHTX_chipin_l" value="{{$chipins['3LHTX']['low']}}"/>
                            <input type="hidden" id="3LHTX_chipin_h" value="{{$chipins['3LHTX']['hight']}}"/>

                            <div class="all_box" id="box_ball_3LHTX">
                                <p>投注说明：10元购买4个三连号（123、234、345、456）投注，选号与开奖号码一致即中奖{{$k3Odds['3LHTX']['value']}}倍。</p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：三连号</a></li>
                                                <li><a>开奖：4,5,6</a></li>
                                                <li><a>中奖：赔率8</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num" id="box_ball_3LHTX_num">
                                    <ul>
                                        <li class="long_select_btn">选择</li>
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_txt hidden" id="box_ball_3LHTX_odds">
                                    <ul>

                                        <li class="OneNum">赔率：<span
                                                    id="3LHTX_getodds">{{$k3Odds['3LHTX']['value']}}</span></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2THFX">
                            <input type="hidden" id="2THFX_chipin_l" value="{{$chipins['2THFX']['low']}}"/>
                            <input type="hidden" id="2THFX_chipin_h" value="{{$chipins['2THFX']['hight']}}"/>

                            <div id="box_ball_2THFX" class="all_box">
                                <p>投注说明： 10元购买1个二同号(11*,22*,33*,44*,55*,66*)投注，选号与开奖号码一致即中奖{{$k3Odds['2THFX']['value']}}
                                    倍。</p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：5,5</a></li>
                                                <li><a>开奖：5,5,6</a></li>
                                                <li><a>中奖：赔率11</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num" id="box_ball_2THFX_num">
                                    <ul>
                                        @foreach($k3Odds['2THFX'] as $key=>$value)
                                            @if($key!='value')
                                                <li class="OneNum" id="box_ball_2THFX{{$key}}">{{$key}}*</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_txt hidden" id="box_ball_2THFX_odds">
                                    <ul>
                                        <li class="OneNum">赔率：<span
                                                    id="2THFX_getodds">{{$k3Odds['2THFX']['value']}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2THDX">
                            <input type="hidden" id="2THDX_chipin_l" value="{{$chipins['2THDX']['low']}}"/>
                            <input type="hidden" id="2THDX_chipin_h" value="{{$chipins['2THDX']['hight']}}"/>

                            <div id="box_ball_2THDX" class="all_box none">
                                <p>投注说明：选择1个相同号码和1个不同号码投注，选号与开奖号码一致即中奖{{$k3Odds['2THDX']['value']}}倍。</p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：5,5,6</a></li>
                                                <li><a>开奖：5,5,6</a></li>
                                                <li><a>中奖：赔率51</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num" id="box_ball_2THDX_num">
                                    <ul>
                                        @foreach($k3Odds['2THDX'] as $key=>$value)
                                            @if($key!='value')
                                                @if($key>6)
                                                    <li class="OneNum">{{$key}}</li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_num" id="box_ball_2THDX_single">
                                    <ul>
                                        @foreach($k3Odds['2THDX'] as $key=>$value)
                                            @if($key!='value')
                                                @if($key<=6)
                                                    <li class="OneNum">{{$key}}</li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_txt hidden" id="box_ball_2THDX_single_odds">
                                    <ul>
                                        <li class="OneNum">
                                            赔率：<span id="2THDX_getodds">{{$k3Odds['2THDX']['value']}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_info_text">
                                    <a href="javascript:void(0);" class="addbtn_disabled" id="ball_add_btn_2THDX">添加到投注列表</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2BTH">
                            <input type="hidden" id="2BTH_chipin_l" value="{{$chipins['2BTH']['low']}}"/>
                            <input type="hidden" id="2BTH_chipin_h" value="{{$chipins['2BTH']['hight']}}"/>

                            <div id="box_ball_2BTH" class="all_box none">
                                <p>投注说明：至少选择2个号码投注，选号与开奖号码一致即中奖{{$k3Odds['2BTH']['value']}}倍。</p>
                                <br/>
                                <br/>

                                <div class="menu">
                                    <ul class="menucon">
                                        <li>
                                            <a>实例说明：</a>
                                            <ul>
                                                <li><a>选号：2,3</a></li>
                                                <li><a>开奖：4,3,2</a></li>
                                                <li><a>中奖：赔率6</a></li>
                                                <li class="last"></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                                <div class="select_num" id="box_ball_2BTH_num">
                                    <ul>
                                        @foreach($k3Odds['2BTH'] as $key=>$value)
                                            @if($key!='value')
                                                <li class="OneNum">{{$key}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blank10"></div>
                                <div class="select_txt hidden">
                                    <ul>
                                        <li class="OneNum">赔率：<span
                                                    id="2BTH_getodds">{{$k3Odds['2BTH']['value']}}</span></li>
                                    </ul>
                                </div>
                                <div class="blank20"></div>
                                <div class="select_info_text">
                                    <a href="javascript:void(0);" class="addbtn_disabled"
                                       id="ball_add_btn_2BTH">添加到投注列表</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($ismaintance == 1)
                        <div style="margin-top:20px;display:block;background: url('{{asset('/css/maintaince.png')}}') no-repeat;height: 354px;">
                        </div>
                    @else
                        <div style="display:block">
                            <div>
                                <div class="blank10"></div>
                            </div>
                            <div class="blank10"></div>
                            <div class="choose_list_box">
                                <div class="chose_list">
                                    <dl class="choose_list">
                                        <dd>选项[最多200项]</dd>
                                    </dl>
                                    <ul class="has_add_ball" id="has_add_ball">
                                    </ul>
                                </div>
                            </div>
                            <div class="select_line" style="display: none">
                                <div class="diyBox" style="display: none;">
                                    <span>倍投：</span> <span class="more_tool"><i class="minus"
                                                                                id="curAmountSub">-</i> <input value="1"
                                                                                                               id="curAmount"
                                                                                                               class="input1"
                                                                                                               onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                                                                               onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                                                                                               maxlength="8"
                                                                                                               type="text"/> <i
                                                id="curAmountAdd"
                                                class="add">+</i> </span>元 <span style="display: none;">倍(最多999倍)共<e
                                                class="c_727171"><strong class="c_ba2636">0</strong>注 <strong
                                                    class="c_ba2636">0</strong>元
                                        </e>
														</span>
                                </div>
                            </div>
                            <div class="step_box step_buy" style="display: block">
                                <div class="step_main">
                                    <div class="step_main_in">
                                        <div class="mode">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                                    <label> <input id="chaseStopCondition" value="0" checked="checked"
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

                            <div class="donecommit clear">
                                <input id="playType" value="HZ" type="hidden"/> <input
                                        id="gameName" value="和值" type="hidden"/> <input
                                        id="totalVals" value="0" type="hidden"/>
                                <a class="btn-lg btn-danger" href="#" onclick="BET.submit();return false">投注</a>
                            </div>
                        </div>
                    @endif
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
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/betting.js"></script>
    <script type="text/javascript">
        $(function () {
            setOutTime();
            setTimeout("loadRecent()", 2500);
        });

    </script>
@stop
