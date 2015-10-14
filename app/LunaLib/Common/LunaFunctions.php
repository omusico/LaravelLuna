<?php
namespace App\LunaLib\Common;

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
        if( !isset($lottery_type) || $lottery_type ==""){
            $lottery_type = 'jsold';
        }
        $config = $lottery[$lottery_type];
        return $config;
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

    public function get_lottery_cj_all_config($lottery_type)
    {
        $lottery_type = strtolower($lottery_type);
        $cj_config = \App\LunaLib\Common\defaultCache::cache_collection_config();
        $config = $cj_config[$lottery_type];
        return $config;
    }

    // 获取彩种名称
    function get_lottery_name($lottery_type){
        if( !isset($lottery_type) ){
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
}
