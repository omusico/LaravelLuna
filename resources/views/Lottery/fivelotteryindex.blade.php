@extends('Layout.fivemaster')
@section('title')
    11x5娱乐平台-{{$czName}}
@stop
@section('css')
    <style type="text/css">
        .fiveNum{
            padding:5px;
        }
    </style>
    <script type="text/javascript">
        var lottery_type = '{{$config['lotterytype']}}';
        var num ={{$lotterystatus[$config['lotterytype']]['num']}};
    </script>
@stop
@section('content')
    <div class="container">
        {{--<div class="row">--}}
            {{--<div class="col-md-offset-1 col-md-10" style="background-color: #faf9f9;padding-left:0px">--}}
                <div class="zgk3_info_box">
                    <div class=" zgk3_top row">
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
                                <div class="zgk3_nub" id="awerdNum_balls">
                                    <em class=" awardBall1">01</em>&nbsp;<em class="awardBall1">02</em>&nbsp;<em
                                            class="awardBall1">03</em>&nbsp;<em class="awardBall1">04</em>&nbsp;<em
                                            class="awardBall1">05</em>
                                </div>
                                <div style="display: none;" id="kjzimg" class="kj_nub">
                                    <img src=" " alt="开奖中" height="63" width="259"/>
                                </div>
                                <div class="hz_xt" id="kjxthz" style="">
                                    和值：<span id="lottery_hz">...</span> 型态：<span
                                            class="da_ico">...</span>&nbsp;&nbsp;<span
                                            class="dan_ico">...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-8" style="border-right: 1px solid rgb(218, 218, 218)">
                        <ul class="nav nav-tabs" role="tablist" id="myTab"> 
                            <?php $i = 1; ?>
                            @foreach($lotterytypes as $key =>$value)
                                @if($i==1)
                                    <li class="active"><a href="#{{$value['slug']}}" role="tab"
                                                          data-toggle="tab">{{$value['name']}}</a></li>
                                @else
                                    <li><a href="#{{$value['slug']}}" role="tab"
                                           data-toggle="tab">{{$value['name']}}</a>
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

                                    <br>
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
                                    <br>
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
                                    <div class="user_content mobilhide">
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
                            <div class="tab-pane" id="RX1">

                                <input type="hidden" id="RX1_chipin_l"
                                       value="{{$chipins['RX1']['low']}}"/>

                                <input type="hidden" id="RX1_chipin_h"
                                       value="{{$chipins['RX1']['hight']}}"/>

                                <div id="box_ball_RX1" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选1个或多个号码，所选号码与开奖号码任意一个号码相同即中奖.赔率 {{$fiveOdds['RX1']['value']}}</p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：02</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率1.88</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <div class="redBallBox" id="box_ball_RX1_num">

                                        <ul>

                                            @foreach($fiveOdds['RX1'] as $key => $value)
                                                @if(is_numeric($key))
                                                    <li class="OneNum"
                                                        id="box_ball_RX1_{{$key}} ">{{$key}}</li>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </div>
                                    <div class="blank20"></div>

                                    <div class="select_txt none">
                                        <ul>
                                            <?php $i = 1;?>
                                            @foreach($fiveOdds['RX1'] as $key => $value)
                                                @if(is_numeric($key))

                                                    <li class="OneNum"><span
                                                        <?php if ($i == 1) echo ' id="RX1_getodds"';?>><?php echo $value;?></span>
                                                    </li>

                                                    <?php $i += 1;?>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="RX2">
                                <input type="hidden" id="RX2_chipin_l"
                                       value="{{$chipins['RX2']['low']}}"/>

                                <input type="hidden" id="RX2_chipin_h"
                                       value="{{$chipins['RX2']['hight']}}"/>

                                <div id="box_ball_RX2" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选2个或多个号码，所选号码与开奖号码任意两个号码相同即中奖.赔率{{$fiveOdds['RX2']['value']}}</p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,05</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率4</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_RX2_num">

                                        <ul>

                                            @foreach($fiveOdds['RX2'] as $key => $value)
                                                @if(is_numeric($key))
                                                    <li class="OneNum">{{$key}}</li>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['RX2'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="RX2_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_RX2">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="RX3">
                                <input type="hidden" id="RX3_chipin_l"
                                       value="<?php echo $chipins['RX3']['low']?>"/>

                                <input type="hidden" id="RX3_chipin_h"
                                       value="<?php echo $chipins['RX3']['hight']?>"/>

                                <div id="box_ball_RX3" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选3个或多个号码，所选号码与开奖号码任意三个号码相同即中奖.赔率 <?php echo $fiveOdds['RX3']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,04,03</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率11</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_RX3_num">

                                        <ul>

                                            <?php foreach($fiveOdds['RX3'] as $key=>$value):?>

                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>

                                            @endif
                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['RX3'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="RX3_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_RX3">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="RX4">
                                <input type="hidden" id="RX4_chipin_l"
                                       value="<?php echo $chipins['RX4']['low']?>"/>

                                <input type="hidden" id="RX4_chipin_h"
                                       value="<?php echo $chipins['RX4']['hight']?>"/>

                                <div id="box_ball_RX4" class="all_box none">
                                    <p>
                                        投注说明：从01～11中任选4个或多个号码，所选号码与开奖号码任意四个号码相同即中奖.赔率<?php echo $fiveOdds['RX4']['value']?></p>
                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,03,04,05</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率45</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_RX4_num">

                                        <ul>

                                            <?php foreach($fiveOdds['RX4'] as $key=>$value):?>
                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif
                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['RX4'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="RX4_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_RX4">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="RX5">
                                <input type="hidden" id="RX5_chipin_l"
                                       value="<?php echo $chipins['RX5']['low']?>"/>

                                <input type="hidden" id="RX5_chipin_h"
                                       value="<?php echo $chipins['RX5']['hight']?>"/>

                                <div id="box_ball_RX5" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选5个或多个号码，所选号码与开奖号码任意五个号码相同即中奖.赔率 <?php echo $fiveOdds['RX5']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,02,03,05,04</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率310</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_RX5_num">

                                        <ul>

                                            <?php foreach($fiveOdds['RX5'] as $key=>$value):?>
                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif
                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['RX5'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="RX5_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_RX5">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="RX6">
                                <input type="hidden" id="RX6_chipin_l"
                                       value="<?php echo $chipins['RX6']['low']?>"/>

                                <input type="hidden" id="RX6_chipin_h"
                                       value="<?php echo $chipins['RX6']['hight']?>"/>

                                <div id="box_ball_RX6" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选6个或多个号码，所选号码与开奖号码五个号码全部相同即中奖.赔率<?php echo $fiveOdds['RX6']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,02,03,05,04</a></li>
                                                    <li><a>,06</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率52</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_RX6_num">

                                        <ul>

                                            <?php foreach($fiveOdds['RX6'] as $key=>$value):?>
                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif
                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['RX6'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="RX6_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_RX6">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="RX7">
                                <input type="hidden" id="RX7_chipin_l"
                                       value="<?php echo $chipins['RX7']['low']?>"/>

                                <input type="hidden" id="RX7_chipin_h"
                                       value="<?php echo $chipins['RX7']['hight']?>"/>

                                <div id="box_ball_RX7" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选7个或多个号码，所选号码与开奖号码五个号码全部相同即中奖.赔率<?php echo $fiveOdds['RX7']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,02,03,05,04</a></li>
                                                    <li><a>,06,08</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率15</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_RX7_num">

                                        <ul>

                                            <?php foreach($fiveOdds['RX7'] as $key=>$value):?>
                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif
                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['RX7'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="RX7_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_RX7">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="RX8">
                                <input type="hidden" id="RX8_chipin_l"
                                       value="<?php echo $chipins['RX8']['low']?>"/>

                                <input type="hidden" id="RX8_chipin_h"
                                       value="<?php echo $chipins['RX8']['hight']?>"/>

                                <div id="box_ball_RX8" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选8个或多个号码，所选号码与开奖号码五个号码全部相同即中奖.赔率<?php echo $fiveOdds['RX8']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,02,03,05,04</a></li>
                                                    <li><a>,06,08,09</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率5.5</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_RX8_num">

                                        <ul>

                                            <?php foreach($fiveOdds['RX8'] as $key=>$value):?>
                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif
                                            <?php endforeach;?>
                                        </ul>
                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['RX8'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="RX8_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_RX8">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="QEZHI">
                                <input type="hidden" id="QEZHI_chipin_l"
                                       value="<?php echo $chipins['QEZHI']['low']?>"/>

                                <input type="hidden" id="QEZHI_chipin_h"
                                       value="<?php echo $chipins['QEZHI']['hight']?>"/>

                                <div id="box_ball_QEZHI" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选2个或多个号码，所选号码与开奖号码前两位号码相同（顺序一致）即中奖.赔率<?php echo $fiveOdds['QEZHI']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,02</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率75</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="Ball_Box" id="box_ball_QEZHI_num">
                                        <div class="redBallBox" id="box_ball_QEZHI_WANG">
                                            <ul>
                                                <strong class="selectTitle">万位号码</strong>

                                                <?php foreach($fiveOdds['QEZHI'] as $key=>$value):?>
                                                @if(is_numeric($key))
                                                    <li class="OneNum"><?php echo $key;?></li>
                                                @endif
                                                <?php endforeach;?>
                                            </ul>

                                        </div>
                                        <div class="blank4"></div>
                                        <div class="redBallBox" id="box_ball_QEZHI_QIAN">
                                            <ul>
                                                <strong class="selectTitle">千位号码</strong>

                                                <?php foreach($fiveOdds['QEZHI'] as $key=>$value):?>
                                                @if(is_numeric($key))
                                                    <li class="OneNum"><?php echo $key;?></li>
                                                @endif
                                                <?php endforeach;?>

                                            </ul>

                                        </div>
                                    </div>
                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['QEZHI'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="QEZHI_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_QEZHI">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="QEZU">
                                <input type="hidden" id="QEZU_chipin_l"
                                       value="<?php echo $chipins['QEZU']['low']?>"/>

                                <input type="hidden" id="QEZU_chipin_h"
                                       value="<?php echo $chipins['QEZU']['hight']?>"/>

                                <div id="box_ball_QEZU" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选2个或多个号码，所选号码与开奖号码前两位号码相同（顺序不限）即中奖.赔率<?php echo $fiveOdds['QEZU']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：02,01</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率37</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_QEZU_num">

                                        <ul>

                                            <?php foreach($fiveOdds['QEZU'] as $key=>$value):?>
                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif
                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['QEZU'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="QEZU_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_QEZU">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="QSZHI">
                                <input type="hidden" id="QSZHI_chipin_l"
                                       value="<?php echo $chipins['QSZHI']['low']?>"/>

                                <input type="hidden" id="QSZHI_chipin_h"
                                       value="<?php echo $chipins['QSZHI']['hight']?>"/>

                                <div id="box_ball_QSZHI" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选3个或多个号码，所选号码与开奖号码前三位号码相同（顺序相同）即中奖.赔率<?php echo $fiveOdds['QSZHI']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,02,03</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率668</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="Ball_Box" id="box_ball_QSZHI_num">
                                        <div class="redBallBox" id="box_ball_QSZHI_WANG">

                                            <ul>
                                                <strong class="selectTitle">万位号码</strong>
                                                <?php foreach($fiveOdds['QSZHI'] as $key=>$value):?>
                                                @if(is_numeric($key))
                                                    <li class="OneNum"><?php echo $key;?></li>
                                                @endif
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                        <div class="blank4"></div>
                                        <div class="redBallBox" id="box_ball_QSZHI_QIAN">
                                            <ul>

                                                <strong class="selectTitle">千位号码</strong>

                                                <?php foreach($fiveOdds['QSZHI'] as $key=>$value):?>
                                                @if(is_numeric($key))
                                                    <li class="OneNum"><?php echo $key;?></li>
                                                @endif
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                        <div class="blank4"></div>
                                        <div class="redBallBox" id="box_ball_QSZHI_BAI">
                                            <ul>
                                                <strong class="selectTitle">百位号码</strong>

                                                <?php foreach($fiveOdds['QSZHI'] as $key=>$value):?>
                                                @if(is_numeric($key))
                                                    <li class="OneNum"><?php echo $key;?></li>
                                                @endif
                                                <?php endforeach;?>

                                            </ul>
                                        </div>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['QSZHI'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="QSZHI_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_QSZHI">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="QSZU">
                                <input type="hidden" id="RX6_chipin_l"
                                       value="<?php echo $chipins['QSZU']['low']?>"/>

                                <input type="hidden" id="RX6_chipin_h"
                                       value="<?php echo $chipins['QSZU']['hight']?>"/>

                                <div id="box_ball_QSZU" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选3个或多个号码，所选号码与开奖号码前三位号码相同（顺序不限）即中奖.赔率<?php echo $fiveOdds['QSZU']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01,03,02</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率114</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_QSZU_num">

                                        <ul>

                                            <?php foreach($fiveOdds['QSZU'] as $key=>$value):?>

                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif

                                            <?php endforeach;?>

                                        </ul>

                                    </div>

                                    <div class="select_txt none">

                                        <ul>

                                            <?php $i = 1;?>

                                            <?php foreach($fiveOdds['QSZU'] as $key=>$value):?>

                                            <li class="OneNum">赔率：<span
                                                <?php if ($i == 1) echo ' id="QSZU_getodds"';?>><?php echo $value;?></span>
                                            </li>

                                            <?php $i += 1;?>

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_info_text">

                                        <a href="javascript:void(0);" class="addbtn_disabled"
                                           id="ball_add_btn_QSZU">添加到投注列表</a>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="QY">
                                <input type="hidden" id="QY_chipin_l"
                                       value="<?php echo $chipins['QY']['low']?>"/>

                                <input type="hidden" id="QY_chipin_h"
                                       value="<?php echo $chipins['QY']['hight']?>"/>

                                <div id="box_ball_QY" class="all_box none">

                                    <p>
                                        投注说明：从01～11中任选1个或多个号码，所选号码与开奖号码第一位号码相同即中奖.赔率<?php echo $fiveOdds['QY']['value']?></p>

                                    <div class="menu">
                                        <ul class="menucon">
                                            <li>
                                                <a>实例说明：</a>
                                                <ul>
                                                    <li><a>选号：01</a></li>
                                                    <li><a>开奖：01,02,03,04,05</a></li>
                                                    <li><a>中奖：赔率7.5</a></li>
                                                    <li class="last"></li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="redBallBox" id="box_ball_QY_num">

                                        <ul>

                                            <?php foreach($fiveOdds['QY'] as $key=>$value):?>
                                            @if(is_numeric($key))
                                                <li class="OneNum"><?php echo $key;?></li>
                                            @endif

                                            <?php endforeach;?>

                                        </ul>

                                    </div>
                                    <div class="blank10"></div>
                                    <div class="select_txt none">
                                        <ul>
                                            <?php $i = 1;?>
                                            <?php foreach($fiveOdds['QY'] as $key=>$value):?>
                                                <li class="OneNum">赔率：<span
                                                    <?php if ($i == 1) echo ' id="QY_getodds"';?>><?php echo $value;?></span>
                                                </li>
                                            <?php $i += 1;?>
                                            <?php endforeach;?>
                                        </ul>
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
                                                                for="chaseStopCondition">
                                                            中奖后停止追号</label></span> <span
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
                    </div>
                    <div class="col-md-4" style="padding:0px">
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
                    </div>
                </div>


                <div class="clear"></div>
            {{--</div>--}}
        {{--</div>--}}
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
