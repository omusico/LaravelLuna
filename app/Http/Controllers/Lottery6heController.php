<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_6he;
use App\lu_points_record;
use App\lu_user;
use App\lu_user_data;
use App\LunaLib\Common\CommonClass;
use App\LunaLib\Common\defaultCache;
use App\LunaLib\Common\LunaFunctions;
use Illuminate\Http\Request;

class Lottery6heController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $lotterytypes = defaultCache::cache_6he_first_types();
        $lotterysecondtypes = defaultCache::cache_6he_types();
        return view("Lottery.6helotteryindex", compact("lotterytypes", "lotterysecondtypes"));
    }

    public function get6heodds(Request $request)
    {
        $wf = $request->WF;
        $sixheodds = defaultCache::cache_6he_odds();
        if (is_numeric($wf)) {
            $wf = "PM" . $wf;
        }
        return $sixheodds[$wf];
    }

    public function betting(Request $request)
    {
        try {
            $playType = trim($request->playType);
            //todo 可能会有问题
            $zhushu = $request->zhushu;
            $totals = 0;
            $lottery_type = trim($request->lottery_type);
            $lunaFunctions = new LunaFunctions();
            if ($lottery_type == '') {
                $lottery_type = '6he';
            }

            $uid = (int)\Auth::user()->id;
            $userInfo = lu_user::find($uid);
            $userdata = lu_user_data::where('uid', $uid)->first();


            $status = $userInfo['status'];
            if ($status == 0) {
                return array('tip' => 'error', 'msg' => '您当前不能投注,请联系客服');
            }

            $points = $userdata['points'];

            $codes = $request->codes;
            $proName = $request->proName;
            $proName = "20160105-002";
            if (empty($playType) || empty($zhushu) || empty($codes) || empty($proName)) {
                return array('tip' => 'error', 'msg' => '参数错误');
            }

            //todo add this constraint
//            $now = $this->getCurrentTerm($lottery_type);
//            if ($now != $proName) {
//                return array('tip' => 'timeout', 'msg' => '第' . $proName . '期已经截止下注,请稍后');
//            }

            $codeArgs = explode('<waf>', $codes);

            $types = defaultCache::cache_6he_types(); //Waf::moduleData('five_type_slug','five');
            $chipins = defaultCache::cache_6he_chipins();
            $ip = $request->ip();
            $recUid = $userInfo->recId;
            $alls = 0;

            //todo 这是什么鬼，晚上再弄
//            if ($playType == 'HZ') {
//
//                $where = " uid=" . $uid . " and proName='" . $proName . "' and typeId = 12 and province = '{$lottery_type}' ";
//
//                $row = \DB::select("select codes,sum(eachPrice) as sum from lu_lotteries_fives where " . $where . " group by codes");
//
//                $m = array('单' => 0, '双' => 0, '大' => 0, '小' => 0,
//                    '前1#单' => 0, '前2#单' => 0, '前3#单' => 0, '前4#单' => 0, '前5#单' => 0,
//                    '前1#双' => 0, '前2#双' => 0, '前3#双' => 0, '前4#双' => 0, '前5#双' => 0,
//                    '前1#小' => 0, '前2#小' => 0, '前3#小' => 0, '前4#小' => 0, '前5#小' => 0,
//                    '前1#大' => 0, '前2#大' => 0, '前3#大' => 0, '前4#大' => 0, '前5#大' => 0);
//
//                if (!empty($row)) {
//                    $b = $this->i_array_column($row, 'sum', 'codes');
//                    $n = array_merge($m, $b);
//                } else {
//                    $n = $m;
//                }
//            }

            //todo 额度限制，暂时去掉
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
//                    $highest = $chipins[$slug]['hight'];
//                    $lowest = $chipins[$slug]['low'];
//                    if ($price < $lowest) {
//                        return array('tip' => 'error', 'msg' => '当前有单注投注金额小于' . $lowest . '块,请重新投注');
//                    }
//                    if ($price > $highest) {
//                        return array('tip' => 'error', 'msg' => '您该期所下注金额' . $code . '超过最大限额' . $highest . ',请重新下注', 'points' => $points);
//                    }
                    $totals = $totals + $eachPrice;
                }
            }

            if ($totals > $points) {
                return array('tip' => 'error', 'msg' => '您的余额不足，请立即充值');
            }


            $this->typeDatas = defaultCache::cache_6he_odds();
            $tempPoints = $points;
            foreach ($codeArgs as $value) {
                if ($value != "") {
                    list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $value);
                    if (isset($types[$slug]) && !empty($types[$slug])) {

                        if ($slug == 'TM_TM') {
                            $key = trim($code);

//                            switch ($code) {
//                                case '单':
//                                    $key = 'dan';
//                                    break;
//                                case '双':
//                                    $key = 'shuang';
//                                    break;
//                                case '大':
//                                    $key = 'da';
//                                    break;
//                                case '小':
//                                    $key = 'xiao';
//                                    break;
//                                default:
//                                    $key = trim($code);
//                            }

                            if (strstr($code, "#")) {
                                list($qiantype, $qiancode) = explode("#", $code);

//                                switch ($qiancode) {
//                                    case '单':
//                                        $key = 'qdan';
//                                        break;
//                                    case '双':
//                                        $key = 'qshuang';
//                                        break;
//                                    case '大':
//                                        $key = 'qda';
//                                        break;
//                                    case '小':
//                                        $key = 'qxiao';
//                                        break;
//                                }
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
                        lu_lotteries_6he::create($data);
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
                        $tempPoints = $tempPoints - CommonClass::price($eachPrice);

                    }
                }
            }
            //金额要更新
            $points2 = $userdata['points'];
            $points = $points2 - $totals;
            $userdata->points = $points;
            $userdata->save();
            if ($alls != 0 && $recUid > 0) {
            }
            return array('tip' => 'success', 'msg' => '提交成功', 'points' => $points);
        } catch (Exception $e) {
            return array('tip' => 'error', 'msg' => $e, 'points' => $points);

        }
    }

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
}
