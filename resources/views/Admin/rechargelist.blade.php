@extends('Layout.backmaster')

@section('title')
    第三方支付充值
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@stop
@section('content')
    <div>

        @include('errors.list')

        <h3 align="center">
            第三方充值审批列表</h3>

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
                <td>订单号</td>
                <td>用户名</td>
                <td>充值金额</td>
                <td>支付方式</td>
                <td>状态</td>
                <td>时间</td>
            </tr>
            @if (count($lu_lottery_recharges))
                @foreach ($lu_lottery_recharges as $lu_lottery_recharge)
                    <tr>
                        <td>{{ $lu_lottery_recharge->sn }}</td>
                        <td>{{ $lu_lottery_recharge->userName }}</td>
                        <td>{{ $lu_lottery_recharge->amounts }}</td>
                        <td>{{ $lu_lottery_recharge->type }}</td>
                        <td>
                            @if( $lu_lottery_recharge->status ==2)
                                <a style="color:red">未通过</a>
                            @else
                                <a style="color:green">通过</a>
                            @endif
                        </td>
                        <td>{{ $lu_lottery_recharge->created_at }}</td>
                    </tr>
                @endforeach
            @else
                <h1>没有记录</h1>
            @endif
        </table>
        <?php echo $lu_lottery_recharges->appends(['userName' => $userName, 'starttime' => $starttime, 'endtime' => $endtime])->render(); ?>
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
            url = "rechargelist?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val();
            window.location.href = url;
        }
        ;
    </script>
@stop