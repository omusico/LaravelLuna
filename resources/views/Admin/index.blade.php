@extends('Layout.backmaster')

@section('title')
    管理员
@stop

@section('content')
    <div>
        @include('errors.list')
        <hr>
        <div>
            <div style="float: left;">
                <label>用户名:</label><input type="text" id="userName" name="userName" value="{{$userName}}">
            </div>
            {{--<div style="float: left">--}}
            {{--<select name="groupId" class="easyui-combobox" style="width: 215px" id="groupId">--}}
            {{--<option value="">选择要管理的组</option>--}}
            {{--@foreach($user_groups as $user_group)--}}
            {{--<option value="{{$user_group['groupId']}}">{{$user_group['name']}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--</div>--}}
            <div style="float: right;margin-right: 50px">
                <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
            </div>
        </div>

        <table class="table table-hover">
            <tr>
                <td>用户名</td>
                <td>姓名</td>
                <td>性别</td>
                <td>所属代理</td>
                <td>手机</td>
                <td>邮箱</td>
                <td>权限组</td>
                <td>QQ</td>
                <td>ip</td>
                <td>余额</td>
                <td>邀请码</td>
                <td>注册时间</td>
                <td>操作</td>
                <td>充值</td>
            </tr>
            @if (count($lu_users))
                @foreach ($lu_users as $lu_user)
                    <tr>
                        <td>{{ $lu_user->name }}</td>
                        <td>{{ $lu_user->realName }}</td>
                        <td>{{ $lu_user->sex }}</td>
                        <td>{{ $lu_user->recUser }}</td>
                        <td>{{ $lu_user->phone }}</td>
                        <td>{{ $lu_user->email }}</td>
                        <td>
                            @foreach($user_groups as $user_group)
                                @if($user_group['groupId'] === $lu_user->groupId)
                                    {{$user_group['name'] }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $lu_user->qq}}</td>
                        <td>{{ $lu_user->lu_user_data->loginIp }}</td>
                        <td>{{ $lu_user->lu_user_data->points }}</td>
                        <td>{{ $lu_user->invite }}</td>
                        <td>{{ $lu_user->created_at}}</td>
                        <td>
                            {{--<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$lu_user->id}}">更新分数</button>--}}
                            <a class="btn btn-sm btn-info" href="/admin/{{$lu_user->id}}/edit">编辑</a>
                            @if($groupid =="3")
                                <a class="btn btn-sm btn-default" href="/adminproxydetail?id={{$lu_user->id}}">代理明细</a>
                            @else
                                <a class="btn btn-sm btn-default" href="/admindetail/{{$lu_user->id}}">资金明细</a>
                            @endif
                            {{--<form action="{{ url('admin/'.$lu_user->id) }}" style='display: inline'--}}
                            {{--method="post">--}}
                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                            {{--<button class="btn btn-sm btn-danger" onclick="return confirm('确定删除?')">删除--}}
                            {{--</button>--}}
                            {{--</form>--}}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/manualrecharge/{{$lu_user->id}}">手动充值</a>
                            <?php $item = \App\lu_lottery_user::where('uid', $lu_user->id)->first(); ?>
                            <button type="button" class="btn btn-sm btn-warning"
                                    data-container="body" data-toggle="popover" data-placement="bottom"
                                    title="{{ $lu_user->name }}--银行信息"
                                    data-content="
                                                @if(isset($item))
                                                 银行名称 : {{ $item->bankName }} |
                                                开户行 : {{ $item->openBank }} |
                                                 银行账号 : {{ $item->bankCode }}|
                                                     开户人姓名 : {{ $item->userName }}
                                                    @endif
                                            ">
                                银行卡
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <h1>没有会员,请管理员添加</h1>
            @endif
        </table>
        <?php echo $lu_users->appends(['userName' => $userName,'groupid'=>$groupid])->render(); ?>

    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
        });
        function changtolocation(value) {
            var index = value.selectedIndex; // 选中索引

            var text = value.options[index].text; // 选中文本
            var val = value.options[index].value; // 选中值
            setTimeout(window.location.href = "admin?groupid=" + val, 1000);
        }

        function Search() {
            url = "admin?userName=" + $("#userName").val();
            window.location.href = url;
        }
    </script>
@stop