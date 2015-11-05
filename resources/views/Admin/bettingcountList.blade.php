@extends('Layout.backmaster')

@section('title')
    管理员
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <div class="row">
            @include('Admin.back_left_bar')
            <div class="col-md-10">

                @include('errors.list')

                <h3 align="center">
                    投注统计列表(日期没选，默认获取当天金额</h3>

                <div>
                    <div style="float: left;">
                        <label>用户名:</label><input type="text" id="userName" name="userName" value="{{$userName}}">
                        <label>开始时间:</label>
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <div class="input-group date form_date" style="width: 220px"
                             data-date-format="yyyy-mm-dd" data-link-field="starttime">
                            <input class="form-control" size="16" type="text" value="{{$starttime}}" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="starttime" value="{{$starttime}}"/><br/>
                    </div>
                    <div style="float: left;">
                        <label>结束时间:</label>
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <div class="input-group date form_date" style="width: 220px"
                             data-date-format="yyyy-mm-dd" data-link-field="endtime">
                            <input class="form-control" size="16" type="text" value="{{$endtime}}" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="endtime" value="{{$endtime}}"/><br/>
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
                    </div>
                </div>
                <table class="table table-hover">
                    <tr>
                        {{--<td>日期</td>--}}
                        <td>会员</td>
                        <td>投注金额</td>
                        <td>中奖金额</td>
                        <td>盈利金额</td>
                        <td>投注次数</td>
                        <td>剩余金额</td>
                    </tr>
                    <?php
                    $sumeach = 0;
                    $sumbingo = 0;
                    ?>
                    @if (count($lu_lotteries_k3s))
                        @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                            <?php
                            $sumeach += $lu_lotteries_k3->eachPrice;
                            $sumbingo += $lu_lotteries_k3->bingoPrice;
                            ?>
                            <tr>
                                {{--                                <td>{{ $lu_lotteries_k3->uid }}</td>--}}
                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                <td>{{ $lu_lotteries_k3->profit }}</td>
                                <td>{{ $lu_lotteries_k3->bcount }}</td>
                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->points }}</td>
                            </tr>
                        @endforeach
                    @else
                        <h1>没有记录</h1>
                    @endif
                </table>
                <div>
                    <a>投注总金额：<span style="color: red">{{$sumeach}}</span> 中奖金额：<span
                                style="color: red"> {{$sumbingo}}</span>盈利金额：<span
                                style="color: red"> {{$sumeach -$sumbingo}}</span></a>
                </div>
                {{--{{$lu_lotteries_k3->appends($input)->links()}}--}}
            </div>
        </div>

    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            language: 'zh-CN',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
        $('.form_date').datetimepicker({
            language: 'zh-CN',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('.form_time').datetimepicker({
            language: 'zh-CN',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });

        function Search() {
            url = "bettingcountList?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val();
            window.location.href = url;
        }
        ;
    </script>
@stop