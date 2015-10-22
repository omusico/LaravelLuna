 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head><title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
  </head>
  <body>
  	<?
  	
  	$key="XXXXXXXXXXXX";
  	
$notify_id=$_POST["notify_id"];
$notify_type=$_POST["notify_type"];
$notify_time=$_POST["notify_time"];
$_input_charset=$_POST["_input_charset"];
$version=$_POST["version"];
$outer_trade_no=$_POST["outer_trade_no"];
$inner_trade_no=$_POST["inner_trade_no"];
$trade_status=$_POST["trade_status"];
$trade_amount=$_POST["trade_amount"];
$gmt_create=$_POST["gmt_create"];
$gmt_payment=$_POST["gmt_payment"];
$gmt_close=$_POST["gmt_close"];


$sign1=$_POST["sign"];
$sign_type=$_POST["sign_type"];	

$str="_input_charset=".$_input_charset."&gmt_create=".$gmt_create."&gmt_payment=".$gmt_payment."&inner_trade_no=".$inner_trade_no."&notify_id=".$notify_id."&notify_time=".$notify_time."&notify_type=".$notify_type."&outer_trade_no=".$outer_trade_no."&trade_amount=".$trade_amount."&trade_status=".$trade_status."&version=".$version;
  	
  	$sign=md5($str.$key);
 if ($sign1 == $sign)
{
	if ("TRADE_SUCCESS"==$trade_status)
	{
			//成功，写入数据库
      echo 'success';
      exit;
		}
	
	
} 

echo 	"失败";
