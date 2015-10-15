<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\lu_user;
use App\LunaLib\Common\defaultCache;
use App\LunaLib\Common\LunaFunctions;

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
        return view('Lottery.lotteryindex', compact('czName', 'config', 'chipins', 'k3Odds'));
    }

    public function betting(Request $request)
    {
        try {
            $totals = 0;
            $lotteryTypes = defaultCache::cache_lottery_status();
            //todo 获取status的值
            $status = 1;//$lotteryTypes[$this->lottery_type]['status'];
            if ($status == 0) {
//                $lotteryName = $lotteryTypes[$this->lottery_type]['name'];
//                $this->response->throwJson(array('tip' => 'error', 'msg' => $lotteryName . '正在维护中,敬请期待'));
            }
            $uid = (int)\Auth::user()->id;// Waf_Cookie::get('uid');
            $userInfo = lu_user::where('id',$uid)->first();// $userModel->detail($uid);


            $status = $userInfo['status'];
            if ($status == 0 || $status == -2) {
//                $this->response->throwJson(array('tip' => 'error', 'msg' => '您当前不能投注,请联系客服'));
            }

//            $verifyCode = Waf_Cookie::get('verifycode');
//            if ($userInfo['verifyCode'] != $verifyCode) {
//                $this->response->throwJson(array('tip' => 'login', 'msg' => '您已断开连接,请重新登录	'));
//            }

            $points = $userInfo['points'];

            $codes = $request->codes;//$this->request->codes;
            $proName = $request->proName;//$this->request->proName;
            // strlen($proName) <= 5
            if (empty($codes) || empty($proName) || ($proName == '20-1-')) {
                $this->response->throwJson(array('tip' => 'error', 'msg' => '系统繁忙,请重新投注'));
            }

            $now = $this->getCurrentTerm($this->lottery_type);

            if ($now != $proName) {
                $this->response->throwJson(array('tip' => 'timeout', 'msg' => '第' . $proName . '期已经截止下注,请稍后'));
            }


            $codeArgs = explode('<waf>', $codes);
            $types = Waf::moduleData('lottery_type_slug', 'lottery');

            $model = Waf::model('lottery/list', array('lottery_type' => $this->lottery_type));
            $ip = Waf_Common::getIp();
            $uid = (int)Waf_Cookie::get('uid');
            $recUid = (int)Waf_Cookie::get('recUid');
            $alls = 0;

            /* if( $playType == 'HZ') {
                $db = Waf_Db::get();

                $lottery_name = 'lotteries_k3';

                $select = $db->select('codes,sum(eachPrice) as sum ')->from($lottery_name);

                $where = " uid=".$uid. " and proName='".$proName. "' and typeId = 9 and province = '{$this->lottery_type}' ";
                 $row = $select->where($where)->groupBy('codes')->fetchAll();

                $m = array('单'=>0,'双'=>0,'大'=>0,'小'=>0);

                 if( !empty($row )) {
                      $b = $this->i_array_column($row, 'sum', 'codes');
                    $n = array_merge($m,$b);
                } else {
                    $n = $m;
                }
              } */

            foreach ($codeArgs as $v) {
                list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $v);
                // 如果有和值,则获取 一期已买数量
                if ($slug == 'HZ' && in_array($code, array('单', '双', '大', '小'))) {
                    $buyedMondy = get_buyed_money($uid, $proName, $slug, $this->lottery_type);
                    break;
                }
            }
            foreach ($codeArgs as $v) {
                list($code, $slug, $name, $eachPrice, $bingoPrice) = explode('|', $v);
                if (!preg_match("/^\d*$/", $eachPrice)) {
                    $this->response->throwJson(array('tip' => 'error', 'msg' => '下注金额非数字'));
                }

                if ($v == '') {
                    continue;
                }

                $price = (int)$eachPrice;


                $totals = $totals + $eachPrice;

                if ($slug == 'HZ' && in_array($code, array('单', '双', '大', '小'))) {
                    $buyedMondy[$code] += $eachPrice;
                    $highest = get_tz_dsdx_highest('lottery', 'HZ');
                    $lowest = get_tz_dsdx_lowest('lottery', 'HZ');

                    if ($price < $lowest) {
                        $this->response->throwJson(array('tip' => 'error', 'msg' => '当前有单注投注金额小于' . $lowest . '块,请重新投注'));
                    }

                    if ($buyedMondy[$code] > $highest) {
                        $this->response->throwJson(array('tip' => 'error', 'msg' => '您该期所下注金额' . $code . '超过最大限额' . $highest . ',请重新下注', 'points' => $points));
                    }
                } else {
                    $highest = get_tz_highest('lottery', $slug);
                    $lowest = get_tz_lowest('lottery', $slug);

                    if ($price < $lowest) {
                        $this->response->throwJson(array('tip' => 'error', 'msg' => '当前有单注投注金额小于' . $lowest . '块,请重新投注'));
                    }

                    if ($price > $highest) {
                        $this->response->throwJson(array('tip' => 'error', 'msg' => '您该期所下注金额' . $code . '超过最大限额' . $highest . ',请重新下注', 'points' => $points));
                    }
                }
            }

            if ($totals > $points) {
                $this->response->throwJson(array('tip' => 'login', 'msg' => '您的余额不足，请立即充值'));
            }

            $this->typeDatas = Waf::moduleData('odds', 'lottery');
            $pointRecordModel = Waf::model('lottery/pointrecord');
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
                    $totals = Waf::price($totals);
                    $sn = create_order_no($uid);
                    $data = array(
                        'typeId' => intval($types[$slug]['typeId']),
                        'sn' => $sn,
                        'proName' => $proName,
                        'total' => $totals,
                        'eachPrice' => Waf::price($eachPrice),
                        'siteId' => siteId,
                        'created' => Waf_Time,
                        'uid' => $uid,
                        'userName' => Waf_Cookie::get('username'),
                        'userIp' => $ip,
                        'times' => 0,
                        'recUid' => $recUid,
                        'bingoPrice' => Waf::price($new_bingoPrice),
                        'status' => 1,
                        'province' => $this->lottery_type,
                        'provinceName' => get_lottery_name($this->lottery_type),
                        'codes' => $this->_formatCode($code)
                    );
                    $bb = $model->insert($data);
                    $alls = $alls + $totals;

                    $pointRecordData = array(
                        'uid' => $uid,
                        'userName' => Waf_Cookie::get('username'),
                        'addType' => '1', // 投注
                        'lotteryType' => $this->lottery_type, // 彩种
                        'touSn' => $sn,
                        'oldPoint' => $tempPoints,
                        'changePoint' => -Waf::price($eachPrice),
                        'newPoint' => $tempPoints - Waf::price($eachPrice),
                        'created' => strtotime(date('Y-m-d H:i:s'))
                    );

                    $pointRecordModel->insert($pointRecordData);
                    $tempPoints = $tempPoints - Waf::price($eachPrice);

                    addChouJiangRecord($uid, $eachPrice);

                }
            }
            //金额要更新
            $userInfo2 = $userModel->detail($uid);
            $points2 = $userInfo['points'];
            $points = $points2 - $totals;
            Waf_Cookie::set('points', $points);
            $userModel->updateLoginInfo($uid, array('points' => $points));
            if ($alls != 0 && $recUid > 0) {
                //$userModel->updateInfo($recUid ,array('totalBuy'=>array('+'=>intval($totalBuy))));
                $sql = "UPDATE xh_users SET totalBuy=totalBuy+{$alls} WHERE uid={$recUid}";
                Waf_Db::get()->command($sql)->query();
            }
            $this->response->throwJson(array('tip' => 'success', 'msg' => '提交成功', 'points' => $points));
        } catch (Exception $e) {
            file_put_contents(__WAF_ROOT__ . '/error.log', date('Y-m-d H:i:s', Waf_Time) . $e, FILE_APPEND);
            $this->response->throwJson(array('tip' => 'error', 'msg' => $e, 'points' => $points));

        }
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

}
