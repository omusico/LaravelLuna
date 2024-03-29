@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    交易记录
@stop
@section('content')
    <div class="container">
        <aside class="col-md-3 mobilhide" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        @include('User.topbar')
        <main class="col-md-9" style="padding-left: 0px;padding-right: 0px">

            @include('errors.list')

            @if(env('SITE_TYPE','')=='gaopin')
                <ul class="nav navbar-nav" role="tablist" id="SwitchBList">
                    <li role="presentation" class="active"><a href="/userLotteryBetting?bettingType=k3">快三投注记录</a></li>
                    <li role="presentation"><a href="/userLotteryBetting?bettingType=five">11选5投注记录</a></li>
                    <li role="presentation"><a href="/userLotteryBetting?bettingType=ssc">时时彩投注记录</a></li>
                    <li role="presentation"><a href="/userLotteryBetting?bettingType=6he">六合彩投注记录</a></li>
                </ul>
                <input type="hidden" value="{{$bettingType}}">
            @endif
            <br/>
            <br/>
            <table class="table table-hover">
                <tr>
                    <td>类型</td>
                    <td>期号</td>
                    <td class="mobilhide">类型</td>
                    <td>号码</td>
                    <td>投注金额</td>
                    <td>中奖金额</td>
                    <td>开奖号码</td>
                    <td>状态</td>
                    <td>投注时间</td>
                </tr>
                <?php
                $lunaFunctions = new \App\LunaLib\Common\LunaFunctions();
                ?>
                @if (count($lu_lotteries_k3s))
                    @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                        <tr>
                            <td>{{ $lu_lotteries_k3->provinceName }}</td>
                            <td>{{ $lu_lotteries_k3->proName }}</td>
                            @if($bettingType=="6he")
                                <td class="mobilhide">{{$types[$lunaFunctions->return6hetype($lu_lotteries_k3->typeId)]['name']}}</td>
                            @else
                                <td class="mobilhide">{{$types[$lu_lotteries_k3->typeId]['name']}}</td>
                            @endif
                            <td >{{ $lu_lotteries_k3->codes }}</td>
                            <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                            <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                            <td>{{ $lu_lotteries_k3->resultNum }}</td>
                            <td>
                                @if($lu_lotteries_k3->status == -2)
                                    <a style="color: #808080">撤单</a>
                                @elseif($lu_lotteries_k3->status == -1)
                                    @if($lu_lotteries_k3->noticed==1)
                                        <a style="color: red">追号中奖</a>
                                    @else
                                        <a style="color: #0000ff">中奖取消追号</a>
                                    @endif
                                @elseif($lu_lotteries_k3->isOpen == 1 || $lu_lotteries_k3->dealing ==1)
                                    @if($lu_lotteries_k3->noticed==1)
                                        <a style="color: red">中奖</a>
                                    @else
                                        <a style="color: green">未中奖</a>
                                    @endif
                                @else
                                    等待开奖
                                @endif
                            </td>
                            <td>{{ $lu_lotteries_k3->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    {{--<h1>没有记录 </h1>--}}
                @endif
            </table>
            <?php echo $lu_lotteries_k3s->appends(['bettingType' => $bettingType])->render(); ?>
        </main>
        @include('User.mobilebottom')
    </div>
@stop
@section("script")
@stop
