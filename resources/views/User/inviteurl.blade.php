@extends('Layout.master')

@section('title')
    代理推广链接
@stop

@section('content')
    <div class="container">

        <div class="col-md-12">

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
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tr>
                            <td>姓名</td>
                            <td class="mobilhide">性别</td>
                            {{--<td>所属代理</td>--}}
                            {{--<td class="mobilhide">手机</td>--}}
                            {{--<td class="mobilhide">邮箱</td>--}}
                            <td>权限组</td>
                            <td>余额</td>
                            <td>消费金额</td>
                            <td>操作</td>
                        </tr>
                        @if (count($lu_users))
                            @foreach ($lu_users as $lu_user)
                                <tr>
                                    <td>{{ $lu_user->name }}</td>
                                    <td class="mobilhide">{{ $lu_user->sex }}</td>
                                    {{--                                    <td>{{ $lu_user->recId }}</td>--}}
                                    {{--<td class="mobilhide">{{ $lu_user->phone }}</td>--}}
                                    {{--<td class="mobilhide">{{ $lu_user->email }}</td>--}}
                                    <td>
                                        {{--                                        {{$lu_user->groupId}}--}}
                                        @foreach($user_groups as $user_group)
                                            @if($user_group['groupId'] == $lu_user->groupId)
                                                {{$user_group['name'] }}
                                            @endif
                                        @endforeach
                                        {{--{{$user_group[$lu_user->groupId]['name']}}--}}
                                    </td>
                                    <td>{{ $lu_user->lu_user_data->points }}</td>
                                    <td>
                                        {{--@if(Auth::user()->groupId ==5)--}}
                                        {{--{{DB::select('select sum(eachPrice) as sum from lu_lotteries_k3s where uid in (select id from lu_users where recId =?)',[$lu_user->id])[0]->sum}}--}}
                                        {{--@else--}}
                                        {{DB::table('lu_lotteries_k3s')->where('uid',$lu_user->id)->where('status', '1') ->sum('eachPrice')}}
                                        {{--@endif--}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="/proxydetail/{{$lu_user->id}}">投注情况</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h1>没有会员</h1>
                        @endif
                    </table>
                    <?php echo $lu_users->appends(['userName' => $userName, 'starttime' => $starttime, 'endtime' => $endtime])->render(); ?>
                @else
                    <a>当前用户不是代理或者还未登陆</a>
                @endif
            @endif
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