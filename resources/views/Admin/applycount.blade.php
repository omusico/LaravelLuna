@extends('Layout.backmaster')

@section('title')
    资金统计
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('content')
    <div>
        @include('errors.list')

        <h3 align="center">
            统计列表(日期没选，默认获取当天金额</h3>

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
            <div style="float: left">
                {{--<input class="easyui-datebox" style="width: 100px;" id="jiashizhengriqi" type="text" name="jiashizhengriqi" data-options="required:true,formatter:'YYYY-mm-dd'" />--}}
            </div>
            <div style="float: left;margin-left: 10px">
                <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
                <a class="btn btn-default btn-danger" onclick="Download()">下载</a>
            </div>
        </div>
        <table class="table table-hover">
            <tr>
                {{--<td>日期</td>--}}
                <td>会员</td>
                <td>提现金额</td>
                <td>提现次数</td>
                <td>剩余金额</td>
                <td>登陆ip</td>
            </tr>
            <?php
            $sumamounts = 0;
            $sumleft = 0;
            ?>
            @if (count($applycounts))
                @foreach ($applycounts as $applycount)
                    @if(\App\lu_user::find($applycount->uid)->groupId <> 7)
                        <?php
                        $sumamounts += $applycount->amounts;
                        $sumleft += \App\lu_user_data::where('uid',$applycount->uid)->first()->points;
                        ?>
                        <tr>
                            {{--                                <td>{{ $applycount->uid }}</td>--}}
                            <td>{{ $applycount->userName }}</td>
                            <td>{{ $applycount->amounts }}</td>
                            <td>{{ $applycount->count }}</td>
                            <td>{{ \App\lu_user_data::where('uid',$applycount->uid)->first()->points }}</td>
                            <td>{{ \App\lu_user_data::where('uid',$applycount->uid)->first()->loginIp }}</td>
                        </tr>
                    @endif
                @endforeach
            @else
                <h1>没有记录</h1>
            @endif
        </table>
        <div>
            <a>提现总金额：<span style="color: red">{{$sumamounts}}</span> 会员剩余金额：<span
                        style="color: red"> {{$sumleft}}</span></a>
        </div>
        {{--{{$applycount->appends($input)->links()}}--}}

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
            url = "applycount?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val();
            window.location.href = url;
        };
        function Download() {
            url = "downloadapplys?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val();
            window.location.href = url;
        };
    </script>
@stop