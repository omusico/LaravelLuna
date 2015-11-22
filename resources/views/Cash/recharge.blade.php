@extends('Layout.'.env("SITE_TYPE",'').'master')

@section('title')
    支付中心
@stop

@section('content')
    <div class="container" id="lotteryContainer">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="background-color: white">
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
                            {{--{!! Form::open(['url' => '/recharge', 'class' => 'form-horizontal', 'role' => 'form']) !!}--}}
                            <form method="POST" action="http://k3.gwou.cn/recharge" accept-charset="UTF-8"
                                  class="form-horizontal" role="form"><input name="_token" type="hidden"
                                                                             value="qPzqUC6WIO09PmQr5hH4EZSVmzJpipguGMLbSlse">

                                <div class="nk3_center_zfuser"><b style="color: #FF0000;">{{Auth::user()->name}}</b>
                                    您好，请选择支付方式，输入充值金额
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
                                <div class="form-group">
                                    <label class="radio-inline col-md-2 col-md-offset-2">
                                        <input checked type="radio" value="zf" name="paytype"><img src="/css/zf.png"
                                                                                                   alt="智付">
                                    </label>
                                    <label class="radio-inline col-md-2">
                                        <input disabled type="radio" value="kjt" name="paytype"><img src="/css/kjt.png"
                                                                                                     alt="快捷通">
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
                                            <input class="form-control" name="merchant_code" type="text"
                                                   id="merchant_code"
                                                   value="2000632709">
                                        </div>
                                    </div>
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
                                            <input class="form-control" name="notify_url" type="text" id="notify_url"
                                                   value="http://k3.gwou.cn/zfNotify_Url">
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
                                            <input class="form-control" name="product_name" type="text"
                                                   id="product_name"
                                                   value="饮水机">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{--{!! Form::close() !!}--}}
                        </div>
                        {{--公司充值--}}
                        <div class="tab-pane" id="Company">
                            @include('errors.list')
                            <table width="100%" border="0" id="bankselect">
                                <tbody>
                                <tr style="vertical-align:middle;">
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="1" style="vertical-align:top;">
                                    </td>
                                    <td id="b1" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.abchina.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ABOC.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="2" style="vertical-align:top;">
                                    </td>
                                    <td id="b2" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.bankofbeijing.com.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BOBJ.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="3" style="vertical-align:top;">
                                    </td>
                                    <td id="b3" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.bankcomm.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BOCOM.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="4" style="vertical-align:top;">
                                    </td>
                                    <td id="b4" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.bankofshanghai.com" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BOS.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="5" style="vertical-align:top;">
                                    </td>
                                    <td id="b5" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.boc.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="6" style="vertical-align:top;">
                                    </td>
                                    <td id="b6" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.ccb.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CCB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="7" style="vertical-align:top;">
                                    </td>
                                    <td id="b7" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.cebbank.com" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CEB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="8" style="vertical-align:top;">
                                    </td>
                                    <td id="b8" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.cib.com.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CIB.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="9" style="vertical-align:top;">
                                    </td>
                                    <td id="b9" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.cmbc.com.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CMBC.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="10" style="vertical-align:top;">
                                    </td>
                                    <td id="b10" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.cmbchina.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CMBCHINA.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="11" style="vertical-align:top;">
                                    </td>
                                    <td id="b11" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://bank.ecitic.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ECITIC.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="12" style="vertical-align:top;">
                                    </td>
                                    <td id="b12" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.gdb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/GDB.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="13" style="vertical-align:top;">
                                    </td>
                                    <td id="b13" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.hxb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HXB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="14" style="vertical-align:top;">
                                    </td>
                                    <td id="b14" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.icbc.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ICBC.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="15" style="vertical-align:top;">
                                    </td>
                                    <td id="b15" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.chinapost.com.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/PSBC.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="16" style="vertical-align:top;">
                                    </td>
                                    <td id="b16" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.sdb.com.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SDB.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="17" style="vertical-align:top;">
                                    </td>
                                    <td id="b17" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://ebank.spdb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SPDB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="18" style="vertical-align:top;">
                                    </td>
                                    <td id="b18" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.18ebank.com" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SZPAB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="19" style="vertical-align:top;">
                                    </td>
                                    <td id="b19" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.cbhb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BHB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="20" style="vertical-align:top;">
                                    </td>
                                    <td id="b20" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.dongguanbank.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/DGB.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="21" style="vertical-align:top;">
                                    </td>
                                    <td id="b21" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.gzcb.com.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/GZCB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="22" style="vertical-align:top;">
                                    </td>
                                    <td id="b22" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.hccb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HZB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="23" style="vertical-align:top;">
                                    </td>
                                    <td id="b23" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.czbank.com/czbank/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CZB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="24" style="vertical-align:top;">
                                    </td>
                                    <td id="b24" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.nbcb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/NBCB.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="25" style="vertical-align:top;">
                                    </td>
                                    <td id="b25" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.hkbea.com/hk/index_tc.htm" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HKBEA.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="26" style="vertical-align:top;">
                                    </td>
                                    <td id="b26" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.wzcb.com.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/WZCB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="27" style="vertical-align:top;">
                                    </td>
                                    <td id="b27" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.jshbank.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SXJS.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="28" style="vertical-align:top;">
                                    </td>
                                    <td id="b28" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.njcb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/NJCB.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="29" style="vertical-align:top;">
                                    </td>
                                    <td id="b29" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.961111.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/GNXS.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="30" style="vertical-align:top;">
                                    </td>
                                    <td id="b30" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.shrcb.com" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SHRCB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="31" style="vertical-align:top;">
                                    </td>
                                    <td id="b31" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.hkbchina.com" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/HKBCHINA.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="32" style="vertical-align:top;">
                                    </td>
                                    <td id="b32" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.zhnx.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/ZHNX.jpg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="33" style="vertical-align:top;">
                                    </td>
                                    <td id="b33" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.sdebank.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/SDE.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="34" style="vertical-align:top;">
                                    </td>
                                    <td id="b34" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.ydxh.cn" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/YDXH.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="35" style="vertical-align:top;">
                                    </td>
                                    <td id="b35" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.czcb.com.cn/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/CZCB.jpg"></a>
                                    </td>
                                    <td style="vertical-align:middle;" height="40" width="5" align="center">
                                        <input name="bank_id" type="radio" value="36" style="vertical-align:top;">
                                    </td>
                                    <td id="b36" width="70" style="vertical-align:top; padding-top:2px">
                                        <a href="http://www.bjrcb.com/" target="_blank"><img
                                                    src="http://k3cp.net/app/Module/Lottery/ui/images/banks/BJRCB.jpg"></a>
                                    </td>
                                </tr>
                                <tr></tr>
                                </tbody>
                            </table>
                            <div id="bankbtn">
                                <a class="btn btn-info" href="#" style="margin-left: 50px"
                                   onclick="jumptonext()">下一步</a>
                            </div>
                            <div id="banksubmit" style="display: none">
                                {!! Form::open(['url' => '/company', 'class' => 'form-horizontal', 'role' => 'form'])
                                !!}
                                @if(isset($bank))
                                    <div class="form-group">
                                        <label for="amounts" class="control-label col-md-4">充值账户: </label>
                                        <label class="radio-inline col-md-4">
                                            <input checked type="radio" value="{{$bank->id}}" name="siteBankId">
                                            <a style="color:red">
                                                银行名称：{{$bank->bankName}}<br/>
                                                银行账号：{{$bank->bankCode}}<br/>
                                                开户人 ：{{$bank->userName}}
                                            </a>
                                        </label>
                                    </div>
                                @endif
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
                                        <input class="form-control money" name="amounts" type="number" id="amounts"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bankId" class="control-label col-md-4">银行: </label>

                                    <div class="col-md-4" id="bankinsert">

                                        <input type="hidden" name="bankId" id="bankId">
                                        <input type="hidden" name="bankurl" id="bankurl">
                                        <input name="payBank" id="payBank" type="hidden">
                                        <input name="siteId" value="1" type="hidden">
                                        {{--<input name="siteBankId" id="siteBankId" value="1" type="hidden">--}}
                                        {{--<input name="status" value="2" type="hidden">--}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="rechargerUser" class="control-label col-md-4">存款人姓名:</label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="rechargerUser" type="text" id="rechargerUser"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="payArea" class="control-label col-md-4">开户行网点: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="payArea" type="text" id="payArea" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="payAreaCity" class="control-label col-md-4">开户行城市: </label>

                                    <div class="col-md-4">
                                        <input class="form-control" name="payAreaCity" type="text" id="payAreaCity"
                                               required>
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
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
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
