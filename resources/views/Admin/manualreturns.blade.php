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
                        <div class="input-group date form_date" style="width: 220px"
                             data-date-format="yyyy-mm-dd" data-link-field="starttime">
                            <input class="form-control" size="16" type="text" value="{{$starttime}}" readonly>
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