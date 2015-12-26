@extends('Layout.backmaster')

@section('title')
    资金明细
@stop

@section('content')
    <div>
        @include('errors.list')
        <hr>
        <div>
            <div style="float: left;">
                <label>用户名:</label><input type="text" id="userName" name="userName" value="{{$userName}}">
                <label>明细类型:</label>
                <select required="required" id="addType" name="addType">
                    <?php $i = 1 ?>
                    @foreach ($point_types as $point_type)
                        @if($i==1)
                            <option value=""></option>
                            @if($i==$addtype)
                                <option value="{{ $i++ }}" selected>{{ $point_type}}</option>
                            @else
                                <option value="{{ $i++ }}">{{ $point_type}}</option>
                            @endif
                        @else
                            @if($i==$addtype)
                                <option value="{{ $i++ }}" selected>{{ $point_type}}</option>
                            @else
                                <option value="{{ $i++ }}">{{ $point_type}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
                <label>开始时间:</label>
            </div>
            <div style="float: left;margin-left: 10px">
                <div class="input-group date form_date" style="width: 220px"
                     data-date-format="yyyy-mm-dd" data-link-field="starttime">
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
                <div class="input-group date form_date" style="width: 220px"
                     data-date-format="yyyy-mm-dd" data-link-field="endtime">
                    <input class="form-control" size="16" type="text" value="{{$endtime}}" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="endtime" value="{{$endtime}}"/><br/>
            </div>
            <div style="float: left">
                {{--<input class="easyui-datebox" style="width: 100px;" id="jiashizhengriqi" type="text" name="jiashizhengriqi" data-options="required:true,formatter:'YYYY-mm-dd'" />--}}
            </div>
            <div style="float: left;margin-left: 10px">
                <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
            </div>
        </div>
        <table class="table table-hover">
            <tr>
                <td>姓名</td>
                <td>类型</td>
                <td>原来金额</td>
                <td>改变金额</td>
                <td>新的金额</td>
                <td>发生时间</td>
            </tr>
            @if (count($lu_points_records))
                @foreach ($lu_points_records as $lu_points_record)
                    <tr>
                        <td>{{ $lu_points_record->userName }}</td>
                        @if(is_numeric($lu_points_record->addType))
                            <td>{{ $point_types[$lu_points_record->addType] }}</td>
                        @else
                            <td>{{ $lu_points_record->addType }}</td>
                        @endif
                        <td>{{ $lu_points_record->oldPoint }}</td>
                        <td>{{ $lu_points_record->changePoint }}</td>
                        <td>{{ $lu_points_record->newPoint }}</td>
                        <td>{{ $lu_points_record->created_at }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <?php echo $lu_points_records->appends(['userName' => $userName, 'addtype' => $addtype, 'starttime' => $starttime, 'endtime' => $endtime])->render(); ?>

    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
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

        function changtolocation(value) {
            var index = value.selectedIndex; // 选中索引

            var text = value.options[index].text; // 选中文本
            var val = value.options[index].value; // 选中值
            setTimeout(window.location.href = "admin?groupid=" + val, 1000);
        }

        function Search() {
            url = "admindetailmoney?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val() + "&addtype=" + $("#addType option:selected").val();
            window.location.href = url;
        }
    </script>
@stop