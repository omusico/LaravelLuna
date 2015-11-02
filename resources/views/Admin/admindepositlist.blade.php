@extends('Layout.backmaster')

@section('title')
    提现审批
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                @include('errors.list')

                <h3 align="center">
                    提现审批列表</h3>
                <table class="table table-hover">
                    <tr>
                        <td>流水号</td>
                        <td>用户名</td>
                        <td>金额</td>
                        <td>提款时间</td>
                        <td>手续费</td>
                        <td>状态</td>
                        <td>操作</td>
                    </tr>
                    @if (count($lu_lottery_applys))
                        @foreach ($lu_lottery_applys as $lu_lottery_apply)
                            <tr>
                                <td>{{ $lu_lottery_apply->sn }}</td>
                                <td>{{ $lu_lottery_apply->userName }}</td>
                                <td>{{ $lu_lottery_apply->amounts }}</td>
                                <td>{{ $lu_lottery_apply->created_at }}</td>
                                <td>{{ $lu_lottery_apply->fees }}</td>
                                <td>@if( $lu_lottery_apply->status ==2)
                                        未通过
                                    @else
                                        <a style="color: green;">通过</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="/deposit/{{$lu_lottery_apply->id}}/edit">通过</a>
                                    <form action="{{ url('deposit/'.$lu_lottery_apply->id)}}" style='display: inline'
                                          method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('确定删除?')">删除
                                        </button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h1>没有记录</h1>
                    @endif
                </table>
                <?php echo $lu_lottery_applys->render(); ?>
            </div>
            @include('Admin.right_bar')
        </div>

    </div>
@stop