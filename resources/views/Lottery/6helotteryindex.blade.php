@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    香港六合彩
@stop
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/layer.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/6he.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/ssc.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery-ui.min.css') }}">--}}
    <style type="text/css">
        .has_add_ball li .txt-betsName {
            width: 100px;
        }

        .datagrid-mask-msg {
            background: #ffffff;
        }

        .datagrid-mask-msg {
            /*border-style: solid;*/
            border-width: 0px;
            display: none;
            height: 12px;
            margin-top: 10%;
            color: red;
            padding: 5px 2px 5px 2px;
            position: absolute;
            top: 50%;
            width: auto;
            font-size: 20px;
        }

        .datagrid-mask {
            background: #ccc;
        }

        .datagrid-mask {
            margin-top: 20%;
            display: none;
            filter: alpha(opacity=30);
            height: 100%;
            left: 0;
            opacity: 0.3;
            position: absolute;
            top: 0;
            width: 100%;
        }
    </style>
    <script type="text/javascript">
        <?php
        $sixhe = Cache::get('sixhe');
        $gaptime = strtotime($sixhe['endtime']) - strtotime(date('Y-m-d H:i:s'));
        ?>
        betTime ={{$gaptime}};
        var lottery_type = '6he';
        {{--var num ={{$lotterystatus[$config['lotterytype']]['num']}};--}}
        tbmplus = {{$sixhe['plus']}};
        XiaoNums = "[{&#39;xiao&#39;:&#39;鼠&#39;,&#39;nums&#39;:&#39;08.20.32.44&#39;},{&#39;xiao&#39;:&#39;牛&#39;,&#39;nums&#39;:&#39;07.19.31.43&#39;},{&#39;xiao&#39;:&#39;虎&#39;,&#39;nums&#39;:&#39;06.18.30.42&#39;},{&#39;xiao&#39;:&#39;兔&#39;,&#39;nums&#39;:&#39;05.17.29.41&#39;},{&#39;xiao&#39;:&#39;龙&#39;,&#39;nums&#39;:&#39;04.16.28.40&#39;},{&#39;xiao&#39;:&#39;蛇&#39;,&#39;nums&#39;:&#39;03.15.27.39&#39;},{&#39;xiao&#39;:&#39;马&#39;,&#39;nums&#39;:&#39;02.14.26.38&#39;},{&#39;xiao&#39;:&#39;羊&#39;,&#39;nums&#39;:&#39;01.13.25.37.49&#39;},{&#39;xiao&#39;:&#39;猴&#39;,&#39;nums&#39;:&#39;12.24.36.48&#39;},{&#39;xiao&#39;:&#39;鸡&#39;,&#39;nums&#39;:&#39;11.23.35.47&#39;},{&#39;xiao&#39;:&#39;狗&#39;,&#39;nums&#39;:&#39;10.22.34.46&#39;},{&#39;xiao&#39;:&#39;猪&#39;,&#39;nums&#39;:&#39;09.21.33.45&#39;}]";
    </script>
@stop
@section('content')
    <div class="container" id="cc" style="min-width: 500px">
        <div class="zgk3_info_box">
            <div class="zgk3_top row">
                <div class="zgk3_info_l col-md-4">
                    <div class="zgk3_name">
                        <h1>
                            香港六合彩
                        </h1>
                    </div>
                    <div class="zgk3_ico">
                        <span class="other cqssc78"></span>
                    </div>
                    <div class="zgk3_info">
                        <span class="yaoshao"></span> <span class="yaoshao">销售时间：
                            {{$sixhe ['todaystart'] . '-' . $sixhe ['todayend']}}
                            </span>
                        <span class="yaoshao"></span> <span class="yaoshao">封盘时间：
                            {{$sixhe ['endtime']}}
                            </span>
                    </div>
                </div>
                <div class="zgk3_info_c col-md-4">
                    <div class="zgk3_ju">
                        距<span class="c_red" id="theCur">{{$sixhe['proName']}}</span>期投注截止还有：
                    </div>
                    <div class="zgk3_li">
                        <div class="zgk3_jusecond" id="countDownTime">00:00:00</div>
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
                                                                      wei="{{$secondvalue['wei']}}"
                                                                      data-toggle="tab">{{$secondvalue['name']}}</a>
                                                </li>
                                            @else
                                                <li><a href="#{{$secondvalue['slug']}}"
                                                       id="{{$secondvalue['slug']."1"}}"
                                                       role="tab" wei="{{$secondvalue['wei']}}"
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
                                                                      wei="{{$secondvalue['wei']}}"
                                                                      data-toggle="tab">{{$secondvalue['name']}}</a>
                                                </li>
                                            @else
                                                <li><a href="#{{$secondvalue['slug']}}"
                                                       id="{{$secondvalue['slug']."1"}}" role="tab"
                                                       wei="{{$secondvalue['wei']}}"
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
                <div class="tab-content" id="all-content">
                    <div class="tab-pane active" id="TM_TM">
                        <div class="tm_content">
                            <div id="tema_type" class="type_nav" style="display: block;">
                                <ul style="list-style:none">
                                    <li id="btnybms" disid="tm_ybms" class="selected">
                                        一般模式
                                    </li>
                                    <li id="btnksms" disid="tm_ksms" class="">
                                        快速模式
                                    </li>
                                </ul>

                            </div>

                            <div id="tm_ksms" class="tm_ms" style="display: block;">

                                <table id="ksms_ball" cellpadding="0" style="margin-top: 10px;" class="QuickTab">
                                    <tbody>
                                    <tr class="title_tr">
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorR">
                                            <label for="SP01">
                                                01
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP01"></label>
                                        </td>
                                        <td>

                                            <input type="text" value="" size="4" tabindex="1" maxlength="5"
                                                   name="num[SP01]" id="SP01" style="border: 1px solid black;" tp3="特码"
                                                   tp2="01" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP11">
                                                11
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP11"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="11" maxlength="5"
                                                   name="num[SP11]" id="SP11" style="border: 1px solid black;" tp3="特码"
                                                   tp2="11" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP21">
                                                21
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP21"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="21" maxlength="5"
                                                   name="num[SP21]" id="SP21" style="border: 1px solid black;" tp3="特码"
                                                   tp2="21" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP31">
                                                31
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP31"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="31" maxlength="5"
                                                   name="num[SP31]" id="SP31" style="border: 1px solid black;" tp3="特码"
                                                   tp2="31" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP41">
                                                41
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP41"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="41" maxlength="5"
                                                   name="num[SP41]" id="SP41" style="border: 1px solid black;" tp3="特码"
                                                   tp2="41" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorR">
                                            <label for="SP02">
                                                02
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP02"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="2" maxlength="5"
                                                   name="num[SP02]" id="SP02" style="border: 1px solid black;" tp3="特码"
                                                   tp2="02" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP12">
                                                12
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP12"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="12" maxlength="5"
                                                   name="num[SP12]" id="SP12" style="border: 1px solid black;" tp3="特码"
                                                   tp2="12" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP22">
                                                22
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP22"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="22" maxlength="5"
                                                   name="num[SP22]" id="SP22" style="border: 1px solid black;" tp3="特码"
                                                   tp2="22" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP32">
                                                32
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP32"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="32" maxlength="5"
                                                   name="num[SP32]" id="SP32" style="border: 1px solid black;" tp3="特码"
                                                   tp2="32" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP42">
                                                42
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP42"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="42" maxlength="5"
                                                   name="num[SP42]" id="SP42" style="border: 1px solid black;" tp3="特码"
                                                   tp2="42" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP03">
                                                03
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP03"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="3" maxlength="5"
                                                   name="num[SP03]" id="SP03" style="border: 1px solid black;" tp3="特码"
                                                   tp2="03" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP13">
                                                13
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP13"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="13" maxlength="5"
                                                   name="num[SP13]" id="SP13" style="border: 1px solid black;" tp3="特码"
                                                   tp2="13" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP23">
                                                23
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP23"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="23" maxlength="5"
                                                   name="num[SP23]" id="SP23" style="border: 1px solid black;" tp3="特码"
                                                   tp2="23" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP33">
                                                33
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP33"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="33" maxlength="5"
                                                   name="num[SP33]" id="SP33" style="border: 1px solid black;" tp3="特码"
                                                   tp2="33" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP43">
                                                43
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP43"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="43" maxlength="5"
                                                   name="num[SP43]" id="SP43" style="border: 1px solid black;" tp3="特码"
                                                   tp2="43" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP04">
                                                04
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP04"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="4" maxlength="5"
                                                   name="num[SP04]" id="SP04" style="border: 1px solid black;" tp3="特码"
                                                   tp2="04" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP14">
                                                14
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP14"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="14" maxlength="5"
                                                   name="num[SP14]" id="SP14" style="border: 1px solid black;" tp3="特码"
                                                   tp2="14" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP24">
                                                24
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP24"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="24" maxlength="5"
                                                   name="num[SP24]" id="SP24" style="border: 1px solid black;" tp3="特码"
                                                   tp2="24" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP34">
                                                34
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP34"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="34" maxlength="5"
                                                   name="num[SP34]" id="SP34" style="border: 1px solid black;" tp3="特码"
                                                   tp2="34" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP44">
                                                44
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP44"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="44" maxlength="5"
                                                   name="num[SP44]" id="SP44" style="border: 1px solid black;" tp3="特码"
                                                   tp2="44" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorG">
                                            <label for="SP05">
                                                05
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP05"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="5" maxlength="5"
                                                   name="num[SP05]" id="SP05" style="border: 1px solid black;" tp3="特码"
                                                   tp2="05" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP15">
                                                15
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP15"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="15" maxlength="5"
                                                   name="num[SP15]" id="SP15" style="border: 1px solid black;" tp3="特码"
                                                   tp2="15" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP25">
                                                25
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP25"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="25" maxlength="5"
                                                   name="num[SP25]" id="SP25" style="border: 1px solid black;" tp3="特码"
                                                   tp2="25" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP35">
                                                35
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP35"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="35" maxlength="5"
                                                   name="num[SP35]" id="SP35" style="border: 1px solid black;" tp3="特码"
                                                   tp2="35" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP45">
                                                45
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP45"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="45" maxlength="5"
                                                   name="num[SP45]" id="SP45" style="border: 1px solid black;" tp3="特码"
                                                   tp2="45" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorG">
                                            <label for="SP06">
                                                06
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP06"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="6" maxlength="5"
                                                   name="num[SP06]" id="SP06" style="border: 1px solid black;" tp3="特码"
                                                   tp2="06" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP16">
                                                16
                                            </label>
                                        </td>
                                        <td style="">
                                            <label for="SP16"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="16" maxlength="5"
                                                   name="num[SP16]" id="SP16" style="border: 1px solid black;" tp3="特码"
                                                   tp2="16" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP26">
                                                26
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP26"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="26" maxlength="5"
                                                   name="num[SP26]" id="SP26" style="border: 1px solid black;" tp3="特码"
                                                   tp2="26" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP36">
                                                36
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP36"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="36" maxlength="5"
                                                   name="num[SP36]" id="SP36" style="border: 1px solid black;" tp3="特码"
                                                   tp2="36" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP46">
                                                46
                                            </label>
                                        </td>
                                        <td style="">
                                            <label for="SP46"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="46" maxlength="5"
                                                   name="num[SP46]" id="SP46" style="border: 1px solid black;" tp3="特码"
                                                   tp2="46" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorR">
                                            <label for="SP07">
                                                07
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP07"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="7" maxlength="5"
                                                   name="num[SP07]" id="SP07" style="border: 1px solid black;" tp3="特码"
                                                   tp2="07" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP17">
                                                17
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP17"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="17" maxlength="5"
                                                   name="num[SP17]" id="SP17" style="border: 1px solid black;" tp3="特码"
                                                   tp2="17" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP27">
                                                27
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP27"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="27" maxlength="5"
                                                   name="num[SP27]" id="SP27" style="border: 1px solid black;" tp3="特码"
                                                   tp2="27" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB" style="">
                                            <label for="SP37">
                                                37
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP37"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="37" maxlength="5"
                                                   name="num[SP37]" id="SP37" style="border: 1px solid black;" tp3="特码"
                                                   tp2="37" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP47">
                                                47
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP47"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="47" maxlength="5"
                                                   name="num[SP47]" id="SP47" style="border: 1px solid black;" tp3="特码"
                                                   tp2="47" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorR">
                                            <label for="SP08">
                                                08
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP08"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="8" maxlength="5"
                                                   name="num[SP08]" id="SP08" style="border: 1px solid black;" tp3="特码"
                                                   tp2="08" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP18">
                                                18
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP18"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="18" maxlength="5"
                                                   name="num[SP18]" id="SP18" style="border: 1px solid black;" tp3="特码"
                                                   tp2="18" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP28">
                                                28
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP28"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="28" maxlength="5"
                                                   name="num[SP28]" id="SP28" style="border: 1px solid black;" tp3="特码"
                                                   tp2="28" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP38">
                                                38
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP38"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="38" maxlength="5"
                                                   name="num[SP38]" id="SP38" style="border: 1px solid black;" tp3="特码"
                                                   tp2="38" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP48">
                                                48
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP48"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="48" maxlength="5"
                                                   name="num[SP48]" id="SP48" style="border: 1px solid black;" tp3="特码"
                                                   tp2="48" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP09">
                                                09
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP09"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="9" maxlength="5"
                                                   name="num[SP09]" id="SP09" style="border: 1px solid black;" tp3="特码"
                                                   tp2="09" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP19">
                                                19
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP19"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="19" maxlength="5"
                                                   name="num[SP19]" id="SP19" style="border: 1px solid black;" tp3="特码"
                                                   tp2="19" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP29">
                                                29
                                            </label>
                                        </td>
                                        <td style="">
                                            <label for="SP29"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="29" maxlength="5"
                                                   name="num[SP29]" id="SP29" style="border: 1px solid black;" tp3="特码"
                                                   tp2="29" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP39">
                                                39
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP39"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="39" maxlength="5"
                                                   name="num[SP39]" id="SP39" style="border: 1px solid black;" tp3="特码"
                                                   tp2="39" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP49">
                                                49
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP49"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="49" maxlength="5"
                                                   name="num[SP49]" id="SP49" style="border: 1px solid black;" tp3="特码"
                                                   tp2="49" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP10">
                                                10
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP10"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="10" maxlength="5"
                                                   name="num[SP10]" id="SP10" style="border: 1px solid black;" tp3="特码"
                                                   tp2="10" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP20">
                                                20
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP20"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="20" maxlength="5"
                                                   name="num[SP20]" id="SP20" style="border: 1px solid black;" tp3="特码"
                                                   tp2="20" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP30">
                                                30
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP30"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="30" maxlength="5"
                                                   name="num[SP30]" id="SP30" style="border: 1px solid black;" tp3="特码"
                                                   tp2="30" rate="" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP40">
                                                40
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP40"></label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="40" maxlength="5"
                                                   name="num[SP40]" id="SP40" style="border: 1px solid black;" tp3="特码"
                                                   tp2="40" rate="" autocomplete="off">
                                        </td>
                                        <td colspan="3"></td>
                                    </tr>

                                    </tbody>
                                </table>

                                <table cellpadding="0" class="QuickTab" style="margin-top: 12px;">
                                    <tbody>
                                    <tr class="title_tr">
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>
                                        <td width="6%">
                                            号码
                                        </td>
                                        <td width="7%">
                                            赔率
                                        </td>
                                        <td width="7%">
                                            金额
                                        </td>

                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="title_td">
                                            <label for="SP_ODD">
                                                特单
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_ODD">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="49" maxlength="5"
                                                   name="SP_ODD" id="SP_ODD" style="border: 1px solid black;" tp3="特码单双"
                                                   tp2="单" rate="" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_EVEN">
                                                特双
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_EVEN">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="50" maxlength="5"
                                                   name="SP_EVEN" id="SP_EVEN" style="border: 1px solid black;"
                                                   tp3="特码单双" tp2="双" rate="" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_OVER">
                                                特大
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_OVER">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="51" maxlength="5"
                                                   name="SP_OVER" id="SP_OVER" style="border: 1px solid black;"
                                                   tp3="特码大小" tp2="大" rate="" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_UNDER">
                                                特小
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_UNDER">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="52" maxlength="5"
                                                   name="SP_UNDER" id="SP_UNDER" style="border: 1px solid black;"
                                                   tp3="特码大小" tp2="小" rate="" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="title_td">
                                            <label for="SP_SODD">
                                                合单
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_SODD">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="53" maxlength="5"
                                                   name="SP_SODD" id="SP_SODD" style="border: 1px solid black;"
                                                   tp3="特码合码单双" tp2="合单" rate="" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_SEVEN">
                                                合双
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_SEVEN">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="54" maxlength="5"
                                                   name="SP_SEVEN" id="SP_SEVEN" style="border: 1px solid black;"
                                                   tp3="特码合码单双" tp2="合双" rate="" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_SOVER">
                                                合大
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_SOVER">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="55" maxlength="5"
                                                   name="SP_SOVER" id="SP_SOVER" style="border: 1px solid black;"
                                                   tp3="特码合码大小" tp2="合大" rate="" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_SUNDER">
                                                合小
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_SUNDER">1.96</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="56" maxlength="5"
                                                   name="SP_SUNDER" id="SP_SUNDER" style="border: 1px solid black;"
                                                   tp3="特码合码大小" tp2="合小" rate="" autocomplete="off">
                                        </td>
                                    </tr>


                                    <tr style="text-align: center;">
                                        <td class="title_td">
                                            <label for="SP_R">
                                                红波
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_R">2.7</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="67" maxlength="5" name="SP_R"
                                                   id="SP_R" style="border: 1px solid black;" tp3="特码色波" tp2="红波"
                                                   rate="2.7" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_G">
                                                绿波
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_G">2.85</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="68" maxlength="5" name="SP_G"
                                                   id="SP_G" style="border: 1px solid black;" tp3="特码色波" tp2="绿波"
                                                   rate="2.85" autocomplete="off">
                                        </td>
                                        <td class="title_td">
                                            <label for="SP_B">
                                                蓝波
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP_B">2.85</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="69" maxlength="5" name="SP_B"
                                                   id="SP_B" style="border: 1px solid black;" tp3="特码色波" tp2="蓝波"
                                                   rate="2.85" autocomplete="off">
                                        </td>
                                        <td colspan="3"></td>
                                    </tr>

                                    </tbody>
                                </table>

                                <div class="ksmsbtnarea">

                                    {{--<div class="addlist">--}}
                                    {{--<img src="{{ asset('/css/honghu.jpg') }}" id="btnksmstobet">--}}
                                    {{--</div>--}}
                                    <div class="addlist select_info_text">
                                        <a id="btnksmstobet">添加到投注列表</a>
                                    </div>
                                    {{--<div id="clearbtn" onclick="clearInput()">清除</div>--}}

                                </div>

                            </div>
                            <div id="tm_ybms" class="tm_ms" style="display: none;">
                                <div class="content_left" style="">
                                    <div id="HKMS-NUM">
                                        <div class="ball" style="display: block;">
                                            <a href="javascript:void(0);" id="NUM_1" wf="定位" tp2="01" tp3="特码"
                                               rate="">
                                                <span>01</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_2" wf="定位" tp2="02" tp3="特码"
                                                   rate="">
                                                <span>02</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_3" wf="定位" tp2="03" tp3="特码"
                                                   rate="">
                                                <span>03</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_4" wf="定位" tp2="04" tp3="特码"
                                                   rate="">
                                                <span>04</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_5" wf="定位" tp2="05" tp3="特码"
                                                   rate="">
                                                <span>05</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_6" wf="定位" tp2="06" tp3="特码"
                                                   rate="">
                                                <span>06</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_7" wf="定位" tp2="07" tp3="特码"
                                                   rate="">
                                                <span>07</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_8" wf="定位" tp2="08" tp3="特码"
                                                   rate="">
                                                <span>08</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_9" wf="定位" tp2="09" tp3="特码"
                                                   rate="">
                                                <span>09</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_10" wf="定位" tp2="10" tp3="特码"
                                               rate="">
                                                <span>10</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_11" wf="定位" tp2="11" tp3="特码"
                                               rate="">
                                                <span>11</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_12" wf="定位" tp2="12" tp3="特码"
                                                   rate="">
                                                <span>12</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_13" wf="定位" tp2="13" tp3="特码"
                                                   rate="">
                                                <span>13</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_14" wf="定位" tp2="14" tp3="特码"
                                                   rate="">
                                                <span>14</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_15" wf="定位" tp2="15" tp3="特码"
                                                   rate="">
                                                <span>15</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_16" wf="定位" tp2="16" tp3="特码"
                                                   rate="">
                                                <span>16</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_17" wf="定位" tp2="17" tp3="特码"
                                                   rate="">
                                                <span>17</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_18" wf="定位" tp2="18" tp3="特码"
                                                   rate="">
                                                <span>18</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_19" wf="定位" tp2="19" tp3="特码"
                                                   rate="">
                                                <span>19</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_20" wf="定位" tp2="20" tp3="特码"
                                               rate="">
                                                <span>20</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_21" wf="定位" tp2="21" tp3="特码"
                                               rate="">
                                                <span>21</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_22" wf="定位" tp2="22" tp3="特码"
                                                   rate="">
                                                <span>22</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_23" wf="定位" tp2="23" tp3="特码"
                                                   rate="">
                                                <span>23</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_24" wf="定位" tp2="24" tp3="特码"
                                                   rate="">
                                                <span>24</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_25" wf="定位" tp2="25" tp3="特码"
                                                   rate="">
                                                <span>25</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_26" wf="定位" tp2="26" tp3="特码"
                                                   rate="">
                                                <span>26</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_27" wf="定位" tp2="27" tp3="特码"
                                                   rate="">
                                                <span>27</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_28" wf="定位" tp2="28" tp3="特码"
                                                   rate="">
                                                <span>28</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_29" wf="定位" tp2="29" tp3="特码"
                                                   rate="">
                                                <span>29</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_30" wf="定位" tp2="30" tp3="特码"
                                               rate="">
                                                <span>30</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_31" wf="定位" tp2="31" tp3="特码"
                                               rate="">
                                                <span>31</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_32" wf="定位" tp2="32" tp3="特码"
                                                   rate="">
                                                <span>32</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_33" wf="定位" tp2="33" tp3="特码"
                                                   rate="">
                                                <span>33</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_34" wf="定位" tp2="34" tp3="特码"
                                                   rate="">
                                                <span>34</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_35" wf="定位" tp2="35" tp3="特码"
                                                   rate="">
                                                <span>35</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_36" wf="定位" tp2="36" tp3="特码"
                                                   rate="">
                                                <span>36</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_37" wf="定位" tp2="37" tp3="特码"
                                                   rate="">
                                                <span>37</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_38" wf="定位" tp2="38" tp3="特码"
                                                   rate="">
                                                <span>38</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_39" wf="定位" tp2="39" tp3="特码"
                                                   rate="">
                                                <span>39</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_40" wf="定位" tp2="40" tp3="特码"
                                               rate="">
                                                <span>40</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_41" wf="定位" tp2="41" tp3="特码"
                                               rate="">
                                                <span>41</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_42" wf="定位" tp2="42" tp3="特码"
                                                   rate="">
                                                <span>42</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_43" wf="定位" tp2="43" tp3="特码"
                                                   rate="">
                                                <span>43</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_44" wf="定位" tp2="44" tp3="特码"
                                                   rate="">
                                                <span>44</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_45" wf="定位" tp2="45" tp3="特码"
                                                   rate="">
                                                <span>45</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_46" wf="定位" tp2="46" tp3="特码"
                                                   rate="">
                                                <span>46</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_47" wf="定位" tp2="47" tp3="特码"
                                                   rate="">
                                                <span>47</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_48" wf="定位" tp2="48" tp3="特码"
                                                   rate="">
                                                <span>48</span>
                                                <label></label>
                                            </a><a href="javascript:void(0);" id="NUM_49" wf="定位" tp2="49" tp3="特码"
                                                   rate="">
                                                <span>49</span>
                                                <label></label>
                                            </a>

                                        </div>

                                        <div class="banball" style="display: none;">
                                            <div id="Mask"></div>
                                            <div>
                                                <a href="javascript:void(0);" id="NUM_1" wf="定位" tp2="01" tp3="特码"
                                                   rate="">
                                                    <span>01</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_2" wf="定位" tp2="02" tp3="特码"
                                                       rate="">
                                                    <span>02</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_7" wf="定位" tp2="07" tp3="特码"
                                                       rate="">
                                                    <span>07</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_8" wf="定位" tp2="08" tp3="特码"
                                                       rate="">
                                                    <span>08</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_12" wf="定位" tp2="12" tp3="特码"
                                                       rate="">
                                                    <span>12</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_13" wf="定位" tp2="13" tp3="特码"
                                                       rate="">
                                                    <span>13</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_18" wf="定位" tp2="18" tp3="特码"
                                                       rate="">
                                                    <span>18</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_19" wf="定位" tp2="19" tp3="特码"
                                                       rate="">
                                                    <span>19</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_23" wf="定位" tp2="23" tp3="特码"
                                                       rate="">
                                                    <span>23</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_24" wf="定位" tp2="24" tp3="特码"
                                                   rate="">
                                                    <span>24</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_29" wf="定位" tp2="29" tp3="特码"
                                                   rate="">
                                                    <span>29</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_30" wf="定位" tp2="30" tp3="特码"
                                                   rate="">
                                                    <span>30</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_34" wf="定位" tp2="34" tp3="特码"
                                                       rate="">
                                                    <span>34</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_35" wf="定位" tp2="35" tp3="特码"
                                                       rate="">
                                                    <span>35</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_40" wf="定位" tp2="40" tp3="特码"
                                                       rate="">
                                                    <span>40</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_45" wf="定位" tp2="45" tp3="特码"
                                                       rate="">
                                                    <span>45</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_46" wf="定位" tp2="46" tp3="特码"
                                                       rate="">
                                                    <span>46</span>
                                                    <label></label>
                                                </a>
                                            </div>
                                            <div style="clear:both;">
                                                <a href="javascript:void(0);" id="NUM_3" wf="定位" tp2="3" tp3="特码">
                                                    <span>3</span>
                                                    <label>0</label>
                                                </a><a href="javascript:void(0);" id="NUM_4" wf="定位" tp2="4" tp3="特码">
                                                    <span>4</span>
                                                    <label>0</label>
                                                </a><a href="javascript:void(0);" id="NUM_9" wf="定位" tp2="9" tp3="特码">
                                                    <span>9</span>
                                                    <label>0</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_10" wf="定位" tp2="10" tp3="特码"
                                                   rate="">
                                                    <span>10</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_14" wf="定位" tp2="14" tp3="特码"
                                                   rate="">
                                                    <span>14</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_15" wf="定位" tp2="15" tp3="特码"
                                                       rate="">
                                                    <span>15</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_20" wf="定位" tp2="20" tp3="特码"
                                                       rate="">
                                                    <span>20</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_25" wf="定位" tp2="25" tp3="特码"
                                                       rate="">
                                                    <span>25</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_26" wf="定位" tp2="26" tp3="特码"
                                                       rate="">
                                                    <span>26</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_31" wf="定位" tp2="31" tp3="特码"
                                                       rate="">
                                                    <span>31</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_36" wf="定位" tp2="36" tp3="特码"
                                                       rate="">
                                                    <span>36</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_37" wf="定位" tp2="37" tp3="特码"
                                                       rate="">
                                                    <span>37</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_41" wf="定位" tp2="41" tp3="特码"
                                                       rate="">
                                                    <span>41</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_42" wf="定位" tp2="42" tp3="特码"
                                                   rate="">
                                                    <span>42</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_47" wf="定位" tp2="47" tp3="特码"
                                                   rate="">
                                                    <span>47</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_48" wf="定位" tp2="48" tp3="特码"
                                                       rate="">
                                                    <span>48</span>
                                                    <label></label>
                                                </a>
                                            </div>
                                            <div style="clear:both;">
                                                <a href="javascript:void(0);" id="NUM_5" wf="定位" tp2="5" tp3="特码">
                                                    <span>5</span>
                                                    <label>0</label>
                                                </a><a href="javascript:void(0);" id="NUM_6" wf="定位" tp2="6" tp3="特码">
                                                    <span>6</span>
                                                    <label>0</label>
                                                </a><a href="javascript:void(0);" id="NUM_11" wf="定位" tp2="11" tp3="特码"
                                                       rate="">
                                                    <span>11</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_16" wf="定位" tp2="16" tp3="特码"
                                                       rate="">
                                                    <span>16</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_17" wf="定位" tp2="17" tp3="特码"
                                                       rate="">
                                                    <span>17</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_21" wf="定位" tp2="21" tp3="特码"
                                                       rate="">
                                                    <span>21</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_22" wf="定位" tp2="22" tp3="特码"
                                                       rate="">
                                                    <span>22</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_27" wf="定位" tp2="27" tp3="特码"
                                                   rate="">
                                                    <span>27</span>
                                                    <label></label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_28" wf="定位" tp2="28" tp3="特码"
                                                   rate="">
                                                    <span>28</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_32" wf="定位" tp2="32" tp3="特码"
                                                       rate="">
                                                    <span>32</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_33" wf="定位" tp2="33" tp3="特码"
                                                       rate="">
                                                    <span>33</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_38" wf="定位" tp2="38" tp3="特码"
                                                       rate="">
                                                    <span>38</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_39" wf="定位" tp2="39" tp3="特码"
                                                       rate="">
                                                    <span>39</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_43" wf="定位" tp2="43" tp3="特码"
                                                       rate="">
                                                    <span>43</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_44" wf="定位" tp2="44" tp3="特码"
                                                       rate="">
                                                    <span>44</span>
                                                    <label></label>
                                                </a><a href="javascript:void(0);" id="NUM_49" wf="定位" tp2="49" tp3="特码"
                                                       rate="">
                                                    <span>49</span>
                                                    <label></label>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="content_right" style="display: block;">

                                    <div id="HKMS-DSDX" style="display: block;">

                                        <div id="HKMS-NOE">
                                            <a href="javascript:void(0);" id="NOE_1" wf="单双" tp2="单" tp3="特码单双"
                                               rate="">
                                                <span>单</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NOE_2" wf="单双" tp2="双" tp3="特码单双"
                                               rate="">
                                                <span>双</span>
                                                <label></label>
                                            </a>

                                        </div>
                                        <div id="HKMS-NOU" style="width:220px; margin:10px auto;">
                                            <a href="javascript:void(0);" id="NOU_1" wf="大小" tp2="大" tp3="特码大小"
                                               rate="">
                                                <span>大</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="NOU_2" wf="大小" tp2="小" tp3="特码大小"
                                               rate="">
                                                <span>小</span>
                                                <label></label>
                                            </a>

                                        </div>
                                        <div id="HKMS-DSOE" style="width:220px; margin:5px auto;  ">
                                            <a href="javascript:void(0);" id="DSOE_1" wf="合码单双" tp2="合单" tp3="特码合码单双"
                                               rate="">
                                                <span>合单</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0);" id="DSOE_2" wf="合码单双" tp2="合双" tp3="特码合码单双"
                                               rate="">
                                                <span>合双</span>
                                                <label></label>
                                            </a>

                                        </div>
                                    </div>
                                    <div id="HKMS-COR" align="center" style="display: block;">
                                        <a href="javascript:void(0);" id="COR_R" wf="色波" tp2="红波" tp3="特码色波" rate="2.7">
                                            <span>红波</span>
                                            <label>2.7</label>
                                        </a>
                                        <a href="javascript:void(0);" id="COR_G" wf="色波" tp2="绿波" tp3="特码色波"
                                           rate="2.85">
                                            <span>绿波</span>
                                            <label>2.85</label>
                                        </a>
                                        <a href="javascript:void(0);" id="COR_B" wf="色波" tp2="蓝波" tp3="特码色波"
                                           rate="2.85">
                                            <span>蓝波</span>
                                            <label>2.85</label>
                                        </a>

                                    </div>

                                    <div id="HKMS-BANBO" style="display: none;">
                                        <div>
                                            <a href="javascript:void(0)" id="HONG-D" wf="单双" tp2="红单" tp3="特码单双"
                                               rate="5.61">
                                                <span>红单</span>
                                                <label>5.61</label>
                                            </a>
                                            <a href="javascript:void(0)" id="HONG-S" wf="单双" tp2="红双" tp3="特码单双"
                                               rate="5.06">
                                                <span>红双</span>
                                                <label>5.06</label>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0)" id="HONG-DA" wf="大小" tp2="红大" tp3="特码大小"
                                               rate="6.51">
                                                <span>红大</span>
                                                <label>6.51</label>
                                            </a>
                                            <a href="javascript:void(0)" id="HONG-X" wf="大小" tp2="红小" tp3="特码大小"
                                               rate="4.51">
                                                <span>红小</span>
                                                <label>4.51</label>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="javascript:void(0)" id="LANG-D" wf="单双" tp2="蓝单" tp3="特码单双"
                                               rate="">
                                                <span>蓝单</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0)" id="LANG-S" wf="单双" tp2="蓝双" tp3="特码单双"
                                               rate="">
                                                <span>蓝双</span>
                                                <label></label>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0)" id="LANG-DA" wf="大小" tp2="蓝大" tp3="特码大小"
                                               rate="">
                                                <span>蓝大</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0)" id="LANG-X" wf="大小" tp2="蓝小" tp3="特码大小"
                                               rate="">
                                                <span>蓝小</span>
                                                <label></label>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="javascript:void(0)" id="LU-D" wf="单双" tp2="绿单" tp3="特码单双"
                                               rate="">
                                                <span>绿单</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0)" id="LU-S" wf="单双" tp2="绿双" tp3="特码单双"
                                               rate="">
                                                <span>绿双</span>
                                                <label></label>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0)" id="LU-DA" wf="大小" tp2="绿大" tp3="特码大小"
                                               rate="">
                                                <span>绿大</span>
                                                <label></label>
                                            </a>
                                            <a href="javascript:void(0)" id="LU-X" wf="大小" tp2="绿小" tp3="特码大小"
                                               rate="">
                                                <span>绿小</span>
                                                <label></label>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

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
                        <div class="diybox" style="display: none;">
                            <span>倍投：</span> <span class="more_tool"><i class="minus"
                                                                        id="curamountsub">-</i> <input value="1"
                                                                                                       id="curamount"
                                                                                                       class="input1"
                                                                                                       onkeyup="this.value=this.value.replace(/\d/g,'')"
                                                                                                       onafterpaste="this.value=this.value.replace(/\d/g,'')"
                                                                                                       maxlength="8"
                                                                                                       type="text"/> <i
                                        id="curamountadd"
                                        class="add">+</i> </span>元 <span style="display: none;">倍(最多999倍)共<e
                                        class="c_727171"><strong class="c_ba2636">0</strong>注 <strong
                                            class="c_ba2636">0</strong>元
                                </e>
														</span>
                        </div>
                    </div>
                    <div class="paybox clear">
                        <input id="playType" value="TM_TM" type="hidden"/> <input
                                id="gameName" value="特码" type="hidden"/> <input
                                id="totalVals" value="0" type="hidden"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn-lg btn-danger" href="#" onclick="Sixhe.submit();return false">投注</a>
                        {{--<a href="#" class="submit_btn" onclick="Ssc.submit();return false;">立即投注</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="padding:0px">
                <div class="login_weizhi">
                    <div id="QuickBar"
                         style="padding-top: 100px;width: auto; min-height: 98px; max-height: none; height: auto;">
                        <div>
                            下注金额 :
                            <input type="text" size="10" class="GoldQQ" name="BetGold" id="BetGold"
                                   style="border: 1px solid black;" autocomplete="off" value="10"><br>
                        </div>
                        <div id="QuickMenu">

                            <fieldset>
                                <legend>单双大小</legend>
                                <input type="button" value="单" id="btn_odd">
                                <input type="button" value="双" id="btn_even">
                                <input type="button" value="大" id="btn_over">
                                <input type="button" value="小" id="btn_under">

                            </fieldset>
                            <fieldset>
                                <legend>色波</legend>
                                <input type="button" value="红波" id="btn_red">
                                <input type="button" value="蓝波" id="btn_blue">
                                <input type="button" value="绿波" id="btn_green">
                            </fieldset>

                            <fieldset>
                                <legend>生肖</legend>
                                <input type="button" value="鼠" id="btn_sp_a1">
                                <input type="button" value="牛" id="btn_sp_a2">
                                <input type="button" value="虎" id="btn_sp_a3">
                                <input type="button" value="兔" id="btn_sp_a4">
                                <input type="button" value="龙" id="btn_sp_a5">
                                <input type="button" value="蛇" id="btn_sp_a6"><br>
                                <input type="button" value="马" id="btn_sp_a7">
                                <input type="button" value="羊" id="btn_sp_a8">
                                <input type="button" value="猴" id="btn_sp_a9">
                                <input type="button" value="鸡" id="btn_sp_aa">
                                <input type="button" value="狗" id="btn_sp_ab">
                                <input type="button" value="猪" id="btn_sp_ac">
                            </fieldset>
                        </div>

                        <fieldset>
                            <legend></legend>
                            <input type="button" value="下注" id="btn_bet">
                            <input type="button" value="清除" id="btn_clear" onclick="clearInput()">

                        </fieldset>
                    </div>
                </div>
                <div class="blank4"></div>
                <div class="kj_open_box">
                    <div class="r_middle">
                        <div class="kjgg_box">
                            <div class="kjgg_tit">
                                <div class="kjgg_name">
                                    <h3>开奖公告</h3>
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
    {{--<script type="text/javascript" src="/js/jquery-1.8.3.min.js" defer="defer"></script>--}}
    <script type="text/javascript" src="/js/common.js"></script>
    {{--<script type="text/javascript" src="/js/layer.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/showdiog.js"></script>--}}
    {{--<script type="text/javascript" src="/js/jquery.blockUI.js"></script>--}}
    <script type="text/javascript" src="/js/6he.js"></script>
    <script type="text/javascript" src="/js/Lottery.js"></script>
    {{--<script type="text/javascript" src="/js/jquery-ui.min.js"></script>--}}
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
            setTimeout(function () {

                $("#btnybms").click();
            }, 500);
        });
    </script>
@stop
