@extends('master')

@section('title')
    支付中心
@stop

@section('content')
    <div class="container" id="lotteryContainer">
        <aside class="col-md-3">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9" style="border-right: 1px solid rgb(218, 218, 218)">
            <ul class="nav nav-tabs" role="tablist" id="myTab"> 
                <li class="active col-md-4" style="text-align: center"><a href="#TSF" role="tab"
                                                                          data-toggle="tab">第三方</a></li>
                <li class="col-md-4" style="text-align: center;"><a href="#BankCard" role="tab"
                                                                    data-toggle="tab">银行充值</a></li>
            </ul>
            <div class="tab-content"> 
                <div class="tab-pane active" id="TSF"> 
                    @include('errors.list')
                    {!! Form::open(['url' => '/recharge', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="nk3_center_zfuser"><b style="color: #FF0000;">{{Auth::user()->name}}</b>
                        您好，请选择支付方式，输入充值金额
                    </div>
                    <div class="fl" style="height: 60px; float:none;">
                        <label style="width: auto">充值金额：</label><input type="number" id="amounts" name="amounts"
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
                        <label class="radio-inline col-md-2">
                            <input checked type="radio" value="zf" name="paytype"><img src="/css/zf.png" alt="智付">
                        </label>
                        <label class="radio-inline col-md-2">
                            <input disabled type="radio" value="kjt" name="paytype"><img src="/css/kjt.png" alt="快捷通">
                        </label>
                    </div>
                    <div class="form-group" style="margin-top: 50px">
                        <input type="submit" class="btn-lg btn-danger col-lg-offset-2" value="充值">
                    </div>
                    <div><a>---以下开始是测试数据</a></div>
                    <div class="form-group">
                        <label for="merchant_code" class="control-label col-md-4">商家号: </label>

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
                        <label for="product_name" class="control-label col-md-4">接口版本: </label>

                        <div class="col-md-4">
                            <input class="form-control" name="product_name" type="text" id="product_name" value="饮水机">
                        </div>
                    </div>
                    {!! Form::close() !!}
                    </form>
                </div>
                <div class="tab-pane" id="BankCard">
                </div>
            </div>
        </main>
    </div>
@stop