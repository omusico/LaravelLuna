@extends('Layout.gaopinmaster')
@section('title')
    {{$czName}}
@stop
@section('css')
    <style type="text/css">
    </style>
    <script type="text/javascript">
        var lottery_type = '{{$config['lotterytype']}}';
        var num ={{$lotterystatus[$config['lotterytype']]['num']}};
    </script>
@stop
@section('content')
    <div class="container" style="min-width: 500px">
        <div class="zgk3_info_box">
            <div class="zgk3_top row">
                <div class="zgk3_info_l col-md-4">
                    <div class="zgk3_name">
                        <h1>
                            {{$czName}}
                        </h1>
                    </div>
                    <div class="zgk3_ico">
                        <span class="other cqssc78"></span>
                    </div>
                    <div class="zgk3_info">
                        <span class="yaoshao">10分钟一期,返奖率80%</span> <span class="yaoshao">销售时间：
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
                    </div>
                </div>
                <input type="hidden" id="proName"/> <input type="hidden"
                                                           id="getOdds"/>

                <div class="zgk3_info_r col-md-4">
                    <div class="zgk3_hao" id="kjjxz">
                        <div class="zgk3_qs" id="kjz">
                            第<span class="c_red" id="prevWin">...</span>期开奖号码:
                        </div>
                        <div class="ssc_nub" id="awerdNum_balls">
                            <span class="hm_3"></span>&nbsp;&nbsp;<span class="hm_6"></span>&nbsp;&nbsp;<span
                                    class="hm_6"></span>&nbsp;&nbsp;
                        </div>
                        <div style="display: none;" id="kjzimg" class="kj_nub">
                            <img src=" " alt="开奖中" height="63" width="259"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-9" style="border-right: 1px solid rgb(218, 218, 218)">
                <!--彩种nav开始-->
                <ul class="nav nav-tabs" role="tablist" id="firstTab"> 
                    <?php $i = 1; ?>
                    @foreach($lotterytypes as $key =>$value)
                        @if($i==1)
                            <li class="active"><a href="#{{$value['slug']}}" name="{{$value['slug']}}" role="tab"
                                                  data-toggle="tab">{{$value['name']}}</a></li>
                        @else
                            <li><a href="#{{$value['slug']}}" name="{{$value['slug']}}" role="tab"
                                   data-toggle="tab">{{$value['name']}}</a>
                            </li>
                        @endif
                        <?php $i += 1; ?>
                    @endforeach
                </ul>
                <div class="tab-content" id="secondTab">
                    <?php $i = 1; ?>
                    @foreach($lotterytypes as $key =>$value)
                        @if($i==1)
                            <div class="tab-pane active" id="{{$value['slug']}}">
                                <ul class="nav nav-pills nav-tabs" role="tablist"> 
                                    <?php $j = 1; ?>
                                    @foreach($lotterysecondtypes as $key =>$secondvalue)
                                        @if(stripos($secondvalue['slug'],$value['slug'])!==false)
                                            @if($j==1)
                                                <li class="active"><a href="#{{$secondvalue['slug']}}"
                                                                      id="{{$secondvalue['slug']."1"}}" role="tab"
                                                                      data-toggle="tab">{{$secondvalue['name']}}</a>
                                                </li>
                                            @else
                                                <li><a href="#{{$secondvalue['slug']}}"
                                                       id="{{$secondvalue['slug']."1"}}"
                                                       role="tab"
                                                       data-toggle="tab">{{$secondvalue['name']}}</a>
                                                </li>
                                            @endif
                                            <?php $j += 1; ?>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <div class="tab-pane" id="{{$value['slug']}}">
                                <ul class="nav nav-pills nav-tabs" role="tablist"> 
                                    <?php $j = 1; ?>
                                    @foreach($lotterysecondtypes as $key =>$secondvalue)
                                        @if(stripos($secondvalue['slug'],$value['slug'])!==false)
                                            @if($j==1)
                                                <li class="active"><a href="#{{$secondvalue['slug']}}"
                                                                      id="{{$secondvalue['slug']."1"}}" role="tab"
                                                                      data-toggle="tab">{{$secondvalue['name']}}</a>
                                                </li>
                                            @else
                                                <li><a href="#{{$secondvalue['slug']}}"
                                                       id="{{$secondvalue['slug']."1"}}" role="tab"
                                                       data-toggle="tab">{{$secondvalue['name']}}</a>
                                                </li>
                                            @endif
                                            <?php $j += 1; ?>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <?php $i += 1; ?>
                    @endforeach
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="TABSXZHIX_QSZHIX">
                        <?php
                        $playType = 'TABSXZHIX_QSZHIX';
                        $firstType = "TABSXZHIX";
                        $cheNum = array('0' => '万位号码', '1' => '千位号码', '2' => '百位号码');
                        $num = array_slice($cheNum, 0, 3);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>

                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box sscbox">

                            <p>每位各选1个或多个号码，选号与奖号前三位一一对应即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,02,03</a></li>
                                            <li><a>开奖：01,02,03,04,05</a></li>
                                            <li><a>中奖：赔率900</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>
                                    <?php $i += 1;?>
                                    <?php endforeach;?>
                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZHIX_ZSZHIX">
                        <?php

                        /*

                         */
                        // 中三直选

                        $playType = 'TABSXZHIX_ZSZHIX';
                        $firstType = "TABSXZHIX";
                        $cheNum = array('0' => '千位号码', '1' => '百位号码', '2' => '十位号码');
                        $num = array_slice($cheNum, 0, 3);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>
                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>每位各选1个或多个号码，选号与奖号中间三位一一对应即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,02,03</a></li>
                                            <li><a>开奖：04,01,02,03,05</a></li>
                                            <li><a>中奖：赔率900</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>
                                    <?php $i += 1;?>
                                    <?php endforeach;?>
                                </ul>
                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>


                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZHIX_HSZHIX">
                        <?php

                        // 后三直选

                        $playType = 'TABSXZHIX_HSZHIX';
                        $firstType = "TABSXZHIX";
                        $cheNum = array('0' => '百位号码', '1' => '十位号码', '2' => '个位号码');
                        $num = array_slice($cheNum, 0, 3);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>
                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>每位各选1个或多个号码，选号与奖号后三位一一对应即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,02,03</a></li>
                                            <li><a>开奖：04,05,01,02,03</a></li>
                                            <li><a>中奖：赔率900</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>
                                    <?php $i += 1;?>
                                    <?php endforeach;?>
                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>

                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    {{--三星直选--}}
                    <div class="tab-pane" id="TABSXZUX_QSZUX">
                        <?php
                        // 前三组选

                        $playType = 'TABSXZUX_QSZUX';
                        $firstType = "TABSXZUX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 3);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box">

                            <p>开奖号码前三位任意两位号码相同，如188。投注号码包含开奖号码前三位即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,03</a></li>
                                            <li><a>开奖：01,03,01,04,05</a></li>
                                            <li><a>开奖：03,03,01,04,05</a></li>
                                            <li><a>中奖：赔率150</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZUX_ZSZUX">
                        <?php

                        /*

                         */
                        // 中三组选

                        $playType = 'TABSXZUX_ZSZUX';
                        $firstType = "TABSXZUX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 3);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>开奖号码中间三位任意两位号码相同，如188。投注号码包含开奖号码中间三位即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,03</a></li>
                                            <li><a>开奖：04,01,03,01,05</a></li>
                                            <li><a>开奖：04,03,03,01,05</a></li>
                                            <li><a>中奖：赔率150</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZUX_HSZUX">
                        <?php

                        /*

                         */
                        // 后三组选

                        $playType = 'TABSXZUX_HSZUX';
                        $firstType = "TABSXZUX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 3);


                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>开奖号码后三位任意两位号码相同，如188。投注号码包含开奖号码后三位即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,03</a></li>
                                            <li><a>开奖：04,05,01,01,03</a></li>
                                            <li><a>开奖：04,05,01,03,03</a></li>
                                            <li><a>中奖：赔率150</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZUX_QSZUL">
                        <?php

                        /*

                         */
                        // 前三组六

                        $playType = 'TABSXZUX_QSZUL';
                        $firstType = "TABSXZUX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 1);


                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>开奖号码前三位号码各不相同，如135。投注号码包含开奖号码前三位即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,02,03</a></li>
                                            <li><a>开奖：01,03,02,04,05</a></li>
                                            <li><a>中奖：赔率150</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZUX_ZSZUL">
                        <?php

                        /*

                         */
                        // 中三组六

                        $playType = 'TABSXZUX_ZSZUL';
                        $firstType = "TABSXZUX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 1);


                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>开奖号码中间三位号码各不相同，如135。投注号码包含开奖号码中间三位即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,02,03</a></li>
                                            <li><a>开奖：04,01,03,02,05</a></li>
                                            <li><a>中奖：赔率150</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>
                                </ul>
                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZUX_HSZUL">
                        <?php

                        /*

                         */
                        // 后三组六

                        $playType = 'TABSXZUX_HSZUL';
                        $firstType = "TABSXZUX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 1);


                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>开奖号码后三位号码各不相同，如135。投注号码包含开奖号码后三位即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,02,03</a></li>
                                            <li><a>开奖：04,05,01,03,02</a></li>
                                            <li><a>中奖：赔率150</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>
                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABSXZUX_ZUSZHIX">
                        <?php

                        /*
                         */
                        // 组三直选

                        $playType = 'TABSXZUX_ZUSZHIX';
                        $firstType = "TABSXZUX";
                        $cheNum = array('0' => '对子号码', '1' => '单数号码');
                        $num = array_slice($cheNum, 0, 2);


                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>开奖号码后三位任意两位号码相同，如188。投注号码包含开奖号码后三位即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,03</a></li>
                                            <li><a>开奖：04,05,01,03,01</a></li>
                                            <li><a>开奖：04,05,01,01,03</a></li>
                                            <li><a>中奖：赔率300</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    {{--和值--}}
                    <div class="tab-pane" id="TABHZ_SWHZ">
                        <?php
                        $playType = 'TABHZ_SWHZ';
                        $firstType = "TABHZ";
                        $max = 18;
                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_other_chipin_l"
                               value="<?php echo $chipins[$playType]['other_low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_other_chipin_h"
                               value="<?php echo $chipins[$playType]['other_hight']?>"/>

                        <div class="content0 <?php echo $firstType?>_all_box"
                             id="box_ball_<?php echo $playType?>">
                            <p>投注说明：至少选择1个和值投注，选号与开奖的首尾号码相加的数值一致即中奖。</p>

                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：00</a></li>
                                            <li><a>开奖：00,01,03,02,00</a></li>
                                            <li><a>中奖：赔率90</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="select_num2" id="box_ball_<?php echo $playType?>_num">
                                <ul>
                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">
                                        <div class="num" id="<?php echo 'box_ball_' . $playType . '_' . $key ?>">
                                            <?php echo $key;?>
                                        </div>

                                        <div>
                                            赔率:<span
                                                    id="<?php echo $playType?>_getodds_<?php echo $key;?>"><?php echo $value;?></span>
                                        </div>
                                    </li>
                                    <?php if ($key == $max) break;?>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div class="blank10"></div>
                            <div class="select_num1">
                                <ul>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_dan">单</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_shuang">双</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_xiao">小</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_da">大</li>
                                </ul>
                            </div>
                            <div class="select_txt1" style="width: 375px">
                                <ul>
                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_dan"><?php echo (float)($sscOdds[$playType]['dan']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_shuang"><?php echo (float)($sscOdds[$playType]['shuang']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_xiao"><?php echo (float)($sscOdds[$playType]['xiao']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_da"><?php echo (float)($sscOdds[$playType]['da']);?></span>
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
                                                <ul class="hm-con" id="box_ball_<?php echo $playType?>_dwdan">
                                                    <span id="<?php echo $playType?>_getodds_dwdan"
                                                          style="display: none;">  <?php echo (float)($sscOdds[$playType]['dwdan']) ?></span>
                                                    <li class="kj-w110 kongge">
                                                        赔率：<?php echo (float)($sscOdds[$playType]['dwdan']) ?> </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_single1">单</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_single2">单</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_single3">单</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_single4">单</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_single5">单</div>
                                                    </li>
                                                </ul>

                                                <ul class="hm-con" id="box_ball_<?php echo $playType?>_dwshuang">
                                                    <span id="<?php echo $playType?>_getodds_dwshuang"
                                                          style="display: none;"> <?php echo (float)($sscOdds[$playType]['dwshuang']) ?></span>
                                                    <li class="kj-w110 kongge">
                                                        赔率：<?php echo (float)($sscOdds[$playType]['dwshuang'])  ?> </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_double1">双</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_double2">双</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_double3">双</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_double4">双</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_double5">双</div>
                                                    </li>
                                                </ul>
                                                <ul class="hm-con" id="box_ball_<?php echo $playType?>_dwda">
                                                    <span id="<?php echo $playType?>_getodds_dwda"
                                                          style="display: none;"> <?php echo (float)($sscOdds[$playType]['dwda']) ?></span>
                                                    <li class="kj-w110 kongge">
                                                        赔率：<?php echo (float)($sscOdds[$playType]['dwda']) ?></li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_big1">大</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_big2">大</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_big3">大</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_big4">大</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_big5">大</div>
                                                    </li>
                                                </ul>

                                                <ul class="hm-con" id="box_ball_<?php echo $playType?>_dwxiao">
                                                    <span id="<?php echo $playType?>_getodds_dwxiao"
                                                          style="display: none;"> <?php echo (float)($sscOdds[$playType]['dwxiao']) ?></span>
                                                    <li class="kj-w110 kongge">
                                                        赔率：<?php echo (float)($sscOdds[$playType]['dwxiao']) ?></li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_small1">小</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_small2">小</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_small3">小</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_small4">小</div>
                                                    </li>
                                                    <li class="kj-w110">
                                                        <div class="OneNum num" id="box_ball_HZ_small5">小</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="tab-pane" id="TABHZ_SXHZ">
                        <?php
                        $playType = 'TABHZ_SXHZ';
                        $firstType = "TABHZ";
                        $max = 27;
                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_other_chipin_l"
                               value="<?php echo $chipins[$playType]['other_low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_other_chipin_h"
                               value="<?php echo $chipins[$playType]['other_hight']?>"/>

                        <div class="content0 <?php echo $firstType?>_all_box none" id="box_ball_<?php echo $playType?>">
                            <p>投注说明：至少选择1个和值投注，选号与开奖的后三号码相加的数值一致即中奖。</p>

                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：00</a></li>
                                            <li><a>开奖：02,03,00,00,00</a></li>
                                            <li><a>中奖：赔率835</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="select_num2" id="box_ball_<?php echo $playType?>_num">
                                <ul>
                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">
                                        <div class="num" id="<?php echo 'box_ball_' . $playType . '_' . $key ?>">
                                            <?php echo $key;?>
                                        </div>

                                        <div>
                                            赔率:<span
                                                    id="<?php echo $playType?>_getodds_<?php echo $key;?>"><?php echo $value;?></span>
                                        </div>
                                    </li>
                                    <?php if ($key == $max) break;?>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div class="blank10"></div>
                            <div class="select_num1">
                                <ul>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_dan">单</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_shuang">双</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_xiao">小</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_da">大</li>
                                </ul>
                            </div>
                            <div class="select_txt1" style="width: 375px">
                                <ul>
                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_dan"><?php echo (float)($sscOdds[$playType]['dan']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_shuang"><?php echo (float)($sscOdds[$playType]['shuang']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_xiao"><?php echo (float)($sscOdds[$playType]['xiao']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_da"><?php echo (float)($sscOdds[$playType]['da']);?></span>
                                    </li>

                                </ul>

                            </div>
                            <div class="blank10"></div>


                        </div>


                    </div>
                    <div class="tab-pane" id="TABHZ_EXHZ">
                        <?php
                        $playType = 'TABHZ_EXHZ';
                        $firstType = "TABHZ";
                        $max = 18;
                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_other_chipin_l"
                               value="<?php echo $chipins[$playType]['other_low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_other_chipin_h"
                               value="<?php echo $chipins[$playType]['other_hight']?>"/>

                        <div class="content0 <?php echo $firstType?>_all_box none" id="box_ball_<?php echo $playType?>">
                            <p>投注说明：至少选择1个和值投注，选号与开奖的后两个号码相加的数值一致即中奖。</p>

                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：00</a></li>
                                            <li><a>开奖：02,01,03,00,00</a></li>
                                            <li><a>中奖：赔率90</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="select_num2" id="box_ball_<?php echo $playType?>_num">
                                <ul>
                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">
                                        <div class="num" id="<?php echo 'box_ball_' . $playType . '_' . $key ?>">
                                            <?php echo $key;?>
                                        </div>

                                        <div>
                                            赔率:<span
                                                    id="<?php echo $playType?>_getodds_<?php echo $key;?>"><?php echo $value;?></span>
                                        </div>
                                    </li>
                                    <?php if ($key == $max) break;?>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div class="blank10"></div>
                            <div class="select_num1">
                                <ul>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_dan">单</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_shuang">双</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_xiao">小</li>
                                    <li class="OneNum" id="box_ball_<?php echo $playType?>_da">大</li>
                                </ul>
                            </div>
                            <div class="select_txt1" style="width: 375px">
                                <ul>
                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_dan"><?php echo (float)($sscOdds[$playType]['dan']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_shuang"><?php echo (float)($sscOdds[$playType]['shuang']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_xiao"><?php echo (float)($sscOdds[$playType]['xiao']);?></span>
                                    </li>

                                    <li class="OneNum">赔率:<span
                                                id="<?php echo $playType?>_getodds_da"><?php echo (float)($sscOdds[$playType]['da']);?></span>
                                    </li>

                                </ul>

                            </div>
                            <div class="blank10"></div>


                        </div>


                    </div>
                    {{--二星--}}
                    <div class="tab-pane" id="TABEX_QEZHIX">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 前二直选

                        $playType = 'TABEX_QEZHIX';
                        $firstType = "TABEX";
                        $cheNum = array('0' => '万位号码', '1' => '千位号码');
                        $num = array_slice($cheNum, 0, 2);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box ">

                            <p>每位各选1个或多个号，所选号与开奖号前两位相同（且顺序一致）即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,04</a></li>
                                            <li><a>开奖：01,04,03,04,05</a></li>
                                            <li><a>中奖：赔率90</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABEX_HEZHIX">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 后二直选

                        $playType = 'TABEX_HEZHIX';
                        $firstType = "TABEX";
                        $cheNum = array('0' => '十位号码', '1' => '个位号码');
                        $num = array_slice($cheNum, 0, 2);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>每位各选1个或多个号，所选号与开奖号后两位相同（且顺序一致）即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：04,05</a></li>
                                            <li><a>开奖：01,04,03,04,05</a></li>
                                            <li><a>中奖：赔率90</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>


                            </div>
                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABEX_QEZUE">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 前二组二

                        $playType = 'TABEX_QEZUE';
                        $firstType = "TABEX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 2);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>从0～9中选2个或多个号码，选号与奖号前二位相同（顺序不限，不含对子号）即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：04,01</a></li>
                                            <li><a>开奖：01,04,03,04,05</a></li>
                                            <li><a>中奖：赔率45</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>


                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABEX_HEZUE">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 后二组二

                        $playType = 'TABEX_HEZUE';
                        $firstType = "TABEX";
                        $cheNum = array('0' => '号码');
                        $num = array_slice($cheNum, 0, 2);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>从0～9中选2个或多个号码，选号与奖号后二位相同（顺序不限，不含对子号）即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：05,04</a></li>
                                            <li><a>开奖：01,04,03,04,05</a></li>
                                            <li><a>中奖：赔率45</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($num as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>

                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    {{--定位胆--}}
                    <div class="tab-pane" id="TABDW_YI">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 前一直选

                        $playType = 'TABDW_YI';
                        $firstType = "TABDW";
                        $cheNum = array('第一位');
                        $num = array_slice($cheNum, 0, 5);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box">

                            <p>从0～9中选1个或多个号码，选号与奖号第一位相同即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01</a></li>
                                            <li><a>开奖：01,04,03,01,05</a></li>
                                            <li><a>中奖：赔率9.15</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):

                                        ?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php


                                        endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>


                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>


                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABDW_ER">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 前一直选

                        $playType = 'TABDW_ER';
                        $firstType = "TABDW";
                        $cheNum = array('第二位');
                        $num = array_slice($cheNum, 0, 5);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>从0～9中选1个或多个号码，选号与奖号第二位相同即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：04</a></li>
                                            <li><a>开奖：01,04,03,01,05</a></li>
                                            <li><a>中奖：赔率9.15</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):

                                        ?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php


                                        endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>


                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>


                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABDW_SAN">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 前一直选

                        $playType = 'TABDW_SAN';
                        $firstType = "TABDW";
                        $cheNum = array('第三位');
                        $num = array_slice($cheNum, 0, 5);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>从0～9中选1个或多个号码，选号与奖号第三位相同即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：03</a></li>
                                            <li><a>开奖：01,04,03,01,05</a></li>
                                            <li><a>中奖：赔率9.15</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):

                                        ?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php


                                        endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>


                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>


                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABDW_SI">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 前一直选

                        $playType = 'TABDW_SI';
                        $firstType = "TABDW";
                        $cheNum = array('第四位');
                        $num = array_slice($cheNum, 0, 5);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>" class="<?php echo $firstType?>_all_box none">

                            <p>从0～9中选1个或多个号码，选号与奖号第四位相同即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li>
                                        <a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01</a></li>
                                            <li><a>开奖：01,04,03,01,05</a></li>
                                            <li><a>中奖：赔率9.15</a></li>
                                            <li class="last"></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):

                                        ?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php


                                        endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>
                            </div>


                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>


                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABDW_WU">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 前一直选
                        $playType = 'TABDW_WU';
                        $firstType = "TABDW";
                        $cheNum = array(
                                '第五位'
                        );
                        $num = array_slice($cheNum, 0, 5);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>"
                             class="<?php echo $firstType?>_all_box none">

                            <p>从0～9中选1个或多个号码，选号与奖号第五位相同即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($num as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <div class="ballCon">
                                        <div class="textTips">
                                            <span class="xh"><?php echo $val?></span>
                                        </div>
                                        <ul class="balleft">
                                            <?php

                                            foreach ( $sscOdds [$playType] as $key => $value ) :

                                            ?>

                                            <li class="OneNum"><span><?php echo $key;?></span></li>

                                            <?php
                                            endforeach
                                            ;
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blrem10"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>


                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>


                            <div class="blrem2"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>
                            <div class="blrem2"></div>
                        </div>
                    </div>
                    {{--五星--}}
                    <div class="tab-pane" id="TABWX_WXZHIX">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 五星直选
                        $playType = 'TABWX_WXZHIX';
                        $firstType = "TABWX";
                        $cheNum = array(
                                '0' => '万位号码',
                                '1' => '千位号码',
                                '2' => '百位号码',
                                '3' => '十位号码',
                                '4' => '个位号码'
                        );
                        $num = array_slice($cheNum, 0, 4);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>"
                             class="<?php echo $firstType?>_all_box">

                            <p>每位各选1个或多个号码，所选号码与开奖号码一一对应即中奖，赔率<?php echo $odds?></p>

                            <div class="blank10"></div>
                            <div class="menu">
                                <ul class="menucon">
                                    <li><a>实例说明：</a>
                                        <ul>
                                            <li><a>选号：01,02,03,04,05</a></li>
                                            <li><a>开奖：01,02,03,04,05</a></li>
                                            <li><a>中奖：赔率90000</a></li>
                                            <li class="last"></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($cheNum as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <ul>
                                        <strong class="selectTitle"><?php echo $val?></strong>

                                        <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                        <li class="OneNum"><?php echo $key;?></li>

                                        <?php endforeach;?>
                                    </ul>

                                </div>
                                <div class="blank4"></div>

                                <?php } ?>

                            </div>
                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>
                            <div class="btn_box">
                                <legend align="center">[ 帮助区 ]</legend>

                                <?php foreach($cheNum as $key=>$value) { ?>
                                <ul class="btn_list" id="<?php echo $playType . '_help_' . $key?>">
                                    <li class="all">全</li>
                                    <li class="large">大</li>
                                    <li class="small">小</li>
                                    <li class="odd">奇</li>
                                    <li class="even">偶</li>
                                    <li class="clearBtn">清除</li>
                                </ul>
                                <?php }?>


                            </div>
                            <div class="blank10"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="TABWX_WXTX">
                        <?php

                        /*
                         * $types = Waf::moduleData('lottery_type_slug','lottery'); $type = $types['2BTH'];
                         */
                        // 五星通选
                        $playType = 'TABWX_WXTX';
                        $firstType = "TABWX";
                        $cheNum = array(
                                '0' => '万位',
                                '1' => '千位',
                                '2' => '百位',
                                '3' => '十位',
                                '4' => '个位'
                        );
                        $num = array_slice($cheNum, 0, 4);

                        // 前一
                        $odds = $sscOdds [$playType] ['value'];

                        unset ($sscOdds [$playType] ['value']);

                        ?>



                        <input type="hidden" id="<?php echo $playType?>_chipin_l"
                               value="<?php echo $chipins[$playType]['low']?>"/>

                        <input type="hidden" id="<?php echo $playType?>_chipin_h"
                               value="<?php echo $chipins[$playType]['hight']?>"/>

                        <div id="box_ball_<?php echo $playType ?>"
                             class="<?php echo $firstType?>_all_box none">

                            <p>每位选1个或多个号码投注，中奖赔率16-<?php echo $odds?></p>

                            <div class="Ball_Box" id="box_ball_<?php echo $playType?>_num">
                                <?php foreach ($cheNum as $k=>$val) { ?>
                                <div class="redBallBox" id="box_ball_<?php echo $playType . '_' . $k?>">
                                    <div class="ballCon">
                                        <div class="textTips">
                                            <span class="xh"><?php echo $val?></span>
                                        </div>
                                        <ul class="balleft">

                                            <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                            <li class="OneNum"><span><?php echo $key;?></span></li>

                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blrem10"></div>

                                <?php } ?>

                            </div>

                            <div class="select_txt none">

                                <ul>

                                    <?php $i = 1;?>

                                    <?php foreach($sscOdds[$playType] as $key=>$value):?>

                                    <li class="OneNum">赔率：<span
                                        <?php if ($i == 1) echo 'id="' . $playType . '_getodds"' . '>' . $odds; ?></span>
                                    </li>

                                    <?php $i += 1;?>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                            <div class="blrem2"></div>
                            <div class="select_info_text">

                                <a href="javascript:void(0);" class="addbtn_disabled"
                                   id="ball_add_btn_<?php echo $playType?>">添加到投注列表</a>

                            </div>
                            <div class="blrem2"></div>
                        </div>
                    </div>
                    {{--牛牛--}}
                    <div class="tab-pane" id="TABNN_NN">

                    </div>

                </div>
                <div style="display:block">
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
                    <div class="paybox clear">
                        <input id="playType" value="TABSXZHIX_QSZHIX" type="hidden"/> <input
                                id="gameName" value="前三直选" type="hidden"/> <input
                                id="totalVals" value="0" type="hidden"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn-lg btn-danger" href="#" onclick="Ssc.submit();return false">投注</a>
                        {{--<a href="#" class="submit_btn" onclick="Ssc.submit();return false;">立即投注</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="padding:0px">
                <div class="login_weizhi">
                    @include('userinfo')
                </div>
                <div class="blank4"></div>
                <div class="kj_open_box">
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
                                        <td width="60">期数</td>
                                        <td width="120">奖号</td>
                                        <!-- 										<td width="80">和值</td>
                                        <td width="80">形态</td>-->
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
            <div class="clear"></div>

        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/sscbetting.js"></script>
    <script type="text/javascript">
        var currentsecond = "";
        $("#firstTab").find("li").bind("click", function () {
            var current = $(this).first().find("a").attr('name');
            $("#secondTab").find('.active').each(function () {
                console.log($(this).first().find("a").attr("href"));
                if ($(this).first().find("a").attr("href").indexOf(current) > 0) {
                    $(this).first().removeClass("active");
                    currentsecond = $(this).first().find("a").attr("id");
                    $("#" + currentsecond).click();
                }
            });

        });
        $(function () {
            setOutTime();
            setTimeout("loadRecent()", 2500);
        });
    </script>
@stop
