@extends('master')

@section('title')
    管理员
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                @include('errors.list')

                <h3 align="center">会员列表</h3>
                <table class="table table-hover">
                    <tr>
                        <td>姓名</td>
                        <td>性别</td>
                        <td>手机</td>
                        <td>邮箱</td>
                        <td>操作</td>
                    </tr>
                    @if (count($lu_users))
                        @foreach ($lu_users as $lu_user)
                            <tr>
                                <td>{{ $lu_user->name }}</td>
                                <td>{{ $lu_user->sex }}</td>
                                <td>{{ $lu_user->phone }}</td>
                                <td>{{ $lu_user->email }}</td>
                                <td>
                                    {{--<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$lu_user->id}}">更新分数</button>--}}
                                    <form action="{{ url('admin/'.$lu_user->id) }}" style='display: inline' method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('确定删除?')">删除</button>
                                    </form>
                                </td>
                            </tr>

{{--                            @include('Admin.upload_grade')--}}

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