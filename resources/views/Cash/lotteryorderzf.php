<? header("content-Type: text/html; charset=UTF-8");?>
<?php

/////////////////////////////////接收表单提交参数//////////////////////////////////////
////////////////////////To receive the parameter form HTML form//////////////////////

$merchant_code = $_POST['merchant_code'];
$service_type = $_POST['service_type'];
$interface_version = $_POST['interface_version'];
$sign_type = $_POST['sign_type'];
$input_charset = $_POST['input_charset'];
$notify_url = $_POST['notify_url'];
$order_no = $_POST['order_no'];
$order_time = $_POST['order_time'];
$order_amount = $_POST['order_amount'];
$product_name = $_POST['product_name'];
$product_code = "";//$_POST['product_code'];
$product_desc = "";//$_POST['product_desc'];
$product_num = "";//$_POST['product_num'];
$show_url = "";//$_POST['show_url'];
$client_ip = "";//$_POST['client_ip'];
$bank_code = "";//$_POST['bank_code'];
$redo_flag = "";//$_POST['redo_flag'];
$extend_param = "";//$_POST['extend_param'];
$extra_return_param = "";//$_POST['extra_return_param'];
$return_url = "";//$_POST['return_url'];

//////////////////////////////////// 字符编码转换 /////////////////////////////////
/////////////////////////////// Character transcoding ////////////////////////////


if($product_name != ""){
    $product_name = mb_convert_encoding($product_name, "UTF-8", "UTF-8");
}
if($product_code != ""){
    $product_code = mb_convert_encoding($product_code, "UTF-8", "UTF-8");
}
if($product_desc != ""){
    $product_desc = mb_convert_encoding($product_desc, "UTF-8", "UTF-8");
}
if($order_no != ""){
    $order_no = mb_convert_encoding($order_no, "UTF-8", "UTF-8");
}
if($extend_param != ""){
    $extend_param = mb_convert_encoding($extend_param, "UTF-8", "UTF-8");
}
if($extra_return_param != ""){
    $extra_return_param = mb_convert_encoding($extra_return_param, "UTF-8", "UTF-8");
}
if($notify_url != ""){
    $notify_url = mb_convert_encoding($notify_url, "UTF-8", "UTF-8");
}
if($return_url != ""){
    $return_url = mb_convert_encoding($return_url, "UTF-8", "UTF-8");
}
if($show_url != ""){
    $show_url = mb_convert_encoding($show_url, "UTF-8", "UTF-8");
}

/////////////////////////////   数据签名  /////////////////////////////////
////////////////////////////  Data signature  ////////////////////////////

/**
签名规则定义如下：
（1）参数列表中，除去sign_type、sign两个参数外，其它所有非空的参数都要参与签名，值为空的参数不用参与签名；
（2）签名顺序按照参数名a到z的顺序排序，若遇到相同首字母，则看第二个字母，以此类推，同时将商家支付密钥key放在最后参与签名，组成规则如下：
参数名1=参数值1&参数名2=参数值2&……&参数名n=参数值n&key=key值
 */

/**
The definition of signature rule is as follows :
（1） In the list of parameters, except the two parameters of sign_type and sign, all the other parameters that are not in blank shall be signed, the parameter with value as blank doesn’t need to be signed;
（2） The sequence of signature shall be in the sequence of parameter name from a to z, in case of same first letter, then in accordance with the second letter, so on so forth, meanwhile, the merchant payment key shall be put at last for signature, and the composition rule is as follows :
Parameter name 1 = parameter value 1& parameter name 2 = parameter value 2& ......& parameter name N = parameter value N & key = key value
 */

$signStr= "";

if($bank_code != ""){
    $signStr = $signStr."bank_code=".$bank_code."&";
}
if($client_ip != ""){
    $signStr = $signStr."client_ip=".$client_ip."&";
}
if($extend_param != ""){
    $signStr = $signStr."extend_param=".$extend_param."&";
}
if($extra_return_param != ""){
    $signStr = $signStr."extra_return_param=".$extra_return_param."&";
}

$signStr = $signStr."input_charset=".$input_charset."&";
$signStr = $signStr."interface_version=".$interface_version."&";
$signStr = $signStr."merchant_code=".$merchant_code."&";
$signStr = $signStr."notify_url=".$notify_url."&";
$signStr = $signStr."order_amount=".$order_amount."&";
$signStr = $signStr."order_no=".$order_no."&";
$signStr = $signStr."order_time=".$order_time."&";

if($product_code != ""){
    $signStr = $signStr."product_code=".$product_code."&";
}
if($product_desc != ""){
    $signStr = $signStr."product_desc=".$product_desc."&";
}

$signStr = $signStr."product_name=".$product_name."&";

if($product_num != ""){
    $signStr = $signStr."product_num=".$product_num."&";
}
if($redo_flag != ""){
    $signStr = $signStr."redo_flag=".$redo_flag."&";
}
if($return_url != ""){
    $signStr = $signStr."return_url=".$return_url."&";
}

$signStr = $signStr."service_type=".$service_type."&";

if($show_url != ""){
    $signStr = $signStr."show_url=".$show_url."&";
}

//注：以下的key值必须与商家后台设置的支付密钥保持一致
//Note：The key value must be consistent with which you had set on Dinpay's Merchant System.

$key = "zxcvbnm890123_890123zxcvbnm";

$signStr = $signStr."key=".$key;
$sign = md5($signStr);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body onLoad="document.dinpayForm.submit();">
<form name="dinpayForm" method="post" action="https://pay.dinpay.com/gateway?input_charset=UTF-8" target="_self">
    <input type="hidden" name="sign"		  value="<?php echo $sign?>" />
    <input type="hidden" name="merchant_code" value="<?php echo $merchant_code?>" />
    <input type="hidden" name="bank_code"     value="<?php echo $bank_code?>"/>
    <input type="hidden" name="order_no"      value="<?php echo $order_no?>"/>
    <input type="hidden" name="order_amount"  value="<?php echo $order_amount?>"/>
    <input type="hidden" name="service_type"  value="<?php echo $service_type?>"/>
    <input type="hidden" name="input_charset" value="<?php echo $input_charset?>"/>
    <input type="hidden" name="notify_url"    value="<?php echo $notify_url?>">
    <input type="hidden" name="interface_version" value="<?php echo $interface_version?>"/>
    <input type="hidden" name="sign_type"     value="<?php echo $sign_type?>"/>
    <input type="hidden" name="order_time"    value="<?php echo $order_time?>"/>
    <input type="hidden" name="product_name"  value="<?php echo $product_name?>"/>
    <input Type="hidden" Name="client_ip"     value="<?php echo $client_ip?>"/>
    <input Type="hidden" Name="extend_param"  value="<?php echo $extend_param?>"/>
    <input Type="hidden" Name="extra_return_param" value="<?php echo $extra_return_param?>"/>
    <input Type="hidden" Name="product_code"  value="<?php echo $product_code?>"/>
    <input Type="hidden" Name="product_desc"  value="<?php echo $product_desc?>"/>
    <input Type="hidden" Name="product_num"   value="<?php echo $product_num?>"/>
    <input Type="hidden" Name="return_url"    value="<?php echo $return_url?>"/>
    <input Type="hidden" Name="show_url"      value="<?php echo $show_url?>"/>
    <input Type="hidden" Name="redo_flag"     value="<?php echo $redo_flag?>"/>
</form>
</body>
</html>
