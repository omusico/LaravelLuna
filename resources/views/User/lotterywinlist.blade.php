@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    中奖记录
@stop
@section('content')
    <div class="container">
        <aside class="col-md-3 mobilhide" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        @include('User.topbar')
        <main class="col-md-9">

            @include('errors.list')
            @if(env('SITE_TYPE','')=='gaopin')
                <ul class="nav navbar-nav" role="tablist">
                    <li role="presentation" class="active"><a href="/getLotteryWin?bettingType=k3">快三投注记录</a></li>
                    <li role="presentation"><a href="/getLotteryWin?bettingType=five">11选5中奖记录</a></li>
                    <li role="presentation"><a href="/getLotteryWin?bettingType=ssc">时时彩中奖记录</a></li>
                    <li role="presentation"><a href="/getLotteryWin?bettingType=6he">六合彩中奖记录</a></li>
                </ul>
                <input type="hidden" value="{{$bettingType}}">
            @endif
            <table class="table table-hover">
                <tr>
                    <td>类型</td>
                    {{--<td>订单</td>--}}
                    <td>姓名</td>
                    <td>期号</td>
                    {{--<td>号码</td>--}}
                    {{--<td>投注金额</td>--}}
                    <td>中奖金额</td>
                    <td>投注时间</td>
                </tr>
                @if (count($lu_lottery_note_k3s))
                    @foreach ($lu_lottery_note_k3s as $lu_lottery_note_k3)
                        <tr>
                            <td>{{$lu_lottery_note_k3->provinceName}}</td>
                            {{--<td>{{ \App\LunaLib\Common\CommonClass::get_lottery_name($lu_lottery_note_k3->provinceName)}}</td>--}}
                            {{--<td>{{ $lu_lottery_note_k3->dateSn }}</td>--}}
                            <td>{{ $lu_lottery_note_k3->userName }}</td>
                            <td>{{ $lu_lottery_note_k3->proName }}</td>
                            {{--<td>{{ $lu_lottery_note_k3->code}}</td>--}}
                            {{--<td>{{ $lu_lottery_note_k3->eachPrice }}</td>--}}
                            <td>{{ $lu_lottery_note_k3->bingoPrice }}</td>
                            <td>{{ $lu_lottery_note_k3->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                @endif
            </table>
            <?php echo $lu_lottery_note_k3s->appends(['bettingType' => $bettingType])->render(); ?>
        </main>
        @include('User.mobilebottom')
    </div>
@stop