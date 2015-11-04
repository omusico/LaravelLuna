@extends('Layout.backmaster')

@section('title')
    公司转账账户
@stop

@section('content')
    <div class="container">
        <div class="row">
            @include('Admin.back_left_bar')
            <div class="col-md-10">

                @include('errors.list')
                {{--<div><select class="form-control col-md-4" id="groupId" name="groupId" onchange="changtolocation(this)">--}}
                        {{--<option value="">选择要管理的组</option>--}}
                        {{--<option value="5">总代理</option>--}}
                        {{--<option value="3">次级代理</option>--}}
                        {{--<option value="8">会员</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                <h3 align="center">
                    公司转账账户</h3>
                <table class="table table-hover">
                    <tr>
                        <td>银行名称</td>
                        <td>省份</td>
                        <td>城市</td>
                        <td>银行账号</td>
                        <td>开户名</td>
                        <td>操作</td>
                    </tr>
                    @if (count($lu_lottery_company_banks))
                        @foreach ($lu_lottery_company_banks as $lu_lottery_company_bank)
                            <tr>
                                <td>{{ $lu_lottery_company_bank->bankName }}</td>
                                <td>{{ $lu_lottery_company_bank->province }}</td>
                                <td>{{ $lu_lottery_company_bank->city }}</td>
                                <td>{{ $lu_lottery_company_bank->bankCode }}</td>
                                <td>{{ $lu_lottery_company_bank->userName }}</td>
                                <td>
                                    {{--<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$lu_user->id}}">更新分数</button>--}}
                                    <a class="btn btn-sm btn-info" href="/companybank/{{$lu_lottery_company_bank->id}}/edit">编辑</a>
                                    <form action="{{ url('companybank/'.$lu_lottery_company_bank->id) }}" style='display: inline'
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
                        <h1>没有记录,请管理员添加</h1>
                    @endif
                </table>
                <?php echo $lu_lottery_company_banks->render(); ?>
            </div>
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