@extends('Layout.'.env("SITE_TYPE",'').'master')

@section('title')
    支付中心
@stop

@section('content')
    <div class="container" id="lotteryContainer">
        <aside class="col-md-3 mobilhide" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        @include('User.topbar')
        <main class="col-md-9" style="border-right: 1px solid rgb(218, 218, 218)">
            <ul class="nav nav-tabs" role="tablist" id="myTab"> 
                <li class="active col-md-4" style="text-align: center"><a href="#DSF" role="tab"
                                                                          data-toggle="tab">在线充值</a></li>
                {{--<li class="col-md-4" style="text-align: center;"><a href="#Company" role="tab"--}}
                                                                    {{--data-toggle="tab">公司充值</a></li>--}}
            </ul>
            <div class="tab-content"> 
                {{--第三方支付--}}
                <div class="tab-pane active" id="DSF"> 
                    @include('errors.list')
                    {{--{!! Form::open(['url' => '/recharge', 'class' => 'form-horizontal', 'role' => 'form']) !!}--}}
                    @if($level['typeName'] =='zf')
                        <form method="POST" action="{{$level['returnurl']}}/recharge" accept-charset="UTF-8"
                              class="form-horizontal" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="nk3_center_zfuser"><b style="color: #FF0000;">{{Auth::user()->name}}</b>
                                您好，请输入充值金额
                            </div>
                            <div class="fl" style="height: 60px; float:none;">
                                <label class="col-md-offset-2" style="width: auto">充值金额：</label>
                                <input type="number"
                                       id="amounts"
                                       name="amounts"
                                       value="100" size="5"
                                       min="10" class="money"
                                       onchange="pay.moneyFormat(this);"><span
                                        style="display: inline-block;line-height: 45px; padding-left:5px;"> 元 (<span
                                            id="recharge-tips"><span
                                                style="color:#FF0000">0</span>元手续费</span>)</span>

                                <div class="radios-ct"
                                     style="display:none;*margin-top:-45px;width: 450px;float:right; white-space: nowrap; font-weight: bolder;">
                                </div>
                                <input name="uid" value="{{Auth::user()->id}}" type="hidden">
                                <input name="name" value="{{Auth::user()->name}}" type="hidden">
                            </div>
                            <input name="levelpaytype" value="{{$level['typeName']}}" type="hidden">
                            <input name="levelkey" value="{{$levelkey}}" type="hidden">

                            <div class="form-group" style="margin-top: 50px">
                                <input type="submit" class="btn-lg btn-danger col-lg-offset-3" value="充值">
                            </div>
                            <div style="display: none">
                                <div><a>---以下开始是测试数据</a></div>
                                <div class="form-group">
                                    <label for="service_type" class="control-label col-md-4">业务类型: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="service_type" type="text"
                                               id="service_type"
                                               value="direct_pay">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sign_type" class="control-label col-md-4">签名方式: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="sign_type" type="text" id="sign_type"
                                               value="MD5">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notify_url" class="control-label col-md-4">充值接收地址: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="notify_url" type="text"
                                               id="notify_url"
                                               value="{{$level['returnurl']}}/zfNotify_Url">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input_charset" class="control-label col-md-4">编码字集: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="input_charset" type="text"
                                               id="input_charsete"
                                               value="UTF-8">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="interface_version" class="control-label col-md-4">接口版本: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="interface_version" type="text"
                                               id="interface_version"
                                               value="V3.0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="order_no" class="control-label col-md-4">订单号（唯一: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="order_no" type="text" id="order_no"
                                               value="{{date("YmdHis")}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="order_time" class="control-label col-md-4">订单时间: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="order_time" type="text"
                                               id="order_time"
                                               value="{{date('Y-m-d H:i:s',time())}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_name" class="control-label col-md-4">商品名称: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="product_name" type="text"
                                               id="product_name"
                                               value="饮水机">

                                    </div>
                                </div>
                            </div>
                        </form>
                        {{--{!! Form::close() !!}--}}
                    @elseif($level['typeName']=='bf')
                        <?php
                        $TradeDate = date("Ymdhis");
                        $TransID = date("Ymdhis");
                        ?>
                        <form method="POST" action="{{$level['returnurl']}}/recharge" accept-charset="UTF-8"
                              class="form-horizontal" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="nk3_center_zfuser"><b style="color: #FF0000;">{{Auth::user()->name}}</b>
                                您好，请输入充值金额
                            </div>
                            <div class="fl" style="height: 60px; float:none;">
                                <label class="col-md-offset-2" style="width: auto">充值金额：</label>
                                <input type="number"
                                       id="OrderMoney"
                                       name="OrderMoney"
                                       value="100" size="5"
                                       min="10" class="money"
                                       onchange="pay.moneyFormat(this);"><span
                                        style="display: inline-block;line-height: 45px; padding-left:5px;"> 元 (<span
                                            id="recharge-tips"><span
                                                style="color:#FF0000">0</span>元手续费</span>)</span>

                                <div class="radios-ct"
                                     style="display:none;*margin-top:-45px;width: 450px;float:right; white-space: nowrap; font-weight: bolder;">
                                </div>
                                <input name="uid" value="{{Auth::user()->id}}" type="hidden">
                                {{--第三方要的用户名--}}
                                <input name="Username" value="{{Auth::user()->name}}" type="hidden">
                                <input name="levelpaytype" value="{{$level['typeName']}}" type="hidden">
                                <input name="levelkey" value="{{$levelkey}}" type="hidden">
                            </div>
                            <div class="form-group">
                                <label for="PayID" class="control-label col-md-4">选择支付方式: </label>

                                <div class="col-md-4">
                                    <select name="PayID" id="PayID" required="required">
                                        <!--充值方式，神州行101 联通102 电信103 盛大111 完美112 征途114 骏网一卡通115 网易 116-->
                                        <option value=""></option>
                                        {{--<option value="101">神州行</option>--}}
                                        {{--<option value="1022">联通卡</option>--}}
                                        {{--<option value="1033">电信卡</option>--}}
                                        {{--<option value="111">盛大卡</option>--}}
                                        {{--<option value="112">完美卡</option>--}}
                                        {{--<option value="114">征途卡</option>--}}
                                        {{--<option value="115">骏网一卡通</option>--}}
                                        {{--<option value="116">网易卡</option>--}}


                                        <option value="3001">招商银行(借)</option>
                                        <option value="3002">工商银行(借)</option>
                                        <option value="3003">建设银行(借)</option>
                                        {{--<option value="3004">浦发银行(借)</option>--}}
                                        <option value="3005">农业银行(借)</option>
                                        <option value="3006">民生银行(借)</option>
                                        <option value="3009">兴业银行(借)</option>
                                        <option value="3020">交通银行(借)</option>
                                        <option value="3022">光大银行(借)</option>
                                        <option value="3026">中国银行(借)</option>
                                        <option value="3032">北京银行(借)</option>
                                        <option value="3035">平安银行(借)</option>
                                        <option value="3036">广发银行(借)</option>
                                        <option value="3039">中信银行(借)</option>

                                        {{--<option value="4001">招商银行(贷)</option>--}}
                                        {{--<option value="4002">工商银行(贷)</option>--}}
                                        {{--<option value="4003">建设银行(贷)</option>--}}
                                        {{--<option value="4004">浦发银行(贷)</option>--}}
                                        {{--<option value="4005">农业银行(贷)</option>--}}
                                        {{--<option value="4006">民生银行(贷)</option>--}}
                                        {{--<option value="4009">兴业银行(贷)</option>--}}
                                        {{--<option value="4020">交通银行(贷)</option>--}}
                                        {{--<option value="4022">光大银行(贷)</option>--}}
                                        {{--<option value="4026">中国银行(贷)</option>--}}
                                        {{--<option value="4032">北京银行(贷)</option>--}}
                                        {{--<option value="4035">平安银行(贷)</option>--}}
                                        {{--<option value="4036">广发银行(贷)</option>--}}
                                        {{--<option value="4039">中信银行(贷)</option>--}}
                                    </select></div>
                            </div>
                            <div class="form-group" style="margin-top: 50px">
                                <input type="submit" class="btn-lg btn-danger col-lg-offset-3" value="充值">
                            </div>
                            <table style="display: none">
                                {{--<tr>--}}
                                    {{--<td>选择支付方式:</td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td>商户号:</td>
                                    <td><input name="MemberID" value="{{$level['id']}}"/></td>
                                </tr>
                                <tr>
                                    <td>交易流水号:</td>
                                    <td><input type="text" name="TransID" value="<?php echo $TransID;?>"/></td>
                                </tr>
                                <tr>
                                    <td>交易时间:</td>
                                    <td><input type="text" name="TradeDate" value="<?php echo $TradeDate;?>"/></td>
                                    <!--获取当前交易时间-->
                                </tr>
                                {{--<tr>--}}
                                    {{--<td>订单金额:</td>--}}
                                    {{--<td><input name="OrderMoney" value="0.01"/><span>建议1分钱支付</span></td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td>商品名称:</td>
                                    <td><input type="text" name="ProductName"/>测温仪</td>
                                </tr>
                                <tr>
                                    <td>商品数量:</td>
                                    <td><input type="text" name="Amount" value="1"/></td>
                                </tr>
                                <tr>
                                    {{--<td>支付用户名:</td>--}}
                                    {{--<td><input type="text" name="Username"/></td>--}}
                                </tr>
                                <tr>
                                    <td>订单附加消息:</td>
                                    <td><input type="text" name="AdditionalInfo"/></td>
                                </tr>
                                <tr>
                                    <td>页面跳转地址:</td>
                                    <td><input type="text" name="PageUrl"
                                               value="{{$level['returnurl']}}/bfNotify_Url"/>
                                        <font color="red"><b>此地址注意更换成你们可用的通知地址</b></font>
                                    </td>
                                    <!--页面跳转连接的商户页面地址-->
                                </tr>
                                <tr>
                                    <td>底层访问地址:</td>
                                    <td><input type="text" name="ReturnUrl"
                                               value="{{$level['returnurl']}}/bfReturn_Url"/>
                                        <font color="red"><b>此地址注意更换成你们可用的通知地址</b></font>
                                    </td>
                                    <!--通知服务器底层地址-->
                                </tr>
                                <tr>
                                    <td>通知方式:</td>
                                    <td><input type="text" name="NoticeType" value="1"/></td>
                                    <!--Notice=1时支付结束会从页面跳转到PageUrl-->
                                </tr>
                                <tr>
                                    {{--<td colspan="2" align="center"><input type="submit" id="btnpost" value="提交"/></td>--}}
                                </tr>

                            </table>
                        </form>
                    @endif
                </div>
                {{--公司充值--}}
            </div>
        </main>
        @include('User.mobilebottom')
    </div>
@stop
@section('script')
    <script type="text/javascript">

        $(document).ready(function () {
            @if(isset($url))
            window.location.href ={{$url}};
            @endif
        });
        function changetobank(value) {
            var index = value.selectedIndex; // 选中索引

            var text = value.options[index].text; // 选中文本
            $("#payBank").val(text);
//        var value = value.options[index].value; // 选中值
        }

        function jumptonext() {
            if ($("input[name='bank_id']:checked").val() != undefined) {

                var herfa = $("input[name='bank_id']:checked").parent().next().find('a');
                $("#bankurl").val($("input[name='bank_id']:checked").parent().next().find('a').attr('href'));
                $("#bankId").val($("input[name='bank_id']:checked").val());
                $("#bankinsert").append(herfa);
                $("#bankselect").hide();
                $("#bankbtn").hide();
                $("#banksubmit").show();

            } else {
                alert('请选中一家银行');
            }
        }
    </script>
@stop
