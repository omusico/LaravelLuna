@extends('master')

@section('title')
    管理员
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                @include('errors.list')
                <div><select class="form-control col-md-4" id="groupId" name="groupId" onchange="changtolocation(this)">
                        <option value="">选择要管理的组</option>
                        <option value="5">总代理</option>
                        <option value="3">次级代理</option>
                        <option value="8">会员</option>
                    </select>
                </div>
                <h3 align="center">
                    {{$groupname}}列表</h3>
                <table class="table table-hover">
                    <tr>
                        <td>姓名</td>
                        <td>性别</td>
                        <td>所属代理</td>
                        <td>手机</td>
                        <td>邮箱</td>
                        <td>权限组</td>
                        <td>余额</td>
                        <td>邀请码</td>
                        <td>操作</td>
                    </tr>
                    @if (count($lu_users))
                        @foreach ($lu_users as $lu_user)
                            <tr>
                                <td>{{ $lu_user->name }}</td>
                                <td>{{ $lu_user->sex }}</td>
                                <td>{{ $lu_user->recId }}</td>
                                <td>{{ $lu_user->phone }}</td>
                                <td>{{ $lu_user->email }}</td>
                                <td>
                                    @foreach($user_groups as $user_group)
                                        @if($user_group['groupId'] === $lu_user->groupId)
                                            {{$user_group['name'] }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $lu_user->points }}</td>
                                <td>{{ $lu_user->invite }}</td>
                                <td>
                                    {{--<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$lu_user->id}}">更新分数</button>--}}
                                    <a class="btn btn-sm btn-info" href="/admin/{{$lu_user->id}}/edit">编辑</a>

                                    <form action="{{ url('admin/'.$lu_user->id) }}" style='display: inline'
                                          method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('确定删除?')">删除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h1>没有会员,请管理员添加</h1>
                    @endif
                </table>
                <?php echo $lu_users->render(); ?>
            </div>
            @include('Admin.right_bar')
        </div>

    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/collect.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        });
        function changtolocation(value) {
            var index = value.selectedIndex; // 选中索引

            var text = value.options[index].text; // 选中文本
            var val = value.options[index].value; // 选中值
            setTimeout(window.location.href = "admin?groupid="+val, 1000);
        }
    </script>
@stop