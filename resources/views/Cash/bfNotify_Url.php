<?php
$MemberID=$_REQUEST['MemberID'];//商户号
$TerminalID =$_REQUEST['TerminalID'];//商户终端号
$TransID =$_REQUEST['TransID'];//流水号
$Result=$_REQUEST['Result'];//支付结果
$ResultDesc=$_REQUEST['ResultDesc'];//支付结果描述
$FactMoney=$_REQUEST['FactMoney'];//实际成功金额
$AdditionalInfo=$_REQUEST['AdditionalInfo'];//订单附加消息
$SuccTime=$_REQUEST['SuccTime'];//支付完成时间
$Md5Sign=$_REQUEST['Md5Sign'];//md5签名
$lrecharge = \App\lu_lottery_recharge::where('sn', $TransID)->first();
$levelkey = $lrecharge->type;
$userlevels = \App\LunaLib\Common\defaultCache::userlevel();
$level = $userlevels[$levelkey];
$Md5key = $level['key']; ///////////md5密钥（KEY）
$MARK = "~|~";
//MD5签名格式
$WaitSign=md5('MemberID='.$MemberID.$MARK.'TerminalID='.$TerminalID.$MARK.'TransID='.$TransID.$MARK.'Result='.$Result.$MARK.'ResultDesc='.$ResultDesc.$MARK.'FactMoney='.$FactMoney.$MARK.'AdditionalInfo='.$AdditionalInfo.$MARK.'SuccTime='.$SuccTime.$MARK.'Md5Sign='.$Md5key);
$reallymoney = $FactMoney / 100;
if ($Md5Sign == $WaitSign) {
    //校验通过开始处理订单
    if ($lrecharge->status == '2') {
        $ldata = \App\lu_user_data::where('uid', $lrecharge->uid)->first();
        $tmp = $ldata->points;
        $points = $ldata->points;
        $points = $points + $reallymoney;
        $ldata->points = $points;
        $ldata->save();
        //状态修改为已经付款
        $lrecharge->status = 1;
        $lrecharge->amounts = $reallymoney;
        $lrecharge->save();
        $data = array(
            'uid' => $lrecharge->uid,
            'userName' => $lrecharge->userName,
            'addType' => '3', // 在线充值
            'lotteryType' => '', // 中奖
            'winSn' => $TransID,
            'oldPoint' => $tmp,
            'changePoint' => $reallymoney,
            'newPoint' => $points,
            'created' => strtotime(date('Y-m-d H:i:s'))
        );
        \App\lu_points_record::create($data);
    }
    echo ("ok");//全部正确了输出OK
    //处理想处理的事情，验证通过，根据提交的参数判断支付结果
} else {
    if ($lrecharge->status == '2') {
        $lrecharge->status = 3;
        $lrecharge->save();
    }
    echo("Md5CheckFail'");//MD5校验失败
    //处理想处理的事情
}

?>
