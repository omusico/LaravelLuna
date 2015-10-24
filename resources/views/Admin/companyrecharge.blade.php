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
                        <td>订单号</td>
                        <td>充值金额</td>
                        <td>银行</td>
                        <td>存款人姓名</td>
                        <td>开户行网点</td>
                        <td>开户行城市</td>
                        <td>支付方式</td>
                        <td>状态</td>
                        <td>操作</td>
                    </tr>
                    @if (count($lu_companys))
                        @foreach ($lu_companys as $lu_company)
                            <tr>
                                <td>{{ $lu_company->sn }}</td>
                                <td>{{ $lu_company->amounts }}</td>
                                <td>{{ $lu_company->payBank }}</td>
                                <td>{{ $lu_company->rechargerUser }}</td>
                                <td>{{ $lu_company->payArea }}</td>
                                <td>{{ $lu_company->payAreaCity }}</td>
                                <td>
                                    @if( $lu_company->status ==2)
                                        <a style="color:red">未通过</a>
                                    @else
                                        <a style="color:green">通过</a>
                                    @endif
                                </td>
                                <td>@if($lu_company->payType ==1)
                                        网银转帐
                                    @elseif($lu_company->payType ==2)
                                        ATM自动柜员机
                                    @elseif($lu_company->payType ==3)
                                        ATM现金入款
                                    @elseif($lu_company->payType ==4)
                                        银行柜台
                                    @elseif($lu_company->payType ==5)
                                        手机银行转账
                                    @endif
                                </td>
                                <td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="/company/{{$lu_company->id}}/edit">通过</a>

                                    <form action="{{ url('company/'.$lu_company->id) }}" style='display: inline'
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
                <?php echo $lu_companys->render(); ?>
            </div>
            @include('Admin.right_bar')
        </div>

    </div>
@stop