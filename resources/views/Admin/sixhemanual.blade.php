@extends('Layout.backmaster')

@section('title')
    前台优惠消息
@stop

@section('content')
    <div>
        @include('errors.list')
        <h2 class="col-md-offset-5">六合彩开封盘设置</h2>
        <hr/>
        {!! Form::open(['url' => '/savesixhemanual', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2" style="padding: 0px">
                <label class="form-control" >当期六合彩期号:</label>
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="sixhe[proName]"
                       value="{{isset($sixhe['proName'])?$sixhe['proName']:''}}" placeholder="输入六合彩期号">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2" style="padding: 0px">
                <label class="form-control" >AB盘赔率差:</label>
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="sixhe[plus]"
                       value="{{isset($sixhe['plus'])?$sixhe['plus']:''}}" placeholder="输入赔率">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2" style="padding: 0px">
                <label class="form-control" >开盘时间:</label>
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="easyui-datetimebox" style="width: 200px;" id="startsixhetime" value="{{isset($sixhe['starttime'])?$sixhe['starttime']:''}}" type="text" name="sixhe[starttime]" data-options="formatter:myformatter" />

            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2" style="padding: 0px">
                <label class="form-control" >封盘时间:</label>
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="easyui-datetimebox" style="width: 200px;" id="endsixhetime" value="{{isset($sixhe['endtime'])?$sixhe['endtime']:''}}" type="text" name="sixhe[endtime]" data-options="formatter:myformatter" />

            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2" style="padding: 0px">
                <label class="form-control" >每天开封盘时间:</label>
            </div>
            <div class="col-md-5" style="padding: 0px">
                当天开盘时间：<input name="sixhe[todaystart]" value="{{isset($sixhe['todaystart'])?$sixhe['todaystart']:''}}"  class="easyui-timespinner" style="width:80px;">
                当天封盘时间：<input name="sixhe[todayend]" value="{{isset($sixhe['todayend'])?$sixhe['todayend']:''}}"   class="easyui-timespinner" style="width:80px;">
            </div>
        </div>
        <br>
        <br>

        <div class="form-group col-md-5 col-md-offset-4">
            {!! Form::submit('修改', ['class' => 'btn btn-success form-control col-md-offset-4']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
    <script type="text/javascript">
        function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            var h = date.getHours();
            var M = date.getMinutes();
            var s = date.getSeconds();
            function formatNumber(value){
                return (value < 10 ? '0' : '') + value;
            }
            return y+'-'+m+'-'+d+' '+ formatNumber(h)+':'+formatNumber(M)+':'+formatNumber(s);
        }
    </script>
@stop