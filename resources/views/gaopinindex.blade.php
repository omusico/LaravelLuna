@extends('Layout.gaopinmaster')
@section('title')
    高频彩
@stop
@section('css')
    <style type="text/css">
        .carousel-caption p {
            font-size: 150%;
        }

    </style>
@stop
@section('content')

    <div class="row" style="display: none">
        <div class="col-md-10 col-md-offset-1">
            <marquee scrollamount=3 style="color:white">{{Cache::get('marquee','请到后台设置滚动文字')}}</marquee>
        </div>
    </div>
    <div class="container">
        <div class="col-md-4 mobilhide" style="padding: 15px;">
            <div class="gp_new_guide mobilhide" style="background-color: white;">
            </div>
        </div>
        <div class="col-md-8 mobilhide" style="margin-top: 30px">
            <div class="gp_first"></div>
        </div>
    </div>
    <div class="container" style="background-color: white;padding-top: 20px">
        <div class="col-md-4">
            <div class="gp_lottery_routes">
            </div>

        </div>
        <div class="col-md-8" style="padding-left: 20px">
            <div class="row">
                <div class="col-md-4">
                    <div class="gp_lottery_cq"></div>
                </div>
                <div class="col-md-4">
                    <div class="gp_lottery_xj"></div>
                </div>
                <div class="col-md-4">
                    <div class="gp_lottery_jx"></div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="gp_lottery_all" style="margin-top: 20px;margin-left: 20px"></div>
        </div>
        <div class="col-md-11">

            <div class="col-md-3" style="padding-right: 0px">
                <div class="gp_lottery_xk3" style="float: right"></div>
            </div>
            <div class="col-md-3" style="padding-right: 0px">
                <div class="gp_lottery_lk3" style="float: right"></div>
            </div>
            <div class="col-md-3" style="padding-right: 0px">
                <div class="gp_lottery_gd" style="float: right"></div>
            </div>
            <div class="col-md-3" style="padding-right: 0px">
                <div class="gp_lottery_sd" style="float: right;"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-4">
            <div id="carousel-generic" class="carousel slide" data-ride="carousel"
                 xmlns="http://www.w3.org/1999/html">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="gp_lottery_result">
                            开奖时间：{{$recentArray['JXFIVE']->created_at}}
                            <br>
                            <br>
                            <strong>江西11选5</strong>
                            <br>
                            第<em>{{$recentArray['JXFIVE']->proName}}</em>期开奖号码<br><br>

                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[0]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[1]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[2]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[3]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[4]}}"></div>
                            <br>
                            <a href="/fivelotteryIndex?lottery_type=jxfive" class="gp_lottery_sure">
                                <img class="gp_lottery_sure">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gp_lottery_result">
                            开奖时间：{{$recentArray['JXFIVE']->created_at}}
                            <br>
                            <br>
                            <strong>江西11选5</strong>
                            <br>
                            第<em>{{$recentArray['JXFIVE']->proName}}</em>期开奖号码<br><br>

                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[0]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[1]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[2]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[3]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[4]}}"></div>
                            <br>
                            <a href="/fivelotteryIndex?lottery_type=jxfive" class="gp_lottery_sure">
                                <img class="gp_lottery_sure">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="gp_lottery_result">
                            开奖时间：{{$recentArray['JXFIVE']->created_at}}
                            <br>
                            <br>
                            <strong>江西11选5</strong>
                            <br>
                            第<em>{{$recentArray['JXFIVE']->proName}}</em>期开奖号码<br><br>

                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[0]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[1]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[2]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[3]}}"></div>
                            <div class="fiveNum{{explode(',', $recentArray['JXFIVE']->codes)[4]}}"></div>
                            <br>
                            <a href="/fivelotteryIndex?lottery_type=jxfive" class="gp_lottery_sure">
                                <img class="gp_lottery_sure">
                            </a>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-generic" role="button"
                   data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-generic" role="button"
                   data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-8" style="padding: 0px">
            <div class="gp_second">

            </div>
        </div>

    </div>
    <div class="container" style="background-color: white">
        <div class="col-md-1">
            <div class="gp_news_all" style="margin-top: 20px;margin-left: 20px"></div>
        </div>
        <div class="col-md-11">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row"
             style="padding-top: 10px;padding-bottom: 10px;background-color: white;margin-right: 8px;margin-left:8px">
            <div class="gp_bottom">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10" style="padding-top: 3px;background-color:#fdc124;"></div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="col-md-offset-1 col-md-10">
            <div class="row">

                <div class="col-md-3" style="text-align: center">
                    <span class="gp_secure"></span><a style="color: #ee7732;font-size: 18px;">账户安全</a>
                </div>
                <div class="col-md-3" style="text-align: center">
                    <span class="gp_time"></span><a style="color: #ee7732;font-size: 18px;">购彩便捷</a>
                </div>
                <div class="col-md-3" style="text-align: center">
                    <span class="gp_exchange"></span><a style="color: #ee7732;font-size: 18px;">兑换简单</a>
                </div>
                <div class="col-md-3" style="text-align: center">
                    <span class="gp_deposit"></span><a style="color: #ee7732;font-size: 18px;">提款快捷</a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        function userclick(type) {
            if (type == 1) {

                window.location.href = 'register';
            }
            if (type == 2) {

                window.location.href = 'recharge';
            }
            if (type == 3) {

                window.location.href = 'deposit';
            }
            if (type == 4) {

                window.location.href = 'dailiregister';
            }
            if (type == 5) {
                $('#myModal').modal('show');
            }
        }
    </script>
@stop
