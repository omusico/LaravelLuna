@extends('Layout.backmaster')

@section('title')
    代理管理
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('content')
    <div>
        @include('errors.list')

        <h3 align="center">
            代理列表(日期没选，默认获取当天金额</h3>

        <div>
            <div style="float: left;">
                {{--<label>代理名:</label><input type="text" id="userName" name="userName" value="{{$userName}}">--}}
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
            <div style="float: left;">
                <label>大代理:</label>
                <select required="required" id="bigProxyList" name="bigProxyList"
                        onchange="SwitchBigProxy(this.options[this.options.selectedIndex].value)">
                    <option value=""></option>
                    @foreach($bigProxyList as $bigProxy)
                        @if($bigProxy->id == $bigproxyid)
                            <option value="{{$bigProxy->id}}" selected>{{$bigProxy->name}}</option>
                        @else
                            <option value="{{$bigProxy->id}}">{{$bigProxy->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div style="float: left;">
                <label>二级代理:</label>
                <select required="required" id="secondProxyList" name="secondProxyList"
                        onchange="SwitchSecondProxy(this.options[this.options.selectedIndex].value)">
                    @if(!empty($secondProxyList))
                        @foreach($secondProxyList as $secondProxy)
                            @if($secondProxy->id == $secondproxyid)
                                <option value="{{$secondProxy->id}}" selected>{{$secondProxyy->name}}</option>
                            @else
                                <option value="{{$secondProxy->id}}">{{$secondProxy->name}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
            <div style="float: right;margin-left: 10px">
                <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
            </div>
        </div>
        <table class="table table-hover">
            <tr>
                {{--<td>日期</td>--}}
                <td>会员</td>
                <td>投注金额</td>
                <td>中奖金额</td>
                <td>盈利金额</td>
                <td>投注次数</td>
                <td>剩余金额</td>
                <td>在线ip</td>
            </tr>
            <?php
            $sumeach = 0;
            $sumbingo = 0;
            $second = false;
            $big = false;
            $secondstr = ",";
            if (!empty($secondproxyid)) {
                $second = true;
            } elseif (!empty($bigproxyid)) {
                $big = true;
                foreach($secondProxyList as $secondproxy)
                {
                    $secondstr .= $secondproxy->id .",";
                }

            }
            ?>
            @if (count($lu_lotteries_k3s))
                @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                    <?php
                    $thisuser = \App\lu_user::find($lu_lotteries_k3->uid)
                    ?>
                    @if($thisuser->groupId <> 7)
                        @if($second && $thisuser->recId ==$secondproxyid)
                            <?php
                            $sumeach += $lu_lotteries_k3->eachPrice;
                            $sumbingo += $lu_lotteries_k3->bingoPrice;
                            ?>
                            <tr>
                                {{--                                <td>{{ $lu_lotteries_k3->uid }}</td>--}}
                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                <td>{{ $lu_lotteries_k3->profit }}</td>
                                <td>{{ $lu_lotteries_k3->bcount }}</td>
                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->points }}</td>
                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->loginIp }}</td>
                            </tr>
                        @elseif($big && strpos($secondstr,",".$thisuser->recId.","))
                            <?php
                            $sumeach += $lu_lotteries_k3->eachPrice;
                            $sumbingo += $lu_lotteries_k3->bingoPrice;
                            ?>
                            <tr>
                                {{--                                <td>{{ $lu_lotteries_k3->uid }}</td>--}}
                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                <td>{{ $lu_lotteries_k3->profit }}</td>
                                <td>{{ $lu_lotteries_k3->bcount }}</td>
                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->points }}</td>
                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->loginIp }}</td>
                            </tr>
                        @else
                            <?php
                            $sumeach += $lu_lotteries_k3->eachPrice;
                            $sumbingo += $lu_lotteries_k3->bingoPrice;
                            ?>
                            <tr>
                                {{--                                <td>{{ $lu_lotteries_k3->uid }}</td>--}}
                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                <td>{{ $lu_lotteries_k3->profit }}</td>
                                <td>{{ $lu_lotteries_k3->bcount }}</td>
                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->points }}</td>
                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->loginIp }}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            @endif
        </table>
        <div>
            <a>投注总金额：<span style="color: red">{{$sumeach}}</span> 中奖金额：<span
                        style="color: red"> {{$sumbingo}}</span>盈利金额：<span
                        style="color: red"> {{$sumeach -$sumbingo}}</span></a>
        </div>
        {{--{{$lu_lotteries_k3->appends($input)->links()}}--}}

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
            url = "proxyList?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val();
            window.location.href = url;
        }

        function SwitchBigProxy(uid) {
            url = "proxyList?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val() + "&bigproxyid=" + uid;
            window.location.href = url;
        }

        function SwitchSecondProxy(suid) {
            url = "proxyList?userName=" + $("#userName").val() + "&starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val() + "&bigproxyid=" + uid + "&secondproxyid=" + suid;
            window.location.href = url;

        }
    </script>
@stop