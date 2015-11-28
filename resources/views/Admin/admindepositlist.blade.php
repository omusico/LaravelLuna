@extends('Layout.backmaster')

@section('title')
    提现审批
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('content')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color: red;font-family: bold">
                        请输入拒绝理由
                    </h4>
                </div>
                {!! Form::open(['url' => '/refusedeposit', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                <input name="refuseid" id="refuseid" type="hidden">

                <div class="form-group">
                    {!! Form::label('name', '拒绝理由', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        <input class="form-control" name="remarks" rows="5" required="required"> </input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit('拒绝', ['class' => 'btn btn-lg btn-danger']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{--            @include('Admin.back_left_bar')--}}
            <div class="col-md-12">

                @include('errors.list')

                <h3 align="center">
                    提现审批列表</h3>

                <div>
                    <div style="float: left;">
                        <label>用户名:</label><input type="text" id="userName" name="userName" value="{{$userName}}">
                        <label>开始时间:</label>
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <div class="input-group date form_datetime" style="width: 220px"
                             data-date-format="yyyy-mm-dd hh:ii" data-link-field="starttime">
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
                        <div class="input-group date form_datetime" style="width: 220px"
                             data-date-format="yyyy-mm-dd hh:ii" data-link-field="endtime">
                            <input class="form-control" size="16" type="text" value="{{$endtime}}" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="endtime" value="{{$endtime}}"/><br/>
                    </div>
                    <div style="float: left;margin-left: 10px">
                        <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
                    </div>
                </div>
                <table class="table table-hover">
                    <tr>
                        <td>流水号</td>
                        <td>用户名</td>
                        <td>金额</td>
                        <td>提款时间</td>
                        <td>手续费</td>
                        <td>拒绝理由</td>
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
                                <td><a style="color: red">{{ $lu_lottery_apply->remarks }}</a></td>
                                <td>@if( $lu_lottery_apply->status ==2)
                                        待审批
                                    @elseif( $lu_lottery_apply->status ==3)
                                        <a style="color: red;">拒绝</a>
                                    @else
                                        <a style="color: green;">通过</a>
                                    @endif
                                </td>
                                <td>
                                    @if($lu_lottery_apply->status ==2)
                                        <a class="btn btn-sm btn-success"
                                           href="/deposit/{{$lu_lottery_apply->id}}/edit">通过</a>
                                        @if($lu_lottery_apply->created_at<="2015-11-28 23:00:00")
                                            <form action="{{ url('deposit/'.$lu_lottery_apply->id)}}"
                                                  style='display: inline'
                                                  method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('确定删除?')">
                                                    删除
                                                </button>
                                            </form>
                                        @else
                                            <a class="btn btn-sm btn-danger"
                                               onclick="ClicktoRefuse({{$lu_lottery_apply->id}})">拒绝</a>
                                        @endif
                                    @endif

                                    <?php $item = \App\lu_lottery_user::where('uid', $lu_lottery_apply->uid)->first(); ?>
                                    <button type="button" class="btn btn-warning"
                                            data-container="body" data-toggle="popover" data-placement="bottom"
                                            title="{{ $lu_lottery_apply->userName }}--银行信息"
                                            data-content="
                                                @if(isset($item))
                                                 银行名称 : {{ $item->bankName }} |
                                                开户行 : {{ $item->openBank }} |
                                                 银行账号 : {{ $item->bankCode }}|
                                                     开户人姓名 : {{ $item->userName }}
                                                    @endif
                                                    ">
                                        银行信息
                                    </button>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h1>没有记录</h1>
                    @endif
                </table>
                <?php echo $lu_lottery_applys->appends(['userName' => $userName, 'starttime' => $starttime, 'endtime' => $endtime])->render(); ?>
            </div>
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
            url = "getdepositlist?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val();
            window.location.href = url;
        }
        ;
        function ClicktoRefuse(id) {
            $("#refuseid").val(id);
            $('#myModal').modal('show');

        }
    </script>
@stop