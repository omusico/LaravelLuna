<?php namespace App\Http\Controllers;

use App\lu_caiji_record;
use App\lu_user;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_result;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    //采集
    public function collectLotteryData(Request $request)
    {

        $lotteryType = strtoupper(trim($request->lottery_type));
        $lunaFunctions = new LunaFunctions();
        $configs = defaultCache::cache_lottery_status();
        $conf = $lunaFunctions->get_lottery_config($lotteryType);

        if( strtoupper($lotteryType) == 'NMG') {
//            $time = $this->getCurrentLottery($lotteryType);
            $time = $lunaFunctions->get_current_period($lotteryType);
            $time = json_decode($time,true);
            $currentPeriod = $time["issuse"];
            $str = explode("-", $currentPeriod);
            $pre = intval($str[1]) - 1;

            $beginDay = mktime(9,50,0,date('m'),date('d'),date('Y')); //
            $now = strtotime("now");
            $end =  strtotime(date('Y-m-d').' '.$config['endTime']);
            if( $now > $beginDay &&  $pre == 0){
                $prePeriod = date('Ymd').'-073';
                $pre = '73';
            } else {
                if($pre < 10 ){
                    $prePeriod = $str[0].'-00'.$pre;
                }else {
                    $prePeriod = $str[0].'-0'.$pre;
                }
            }

            $timeData = array(
                "currentPeriod" => 	$time["issuse"],
                "leftTime" => $time["bettime"],
                "kjTime" => $time["awardSeconds"],
                "prePeriod" => $prePeriod,
                "pre" => $pre,
                "num" => $conf["num"]
            );

            $num = $config['num'];
            //&& (strtotime("now") - $end < 900
            if( $num - $pre == 0 ) {
                $needCaiji = 1;
                $timeData['needCaiji'] = 1;
            }

        } else {
            $timeData = $lunaFunctions->get_current_period($lotteryType);
        }
//        $lotteryResult = Waf::model('lottery/result');
//        $caijiModel = Waf::model('common/caijirecord');
//        $count = $lotteryResult->isExistsProName($timeData['prePeriod'],$lotteryType);
        $count = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName', $lotteryType)->count();
        $now = strtotime("now");
        $periodTime = 600;
//        if( $lotteryType == 'CHE' ){
//            $periodTime = 300;
//        }
        // 判断下当前期是否已经入库.若没有.则进行开奖采集.
        if ($count < 1) {
            // 如果时间上比较还比较早,则没必要采集.直接读取上一期的数据库

            $cj = new Lottery_Caiji();
            $cjConfig = $lunaFunctions->get_lottery_cj_all_config($lotteryType);
            unset($cjConfig['js']);
            // 越大优先级越高
            $cjConfig = Common\CommonClass::arraySort($cjConfig, 'priority', SORT_DESC);

            $hadKj = false; // 是否已经开奖
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
                    $count = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName',$lotteryType)->count();
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
            $recordData = lu_lotteries_result::where('proName', $timeData['prePeriod'])->where('typeName', $lotteryType) ->first();
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

        $caijiRecord = new lu_caiji_record();
        $caijiRecord->lotteryType = $lotteryType;
        $caijiRecord->period = $timeData['prePeriod'];
        $caijiRecord->useTime = strtotime("now") - $now;
        $caijiRecord->status = $status;
        $caijiRecord->msg = json_encode($result);
        $caijiRecord->created = strtotime("now");
        $caijiRecord->createdTime = date("Y-m-d H:i:s");

        //fix 插入采集记录表
        $caijiRecord->save();
//        $caijiModel->insert($caijiRecord);
//        $urls = Waf::cache("notify_url");

        // 且需要通知其他站点
        //todo 下面具体是否需要实现有待考虑
//        if( $hadKj && count($urls) > 0 ){
//            // 通知其他站点
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
//
//        }
        return $result;
//        $this->response->throwJson($result);
    }

}
