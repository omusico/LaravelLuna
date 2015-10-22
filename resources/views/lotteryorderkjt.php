<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
</head>
<body onload='document.form1.submit();'>
<?
$mo=0.01;
$key="XXXXXXXXXXXXXX";

$service="create_instant_trade";
$version="1.0";
$partner_id="200000XXXXXX";
$_input_charset="UTF-8";
$sign_type="MD5";
$return_url="http://www.XXXXXX.com/kjtpay/ReturnUrlResponse.php";
$memo="";
$request_no=date('ymdHis').substr(microtime(),2,4);
$trade_list=$request_no."~shopname~".$mo."~1~".$mo."~~XXXX@kjtpay.com.cn~1~instant~~~~~~20140826164521~http://www.XXXXXX.com/kjtpay/NotifyUrlResponse.php";
$operator_id="";
$buyer_id="anonymous";
$buyer_id_type="1";
$buyer_ip="";
$pay_method="online_bank^".$mo."^ICBC,C,GC";
$go_cashier="Y";
$str="_input_charset=".$_input_charset."&buyer_id=".$buyer_id."&buyer_id_type=".$buyer_id_type."&go_cashier=".$go_cashier."&partner_id=".$partner_id."&pay_method=".$pay_method."&request_no=".$request_no."&return_url=".$return_url."&service=".$service."&trade_list=".$trade_list."&version=".$version;

$sign=md5($str.$key);

?>
<form name="form1" action="http://mag.kjtpay.com/mag/gateway/receiveOrder.do" method="post">
    <input type="hidden" name="service" value="create_instant_trade">
    <input type="hidden" name="version" value="1.0">
    <input type="hidden" name="partner_id" value=<?php echo $partner_id; ?>>
    <input type="hidden" name="_input_charset" value="UTF-8">
    <input type="hidden" name="sign" value="<?php echo $sign; ?>">
    <input type="hidden" name="sign_type" value="MD5">
    <input type="hidden" name="return_url" value="<?php echo $return_url; ?>">
    <input type="hidden" name="request_no" value="<?php echo $request_no; ?>">
    <input type="hidden" name="trade_list"  value="<?php echo $trade_list; ?>">
    <input type="hidden" name="buyer_id" value="anonymous">
    <input type="hidden" name="buyer_id_type" value="1">
    <input type="hidden" name="pay_method" value="<?php echo $pay_method; ?>"><br/>
    <input type="hidden" name="go_cashier" value="Y">
</form>
