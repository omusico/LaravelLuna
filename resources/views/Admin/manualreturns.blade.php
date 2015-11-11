@extends('Layout.backmaster')

@section('title')
    手动开奖
@stop

@section('content')
    <div class="container">
        <div class="row">
            @include('Admin.back_left_bar')
            <div class="col-md-10">
                <h2>快三手动开奖</h2>
                <hr/>

                @include('errors.list')

                <div class="form-group">
                    {!! Form::open(['url' => '/manualreturnsPost', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2 input-group date form_date"
                             data-date-format="yyyy-mm-dd" data-link-field="currentday">
                            <input class="form-control" size="16" type="text" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="currentday" name="currentday"/><br/>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            {!! Form::submit('手动,开奖', ['class' => 'btn btn-success form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <table class="table table-hover">
                    <tr>
                        <td>返水日期</td>
                        <td>用户名</td>
                        <td>返水比例</td>
                        <td>返水金额</td>
                        <td>返水操作人员</td>
                        <td>返水操作时间</td>
                    </tr>
                    @if (count($userreturns))
                        @foreach ($userreturns as $userreturn)
                            <tr>
                                <td>{{ $userreturn->returnDay }}</td>
                                <td>{{ $userreturn->userName }}</td>
                                <td>{{ $userreturn->odds }}</td>
                                <td>{{ $userreturn->amounts }}</td>
                                <td>{{ $userreturn->optUser }}</td>
                                <td>{{ $userreturn->created_at }}</td>
                            </tr>
                        @endforeach
                    @else
                        <h1>没有记录</h1>
                    @endif
                </table>
                {{--{{$userreturn->appends($input)->links()}}--}}
                <?php echo $userreturns->render(); ?>
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

    </script>
@stop