@extends('Layout.backmaster')

@section('title')
    管理员
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('content')
    <div>
        @include('errors.list')

        {{--<h3 align="center">--}}
        {{--投注列表</h3>--}}
        <div style="float: left;">
            <label>开奖期号:</label><input type="text" id="proName" name="proName" value="{{$proName}}">
        </div>
        <div style="float: left;">
            <label>类型:</label>
            <select required="required" id="typeName" name="typeName">
                @if(env('SITE_TYPE','')=='five')
                    <option value=""></option>
                    <option value="sdfive">山东11选5</option>
                    <option value="gdfive">广东11选5</option>
                    <option value="shfive">上海11选5</option>
                    <option value="zjfive">浙江11选5</option>
                    <option value="jxfive">江西11选5</option>
                    <option value="liaoningfive">辽宁11选5</option>
                    <option value="hljfive">黑龙江11选5</option>
                    <option value="cqfive">重庆11选5</option>
                @elseif(env('SITE_TYPE','')=='gaopin')
                    <option value=""></option>
                    <option value="sdfive">山东11选5</option>
                    <option value="gdfive">广东11选5</option>
                    <option value="shfive">上海11选5</option>
                    <option value="zjfive">浙江11选5</option>
                    <option value="jxfive">江西11选5</option>
                    <option value="liaoningfive">辽宁11选5</option>
                    <option value="hljfive">黑龙江11选5</option>
                    <option value="cqfive">重庆11选5</option>
                    <option value="jsold">江苏快三</option>
                    <option value="beijin">北京快三</option>
                    <option value="anhui">安徽快三</option>
                    <option value="hebei">河北快三</option>
                    <option value="jilin">吉林快三</option>
                    <option value="jsnew">广西快三</option>
                    <option value="hubei">湖北快三</option>
                    <option value="fjk3">福建快三</option>
                    <option value="nmg">内蒙古快三</option>
                    <option value="cqssc">重庆时时彩</option>
                    <option value="jxssc">江西时时彩</option>
                    <option value="tjssc">天津时时彩</option>
                    <option value="xjssc">新疆时时彩</option>

                @else
                    <option value=""></option>
                    <option value="jsold">江苏快三</option>
                    <option value="beijin">北京快三</option>
                    <option value="anhui">安徽快三</option>
                    <option value="hebei">河北快三</option>
                    <option value="jilin">吉林快三</option>
                    <option value="jsnew">广西快三</option>
                    <option value="hubei">湖北快三</option>
                    <option value="fjk3">福建快三</option>
                    <option value="nmg">内蒙古快三</option>
                @endif
            </select>
            <label>开奖号码:</label><input type="text" id="codes" name="codes" value="{{$codes}}">
        </div>
        <hr/>
        <div>
            @if(env('SITE_TYPE','')=='gaopin')
                <div style="display: inline-block;">
                    <ul class="nav navbar-nav" role="tablist">
                        <li role="presentation" class="active"><a href="/bettingList?bettingType=k3">快三投注记录</a></li>
                        <li role="presentation"><a href="/bettingList?bettingType=five">11选5投注记录</a></li>
                        <li role="presentation"><a href="/bettingList?bettingType=ssc">时时彩投注记录</a></li>
                        <li role="presentation"><a href="/bettingList?bettingType=6he">六合彩投注记录</a></li>
                    </ul>
                </div>
                <br>
                <input id="bettingType" type="hidden" value="{{$bettingType}}">
            @endif
            <div style="float: left;">
                <label>用户名:</label><input type="text" id="userName" name="userName" value="{{$userName}}">
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
            <div style="float: left;margin-left: 10px">
                <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
            </div>
        </div>
        <table class="table table-hover">
            <tr>
                <td>类型</td>
                <td>订单</td>
                <td>姓名</td>
                <td>期号</td>
                <td>类型</td>
                <td>号码</td>
                <td>投注金额</td>
                <td>中奖金额</td>
                <td>开奖结果</td>
                <td>状态</td>
                <td>投注时间</td>
                <td>操作</td>
            </tr>

            <?php
            $lunaFunctions = new \App\LunaLib\Common\LunaFunctions();
            ?>
            @if (count($lu_lotteries_k3s))
                @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                    <tr>
                        <td>{{ $lu_lotteries_k3->provinceName }}</td>
                        <td>{{ $lu_lotteries_k3->sn }}</td>
                        <td>{{ $lu_lotteries_k3->userName }}</td>
                        <td>{{ $lu_lotteries_k3->proName }}</td>
                        @if($bettingType=="6he")
                            <td>{{$lunaFunctions->return6hetype($lu_lotteries_k3->typeId)}}</td>
                        @else
                            <td>{{ $lu_lotteries_k3->typeId }}</td>
                        @endif
                        <td>{{ $lu_lotteries_k3->codes }}</td>
                        <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                        <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                        <td>{{ $lu_lotteries_k3->resultNum }}</td>
                        <td>
                            @if($lu_lotteries_k3->status == -2)
                                <a style="color: green">撤单</a>
                            @elseif($lu_lotteries_k3->status == -1)
                                @if($lu_lotteries_k3->noticed==1)
                                    <a style="color: red">追号中奖</a>
                                @else
                                    <a style="color: #0000ff">中奖取消追号</a>
                                @endif
                            @elseif($lu_lotteries_k3->isOpen == 1 || $lu_lotteries_k3->dealing ==1)
                                @if($lu_lotteries_k3->noticed==1)
                                    <a style="color: red">中奖</a>
                                @else
                                    <a style="color: #808080">未中奖</a>
                                @endif
                            @else
                                等待开奖
                            @endif
                            {{$lu_lotteries_k3->noticed}}
                        </td>
                        <td>{{ $lu_lotteries_k3->created_at }}</td>
                        <td>
                            @if($lu_lotteries_k3->status != -2)
                                {{--<a class="btn btn-sm btn-warning"--}}
                                {{--href="/cancelOrderSingle/{{$lu_lotteries_k3->id}}">撤单</a>--}}
                                <form action="{{ url('cancelOrderSingle/'.$lu_lotteries_k3->id) }}"
                                      style='display: inline'
                                      method="get">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button class="btn btn-sm btn-confirm" onclick="return confirm('确定撤单?')">撤单
                                    </button>
                                </form>
                            @else
                                <form action="{{ url('deleteCancelOrder/'.$lu_lotteries_k3->id) }}"
                                      style='display: inline'
                                      method="get">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('确定删除撤单?')">删除撤单
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach
            @else
            @endif
        </table>
        {{--{{$lu_lotteries_k3->appends($input)->links()}}--}}
        <?php echo $lu_lotteries_k3s->appends(['userName' => $userName, 'proName' => $proName, 'codes' => $codes, 'bettingType' => $bettingType, 'typeName' => $typeName])->render(); ?>
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
        $(function () {
            $("#typeName").val("{{$typeName}}")
        });
        function Search() {
            url = "bettingList?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val() + "&proName=" + $("#proName").val() + "&codes=" + $("#codes").val() + "&bettingType=" + $("#bettingType").val() + "&typeName=" + $("#typeName option:selected").val();
            window.location.href = url;
        }
        ;
    </script>
@stop