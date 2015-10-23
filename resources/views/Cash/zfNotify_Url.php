<? header("content-Type: text/html; charset=UTF-8"); ?>
<?php

//////////////////////////		接收智付返回通知数据  /////////////////////////////////
////////////////////////// To receive notification data from Dinpay ////////////////////


$merchant_code = $_POST["merchant_code"];
$interface_version = $_POST["interface_version"];
$sign_type = $_POST["sign_type"];
$dinpaySign = $_POST["sign"];
$notify_type = $_POST["notify_type"];
$notify_id = $_POST["notify_id"];
$order_no = $_POST["order_no"];
$order_time = $_POST["order_time"];
$order_amount = $_POST["order_amount"];
$trade_status = $_POST["trade_status"];
$trade_time = $_POST["trade_time"];
$trade_no = $_POST["trade_no"];
if (isset($_POST["bank_seq_no"])) {
    $bank_seq_no = $_POST["bank_seq_no"];
} else {
    $bank_seq_no = "";
}
if (isset($_POST["extra_return_param"])) {
    $extra_return_param = $_POST["extra_return_param"];
} else {
    $extra_return_param = "";
}


/////////////////////////////   数据签名  /////////////////////////////////
////////////////////////////  Data signature  ////////////////////////////

/**
 * 签名规则定义如下：
 * （1）参数列表中，除去sign_type、sign两个参数外，其它所有非空的参数都要参与签名，值为空的参数不用参与签名；
 * （2）签名顺序按照参数名a到z的顺序排序，若遇到相同首字母，则看第二个字母，以此类推，同时将商家支付密钥key放在最后参与签名，组成规则如下：
 * 参数名1=参数值1&参数名2=参数值2&……&参数名n=参数值n&key=key值
 */

/**
 * The definition of signature rule is as follows :
 * （1） In the list of parameters, except the two parameters of sign_type and sign, all the other parameters that are not in blank shall be signed, the parameter with value as blank doesn’t need to be signed;
 * （2） The sequence of signature shall be in the sequence of parameter name from a to z, in case of same first letter, then in accordance with the second letter, so on so forth, meanwhile, the merchant payment key shall be put at last for signature, and the composition rule is as follows :
 * Parameter name 1 = parameter value 1& parameter name 2 = parameter value 2& ......& parameter name N = parameter value N & key = key value
 */


$signStr = "";

if ($bank_seq_no != "") {
    $signStr = $signStr . "bank_seq_no=" . $bank_seq_no . "&";
}
if ($extra_return_param != "") {
    $signStr = $signStr . "extra_return_param=" . $extra_return_param . "&";
}

$signStr = $signStr . "interface_version=" . $interface_version . "&";
$signStr = $signStr . "merchant_code=" . $merchant_code . "&";
$signStr = $signStr . "notify_id=" . $notify_id . "&";
$signStr = $signStr . "notify_type=" . $notify_type . "&";
$signStr = $signStr . "order_amount=" . $order_amount . "&";
$signStr = $signStr . "order_no=" . $order_no . "&";
$signStr = $signStr . "order_time=" . $order_time . "&";
$signStr = $signStr . "trade_no=" . $trade_no . "&";
$signStr = $signStr . "trade_status=" . $trade_status . "&";

if ($trade_time != "") {
    $signStr = $signStr . "trade_time=" . $trade_time . "&";
}

//注：以下的key值必须与商家后台设置的支付密钥保持一致
//Note：The key value must be consistent with which you had set on Dinpay's Merchant System.

$key = "zxcvbnm890123_890123zxcvbnm";

$signStr = $signStr . "key=" . $key;
$sign = md5($signStr);

////////////////////////////////////异步通知必须响应“SUCCESS”///////////////////////////////
/**
 * When the notification method is service asynchronous notification, after receiving backstage notification and complete processing, the merchant system must printout the following seven characters "SUCCESS "which can't be change,including the space between the characters, otherwise, the Dinpay payment system will, during the subsequent period, send such notification for 5 times with increasing time interval.
 */


if ($dinpaySign == $sign) {        //验签成功（Signature correct）
    $lrecharge = \App\lu_lottery_recharge::where('sn', $order_no)->first();
    if ($lrecharge->status == '2') {
        $ldata = \App\lu_user_data::where('uid', $lrecharge->uid)->first();
        $tmp = $ldata->points;
        $points = $ldata->points;
//            $odd = $user['returnOdds'];
//            $newOdd = $amount * $odd;
        $points = $points + $order_amount;
        $ldata->points = $points;
        $ldata->save();
        //状态修改为已经付款
        $lrecharge->status = 1;
        $lrecharge->save();
        $data = array(
            'uid' => $lrecharge->uid,
            'userName' => $lrecharge->userName,
            'addType' => '3', // 在线充值
            'lotteryType' => '', // 中奖
            'winSn' => $order_no,
            'oldPoint' => $tmp,
            'changePoint' => $order_amount,
            'newPoint' => $points,
            'created' => strtotime(date('Y-m-d H:i:s'))
        );
        \App\lu_points_record::create($data);
    }
    echo "SUCCESS";
    /**
     * 1.响应 SUCCESS
     * 1.response to SUCCESS
     *
     * 2.判断商家号、商家订单号、订单金额、交易状态
     * 2.To check parameter value including merchant_code、order_no、order_amount and trade_status
     *
     * 3.校验是否重复通知
     * 3.To check whether it's repeated notice.
     */

} else {

    echo "Signature Error";  //验签失败，业务结束（End of the business）
}
?>