<?php namespace App\Http\Controllers;

use App\lu_caiji_record;
use App\lu_lotteries_five;
use App\lu_lotteries_k3;
use App\lu_points_record;
use App\lu_user;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_result;
use App\lu_user_data;
use Illuminate\Http\Request;
use App\LunaLib\Common\defaultCache;
use App\LunaLib\Common\Lottery_CaiJi;
use App\LunaLib\Common\LunaFunctions;
use App\LunaLib\Common;


class CollectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('welcome');
    }

    //采集
    public function collectLotteryData(Request $request)
    {

        $lotteryType = strtoupper(trim($request->lottery_type));
        $lunaFunctions = new LunaFunctions();
        $configs = defaultCache::cache_lottery_status();
        $conf = $lunaFunctions->get_lottery_config($lotteryType);

        if (strtoupper($lotteryType) == 'NMG') {
            $time = $lunaFunctions->getCurrentLottery($lotteryType);
            $time = json_decode($time, true);
            $currentPeriod = $time["issuse"];
            $str = explode("-", $currentPeriod);
            $pre = intval($str[1]) - 1;

            $beginDay = mktime(9, 50, 0, date('m'), date('d'), date('Y')); //
            $now = strtotime("now");
//            $end = strtotime(date('Y-m-d') . ' ' . $config['endTime']);
            if ($now > $beginDay && $pre == 0) {
                $prePeriod = date('Ymd') . '-073';
                $pre = '73';
            } else {
                if ($pre < 10) {
                    $prePeriod = $str[0] . '-00' . $pre;
                } else {
                    $prePeriod = $str[0] . '-0' . $pre;
                }
            }

            $timeData = array(
                "currentPeriod" => $time["issuse"],
                "leftTime" => $time["bettime"],
                "kjTime" => $time["awardSeconds"],
                "prePeriod" => $prePeriod,
                "pre" => $pre,
                "num" => $conf["num"]
            );

//            $num = $configs['num'];
            //&& (strtotime("now") - $end < 900
//            if ($num - $pre == 0) {
//                $needCaiji = 1;
//                $timeData['needCaiji'] = 1;
//            }

        } else {
            $timeData = $lunaFunctions->get_current_period($lotteryType);
        }
        $count = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName', $lotteryType)->count();
        $now = strtotime("now");
        $periodTime = 600;
//        if( $lotteryType == 'CHE' ){
//            $periodTime = 300;
//        }
        // 判断下当前期是否已经入库.若没有.则进行开奖采集.
        $hadKj = false; // 是否已经开奖
        if ($count < 1) {
            // 如果时间上比较还比较早,则没必要采集.直接读取上一期的数据库

            $cj = new Lottery_Caiji();
            $cjConfig = $lunaFunctions->get_lottery_cj_all_config($lotteryType);
            unset($cjConfig['js']);
            // 越大优先级越高
            $cjConfig = Common\CommonClass::arraySort($cjConfig, 'priority', SORT_DESC);

//            $source;

            foreach ($cjConfig as $key => $val) {

                if ($val['status'] != '1') {
                    // 增加采集的状态
                    continue;
                }
                // 线路不能访问
//                $xl_data  = Waf::cache('cache_xl_net_info');
                $xl_key = strtolower($lotteryType . "_" . $key . '_' . $timeData['currentPeriod']);
//                $xl_net = $xl_data[$xl_key];
//
//                if( isset( $xl_net ) && ( strtotime("now") - $xl_net['created'] < 30 )){
//                    continue;
//                }

                // 采集数据
                $kjData = $cj->cjData($xl_key, $lotteryType, $key, $val);

                if (!is_array($kjData)) {
                    continue;
                }

                // 判断是否正在开奖
                if ($lotteryType == 'BEIJIN' || $lotteryType == 'CHE') {
                    $kjPrePeriod = $kjData['preTerm'];
                } else if ($lotteryType == 'CQSSC') {
                    $kjPrePeriod = intval(substr($kjData['preTerm'], -3), 10);
                } else {
                    $kjPrePeriod = intval(substr($kjData['preTerm'], -2), 10);
                }

                $timePrePeriod = $timeData['pre'];

                $diffPeriod = $timePrePeriod - $kjPrePeriod;

                $czConfig = $lunaFunctions->get_lottery_config($lotteryType);

                $verifyData = $kjData['preOpenResult'] != "" && $kjData['preOpenResult'] != "?,?,?" && $kjData['preOpenResult'] != ",,,,";

                if ($diffPeriod == 0 && $verifyData) {
                    // 已开奖.入库
                    $status = 0;
                    $msg = '已开奖';
                    $luLotteriesResult = new lu_lotteries_result();
                    $luLotteriesResult->proName = $timeData['prePeriod'];
                    $luLotteriesResult->typeName = $lotteryType;
                    $luLotteriesResult->codes = $kjData['preOpenResult'];
                    $luLotteriesResult->created = strtotime(date('Y-m-d H:i:s'));
                    $luLotteriesResult->source = $key;
//                    $data = array(
//                        'proName' => $timeData['prePeriod'],
//                        'typeName' => $lotteryType,
//                        'codes' => $kjData['preOpenResult'],
//                        'created' => strtotime(date('Y-m-d H:i:s')),
//                        'source' => $key
//                    );

//                    $count = $lotteryResult->isExistsProName($timeData['prePeriod'],$lotteryType);
                    $count = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName', $lotteryType)->count();
                    if ($count <= 0) {
//                        $lotteryResult->insert($data);
                        //fix insert lotteryResult;
                        $luLotteriesResult->save();
                    }

                    $kjData['source'] = $lunaFunctions->get_cj_name($key);
                    $kjData['createTime'] = date('m-d H:i:s');
                    $hadKj = true;
                    $source = $key;
                    break;

                } else if ($diffPeriod == 1 || $kjData['preOpenResult'] == '' || $kjData['preOpenResult'] == "?,?,?" || $kjData['preOpenResult'] != ",,,,") {
                    // 正在开奖
                    $status = 1;
// 					$val['request'] = Waf::isEmpty($val['request']) ? 1 : $val['request'] +1;
                    $msg = '正在开奖';
                    continue;
                } else if ($timeData['leftTime'] < $periodTime - $czConfig['kjTime'] - 60 || $diffPeriod > 1) { //如果小于5分半中 或者
                    $status = -1;
                    $msg = '时间超时,未采集到数据.';
                } else {
                    $status = -1;
                    $msg = '接口异常';
                }

            }
            // 入库
        } else {
            // 已经采集了. 返回数据
            $status = 0;
            $msg = '已开奖';
            //fix 返回采集数据
            $recordData = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName', $lotteryType)->first();
//            $recordData = $lotteryResult->queryDetail($timeData['prePeriod'],$lotteryType);
            $kjData = array(
                'preTerm' => $recordData->proName,
                'preOpenResult' => $recordData->codes,
                'source' => $lunaFunctions->get_cj_name($recordData->source),
                'createTime' => date('m-d H:i:s', $recordData->created)
            );
        }

        $result = array(
            "status" => $status,
            "msg" => $msg,
            "lotteryType" => $lotteryType,
            "data" => array_merge($timeData, $kjData)
        );

        $caijiRecord = array(
            "lotteryType" => $lotteryType,
            "period" => $timeData['prePeriod'],
            "useTime" => strtotime("now") - $now,
            "status" => $status,
            "msg" => json_encode($result),
            "created" => strtotime("now"),
            "createdTime" => date("Y-m-d H:i:s")
        );
        //fix 插入采集记录表
        lu_caiji_record::create($caijiRecord);
//        $caijiModel->insert($caijiRecord);
//        $urls = Waf::cache("notify_url");

        // 且需要通知其他站点
        //todo 下面具体是否需要实现有待考虑
        if ($hadKj) {
            $this->syncCjFromNotice($lotteryType, $timeData['prePeriod'], $kjData['preOpenResult'], $source);
            // 通知其他站点
//            $base = Waf_Config::get('base');
//            $theme = $base['theme'];
//
//            $mp=new MultiHttpRequest();
//            $urls = Waf::cache("notify_url");
//            $newUrls = array();
//            foreach ($urls as $key=>$val){
//                $newUrls[$key] = $val."/index.php?m=common&c=index&a=syncCjFromNotice".
//                    "&lottery_type=".$lotteryType."&prePeriod=".$timeData['prePeriod']."&preOpenResult=".$kjData['preOpenResult'].'&from='.$source;
//            }
//
//            $mp->set_urls($newUrls);
//            $contents = $mp->start();

        }
        return $result;
//        $this->response->throwJson($result);
    }

    // 根据通知来开奖派奖
    // 入参  开奖期数,开奖结果
    public function syncCjFromNotice($lotteryType, $prePeriod, $preOpenResult, $source)
    {

//        $lotteryType = strtoupper(trim($this->request->lottery_type));
//        $prePeriod = trim($this->request->prePeriod);
//        $preOpenResult = trim($this->request->preOpenResult);
//        $from = trim($this->request->from); // 来源
//        $lotteryResult = Waf::model('lottery/result');
//        $caijiModel = Waf::model('common/caijirecord');

//        $count = $lotteryResult->isExistsProName($timeData['prePeriod'],$lotteryType);
        $count = lu_lotteries_result::where('proName', $prePeriod)->where('typeName', $lotteryType)->count();
        if ($count < 1) {
            // 记录
            $data = array(
                'proName' => $prePeriod,
                'typeName' => $lotteryType,
                'codes' => $preOpenResult,
                'created' => strtotime(date('Y-m-d H:i:s')),
                'source' => $source
            );
//            $lotteryResult->insert($data);
            lu_lotteries_result::create($data);
            // 进行开奖.
            // 还未进行开奖
        }
        $lunaFunction = new LunaFunctions();
        $result = $lunaFunction->lottery_kj($lotteryType, $prePeriod, $preOpenResult);

        if (env('COLLECT') == "1") {
            if (strripos($lotteryType, 'FIVE')) {
//                exec('curl www.11x51.com/webkj?lottery_type=' . $lotteryType . '&proName=' . $prePeriod . '&winCode=' . $preOpenResult);
                exec("curl 'www.11x51.com/webkj?lottery_type=" . $lotteryType . "&proName=" . $prePeriod . "&winCode=" . $preOpenResult."'");
            } else {
//                exec('curl www.k3558.com/webkj?lottery_type=' . $lotteryType . '&proName=' . $prePeriod . '&winCode=' . $preOpenResult);
                exec("curl 'www.k3558.com/webkj?lottery_type=" . $lotteryType . "&proName=" . $prePeriod . "&winCode=" . $preOpenResult."'");
            }

            exec("curl '45.119.97.42/webkj?lottery_type=" . $lotteryType . "&proName=" . $prePeriod . "&winCode=" . $preOpenResult."'");
//            exec('curl localhost:8000/webkj?lottery_type=' . $lotteryType . '&proName='.$prePeriod . '&winCode=' . $preOpenResult);
        }

    }

    public function webkj(Request $request)
    {
        $lottery_type = $request->lottery_type;
        $winPre = trim($request->proName);
        $winCode = trim($request->winCode);
        $this->sdkjFromNotice($lottery_type, $winPre, $winCode);
        return array('success');
//        $lunaFunction = new LunaFunctions();
//        $lunaFunction->get_lottery_type_code($lottery_type);
    }

    public function sdkjFromNotice($lottery_type, $winPre, $winCode)
    {
        if (empty($winPre)) {
            echo '请填写开奖期号';
            return;
        }
        if (empty($winCode)) {
            echo '请填写开奖结果';
            return;
        }

        // 如果是已撤单,则初始化相关状态
        if (env('SITE_TYPE', '') == 'five') {
            $cancelList = lu_lotteries_five::where("proName", $winPre)->where("province", strtolower($lottery_type))->where("status", -2)->get();
        } else {
            $cancelList = lu_lotteries_k3::where("proName", $winPre)->where("province", strtolower($lottery_type))->where("status", -2)->get();
        }

        foreach ($cancelList as $key => $lottery) {
            // 扣掉钱.同时初始化

            $userDetail = lu_user_data::where('uid', $lottery['uid'])->first();

            $cancelPrice = $lottery['eachPrice'];

            $pointRecordData = array(
                'uid' => $lottery['uid'],
                'userName' => $lottery['userName'],
                'addType' => '1', // 投注
                'lotteryType' => $lottery_type, // 彩种
                'touSn' => $lottery['sn'],
                'oldPoint' => $userDetail['points'],
                'changePoint' => -$cancelPrice,
                'newPoint' => $userDetail['points'] - $cancelPrice,
                'created' => strtotime(date('Y-m-d H:i:s')),
                'bz' => '撤单后又开奖自动扣钱'
            );
            lu_points_record::create($pointRecordData);

            $userDetail->points = $userDetail['points'] - $cancelPrice;
            $userDetail->save();
            //todo down

            // 资金明细记录
        }

        $lunaFunction = new LunaFunctions();
        $result = $lunaFunction->lottery_kj($lottery_type, $winPre, $winCode);

        $lunaFunction->sdkjAddRecord($lottery_type, $winPre, $winCode);
        $result = var_export($result, true);
        return $result;

    }

}
