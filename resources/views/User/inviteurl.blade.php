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
                    <table class="table table-hover">
                        <tr>
                            <td>姓名</td>
                            <td>性别</td>
                            {{--<td>所属代理</td>--}}
                            <td>手机</td>
                            <td>邮箱</td>
                            <td>权限组</td>
                            <td>余额</td>
                            <td>消费金额</td>
                        </tr>
                        @if (count($lu_users))
                            @foreach ($lu_users as $lu_user)
                                <tr>
                                    <td>{{ $lu_user->name }}</td>
                                    <td>{{ $lu_user->sex }}</td>
                                    {{--                                    <td>{{ $lu_user->recId }}</td>--}}
                                    <td>{{ $lu_user->phone }}</td>
                                    <td>{{ $lu_user->email }}</td>
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
                                        @if(Auth::user()->groupId ==5)
                                            {{DB::select('select sum(eachPrice) as sum from lu_lotteries_k3s where uid in (select id from lu_users where recId =?)',[$lu_user->id])[0]->sum}}
                                        @else
                                            {{DB::table('lu_lotteries_k3s')->where('uid',$lu_user->id)->sum('eachPrice')}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h1>没有会员</h1>
                        @endif
                    </table>
                    <?php echo $lu_users->render(); ?>
                @else
                    <a>当前用户不是代理或者还未登陆</a>
                @endif
            @endif
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/collect.js"></script>
    <script type="text/javascript">
        $("#inviteurl").mouseover(function () {
            $(this).select();
        })
    </script>
@stop