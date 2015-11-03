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
            <div class="col-md-10">

                @include('errors.list')

                <h3 align="center">
                    投注列表</h3>

                <div>
                    <div style="float: left;">
                        <label>用户名:</label><input type="text" id="userName" name="userName" value="{{$userName}}">
                        <label>开始时间:</label>
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <div class="input-group date form_datetime" style="width: 220px"
                             data-date-format="yyyy-mm-dd hh:ii" data-link-field="starttime">
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
                        <div class="input-group date form_datetime" style="width: 220px"
                             data-date-format="yyyy-mm-dd hh:ii" data-link-field="endtime">
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
                        <h1>没有记录</h1>
                    @endif
                </table>
                {{--{{$lu_lotteries_k3->appends($input)->links()}}--}}
                <?php echo $lu_lotteries_k3s->appends(['userName' => $userName, 'starttime' => $starttime, 'endtime' => $endtime])->render(); ?>
            </div>
            @include('Admin.right_bar')
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
            url ="bettingList?userName="+$("#userName").val()+"&starttime="+$("#starttime").val()+"&endtime="+$("#endtime").val();
            window.location.href = url;
        }
        ;
    </script>
@stop