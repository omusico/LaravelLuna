<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\lu_lotteries_k3;
use App\lu_lotteries_result;
use App\lu_lottery_notes_five;
use App\lu_lottery_notes_k3;
use App\lu_points_record;
use App\lu_user;
use App\lu_user_data;
use App\LunaLib\Common\CommonClass;
use App\LunaLib\Common\defaultCache;
use App\LunaLib\Common\Lottery_GetTime;
use App\LunaLib\Common\LunaFunctions;
use Auth;

use Illuminate\Http\Request;

class LotteryK3Controller extends Controller
{

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
        $chipins = defaultCache::cache_chipin();
        $k3Odds = defaultCache::cache_k3_odds();
        $lotterystatus = defaultCache::cache_lottery_status();
//        return view('errors.maintance');
        if (strtolower($request->lottery_type) == 'fjk3') {
            return view('errors.maintance');
        }
        return view('Lottery.lotteryindex', compact('czName', 'config', 'chipins', 'k3Odds', 'lotterystatus'));
    }

    public function trend(Request $request)
    {
        $lottery_type = strtoupper(trim($request->lottery_type));
        $lunaFunctions = new LunaFunctions();
        $czName = $lunaFunctions->get_lottery_name($lottery_type);
        $config = $lunaFunctions->get_lottery_config($lottery_type);
        $datas = lu_lotteries_result::where('typeName', $lottery_type)->orderby('created_at', 'desc')->take(50)->get();
        return view('Lottery.lotterytrend', compact('datas', 'czName', 'config'));
    }

    public function loadRecentResult(Request $request)
    {
        $lotteryType = strtoupper(trim($request->lottery_type));
//        $recentNum = $this->request->recentNum;
//        $lotteryResult = Waf::model('lottery/result');
//        $data = $lotteryResult->queryRecent($lotteryType,$recentNum);
        $data = lu_lotteries_result::where('typeName', $lotteryType)->orderBy('proName', 'desc')->take(20)->get();
        return $data;
    }

    public function k3GameRule()
    {
        return view('Lottery.k3gamerule');
    }

    public function getPointsRecord()
    {
        $result = lu_points_record::where('uid', Auth::user()->id)->orderby('created_at', 'desc');
        $lu_points_records = $result->paginate(10);
        return view('User.pointsrecordlist', compact('lu_points_records'));
    }

    public function favourable()
    {
        return view('favourable');
    }

    public function getLotteryWin()
    {
        if(env('SITE_TYPE','')=='five'){

            $result = lu_lottery_notes_five::where('uid', Auth::user()->id)->orderby('created_at', 'desc');
        }else{

            $result = lu_lottery_notes_k3::where('uid', Auth::user()->id)->orderby('created_at', 'desc');
        }
        $lu_lottery_note_k3s = $result->paginate(10);
        return view('User.lotterywinlist', compact('lu_lottery_note_k3s'));
    }

    /**
     * 格式化号码
     *
     * @access public
     */
    private function _formatCode($code)
    {
        switch ($code) {
            case '3THTX':
                $code = '111,222,333,444,555,666';
                break;
            case '3LHTX':
                $code = '123,234,345,456';
                break;
            default :
                $code = str_replace(" ", "", $code);
        }
        return $code;
    }

    public function getLotteryDataForQt(Request $request)
    {

        $lunaFunctions = new LunaFunctions();
        $lotteryType = strtoupper(trim($request->lottery_type));
        $timeData = $lunaFunctions->get_current_period($lotteryType);
//        $lotteryResult = Waf::model('lottery/result');
//        $count = $lotteryResult->isExistsProName($timeData['prePeriod'],$lotteryType);
        $count = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName', $lotteryType)->count();
//        $count = 0;
        if ($count < 1) {
            // 开奖中
            $status = 1;
            $msg = '开奖中';
            $kjData = array(
                'preTerm' => $timeData['prePeriod'],
                'preOpenResult' => ''
            );
        } else {
            // 已开奖
            $status = 0;
            $msg = '已开奖';
            //fixed need fix it
            $recordData = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName', $lotteryType)->first();
//            $recordData = $lotteryResult->queryDetail($timeData['prePeriod'],$lotteryType);
            $kjData = array(
                'preTerm' => $recordData['proName'],
                'preOpenResult' => $recordData['codes'],
                "source" => CommonClass::get_cj_name($recordData['source']),
                "createTime" => date('Y-m-d H:i:s', $recordData['created'])

            );
        }

        $result = array(
            "status" => $status,
            "msg" => $msg,
            "lotteryType" => $lotteryType,
            "data" => array_merge($timeData, $kjData)
        );
        return $result;
    }

    public function betting(Request $request)
    {
        try {
            $totals = 0;
            $lotteryTypes = defaultCache::cache_lottery_status();
            $lunaFunctions = new LunaFunctions();
            //todo 获取status的值,看这个lottery是否在维护
            $status = 1;//$lotteryTypes[$this->lottery_type]['status'];
            if ($status == 0) {
//                $lotteryName = $lotteryTypes[$this->lottery_type]['name'];
//                $this->response->throwJson(array('tip' => 'error', 'msg' => $lotteryName . '正在维护中,敬请期待'));
            }
            $uid = (int)\Auth::user()->id;// Waf_Cookie::get('uid');
            $userInfo = lu_user::where('id', $uid)->first();// $userModel->detail($uid);
            $userdata = lu_user_data::where('uid', $uid)->first();
            $chipins = defaultCache::cache_chipin();

            $status = $userInfo['status'];
            if ($status == 0 || $status == -2) {
                return array('tip' => 'error', 'msg' => '您当前不能投注,请联系客服');
            }

//            $verifyCode = Waf_Cookie::get('verifycode');
//            if ($userInfo['verifyCode'] != $verifyCode) {
//                $this->response->throwJson(array('tip' => 'login', 'msg' => '您已断开连接,请重新登录	'));
//            }

            $points = $userdata['points'];

            $codes = $request->codes;//$this->request->codes;
            $proName = $request->proName;//$this->request->proName;
            $lottery_type = $request->lottery_type;
            // strlen($proName) <= 5
            if (empty($codes) || empty($proName) || ($proName == '20-1-')) {
                return array('tip' => 'error', 'msg' => '系统繁忙,请重新投注');
            }

            $now = $this->getCurrentTerm($lottery_type);

            if ($now != $proName) {
                return array('tip' => 'timeout', 'msg' => '第' . $proName . '期已经截止下注,请稍后');
            }


            $codeArgs = explode('<waf>', $codes);
            $types = defaultCache::cache_lottery_type_slug(); //Waf::moduleData('lottery_type_slug', 'lottery');

//            $model = Waf::model('lottery/list', array('lottery_type' => $this->lottery_type));
            $ip = $request->ip();//Waf_Common::getIp();
//            $uid = (int)Waf_Cookie::get('uid');
            $recUid = $userInfo->recId;//(int)Waf_Cookie::get('recUid');
            $alls = 0;

            foreach ($codeArgs as $v) {
                if ($v != "") {
                    list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $v);
                    // 如果有和值,则获取 一期已买数量
                    if ($slug == 'HZ' && in_array($code, array('单', '双', '大', '小'))) {
                        $buyedMondy = $lunaFunctions->get_buyed_money($uid, $proName, $slug, $lottery_type);
                        break;
                    }
                }
            }
            foreach ($codeArgs as $v) {
                if ($v != "") {

                    list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $v);
                    if (!preg_match("/^\d*$/", $eachPrice)) {
                        return array('tip' => 'error', 'msg' => '下注金额非数字');
                    }

                    if ($v == '') {
                        continue;
                    }

                    $price = (int)$eachPrice;


                    $totals = $totals + $eachPrice;

                    if ($slug == 'HZ' && in_array($code, array('单', '双', '大', '小'))) {
                        $buyedMondy[$code] += $eachPrice;
                        $highest = $chipins['HZ']['dsdx_hight'];//get_tz_dsdx_highest('lottery', 'HZ');
                        $lowest = $chipins['HZ']['dsdx_low']; //get_tz_dsdx_lowest('lottery', 'HZ');
//
                        if ($price < $lowest) {
                            return array('tip' => 'error', 'msg' => '当前有单注投注金额小于' . $lowest . '块,请重新投注');
                        }
//
                        if ($buyedMondy[$code] > $highest) {
                            return array('tip' => 'error', 'msg' => '您该期所下注金额' . $code . '超过最大限额' . $highest . ',请重新下注', 'points' => $points);
                        }
                    } else {
                        $highest = $chipins[$slug]['hight'];
                        $lowest = $chipins[$slug]['low'];
//
                        if ($price < $lowest) {
                            return array('tip' => 'error', 'msg' => '当前有单注投注金额小于' . $lowest . '块,请重新投注');
                        }

                        if ($price > $highest) {
                            return array('tip' => 'error', 'msg' => '您该期所下注金额' . $code . '超过最大限额' . $highest . ',请重新下注', 'points' => $points);
                        }
                    }
                }
            }

            if ($totals > $points) {
                return array('tip' => 'login', 'msg' => '您的余额不足，请立即充值');
            }

            $this->typeDatas = defaultCache::cache_k3_odds();//Waf::moduleData('odds', 'lottery');
//            $pointRecordModel = Waf::model('lottery/pointrecord');
            $tempPoints = $points;
            foreach ($codeArgs as $value) {
                if ($value == '') continue;
                list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $value);
                if (isset($types[$slug]) && !empty($types[$slug])) {

                    if ($slug == 'HZ' || $slug == 'TX') {
                        $key = trim($code);
                        switch ($code) {
                            case '单':
                                $key = '19';
                                break;
                            case '双':
                                $key = '20';
                                break;
                            case '大':
                                $key = '21';
                                break;
                            case '小':
                                $key = '22';
                                break;
                            default:
                                $key = trim($code);
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
                        'siteId' => 1,
//                        'created' => $_SERVER['REQUEST_TIME'],
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
                    lu_lotteries_k3::create($data);
                    $alls = $alls + $totals;

                    $pointRecordData = array(
                        'uid' => $uid,
                        'userName' => $userInfo->name,
                        'addType' => '1', // 投注
                        'lotteryType' => $lottery_type, // 彩种
                        'touSn' => $sn,
                        'oldPoint' => $tempPoints,
                        'changePoint' => CommonClass::price($eachPrice),
                        'newPoint' => $tempPoints - CommonClass::price($eachPrice),
                        'created' => strtotime(date('Y-m-d H:i:s'))
                    );

                    lu_points_record::create($pointRecordData);
                    $tempPoints = $tempPoints - CommonClass::price($eachPrice);

//                    addChouJiangRecord($uid, $eachPrice);

                }
            }
            //金额要更新
//            $userInfo2 = lu_user::where('id',$uid);
            $points2 = $userdata['points'];
            $points = $points2 - $totals;
            $userdata->points = $points;
//            Waf_Cookie::set('points', $points);
//            $userModel->updateLoginInfo($uid, array('points' => $points));
            $userdata->save();
            if ($alls != 0 && $recUid > 0) {
                //$userModel->updateInfo($recUid ,array('totalBuy'=>array('+'=>intval($totalBuy))));
//                $sql = "UPDATE xh_users SET totalBuy=totalBuy+{$alls} WHERE uid={$recUid}";
//                Waf_Db::get()->command($sql)->query();
            }
//            $this->response->throwJson(array('tip' => 'success', 'msg' => '提交成功', 'points' => $points));
            return array('tip' => 'success', 'msg' => '提交成功', 'points' => $points);
        } catch (Exception $e) {
//            file_put_contents(__WAF_ROOT__ . '/error.log', date('Y-m-d H:i:s', Waf_Time) . $e, FILE_APPEND);
            log::error($e);
            return array('tip' => 'error', 'msg' => $e, 'points' => $points);
        }
    }

    public function zhuihao(Request $request)
    {
        try {
            $bb = var_export($request->_params, true);
            $str = iconv("utf-8", "gb2312", $bb);
            $lunaFunctions = new LunaFunctions();

            $playType = trim($request->playType);
            $totals = 0;
            $lotteryTypes = defaultCache::cache_lottery_status();//Waf::cache('lottery_type_status');
            $status = $lotteryTypes[$request->lottery_type]['status'];
            $chipins = defaultCache::cache_chipin();
            if ($status == 0) {
//                $lotteryName = $lotteryTypes[$this->lottery_type]['name'];
//                $this->response->throwJson(array('tip' => 'error', 'msg' => $lotteryName . '正在维护中,敬请期待'));
            }

//            $userModel = Waf::model('user/list');
//            $uid = (int)Waf_Cookie::get('uid');
            $userInfo = lu_user_data::where('uid', Auth::user()->id)->first();//$userModel->detail($uid);

            if (Auth::user()->status == 0) {
                return array('tip' => 'error', 'msg' => '您当前不能投注,请联系客服');
            }
//
//            if (empty($_SESSION['touzhutime'])) {
//                $_SESSION['touzhutime'] = Waf_Time;
//            } else {
//                $consum = Waf_Time - $_SESSION['touzhutime'];
//                if ($consum < 3) {
//                    $this->response->throwJson(array('tip' => 'error', 'msg' => '您下注太快,请重新投注'));
//                }
//            }

            $points = $userInfo['points'];

            $codes = $request->codes;
            $proName = $request->proName;
            if (empty($playType) || empty($codes)) {
                return array('tip' => 'error', 'msg' => '参数错误');
            }

            /* $now = $this->getCurrentTerm($lottery_type);

            if($now!=$proName){
                $this->response->throwJson(array('tip'=>'timeout','msg'=>'第'.$proName.'期已经截止下注,请稍后'));
            } */


            $codeArgs = explode('<waf>', $codes);
//     		$codeArgs = array_reverse($codeArgs);
            /*     		$bb = var_export ( $codeArgs, true );
                        file_put_contents ( __WAF_ROOT__ . '/zhuihao.log',$bb . '\n', FILE_APPEND );
                          */

            $types = defaultCache::cache_lottery_type_slug();//Waf::moduleData('lottery_type_slug', 'lottery');

//            $model = Waf::model('lottery/list', array('lottery_type' => $this->lottery_type));
            //         var_dump($model);
            $ip = $request->ip();
            $uid = Auth::user()->id;
            $recUid = (int)Auth::user()->recUid;//Waf_Cookie::get('recUid');
            $alls = 0;

            if ($playType == 'HZ') {
//                $db = Waf_Db::get();
//                $lottery_name = 'lotteries_k3';
//                $select = $db->select('codes,sum(eachPrice) as sum ')->from($lottery_name);

                $where = " uid=" . $uid . " and proName='" . $proName . "' and typeId = 9 and province = '{$request->lottery_type}' ";
                $row = \DB::select('select codes,sum(eachPrice) as sum from lu_lotteries_k3s where ' . $where . ' group by codes ');
//                $row = $select->where($where)->groupBy('codes')->fetchAll();

                $m = array('单' => 0, '双' => 0, '大' => 0, '小' => 0);

                if (!empty($row)) {
                    $b = $this->i_array_column($row, 'sum', 'codes');
                    $n = array_merge($m, $b);
                } else {
                    $n = $m;
                }
            }

            $codeArr = array();

            $tmp = '';

//            $highest = get_tz_dsdx_highest('lottery', 'HZ');
//            $lowest = get_tz_dsdx_lowest('lottery', 'HZ');
            $highest = $chipins['HZ']['dsdx_hight'];
            $lowest = $chipins['HZ']['dsdx_low'];

            foreach ($codeArgs as $v) {
                if (!empty($v)) {

                    list($code, $slug, $name, $eachPrice, $proNumber) = explode('|', $v);
                    if (!preg_match("/^\d*$/", $eachPrice)) {
                        return array('tip' => 'error', 'msg' => '下注金额非数字');
                    }


                    if ($v == '') {
                        continue;
                    }

                    if ($tmp == '') {
                        $tmp = $code;
                    }

                    if ($tmp == $code) {
                        if (!empty($codeArr[$code])) {
                            if ($codeArr[$code] != null) {
                                $codeArr[$code] = array_merge($codeArr[$code], array($v));
                            } else {
                                $codeArr[$code] = array($v);
                            }
                        } else {
                            $codeArr[$code] = array($v);
                        }

                    } else {
                        $codeArr[$code] = array($v);
                    }

                    $tmp = $code;

                    $price = (int)$eachPrice;
                    if ($price < 10) {
                        return array('tip' => 'error', 'msg' => '当前有单注投注金额小于10块,请重新投注');
                    }

                    $totals = $totals + $eachPrice;
                    if ($code == '单') {
                        $n['单'] += $eachPrice;
                        if ($n['单'] > $highest) {
                            return array('tip' => 'error', 'msg' => '您该期所下注金额(单)超过最大限额' . $highest . ',请重新下注', 'points' => $points);
                        }
                    } else if ($code == '双') {
                        $n['双'] += $eachPrice;
                        if ($n['双'] > $highest) {
                            return array('tip' => 'error', 'msg' => '您该期所下注金额(双)超过最大限额' . $highest . ',请重新下注', 'points' => $points);
                        }
                    } else if ($code == '大') {
                        $n['大'] += $eachPrice;
                        if ($n['大'] > $highest) {
                            return array('tip' => 'error', 'msg' => '您该期所下注金额(大)超过最大限额' . $highest . ',请重新下注', 'points' => $points);
                        }
                    } else if ($code == '小') {
                        $n['小'] += $eachPrice;
                        if ($n['小'] > $highest) {
                            return array('tip' => 'error', 'msg' => '您该期所下注金额(小)超过最大限额' . $highest . ',请重新下注', 'points' => $points);
                        }
                    }
                }
            }

            if ($totals > $points) {
                return array('tip' => 'login', 'msg' => '您的余额不足，请立即充值');
            }

            //$this->typeDatas = Waf::moduleData('odds', 'lottery');
            $this->typeDatas = defaultCache::cache_k3_odds();
//            $pointRecordModel = Waf::model('lottery/pointrecord');
            $tempPoints = $points;

            $ting = $request->ting;

            foreach ($codeArr as $group) {

                $groupId = $lunaFunctions->create_order_no($uid);
                $groupId = $groupId . '_' . $ting;
                $i = 0;

                foreach ($group as $value) {
                    list($code, $slug, $name, $eachPrice, $proNumber) = explode('|', $value);
                    $i++;
                    if (isset($types[$slug]) && !empty($types[$slug])) {

                        if ($slug == 'HZ' || $slug == 'TX') {
                            $key = trim($code);
                            switch ($code) {
                                case '单':
                                    $key = '19';
                                    break;
                                case '双':
                                    $key = '20';
                                    break;
                                case '大':
                                    $key = '21';
                                    break;
                                case '小':
                                    $key = '22';
                                    break;
                                default:
                                    $key = trim($code);
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
                            'proName' => $proNumber,
                            'total' => $totals,
                            'eachPrice' => CommonClass::price($eachPrice),
                            'siteId' => 1,
                            'created' => (strtotime("now") - $i),
                            'uid' => $uid,
                            'userName' => Auth::user()->name,
                            'userIp' => $ip,
                            'times' => 0,
                            'recUid' => $recUid,
                            'bingoPrice' => CommonClass::price($new_bingoPrice),
                            'status' => 1,
                            'codes' => $this->_formatCode($code),
                            'province' => $request->lottery_type,
                            'provinceName' => $lunaFunctions->get_lottery_name($request->lottery_type),
                            'groupId' => $groupId
                        );
                        lu_lotteries_k3::create($data);
//                        $bb = $model->insert($data);
                        $alls = $alls + $totals;
//     				file_put_contents ( __WAF_ROOT__ . '/info.log', '333' , FILE_APPEND );

                        $pointRecordData = array(
                            'uid' => $uid,
                            'userName' => Auth::user()->name,
                            'addType' => '1', // 投注
                            'lotteryType' => $request->lottery_type, // 彩种
                            'touSn' => $sn,
                            'oldPoint' => $tempPoints,
                            'changePoint' => -CommonClass::price($eachPrice),
                            'newPoint' => $tempPoints - CommonClass::price($eachPrice),
                            'created' => strtotime(date('Y-m-d H:i:s')),
                            'bz' => '追号'
                        );

                        lu_points_record::create($pointRecordData);
//                        $pointRecordModel->insert($pointRecordData);
                        $tempPoints = $tempPoints - CommonClass::price($eachPrice);
                    }
                }
            }

            $points = $points - $totals;
//            Waf_Cookie::set('points', $points);
//            $userModel = Waf::model('user/list');
//            $userModel->updateLoginInfo($uid, array('points' => $points));
            $userInfo->points = $points;
            $userInfo->save();

            if ($alls != 0 && $recUid > 0) {
                //$userModel->updateInfo($recUid ,array('totalBuy'=>array('+'=>intval($totalBuy))));
//                $sql = "UPDATE xh_users SET totalBuy=totalBuy+{$alls} WHERE uid={$recUid}";
//                Waf_Db::get()->command($sql)->query();
            }
            return array('tip' => 'success', 'msg' => '提交成功', 'points' => $points);
        } catch (Exception $e) {
//            file_put_contents(__WAF_ROOT__ . '/error.log', date('Y-m-d H:i:s', Waf_Time) . $e, FILE_APPEND);
            return array('tip' => 'error', 'msg' => $e, 'points' => $points);
        }
    }

    public function i_array_column($input, $columnKey, $indexKey = null)
    {
        $columnKeyIsNumber = (is_numeric($columnKey)) ? true : false;
        $indexKeyIsNull = (is_null($indexKey)) ? true : false;
        $indexKeyIsNumber = (is_numeric($indexKey)) ? true : false;
        $result = array();
        foreach ((array)$input as $key => $row) {
//            $row = CommonClass::object_array($row);
            $row = (array)$row;
            if ($columnKeyIsNumber) {
                $tmp = array_slice($row, $columnKey, 1);
                $tmp = (is_array($tmp) && !empty($tmp)) ? current($tmp) : null;
            } else {
                $tmp = isset($row[$columnKey]) ? $row[$columnKey] : null;
            }
            if (!$indexKeyIsNull) {
                if ($indexKeyIsNumber) {
                    $key = array_slice($row, $indexKey, 1);
                    $key = (is_array($key) && !empty($key)) ? current($key) : null;
                    $key = is_null($key) ? 0 : $key;
                } else {
                    $key = isset($row[$indexKey]) ? $row[$indexKey] : 0;
                }
            }
            $result[$key] = $tmp;
        }
        return $result;
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
}
