<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_five;
use App\lu_points_record;
//use App\lu_lotteries_k3;
use App\lu_lotteries_result;
use App\lu_lottery_notes_five;
use App\lu_user;
use App\lu_user_data;
use App\LunaLib\Common\CommonClass;
use App\LunaLib\Common\defaultCache;
use App\LunaLib\Common\Lottery_GetTime;
use App\LunaLib\Common\LunaFunctions;
use Illuminate\Http\Request;
use Auth;

class LotteryFiveController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//
        $lunaFunctions = new LunaFunctions();
        $czName = $lunaFunctions->get_lottery_name($request->lottery_type);
        $config = $lunaFunctions->get_lottery_config($request->lottery_type);
        $chipins = defaultCache::cache_five_chipins();
        $fiveOdds = defaultCache::cache_five_odds();
        $lotterystatus = defaultCache::cache_lottery_status();
        $lotterytypes = defaultCache::cache_five_types();
        if (strtolower($request->lottery_type) == 'cqfive') {
            return view('errors.maintance');
        }
//        return view('errors.maintance');
//        if (strtolower($request->lottery_type) == 'fjk3') {
//            return view('errors.maintance');
//        }
        return view('Lottery.fivelotteryindex', compact('czName', 'config', 'chipins', 'fiveOdds', 'lotterystatus','lotterytypes'));
	}

    public function fiveGameRule()
    {
        return view('Lottery.fivegamerule');
    }

    public function trend(Request $request)
    {
        $lottery_type = strtoupper(trim($request->lottery_type));
        $lunaFunctions = new LunaFunctions();
        $czName = $lunaFunctions->get_lottery_name($lottery_type);
        $config = $lunaFunctions->get_lottery_config($lottery_type);
        $datas = lu_lotteries_result::where('typeName', $lottery_type)->orderby('created_at', 'desc')->take(20)->get();
        return view('Lottery.fivelotterytrend', compact('datas', 'czName', 'config'));
    }

    public function betting(Request $request) {

        try{
            $playType = trim($request->playType);
            //todo 可能会有问题
            $zhushu = $request->zhushu;
            $totals = 0;
            $lottery_type = trim($request->lottery_type);
            $lunaFunctions = new LunaFunctions();
            if($lottery_type == ''){
                $lottery_type = 'sdfive';
            }

//            $lotteryTypes = Waf::cache('lottery_type_status');
//            $status = $lotteryTypes[$lottery_type]['status'];
//            if( $status == 0){
//                $lotteryName = $lotteryTypes[$lottery_type]['name'];
//                $this->response->throwJson(array('tip'=>'error','msg'=>$lotteryName.'正在维护中,敬请期待'));
//            }

            $uid = (int)\Auth::user()->id;// Waf_Cookie::get('uid');
            $userInfo = lu_user::where('id', $uid)->first();// $userModel->detail($uid);
            $userdata = lu_user_data::where('uid', $uid)->first();


            $status = $userInfo['status'];
            if( $status == 0){
                return array('tip'=>'error','msg'=>'您当前不能投注,请联系客服');
            }

            $points =  $userdata['points'];

            $codes = $request->codes;
            $proName = $request->proName;
            if(empty($playType) || empty($zhushu)  || empty($codes) || empty($proName)){
                return array('tip'=>'error','msg'=>'参数错误');
            }

            $now = $this->getCurrentTerm($lottery_type);
            if($now!=$proName){
                return array('tip'=>'timeout','msg'=>'第'.$proName.'期已经截止下注,请稍后');
            }

            $codeArgs = explode('<waf>',$codes);

            $types = defaultCache::cache_five_type_slug(); //Waf::moduleData('five_type_slug','five');
            $chipins = defaultCache::cache_five_chipins();
            $ip =$request->ip();
            $recUid = $userInfo->recId;
            $alls = 0;

            //todo 这是什么鬼，晚上再弄
            if( $playType == 'HZ') {
//                $db = Waf_Db::get();
//
//                $lottery_name = 'lotteries_five';
//
//                $select = $db->select('codes,sum(eachPrice) as sum ')->from($lottery_name);
//
                $where = " uid=".$uid. " and proName='".$proName. "' and typeId = 12 and province = '{$lottery_type}' ";
//                $row = $select->where($where)->groupBy('codes')->fetchAll();

                $row = \DB::select("select codes,sum(eachPrice) as sum from lu_lotteries_fives where ".$where." group by codes");

                $m = array('单'=>0,'双'=>0,'大'=>0,'小'=>0,
                    '前1#单'=>0,'前2#单'=>0,'前3#单'=>0,'前4#单'=>0,'前5#单'=>0,
                    '前1#双'=>0,'前2#双'=>0,'前3#双'=>0,'前4#双'=>0,'前5#双'=>0,
                    '前1#小'=>0,'前2#小'=>0,'前3#小'=>0,'前4#小'=>0,'前5#小'=>0,
                    '前1#大'=>0,'前2#大'=>0,'前3#大'=>0,'前4#大'=>0,'前5#大'=>0);

                if( !empty($row )) {
                    $b =$this->i_array_column($row, 'sum', 'codes');
                    $n = array_merge($m,$b);
                } else {
                    $n = $m;
                }
            }

            foreach ($codeArgs as $v){
                if ($v != "") {
                    list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $v);
                    if (!preg_match("/^\d*$/", $eachPrice)) {
                        return array('tip' => 'error', 'msg' => '下注金额非数字');
                    }
                    if ($v == '') {
                        continue;
                    }
                    $price = (int)$eachPrice;
                    $highest = $chipins[$slug]['hight'];
                    $lowest = $chipins[$slug]['low'];
                    if ($price < $lowest) {
                        return array('tip' => 'error', 'msg' => '当前有单注投注金额小于' . $lowest . '块,请重新投注');
                    }
                    if ($price > $highest) {
                        return array('tip' => 'error', 'msg' => '您该期所下注金额' . $code . '超过最大限额' . $highest . ',请重新下注', 'points' => $points);
                    }
                    $totals = $totals + $eachPrice;

//                $n[$code] += $eachPrice;
//                if( $n[$code] > $userInfo['highest'] ){
//                    return array('tip'=>'error','msg'=>'您该期所下注金额'.$code .'超过最大限额'.$userInfo['highest'].',请重新下注','points'=>$points);
//                }
                }
            }

            if($totals > $points){
                return array('tip'=>'error','msg'=>'您的余额不足，请立即充值');
            }


            $this->typeDatas = defaultCache::Cache_five_odds();//Waf::moduleData('odds','five');
//            $pointRecordModel = Waf::model('lottery/pointrecord');
            $tempPoints = $points;
            foreach($codeArgs as $value){
                if ($value != "") {
                    list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $value);
                    if (isset($types[$slug]) && !empty($types[$slug])) {

                        if ($slug == 'HZ') {
                            $key = trim($code);

                            switch ($code) {
                                case '单':
                                    $key = 'dan';
                                    break;
                                case '双':
                                    $key = 'shuang';
                                    break;
                                case '大':
                                    $key = 'da';
                                    break;
                                case '小':
                                    $key = 'xiao';
                                    break;
                                default:
                                    $key = trim($code);
                            }

                            if (strstr($code, "#")) {
                                list($qiantype, $qiancode) = explode("#", $code);

                                switch ($qiancode) {
                                    case '单':
                                        $key = 'qdan';
                                        break;
                                    case '双':
                                        $key = 'qshuang';
                                        break;
                                    case '大':
                                        $key = 'qda';
                                        break;
                                    case '小':
                                        $key = 'qxiao';
                                        break;
                                }
                            }


                            $odds = $this->typeDatas[$slug][$key];
                        } else {
                            $odds = $this->typeDatas[$slug]['value'];
                        }
                        $new_bingoPrice = $eachPrice * $odds;
                        $totals = CommonClass::price($totals);
                        $sn = $lunaFunctions->create_order_no($uid);
                        $data = array(
                            'typeId' => intval($types[$slug]['typeId']),
                            'sn' => $sn,
                            'proName' => $proName,
                            'total' => $totals,
                            'eachPrice' => CommonClass::price($eachPrice),
                            'siteId' => 2,
//                        'created'=>Waf_Time,
                            'uid' => $uid,
                            'userName' => $userInfo->name,
                            'userIp' => $ip,
                            'times' => 0,
                            'recUid' => $recUid,
                            'bingoPrice' => CommonClass::price($new_bingoPrice),
                            'status' => 1,
                            'province' => $lottery_type,
                            'provinceName' => $lunaFunctions->get_lottery_name($lottery_type),
                            'codes' => $this->_formatCode($code)
                        );
                        lu_lotteries_five::create($data);
                        $alls = $alls + $totals;

                        $pointRecordData = array(
                            'uid' => $uid,
                            'userName' => $userInfo->name,
                            'addType' => '1', // 投注
                            'lotteryType' => $lottery_type, // 彩种
                            'touSn' => $sn,
                            'oldPoint' => $tempPoints,
                            'changePoint' => -CommonClass::price($eachPrice),
                            'newPoint' => $tempPoints - CommonClass::price($eachPrice),
                            'created' => strtotime(date('Y-m-d H:i:s'))
                        );

                        lu_points_record::create($pointRecordData);
//                    addChouJiangRecord($uid,$eachPrice);
                        $tempPoints = $tempPoints - CommonClass::price($eachPrice);

                    }
                }
            }
            //金额要更新
            $points2 =  $userdata['points'];
            $points = $points2 - $totals;
            $userdata->points =$points;
            $userdata->save();
            if($alls!=0 && $recUid > 0){
                //$userModel->updateInfo($recUid ,array('totalBuy'=>array('+'=>intval($totalBuy))));
//                $sql="UPDATE xh_users SET totalBuy=totalBuy+{$alls} WHERE uid={$recUid}";
//                Waf_Db::get()->command($sql)->query();
            }
            return array('tip'=>'success','msg'=>'提交成功','points'=>$points);
        } catch (Exception $e){
//            file_put_contents(__WAF_ROOT__.'/error.log', date('Y-m-d H:i:s',Waf_Time).$e,FILE_APPEND);
            return array('tip'=>'error','msg'=>$e,'points'=>$points);

        }
    }

    public function getCurrentTerm($lotteryType)
    {
        $lotteryType = strtoupper($lotteryType);
        $lunaFunctions = new LunaFunctions();
        $kjType = $lunaFunctions->get_lottery_kjType($lotteryType);
        if ($kjType == '1') {
            $timeData = $lunaFunctions->get_current_period($lotteryType);
            return $timeData['currentPeriod'];
        } else {
            //fixed
            $time = new Lottery_GetTime();
            $lotteryType = strtoupper($lotteryType);
            $action = 'getTimeFor' . $lotteryType;
            $content = $time->{$action}();
            $content = json_decode($content, true);
            return $content["issuse"];
        }
    }

    private function _formatCode($code){
        switch($code){
            case '3THTX':
                $code = '111,222,333,444,555,666';
                break;
            case '3LHTX':
                $code = '123,234,345,456';
                break;
            default :
                $code = str_replace ( " ", "", $code);
        }
        return $code;
    }

    function i_array_column($input, $columnKey, $indexKey=null){
        $columnKeyIsNumber      = (is_numeric($columnKey)) ? true : false;
        $indexKeyIsNull         = (is_null($indexKey)) ? true : false;
        $indexKeyIsNumber       = (is_numeric($indexKey)) ? true : false;
        $result                 = array();
        foreach((array)$input as $key=>$row){
            $row = (array)$row;
            if($columnKeyIsNumber){
                $tmp            = array_slice($row, $columnKey, 1);
                $tmp            = (is_array($tmp) && !empty($tmp)) ? current($tmp) : null;
            }else{
                $tmp            = isset($row[$columnKey]) ? $row[$columnKey] : null;
            }
            if(!$indexKeyIsNull){
                if($indexKeyIsNumber){
                    $key        = array_slice($row, $indexKey, 1);
                    $key        = (is_array($key) && !empty($key)) ? current($key) : null;
                    $key        = is_null($key) ? 0 : $key;
                }else{
                    $key        = isset($row[$indexKey]) ? $row[$indexKey] : 0;
                }
            }
            $result[$key]       = $tmp;
        }
        return $result;
    }
}
