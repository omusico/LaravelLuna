@extends('master')

@section('title')
    支付中心
@stop

@section('content')
    <div class="container" id="lotteryContainer">
        <aside class="col-md-3" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9" style="border-right: 1px solid rgb(218, 218, 218)">
            <ul class="nav nav-tabs" role="tablist" id="myTab"> 
                <li class="active col-md-4" style="text-align: center"><a href="#DSF" role="tab"
                                                                          data-toggle="tab">在线充值</a></li>
                <li class="col-md-4" style="text-align: center;"><a href="#Company" role="tab"
                                                                    data-toggle="tab">公司充值</a></li>
            </ul>
            <div class="tab-content"> 
                {{--第三方支付--}}
                <div class="tab-pane active" id="DSF"> 
                    @include('errors.list')
                    {!! Form::open(['url' => '/recharge', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="nk3_center_zfuser"><b style="color: #FF0000;">{{Auth::user()->name}}</b>
                        您好，请选择支付方式，输入充值金额
                    </div>
                    <div class="fl" style="height: 60px; float:none;">
                        <label class="col-md-offset-2" style="width: auto">充值金额：</label><input type="number"
                                                                                               id="amounts"
                                                                                               name="amounts"
                                                                                               value="100" size="5"
                                                                                               min="1" class="money"
                                                                                               onchange="pay.moneyFormat(this);"><span
                                style="display: inline-block;line-height: 45px; padding-left:5px;"> 元 (<span
                                    id="recharge-tips"><span style="color:#FF0000">0</span>元手续费</span>)</span>

                        <div class="radios-ct"
                             style="display:none;*margin-top:-45px;width: 450px;float:right; white-space: nowrap; font-weight: bolder;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline col-md-2 col-md-offset-2">
                            <input checked type="radio" value="zf" name="paytype"><img src="/css/zf.png" alt="智付">
                        </label>
                        <label class="radio-inline col-md-2">
                            <input disabled type="radio" value="kjt" name="paytype"><img src="/css/kjt.png" alt="快捷通">
                        </label>
                    </div>
                    <div class="form-group" style="margin-top: 50px">
                        <input type="submit" class="btn-lg btn-danger col-lg-offset-3" value="充值">
                    </div>
                    <div style="display: none">
                        <div><a>---以下开始是测试数据</a></div>
                        <div class="form-group">
                            <label for="merchant_code" class="control-label col-md-4 ">商家号: </label>

                            <div class="col-md-4">
                                <input class="form-control" name="merchant_code" type="text" id="merchant_code"
                                       value="2000632709">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="service_type" class="control-label col-md-4">业务类型: </label>

                            <div class="col-md-4">
                                <input class="form-control" name="service_type" type="text" id="service_type"
                                       value="direct_pay">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sign_type" class="control-label col-md-4">签名方式: </label>

                            <div class="col-md-4">
                                <input class="form-control" name="sign_type" type="text" id="sign_type" value="MD5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notify_url" class="control-label col-md-4">充值接收地址: </label>

                            <div class="col-md-4">
                                <input class="form-control" name="notify_url" type="text" id="notify_url"
                                       value="http://k3.gwou.cn/zfNotify_Url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input_charset" class="control-label col-md-4">编码字集: </label>

                            <div class="col-md-4">
                                <input class="form-control" name="input_charset" type="text" id="input_charsete"
                                       value="UTF-8">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="interface_version" class="control-label col-md-4">接口版本: </label>

                            <div class="col-md-4">
                                <input class="form-control" name="interface_version" type="text" id="interface_version"
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
                                <input class="form-control" name="order_time" type="text" id="order_time"
                                       value="{{date('Y-m-d H:i:s',time())}}">
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                        {{--<label for="order_amount" class="control-label col-md-4">订单金额: </label>--}}

                        {{--<div class="col-md-4">--}}
                        {{--<input class="form-control" name="order_amount" type="text" id="order_amountn" value="0.1">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="product_name" class="control-label col-md-4">商品名称: </label>

                            <div class="col-md-4">
                                <input class="form-control" name="product_name" type="text" id="product_name"
                                       value="饮水机">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{--公司充值--}}
                <div class="tab-pane" id="Company">
                    @include('errors.list')
                    {!! Form::open(['url' => '/company', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="form-group">
                        <label for="sn" class="control-label col-md-4">订单号: </label>
                        <div class="col-md-4">
                            <input class="form-control" name="sn" type="text" id="sn"
                                   value="{{date("YmdHis")}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amounts" class="control-label col-md-4">充值金额: </label>

                        <div class="col-md-4">
                            <input class="form-control money" name="amounts" type="number" id="amounts" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bankId" class="control-label col-md-4">银行: </label>

                        <div class="col-md-4">
                            <select class="form-control" name="bankId" id="bankId" required
                                    onchange="changetobank(this)">
                                <option value=""></option>
                                <option value="1">北京银行</option>
                                <option value="2">中国建设银行</option>
                                <option value="3">招商银行</option>
                                <option value="4">中国工商银行</option>
                                <option value="5">平安银行</option>
                                <option value="6">杭州银行</option>
                                <option value="7">温州银行</option>
                                <option value="8">上海农商银行</option>
                                <option value="9">交通银行</option>
                                <option value="10">中国农业银行</option>
                                <option value="11">中国银行</option>
                                <option value="12">中国民生银行</option>
                                <option value="13">华夏银行</option>
                                <option value="14">浦发银行</option>
                                <option value="15">广州银行</option>
                                <option value="16">BEA东亚银行</option>
                                <option value="17">广州农商银行</option>
                                <option value="18">顺德农商银行</option>
                                <option value="19">中国光大银行</option>
                                <option value="20">中信银行</option>
                                <option value="21">中国邮政</option>
                                <option value="22">渤海银行</option>
                                <option value="23">浙商银行</option>
                                <option value="24">晋商银行</option>
                                <option value="25">汉口银行</option>
                                <option value="26">浙江稠州商业银行</option>
                                <option value="27">上海银行</option>
                                <option value="28">兴业银行</option>
                                <option value="29">广发银行</option>
                                <option value="30">深圳发展银行</option>
                                <option value="31">东莞银行</option>
                                <option value="32">宁波银行</option>
                                <option value="33">南京银行</option>
                                <option value="34">北京农商银行</option>
                            </select>
                            <input name="payBank" id="payBank"  type="hidden">
                            <input name="siteId" value="1" type="hidden">
                            <input name="siteBankId" id="siteBankId" value="1" type="hidden">
                            {{--<input name="status" value="2" type="hidden">--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rechargerUser" class="control-label col-md-4">存款人姓名:</label>

                        <div class="col-md-4">
                            <input class="form-control" name="rechargerUser" type="text" id="rechargerUser">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payArea" class="control-label col-md-4">开户行网点: </label>

                        <div class="col-md-4">
                            <input class="form-control" name="payArea" type="text" id="payArea">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payAreaCity" class="control-label col-md-4">开户行城市: </label>

                        <div class="col-md-4">
                            <input class="form-control" name="payAreaCity" type="text" id="payAreaCity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payType" class="control-label col-md-4">支付方式: </label>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input checked type="radio" value="1" name="payType">网银转帐
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="2" name="payType">ATM自动柜员机
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="3" name="payType">ATM现金入款
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="4" name="payType">银行柜台
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="5" name="payType">手机银行转帐
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            {!! Form::submit('提交,申请', ['class' => 'btn btn-success form-control']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
    </div>
    </main>
    </div>
@stop
@section('script')
<script type="text/javascript">

    $(document).ready(function(){

    });
    function changetobank(value) {
        var index = value.selectedIndex; // 选中索引

        var text = value.options[index].text; // 选中文本
        $("#payBank").val(text);
//        var value = value.options[index].value; // 选中值
    }
</script>
@stop
