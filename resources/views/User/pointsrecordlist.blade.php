@extends('Layout.master')
@section('title')
    账户明细
@stop
@section('content')
    <div class="container">
        <aside class="col-md-3" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9">

            @include('errors.list')

            <h3 align="center">
                账户明细</h3>
            <table class="table table-hover">
                <tr>
                    <td>变更类型</td>
                    <td>彩票类型</td>
                    <td>姓名</td>
                    <td>流水单号</td>
                    <td>原来金额</td>
                    <td>变更金额</td>
                    <td>最后金额</td>
                    <td>投注时间</td>
                </tr>
                @if (count($lu_points_records))
                    @foreach ($lu_points_records as $lu_points_record)
                        <tr>
                            <td>
                                @if ($lu_points_record->addType ==1)
                                    投注
                                @elseif($lu_points_record->addType=2)
                                    中奖
                                @elseif($lu_points_record->addType=3)
                                    在线充值
                                @elseif($lu_points_record->addType=4)
                                    公司充值
                                @else
                                    {{$lu_points_record->addType}}
                                @endif
                            </td>
                            {{--<td>{{ $lu_points_record->lotteryType }}</td>--}}
                            <td>{{ \App\LunaLib\Common\CommonClass::get_lottery_name($lu_points_record->lotteryTypee)}}</td>
                            <td>{{ $lu_points_record->userName }}</td>
                            <td>{{ $lu_points_record->touSn }}</td>
                            <td>{{ $lu_points_record->oldPoint}}</td>
                            <td>{{ $lu_points_record->changePoint }}</td>
                            <td>{{ $lu_points_record->newPoint }}</td>
                            <td>{{ $lu_points_record->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <h1>没有记录</h1>
                @endif
            </table>
            <?php echo $lu_points_records->render(); ?>
        </main>
    </div>
@stop