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
                投注记录</h3>
            <table class="table table-hover">
                <tr>
                    <td>投注日期</td>
                    <td>投注金额</td>
                    <td>中奖金额</td>
                </tr>
                @if (count($lu_lotteries_k3s))
                    @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                        <tr>
                            <td>{{ $lu_lotteries_k3->created_at }}</td>
                            <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                            <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                        </tr>
                    @endforeach
                @else
                    <h1>没有记录</h1>
                @endif
            </table>
        </main>
    </div>
@stop