@extends('Layout.master')
@section('title')
    交易记录
@stop
@section('content')
    <div class="container">
        <aside class="col-md-3" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9">

            @include('errors.list')

            <h3 align="center">
                本周账户明细</h3>
            <table class="table table-hover">
                <tr>
                    <td>投注日期</td>
                    <td>投注金额</td>
                    <td>中奖金额</td>
                    <td>提现金额</td>
                    <td>充值金额</td>
                    <td>返水金额</td>
                </tr>
                @for ($i =0; $i < 7; $i++)
                    <tr>
                        <td>{{ date('Y-m-d',strtotime('-'.$i.' day')) }}</td>
                        <?php $k3s = 0 ?>
                        @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                            @if($lu_lotteries_k3->created_at == date('Y-m-d',strtotime('-'.$i.' day')))
                                <?php $k3s = 1 ?>
                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                            @endif
                        @endforeach
                        @if($k3s==0)
                            <td>
                            </td>
                            <td>
                            </td>
                        @endif
                        <?php $apply = 0 ?>
                        @foreach ($lu_lottery_applys as $lu_lottery_apply)
                            @if($lu_lottery_apply->created_at == date('Y-m-d',strtotime('-'.$i.' day')))
                                <?php $apply = 1 ?>
                                <td>{{ $lu_lottery_apply->applys }}</td>
                            @endif
                        @endforeach
                        @if($apply==0)
                            <td>
                            </td>
                        @endif
                        <?php $recharge = 0 ?>
                        @foreach ($lu_lottery_recharges as $lu_lottery_recharge)
                            {{--{{$lu_lottery_recharge->created_at}}--}}
                            @if($lu_lottery_recharge->created_at == date('Y-m-d',strtotime('-'.$i.' day')))
                                <?php $recharge = 1 ?>
                                <td>{{ $lu_lottery_recharge->recharges }}</td>
                            @endif
                        @endforeach
                        @if($recharge==0)
                            <td>
                            </td>
                        @endif
                        <td></td>
                    </tr>
                @endfor
            </table>
        </main>
    </div>
@stop