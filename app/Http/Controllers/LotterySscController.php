<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_ssc;
use App\lu_points_record;
use App\lu_user;
use App\lu_user_data;
use App\LunaLib\Common\CommonClass;
use App\LunaLib\Common\defaultCache;
use App\LunaLib\Common\LunaFunctions;
use Illuminate\Http\Request;

class LotterySscController extends Controller {

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
        $chipins = defaultCache::cache_ssc_chipins();
        $sscOdds = defaultCache::cache_ssc_odds();
        $lotterystatus = defaultCache::cache_lottery_status();
        $lotterytypes = defaultCache::cache_ssc_first_types();
        $lotterysecondtypes = defaultCache::cache_ssc_types();
        if (strtolower($request->lottery_type) == 'xjssc') {
            return view('errors.maintance');
        }
        return view('Lottery.ssclotteryindex', compact('czName', 'config', 'chipins', 'sscOdds', 'lotterystatus','lotterytypes','lotterysecondtypes'));
	}

    public function sscGameRule(){
        return view('Lottery.sscgamerule');
    }

    public function betting(Request $request) {

        try{
            $playType = trim($request->playType);
            $zhushu = $request->zhushu;
            $totals = 0;
            $lottery_type = trim($request->lottery_type);
            $lunaFunctions = new LunaFunctions();
            $siteId=3;
            //彩种
//            $lotteryTypes = Waf::cache('lottery_type_status');
//            $status = $lotteryTypes[$lottery_type]['status'];
//            if( $status == 0){
//                $lotteryName = $lotteryTypes[$lottery_type]['name'];
//                $this->response->throwJson(array('tip'=>'error','msg'=>$lotteryName.'正在维护中,敬请期待'));
//            }

            $uid = (int)\Auth::user()->id;// Waf_Cookie::get('uid');
            $userInfo = lu_user::find($uid);// $userModel->detail($uid);
            $userdata = lu_user_data::where('uid', $uid)->first();

            $status = $userInfo['status'];
            if( $status == 0){
                return array('tip'=>'error','msg'=>'您当前不能投注,请联系客服');
            }

            $points =  $userdata['points'];

            $codes = trim($request->codes);
            $proName = $request->proName;
            if(empty($playType) || empty($zhushu)  || empty($codes) || empty($proName)){
                return array('tip'=>'error','msg'=>'参数错误');
            }


            $now = $this->getCurrentTerm($lottery_type);
            if($now!=$proName){
                return array('tip'=>'timeout','msg'=>'第'.$proName.'期已经截止下注,请稍后');
            }


            $codeArgs = explode('<waf>',$codes);

            $types = defaultCache::cache_ssc_type_slug();//Waf::moduleData('ssc_type_slug','ssc');
            $chipins = defaultCache::cache_ssc_chipins();
//            $model = Waf::model('lottery/list', array('lottery_type' => $lottery_type));
//         var_dump($model);
            $ip = $request->ip();
            $uid = \Auth::user()->id;
            $recUid = $userInfo->recId;
            $alls = 0;
            foreach ($codeArgs as $v){
                if ($v != "") {
                    list($code, $slug, $name, $zhushu, $eachPrice, $bingoPrice) = explode('|', $v);
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
                }
//                $n[$code] += $eachPrice;
//                if( $n[$code] > $userInfo['highest'] ){
//                    $this->response->throwJson(array('tip'=>'error','msg'=>'您该期所下注金额'.$code .'超过最大限额'.$userInfo['highest'].',请重新下注','points'=>$points));
//                }
            }

            if($totals > $points){
                return array('tip'=>'error','msg'=>'您的余额不足，请立即充值');
            }

            $this->typeDatas = defaultCache::Cache_ssc_odds();//Waf::moduleData('odds','ssc');
//            $pointRecordModel = Waf::model('lottery/pointrecord');
            $tempPoints = $points;
            foreach($codeArgs as $value){
                if($value == '') continue;
                list($code,$slug,$name,$zhushu,$eachPrice,$bingoPrice)=explode('|',$value);

                if(isset($types[$slug]) && !empty($types[$slug])){

                    $wfKey = array('TABHZ_SWHZ','TABHZ_EXHZ','TABHZ_SXHZ','TABNN_NN','TABYX_QYZHIX','TABYX_HYZHIX');

                    if( in_array($slug, $wfKey) ){
                        $code = trim($code);
                        if( in_array($code,array('单','双','大','小'))){
                            $keyMap = array ('单'=>'dan','双'=>'shuang','大'=>'da','小'=>'xiao');
                            $key = $keyMap[$code];
                        } else if ( strstr($code,"#")) {
                            list($qiantype,$qiancode) = explode("#", $code);
                            $keyMap = array ('单'=>'dwdan','双'=>'dwshuang','大'=>'dwda','小'=>'dwxiao');
                            $key = $keyMap[$qiancode];
                        } else {
                            $key = $code;
                        }
                        $odds = $this->typeDatas[$slug][$key];
                    } else{
                        $odds = $this->typeDatas[$slug]['value'];
                    }

                    $new_bingoPrice = $eachPrice * $odds/$zhushu;
                    $totals = CommonClass::price($totals);
                    $sn = $lunaFunctions->create_order_no($uid);
                    $data = array(
                        'typeId'=>intval($types[$slug]['typeId']),
                        'sn'=>$sn,
                        'proName'=>$proName,
                        'total'=>$totals,
                        'eachPrice'=>CommonClass::price($eachPrice),
                        'siteId'=>$siteId,
                        'created'=>$_SERVER['REQUEST_TIME'],
                        'uid'=>$uid,
                        'userName'=>\Auth::user()->name,
                        'userIp'=>$ip,
                        'times'=>0,
                        'recUid'=>$recUid,
                        'bingoPrice'=>CommonClass::price($new_bingoPrice),
                        'status'=>1,
                        'province' => $lottery_type,
                        'provinceName' =>$lunaFunctions->get_lottery_name($lottery_type),
                        'codes'=>$this->_formatCode($code)
                    );
                    lu_lotteries_ssc::create($data);
//                    $bb = $model->insert($data);

                    $alls = $alls+$totals;

                    $pointRecordData = array(
                        'uid' => $uid,
                        'userName' => \Auth::user()->name,
                        'addType' => '1', // 投注
                        'lotteryType' => $lottery_type, // 彩种
                        'touSn' =>  $sn,
                        'oldPoint' => $tempPoints,
                        'changePoint' => -CommonClass::price($eachPrice),
                        'newPoint' => $tempPoints - CommonClass::price($eachPrice),
                        'created' => strtotime(date('Y-m-d H:i:s'))
                    );
                    lu_points_record::create($pointRecordData);
//                    $pointRecordModel->insert($pointRecordData);
//                    addChouJiangRecord($uid,$eachPrice);
                    $tempPoints = $tempPoints - CommonClass::price($eachPrice);
                } else {
                    return array('tip'=>'error','msg'=>'配置异常,请检查');
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

    /**
     * 格式化号码
     *
     * @access public
     */
    private function _formatCode($code){
        $code = str_replace ( " ", "", $code);
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
