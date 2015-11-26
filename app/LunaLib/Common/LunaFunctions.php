<?php
namespace App\LunaLib\Common;

use App\lu_lotteries_five;
use App\lu_lotteries_k3;
use App\lu_lotteries_result;
use App\lu_lottery_notes_five;
use App\lu_lottery_notes_k3;
use App\lu_points_record;
use App\lu_user;
use App\lu_user_data;

/**
 * Created by PhpStorm.
 * User: luna
 * Date: 10/11/15
 * Time: 4:33 PM
 */
class LunaFunctions
{

    public function get_lottery_config($lottery_type)
    {
        $lottery_type = strtolower($lottery_type);
        $lottery = \App\LunaLib\Common\defaultCache::cache_lottery_status();
        if (!isset($lottery_type) || $lottery_type == "") {
            $lottery_type = 'jsold';
        }
        $config = $lottery[$lottery_type];
        return $config;
    }

    function get_lottery_kjType($lottery_type)
    {
        $config = $this->get_lottery_config($lottery_type);
        return $config['kjType'];
    }

    public function getCurrentLottery($lotteryType)
    {

        $type = $this->get_lottery_type_code($lotteryType);
        if ($type == 'k3') {
            $this->_urls = defaultCache::cache_lottery_url();
            $time = $this->_urls;
            $lotteryType = strtoupper($lotteryType);
            $action = 'getTimeFor' . $lotteryType;
            $content = $this->getTimeForNMG();//$time->{$action}();
            return $content;
        }
    }

    public function getTimeForNMG()
    {
        $js = $this->_urls['nmg'] ['js'];
        $servierTime = $this->_urls['nmg'] [$js] ['qqServerTime'];
        $awardInfo = $this->_urls['nmg'] [$js] ['getAwardInfo'];
        $awardSeconds = $this->_urls['nmg'][$js]['awardSeconds'];
        // 彩乐乐
        if ($js == 'wy') {
            $content = $this->getTimeFromWY($servierTime, $awardSeconds);
            return $content;
        } else {
            return '未找到配置接口,请联系管理员';
        }
    }

    public function getTimeFromWY($servierTime, $awardSeconds)
    {
        $content1 = defaultCache::getByCrul($servierTime);
//        $str1 = mb_convert_encoding($content1, "utf-8", "gb2321");
        $str1 = $content1;
        $tt1 = json_decode($str1, true);
        if ($tt1 != null) {
            $time = round($tt1["nextSecondsLeft"] / 1000);
            $currentTerm = $tt1["currentPeriod"];  // 140705005

            // 		$currentTerm = '20140705005';
            $cc = substr($currentTerm, 0, 2);
            if ($cc != '20') {
                // 20140705005
                $date = substr($currentTerm, 0, 6);
                $term = substr($currentTerm, 6, 3);
                $issuse = '20' . $date . '-' . $term;
            } else {
                $date = substr($currentTerm, 0, 8);
                $term = substr($currentTerm, 8, 3);
                $issuse = $date . '-' . $term;
            }

            $content = '{"issuse":"' . $issuse . '","bettime":' . $time . ',"awardSeconds":' . $awardSeconds . '}';
            return $content;

        } else {
            return '{"issuse":"","bettime":"","awardSeconds":' . $awardSeconds . '}';
        }

    }


// 获取北京快3的期数
    public function get_bj_period($fdTime)
    {
        $baseData = array(
            'baseTime' => 1424826600, // 0206  9:10	echo mktime(9,10,0,2,6,2015);
            'baseNum' => 6673);
        $day = ceil((time() - $baseData['baseTime']) / 86400) - 1;

        $currentTime = time() + $fdTime;

        $beginDay = mktime(9, 10, 0, date('m'), date('d'), date('Y'));
        $endDay = mktime(23, 50, 0, date('m'), date('d'), date('Y'));
        if ($currentTime > $beginDay) {
            $num = ceil(($currentTime - $beginDay) / 600);
            if ($num > 89) {
                $currentNum = $baseData['baseNum'] + $day * 89 + 90;
            } else {
                $currentNum = $baseData['baseNum'] + ceil(($currentTime - $beginDay) / 600) + $day * 89;
            }
        } else if ($currentTime < $beginDay) {
            $currentNum = $baseData['baseNum'] + ($day + 1) * 89;
        }

        return $currentNum;

    }

//获取当前期数
    public function get_current_period($lottery_type)
    {
        $lottery_type = strtolower($lottery_type);
//    if( $lottery_type == 'cqssc' ){
//        return get_cqssc_period();
//    } else if ( $lottery_type == 'xjssc'){
//        return get_xjssc_period();
//    }
        $config = $this->get_lottery_config($lottery_type);
        $beginTime = $config['beginTime'];
        $endTime = $config['endTime'];
        $num = $config['num'];
        $fdTime = $config['fdTime']; // 判断当前期数的时候.是加上封单时间。如封单时间是2分钟. 那么在 8分钟的时候。就是下一期了。使用加上则对了.
        $begin = strtotime(date('Y-m-d') . ' ' . $beginTime);
        $end = strtotime(date('Y-m-d') . ' ' . $endTime);
        $now = strtotime("now");

        $periodTime = 600; // 每期间隔

        if ($lottery_type == 'che') {
            $periodTime = 300;
        }

        $currentPeriod = ceil(($now + $fdTime - $begin) / $periodTime);
        $leftTime = $periodTime - ($now - $begin) % $periodTime - $fdTime;
        $kjTime = $config['kjTime'];


        if ($currentPeriod > $num) {
            // 已经截止,但是还未到第二天
            $d = strtotime("tomorrow");
            $pre = $num;
            $prePeriod = date('Ymd') . '-0' . $num;
            $currentPeriod = date('Ymd', $d) . "-001";
            $nextTime = strtotime(date('Y-m-d', $d) . ' ' . $beginTime);
            $leftTime = $nextTime - $fdTime - $now + $periodTime; // 第一期开奖时间
            $formatLeftTime = floor($leftTime / 3600) . ':' . (floor(($leftTime % 3600) / 60)) . ':' . (floor(($leftTime % 3600) % 60));

        } else if ($currentPeriod <= 0) {
            // 已经截止,但是已经是第二天了
            $pre = $num;
            $preDate = strtotime("-1 day");
            $prePeriod = date('Ymd', $preDate) . '-0' . $num;
            $currentPeriod = date('Ymd') . "-001";

            $leftTime = ($begin - $now - $fdTime) + $periodTime;
            $formatLeftTime = floor($leftTime / 3600) . ':' . (floor(($leftTime % 3600) / 60)) . ':' . (floor(($leftTime % 3600) % 60));
        } else {

            // 正常情况
            $qishu = ceil(($now - $begin + $fdTime) / $periodTime);

            $currentPeriod = date('Ymd') . '-' . str_pad($qishu, 3, '0', STR_PAD_LEFT);
            $pre = ceil(($now - $begin + $fdTime) / $periodTime) - 1;

            if ($pre == 0) {
                $preDate = strtotime("-1 day");
                $prePeriod = date('Ymd', $preDate) . '-0' . $num;
            } else {
                $prePeriod = date('Ymd') . '-' . str_pad($pre, 3, '0', STR_PAD_LEFT);
            }
            $leftTime = $periodTime - ($now + $fdTime - $begin) % $periodTime;


            $formatLeftTime = floor($leftTime / 3600) . ':' . (floor(($leftTime % 3600) / 60)) . ':' . (floor(($leftTime % 3600) % 60));
        }

        if ($lottery_type == 'beijin') {
            $currentPeriod = $this->get_bj_period($fdTime);
            $prePeriod = (string)($currentPeriod - 1);
            $pre = $prePeriod;
        }

//    if( $lottery_type == 'che'){
//        $currentPeriod = get_pk10_period($fdTime);
//        $prePeriod = (string)($currentPeriod - 1);
//        $pre = $prePeriod;
//    }


        $result = array('currentPeriod' => $currentPeriod,
            'prePeriod' => $prePeriod,
            'pre' => $pre,
            'leftTime' => $leftTime,
            'kjTime' => $kjTime,
            'num' => $config['num'],
            'formatLeftTime' => $formatLeftTime);

        $num = $config['num'];
        if ($num - $pre == 0) {
            $needCaiji = 1;
            $result['needCaiji'] = 1;
        }

        return $result;
    }

    function create_order_no($id)
    {

        return date("Ymd") . str_pad($id, 6, '0', STR_PAD_LEFT) . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

    }

    function get_lottery_type_code($lotteryType)
    {
        $lotteryType = strtolower($lotteryType);
        $k3Lottery = array('jsold', 'jsnew', 'hebei', 'hubei', 'jilin', 'nmg', 'beijin', 'anhui', 'fjk3');
        if (in_array($lotteryType, $k3Lottery)) {
            return 'k3';
        } else if (strstr($lotteryType, "five")) {
            return 'five';
        } else if ($lotteryType == 'happy') {
            return 'happy';
        } else if ($lotteryType == 'le') {
            return 'le';
        } else if ($lotteryType == 'poker') {
            return 'poker';
        } else if ($lotteryType == 'che') {
            return 'che';
        } else if (strstr($lotteryType, "ssc")) {
            return 'ssc';
        } else if (strstr($lotteryType, "xy")) {
            return 'xy';
        } else {
            return '';
        }

    }

    function get_buyed_money($uid, $proName, $playType, $lotteryType)
    {
// 		if( $playType == 'HZ') {
//        $db = Waf_Db::get();
        $type = $this->get_lottery_type_code($lotteryType);
        if ($type == 'k3') {
            $lottery_name = "lotteries_k3";
        } else if ($type == 'poker') {
            $lottery_name = 'poker_lotteries';
        } else {
            $lottery_name = 'lotteries_' . $type;
        }

//        $select = $db->select('codes,sum(eachPrice) as sum ')->from($lottery_name);

        $slug_types = defaultCache::cache_lottery_type_slug();//Waf::moduleData('lottery_type_slug','lottery');
        $typeId = $slug_types[$playType]['typeId'];

//        $where = " uid=".$uid. " and proName='".$proName. "' and typeId = '{$typeId}' and province = '{$lotteryType}' ";
//        $row = $select->where($where)->groupBy('codes')->fetchAll();
        $row = \Illuminate\Support\Facades\DB::select("select codes,sum(eachPrice) as sum from lu_lotteries_k3s where id='" . $uid . "' and proName='" . $proName . "' and typeId='" . $typeId . "' and province='" . $lotteryType . "' group by codes");


        $m = array('单' => 0, '双' => 0, '大' => 0, '小' => 0);

        if (!empty($row)) {
            $b = $this->i_array_column($row, 'sum', 'codes');
            $n = array_merge($m, $b);
        } else {
            $n = $m;
        }
        return $n;
    }

    function i_array_column($input, $columnKey, $indexKey = null)
    {
        $columnKeyIsNumber = (is_numeric($columnKey)) ? true : false;
        $indexKeyIsNull = (is_null($indexKey)) ? true : false;
        $indexKeyIsNumber = (is_numeric($indexKey)) ? true : false;
        $result = array();
        foreach ((array)$input as $key => $row) {
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

    public function get_lottery_cj_all_config($lottery_type)
    {
        $lottery_type = strtolower($lottery_type);
        $cj_config = \App\LunaLib\Common\defaultCache::cache_collection_config();
        $config = $cj_config[$lottery_type];
        return $config;
    }

    // 获取彩种名称
    function get_lottery_name($lottery_type)
    {
        if (!isset($lottery_type)) {
            $lottery_type = 'jsold';
        }

//        if( Waf::isEmpty($lottery_type)){
//            $lottery_type = $lottery_type == '' ? 'jsold': $lottery_type;
//        }

        $lottery_type = strtolower($lottery_type);
        $cache_lottery_type = defaultCache::cache_lottery_status();
        $gameProvince = $cache_lottery_type[$lottery_type]['name'];
        return ($gameProvince == null ? '未知彩种' : $gameProvince);
    }


    public function get_cj_name($type)
    {
        switch ($type) {
            case 'wy':
                return '网易';
                break;
            case 'cjw':
                return '彩经网';
                break;
            case 'lecai':
                return '百度乐彩';
                break;
            case '360cp':
                return '360';
                break;
            case 'cll':
                return '彩乐乐';
                break;
            case 'icaile';
                return '爱彩乐';
                break;
            case 'k39':
                return '快3网';
                break;
            case 'le':
                return '网易';
                break;
            case 'beijin':
                return '北京官网';
                break;
            case 'sc':
                return '四川官网';
                break;
            case 'wlc':
                return '万利彩';
                break;
            case 'wy2':
                return '网易';
                break;
            case 'pk10':
                return '1396me';
                break;
            case 'fj':
                return '福建福利彩';
                break;
            case 'xjflcp':
                return '新疆福利彩票';
                break;
            case 'tjflcp':
                return '天津福利彩票';
                break;
            default:
                return '未配置彩种类型,请联系管理员';
                break;
        }
    }

    function lottery_kj($lottery_type, $winPre, $winCode)
    {
        $Sitetype = env('SITE_TYPE','');
        $type = $this->get_lottery_type_code($lottery_type);
        if ('k3' == $type) $type = 'lottery';
//        Waf::moduleLib('Lottery_Result', $type, true);
        if ($winCode && $winPre) {
//            $model = Waf::model('lottery/list', array('lottery_type' => $lottery_type));
            //获奖列表
            if($Sitetype=='five'){
                $winlists = lu_lotteries_five::where('province', $lottery_type)->where('proName', $winPre)->where('noticed', 0)->where('status', '<>', '-1')->where('status', '<>', '-2')->get();
            }else{
                $winlists = lu_lotteries_k3::where('province', $lottery_type)->where('proName', $winPre)->where('noticed', 0)->where('status', '<>', '-1')->where('status', '<>', '-2')->get();
            }
            //获奖处理
            if($Sitetype=='five'){
                lu_lotteries_five::where('province', $lottery_type)->where('proName', $winPre)->update(['dealing' => 1, 'resultNum' => $winCode]);
            }else{
                lu_lotteries_k3::where('province', $lottery_type)->where('proName', $winPre)->update(['dealing' => 1, 'resultNum' => $winCode]);
            }
            $args = array();
            if ($winlists) {
                $winArr = explode(',', $winCode);
                if ($type == 'lottery') {
                    $types = defaultCache::cache_lottery_type();//Waf::moduleData('lottery_type', 'lottery');
                    $types2 = defaultCache::cache_lottery_type2();//Waf::moduleData('lottery_type', 'lottery', 2);
                    $types = $types + $types2;
                } else {
                    $types = defaultCache::cache_five_types();//Waf::moduleData($type . '_type', $type);
                }

                if ($type == 'xy') {
                    $result = new Lottery_Result($winPre, $winArr);
                } else if($type=="k3"){
                    $result = new Lottery_Result();
                } else if($type=="five"){
                    $result = new FiveLottery_Result();
                }

                foreach ($winlists as $row) {
                    $action = 'type' . $types[$row['typeId']]['slug'];

                    // 增加抽奖 addChouJiangRecord($uid,$eachPrice);

                    if ($row['groupId'] != null) {
                        //todo 增加抽奖
//                        addChouJiangRecord($row['uid'], $row['eachPrice']);
                    }

                    if (method_exists($result, $action)) {
//                        if ('poker' == $type) $winArr = parsePokerResult($winCode);
                        $myResults = $result->{$action}($winArr, $winPre, $row);
                        if ($myResults) {
                            $myResults["lotSn"] = $row['lotId'];
                            $myResults["touSn"] = $row['sn'];
                            $args[$row['id']] = $myResults;
                        }
                    } else {
                        echo '未配置方法';
                    }
                }
                if ($args) {
//                    $note = Waf::model('lottery/note', array('lottery_type' => $lottery_type));
//                    $lottery = Waf::model('lottery/list', array('lottery_type' => $lottery_type));
//                    $userModel = Waf::model('user/list');
//                    $pointRecordModel = Waf::model('lottery/pointrecord');
                    $lunaFunction = new LunaFunctions();
                    foreach ($args as $lotId => $data) {
                        $touSn = $data['touSn'];
                        if (isset($data['matchCount'])) {
                            $matchCount = $data['matchCount'];
                        }
                        unset($data['eachPrice'], $data['touSn'], $data['matchCount']);
                        $data['status'] = 1;
                        $data['province'] = $lottery_type;
                        $data['provinceName'] = $lunaFunction->get_lottery_name($lottery_type);
                        try {
                            if(env('SITE_TYPE','')=='five'){
                                lu_lottery_notes_five::create($data);
                            }else{
                                lu_lottery_notes_k3::create($data);
                            }
                            if (!isset($matchCount)) $matchCount = 1;
// 							file_put_contents ( __WAF_ROOT__ . '/win33.log','$matchCount:'.$matchCount . '\n', FILE_APPEND );
//                            $lottery->update($lotId, array('noticed' => 1, 'bingoPrice' => $data['amount'], 'dealing' => $matchCount));
                            if($Sitetype=='five'){

                                lu_lotteries_five::where('id', $lotId)->update(['noticed' => 1, 'bingoPrice' => $data['amount'], 'dealing' => $matchCount]);
                            }else{

                                lu_lotteries_k3::where('id', $lotId)->update(['noticed' => 1, 'bingoPrice' => $data['amount'], 'dealing' => $matchCount]);
                            }
//                            $userInfo = $userModel->detail($data['uid']);
                            $userInfo = lu_user_data::where('uid', $data['uid'])->first();

                            $tempPoints = $userInfo['points'];
                            $pointRecordData = array(
                                'uid' => $data['uid'],
                                'userName' => lu_user::find($data['uid'])->name,
                                'addType' => '2', // 中奖
                                'lotteryType' => $lottery_type, //
                                'touSn' => $touSn,
                                'winSn' => $data['dateSn'],
                                'oldPoint' => $tempPoints,
                                'changePoint' => $data['amount'],
                                'newPoint' => $tempPoints + $data['amount'],
                                'created' => strtotime(date('Y-m-d H:i:s'))
                            );
                            lu_points_record::create($pointRecordData);
                            lu_user_data::where('uid', $data['uid'])->update(['points' => $pointRecordData['newPoint']]);
                            // 取消 追号
                            if (!empty($lotId)) {
                                if(env('SITE_TYPE','')=='five'){

                                    $detail = lu_lotteries_five::where('id', $lotId)->first();
                                }else{

                                    $detail = lu_lotteries_k3::where('id', $lotId)->first();
                                }

                                if ($detail['groupId'] != null) {
                                    $groupId = explode('_', $detail['groupId']);
                                    $tingCount = intval($groupId[1]);
                                    //todo 取消追号逻辑
                                    if ($tingCount > 0) {
//                                    $winCount = $lottery->queryNoticedCountByGroupId($detail['groupId']);
                                        if(env('SITE_TYPE','')=='five'){

                                            $winCount = lu_lotteries_five::where('noticed', 1)->where('groupId', $detail['groupId'])->count();
                                        }else{

                                            $winCount = lu_lotteries_k3::where('noticed', 1)->where('groupId', $detail['groupId'])->count();
                                        }
                                        if ($winCount >= $tingCount) {

                                            // 同时反本金
//                                        $fanMoney = $lottery->queryFanMoney($detail['groupId']);
                                            if(env('SITE_TYPE','')=='five'){

                                                $fanMoney = \DB::select('SELECT SUM(eachPrice) as sum FROM lu_lotteries_fives where groupId="' . $detail['groupId'] . '" and isopen =0 and noticed =0')[0]->sum;
                                            }else{

                                                $fanMoney = \DB::select('SELECT SUM(eachPrice) as sum FROM lu_lotteries_k3s where groupId="' . $detail['groupId'] . '" and isopen =0 and noticed =0')[0]->sum;
                                            }
// 										if( $fanMoney > 0){

                                            $pointRecordData = array(
                                                'uid' => $data['uid'],
                                                'userName' => $userInfo['name'],
                                                'addType' => '14', // 中奖
                                                'lotteryType' => $lottery_type, //
                                                'touSn' => $detail['groupId'],
                                                'oldPoint' => $tempPoints + $data['amount'],
                                                'changePoint' => $fanMoney,
                                                'newPoint' => $tempPoints + $data['amount'] + $fanMoney,
                                                'created' => strtotime(date('Y-m-d H:i:s')),
                                                'bz' => '追号'
                                            );
                                            lu_points_record::create($pointRecordData);

//                                        $pointRecordModel->insert($pointRecordData);
//                                        $userModel->updateLoginInfo($data['uid'], array('points' => array('+', $fanMoney)));
// 										}

                                            // 停止追号
                                            if(env('SITE_TYPE','')=='five'){

                                                lu_lotteries_five::where('groupId', $detail['groupId'])->update(['status' => -1, 'isOpen' => 1]);
                                            }else{

                                                lu_lotteries_k3::where('groupId', $detail['groupId'])->update(['status' => -1, 'isOpen' => 1]);
                                            }
//                                        $lottery->updateLotteryStatus($detail['groupId'], array('status' => -1, 'isOpen' => 1));

                                        }
                                    }
                                }
                            }
                        } catch (Exception $e) {
                            log::error($e);
//                            file_put_contents(__WAF_ROOT__ . '/error.log', date('Y-m-d h:i:s', Waf_Time) . $e, FILE_APPEND);
                        }
                    }
                    unset($note, $lottery, $userModel);
                }
            }
//            $model->updateByProName($winPre, array('isOpen' => 1));
            if(env('SITE_TYPE','')=='five'){

                lu_lotteries_five::where('province', $lottery_type)->where('proName', $winPre)->update(['isOpen' => 1]);
            }else{

                lu_lotteries_k3::where('province', $lottery_type)->where('proName', $winPre)->update(['isOpen' => 1]);
            }

            // 如果是撤单在开奖.则需处理已经追号结束的.


            $msg = $lottery_type . "第" . $winPre . '期共投注:' . count($winlists) . '单,中奖注数：' . count($args);
            return array("success" => true, "msg" => $msg);
        } else {
            return array("success" => false, "msg" => "参数配置错误");
        }
    }

    function sdkjAddRecord($lotteryType, $winPre, $winCode)
    {
        $lotteryType = strtoupper($lotteryType);
//        $lotteryResult = Waf::model('lottery/result');
//        $count = $lotteryResult->isExistsProName($winPre,$lotteryType);
        $count = lu_lotteries_result::where('proName', $winPre)->where('typeName', $lotteryType)->count();


        if ($lotteryType == 'CHE' || $lotteryType == 'BEIJIN') {
            $peroid = $winPre;
        } else {
            $peroid = explode('-', $winPre);
            $peroid = intval($peroid[1]);
        }

        $kjTime = $this->getTimeByPeriod($lotteryType, $peroid);

        if ($count < 1) {
            $data = array(
                'proName' => $winPre,
                'typeName' => $lotteryType,
                'codes' => $winCode,
                'created' => $kjTime,
                'source' => 'manual'
            );
//            $lotteryResult->insert($data);
            lu_lotteries_result::create($data);
        }
    }

    function getTimeByPeriod($lottery_type, $period)
    {
        $lottery_type = strtolower($lottery_type);
        $config = $this->get_lottery_config($lottery_type);
        $beginTime = $config['beginTime'];
        $begin = strtotime(date('Y-m-d') . ' ' . $beginTime);
        $now = strtotime("now");

        if ($lottery_type == 'cqssc') {

            $beginDay = mktime(2, 0, 0, date('m'), date('d'), date('Y')); //
            $beginDay2 = mktime(10, 0, 0, date('m'), date('d'), date('Y')); //
            $beginDay3 = mktime(22, 0, 0, date('m'), date('d'), date('Y')); //
            // 5 分钟一期的 96期
            if ($now > $beginDay3) {
                $kjTime = $beginDay3 + ($period - 96) * 300;
            } else if ($now <= $beginDay) {
                $kjTime = strtotime(date('Y-m-d')) + $period * 300;
            } else if ($now >= $beginDay2) {
                $kjTime = $beginDay2 + ($period - 24) * 600;
            }

        } else if ($lottery_type == 'xjssc') {

        } else if ($lottery_type == 'beijin') {
            $baseData = array(
                'baseTime' => 1424826600, // 0206  9:10	echo mktime(9,10,0,2,6,2015);
                'baseNum' => 6673);
            $day = ceil((time() - $baseData['baseTime']) / 86400) - 1;
            $qs = $period - $day * 89 - $baseData['baseNum'];
            echo $qs . 'xx';
            $beginDay = mktime(9, 10, 0, date('m'), date('d'), date('Y'));
            $kjTime = $beginDay + $qs * 600;


        } else if ($lottery_type == 'che') {
            $baseData = array(
                'baseTime' => 1424912820, // 0206  9:07	echo mktime(9,07,0,2,26,2015);
                'baseNum' => 475590);
            $day = ceil((time() - $baseData['baseTime']) / 86400) - 1;
            $qs = $period - $day * 179 - $baseData['baseNum'];
            $beginDay = mktime(9, 7, 0, date('m'), date('d'), date('Y'));
            $kjTime = $beginDay + $qs * 300;
        } else {
            $kjTime = $begin + $period * 600;
        }
        return $kjTime;
    }
}
