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
            <marquee scrollamount=3 style="color:white">{{Cache::get('marquee','请到后台设置滚动文字kc')}}</marquee>
        </div>
    </div>
    <div class="container" style="background-color: #ffffff">
        <div class="col-md-8 mobilhide" style="margin-top: 30px">
            <div id="carousel-generic" class="carousel slide" data-ride="carousel"
                 xmlns="http://www.w3.org/1999/html">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="/css/gp01.jpg" alt="...">

                        <div class="carousel-caption">
                            {{--<p>中奖率高、赔率高、信誉100%</p>--}}
                        </div>
                    </div>
                    <div class="item">
                        <img src="/css/gp02.jpg" alt="...">

                        <div class="carousel-caption">
                            {{--<p>优惠多多、取款5分钟内到帐</p>--}}
                        </div>
                    </div>
                    <div class="item">
                        <img src="/css/gp03.jpg" alt="...">

                        <div class="carousel-caption">
                            {{--<p>中奖金额免税收</p>--}}
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
        <div class="col-md-4 mobilhide" style="padding-top: 30px;">
            <div class="gp_new_guide mobilhide" style="background-color: white;">
                <div style="padding-top: 35px;width: 250px">
                    @if(null!==Cache::get('news'))
                        @foreach(Cache::get('news') as $key=>$value)
                            <a style="width: auto;color: #808080;font-size: 15px;height: 30px;"
                               href="{{isset($value['url'])?$value['url']:'#'}}"
                               target="_blank">{{isset($value['title'])?$value['title']:''}}</a><span
                                    class="time"></span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="background-color: white;padding-top: 20px;">
        <div class="gaopinLotAll">
            <div class="">
                <a href="/lotteryIndex?lottery_type=jsold">
                    <div class="gp_route_overlay"></div>
                </a>
                <a href="/lotteryIndex?lottery_type=jsnew">
                    <div class="gp_route_overlay"></div>
                </a>
                <a href="/ssclotteryIndex?lottery_type=jxssc">
                    <div class="gp_route_overlay"></div>
                </a>
                <a href="/ssclotteryIndex?lottery_type=cqssc">
                    <div class="gp_route_overlay"></div>
                </a>
                <a href="/fivelotteryIndex?lottery_type=sdfive">
                    <div class="gp_route_overlay"></div>
                </a>
                <a href="/fivelotteryIndex?lottery_type=sdfive">
                    <div class="gp_route_overlay"></div>
                </a>
                <a href="/6helotteryIndex">
                    <div class="gp_route_overlay"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="container" style="background-color: white;padding-top: 20px">
        <div class="col-md-4">
            <div class="gp_lottery_result">
                开奖时间：{{$recentArray['SDFIVE']->created_at}}
                <br>
                <br>
                <strong>山东11选5</strong>
                <br>
                第<em>{{$recentArray['SDFIVE']->proName}}</em>期开奖号码<br><br>

                <div class="fiveNum{{explode(',', $recentArray['SDFIVE']->codes)[0]}}"></div>
                <div class="fiveNum{{explode(',', $recentArray['SDFIVE']->codes)[1]}}"></div>
                <div class="fiveNum{{explode(',', $recentArray['SDFIVE']->codes)[2]}}"></div>
                <div class="fiveNum{{explode(',', $recentArray['SDFIVE']->codes)[3]}}"></div>
                <div class="fiveNum{{explode(',', $recentArray['SDFIVE']->codes)[4]}}"></div>
                <br>
                <a href="/fivelotteryIndex?lottery_type=sdfive" class="gp_lottery_sure">
                    <img class="gp_lottery_sure">
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="gp_lottery_routes">
                <div class="gp_route_word">
                    <div style="display: table-cell;vertical-align: middle">
                        <a href="/ssclotteryIndex?lottery_type=cqssc">重庆</a>&nbsp;&nbsp;|
                        <a href="/ssclotteryIndex?lottery_type=jxssc">江西</a>&nbsp;&nbsp;|
                        <a href="/ssclotteryIndex?lottery_type=tjssc">天津</a>&nbsp;&nbsp;|
                        <a href="/ssclotteryIndex?lottery_type=xjssc">新疆</a>&nbsp;&nbsp;
                    </div>
                </div>
                <div class="gp_route_word">
                    <div style="display: table-cell;vertical-align: middle">
                        <a href="/lotteryIndex?lottery_type=jsold">江苏</a>&nbsp;&nbsp;|
                        <a href="/lotteryIndex?lottery_type=beijin">北京</a>&nbsp;&nbsp;|
                        <a href="/lotteryIndex?lottery_type=anhui">安徽</a>&nbsp;&nbsp;|
                        <a href="/lotteryIndex?lottery_type=jilin">吉林</a>&nbsp;&nbsp;|
                        <a href="/lotteryIndex?lottery_type=jsnew">广西</a>&nbsp;&nbsp;|
                        <a href="/lotteryIndex?lottery_type=hubei">湖北</a>&nbsp;&nbsp;|
                        <a href="/lotteryIndex?lottery_type=hebei">河北</a>&nbsp;&nbsp;|
                        <a href="/lotteryIndex?lottery_type=nmg">内蒙古</a>&nbsp;&nbsp;
                    </div>
                </div>
                <div class="gp_route_word">
                    <div style="display: table-cell;vertical-align: middle">
                        <a href="/fivelotteryIndex?lottery_type=sdfive">山东</a>&nbsp;&nbsp;|
                        <a href="/fivelotteryIndex?lottery_type=gdfive">广东</a>&nbsp;&nbsp;|
                        <a href="/fivelotteryIndex?lottery_type=shfive">上海</a>&nbsp;&nbsp;|
                        <a href="/fivelotteryIndex?lottery_type=zjfive">浙江</a>&nbsp;&nbsp;|
                        <a href="/fivelotteryIndex?lottery_type=jxfive">江西</a>&nbsp;&nbsp;|
                        <a href="/fivelotteryIndex?lottery_type=liaoningfive">辽宁</a>&nbsp;&nbsp;|
                        <a href="/fivelotteryIndex?lottery_type=hljfive">黑龙江</a>&nbsp;&nbsp;
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container" style="background-color: #ffffff">
        <div class="row"
             style="padding-top: 10px;padding-bottom: 10px;background-color: white;margin-right: 8px;margin-left:8px">
            <a href="/6helotteryIndex">
                <div class="gp_bottom">
                </div>
            </a>
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
