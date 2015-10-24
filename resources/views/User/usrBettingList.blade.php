@extends('master')
@section('title')
    交易记录
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('errors.list')

                <h3 align="center">
                    交易记录</h3>
                <table class="table table-hover">
                    <tr>
                        <td>类型</td>
                        <td>订单</td>
                        <td>姓名</td>
                        <td>期号</td>
                        <td>号码</td>
                        <td>投注金额</td>
                        <td>中奖金额</td>
                        <td>状态</td>
                        <td>投注时间</td>
                    </tr>
                    @if (count($lu_lotteries_k3s))
                        @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                            <tr>
                                <td>{{ $lu_lotteries_k3->provinceName }}</td>
                                <td>{{ $lu_lotteries_k3->sn }}</td>
                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                <td>{{ $lu_lotteries_k3->proName }}</td>
                                <td>{{ $lu_lotteries_k3->codes }}</td>
                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                <td>
                                    @if($lu_lotteries_k3->status == -2)
                                        <a style="color: green">撤单</a>
                                    @elseif($lu_lotteries_k3->status == -1)
                                        <a style="color: red">追号中奖结束</a>
                                    @elseif($lu_lotteries_k3->isOpen == 1)
                                        @if($lu_lotteries_k3->noticed==1)
                                            <a style="color: red">中奖</a>
                                        @else
                                            <a style="color: #808080">未中奖</a>
                                        @endif
                                    @else
                                        等待开奖
                                    @endif
                                </td>
                                <td>{{ $lu_lotteries_k3->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <h1>没有记录</h1>
                    @endif
                </table>
                <?php echo $lu_lotteries_k3s->render(); ?>
            </div>
        </div>

    </div>
@stop