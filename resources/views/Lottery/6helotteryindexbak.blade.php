@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    香港六合彩
@stop
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/layer.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/6he.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery-ui.min.css') }}">--}}
    <style type="text/css">
    </style>
    <script type="text/javascript">
        {{--var lottery_type = '{{$config['lotterytype']}}';--}}
        {{--var num ={{$lotterystatus[$config['lotterytype']]['num']}};--}}
        tbmplus=5.5 ;
        XiaoNums="[{&#39;xiao&#39;:&#39;鼠&#39;,&#39;nums&#39;:&#39;08.20.32.44&#39;},{&#39;xiao&#39;:&#39;牛&#39;,&#39;nums&#39;:&#39;07.19.31.43&#39;},{&#39;xiao&#39;:&#39;虎&#39;,&#39;nums&#39;:&#39;06.18.30.42&#39;},{&#39;xiao&#39;:&#39;兔&#39;,&#39;nums&#39;:&#39;05.17.29.41&#39;},{&#39;xiao&#39;:&#39;龙&#39;,&#39;nums&#39;:&#39;04.16.28.40&#39;},{&#39;xiao&#39;:&#39;蛇&#39;,&#39;nums&#39;:&#39;03.15.27.39&#39;},{&#39;xiao&#39;:&#39;马&#39;,&#39;nums&#39;:&#39;02.14.26.38&#39;},{&#39;xiao&#39;:&#39;羊&#39;,&#39;nums&#39;:&#39;01.13.25.37.49&#39;},{&#39;xiao&#39;:&#39;猴&#39;,&#39;nums&#39;:&#39;12.24.36.48&#39;},{&#39;xiao&#39;:&#39;鸡&#39;,&#39;nums&#39;:&#39;11.23.35.47&#39;},{&#39;xiao&#39;:&#39;狗&#39;,&#39;nums&#39;:&#39;10.22.34.46&#39;},{&#39;xiao&#39;:&#39;猪&#39;,&#39;nums&#39;:&#39;09.21.33.45&#39;}]";
    </script>
@stop
@section('content')
    <div class="container" style="min-width: 500px">
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
                        <span class="yaoshao">10分钟一期,返奖率80%</span> <span class="yaoshao">销售时间：
                            {{--                            {{$config ['beginTime'] . '-' . $config ['endTime']}}--}}
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
                                    <li id="btnksms" disid="tm_ksms" class="selected">
                                        快速模式
                                    </li>
                                    <li disid="tm_ybms" class="">
                                        一般模式
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
                                            <label for="SP01">48.5</label>
                                        </td>
                                        <td>

                                            <input type="text" value="" size="4" tabindex="1" maxlength="5"
                                                   name="num[SP01]" id="SP01" style="border: 1px solid black;" tp3="特码"
                                                   tp2="01" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP11">
                                                11
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP11">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="11" maxlength="5"
                                                   name="num[SP11]" id="SP11" style="border: 1px solid black;" tp3="特码"
                                                   tp2="11" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP21">
                                                21
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP21">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="21" maxlength="5"
                                                   name="num[SP21]" id="SP21" style="border: 1px solid black;" tp3="特码"
                                                   tp2="21" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP31">
                                                31
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP31">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="31" maxlength="5"
                                                   name="num[SP31]" id="SP31" style="border: 1px solid black;" tp3="特码"
                                                   tp2="31" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP41">
                                                41
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP41">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="41" maxlength="5"
                                                   name="num[SP41]" id="SP41" style="border: 1px solid black;" tp3="特码"
                                                   tp2="41" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorR">
                                            <label for="SP02">
                                                02
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP02">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="2" maxlength="5"
                                                   name="num[SP02]" id="SP02" style="border: 1px solid black;" tp3="特码"
                                                   tp2="02" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP12">
                                                12
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP12">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="12" maxlength="5"
                                                   name="num[SP12]" id="SP12" style="border: 1px solid black;" tp3="特码"
                                                   tp2="12" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP22">
                                                22
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP22">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="22" maxlength="5"
                                                   name="num[SP22]" id="SP22" style="border: 1px solid black;" tp3="特码"
                                                   tp2="22" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP32">
                                                32
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP32">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="32" maxlength="5"
                                                   name="num[SP32]" id="SP32" style="border: 1px solid black;" tp3="特码"
                                                   tp2="32" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP42">
                                                42
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP42">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="42" maxlength="5"
                                                   name="num[SP42]" id="SP42" style="border: 1px solid black;" tp3="特码"
                                                   tp2="42" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP03">
                                                03
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP03">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="3" maxlength="5"
                                                   name="num[SP03]" id="SP03" style="border: 1px solid black;" tp3="特码"
                                                   tp2="03" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP13">
                                                13
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP13">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="13" maxlength="5"
                                                   name="num[SP13]" id="SP13" style="border: 1px solid black;" tp3="特码"
                                                   tp2="13" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP23">
                                                23
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP23">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="23" maxlength="5"
                                                   name="num[SP23]" id="SP23" style="border: 1px solid black;" tp3="特码"
                                                   tp2="23" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP33">
                                                33
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP33">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="33" maxlength="5"
                                                   name="num[SP33]" id="SP33" style="border: 1px solid black;" tp3="特码"
                                                   tp2="33" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP43">
                                                43
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP43">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="43" maxlength="5"
                                                   name="num[SP43]" id="SP43" style="border: 1px solid black;" tp3="特码"
                                                   tp2="43" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP04">
                                                04
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP04">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="4" maxlength="5"
                                                   name="num[SP04]" id="SP04" style="border: 1px solid black;" tp3="特码"
                                                   tp2="04" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP14">
                                                14
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP14">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="14" maxlength="5"
                                                   name="num[SP14]" id="SP14" style="border: 1px solid black;" tp3="特码"
                                                   tp2="14" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP24">
                                                24
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP24">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="24" maxlength="5"
                                                   name="num[SP24]" id="SP24" style="border: 1px solid black;" tp3="特码"
                                                   tp2="24" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP34">
                                                34
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP34">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="34" maxlength="5"
                                                   name="num[SP34]" id="SP34" style="border: 1px solid black;" tp3="特码"
                                                   tp2="34" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP44">
                                                44
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP44">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="44" maxlength="5"
                                                   name="num[SP44]" id="SP44" style="border: 1px solid black;" tp3="特码"
                                                   tp2="44" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorG">
                                            <label for="SP05">
                                                05
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP05">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="5" maxlength="5"
                                                   name="num[SP05]" id="SP05" style="border: 1px solid black;" tp3="特码"
                                                   tp2="05" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP15">
                                                15
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP15">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="15" maxlength="5"
                                                   name="num[SP15]" id="SP15" style="border: 1px solid black;" tp3="特码"
                                                   tp2="15" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP25">
                                                25
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP25">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="25" maxlength="5"
                                                   name="num[SP25]" id="SP25" style="border: 1px solid black;" tp3="特码"
                                                   tp2="25" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP35">
                                                35
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP35">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="35" maxlength="5"
                                                   name="num[SP35]" id="SP35" style="border: 1px solid black;" tp3="特码"
                                                   tp2="35" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP45">
                                                45
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP45">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="45" maxlength="5"
                                                   name="num[SP45]" id="SP45" style="border: 1px solid black;" tp3="特码"
                                                   tp2="45" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorG">
                                            <label for="SP06">
                                                06
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP06">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="6" maxlength="5"
                                                   name="num[SP06]" id="SP06" style="border: 1px solid black;" tp3="特码"
                                                   tp2="06" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP16">
                                                16
                                            </label>
                                        </td>
                                        <td style="">
                                            <label for="SP16">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="16" maxlength="5"
                                                   name="num[SP16]" id="SP16" style="border: 1px solid black;" tp3="特码"
                                                   tp2="16" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP26">
                                                26
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP26">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="26" maxlength="5"
                                                   name="num[SP26]" id="SP26" style="border: 1px solid black;" tp3="特码"
                                                   tp2="26" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP36">
                                                36
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP36">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="36" maxlength="5"
                                                   name="num[SP36]" id="SP36" style="border: 1px solid black;" tp3="特码"
                                                   tp2="36" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP46">
                                                46
                                            </label>
                                        </td>
                                        <td style="">
                                            <label for="SP46">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="46" maxlength="5"
                                                   name="num[SP46]" id="SP46" style="border: 1px solid black;" tp3="特码"
                                                   tp2="46" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorR">
                                            <label for="SP07">
                                                07
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP07">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="7" maxlength="5"
                                                   name="num[SP07]" id="SP07" style="border: 1px solid black;" tp3="特码"
                                                   tp2="07" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP17">
                                                17
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP17">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="17" maxlength="5"
                                                   name="num[SP17]" id="SP17" style="border: 1px solid black;" tp3="特码"
                                                   tp2="17" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP27">
                                                27
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP27">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="27" maxlength="5"
                                                   name="num[SP27]" id="SP27" style="border: 1px solid black;" tp3="特码"
                                                   tp2="27" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB" style="">
                                            <label for="SP37">
                                                37
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP37">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="37" maxlength="5"
                                                   name="num[SP37]" id="SP37" style="border: 1px solid black;" tp3="特码"
                                                   tp2="37" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP47">
                                                47
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP47">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="47" maxlength="5"
                                                   name="num[SP47]" id="SP47" style="border: 1px solid black;" tp3="特码"
                                                   tp2="47" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorR">
                                            <label for="SP08">
                                                08
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP08">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="8" maxlength="5"
                                                   name="num[SP08]" id="SP08" style="border: 1px solid black;" tp3="特码"
                                                   tp2="08" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP18">
                                                18
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP18">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="18" maxlength="5"
                                                   name="num[SP18]" id="SP18" style="border: 1px solid black;" tp3="特码"
                                                   tp2="18" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP28">
                                                28
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP28">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="28" maxlength="5"
                                                   name="num[SP28]" id="SP28" style="border: 1px solid black;" tp3="特码"
                                                   tp2="28" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP38">
                                                38
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP38">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="38" maxlength="5"
                                                   name="num[SP38]" id="SP38" style="border: 1px solid black;" tp3="特码"
                                                   tp2="38" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP48">
                                                48
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP48">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="48" maxlength="5"
                                                   name="num[SP48]" id="SP48" style="border: 1px solid black;" tp3="特码"
                                                   tp2="48" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP09">
                                                09
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP09">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="9" maxlength="5"
                                                   name="num[SP09]" id="SP09" style="border: 1px solid black;" tp3="特码"
                                                   tp2="09" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP19">
                                                19
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP19">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="19" maxlength="5"
                                                   name="num[SP19]" id="SP19" style="border: 1px solid black;" tp3="特码"
                                                   tp2="19" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP29">
                                                29
                                            </label>
                                        </td>
                                        <td style="">
                                            <label for="SP29">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="29" maxlength="5"
                                                   name="num[SP29]" id="SP29" style="border: 1px solid black;" tp3="特码"
                                                   tp2="29" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP39">
                                                39
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP39">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="39" maxlength="5"
                                                   name="num[SP39]" id="SP39" style="border: 1px solid black;" tp3="特码"
                                                   tp2="39" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorG">
                                            <label for="SP49">
                                                49
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP49">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="49" maxlength="5"
                                                   name="num[SP49]" id="SP49" style="border: 1px solid black;" tp3="特码"
                                                   tp2="49" rate="48.5" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td class="bColorB">
                                            <label for="SP10">
                                                10
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP10">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="10" maxlength="5"
                                                   name="num[SP10]" id="SP10" style="border: 1px solid black;" tp3="特码"
                                                   tp2="10" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorB">
                                            <label for="SP20">
                                                20
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP20">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="20" maxlength="5"
                                                   name="num[SP20]" id="SP20" style="border: 1px solid black;" tp3="特码"
                                                   tp2="20" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP30">
                                                30
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP30">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="30" maxlength="5"
                                                   name="num[SP30]" id="SP30" style="border: 1px solid black;" tp3="特码"
                                                   tp2="30" rate="48.5" autocomplete="off">
                                        </td>
                                        <td class="bColorR">
                                            <label for="SP40">
                                                40
                                            </label>
                                        </td>
                                        <td>
                                            <label for="SP40">48.5</label>
                                        </td>
                                        <td>
                                            <input type="text" value="" size="4" tabindex="40" maxlength="5"
                                                   name="num[SP40]" id="SP40" style="border: 1px solid black;" tp3="特码"
                                                   tp2="40" rate="48.5" autocomplete="off">
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
                                                   tp2="单" rate="1.96" autocomplete="off">
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
                                                   tp3="特码单双" tp2="双" rate="1.96" autocomplete="off">
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
                                                   tp3="特码大小" tp2="大" rate="1.96" autocomplete="off">
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
                                                   tp3="特码大小" tp2="小" rate="1.96" autocomplete="off">
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
                                                   tp3="特码合码单双" tp2="合单" rate="1.96" autocomplete="off">
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
                                                   tp3="特码合码单双" tp2="合双" rate="1.96" autocomplete="off">
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
                                                   tp3="特码合码大小" tp2="合大" rate="1.96" autocomplete="off">
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
                                                   tp3="特码合码大小" tp2="合小" rate="1.96" autocomplete="off">
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
                                    <div id="clearbtn" onclick="clearInput()">清除</div>

                                </div>

                            </div>
                            <div id="tm_ybms" class="tm_ms" style="display: none;">
                                <div class="content_left" style="">
                                    <div id="HKMS-NUM">
                                        <div class="ball" style="display: block;">
                                            <a href="javascript:void(0);" id="NUM_1" wf="定位" tp2="01" tp3="特码"
                                               rate="48.5">
                                                <span>01</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_2" wf="定位" tp2="02" tp3="特码"
                                                   rate="48.5">
                                                <span>02</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_3" wf="定位" tp2="03" tp3="特码"
                                                   rate="48.5">
                                                <span>03</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_4" wf="定位" tp2="04" tp3="特码"
                                                   rate="48.5">
                                                <span>04</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_5" wf="定位" tp2="05" tp3="特码"
                                                   rate="48.5">
                                                <span>05</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_6" wf="定位" tp2="06" tp3="特码"
                                                   rate="48.5">
                                                <span>06</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_7" wf="定位" tp2="07" tp3="特码"
                                                   rate="48.5">
                                                <span>07</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_8" wf="定位" tp2="08" tp3="特码"
                                                   rate="48.5">
                                                <span>08</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_9" wf="定位" tp2="09" tp3="特码"
                                                   rate="48.5">
                                                <span>09</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_10" wf="定位" tp2="10" tp3="特码"
                                               rate="48.5">
                                                <span>10</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_11" wf="定位" tp2="11" tp3="特码"
                                               rate="48.5">
                                                <span>11</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_12" wf="定位" tp2="12" tp3="特码"
                                                   rate="48.5">
                                                <span>12</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_13" wf="定位" tp2="13" tp3="特码"
                                                   rate="48.5">
                                                <span>13</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_14" wf="定位" tp2="14" tp3="特码"
                                                   rate="48.5">
                                                <span>14</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_15" wf="定位" tp2="15" tp3="特码"
                                                   rate="48.5">
                                                <span>15</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_16" wf="定位" tp2="16" tp3="特码"
                                                   rate="48.5">
                                                <span>16</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_17" wf="定位" tp2="17" tp3="特码"
                                                   rate="48.5">
                                                <span>17</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_18" wf="定位" tp2="18" tp3="特码"
                                                   rate="48.5">
                                                <span>18</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_19" wf="定位" tp2="19" tp3="特码"
                                                   rate="48.5">
                                                <span>19</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_20" wf="定位" tp2="20" tp3="特码"
                                               rate="48.5">
                                                <span>20</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_21" wf="定位" tp2="21" tp3="特码"
                                               rate="48.5">
                                                <span>21</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_22" wf="定位" tp2="22" tp3="特码"
                                                   rate="48.5">
                                                <span>22</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_23" wf="定位" tp2="23" tp3="特码"
                                                   rate="48.5">
                                                <span>23</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_24" wf="定位" tp2="24" tp3="特码"
                                                   rate="48.5">
                                                <span>24</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_25" wf="定位" tp2="25" tp3="特码"
                                                   rate="48.5">
                                                <span>25</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_26" wf="定位" tp2="26" tp3="特码"
                                                   rate="48.5">
                                                <span>26</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_27" wf="定位" tp2="27" tp3="特码"
                                                   rate="48.5">
                                                <span>27</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_28" wf="定位" tp2="28" tp3="特码"
                                                   rate="48.5">
                                                <span>28</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_29" wf="定位" tp2="29" tp3="特码"
                                                   rate="48.5">
                                                <span>29</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_30" wf="定位" tp2="30" tp3="特码"
                                               rate="48.5">
                                                <span>30</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_31" wf="定位" tp2="31" tp3="特码"
                                               rate="48.5">
                                                <span>31</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_32" wf="定位" tp2="32" tp3="特码"
                                                   rate="48.5">
                                                <span>32</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_33" wf="定位" tp2="33" tp3="特码"
                                                   rate="48.5">
                                                <span>33</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_34" wf="定位" tp2="34" tp3="特码"
                                                   rate="48.5">
                                                <span>34</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_35" wf="定位" tp2="35" tp3="特码"
                                                   rate="48.5">
                                                <span>35</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_36" wf="定位" tp2="36" tp3="特码"
                                                   rate="48.5">
                                                <span>36</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_37" wf="定位" tp2="37" tp3="特码"
                                                   rate="48.5">
                                                <span>37</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_38" wf="定位" tp2="38" tp3="特码"
                                                   rate="48.5">
                                                <span>38</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_39" wf="定位" tp2="39" tp3="特码"
                                                   rate="48.5">
                                                <span>39</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_40" wf="定位" tp2="40" tp3="特码"
                                               rate="48.5">
                                                <span>40</span>
                                                <label>48.5</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NUM_41" wf="定位" tp2="41" tp3="特码"
                                               rate="48.5">
                                                <span>41</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_42" wf="定位" tp2="42" tp3="特码"
                                                   rate="48.5">
                                                <span>42</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_43" wf="定位" tp2="43" tp3="特码"
                                                   rate="48.5">
                                                <span>43</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_44" wf="定位" tp2="44" tp3="特码"
                                                   rate="48.5">
                                                <span>44</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_45" wf="定位" tp2="45" tp3="特码"
                                                   rate="48.5">
                                                <span>45</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_46" wf="定位" tp2="46" tp3="特码"
                                                   rate="48.5">
                                                <span>46</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_47" wf="定位" tp2="47" tp3="特码"
                                                   rate="48.5">
                                                <span>47</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_48" wf="定位" tp2="48" tp3="特码"
                                                   rate="48.5">
                                                <span>48</span>
                                                <label>48.5</label>
                                            </a><a href="javascript:void(0);" id="NUM_49" wf="定位" tp2="49" tp3="特码"
                                                   rate="48.5">
                                                <span>49</span>
                                                <label>48.5</label>
                                            </a>

                                        </div>

                                        <div class="banball" style="display: none;">
                                            <div id="Mask"></div>
                                            <div>
                                                <a href="javascript:void(0);" id="NUM_1" wf="定位" tp2="01" tp3="特码"
                                                   rate="48.5">
                                                    <span>01</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_2" wf="定位" tp2="02" tp3="特码"
                                                       rate="48.5">
                                                    <span>02</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_7" wf="定位" tp2="07" tp3="特码"
                                                       rate="48.5">
                                                    <span>07</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_8" wf="定位" tp2="08" tp3="特码"
                                                       rate="48.5">
                                                    <span>08</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_12" wf="定位" tp2="12" tp3="特码"
                                                       rate="48.5">
                                                    <span>12</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_13" wf="定位" tp2="13" tp3="特码"
                                                       rate="48.5">
                                                    <span>13</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_18" wf="定位" tp2="18" tp3="特码"
                                                       rate="48.5">
                                                    <span>18</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_19" wf="定位" tp2="19" tp3="特码"
                                                       rate="48.5">
                                                    <span>19</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_23" wf="定位" tp2="23" tp3="特码"
                                                       rate="48.5">
                                                    <span>23</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_24" wf="定位" tp2="24" tp3="特码"
                                                   rate="48.5">
                                                    <span>24</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_29" wf="定位" tp2="29" tp3="特码"
                                                   rate="48.5">
                                                    <span>29</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_30" wf="定位" tp2="30" tp3="特码"
                                                   rate="48.5">
                                                    <span>30</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_34" wf="定位" tp2="34" tp3="特码"
                                                       rate="48.5">
                                                    <span>34</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_35" wf="定位" tp2="35" tp3="特码"
                                                       rate="48.5">
                                                    <span>35</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_40" wf="定位" tp2="40" tp3="特码"
                                                       rate="48.5">
                                                    <span>40</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_45" wf="定位" tp2="45" tp3="特码"
                                                       rate="48.5">
                                                    <span>45</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_46" wf="定位" tp2="46" tp3="特码"
                                                       rate="48.5">
                                                    <span>46</span>
                                                    <label>48.5</label>
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
                                                   rate="48.5">
                                                    <span>10</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_14" wf="定位" tp2="14" tp3="特码"
                                                   rate="48.5">
                                                    <span>14</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_15" wf="定位" tp2="15" tp3="特码"
                                                       rate="48.5">
                                                    <span>15</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_20" wf="定位" tp2="20" tp3="特码"
                                                       rate="48.5">
                                                    <span>20</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_25" wf="定位" tp2="25" tp3="特码"
                                                       rate="48.5">
                                                    <span>25</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_26" wf="定位" tp2="26" tp3="特码"
                                                       rate="48.5">
                                                    <span>26</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_31" wf="定位" tp2="31" tp3="特码"
                                                       rate="48.5">
                                                    <span>31</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_36" wf="定位" tp2="36" tp3="特码"
                                                       rate="48.5">
                                                    <span>36</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_37" wf="定位" tp2="37" tp3="特码"
                                                       rate="48.5">
                                                    <span>37</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_41" wf="定位" tp2="41" tp3="特码"
                                                       rate="48.5">
                                                    <span>41</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_42" wf="定位" tp2="42" tp3="特码"
                                                   rate="48.5">
                                                    <span>42</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_47" wf="定位" tp2="47" tp3="特码"
                                                   rate="48.5">
                                                    <span>47</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_48" wf="定位" tp2="48" tp3="特码"
                                                       rate="48.5">
                                                    <span>48</span>
                                                    <label>48.5</label>
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
                                                       rate="48.5">
                                                    <span>11</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_16" wf="定位" tp2="16" tp3="特码"
                                                       rate="48.5">
                                                    <span>16</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_17" wf="定位" tp2="17" tp3="特码"
                                                       rate="48.5">
                                                    <span>17</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_21" wf="定位" tp2="21" tp3="特码"
                                                       rate="48.5">
                                                    <span>21</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_22" wf="定位" tp2="22" tp3="特码"
                                                       rate="48.5">
                                                    <span>22</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_27" wf="定位" tp2="27" tp3="特码"
                                                   rate="48.5">
                                                    <span>27</span>
                                                    <label>48.5</label>
                                                </a>
                                                <a href="javascript:void(0);" id="NUM_28" wf="定位" tp2="28" tp3="特码"
                                                   rate="48.5">
                                                    <span>28</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_32" wf="定位" tp2="32" tp3="特码"
                                                       rate="48.5">
                                                    <span>32</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_33" wf="定位" tp2="33" tp3="特码"
                                                       rate="48.5">
                                                    <span>33</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_38" wf="定位" tp2="38" tp3="特码"
                                                       rate="48.5">
                                                    <span>38</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_39" wf="定位" tp2="39" tp3="特码"
                                                       rate="48.5">
                                                    <span>39</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_43" wf="定位" tp2="43" tp3="特码"
                                                       rate="48.5">
                                                    <span>43</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_44" wf="定位" tp2="44" tp3="特码"
                                                       rate="48.5">
                                                    <span>44</span>
                                                    <label>48.5</label>
                                                </a><a href="javascript:void(0);" id="NUM_49" wf="定位" tp2="49" tp3="特码"
                                                       rate="48.5">
                                                    <span>49</span>
                                                    <label>48.5</label>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="content_right" style="display: block;">

                                    <div id="HKMS-DSDX" style="display: block;">

                                        <div id="HKMS-NOE">
                                            <a href="javascript:void(0);" id="NOE_1" wf="单双" tp2="单" tp3="特码单双"
                                               rate="1.96">
                                                <span> </span>
                                                <label>1.96</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NOE_2" wf="单双" tp2="双" tp3="特码单双"
                                               rate="1.96">
                                                <span> </span>
                                                <label>1.96</label>
                                            </a>

                                        </div>
                                        <div id="HKMS-NOU" style="width:220px; margin:10px auto;">
                                            <a href="javascript:void(0);" id="NOU_1" wf="大小" tp2="大" tp3="特码大小"
                                               rate="1.96">
                                                <span> </span>
                                                <label>1.96</label>
                                            </a>
                                            <a href="javascript:void(0);" id="NOU_2" wf="大小" tp2="小" tp3="特码大小"
                                               rate="1.96">
                                                <span> </span>
                                                <label>1.96</label>
                                            </a>

                                        </div>
                                        <div id="HKMS-DSOE" style="width:220px; margin:5px auto;  ">
                                            <a href="javascript:void(0);" id="DSOE_1" wf="合码单双" tp2="合单" tp3="特码合码单双"
                                               rate="1.96">
                                                <span> </span>
                                                <label>1.96</label>
                                            </a>
                                            <a href="javascript:void(0);" id="DSOE_2" wf="合码单双" tp2="合双" tp3="特码合码单双"
                                               rate="1.96">
                                                <span> </span>
                                                <label>1.96</label>
                                            </a>

                                        </div>
                                    </div>
                                    <div id="HKMS-COR" align="center" style="display: block;">
                                        <a href="javascript:void(0);" id="COR_R" wf="色波" tp2="红波" tp3="特码色波" rate="2.7">
                                            <span> </span>
                                            <label>2.7</label>
                                        </a>
                                        <a href="javascript:void(0);" id="COR_G" wf="色波" tp2="绿波" tp3="特码色波"
                                           rate="2.85">
                                            <span> </span>
                                            <label>2.85</label>
                                        </a>
                                        <a href="javascript:void(0);" id="COR_B" wf="色波" tp2="蓝波" tp3="特码色波"
                                           rate="2.85">
                                            <span> </span>
                                            <label>2.85</label>
                                        </a>

                                    </div>

                                    <div id="HKMS-BANBO" style="display: none;">
                                        <div>
                                            <a href="javascript:void(0)" id="HONG-D" wf="单双" tp2="红单" tp3="特码单双"
                                               rate="5.61">
                                                <span> </span>
                                                <label>5.61</label>
                                            </a>
                                            <a href="javascript:void(0)" id="HONG-S" wf="单双" tp2="红双" tp3="特码单双"
                                               rate="5.06">
                                                <span> </span>
                                                <label>5.06</label>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0)" id="HONG-DA" wf="大小" tp2="红大" tp3="特码大小"
                                               rate="6.51">
                                                <span> </span>
                                                <label>6.51</label>
                                            </a>
                                            <a href="javascript:void(0)" id="HONG-X" wf="大小" tp2="红小" tp3="特码大小"
                                               rate="4.51">
                                                <span> </span>
                                                <label>4.51</label>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="javascript:void(0)" id="LANG-D" wf="单双" tp2="蓝单" tp3="特码单双"
                                               rate="5.61">
                                                <span> </span>
                                                <label>5.61</label>
                                            </a>
                                            <a href="javascript:void(0)" id="LANG-S" wf="单双" tp2="蓝双" tp3="特码单双"
                                               rate="5.61">
                                                <span> </span>
                                                <label>5.61</label>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0)" id="LANG-DA" wf="大小" tp2="蓝大" tp3="特码大小"
                                               rate="5.06">
                                                <span> </span>
                                                <label>5.06</label>
                                            </a>
                                            <a href="javascript:void(0)" id="LANG-X" wf="大小" tp2="蓝小" tp3="特码大小"
                                               rate="6.51">
                                                <span> </span>
                                                <label>6.51</label>
                                            </a>
                                        </div>

                                        <div>
                                            <a href="javascript:void(0)" id="LU-D" wf="单双" tp2="绿单" tp3="特码单双"
                                               rate="5.61">
                                                <span> </span>
                                                <label>5.61</label>
                                            </a>
                                            <a href="javascript:void(0)" id="LU-S" wf="单双" tp2="绿双" tp3="特码单双"
                                               rate="6.51">
                                                <span> </span>
                                                <label>6.51</label>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0)" id="LU-DA" wf="大小" tp2="绿大" tp3="特码大小"
                                               rate="5.61">
                                                <span> </span>
                                                <label>5.61</label>
                                            </a>
                                            <a href="javascript:void(0)" id="LU-X" wf="大小" tp2="绿小" tp3="特码大小"
                                               rate="6.61">
                                                <span> </span>
                                                <label>6.61</label>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    {{--<div class="tab-pane" id="SX_TEMA">--}}
                        {{--<div class="tm_content">--}}
                            {{--<div class="xiao xiaonum">--}}
                                {{--<a href="javascript:void(0);" id="xiao01" wf="定位" tp2="鼠" class="xiao_shu" title="鼠">--}}
                                    {{--<span>08.20.32.44</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao02" wf="定位" tp2="牛" class="xiao_niu"--}}
                                       {{--title="牛">--}}
                                    {{--<span>07.19.31.43</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao03" wf="定位" tp2="虎" class="xiao_hu" title="虎">--}}
                                    {{--<span>06.18.30.42</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao04" wf="定位" tp2="兔" class="xiao_tu" title="兔">--}}
                                    {{--<span>05.17.29.41</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao05" wf="定位" tp2="龙" class="xiao_long"--}}
                                       {{--title="龙">--}}
                                    {{--<span>04.16.28.40</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao06" wf="定位" tp2="蛇" class="xiao_she"--}}
                                       {{--title="蛇">--}}
                                    {{--<span>03.15.27.39</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao07" wf="定位" tp2="马" class="xiao_ma" title="马">--}}
                                    {{--<span>02.14.26.38</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao08" wf="定位" tp2="羊" class="xiao_yang"--}}
                                       {{--title="羊">--}}
                                    {{--<span>01.13.25.37.49</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a><a href="javascript:void(0);" id="xiao09" wf="定位" tp2="猴" class="xiao_hou"--}}
                                       {{--title="猴">--}}
                                    {{--<span>12.24.36.48</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}

                                {{--<a href="javascript:void(0);" id="xiao11" wf="定位" tp2="鸡" class="xiao_ji" title="鸡">--}}
                                    {{--<span>11.23.35.47</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" id="xiao10" wf="定位" tp2="狗" class="xiao_gou" title="狗">--}}
                                    {{--<span>10.22.34.46</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" id="xiao12" wf="定位" tp2="猪" class="xiao_zhu" title="猪">--}}
                                    {{--<span>09.21.33.45</span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<div class="zhongxiao">--}}
                                {{--<div class="weixiao">--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="0尾">--}}
                                        {{--<span>尾0</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="1尾">--}}
                                        {{--<span>尾1</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="2尾">--}}
                                        {{--<span>尾2</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="3尾">--}}
                                        {{--<span>尾3</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="4尾">--}}
                                        {{--<span>尾4</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="5尾">--}}
                                        {{--<span>尾5</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="6尾">--}}
                                        {{--<span>尾6</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="7尾">--}}
                                        {{--<span>尾7</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="8尾">--}}
                                        {{--<span>尾8</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0)" tp3="正特尾数" tp2="9尾">--}}
                                        {{--<span>尾9</span>--}}
                                        {{--<label>0</label>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<a href="javascript:void(0);" tp3="总肖" tp2="234肖">--}}
                                    {{--<span>234肖 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" tp3="总肖" tp2="5肖">--}}
                                    {{--<span>5肖 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" tp3="总肖" tp2="6肖">--}}
                                    {{--<span>6肖 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" tp3="总肖" tp2="7肖">--}}
                                    {{--<span>7肖 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" tp3="总肖单双" tp2="总肖单">--}}
                                    {{--<span>总肖单 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" tp3="总肖单双" tp2="总肖双">--}}
                                    {{--<span>总肖双 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="qisebo">--}}
                                {{--<a href="javascript:void(0);" tp3="七色波" tp2="红波">--}}
                                    {{--<span>红波 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" tp3="七色波" tp2="绿波">--}}
                                    {{--<span>绿波 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0);" tp3="七色波" tp2="蓝波">--}}
                                    {{--<span>蓝波 </span>--}}
                                    {{--<label>--}}
                                        {{--0--}}
                                    {{--</label>--}}
                                {{--</a>--}}


                            {{--</div>--}}

                            {{--<div class="lianwei">--}}
                                {{--<div id="lianwei_type" class="type_nav">--}}
                                    {{--<ul>--}}
                                        {{--<li class="selected" wf="二尾连">二尾连</li>--}}
                                        {{--<li wf="三尾连">三尾连</li>--}}
                                        {{--<li wf="四尾连">四尾连</li>--}}
                                        {{--<li wf="五尾连">五尾连</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="xiaonum">--}}
                                    {{--<a href="javascript:void(0);" id="wei01" wf="尾连" tp2="0尾" title="0尾">--}}
                                        {{--<span>10, 20 ,30 ,40</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei02" wf="尾连" tp2="1尾" title="1尾">--}}
                                        {{--<span>01, 11, 21, 31, 41 </span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei03" wf="尾连" tp2="2尾" title="2尾">--}}
                                        {{--<span>02, 12, 22, 32, 42 </span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei04" wf="尾连" tp2="3尾" title="3尾">--}}
                                        {{--<span>03, 13, 23, 33, 43 </span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei05" wf="尾连" tp2="4尾" title="4尾">--}}
                                        {{--<span>04, 14, 24, 34, 44</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei06" wf="尾连" tp2="5尾" title="5尾">--}}
                                        {{--<span>05, 15, 25, 35, 45 </span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei07" wf="尾连" tp2="6尾" title="6尾">--}}
                                        {{--<span>06, 16, 26, 36, 46</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei08" wf="尾连" tp2="7尾" title="7尾">--}}
                                        {{--<span>07, 17, 27, 37, 47</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="wei09" wf="尾连" tp2="8尾" title="8尾">--}}
                                        {{--<span>08, 18, 28, 38, 48</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);" id="wei11" wf="尾连" tp2="9尾" title="9尾">--}}
                                        {{--<span>09, 19, 29, 39, 49</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="lianxiaobtnarea">--}}

                                    {{--<p class="addlist">--}}
                                        {{--<img src="/Content/images/honghu.jpg" id="btnlianwei">--}}
                                    {{--</p>--}}
                                    {{--<br>--}}
                                    {{--<br>--}}
                                    {{--<div class="addlist select_info_text" style="display: block;margin:auto;background-color: transparent">--}}
                                        {{--<a id="btnlianwei">投注列表</a>--}}
                                        {{--<button class="btn-danger" id="btnlianwei">添加到投注列表</button>--}}
                                    {{--</div>--}}
                                    {{--<div id="clearbtn" onclick="clearInput()">清除</div>--}}
                                    {{--<br>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="lianxiao ">--}}
                                {{--<div id="lianxiao_type" class="type_nav">--}}
                                    {{--<ul>--}}
                                        {{--<li class="selected" wf="二肖碰">二肖碰</li>--}}
                                        {{--<li wf="三肖碰">三肖碰</li>--}}
                                        {{--<li wf="四肖碰">四肖碰</li>--}}
                                        {{--<li wf="五肖碰">五肖碰</li>--}}
                                    {{--</ul>--}}

                                {{--</div>--}}
                                {{--<div class="xiaonum">--}}
                                    {{--<a href="javascript:void(0);" id="xiao01" wf="肖碰" tp2="鼠" class="xiao_shu"--}}
                                       {{--title="鼠">--}}
                                        {{--<span>08.20.32.44</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao02" wf="肖碰" tp2="牛" class="xiao_niu"--}}
                                           {{--title="牛">--}}
                                        {{--<span>07.19.31.43</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao03" wf="肖碰" tp2="虎" class="xiao_hu"--}}
                                           {{--title="虎">--}}
                                        {{--<span>06.18.30.42</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao04" wf="肖碰" tp2="兔" class="xiao_tu"--}}
                                           {{--title="兔">--}}
                                        {{--<span>05.17.29.41</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao05" wf="肖碰" tp2="龙" class="xiao_long"--}}
                                           {{--title="龙">--}}
                                        {{--<span>04.16.28.40</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao06" wf="肖碰" tp2="蛇" class="xiao_she"--}}
                                           {{--title="蛇">--}}
                                        {{--<span>03.15.27.39</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao07" wf="肖碰" tp2="马" class="xiao_ma"--}}
                                           {{--title="马">--}}
                                        {{--<span>02.14.26.38</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao08" wf="肖碰" tp2="羊" class="xiao_yang"--}}
                                           {{--title="羊">--}}
                                        {{--<span>01.13.25.37.49</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao09" wf="肖碰" tp2="猴" class="xiao_hou"--}}
                                           {{--title="猴">--}}
                                        {{--<span>12.24.36.48</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);" id="xiao11" wf="肖碰" tp2="鸡" class="xiao_ji" title="鸡">--}}
                                        {{--<span>11.23.35.47</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a><a href="javascript:void(0);" id="xiao10" wf="肖碰" tp2="狗" class="xiao_gou"--}}
                                           {{--title="狗">--}}
                                        {{--<span>10.22.34.46</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" id="xiao12" wf="肖碰" tp2="猪" class="xiao_zhu"--}}
                                       {{--title="猪">--}}
                                        {{--<span>09.21.33.45</span>--}}
                                        {{--<label>--}}
                                            {{--0--}}
                                        {{--</label>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="lianxiaobtnarea">--}}

                                    {{--<p class="addlist">--}}
                                        {{--<img src="/Content/images/honghu.jpg" id="btnlianxiao">--}}
                                    {{--</p>--}}
                                    {{--<br>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="duoxiao ">--}}
                                {{--<div id="duoxiao_type" class="type_nav">--}}
                                    {{--<ul>--}}
                                        {{--<li class="selected" wf="多肖中">中</li>--}}
                                        {{--<li wf="多肖不中">不中</li>--}}

                                    {{--</ul>--}}

                                {{--</div>--}}
                                {{--<div class="xiaonum">--}}
                                    {{--<a href="javascript:void(0);" tp2="鼠" class="xiao_shu" title="鼠">--}}
                                        {{--<span>08.20.32.44</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="牛" class="xiao_niu" title="牛">--}}
                                        {{--<span>07.19.31.43</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="虎" class="xiao_hu" title="虎">--}}
                                        {{--<span>06.18.30.42</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="兔" class="xiao_tu" title="兔">--}}
                                        {{--<span>05.17.29.41</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="龙" class="xiao_long" title="龙">--}}
                                        {{--<span>04.16.28.40</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="蛇" class="xiao_she" title="蛇">--}}
                                        {{--<span>03.15.27.39</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="马" class="xiao_ma" title="马">--}}
                                        {{--<span>02.14.26.38</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="羊" class="xiao_yang" title="羊">--}}
                                        {{--<span>01.13.25.37.49</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="猴" class="xiao_hou" title="猴">--}}
                                        {{--<span>12.24.36.48</span>--}}

                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);" tp2="鸡" class="xiao_ji" title="鸡">--}}
                                        {{--<span>11.23.35.47</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="狗" class="xiao_gou" title="狗">--}}
                                        {{--<span>10.22.34.46</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="猪" class="xiao_zhu" title="猪">--}}
                                        {{--<span>09.21.33.45</span>--}}

                                    {{--</a>--}}

                                    {{--<div class="clear"></div>--}}
                                {{--</div>--}}
                                {{--<div class="duoxiaobtnarea">--}}
                                    {{--<p class="duoxiaobtnarea_pl">--}}
                                        {{--玩法：<label class="lm_name">多肖中</label><span>  赔率：<label--}}
                                                    {{--class="lm_pl">0</label></span>--}}
                                    {{--</p>--}}

                                    {{--<p class="addlist">--}}
                                        {{--<img src="/Content/images/honghu.jpg" id="btnduoxiao">--}}
                                    {{--</p>--}}
                                    {{--<br>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="LM_SIQZ">--}}
                        {{--<div class="tm_content">--}}

                            {{--<div id="lianma_type" class="type_nav">--}}
                                {{--<ul>--}}
                                    {{--<li disid="LM_Ball" wei="直选" class="selected" style="">--}}
                                        {{--直选--}}
                                    {{--</li>--}}
                                    {{--<li class="lm_tow" disid="SXDP" wei="生肖对碰" style="display: none;">--}}
                                        {{--生肖对碰--}}
                                    {{--</li>--}}
                                    {{--<li class="lm_tow" disid="WSDP" wei="尾数对碰" style="display: none;">--}}

                                        {{--尾数对碰--}}
                                    {{--</li>--}}
                                    {{--<li wei="肖串尾数" disid="XCWS" class="" style="">--}}
                                        {{--肖串尾数--}}
                                    {{--</li>--}}
                                    {{--<li wei="胆拖" disid="DT" class="" style="">--}}
                                        {{--胆拖--}}
                                    {{--</li>--}}
                                    {{--<li wei="胆拖色波" disid="DTSB" class="" style="">--}}
                                        {{--胆拖色波--}}
                                    {{--</li>--}}
                                    {{--<li wei="胆拖生肖" disid="DTSX" class="" style="">--}}
                                        {{--胆拖生肖--}}
                                    {{--</li>--}}

                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div id="LM_Ball" class="lmpanal" style="display: block;">--}}

                                {{--<a href="javascript:void(0);" class="lm_num_1" tp2="01"><span>01</span></a> <a href="javascript:void(0);" class="lm_num_2" tp2="02"><span>02</span></a> <a href="javascript:void(0);" class="lm_num_3" tp2="03"><span>03</span></a> <a href="javascript:void(0);" class="lm_num_4" tp2="04"><span>04</span></a> <a href="javascript:void(0);" class="lm_num_5" tp2="05"><span>05</span></a> <a href="javascript:void(0);" class="lm_num_6" tp2="06"><span>06</span></a> <a href="javascript:void(0);" class="lm_num_7" tp2="07"><span>07</span></a> <a href="javascript:void(0);" class="lm_num_8" tp2="08"><span>08</span></a> <a href="javascript:void(0);" class="lm_num_9" tp2="09"><span>09</span></a> <a href="javascript:void(0);" class="lm_num_10" tp2="10"><span>10</span></a> <a href="javascript:void(0);" class="lm_num_11" tp2="11"><span>11</span></a> <a href="javascript:void(0);" class="lm_num_12" tp2="12"><span>12</span></a> <a href="javascript:void(0);" class="lm_num_13" tp2="13"><span>13</span></a> <a href="javascript:void(0);" class="lm_num_14" tp2="14"><span>14</span></a> <a href="javascript:void(0);" class="lm_num_15" tp2="15"><span>15</span></a> <a href="javascript:void(0);" class="lm_num_16" tp2="16"><span>16</span></a> <a href="javascript:void(0);" class="lm_num_17" tp2="17"><span>17</span></a> <a href="javascript:void(0);" class="lm_num_18" tp2="18"><span>18</span></a> <a href="javascript:void(0);" class="lm_num_19" tp2="19"><span>19</span></a> <a href="javascript:void(0);" class="lm_num_20" tp2="20"><span>20</span></a> <a href="javascript:void(0);" class="lm_num_21" tp2="21"><span>21</span></a> <a href="javascript:void(0);" class="lm_num_22" tp2="22"><span>22</span></a> <a href="javascript:void(0);" class="lm_num_23" tp2="23"><span>23</span></a> <a href="javascript:void(0);" class="lm_num_24" tp2="24"><span>24</span></a> <a href="javascript:void(0);" class="lm_num_25" tp2="25"><span>25</span></a> <a href="javascript:void(0);" class="lm_num_26" tp2="26"><span>26</span></a> <a href="javascript:void(0);" class="lm_num_27" tp2="27"><span>27</span></a> <a href="javascript:void(0);" class="lm_num_28" tp2="28"><span>28</span></a> <a href="javascript:void(0);" class="lm_num_29" tp2="29"><span>29</span></a> <a href="javascript:void(0);" class="lm_num_30" tp2="30"><span>30</span></a> <a href="javascript:void(0);" class="lm_num_31" tp2="31"><span>31</span></a> <a href="javascript:void(0);" class="lm_num_32" tp2="32"><span>32</span></a> <a href="javascript:void(0);" class="lm_num_33" tp2="33"><span>33</span></a> <a href="javascript:void(0);" class="lm_num_34" tp2="34"><span>34</span></a> <a href="javascript:void(0);" class="lm_num_35" tp2="35"><span>35</span></a> <a href="javascript:void(0);" class="lm_num_36" tp2="36"><span>36</span></a> <a href="javascript:void(0);" class="lm_num_37" tp2="37"><span>37</span></a> <a href="javascript:void(0);" class="lm_num_38" tp2="38"><span>38</span></a> <a href="javascript:void(0);" class="lm_num_39" tp2="39"><span>39</span></a> <a href="javascript:void(0);" class="lm_num_40" tp2="40"><span>40</span></a> <a href="javascript:void(0);" class="lm_num_41" tp2="41"><span>41</span></a> <a href="javascript:void(0);" class="lm_num_42" tp2="42"><span>42</span></a> <a href="javascript:void(0);" class="lm_num_43" tp2="43"><span>43</span></a> <a href="javascript:void(0);" class="lm_num_44" tp2="44"><span>44</span></a> <a href="javascript:void(0);" class="lm_num_45" tp2="45"><span>45</span></a> <a href="javascript:void(0);" class="lm_num_46" tp2="46"><span>46</span></a> <a href="javascript:void(0);" class="lm_num_47" tp2="47"><span>47</span></a> <a href="javascript:void(0);" class="lm_num_48" tp2="48"><span>48</span></a> <a href="javascript:void(0);" class="lm_num_49" tp2="49"><span>49</span></a> </div>--}}
                            {{--<div id="SXDP" class="lmpanal" style="display:none">--}}
                                {{--<div class="xiaonum">--}}
                                    {{--<a href="javascript:void(0);" tp2="鼠" class="xiao_shu" title="鼠">--}}
                                        {{--<span>08.20.32.44</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="牛" class="xiao_niu" title="牛">--}}
                                        {{--<span>07.19.31.43</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="虎" class="xiao_hu" title="虎">--}}
                                        {{--<span>06.18.30.42</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="兔" class="xiao_tu" title="兔">--}}
                                        {{--<span>05.17.29.41</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="龙" class="xiao_long" title="龙">--}}
                                        {{--<span>04.16.28.40</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="蛇" class="xiao_she" title="蛇">--}}
                                        {{--<span>03.15.27.39</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="马" class="xiao_ma" title="马">--}}
                                        {{--<span>02.14.26.38</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="羊" class="xiao_yang" title="羊">--}}
                                        {{--<span>01.13.25.37.49</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="猴" class="xiao_hou" title="猴">--}}
                                        {{--<span>12.24.36.48</span>--}}

                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);" tp2="鸡" class="xiao_ji" title="鸡">--}}
                                        {{--<span>11.23.35.47</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="狗" class="xiao_gou" title="狗">--}}
                                        {{--<span>10.22.34.46</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="猪" class="xiao_zhu" title="猪">--}}
                                        {{--<span>09.21.33.45</span>--}}

                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div id="WSDP" class="lmpanal" style="display:none">--}}
                                {{--<div class="weishu">--}}
                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<label>0</label>--}}
                                        {{--<span>10,20,30,40</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>1</label>--}}
                                        {{--<span>01,11,21,31,41</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>2</label>--}}
                                        {{--<span>02,12,22,32,42</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>3</label>--}}
                                        {{--<span>03,13,23,33,43</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>4</label>--}}
                                        {{--<span>04,14,24,34,44</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>5</label>--}}
                                        {{--<span>05,15,25,35,45</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>6</label>--}}
                                        {{--<span>06,16,26,36,46</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>7</label>--}}
                                        {{--<span>07,17,27,37,47</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>8</label>--}}
                                        {{--<span>08,18,28,38,48</span>--}}

                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<label>9</label>--}}
                                        {{--<span>09,19,29,39,49</span>--}}

                                    {{--</a>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div id="XCWS" class="lmpanal" style="display: none;">--}}
                                {{--<div class="xiaonum">--}}
                                    {{--<div class="LM_Title"><span>主肖</span> </div>--}}


                                    {{--<a href="javascript:void(0);" tp2="鼠" class="xiao_shu" title="鼠">--}}
                                        {{--<span>08.20.32.44</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="牛" class="xiao_niu" title="牛">--}}
                                        {{--<span>07.19.31.43</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="虎" class="xiao_hu" title="虎">--}}
                                        {{--<span>06.18.30.42</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="兔" class="xiao_tu" title="兔">--}}
                                        {{--<span>05.17.29.41</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="龙" class="xiao_long" title="龙">--}}
                                        {{--<span>04.16.28.40</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="蛇" class="xiao_she" title="蛇">--}}
                                        {{--<span>03.15.27.39</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="马" class="xiao_ma" title="马">--}}
                                        {{--<span>02.14.26.38</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="羊" class="xiao_yang" title="羊">--}}
                                        {{--<span>01.13.25.37.49</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="猴" class="xiao_hou" title="猴">--}}
                                        {{--<span>12.24.36.48</span>--}}

                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);" tp2="鸡" class="xiao_ji" title="鸡">--}}
                                        {{--<span>11.23.35.47</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="狗" class="xiao_gou" title="狗">--}}
                                        {{--<span>10.22.34.46</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="猪" class="xiao_zhu" title="猪">--}}
                                        {{--<span>09.21.33.45</span>--}}

                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="weishu">--}}

                                    {{--<div class="LM_Title"><span>尾数</span> </div>--}}


                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<label>0</label>--}}
                                        {{--<span>10,20,30,40</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>1</label>--}}
                                        {{--<span>01,11,21,31,41</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>2</label>--}}
                                        {{--<span>02,12,22,32,42</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>3</label>--}}
                                        {{--<span>03,13,23,33,43</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>4</label>--}}
                                        {{--<span>04,14,24,34,44</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>5</label>--}}
                                        {{--<span>05,15,25,35,45</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>6</label>--}}
                                        {{--<span>06,16,26,36,46</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>7</label>--}}
                                        {{--<span>07,17,27,37,47</span>--}}

                                    {{--</a><a href="javascript:void(0);">--}}
                                        {{--<label>8</label>--}}
                                        {{--<span>08,18,28,38,48</span>--}}

                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<label>9</label>--}}
                                        {{--<span>09,19,29,39,49</span>--}}

                                    {{--</a>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div id="DT" class="lmpanal" style="display: none;">--}}
                                {{--<div id="DT_DM" class="DT_NUMS">--}}
                                    {{--<div class="LM_Title"><span>胆码</span> </div>--}}

                                    {{--<a href="javascript:void(0);" class="lm_num_1" tp2="01"><span>01</span></a> <a href="javascript:void(0);" class="lm_num_2" tp2="02"><span>02</span></a> <a href="javascript:void(0);" class="lm_num_3" tp2="03"><span>03</span></a> <a href="javascript:void(0);" class="lm_num_4" tp2="04"><span>04</span></a> <a href="javascript:void(0);" class="lm_num_5" tp2="05"><span>05</span></a> <a href="javascript:void(0);" class="lm_num_6" tp2="06"><span>06</span></a> <a href="javascript:void(0);" class="lm_num_7" tp2="07"><span>07</span></a> <a href="javascript:void(0);" class="lm_num_8" tp2="08"><span>08</span></a> <a href="javascript:void(0);" class="lm_num_9" tp2="09"><span>09</span></a> <a href="javascript:void(0);" class="lm_num_10" tp2="10"><span>10</span></a> <a href="javascript:void(0);" class="lm_num_11" tp2="11"><span>11</span></a> <a href="javascript:void(0);" class="lm_num_12" tp2="12"><span>12</span></a> <a href="javascript:void(0);" class="lm_num_13" tp2="13"><span>13</span></a> <a href="javascript:void(0);" class="lm_num_14" tp2="14"><span>14</span></a> <a href="javascript:void(0);" class="lm_num_15" tp2="15"><span>15</span></a> <a href="javascript:void(0);" class="lm_num_16" tp2="16"><span>16</span></a> <a href="javascript:void(0);" class="lm_num_17" tp2="17"><span>17</span></a> <a href="javascript:void(0);" class="lm_num_18" tp2="18"><span>18</span></a> <a href="javascript:void(0);" class="lm_num_19" tp2="19"><span>19</span></a> <a href="javascript:void(0);" class="lm_num_20" tp2="20"><span>20</span></a> <a href="javascript:void(0);" class="lm_num_21" tp2="21"><span>21</span></a> <a href="javascript:void(0);" class="lm_num_22" tp2="22"><span>22</span></a> <a href="javascript:void(0);" class="lm_num_23" tp2="23"><span>23</span></a> <a href="javascript:void(0);" class="lm_num_24" tp2="24"><span>24</span></a> <a href="javascript:void(0);" class="lm_num_25" tp2="25"><span>25</span></a> <a href="javascript:void(0);" class="lm_num_26" tp2="26"><span>26</span></a> <a href="javascript:void(0);" class="lm_num_27" tp2="27"><span>27</span></a> <a href="javascript:void(0);" class="lm_num_28" tp2="28"><span>28</span></a> <a href="javascript:void(0);" class="lm_num_29" tp2="29"><span>29</span></a> <a href="javascript:void(0);" class="lm_num_30" tp2="30"><span>30</span></a> <a href="javascript:void(0);" class="lm_num_31" tp2="31"><span>31</span></a> <a href="javascript:void(0);" class="lm_num_32" tp2="32"><span>32</span></a> <a href="javascript:void(0);" class="lm_num_33" tp2="33"><span>33</span></a> <a href="javascript:void(0);" class="lm_num_34" tp2="34"><span>34</span></a> <a href="javascript:void(0);" class="lm_num_35" tp2="35"><span>35</span></a> <a href="javascript:void(0);" class="lm_num_36" tp2="36"><span>36</span></a> <a href="javascript:void(0);" class="lm_num_37" tp2="37"><span>37</span></a> <a href="javascript:void(0);" class="lm_num_38" tp2="38"><span>38</span></a> <a href="javascript:void(0);" class="lm_num_39" tp2="39"><span>39</span></a> <a href="javascript:void(0);" class="lm_num_40" tp2="40"><span>40</span></a> <a href="javascript:void(0);" class="lm_num_41" tp2="41"><span>41</span></a> <a href="javascript:void(0);" class="lm_num_42" tp2="42"><span>42</span></a> <a href="javascript:void(0);" class="lm_num_43" tp2="43"><span>43</span></a> <a href="javascript:void(0);" class="lm_num_44" tp2="44"><span>44</span></a> <a href="javascript:void(0);" class="lm_num_45" tp2="45"><span>45</span></a> <a href="javascript:void(0);" class="lm_num_46" tp2="46"><span>46</span></a> <a href="javascript:void(0);" class="lm_num_47" tp2="47"><span>47</span></a> <a href="javascript:void(0);" class="lm_num_48" tp2="48"><span>48</span></a> <a href="javascript:void(0);" class="lm_num_49" tp2="49"><span>49</span></a> </div>--}}
                                {{--<div id="DT_TM" class="DT_NUMS">--}}
                                    {{--<div class="LM_Title"><span>拖码</span> </div>--}}
                                    {{--<a href="javascript:void(0);" class="lm_num_1" tp2="01"><span>01</span></a> <a href="javascript:void(0);" class="lm_num_2" tp2="02"><span>02</span></a> <a href="javascript:void(0);" class="lm_num_3" tp2="03"><span>03</span></a> <a href="javascript:void(0);" class="lm_num_4" tp2="04"><span>04</span></a> <a href="javascript:void(0);" class="lm_num_5" tp2="05"><span>05</span></a> <a href="javascript:void(0);" class="lm_num_6" tp2="06"><span>06</span></a> <a href="javascript:void(0);" class="lm_num_7" tp2="07"><span>07</span></a> <a href="javascript:void(0);" class="lm_num_8" tp2="08"><span>08</span></a> <a href="javascript:void(0);" class="lm_num_9" tp2="09"><span>09</span></a> <a href="javascript:void(0);" class="lm_num_10" tp2="10"><span>10</span></a> <a href="javascript:void(0);" class="lm_num_11" tp2="11"><span>11</span></a> <a href="javascript:void(0);" class="lm_num_12" tp2="12"><span>12</span></a> <a href="javascript:void(0);" class="lm_num_13" tp2="13"><span>13</span></a> <a href="javascript:void(0);" class="lm_num_14" tp2="14"><span>14</span></a> <a href="javascript:void(0);" class="lm_num_15" tp2="15"><span>15</span></a> <a href="javascript:void(0);" class="lm_num_16" tp2="16"><span>16</span></a> <a href="javascript:void(0);" class="lm_num_17" tp2="17"><span>17</span></a> <a href="javascript:void(0);" class="lm_num_18" tp2="18"><span>18</span></a> <a href="javascript:void(0);" class="lm_num_19" tp2="19"><span>19</span></a> <a href="javascript:void(0);" class="lm_num_20" tp2="20"><span>20</span></a> <a href="javascript:void(0);" class="lm_num_21" tp2="21"><span>21</span></a> <a href="javascript:void(0);" class="lm_num_22" tp2="22"><span>22</span></a> <a href="javascript:void(0);" class="lm_num_23" tp2="23"><span>23</span></a> <a href="javascript:void(0);" class="lm_num_24" tp2="24"><span>24</span></a> <a href="javascript:void(0);" class="lm_num_25" tp2="25"><span>25</span></a> <a href="javascript:void(0);" class="lm_num_26" tp2="26"><span>26</span></a> <a href="javascript:void(0);" class="lm_num_27" tp2="27"><span>27</span></a> <a href="javascript:void(0);" class="lm_num_28" tp2="28"><span>28</span></a> <a href="javascript:void(0);" class="lm_num_29" tp2="29"><span>29</span></a> <a href="javascript:void(0);" class="lm_num_30" tp2="30"><span>30</span></a> <a href="javascript:void(0);" class="lm_num_31" tp2="31"><span>31</span></a> <a href="javascript:void(0);" class="lm_num_32" tp2="32"><span>32</span></a> <a href="javascript:void(0);" class="lm_num_33" tp2="33"><span>33</span></a> <a href="javascript:void(0);" class="lm_num_34" tp2="34"><span>34</span></a> <a href="javascript:void(0);" class="lm_num_35" tp2="35"><span>35</span></a> <a href="javascript:void(0);" class="lm_num_36" tp2="36"><span>36</span></a> <a href="javascript:void(0);" class="lm_num_37" tp2="37"><span>37</span></a> <a href="javascript:void(0);" class="lm_num_38" tp2="38"><span>38</span></a> <a href="javascript:void(0);" class="lm_num_39" tp2="39"><span>39</span></a> <a href="javascript:void(0);" class="lm_num_40" tp2="40"><span>40</span></a> <a href="javascript:void(0);" class="lm_num_41" tp2="41"><span>41</span></a> <a href="javascript:void(0);" class="lm_num_42" tp2="42"><span>42</span></a> <a href="javascript:void(0);" class="lm_num_43" tp2="43"><span>43</span></a> <a href="javascript:void(0);" class="lm_num_44" tp2="44"><span>44</span></a> <a href="javascript:void(0);" class="lm_num_45" tp2="45"><span>45</span></a> <a href="javascript:void(0);" class="lm_num_46" tp2="46"><span>46</span></a> <a href="javascript:void(0);" class="lm_num_47" tp2="47"><span>47</span></a> <a href="javascript:void(0);" class="lm_num_48" tp2="48"><span>48</span></a> <a href="javascript:void(0);" class="lm_num_49" tp2="49"><span>49</span></a> </div>--}}

                            {{--</div>--}}
                            {{--<div id="DTSB" class="lmpanal" style="display: none;">--}}
                                {{--<div id="DTSB_DM" class="DT_NUMS">--}}
                                    {{--<div class="LM_Title"><span>胆码</span> </div>--}}

                                    {{--<a href="javascript:void(0);" class="lm_num_1" tp2="01"><span>01</span></a> <a href="javascript:void(0);" class="lm_num_2" tp2="02"><span>02</span></a> <a href="javascript:void(0);" class="lm_num_3" tp2="03"><span>03</span></a> <a href="javascript:void(0);" class="lm_num_4" tp2="04"><span>04</span></a> <a href="javascript:void(0);" class="lm_num_5" tp2="05"><span>05</span></a> <a href="javascript:void(0);" class="lm_num_6" tp2="06"><span>06</span></a> <a href="javascript:void(0);" class="lm_num_7" tp2="07"><span>07</span></a> <a href="javascript:void(0);" class="lm_num_8" tp2="08"><span>08</span></a> <a href="javascript:void(0);" class="lm_num_9" tp2="09"><span>09</span></a> <a href="javascript:void(0);" class="lm_num_10" tp2="10"><span>10</span></a> <a href="javascript:void(0);" class="lm_num_11" tp2="11"><span>11</span></a> <a href="javascript:void(0);" class="lm_num_12" tp2="12"><span>12</span></a> <a href="javascript:void(0);" class="lm_num_13" tp2="13"><span>13</span></a> <a href="javascript:void(0);" class="lm_num_14" tp2="14"><span>14</span></a> <a href="javascript:void(0);" class="lm_num_15" tp2="15"><span>15</span></a> <a href="javascript:void(0);" class="lm_num_16" tp2="16"><span>16</span></a> <a href="javascript:void(0);" class="lm_num_17" tp2="17"><span>17</span></a> <a href="javascript:void(0);" class="lm_num_18" tp2="18"><span>18</span></a> <a href="javascript:void(0);" class="lm_num_19" tp2="19"><span>19</span></a> <a href="javascript:void(0);" class="lm_num_20" tp2="20"><span>20</span></a> <a href="javascript:void(0);" class="lm_num_21" tp2="21"><span>21</span></a> <a href="javascript:void(0);" class="lm_num_22" tp2="22"><span>22</span></a> <a href="javascript:void(0);" class="lm_num_23" tp2="23"><span>23</span></a> <a href="javascript:void(0);" class="lm_num_24" tp2="24"><span>24</span></a> <a href="javascript:void(0);" class="lm_num_25" tp2="25"><span>25</span></a> <a href="javascript:void(0);" class="lm_num_26" tp2="26"><span>26</span></a> <a href="javascript:void(0);" class="lm_num_27" tp2="27"><span>27</span></a> <a href="javascript:void(0);" class="lm_num_28" tp2="28"><span>28</span></a> <a href="javascript:void(0);" class="lm_num_29" tp2="29"><span>29</span></a> <a href="javascript:void(0);" class="lm_num_30" tp2="30"><span>30</span></a> <a href="javascript:void(0);" class="lm_num_31" tp2="31"><span>31</span></a> <a href="javascript:void(0);" class="lm_num_32" tp2="32"><span>32</span></a> <a href="javascript:void(0);" class="lm_num_33" tp2="33"><span>33</span></a> <a href="javascript:void(0);" class="lm_num_34" tp2="34"><span>34</span></a> <a href="javascript:void(0);" class="lm_num_35" tp2="35"><span>35</span></a> <a href="javascript:void(0);" class="lm_num_36" tp2="36"><span>36</span></a> <a href="javascript:void(0);" class="lm_num_37" tp2="37"><span>37</span></a> <a href="javascript:void(0);" class="lm_num_38" tp2="38"><span>38</span></a> <a href="javascript:void(0);" class="lm_num_39" tp2="39"><span>39</span></a> <a href="javascript:void(0);" class="lm_num_40" tp2="40"><span>40</span></a> <a href="javascript:void(0);" class="lm_num_41" tp2="41"><span>41</span></a> <a href="javascript:void(0);" class="lm_num_42" tp2="42"><span>42</span></a> <a href="javascript:void(0);" class="lm_num_43" tp2="43"><span>43</span></a> <a href="javascript:void(0);" class="lm_num_44" tp2="44"><span>44</span></a> <a href="javascript:void(0);" class="lm_num_45" tp2="45"><span>45</span></a> <a href="javascript:void(0);" class="lm_num_46" tp2="46"><span>46</span></a> <a href="javascript:void(0);" class="lm_num_47" tp2="47"><span>47</span></a> <a href="javascript:void(0);" class="lm_num_48" tp2="48"><span>48</span></a> <a href="javascript:void(0);" class="lm_num_49" tp2="49"><span>49</span></a> </div>--}}
                                {{--<div id="DTSB_TM">--}}
                                    {{--<div class="LM_Title"><span>色波</span> </div>--}}

                                    {{--<a href="javascript:void(0);" title="01,02,07,08,12,13,18,19,23,24,29,30,34,35,40,45,46">--}}
                                        {{--<label style="background-color:red"> 红</label>--}}
                                        {{--<span>01,02,07,08,12,13...</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" title="05,06,11,16,17,21,22,27,28,32,33,38,39,43,44,49">--}}
                                        {{--<label style="background-color:green">绿</label>--}}
                                        {{--<span>05,06,11,16,17,21...</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" title="03,04,09,10,14,15,20,25,26,31,36,37,41,42,47,48">--}}
                                        {{--<label style="background-color:blue">蓝</label>--}}
                                        {{--<span>03,04,09,10,14,15...</span>--}}

                                    {{--</a>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            {{--<div id="DTSX" class="lmpanal" style="display: none;">--}}
                                {{--<div id="DTSX_DM" class="DT_NUMS">--}}
                                    {{--<div class="LM_Title"><span>胆码</span> </div>--}}

                                    {{--<a href="javascript:void(0);" class="lm_num_1" tp2="01"><span>01</span></a> <a href="javascript:void(0);" class="lm_num_2" tp2="02"><span>02</span></a> <a href="javascript:void(0);" class="lm_num_3" tp2="03"><span>03</span></a> <a href="javascript:void(0);" class="lm_num_4" tp2="04"><span>04</span></a> <a href="javascript:void(0);" class="lm_num_5" tp2="05"><span>05</span></a> <a href="javascript:void(0);" class="lm_num_6" tp2="06"><span>06</span></a> <a href="javascript:void(0);" class="lm_num_7" tp2="07"><span>07</span></a> <a href="javascript:void(0);" class="lm_num_8" tp2="08"><span>08</span></a> <a href="javascript:void(0);" class="lm_num_9" tp2="09"><span>09</span></a> <a href="javascript:void(0);" class="lm_num_10" tp2="10"><span>10</span></a> <a href="javascript:void(0);" class="lm_num_11" tp2="11"><span>11</span></a> <a href="javascript:void(0);" class="lm_num_12" tp2="12"><span>12</span></a> <a href="javascript:void(0);" class="lm_num_13" tp2="13"><span>13</span></a> <a href="javascript:void(0);" class="lm_num_14" tp2="14"><span>14</span></a> <a href="javascript:void(0);" class="lm_num_15" tp2="15"><span>15</span></a> <a href="javascript:void(0);" class="lm_num_16" tp2="16"><span>16</span></a> <a href="javascript:void(0);" class="lm_num_17" tp2="17"><span>17</span></a> <a href="javascript:void(0);" class="lm_num_18" tp2="18"><span>18</span></a> <a href="javascript:void(0);" class="lm_num_19" tp2="19"><span>19</span></a> <a href="javascript:void(0);" class="lm_num_20" tp2="20"><span>20</span></a> <a href="javascript:void(0);" class="lm_num_21" tp2="21"><span>21</span></a> <a href="javascript:void(0);" class="lm_num_22" tp2="22"><span>22</span></a> <a href="javascript:void(0);" class="lm_num_23" tp2="23"><span>23</span></a> <a href="javascript:void(0);" class="lm_num_24" tp2="24"><span>24</span></a> <a href="javascript:void(0);" class="lm_num_25" tp2="25"><span>25</span></a> <a href="javascript:void(0);" class="lm_num_26" tp2="26"><span>26</span></a> <a href="javascript:void(0);" class="lm_num_27" tp2="27"><span>27</span></a> <a href="javascript:void(0);" class="lm_num_28" tp2="28"><span>28</span></a> <a href="javascript:void(0);" class="lm_num_29" tp2="29"><span>29</span></a> <a href="javascript:void(0);" class="lm_num_30" tp2="30"><span>30</span></a> <a href="javascript:void(0);" class="lm_num_31" tp2="31"><span>31</span></a> <a href="javascript:void(0);" class="lm_num_32" tp2="32"><span>32</span></a> <a href="javascript:void(0);" class="lm_num_33" tp2="33"><span>33</span></a> <a href="javascript:void(0);" class="lm_num_34" tp2="34"><span>34</span></a> <a href="javascript:void(0);" class="lm_num_35" tp2="35"><span>35</span></a> <a href="javascript:void(0);" class="lm_num_36" tp2="36"><span>36</span></a> <a href="javascript:void(0);" class="lm_num_37" tp2="37"><span>37</span></a> <a href="javascript:void(0);" class="lm_num_38" tp2="38"><span>38</span></a> <a href="javascript:void(0);" class="lm_num_39" tp2="39"><span>39</span></a> <a href="javascript:void(0);" class="lm_num_40" tp2="40"><span>40</span></a> <a href="javascript:void(0);" class="lm_num_41" tp2="41"><span>41</span></a> <a href="javascript:void(0);" class="lm_num_42" tp2="42"><span>42</span></a> <a href="javascript:void(0);" class="lm_num_43" tp2="43"><span>43</span></a> <a href="javascript:void(0);" class="lm_num_44" tp2="44"><span>44</span></a> <a href="javascript:void(0);" class="lm_num_45" tp2="45"><span>45</span></a> <a href="javascript:void(0);" class="lm_num_46" tp2="46"><span>46</span></a> <a href="javascript:void(0);" class="lm_num_47" tp2="47"><span>47</span></a> <a href="javascript:void(0);" class="lm_num_48" tp2="48"><span>48</span></a> <a href="javascript:void(0);" class="lm_num_49" tp2="49"><span>49</span></a> </div>--}}
                                {{--<div id="DTSX_TM" class="xiaonum">--}}
                                    {{--<div class="LM_Title"><span>生肖</span> </div>--}}
                                    {{--<a href="javascript:void(0);" tp2="鼠" class="xiao_shu" title="鼠">--}}
                                        {{--<span>08.20.32.44</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="牛" class="xiao_niu" title="牛">--}}
                                        {{--<span>07.19.31.43</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="虎" class="xiao_hu" title="虎">--}}
                                        {{--<span>06.18.30.42</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="兔" class="xiao_tu" title="兔">--}}
                                        {{--<span>05.17.29.41</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="龙" class="xiao_long" title="龙">--}}
                                        {{--<span>04.16.28.40</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="蛇" class="xiao_she" title="蛇">--}}
                                        {{--<span>03.15.27.39</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="马" class="xiao_ma" title="马">--}}
                                        {{--<span>02.14.26.38</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="羊" class="xiao_yang" title="羊">--}}
                                        {{--<span>01.13.25.37.49</span>--}}

                                    {{--</a><a href="javascript:void(0);" tp2="猴" class="xiao_hou" title="猴">--}}
                                        {{--<span>12.24.36.48</span>--}}

                                    {{--</a>--}}

                                    {{--<a href="javascript:void(0);" tp2="鸡" class="xiao_ji" title="鸡">--}}
                                        {{--<span>11.23.35.47</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="狗" class="xiao_gou" title="狗">--}}
                                        {{--<span>10.22.34.46</span>--}}

                                    {{--</a>--}}
                                    {{--<a href="javascript:void(0);" tp2="猪" class="xiao_zhu" title="猪">--}}
                                        {{--<span>09.21.33.45</span>--}}

                                    {{--</a>--}}



                                {{--</div>--}}

                            {{--</div>--}}
                            {{--<div class="lianxiaobtnarea">--}}
                                {{--<p class="lianxiaobtnarea_pl">--}}
                                    {{--玩法：<label class="lm_name">四全中</label><span>  赔率：<label class="lm_pl">10000</label></span>--}}
                                {{--</p>--}}
                                {{--<p class="addlist">--}}
                                    {{--<img src="/Content/images/honghu.jpg" id="btnlianma">--}}
                                {{--</p>--}}
                                {{--<br>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="ZXBZ_SANZYI">--}}
                        {{--<div class="tm_content">--}}


                            {{--<div id="ZXBZ_Ball">--}}

                                {{--<a href="javascript:void(0);" class="lm_num_1" tp2="01"><span>01</span></a> <a href="javascript:void(0);" class="lm_num_2" tp2="02"><span>02</span></a> <a href="javascript:void(0);" class="lm_num_3" tp2="03"><span>03</span></a> <a href="javascript:void(0);" class="lm_num_4" tp2="04"><span>04</span></a> <a href="javascript:void(0);" class="lm_num_5" tp2="05"><span>05</span></a> <a href="javascript:void(0);" class="lm_num_6" tp2="06"><span>06</span></a> <a href="javascript:void(0);" class="lm_num_7" tp2="07"><span>07</span></a> <a href="javascript:void(0);" class="lm_num_8" tp2="08"><span>08</span></a> <a href="javascript:void(0);" class="lm_num_9" tp2="09"><span>09</span></a> <a href="javascript:void(0);" class="lm_num_10" tp2="10"><span>10</span></a> <a href="javascript:void(0);" class="lm_num_11" tp2="11"><span>11</span></a> <a href="javascript:void(0);" class="lm_num_12" tp2="12"><span>12</span></a> <a href="javascript:void(0);" class="lm_num_13" tp2="13"><span>13</span></a> <a href="javascript:void(0);" class="lm_num_14" tp2="14"><span>14</span></a> <a href="javascript:void(0);" class="lm_num_15" tp2="15"><span>15</span></a> <a href="javascript:void(0);" class="lm_num_16" tp2="16"><span>16</span></a> <a href="javascript:void(0);" class="lm_num_17" tp2="17"><span>17</span></a> <a href="javascript:void(0);" class="lm_num_18" tp2="18"><span>18</span></a> <a href="javascript:void(0);" class="lm_num_19" tp2="19"><span>19</span></a> <a href="javascript:void(0);" class="lm_num_20" tp2="20"><span>20</span></a> <a href="javascript:void(0);" class="lm_num_21" tp2="21"><span>21</span></a> <a href="javascript:void(0);" class="lm_num_22" tp2="22"><span>22</span></a> <a href="javascript:void(0);" class="lm_num_23" tp2="23"><span>23</span></a> <a href="javascript:void(0);" class="lm_num_24" tp2="24"><span>24</span></a> <a href="javascript:void(0);" class="lm_num_25" tp2="25"><span>25</span></a> <a href="javascript:void(0);" class="lm_num_26" tp2="26"><span>26</span></a> <a href="javascript:void(0);" class="lm_num_27" tp2="27"><span>27</span></a> <a href="javascript:void(0);" class="lm_num_28" tp2="28"><span>28</span></a> <a href="javascript:void(0);" class="lm_num_29" tp2="29"><span>29</span></a> <a href="javascript:void(0);" class="lm_num_30" tp2="30"><span>30</span></a> <a href="javascript:void(0);" class="lm_num_31" tp2="31"><span>31</span></a> <a href="javascript:void(0);" class="lm_num_32" tp2="32"><span>32</span></a> <a href="javascript:void(0);" class="lm_num_33" tp2="33"><span>33</span></a> <a href="javascript:void(0);" class="lm_num_34" tp2="34"><span>34</span></a> <a href="javascript:void(0);" class="lm_num_35" tp2="35"><span>35</span></a> <a href="javascript:void(0);" class="lm_num_36" tp2="36"><span>36</span></a> <a href="javascript:void(0);" class="lm_num_37" tp2="37"><span>37</span></a> <a href="javascript:void(0);" class="lm_num_38" tp2="38"><span>38</span></a> <a href="javascript:void(0);" class="lm_num_39" tp2="39"><span>39</span></a> <a href="javascript:void(0);" class="lm_num_40" tp2="40"><span>40</span></a> <a href="javascript:void(0);" class="lm_num_41" tp2="41"><span>41</span></a> <a href="javascript:void(0);" class="lm_num_42" tp2="42"><span>42</span></a> <a href="javascript:void(0);" class="lm_num_43" tp2="43"><span>43</span></a> <a href="javascript:void(0);" class="lm_num_44" tp2="44"><span>44</span></a> <a href="javascript:void(0);" class="lm_num_45" tp2="45"><span>45</span></a> <a href="javascript:void(0);" class="lm_num_46" tp2="46"><span>46</span></a> <a href="javascript:void(0);" class="lm_num_47" tp2="47"><span>47</span></a> <a href="javascript:void(0);" class="lm_num_48" tp2="48"><span>48</span></a> <a href="javascript:void(0);" class="lm_num_49" tp2="49"><span>49</span></a> </div>--}}

                            {{--<div class="lianxiaobtnarea">--}}
                                {{--<p class="lianxiaobtnarea_pl">--}}
                                    {{--玩法：<label class="lm_name">3中一</label><span>  赔率：<label class="lm_pl">2.5</label></span>--}}
                                {{--</p>--}}
                                {{--<p class="addlist">--}}
                                    {{--<img src="/Content/images/honghu.jpg" id="btnZXBZ">--}}
                                {{--</p>--}}
                                {{--<br>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
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
//            setOutTime();
//            setTimeout("loadRecent()", 2500);
        });
    </script>
@stop
