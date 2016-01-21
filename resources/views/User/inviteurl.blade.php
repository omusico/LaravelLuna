@extends('Layout.'.env("SITE_TYPE",'').'master')

@section('title')
    代理推广链接
@stop

@section('content')
    <div class="container">
        @include('errors.list')

        <div class="form-group col-md-10 col-md-offset-1" style="text-align: center">
            <a class="btn btn-default btn-info" href="/dailiregister">代理注册</a>
            <a class="btn btn-default btn-warning" href="/login">代理登陆</a>
        </div>
        @if(!$isdaili)
            @if(env("SITE_TYPE","")=="")
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                        <img src="/css/k3proxy2.jpg" alt="优惠活动" width="100%" height="100%"></div>
                </div>
            @elseif(env("SITE_TYPE","")=="five")

                <div class="row">
                    <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                        <img src="/css/fiveproxy.jpg" alt="优惠活动" width="100%" height="100%"></div>
                </div>
            @elseif(env("SITE_TYPE","")=="gaopin")
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                        <img src="/css/gaopinproxy.jpg" alt="优惠活动" width="100%" height="100%"></div>
                </div>
                {{--@else--}}
                {{--<textarea class="form-control" name="proxycert" rows="25" readonly--}}
                {{--style="display: {{$display}}">{{Cache::get('proxycert')}}</textarea>--}}

            @endif
        @endif
        @if(isset($isdaili))
            @if($isdaili)
                <div class="form-group">
                    <label for="sign_type" class="control-label col-md-3">推广地址: </label>

                    <div class="col-md-6">
                        <input class="form-control" id="inviteurl" style="color: red"
                               value="{{$_SERVER['HTTP_HOST'].'/register?invite='.Auth::user()->invite}}">
                    </div>
                </div>
            @endif
            <br/>
            <br/>
            <br/>

            @if($isdaili)
                <div>
                    @include('errors.list')

                    <h3 align="center">
                        代理列表(日期没选，默认获取当天金额</h3>

                    <div>
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
                        @if(Auth::user()->groupId ==5)
                            <div style="float: left;">
                                <label>二级代理:</label>
                                <select required="required" id="secondProxyList" name="secondProxyList"
                                        onchange="SwitchSecondProxy(this.options[this.options.selectedIndex].value)">
                                    <option value=""></option>
                                    @if(!empty($secondProxyList))
                                        @foreach($secondProxyList as $secondProxy)
                                            @if($secondProxy->id == $secondproxyid)
                                                <option value="{{$secondProxy->id}}"
                                                        selected>{{$secondProxy->name}}</option>
                                            @else
                                                <option value="{{$secondProxy->id}}">{{$secondProxy->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        @endif
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
                            <td>操作</td>
                        </tr>
                        <?php
                        $sumeach = 0;
                        $sumbingo = 0;
                        $secondstr = ",";
                        if (Auth::user()->groupId == 5) {
                            foreach ($secondProxyList as $secondproxy) {
                                $secondstr .= $secondproxy->id . ",";
                            }

                        }
                        ?>
                        @if (count($lu_lotteries_k3s))
                            @foreach ($lu_lotteries_k3s as $lu_lotteries_k3)
                                <?php
                                $thisuser = \App\lu_user::find($lu_lotteries_k3->uid)
                                ?>
                                @if($thisuser->groupId <> 7)
                                    @if(Auth::user()->groupId ==3)
                                        @if($thisuser->recId == Auth::user()->id)
                                            <?php
                                            $sumeach += $lu_lotteries_k3->eachPrice;
                                            $sumbingo += $lu_lotteries_k3->bingoPrice;
                                            ?>
                                            <tr>
                                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                                <td>{{ $lu_lotteries_k3->profit }}</td>
                                                <td>{{ $lu_lotteries_k3->bcount }}</td>
                                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->points }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info"
                                                       href="/proxydetail/{{$lu_lotteries_k3->uid}}">投注情况</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @elseif(Auth::user()->groupId ==5)
                                        @if(strpos($secondstr,",".$thisuser->recId.",")>0)
                                            <?php
                                            $sumeach += $lu_lotteries_k3->eachPrice;
                                            $sumbingo += $lu_lotteries_k3->bingoPrice;
                                            ?>
                                            <tr>
                                                <td>{{ $lu_lotteries_k3->userName }}</td>
                                                <td>{{ $lu_lotteries_k3->eachPrice }}</td>
                                                <td>{{ $lu_lotteries_k3->bingoPrice }}</td>
                                                <td>{{ $lu_lotteries_k3->profit }}</td>
                                                <td>{{ $lu_lotteries_k3->bcount }}</td>
                                                <td>{{ \App\lu_user_data::where('uid',$lu_lotteries_k3->uid)->first()->points }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info"
                                                       href="/proxydetail/{{$lu_lotteries_k3->uid}}">投注情况</a>
                                                </td>
                                            </tr>
                                        @endif
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
                </div>
            @else
                <a>当前用户不是代理或者还未登陆</a>
            @endif
        @endif
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
            url = "inviteurl?starttime=" + $("#starttime").val() + "&endtime=" + $("#endtime").val() + "&userName=" + $("#userName").val();
            window.location.href = url;
        }

    </script>
    <script type="text/javascript">
        $("#inviteurl").mouseover(function () {
            $(this).select();
        })
    </script>
@stop