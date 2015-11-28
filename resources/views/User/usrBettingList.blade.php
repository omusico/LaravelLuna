@extends('Layout.'.env("SITE_TYPE",'').'master')
@section('title')
    交易记录
@stop
@section('content')
    <div class="container">
        @if(env('SITE_TYPE','')=='five')
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="background-color: white;padding: 0px">
                    @endif
                <aside class="col-md-3" style="padding-left: 0px">
                    @include('User.left_bar')
                </aside>
                <main class="col-md-9">

                    @include('errors.list')

                    <h3 align="center">
                        交易记录</h3>
                    <table class="table table-hover">
                        <tr>
                            <td>类型</td>
                            {{--<td>订单</td>--}}
                            {{--<td>姓名</td>--}}
                            <td>期号</td>
                            <td>号码</td>
                            <td>投注金额</td>
                            <td>中奖金额</td>
                            <td>开奖号码</td>
                            <td>状态</td>
                            <td>投注时间</td>
                        </tr>
                        @if (count($lu_lotteries_k3s))
                            @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                                <tr>
                                    <td>{{ $lu_lotteries_k3->provinceName }}</td>
                                    {{--<td>{{ $lu_lotteries_k3->sn }}</td>--}}
                                    {{--<td>{{ $lu_lotteries_k3->userName }}</td>--}}
                                    <td>{{ $lu_lotteries_k3->proName }}</td>
                                    <td>{{ $lu_lotteries_k3->codes }}</td>
                                    <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                    <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                    <td>{{ $lu_lotteries_k3->resultNum }}</td>
                                    <td>
                                        @if($lu_lotteries_k3->status == -2)
                                            <a style="color: green">撤单</a>
                                        @elseif($lu_lotteries_k3->status == -1)
                                            <a style="color: red">追号中奖结束</a>
                                        @elseif($lu_lotteries_k3->isOpen == 1 || $lu_lotteries_k3->dealing ==1)
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
                            <h1>没有记录 </h1>
                        @endif
                    </table>
                    <?php echo $lu_lotteries_k3s->render(); ?>
                </main>
                    @if(env('SITE_TYPE','')=='five')
                </div>
            </div>
        @endif
    </div>
@stop