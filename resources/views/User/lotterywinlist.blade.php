@extends('master')
@section('title')
    中奖记录
@stop
@section('content')
    <div class="container">
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
                    <td>订单</td>
                    <td>姓名</td>
                    <td>期号</td>
                    <td>号码</td>
                    <td>投注金额</td>
                    <td>中奖金额</td>
                    <td>投注时间</td>
                </tr>
                @if (count($lu_lottery_note_k3s))
                    @foreach ($lu_lottery_note_k3s as $lu_lottery_note_k3)
                        <tr>
                            <td>{{$lu_lottery_note_k3->provinceName}}</td>
                            {{--<td>{{ \App\LunaLib\Common\CommonClass::get_lottery_name($lu_lottery_note_k3->provinceName)}}</td>--}}
                            <td>{{ $lu_lottery_note_k3->dateSn }}</td>
                            <td>{{ $lu_lottery_note_k3->userName }}</td>
                            <td>{{ $lu_lottery_note_k3->proName }}</td>
                            <td>{{ $lu_lottery_note_k3->code}}</td>
                            <td>{{ $lu_lottery_note_k3->eachPrice }}</td>
                            <td>{{ $lu_lottery_note_k3->bingoPrice }}</td>
                            <td>{{ $lu_lottery_note_k3->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <h1>没有记录</h1>
                @endif
            </table>
            <?php echo $lu_lottery_note_k3s->render(); ?>
        </main>
    </div>
@stop