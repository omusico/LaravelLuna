@extends('Layout.'.env("SITE_TYPE",'').'master')

@section('title')
    代理推广链接
@stop

@section('content')
    <div class="container">
        @include('errors.list')

        <div class="form-group col-md-10 col-md-offset-1" style="text-align: center">
            {{--<a class="btn btn-default btn-primary" href="#">代理中心</a>--}}
            <a class="btn btn-default btn-info" href="/dailiregister">代理注册</a>
            <a class="btn btn-default btn-warning" href="/login">代理登陆</a>
        </div>
            <textarea class="form-control" name="proxycert" rows="25" readonly
                      style="display: {{$display}}">{{Cache::get('proxycert')}}</textarea>

        @if(isset($isdaili))
            @if($isdaili)
                <div class="form-group">
                    <label for="sign_type" class="control-label col-md-3">推广地址: </label>

                    <div class="col-md-6">
                        <input class="form-control" id="inviteurl" style="color: red"
                               value="{{$_SERVER['HTTP_HOST'].'/register?invite='.Auth::user()->invite}}">
                    </div>
                </div>
            @endif
            <br/>
            <br/>
            <br/>

            @if($isdaili)
                <h3 align="center">
                    代理推荐列表</h3>

                <div>
                    <div style="float: left;">
                        <label>用户名:</label><input type="text" id="userName" name="userName"
                                                  value="{{$userName}}">
                        <label>开始时间:</label>
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <div class="input-group date form_date" style="width: 220px"
                             data-date-format="yyyy-mm-dd" data-link-field="starttime">
                            <input class="form-control" size="16" type="text" value="{{$starttime}}"
                                   readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-th"></span></span>
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
                                        <span class="input-group-addon"><span
                                                    class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="endtime" value="{{$endtime}}"/><br/>
                    </div>
                    <div style="float: left">
                        {{--<input class="easyui-datebox" style="width: 100px;" id="jiashizhengriqi" type="text" name="jiashizhengriqi" data-options="required:true,formatter:'YYYY-mm-dd'" />--}}
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
                    </div>
                </div>
                <table class="table table-hover"
                <table class="table table-hover">
                    <tr>
                        {{--<td>日期</td>--}}
                        <td>会员</td>
                        <td>投注金额</td>
                        <td>中奖金额</td>
                        <td>盈利金额</td>
                        <td>投注次数</td>
                        <td>剩余金额</td>
                        <td>操作</td>
                    </tr>
                    <?php
                    $sumeach = 0;
                    $sumbingo = 0;
                    ?>
                    @if (count($lu_lotteries_bettings))
                        @foreach ($lu_lotteries_bettings as $lu_lotteries_betting)
                            @if(\App\lu_user::find($lu_lotteries_betting->id)->groupId <> 7)
                                <?php
                                $sumeach += $lu_lotteries_betting->eachPrice;
                                $sumbingo += $lu_lotteries_betting->bingoPrice;
                                ?>
                                <tr>
                                    {{--                                <td>{{ $lu_lotteries_betting->uid }}</td>--}}
                                    <td>{{ $lu_lotteries_betting->name }}</td>
                                    <td>{{ $lu_lotteries_betting->eachPrice }}</td>
                                    <td>{{ $lu_lotteries_betting->bingoPrice }}</td>
                                    <td>{{ $lu_lotteries_betting->profit }}</td>
                                    <td>{{ $lu_lotteries_betting->bcount }}</td>
                                    <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_betting->id)->first()->points }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                           href="/proxydetail/{{$lu_lotteries_betting->id}}">投注情况</a>
                                    </td>
                                </tr>
                            @endif
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
            @else
                <a>当前用户不是代理或者还未登陆</a>
            @endif
        @endif
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
            url = "inviteurl?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val();
            window.location.href = url;
        }
        ;
    </script>
    <script type="text/javascript">
        $("#inviteurl").mouseover(function () {
            $(this).select();
        })
    </script>
@stop