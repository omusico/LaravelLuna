@extends('master')

@section('title')
    管理员
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                @include('errors.list')

                <h3 align="center">
                    投注列表</h3>
                <table class="table table-hover">
                    <tr>
                        <td>姓名</td>
                        <td>所属代理</td>
                        <td>投注金额</td>
                        <td>投注时间</td>
                    </tr>
                    @if (count($lu_lotteries_k3s))
                        @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                            <tr>
                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                <td>{{ $lu_lotteries_k3->recUId }}</td>
                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                <td>{{ $lu_lotteries_k3->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <h1>没有会员,请管理员添加</h1>
                    @endif
                </table>
                <?php echo $lu_lotteries_k3s->render(); ?>
            </div>
            @include('Admin.right_bar')
        </div>

    </div>
@stop