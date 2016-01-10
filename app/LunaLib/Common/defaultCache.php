<?php
/**
 * Created by PhpStorm.
 * User: luna
 * Date: 10/4/15
 * Time: 7:42 PM
 */

namespace App\LunaLib\Common;

class defaultCache
{
    // 支付等级
    public static function userlevel()
    {
//        \Cache::forget('userlevel');
        if (\Cache::has('userlevel')) {
            return \Cache::get('userlevel');
        }

        if (env('SITE_TYPE') == 'five') {
            return array(1 =>
                array(
                    'typeName' => 'zf',
                    'name' => '智付',
                    'url' => 'https://merchants.dinpay.com',
                    'id' => '2000632750',
                    'key' => 'zxcvbnm8901123_890123mm',
                    'terminalId' => '',
                    'returnurl' => 'five.kang886.cn',
                ));
        } else {
            return array(1 =>
                array(
                    'typeName' => 'zf',
                    'name' => '智付',
                    'url' => 'https://merchants.dinpay.com ',
                    'id' => '2000632709',
                    'key' => 'zxcvbnm890123_890123zxcvbnm',
                    'terminalId' => '',
                    'returnurl' => 'k3.gwou.cn',
                ));

        }

//        return array(
//            1 =>
//                array(
//                    'typeName' => 'gfb',
//                    'name' => '国付宝',
//                    'url' => 'http://pay.dxdesigh.com',
//                    'id' => '0000007888',
//                    'key' => '0000000002000002725',
//                    'terminalId' => '',
//                ),
//            2 =>
//                array(
//                    'typeName' => 'hc',
//                    'name' => '汇潮腾',
//                    'url' => 'http://pay.juwen.tv',
//                    'id' => '25256',
//                    'key' => 'PtgXhOoB',
//                    'terminalId' => '',
//                ),
//            3 =>
//                array(
//                    'typeName' => 'khb',
//                    'name' => '支付3何增娣',
//                    'url' => 'http://pay.hncpqzj.cn',
//                    'id' => '2000390058',
//                    'key' => 'dj98j3idj2dhw283rjdfrig5',
//                    'terminalId' => '',
//                ),
//            4 =>
//                array(
//                    'typeName' => 'hc',
//                    'name' => '汇潮度点',
//                    'url' => 'http://pay.che911.com.cn',
//                    'id' => '24832',
//                    'key' => 'UAqUZPHa',
//                    'terminalId' => '',
//                ),
//            5 =>
//                array(
//                    'typeName' => 'khb',
//                    'name' => '陈思_快汇宝',
//                    'url' => 'http://pay.zzbxpw.cn',
//                    'id' => '2000390046',
//                    'key' => 'kjsi_9wji02_iu3k2_829jd_83y2e',
//                    'terminalId' => '',
//                ),
//            6 =>
//                array(
//                    'typeName' => 'khb',
//                    'name' => '官海艳_快汇宝',
//                    'url' => 'http://pay.zz-china.cn',
//                    'id' => '2000390047',
//                    'key' => 'JKS_9JD8k9_sj9f90_2euu27_30f8d_hjhds2',
//                    'terminalId' => '',
//                ),
//            7 =>
//                array(
//                    'typeName' => 'yeepay',
//                    'name' => '黑名单',
//                    'url' => '',
//                    'id' => '13123',
//                    'key' => '12123123213123213',
//                    'terminalId' => '',
//                ),
//            8 =>
//                array(
//                    'typeName' => 'khb',
//                    'name' => '陈永龙_快汇宝',
//                    'url' => 'http://pays.zzg1903.cn',
//                    'id' => '2000390018',
//                    'key' => 'j93u3_u3o097876y_uf87r7ru',
//                    'terminalId' => '',
//                ),
//            9 =>
//                array(
//                    'typeName' => 'khb',
//                    'name' => '',
//                    'url' => '',
//                    'id' => '',
//                    'key' => '',
//                    'terminalId' => '',
//                ),
//            10 =>
//                array(
//                    'typeName' => 'khb',
//                    'name' => '',
//                    'url' => '',
//                    'id' => '',
//                    'key' => '',
//                    'terminalId' => '',
//                ),
//            11 =>
//                array(
//                    'typeName' => 'hc',
//                    'name' => '汇潮',
//                    'url' => 'http://pay.huanggao.org.cn',
//                    'id' => '22682',
//                    'key' => 'Ji7H8l9y',
//                    'terminalId' => '',
//                ),
//            12 =>
//                array(
//                    'typeName' => 'hc',
//                    'name' => '汇潮2',
//                    'url' => 'http://pay.huanggao.org.cn',
//                    'id' => '22682',
//                    'key' => 'Ji7H8l9y',
//                    'terminalId' => '',
//                ),
//            13 =>
//                array(
//                    'typeName' => 'bf',
//                    'name' => 'XX宝付',
//                    'url' => 'pay.n6w2h.com',
//                    'id' => '427447',
//                    'key' => '569uxz8bek5uj5d3',
//                    'terminalId' => '23161',
//                ),
//        );
    }

    public static function cache_k3_baozi_odds()
    {
        if (\Cache::has('k3baoziodds')) {
            return \Cache::get('k3baoziodds');
        }

        return array(
            'jsold' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'beijin' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'anhui' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'jilin' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'jsnew' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'hubei' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'hebei' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'fjk3' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                ),
            'nmg' =>
                array(
                    '1,1,1' => '180',
                    '2,2,2' => '180',
                    '3,3,3' => '180',
                    '4,4,4' => '180',
                    '5,5,5' => '180',
                    '6,6,6' => '180',
                )
        );
    }

    public static function cache_k3_odds()
    {
        if (\Cache::has('k3odds')) {
            return \Cache::get('k3odds');
        }
        return array(
            'HZ' =>
                array(
                    3 => '180',
                    4 => '60',
                    5 => '32.5',
                    6 => '20.5',
                    7 => '12.5',
                    8 => '9.5',
                    9 => '8.5',
                    10 => '7.5',
                    11 => '7.5',
                    12 => '8.5',
                    13 => '9.5',
                    14 => '12.5',
                    15 => '20.5',
                    16 => '32.5',
                    17 => '60',
                    18 => '180',
                    19 => '1.86',
                    20 => '1.86',
                    21 => '1.86',
                    22 => '1.86',
                ),
            'TX' =>
                array(
                    '豹子' => '36.5',
                    '顺子' => '8.5',
                    '对子' => '1.7',
                    '三不同' => '1.7',
                ),
            '3THTX' =>
                array(
                    'value' => '36.5',
                    111 => '36.5',
                    222 => '36.5',
                    333 => '36.5',
                    444 => '36.5',
                    555 => '36.5',
                    666 => '36.5',
                ),
            '3THDX' =>
                array(
                    'value' => '180',
                    111 => '180',
                    222 => '180',
                    333 => '180',
                    444 => '180',
                    555 => '180',
                    666 => '180',
                ),
            '3BTH' =>
                array(
                    'value' => '32.5',
                    1 => '32.5',
                    2 => '32.5',
                    3 => '32.5',
                    4 => '32.5',
                    5 => '32.5',
                    6 => '32.5',
                ),
            '3LHTX' =>
                array(
                    'value' => '8.5',
                    123 => '8.5',
                    234 => '8.5',
                    345 => '8.5',
                    456 => '8.5',
                ),
            '2THFX' =>
                array(
                    'value' => '11.5',
                    11 => '11.5',
                    22 => '11.5',
                    33 => '11.5',
                    44 => '11.5',
                    55 => '11.5',
                    66 => '11.5',
                ),
            '2THDX' =>
                array(
                    'value' => '60',
                    11 => '60',
                    22 => '60',
                    33 => '60',
                    44 => '60',
                    55 => '60',
                    66 => '60',
                    1 => '60',
                    2 => '60',
                    3 => '60',
                    4 => '60',
                    5 => '60',
                    6 => '60',
                ),
            '2BTH' =>
                array(
                    'value' => '6.5',
                    1 => '6.5',
                    2 => '6.5',
                    3 => '6.5',
                    4 => '6.5',
                    5 => '6.5',
                    6 => '6.5',
                ),
        );
    }

    public static function cache_chipin()
    {
        if (\Cache::has('chipins')) {
            return \Cache::get('chipins');
        }
        return array(
            'HZ' =>
                array(
                    'dsdx_low' => '10',
                    'dsdx_hight' => '50000',
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            '3THTX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            '3THDX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            '3BTH' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            '3LHTX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            '2THFX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            '2THDX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            '2BTH' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
        );
    }

    public static function getByCrul($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 12); //timeout on response
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    //快三标签页
    public static function cache_lottery_type()
    {
        return array(
            9 =>
                array(
                    'typeId' => '9',
                    'name' => '和值',
                    'odds' => '90',
                    'slug' => 'HZ',
                ),
            1 =>
                array(
                    'typeId' => '1',
                    'name' => '三同号通选',
                    'odds' => '90',
                    'slug' => '3THTX',
                ),
            2 =>
                array(
                    'typeId' => '2',
                    'name' => '三同号单选',
                    'odds' => '90',
                    'slug' => '3THDX',
                ),
            3 =>
                array(
                    'typeId' => '3',
                    'name' => '三不同号',
                    'odds' => '90',
                    'slug' => '3BTH',
                ),
            4 =>
                array(
                    'typeId' => '4',
                    'name' => '三连号通选',
                    'odds' => '90',
                    'slug' => '3LHTX',
                ),
            5 =>
                array(
                    'typeId' => '5',
                    'name' => '二同号复选',
                    'odds' => '90',
                    'slug' => '2THFX',
                ),
            6 =>
                array(
                    'typeId' => '6',
                    'name' => '二同号单选',
                    'odds' => '90',
                    'slug' => '2THDX',
                ),
            7 =>
                array(
                    'typeId' => '7',
                    'name' => '二不同号',
                    'odds' => '90',
                    'slug' => '2BTH',
                ),
        );
    }

    public static function cache_lottery_type2()
    {
        return array(
            9 =>
                array(
                    'typeId' => '9',
                    'name' => '和值',
                    'odds' => '90',
                    'slug' => 'HZ',
                ),
            8 =>
                array(
                    'typeId' => '8',
                    'name' => '通选',
                    'odds' => '90',
                    'slug' => 'TX',
                ),
            /*   1 =>
              array (
                'typeId' => '1',
                'name' => '三同号通选',
                'odds' => '90',
                'slug' => '3THTX',
              ), */
            2 =>
                array(
                    'typeId' => '2',
                    'name' => '三同号单选',
                    'odds' => '90',
                    'slug' => '3THDX',
                ),
            3 =>
                array(
                    'typeId' => '3',
                    'name' => '三不同',
                    'odds' => '90',
                    'slug' => '3BTH',
                ),

            5 =>
                array(
                    'typeId' => '5',
                    'name' => '二同号复选',
                    'odds' => '90',
                    'slug' => '2THFX',
                ),
            6 =>
                array(
                    'typeId' => '6',
                    'name' => '二同号单选',
                    'odds' => '90',
                    'slug' => '2THDX',
                ),
            7 =>
                array(
                    'typeId' => '7',
                    'name' => '二不同号',
                    'odds' => '90',
                    'slug' => '2BTH',
                ),

        );
    }

    public static function cache_lottery_url()
    {
        return array(
            'anhui' => array(
                'js' => 'cll',
                'cll' => array(
                    'getAwardInfo' => 'http://www.cailele.com/static/termInfo/P163.txt?_=1411267169825',
                    'qqServerTime' => 'http://www.cailele.com/serverDate.php?type=1&tag=i0bs15ea',
                    'awardSeconds' => '260'
                ),
                'trend' => array(
                    'trendUrl' => 'http://zs.cailele.com/ahk3/baseTrend.php',
                    'title' => '安徽快3走势图',
                    'template' => 'lottery_trend_base_new'
                ),
                'times' => 80
            ),
            'jilin' => array(
                'js' => 'cll',
                'cll' => array(
                    'getAwardInfo' => 'http://www.cailele.com/static/termInfo/P159.txt?_=1411266100414',
                    'qqServerTime' => 'http://www.cailele.com/serverDate.php?type=1&tag=i0br4on8',
// 					'qqServerTime' => 'http://www.google.com',
                    'awardSeconds' => '155'
                ),
                'trend' => array(
                    'trendUrl' => 'http://zs.cailele.com/jlk3/baseTrend.php',
                    'title' => '吉林快3走势图',
                    'template' => 'lottery_trend_base_new'
                ),
                'times' => 79
            ),
            'jsold' => array(
                'js' => 'wy',
                'cll' => array(
// 				'getAwardInfo'=>'http://www.cailele.com/static/termInfo/P157.txt',
                    'qqServerTime' => 'http://www.cailele.com/serverDate.php?type=1&tag=hup43jer',
                    'getAwardInfo' => 'http://43.248.8.48/jsk3.json',
                    'awardSeconds' => '125'
                ),
                'wy' => array(
                    'qqServerTime' => 'http://caipiao.163.com/order/preBet_periodInfoTime.html?gameEn=oldkuai3&cache=1403590172160',
// 				'qqServerTime' => 'http://www.google.com',
                    'getAwardInfo' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=oldkuai3&cache=1422365420687&periodNum=1',
// 				'getAwardInfo' => 'http://caipiao.163.com/order/preBet_moreAwardNumberInfoForKuai3.html?gameId=2012112609YX00000002&cache=1403588056669',
// 				'getAwardInfo'=>'http://43.248.8.48/jsk3.json',
                    'awardSeconds' => '135'
                ),
                'trend' => array(
                    //http://www.kuai3.com/trend/jsks/ kuai3 lottery_trend_base_new
                    'trendUrl' => 'http://trend.caipiao.163.com/jskuai3/#from=kj',
                    'title' => '老快3走势图',
                    'template' => 'lottery_trend_base_guangxi'
                ),
                'times' => 82

            ),
            'hubei' => array(
                'js' => 'wy',
                'wy' => array(
                    'qqServerTime' => 'http://caipiao.163.com/order/preBet_periodInfoTime.html?gameEn=hbkuai3&cache=1411264682592',
                    'getAwardInfo' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=hbkuai3&cache=1411264846697&period=',
                    'awardSeconds' => '170'
                ),
                'trend' => array(
                    'trendUrl' => 'http://zs.cailele.com/hbk3/baseTrend.php',
                    'title' => '湖北快3走势图',
                    'template' => 'lottery_trend_base_new'
                ),
                'times' => 81
            ),
            'jsnew' => array(
                'js' => 'wy',
                'wy' => array(
                    'qqServerTime' => 'http://caipiao.163.com/order/preBet_periodInfoTime.html?gameEn=gxkuai3&cache=1411264960569',
// 						'getAwardInfo' => 'http://caipiao.163.com/order/preBet_moreAwardNumberInfoForKuai3.html?gameId=2013071801YX00000001&cache=1411264960882',
                    'getAwardInfo' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=gxkuai3&cache=1422060218880&period=',
                    'awardSeconds' => '170'
                ),
                'trend' => array(
                    'trendUrl' => 'http://zx.caipiao.163.com/trend/gxkuai3/#from=kj',
                    'title' => '广西快3走势图',
                    'template' => 'lottery_trend_base_guangxi'
                ),
                'times' => 78
            ),
            'hebei' => array(
                'js' => 'k39',
                'k39' => array(
                    'qqServerTime' => 'http://www.k3918.com/hebei/GetInfo/?d=1411566206564',
                    'getAwardInfo' => 'http://www.k3918.com/hebei/GetInfo/?d=1411566206564',
                    'awardSeconds' => '290'
                ),
                'trend' => array(
                    'trendUrl' => 'http://www.k3918.com/hebei/jbzs/1',
                    'title' => '河北快3走势图',
                    'template' => 'lottery_trend_base_new'
                ),
                'times' => 81
            ),
            'nmg' => array(
                'js' => 'wy',
                'wy' => array(
                    'qqServerTime' => 'http://caipiao.163.com/order/preBet_periodInfoTime.html?gameEn=nmgkuai3&cache=1424865175723',
                    // 						'getAwardInfo' => 'http://caipiao.163.com/order/preBet_moreAwardNumberInfoForKuai3.html?gameId=2013071801YX00000001&cache=1411264960882',
                    'getAwardInfo' => 'http://caipiao.163.com/order/preBet_moreAwardNumberInfoForKuai3.html?gameId=2015010810YX11597474&cache=1424865179399',
                    'awardSeconds' => '170'
                ),
                'trend' => array(
                    'trendUrl' => 'http://trend.caipiao.163.com/nmgkuai3/#from=kj',
                    'title' => '内蒙古快3走势图',
                    'template' => 'lottery_trend_base_guangxi'
                ),
                'times' => 81
            ),
            'newyy' => array(
                'js' => 'wy',
                'wy' => array(
                    'qqServerTime' => 'http://caipiao.163.com/order/preBet_periodInfoTime.html?gameEn=kuai3&cache=1411910483193',
                    'getAwardInfo' => 'http://caipiao.163.com/order/preBet_moreAwardNumberInfoForKuai3.html?gameId=2012112009YX00000001&cache=1411910483264',
                    'awardSeconds' => '170'
                ),
                'trend' => array(
                    'trendUrl' => 'http://zx.caispiao.163.com/trend/kuai3/#from=kj',
                    'title' => '江苏新快3走势图',
                    'template' => 'lottery_trend_base_new'
                ),
                'times' => 78
            ),
            'happy' => array(
                'js' => 'wy',
                'wy' => array(
                    'qqServerTime' => 'http://caipiao.163.com/order/preBet_periodInfoTime.html?gameEn=klc&cache=1419608748048',
                    'getAwardInfo' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=klc&cache=1419608671643&period=',
                    'awardSeconds' => '170'
                ),
                'trend' => array(
                    'trendUrl' => 'http://zx.caispiao.163.com/trend/kuai3/#from=kj',
                    'title' => '快乐彩走势图',
                    'template' => 'lottery_trend_base_new'
                ),
                'times' => 78
            )
        );
    }

    // 采集配置
    public static function cache_collection_config()
    {
        return array(
            'jsold' =>
                array(
                    'wy2' =>
                        array(
                            'js' => 'wy2',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=oldkuai3&cache=1422365420687&periodNum=1',
                            'touUrl' => '',
                            'status' => '1',
                            'priority' => 2,
                            'kjTime' => 120,
                            'fdTime' => 110,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/k3js/?r_a=m6Nnyq',
                            'kjTime' => 120,
                            'fdTime' => 120,
                            'status' => '1',
                            'priority' => 3,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/k3/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 1,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'jsnew' =>
                array(
                    'wy2' =>
                        array(
                            'js' => 'wy2',
                            'status' => '1',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=gxkuai3&cache=1422365420687&periodNum=1',
                            //       'url' => 'http://trend.caipiao.163.com/gxkuai3/',
                            'touUrl' => 'http://caipiao.163.com/order/gxkuai3/',
                            'kjTime' => 170,
                            'fdTime' => 140,
                            'priority' => 3,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/k3gx/?r_a=vU7Ffy',
                            'status' => '1',
                            'kjTime' => 150,
                            'fdTime' => 120,
                            'priority' => 2,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                ),
            'anhui' =>
                array(
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/ahk3/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 1,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/ahkuai3/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=ahkuai3&cache=1422365420687&periodNum=1',
                            'touUrl' => 'http://caipiao.163.com/order/ahkuai3/',
                            'kjTime' => 100,
                            'status' => '1',
                            'priority' => 2,
                            'fdTime' => 90,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                ),
            'jilin' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/kuai3/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=kuai3&cache=1422365420687&periodNum=1',
                            'touUrl' => '',
                            'kjTime' => 100,
                            'status' => '1',
                            'priority' => 2,
                            'fdTime' => 90,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/k3jl/?r_a=bIJfMr',
                            'kjTime' => 100,
                            'fdTime' => 90,
                            'status' => '1',
                            'priority' => 2,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/jlk3/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 1,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),

                ),
            'hubei' =>
                array(
                    'wy2' =>
                        array(
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=hbkuai3&cache=1422365420687&periodNum=1',
                            'touUrl' => 'http://caipiao.163.com/order/hbkuai3/',
                            'kjTime' => 100,
                            'fdTime' => 90,
                            'priority' => 1,
                            'status' => '1',
                            /* 'rule' =>
                            array (
                              'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                              'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                            ) */
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/k3hb/?r_a=EnYb6b',
                            'kjTime' => 100,
                            'fdTime' => 90,
                            'status' => '1',
                            'priority' => 2,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/hbk3/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 1,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'hebei' =>
                array(
                    /* 'icaile' =>
                    array (
                      'url' => 'http://pub.icaile.com/hebk3kjjg.php',
                      'kjTime' => 150,
                      'fdTime' => 120,
                      'status' => '0',
                      'priority' => 1,
                      'rule' =>
                      array (
                        'preTerm' => '<th class="last-child">合值</th></tr><tr><td class="nth-child-1">(.*?)</td><td class="nth-child-2">',
                        'preOpenResult' => '<td class="nth-child-3"><em class="ball">(.*?)</em><em class="ball">(.*?)</em><em class="ball">(.*?)</em></td>',
                      ),
                    ), */
                    'k39' =>
                        array(
                            'url' => 'http://www.k3918.com/hebei/GetInfo/?d=1411566206564',
                            'status' => '1',
                            'priority' => 1,
                        )
                ),
            'nmg' =>
                array(
                    'wy2' =>
                        array(
//       'url' => 'http://trend.caipiao.163.com/nmgkuai3/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=nmgkuai3&cache=1422365420687&periodNum=1',
                            'touUrl' => 'http://caipiao.163.com/order/nmgkuai3/',
                            'kjTime' => 150,
                            'fdTime' => 60,
                            'status' => '1',
                            'priority' => 2,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/nmgk3/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 1,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),

                ),
            'fjk3' =>
                array(
                    'fj' => array(
                        'url' => 'www.fjcp.cn/k3djs.aspx',
                        'status' => '1',
                        'priority' => 1,
                    )
                ),
            'beijin' =>
                array(
                    'beijin' =>
                        array(
                            'url' => 'http://www.bwlc.gov.cn/xml/award_18.xml',
                            'touUrl' => 'http://www.bwlc.gov.cn/buy/qck3/',
                            'status' => '1',
                            'kjTime' => 100,
                            'fdTime' => 45,
                            'priority' => 1,
                            'rule' =>
                                array(
                                    'preTerm' => '<p id="(.*?)"',
                                    'preOpenResult' => '<p id="__preTerm__" c="(.*?)"',
                                ),
                        ),
                ),
            'sdfive' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/11xuan5/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=d11&cache=1422365420687&periodNum=1',
                            'touUrl' => 'http://caipiao.163.com/order/11xuan5/',
                            'status' => '1',
                            'kjTime' => 90,
                            'priority' => 1,
                            'fdTime' => 30,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/yun11/?menu&r_a=n6vEfy',
                            'status' => '1',
                            'kjTime' => 90,
                            'fdTime' => 80,
                            'priority' => 2,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/11yun/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 3,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'gdfive' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/gd11xuan5/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=gdd11&cache=1422365420687&periodNum=1',
                            'status' => '1',
                            'kjTime' => 70,
                            'fdTime' => 60,
                            'priority' => 1,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/gd11/?menu&r_a=Ynq6Zf',
                            'status' => '1',
                            'kjTime' => 70,
                            'fdTime' => 60,
                            'priority' => 2,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/gd11x5/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 0,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'jxfive' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/jx11xuan5/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=jxd11&cache=1422365420687&periodNum=1',
                            'status' => '1',
                            'kjTime' => 70,
                            'fdTime' => 60,
                            'priority' => 0,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/dlcjx/?menu&r_a=VBBJfy',
                            'status' => '1',
                            'kjTime' => 70,
                            'fdTime' => 60,
                            'priority' => 2,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),

                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/jxdlc/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 0,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),

                ),
            'liaoningfive' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/ln11xuan5/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=lnd11&cache=1422365420687&periodNum=1',
                            'touUrl' => 'http://caipiao.163.com/order/ln11xuan5/',
                            'priority' => 1,
                            'status' => '1',
                            'kjTime' => 100,
                            'fdTime' => 92,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/ln11/?menu&r_a=FzimMf',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 2,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/ln11x5/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 0,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'zjfive' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/zj11xuan5/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=zjd11&cache=1422365420687&periodNum=1',
                            'touUrl' => 'http://caipiao.163.com/order/zj11xuan5/',
                            'status' => '1',
                            'priority' => 0,
                            'kjTime' => 100,
                            'fdTime' => 90,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                ),
            'shfive' =>
                array(
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/sh11/?menu&r_a=NrMbim',
                            'status' => '1',
                            'priority' => 1,
                            'kjTime' => 100,
                            'fdTime' => 90,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/sh11x5/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 2,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'hljfive' =>
                array(
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/hlj11x5/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 0,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/hlj11/?menu&r_a=nymaM3',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 2,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/hlj11xuan5/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=hljd11&cache=1422365420687&periodNum=1',
                            'touUrl' => 'http://caipiao.163.com/order/hlj11xuan5/#from=leftnav',
                            'status' => '1',
                            'touUrl' => '',
                            'kjTime' => 70,
                            'priority' => 1,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                ),
            'jsfive' =>
                array(
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/js11x5/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 0,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        )
                ),
            'cqfive' =>
                array(
                    'wy' =>
                        array(
                            'url' => 'http://trend.caipiao.163.com/cq11xuan5/',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 2,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)"><td>__preTerm__</td>',
                                ),
                        ),
                    /*     'lecai' =>
                        array (
                          'url' => 'http://baidu.lecai.com/lottery/draw/view/558',
                          'status' => '1',
                          'kjTime' => 90,
                          'priority' => 1,
                          'fdTime' => 80,
                          'rule' =>
                          array (
                            'preTerm' => 'var latest_draw_phase=\'(.*?)\';var latest_draw_time',
                            'preOpenResult' => 'var latest_draw_result={"red":["(.*?)","(.*?)","(.*?)","(.*?)","(.*?)"],"blue":[],"310":[],"extra":[],"normal":[]};var latest_draw_phase=',
                          ),
                        ), */
                ),
            'happy' =>
                array(
                    'sc' =>
                        array(
                            'url' => 'http://www.scflcp.com/kl12Index.do',
                            'status' => '1',
                            'kjTime' => 150,
                            'fdTime' => 120,
                            'priority' => 0,
                            'rule' =>
                                array(
                                    'preTerm' => '<tr><td>	期号	</td><td>	开奖号码	</td></tr><tr><td>(.*?)</td><td>',
                                    'preOpenResult' => '<tr><td>	期号	</td><td>	开奖号码	</td></tr><tr><td>__preTerm__</td><td>(.*?)</td>',
                                ),
                        ),
                ),
            'le' =>
                array(
                    'js' => 'sc',
                    'sc' =>
                        array(
                            'url' => 'http://www.scflcp.com/kl12Index.do',
                            'status' => '1',
                            'kjTime' => 150,
                            'priority' => 0,
                            'fdTime' => 120,
                            'rule' =>
                                array(
                                    'preTerm' => '<tr><td>	期号	</td><td>	开奖号码	</td></tr><tr><td>(.*?)</td><td>',
                                    'preOpenResult' => '<tr><td>	期号	</td><td>	开奖号码	</td></tr><tr><td>__preTerm__</td><td>(.*?)</td>',
                                ),
                        ),
                ),
            'che' =>
                array(
                    'beijin' =>
                        array(
                            'url' => 'http://www.bwlc.gov.cn/bulletin/prevtrax.html',
                            'status' => '1',
                            'touUrl' => '',
                            'priority' => 1,
                            'kjTime' => 50,
                            'fdTime' => 45,
                            'rule' =>
                                array(
                                    'preTerm' => '<th width="30%">开奖公告</th></tr><tr class=""><td>(.*?)</td>',
                                    'preOpenResult' => '<th width="30%">开奖公告</th></tr><tr class=""><td>__preTerm__</td><td>(.*?)</td>',
                                ),
                        ),
                    'pk10' =>
                        array(
                            'url' => 'http://www.1396b.com/Pk10/ajax?ajaxhandler=GetNewestRecord&t=0.3923507153522223',
                            'status' => '1',
                            'priority' => 0,
                            'rule' =>
                                array(
                                    'preTerm' => 'period":(.*?),"drawingTime',
                                    'preOpenResult' => 'numbers":"(.*?)","guanyahe"',
                                ),
                        )
                ),
            'poker' =>
                array(
                    'wy2' =>
                        array(
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=klpk&cache=1430737812492&periodNum=5',
                            'status' => '1',
                            'priority' => 1,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/sdklpk3/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 2,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'cqssc' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/cqssc/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=ssc&cache=1422365420687&periodNum=1',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 0,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)">',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/ssccq/?menu&r_a=yaaMbm',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 1,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    /*   	'cll' =>
                              array (
                                      'url' => 'http://www.cailele.com/static/ssc/newlyopenlist.xml',
                                      'status' => '1',
                                      'priority' => 2,
                                      'touUrl' => '',
                                      'kjTime' => 150,
                                      'fdTime' => 120,
                              ), */
                ),
            'jxssc' =>
                array(
                    'wy2' =>
                        array(
                            //       'url' => 'http://trend.caipiao.163.com/jxssc/',
                            'url' => 'http://caipiao.163.com/award/getAwardNumberInfo.html?gameEn=jxssc&cache=1422365420687&periodNum=1',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 0,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => 'var endPeriod="(.*?)";var breakPeriods',
                                    'preOpenResult' => '<tr data-period="__preTerm__" data-award="(.*?)">',
                                ),
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/sscjx/?menu&r_a=eMj6Nj',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 1,
                            'fdTime' => 60,
                            'rule' =>
                                array(
                                    'preTerm' => '<em class="red" id="open_issue">(.*?)</em> 期 开奖</h3><div class="ball-num clearfix">',
                                    'preOpenResult' => '<ul id="open_code_list"><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li><li class="ico-ball3">(.*?)</li></ul>',
                                ),
                        ),
                    'cll' =>
                        array(
                            'url' => 'http://www.cailele.com/static/jxssc/newlyopenlist.xml',
                            'status' => '1',
                            'priority' => 2,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),

            'xjssc' =>
                array(

                    'xjflcp' =>
                        array(
                            'url' => 'http://www.xjflcp.com/servlet/queryLotteryDraw?game=SSC&num=1',
                            'status' => '1',
                            'priority' => 2,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                ),
            'tjssc' =>
                array(

                    'tjflcp' =>
                        array(
                            'url' => 'http://www.tjflcpw.com/report/SSC_WinMessage.aspx',
                            'status' => '1',
                            'priority' => 2,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        )
                ),

        );
    }

    // lottery基本信息
    public static function cache_lottery_status()
    {
        return array(
            '6he' =>
                array(
                    'name' => '香港六合彩',
                    'lotterytype' => '6he',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '10:00',
                    'endTime' => '21:30',
                    'num' => 1,
                    'kjTime' => 60,
                ),
            'jsold' =>
                array(
                    'name' => '江苏快3',
                    'lotterytype' => 'jsold',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:31',
                    'endTime' => '22:10',
                    'num' => 82,
                    'kjTime' => 60,
                ),
            'jsnew' =>
                array(
                    'name' => '广西快3',
                    'lotterytype' => 'jsnew',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:28',
                    'endTime' => '22:28',
                    'num' => 78,
                    'kjTime' => 150,
                ),
            'jilin' =>
                array(
                    'name' => '吉林快3',
                    'lotterytype' => 'jilin',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:23',
                    'endTime' => '21:20',
                    'num' => 79,
                    'kjTime' => 120,
                ),
            'anhui' =>
                array(
                    'name' => '安徽快3',
                    'lotterytype' => 'anhui',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:40',
                    'endTime' => '22:00',
                    'num' => 80,
                    'kjTime' => 150,
                ),
            'hubei' =>
                array(
                    'name' => '湖北快3',
                    'lotterytype' => 'hubei',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:00',
                    'endTime' => '22:00',
                    'num' => 78,
                    'kjTime' => 150,
                ),
            'hebei' =>
                array(
                    'name' => '河北快3',
                    'lotterytype' => 'hebei',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:30',
                    'endTime' => '22:00',
                    'num' => 81,
                    'kjTime' => 150,
                ),
            'poker' =>
                array(
                    'name' => '快乐扑克',
                    'lotterytype' => 'poker',
                    'status' => '1',
                    'kjType' => '0',
                    'fdTime' => 120,
                    'beginTime' => '8:50',
                    'endTime' => '22:00',
                    'num' => 79,
                    'kjTime' => 150,
                ),
            'sdfive' =>
                array(
                    'name' => '山东11选5',
                    'lotterytype' => 'sdfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:55',
                    'endTime' => '21:55',
                    'num' => 78,
                    'kjTime' => 150,
                ),
            'jxfive' =>
                array(
                    'name' => '江西11选5',
                    'lotterytype' => 'jxfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:00',
                    'endTime' => '22:00',
                    'num' => 78,
                    'kjTime' => 150,
                ),
            'gdfive' =>
                array(
                    'name' => '广东11选5',
                    'lotterytype' => 'gdfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:00',
                    'endTime' => '23:00',
                    'num' => 84,
                    'kjTime' => 150,
                ),
            'liaoningfive' =>
                array(
                    'name' => '辽宁11选5',
                    'lotterytype' => 'liaoningfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:38',
                    'endTime' => '22:28',
                    'num' => 83,
                    'kjTime' => 150,
                ),
            'shfive' =>
                array(
                    'name' => '上海11选5',
                    'lotterytype' => 'shfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:50',
                    'endTime' => '23:50',
                    'num' => 90,
                    'kjTime' => 150,
                ),
            'hljfive' =>
                array(
                    'name' => '黑龙江11选5',
                    'lotterytype' => 'hljfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:55',
                    'endTime' => '22:05',
                    'num' => 79,
                    'kjTime' => 150,
                ),
            'zjfive' =>
                array(
                    'name' => '浙江11选5',
                    'lotterytype' => 'zjfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:40',
                    'endTime' => '22:00',
                    'num' => 80,
                    'kjTime' => 150,
                ),
            'jsfive' =>
                array(
                    'name' => '江苏11选5',
                    'lotterytype' => 'jsfive',
                    'status' => '-1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:26',
                    'endTime' => '22:06',
                    'num' => 82,
                    'kjTime' => 150,
                ),
            'cqfive' =>
                array(
                    'name' => '重庆11选5',
                    'lotterytype' => 'cqfive',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '8:50',
                    'endTime' => '23:00',
                    'num' => 85,
                    'kjTime' => 150,
                ),
            'happy' =>
                array(
                    'name' => '快乐彩趣味玩法',
                    'lotterytype' => 'happy',
                    'status' => '-1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:00',
                    'endTime' => '22:00',
                    'num' => 78,
                    'kjTime' => 150,
                ),
            'le' =>
                array(
                    'name' => '快乐彩',
                    'lotterytype' => 'le',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:00',
                    'endTime' => '22:00',
                    'num' => 78,
                    'kjTime' => 150,
                ),
            'nmg' =>
                array(
                    'name' => '内蒙古快3',
                    'lotterytype' => 'nmg',
                    'status' => '1',
                    'kjType' => '0',
                    'fdTime' => 120,
                    'beginTime' => '9:35',
                    'endTime' => '22:05',
                    'num' => 73,
                    'kjTime' => 150,
                ),
            'che' =>
                array(
                    'name' => '北京pk10',
                    'lotterytype' => 'che',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 45,
                    'beginTime' => '9:02',
                    'endTime' => '23:55',
                    'num' => 179,
                    'kjTime' => 60,
                ),
            'beijin' =>
                array(
                    'name' => '北京快3',
                    'lotterytype' => 'beijin',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:00',
                    'endTime' => '23:55',
                    'num' => 89,
                    'kjTime' => 150,
                ),
            'cqssc' =>
                array(
                    'name' => '重庆时时彩',
                    'lotterytype' => 'cqssc',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '00:00',
                    'endTime' => '02:00',
                    'num' => 120,
                    'kjTime' => 150,
                ),
            'jxssc' =>
                array(
                    'name' => '江西时时彩',
                    'lotterytype' => 'jxssc',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:12',
                    'endTime' => '23:10',
                    'num' => 84,
                    'kjTime' => 150,
                ),
            'fjk3' =>
                array(
                    'name' => '福建快3',
                    'lotterytype' => 'fjk3',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:07',
                    'endTime' => '23:10',
                    'num' => 78,
                    'kjTime' => 150,
                ),
            'xjssc' =>
                array(
                    'name' => '新疆时时彩',
                    'lotterytype' => 'xjssc',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '10:00',
                    'endTime' => '23:10',
                    'num' => 96,
                    'kjTime' => 150,
                ),
            'tjssc' =>
                array(
                    'name' => '天津时时彩',
                    'lotterytype' => 'tjssc',
                    'status' => '1',
                    'kjType' => '1',
                    'fdTime' => 120,
                    'beginTime' => '9:00',
                    'endTime' => '22:00',
                    'num' => 84,
                    'kjTime' => 150,
                )
        );
    }

    public static function cache_lottery_type_slug()
    {
        return array(
            'HZ' =>
                array(
                    'typeId' => '9',
                    'name' => '和值',
                    'odds' => '90',
                    'slug' => 'HZ',
                ),
            'DZ' =>
                array(
                    'typeId' => '10',
                    'name' => '对子包选',
                    'odds' => '90',
                    'slug' => 'DZ',
                ),
            '3THTX' =>
                array(
                    'typeId' => '1',
                    'name' => '三同号通选',
                    'odds' => '90',
                    'slug' => '3THTX',
                ),
            '3THDX' =>
                array(
                    'typeId' => '2',
                    'name' => '三同号单选',
                    'odds' => '90',
                    'slug' => '3THDX',
                ),
            '3BTH' =>
                array(
                    'typeId' => '3',
                    'name' => '三不同号',
                    'odds' => '90',
                    'slug' => '3BTH',
                ),
            '3LHTX' =>
                array(
                    'typeId' => '4',
                    'name' => '三连号通选',
                    'odds' => '90',
                    'slug' => '3LHTX',
                ),
            '2THFX' =>
                array(
                    'typeId' => '5',
                    'name' => '二同号复选',
                    'odds' => '90',
                    'slug' => '2THFX',
                ),
            '2THDX' =>
                array(
                    'typeId' => '6',
                    'name' => '二同号单选',
                    'odds' => '90',
                    'slug' => '2THDX',
                ),
            '2BTH' =>
                array(
                    'typeId' => '7',
                    'name' => '二不同号',
                    'odds' => '90',
                    'slug' => '2BTH',
                ),
            'TX' =>
                array(
                    'typeId' => '8',
                    'name' => '通选',
                    'odds' => '90',
                    'slug' => 'TX',
                )
        );
    }

    public static function cache_user_returns()
    {
        if (\Cache::has('userreturns')) {
            return \Cache::get('userreturns');
        }
        return array(
            1 =>
                array(
                    'min' => '500',
                    'max' => '10000',
                    'rate' => '0.01',
                ),
            2 =>
                array(
                    'min' => '10001',
                    'max' => '100000',
                    'rate' => '0.012',
                ),
            3 =>
                array(
                    'min' => '100001',
                    'max' => '500000',
                    'rate' => '0.015',
                ),
            4 =>
                array(
                    'min' => '500001',
                    'max' => '1000000',
                    'rate' => '0.018',
                ),
            5 =>
                array(
                    'min' => '1000001',
                    'max' => '100000000',
                    'rate' => '0.02',
                ),
        );
    }

    // 11选5
    public static function cache_five_type_slug()
    {
        return array(
            'HZ' =>
                array(
                    'typeId' => '12',
                    'name' => '和值',
                    'odds' => '90',
                    'slug' => 'HZ',
                ),
            'RX1' => array(
                'typeId' => '6',
                'name' => '任选一',
                'odds' => '90',
                'slug' => 'RX1'
            ),
            'RX2' => array(
                'typeId' => '7',
                'name' => '任选二',
                'odds' => '90',
                'slug' => 'RX2'
            ),
            'RX3' => array(
                'typeId' => '8',
                'name' => '任选三',
                'odds' => '90',
                'slug' => 'RX3'
            ),
            'RX4' => array(
                'typeId' => '9',
                'name' => '任选四',
                'odds' => '90',
                'slug' => 'RX4'
            ),
            'RX5' => array(
                'typeId' => '10',
                'name' => '任选五',
                'odds' => '90',
                'slug' => 'RX5'
            ),
            'RX6' => array(
                'typeId' => '11',
                'name' => '任选六',
                'odds' => '90',
                'slug' => 'RX6'
            ),
            'RX7' => array(
                'typeId' => '13',
                'name' => '任选七',
                'odds' => '90',
                'slug' => 'RX7'
            ),
            'RX8' => array(
                'typeId' => '14',
                'name' => '任选八',
                'odds' => '90',
                'slug' => 'RX8'
            ),
            'QY' => array(
                'typeId' => '15',
                'name' => '前一',
                'odds' => '90',
                'slug' => 'QY'
            ),
            'QEZU' => array(
                'typeId' => '16',
                'name' => '前二组选',
                'odds' => '90',
                'slug' => 'QEZU'
            ),
            'QSZU' => array(
                'typeId' => '17',
                'name' => '前三组选',
                'odds' => '90',
                'slug' => 'QSZU'
            ),
            'QEZHI' => array(
                'typeId' => '18',
                'name' => '前二直选',
                'odds' => '90',
                'slug' => 'QEZHI'
            ),

            'QSZHI' => array(
                'typeId' => '19',
                'name' => '前三直选',
                'odds' => '90',
                'slug' => 'QSZHI'
            )
        );
    }

    public static function cache_five_odds()
    {
        if (\Cache::has('fiveodds')) {
            return \Cache::get('fiveodds');
        }
        return array(
            'HZ' =>
                array(
                    15 => '385',
                    16 => '385',
                    17 => '193',
                    18 => '127',
                    19 => '77',
                    20 => '55',
                    21 => '39',
                    22 => '32',
                    23 => '23',
                    24 => '20',
                    25 => '17',
                    26 => '16',
                    27 => '14',
                    28 => '13',
                    29 => '11',
                    30 => '11',
                    31 => '11',
                    32 => '13',
                    33 => '14',
                    34 => '16',
                    35 => '17',
                    36 => '20',
                    37 => '23',
                    38 => '32',
                    39 => '39',
                    40 => '55',
                    41 => '77',
                    42 => '127',
                    43 => '193',
                    44 => '385',
                    45 => '385',
                    'dan' => '1.80',
                    'shuang' => '1.85',
                    'xiao' => '1.85',
                    'da' => '1.8',
                    'qdan' => '1.75',
                    'qshuang' => '1.88',
                    'qxiao' => '1.88',
                    'qda' => '1.75',
                ),
            'RX1' =>
                array(
                    'value' => '1.95',
                    '01' => '1.95',
                    '02' => '1.95',
                    '03' => '1.95',
                    '04' => '1.95',
                    '05' => '1.95',
                    '06' => '1.95',
                    '07' => '1.95',
                    '08' => '1.95',
                    '09' => '1.95',
                    10 => '1.95',
                    11 => '1.95',
                ),
            'RX2' =>
                array(
                    'value' => '4.5',
                    '01' => '4.5',
                    '02' => '4.5',
                    '03' => '4.5',
                    '04' => '4.5',
                    '05' => '4.5',
                    '06' => '4.5',
                    '07' => '4.5',
                    '08' => '4.5',
                    '09' => '4.5',
                    10 => '4.5',
                    11 => '4.5',
                ),
            'RX3' =>
                array(
                    'value' => '13',
                    '01' => '13',
                    '02' => '13',
                    '03' => '13',
                    '04' => '13',
                    '05' => '13',
                    '06' => '13',
                    '07' => '13',
                    '08' => '13',
                    '09' => '13',
                    10 => '13',
                    11 => '13',
                ),
            'RX4' =>
                array(
                    'value' => '52',
                    '01' => '52',
                    '02' => '52',
                    '03' => '52',
                    '04' => '52',
                    '05' => '52',
                    '06' => '52',
                    '07' => '52',
                    '08' => '52',
                    '09' => '52',
                    10 => '52',
                    11 => '52',
                ),
            'RX5' =>
                array(
                    'value' => '390',
                    '01' => '390',
                    '02' => '390',
                    '03' => '390',
                    '04' => '390',
                    '05' => '390',
                    '06' => '390',
                    '07' => '390',
                    '08' => '390',
                    '09' => '390',
                    10 => '390',
                    11 => '390',
                ),
            'RX6' =>
                array(
                    'value' => '64',
                    '01' => '64',
                    '02' => '64',
                    '03' => '64',
                    '04' => '64',
                    '05' => '64',
                    '06' => '64',
                    '07' => '64',
                    '08' => '64',
                    '09' => '64',
                    10 => '64',
                    11 => '64',
                ),
            'RX7' =>
                array(
                    'value' => '17',
                    '01' => '17',
                    '02' => '17',
                    '03' => '17',
                    '04' => '17',
                    '05' => '17',
                    '06' => '17',
                    '07' => '17',
                    '08' => '17',
                    '09' => '17',
                    10 => '17',
                    11 => '17',
                ),
            'RX8' =>
                array(
                    'value' => '6',
                    '01' => '6',
                    '02' => '6',
                    '03' => '6',
                    '04' => '6',
                    '05' => '6',
                    '06' => '6',
                    '07' => '6',
                    '08' => '6',
                    '09' => '6',
                    10 => '6',
                    11 => '6',
                ),
//            'QE' =>
//                array(
//                    'value' => '',
//                    '01' => '',
//                    '02' => '',
//                    '03' => '',
//                    '04' => '',
//                    '05' => '',
//                    '06' => '',
//                    '07' => '',
//                    '08' => '',
//                    '09' => '',
//                    10 => '',
//                    11 => '',
//                ),
            'QY' =>
                array(
                    'value' => '9',
                    '01' => '9',
                    '02' => '9',
                    '03' => '9',
                    '04' => '9',
                    '05' => '9',
                    '06' => '9',
                    '07' => '9',
                    '08' => '9',
                    '09' => '9',
                    10 => '9',
                    11 => '9',
                ),
            'QEZHI' =>
                array(
                    'value' => '90',
                    '01' => '90',
                    '02' => '90',
                    '03' => '90',
                    '04' => '90',
                    '05' => '90',
                    '06' => '90',
                    '07' => '90',
                    '08' => '90',
                    '09' => '90',
                    10 => '90',
                    11 => '90',
                ),
            'QEZU' =>
                array(
                    'value' => '45',
                    '01' => '45',
                    '02' => '45',
                    '03' => '45',
                    '04' => '45',
                    '05' => '45',
                    '06' => '45',
                    '07' => '45',
                    '08' => '45',
                    '09' => '45',
                    10 => '45',
                    11 => '45',
                ),
            'QSZHI' =>
                array(
                    'value' => '840',
                    '01' => '840',
                    '02' => '840',
                    '03' => '840',
                    '04' => '840',
                    '05' => '840',
                    '06' => '840',
                    '07' => '840',
                    '08' => '840',
                    '09' => '840',
                    10 => '840',
                    11 => '840',
                ),
            'QSZU' =>
                array(
                    'value' => '140',
                    '01' => '140',
                    '02' => '140',
                    '03' => '140',
                    '04' => '140',
                    '05' => '140',
                    '06' => '140',
                    '07' => '140',
                    '08' => '140',
                    '09' => '140',
                    10 => '140',
                    11 => '140',
                ),
        );
    }

    public static function cache_five_types()
    {
        return array(
            12 => array(
                'typeId' => '12',
                'name' => '和值',
                'odds' => '90',
                'slug' => 'HZ'
            ),
            6 => array(
                'typeId' => '6',
                'name' => '任选一',
                'odds' => '90',
                'slug' => 'RX1'
            ),
            7 => array(
                'typeId' => '7',
                'name' => '任选二',
                'odds' => '90',
                'slug' => 'RX2'
            ),
            8 => array(
                'typeId' => '8',
                'name' => '任选三',
                'odds' => '90',
                'slug' => 'RX3'
            ),
            9 => array(
                'typeId' => '9',
                'name' => '任选四',
                'odds' => '90',
                'slug' => 'RX4'
            ),
            10 => array(
                'typeId' => '10',
                'name' => '任选五',
                'odds' => '90',
                'slug' => 'RX5'
            ),
            11 => array(
                'typeId' => '11',
                'name' => '任选六',
                'odds' => '90',
                'slug' => 'RX6'
            ),
            13 => array(
                'typeId' => '13',
                'name' => '任选七',
                'odds' => '90',
                'slug' => 'RX7'
            ),
            14 => array(
                'typeId' => '14',
                'name' => '任选八',
                'odds' => '90',
                'slug' => 'RX8'
            ),
            15 => array(
                'typeId' => '15',
                'name' => '前一',
                'odds' => '90',
                'slug' => 'QY'
            ),
            16 => array(
                'typeId' => '16',
                'name' => '前二组选',
                'odds' => '90',
                'slug' => 'QEZU'
            ),
            17 => array(
                'typeId' => '17',
                'name' => '前三组选',
                'odds' => '90',
                'slug' => 'QSZU'
            ),
            18 => array(
                'typeId' => '18',
                'name' => '前二直选',
                'odds' => '90',
                'slug' => 'QEZHI'
            ),
            19 => array(
                'typeId' => '19',
                'name' => '前三直选',
                'odds' => '90',
                'slug' => 'QSZHI'
            )
        );
    }

    public static function cache_five_chipins()
    {
        if (\Cache::has('fivechipins')) {
            return \Cache::get('fivechipins');
        }
        return array(
            'HZ' =>
                array(
                    'other_low' => '',
                    'other_hight' => '',
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX1' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX2' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX3' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX4' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX5' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX6' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX7' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'RX8' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'QE' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'QY' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'QEZHI' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'QEZU' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'QSZHI' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'QSZU' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
        );
    }

    //---------------------------------时时彩
    public static function cache_ssc_type_slug()
    {
        return array(
            'TABSXZHIX_QSZHIX' =>
                array(
                    'typeId' => '1',
                    'name' => '前三直选',
                ),
            'TABSXZHIX_ZSZHIX' =>
                array(
                    'typeId' => '2',
                    'name' => '中三直选',
                ),
            'TABSXZHIX_HSZHIX' =>
                array(
                    'typeId' => '3',
                    'name' => '后三直选',
                ),
            'TABSXZUX_QSZUX' =>
                array(
                    'typeId' => '4',
                    'name' => '前三组三',
                ),
            'TABSXZUX_ZSZUX' =>
                array(
                    'typeId' => '5',
                    'name' => '中三组三',
                ),
            'TABSXZUX_HSZUX' =>
                array(
                    'typeId' => '6',
                    'name' => '后三组三',
                ),
            'TABSXZUX_QSZUL' =>
                array(
                    'typeId' => '7',
                    'name' => '前三组六',
                ),
            'TABSXZUX_ZSZUL' =>
                array(
                    'typeId' => '8',
                    'name' => '中三组六',
                ),
            'TABSXZUX_HSZUL' =>
                array(
                    'typeId' => '9',
                    'name' => '后三组六',
                ),
            'TABSXZUX_ZUSZHIX' =>
                array(
                    'typeId' => '10',
                    'name' => '组三直选',
                ),
            'TABHZ_SXHZ' =>
                array(
                    'typeId' => '11',
                    'name' => '三星和值',
                ),
            'TABHZ_SWHZ' =>
                array(
                    'typeId' => '12',
                    'name' => '首尾和值',
                ),
            'TABHZ_EXHZ' =>
                array(
                    'typeId' => '13',
                    'name' => '二星和值',
                ),
            'TABEX_QEZHIX' =>
                array(
                    'typeId' => '14',
                    'name' => '前二直选',
                ),
            'TABEX_HEZHIX' =>
                array(
                    'typeId' => '15',
                    'name' => '后二直选',
                ),
            'TABEX_QEZUE' =>
                array(
                    'typeId' => '16',
                    'name' => '前二组二',
                ),
            'TABEX_HEZUE' =>
                array(
                    'typeId' => '17',
                    'name' => '后二组二',
                ),
            'TABWX_WXZHIX' =>
                array(
                    'typeId' => '18',
                    'name' => '五星直选',
                ),
            'TABWX_WXTX' =>
                array(
                    'typeId' => '19',
                    'name' => '五星通选',
                ),
            'TABNN_NN' =>
                array(
                    'typeId' => '20',
                    'name' => '牛牛玩法',
                ),

            'TABDW_YI' =>
                array(
                    'typeId' => '21',
                    'name' => '第一位',
                ),
            'TABDW_ER' =>
                array(
                    'typeId' => '22',
                    'name' => '第二位',
                ),
            'TABDW_SAN' =>
                array(
                    'typeId' => '23',
                    'name' => '第三位',
                ),
            'TABDW_SI' =>
                array(
                    'typeId' => '24',
                    'name' => '第四位',
                ),
            'TABDW_WU' =>
                array(
                    'typeId' => '25',
                    'name' => '第五位',
                ),
        );
    }

    public static function cache_ssc_chipins()
    {
        if (\Cache::has('sscchipins')) {
            return \Cache::get('sscchipins');
        }
        return array(
            'TABSXZHIX_QSZHIX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZHIX_ZSZHIX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZHIX_HSZHIX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZUX_QSZUX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZUX_ZSZUX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZUX_HSZUX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZUX_QSZUL' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZUX_ZSZUL' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZUX_HSZUL' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABSXZUX_ZUSZHIX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABHZ_SXHZ' =>
                array(
                    'other_low' => '',
                    'other_hight' => '',
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABHZ_SWHZ' =>
                array(
                    'other_low' => '',
                    'other_hight' => '',
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABHZ_EXHZ' =>
                array(
                    'other_low' => '',
                    'other_hight' => '',
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABEX_QEZHIX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABEX_HEZHIX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABEX_QEZUE' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABEX_HEZUE' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABWX_WXZHIX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABWX_WXTX' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABNN_NN' =>
                array(
                    'other_low' => '',
                    'other_hight' => '',
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABDW_YI' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABDW_ER' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABDW_SAN' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABDW_SI' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TABDW_WU' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
        );
    }

    public static function cache_ssc_odds()
    {
        if (\Cache::has('sscodds')) {
            return \Cache::get('sscodds');
        }
        return array(
            'TABSXZHIX_QSZHIX' =>
                array(
                    'value' => '900',
                    0 => '900',
                    1 => '900',
                    2 => '900',
                    3 => '900',
                    4 => '900',
                    5 => '900',
                    6 => '900',
                    7 => '900',
                    8 => '900',
                    9 => '900',
                ),
            'TABSXZHIX_ZSZHIX' =>
                array(
                    'value' => '900',
                    0 => '900',
                    1 => '900',
                    2 => '900',
                    3 => '900',
                    4 => '900',
                    5 => '900',
                    6 => '900',
                    7 => '900',
                    8 => '900',
                    9 => '900',
                ),
            'TABSXZHIX_HSZHIX' =>
                array(
                    'value' => '900',
                    0 => '900',
                    1 => '900',
                    2 => '900',
                    3 => '900',
                    4 => '900',
                    5 => '900',
                    6 => '900',
                    7 => '900',
                    8 => '900',
                    9 => '900',
                ),
            'TABSXZUX_QSZUX' =>
                array(
                    'value' => '150',
                    0 => '150',
                    1 => '150',
                    2 => '150',
                    3 => '150',
                    4 => '150',
                    5 => '150',
                    6 => '150',
                    7 => '150',
                    8 => '150',
                    9 => '150',
                ),
            'TABSXZUX_ZSZUX' =>
                array(
                    'value' => '150',
                    0 => '150',
                    1 => '150',
                    2 => '150',
                    3 => '150',
                    4 => '150',
                    5 => '150',
                    6 => '150',
                    7 => '150',
                    8 => '150',
                    9 => '150',
                ),
            'TABSXZUX_HSZUX' =>
                array(
                    'value' => '150',
                    0 => '150',
                    1 => '150',
                    2 => '150',
                    3 => '150',
                    4 => '150',
                    5 => '150',
                    6 => '150',
                    7 => '150',
                    8 => '150',
                    9 => '150',
                ),
            'TABSXZUX_QSZUL' =>
                array(
                    'value' => '150',
                    0 => '150',
                    1 => '150',
                    2 => '150',
                    3 => '150',
                    4 => '150',
                    5 => '150',
                    6 => '150',
                    7 => '150',
                    8 => '150',
                    9 => '150',
                ),
            'TABSXZUX_ZSZUL' =>
                array(
                    'value' => '150',
                    0 => '150',
                    1 => '150',
                    2 => '150',
                    3 => '150',
                    4 => '150',
                    5 => '150',
                    6 => '150',
                    7 => '150',
                    8 => '150',
                    9 => '150',
                ),
            'TABSXZUX_HSZUL' =>
                array(
                    'value' => '150',
                    0 => '150',
                    1 => '150',
                    2 => '150',
                    3 => '150',
                    4 => '150',
                    5 => '150',
                    6 => '150',
                    7 => '150',
                    8 => '150',
                    9 => '150',
                ),
            'TABSXZUX_ZUSZHIX' =>
                array(
                    'value' => '300',
                    0 => '300',
                    1 => '300',
                    2 => '300',
                    3 => '300',
                    4 => '300',
                    5 => '300',
                    6 => '300',
                    7 => '300',
                    8 => '300',
                    9 => '300',
                ),
            'TABHZ_SXHZ' =>
                array(
                    0 => '900',
                    1 => '300',
                    2 => '150',
                    3 => '90',
                    4 => '60',
                    5 => '40',
                    6 => '30',
                    7 => '23',
                    8 => '18',
                    9 => '15',
                    10 => '13',
                    11 => '12',
                    12 => '11',
                    13 => '11',
                    14 => '11',
                    15 => '11',
                    16 => '12',
                    17 => '13',
                    18 => '15',
                    19 => '18',
                    20 => '23',
                    21 => '30',
                    22 => '40',
                    23 => '60',
                    24 => '90',
                    25 => '150',
                    26 => '300',
                    27 => '900',
                    'dan' => '1.86',
                    'shuang' => '1.86',
                    'xiao' => '1.86',
                    'da' => '1.86',
                ),
            'TABHZ_SWHZ' =>
                array(
                    0 => '90',
                    1 => '45',
                    2 => '30',
                    3 => '20',
                    4 => '16',
                    5 => '14',
                    6 => '11',
                    7 => '10',
                    8 => '9',
                    9 => '8',
                    10 => '9',
                    11 => '10',
                    12 => '11',
                    13 => '14',
                    14 => '16',
                    15 => '20',
                    16 => '30',
                    17 => '45',
                    18 => '90',
                    'dan' => '1.85',
                    'shuang' => '1.80',
                    'xiao' => '1.85',
                    'da' => '1.80',
                    'dwdan' => '1.86',
                    'dwshuang' => '1.86',
                    'dwxiao' => '1.78',
                    'dwda' => '1.94',
                ),
            'TABHZ_EXHZ' =>
                array(
                    0 => '90',
                    1 => '45',
                    2 => '30',
                    3 => '20',
                    4 => '16',
                    5 => '14',
                    6 => '11',
                    7 => '10',
                    8 => '9',
                    9 => '8',
                    10 => '9',
                    11 => '10',
                    12 => '11',
                    13 => '14',
                    14 => '16',
                    15 => '20',
                    16 => '30',
                    17 => '45',
                    18 => '90',
                    'dan' => '1.86',
                    'shuang' => '1.86',
                    'xiao' => '1.78',
                    'da' => '1.94',
                ),
            'TABEX_QEZHIX' =>
                array(
                    'value' => '90',
                    0 => '90',
                    1 => '90',
                    2 => '90',
                    3 => '90',
                    4 => '90',
                    5 => '90',
                    6 => '90',
                    7 => '90',
                    8 => '90',
                    9 => '90',
                ),
            'TABEX_HEZHIX' =>
                array(
                    'value' => '90',
                    0 => '90',
                    1 => '90',
                    2 => '90',
                    3 => '90',
                    4 => '90',
                    5 => '90',
                    6 => '90',
                    7 => '90',
                    8 => '90',
                    9 => '90',
                ),
            'TABEX_QEZUE' =>
                array(
                    'value' => '45',
                    0 => '45',
                    1 => '45',
                    2 => '45',
                    3 => '45',
                    4 => '45',
                    5 => '45',
                    6 => '45',
                    7 => '45',
                    8 => '45',
                    9 => '45',
                ),
            'TABEX_HEZUE' =>
                array(
                    'value' => '45',
                    0 => '45',
                    1 => '45',
                    2 => '45',
                    3 => '45',
                    4 => '45',
                    5 => '45',
                    6 => '45',
                    7 => '45',
                    8 => '45',
                    9 => '45',
                ),
            'TABWX_WXZHIX' =>
                array(
                    'value' => '90000',
                    0 => '90000',
                    1 => '90000',
                    2 => '90000',
                    3 => '90000',
                    4 => '90000',
                    5 => '90000',
                    6 => '90000',
                    7 => '90000',
                    8 => '90000',
                    9 => '90000',
                ),
            'TABWX_WXTX' =>
                array(
                    'value' => '15000',
                    0 => '15000',
                    1 => '15000',
                    2 => '15000',
                    3 => '15000',
                    4 => '15000',
                    5 => '15000',
                    6 => '15000',
                    7 => '15000',
                    8 => '15000',
                    9 => '15000',
                ),
            'TABNN_NN' =>
                array(
                    '杂牌包选' => '2.1',
                    '牛一包选' => '9.5',
                    '牛二包选' => '9.5',
                    '牛三包选' => '9.5',
                    '牛四包选' => '9.5',
                    '牛五包选' => '9.5',
                    '牛六包选' => '9.5',
                    '牛七包选' => '9.5',
                    '牛八包选' => '9.5',
                    '牛九包选' => '9.5',
                    '牛牛包选' => '9.5',
                ),
            'TABDW_YI' =>
                array(
                    'value' => '9.3',
                    0 => '9.3',
                    1 => '9.3',
                    2 => '9.3',
                    3 => '9.3',
                    4 => '9.3',
                    5 => '9.3',
                    6 => '9.3',
                    7 => '9.3',
                    8 => '9.3',
                    9 => '9.3',
                ),
            'TABDW_ER' =>
                array(
                    'value' => '9.3',
                    0 => '9.3',
                    1 => '9.3',
                    2 => '9.3',
                    3 => '9.3',
                    4 => '9.3',
                    5 => '9.3',
                    6 => '9.3',
                    7 => '9.3',
                    8 => '9.3',
                    9 => '9.3',
                ),
            'TABDW_SAN' =>
                array(
                    'value' => '9.3',
                    0 => '9.3',
                    1 => '9.3',
                    2 => '9.3',
                    3 => '9.3',
                    4 => '9.3',
                    5 => '9.3',
                    6 => '9.3',
                    7 => '9.3',
                    8 => '9.3',
                    9 => '9.3',
                ),
            'TABDW_SI' =>
                array(
                    'value' => '9.3',
                    0 => '9.3',
                    1 => '9.3',
                    2 => '9.3',
                    3 => '9.3',
                    4 => '9.3',
                    5 => '9.3',
                    6 => '9.3',
                    7 => '9.3',
                    8 => '9.3',
                    9 => '9.3',
                ),
            'TABDW_WU' =>
                array(
                    'value' => '9.3',
                    0 => '9.3',
                    1 => '9.3',
                    2 => '9.3',
                    3 => '9.3',
                    4 => '9.3',
                    5 => '9.3',
                    6 => '9.3',
                    7 => '9.3',
                    8 => '9.3',
                    9 => '9.3',
                ),
        );
    }

    public static function cache_ssc_first_types()
    {
        return array(
            12 => array(
                'typeId' => '12',
                'name' => '三星直选',
                'odds' => '90',
                'slug' => 'TABSXZHIX'
            ),
            21 => array(
                'typeId' => '21',
                'name' => '三星组选',
                'odds' => '90',
                'slug' => 'TABSXZUX'
            ),
            22 => array(
                'typeId' => '22',
                'name' => '和值',
                'odds' => '90',
                'slug' => 'TABHZ'
            ),
            23 => array(
                'typeId' => '23',
                'name' => '二星',
                'odds' => '90',
                'slug' => 'TABEX'
            ),
            26 => array(
                'typeId' => '26',
                'name' => '定位胆',
                'odds' => '90',
                'slug' => 'TABDW'
            ),
            24 => array(
                'typeId' => '24',
                'name' => '五星',
                'odds' => '90',
                'slug' => 'TABWX'
            ),
            25 => array(
                'typeId' => '25',
                'name' => '牛牛',
                'odds' => '90',
                'slug' => 'TABNN'
            )
        );
    }

    public static function cache_ssc_types()
    {
        return array(
            1 => array(
                'typeId' => '1',
                'name' => '特码',
                'odds' => '90',
                'firsttype' => 'TABSXZHIX',
                'slug' => 'TABSXZHIX_QSZHIX'
            ),
            2 => array(
                'typeId' => '2',
                'name' => '中三直选',
                'firsttype' => 'TABSXZHIX',
                'slug' => 'TABSXZHIX_ZSZHIX'
            ),
            3 => array(
                'typeId' => '3',
                'name' => '后三直选',
                'firsttype' => 'TABSXZHIX',
                'slug' => 'TABSXZHIX_HSZHIX'
            ),
            4 => array(
                'typeId' => '4',
                'name' => '前三组三',
                'odds' => '90',
                'firsttype' => 'TABSXZUX',
                'slug' => 'TABSXZUX_QSZUX'
            ),

            5 => array(
                'typeId' => '5',
                'name' => '中三组三',
                'firsttype' => 'TABSXZUX',
                'slug' => 'TABSXZUX_ZSZUX'
            ),
            6 => array(
                'typeId' => '6',
                'name' => '后三组三',
                'firsttype' => 'TABSXZUX',
                'slug' => 'TABSXZUX_HSZUX'
            ),
            7 => array(
                'typeId' => '7',
                'name' => '前三组六',
                'firsttype' => 'TABSXZUX',
                'slug' => 'TABSXZUX_QSZUL'
            ),
            8 => array(
                'typeId' => '8',
                'name' => '中三组六',
                'firsttype' => 'TABSXZUX',
                'slug' => 'TABSXZUX_ZSZUL'
            ),
            9 => array(
                'typeId' => '9',
                'name' => '后三组六',
                'firsttype' => 'TABSXZUX',
                'slug' => 'TABSXZUX_HSZUL'
            ),
            10 => array(
                'typeId' => '10',
                'name' => '组三直选',
                'odds' => '90',
                'firsttype' => 'TABSXZUX',
                'slug' => 'TABSXZUX_ZUSZHIX'
            ),

            12 => array(
                'typeId' => '12',
                'name' => '首尾和值',
                'firsttype' => 'TABHZ',
                'slug' => 'TABHZ_SWHZ'
            ),
            11 => array(
                'typeId' => '11',
                'name' => '三星和值',
                'firsttype' => 'TABHZ',
                'slug' => 'TABHZ_SXHZ'
            ),

            13 => array(
                'typeId' => '13',
                'name' => '二星和值',
                'firsttype' => 'TABHZ',
                'slug' => 'TABHZ_EXHZ'
            ),
            14 => array(
                'typeId' => '14',
                'name' => '前二直选',
                'firsttype' => 'TABEX',
                'slug' => 'TABEX_QEZHIX'
            ),

            15 => array(
                'typeId' => '15',
                'name' => '后二直选',
                'firsttype' => 'TABEX',
                'slug' => 'TABEX_HEZHIX'
            ),
            16 => array(
                'typeId' => '16',
                'name' => '前二组二',
                'firsttype' => 'TABEX',
                'slug' => 'TABEX_QEZUE'
            ),
            17 => array(
                'typeId' => '17',
                'name' => '后二组二',
                'firsttype' => 'TABEX',
                'slug' => 'TABEX_HEZUE'
            ),
            18 => array(
                'typeId' => '18',
                'name' => '五星直选',
                'firsttype' => 'TABWX',
                'slug' => 'TABWX_WXZHIX'
            ),
            19 => array(
                'typeId' => '19',
                'name' => '五星通选',
                'firsttype' => 'TABWX',
                'slug' => 'TABWX_WXTX'
            ),
            20 => array(
                'typeId' => '20',
                'name' => '牛牛玩法',
                'firsttype' => 'TABNN',
                'slug' => 'TABNN_NN'
            ),
            21 => array(
                'typeId' => '21',
                'name' => '第一位',
                'firsttype' => 'TABDW',
                'slug' => 'TABDW_YI'
            ),
            22 => array(
                'typeId' => '22',
                'name' => '第二位',
                'firsttype' => 'TABDW',
                'slug' => 'TABDW_ER'
            ),
            23 => array(
                'typeId' => '23',
                'name' => '第三位',
                'firsttype' => 'TABDW',
                'slug' => 'TABDW_SAN'
            ),
            24 => array(
                'typeId' => '24',
                'name' => '第四位',
                'firsttype' => 'TABDW',
                'slug' => 'TABDW_SI'
            ),
            25 => array(
                'typeId' => '25',
                'name' => '第五位',
                'firsttype' => 'TABDW',
                'slug' => 'TABDW_WU'
            )
        );
    }

    public static function cache_6he_first_types()
    {
        return array(
            1 => array(
                'typeId' => '1',
                'name' => '特码/正码/正码特',
                'odds' => '90',
                'slug' => 'TM'
            ),
//            2 => array(
//                'typeId' => '2',
//                'name' => '生肖',
//                'odds' => '90',
//                'slug' => 'SX'
//            ),
//            3 => array(
//                'typeId' => '3',
//                'name' => '连码',
//                'odds' => '90',
//                'slug' => 'LM'
//            ),
//            4 => array(
//                'typeId' => '4',
//                'name' => '自选不中',
//                'odds' => '90',
//                'slug' => 'ZXBZ'
//            )
        );
    }

    public static function cache_6he_chipins()
    {
//        if (\Cache::has('6hechipins')) {
//            return \Cache::get('6hechipins');
//        }
        return array(
            'TM_TM' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_TMB' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_ZM' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_ZMYI' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_ZMER' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_ZMSAN' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_SI' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_WU' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_LIU' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
            'TM_BANPO' =>
                array(
                    'low' => '10',
                    'hight' => '10000',
                ),
        );
    }

    public static function cache_6he_types()
    {
        return array(
            'TMA' => array(
                'typeId' => '1',
                'name' => '特码A',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '7',
                'slug' => 'TM_TMA'
            ),
            'TMB' => array(
                'typeId' => '2',
                'name' => '特码B',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '7B',
                'slug' => 'TM_TMB'
            ),
            'PM' => array(
                'typeId' => '3',
                'name' => '平码',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '平码',
                'slug' => 'TM_PM'
            ),
            'PM1' => array(
                'typeId' => '4',
                'name' => '平码一',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '1',
                'slug' => 'TM_PMYI'
            ),
            'PM2' => array(
                'typeId' => '5',
                'name' => '平码二',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '2',
                'slug' => 'TM_PMER'
            ),
            'PM3' => array(
                'typeId' => '6',
                'name' => '平码三',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '3',
                'slug' => 'TM_PMSAN'
            ),
            'PM4' => array(
                'typeId' => '7',
                'name' => '平码四',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '4',
                'slug' => 'TM_PMSI'
            ),
            'PM5' => array(
                'typeId' => '8',
                'name' => '平码五',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '5',
                'slug' => 'TM_PMWU'
            ),
            'PM6' => array(
                'typeId' => '9',
                'name' => '平码六',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '6',
                'slug' => 'TM_LIU'
            ),
            'BANBO' => array(
                'typeId' => '10',
                'name' => '半波',
                'odds' => '48.5',
                'firsttype' => 'TM',
                'wei' => '半波',
                'slug' => 'TM_BANPO'
            ),
            11 => array(
                'typeId' => '11',
                'name' => '特码生肖',
                'odds' => '11.3',
                'firsttype' => 'SX',
                'wei' => '特码生肖',
                'slug' => 'SX_TEMA'
            ),
            12 => array(
                'typeId' => '12',
                'name' => '一肖',
                'odds' => '11.3',
                'firsttype' => 'SX',
                'wei' => '一肖[中]',
                'slug' => 'SX_YIX'
            ),
            13 => array(
                'typeId' => '13',
                'name' => '正肖',
                'odds' => '11.3',
                'firsttype' => 'SX',
                'wei' => '正肖',
                'slug' => 'SX_ZX'
            ),
            14 => array(
                'typeId' => '14',
                'name' => '连肖',
                'odds' => '11.3',
                'firsttype' => 'SX',
                'wei' => '连肖',
                'slug' => 'SX_LX'
            ),
            15 => array(
                'typeId' => '15',
                'name' => '连尾',
                'odds' => '11.3',
                'firsttype' => 'SX',
                'wei' => '连尾',
                'slug' => 'SX_LW'
            ),
            16 => array(
                'typeId' => '16',
                'name' => '多肖',
                'odds' => '11.3',
                'firsttype' => 'SX',
                'wei' => '多肖',
                'slug' => 'SX_DS'
            ),
            17 => array(
                'typeId' => '17',
                'name' => '四全中',
                'odds' => '10000',
                'firsttype' => 'LM',
                'wei' => '四全中',
                'slug' => 'LM_SIQZ'
            ),
            18 => array(
                'typeId' => '18',
                'name' => '三全中',
                'odds' => '650',
                'firsttype' => 'LM',
                'wei' => '三全中',
                'slug' => 'LM_SANQZ'
            ),
            19 => array(
                'typeId' => '19',
                'name' => '三中二',
                'odds' => '20,100',
                'firsttype' => 'LM',
                'wei' => '三全二',
                'slug' => 'LM_SANZER'
            ),
            20 => array(
                'typeId' => '20',
                'name' => '二全中',
                'odds' => '63',
                'firsttype' => 'LM',
                'wei' => '二全中',
                'slug' => 'LM_ERQZ'
            ),
            21 => array(
                'typeId' => '21',
                'name' => '二中特',
                'odds' => '31，51',
                'firsttype' => 'LM',
                'wei' => '二中特',
                'slug' => 'LM_ERZTE'
            ),
            22 => array(
                'typeId' => '22',
                'name' => '特串',
                'odds' => '155',
                'firsttype' => 'LM',
                'wei' => '特串',
                'slug' => 'LM_TECHUAN'
            ),
            23 => array(
                'typeId' => '23',
                'name' => '三中一',
                'odds' => '2.5',
                'firsttype' => 'ZXBZ',
                'wei' => '3中一',
                'slug' => 'ZXBZ_SANZYI'
            ),
            24 => array(
                'typeId' => '24',
                'name' => '四中一',
                'odds' => '1.97',
                'firsttype' => 'ZXBZ',
                'wei' => '4中一',
                'slug' => 'ZXBZ_SIZYI'
            ),
            25 => array(
                'typeId' => '25',
                'name' => '五中一',
                'odds' => '1.8',
                'firsttype' => 'ZXBZ',
                'wei' => '5中一',
                'slug' => 'ZXBZ_WUZYI'
            ),
            26 => array(
                'typeId' => '26',
                'name' => '六中一',
                'odds' => '1.65',
                'firsttype' => 'ZXBZ',
                'wei' => '6中一',
                'slug' => 'ZXBZ_LIUZYI'
            ),
            27 => array(
                'typeId' => '27',
                'name' => '五不中',
                'odds' => '1.98',
                'firsttype' => 'ZXBZ',
                'wei' => '5不中',
                'slug' => 'ZXBZ_WUBUZ'
            ),
            28 => array(
                'typeId' => '28',
                'name' => '六不中',
                'odds' => '2.6',
                'firsttype' => 'ZXBZ',
                'wei' => '6不中',
                'slug' => 'ZXBZ_LIUBUZ'
            ),
            29 => array(
                'typeId' => '29',
                'name' => '七不中',
                'odds' => '3.2',
                'firsttype' => 'ZXBZ',
                'wei' => '7不中',
                'slug' => 'ZXBZ_QIBUZ'
            ),
            30 => array(
                'typeId' => '30',
                'name' => '八不中',
                'odds' => '3.6',
                'firsttype' => 'ZXBZ',
                'wei' => '8不中',
                'slug' => 'ZXBZ_BABUZ'
            ),
            31 => array(
                'typeId' => '31',
                'name' => '九不中',
                'odds' => '4.3',
                'firsttype' => 'ZXBZ',
                'wei' => '9不中',
                'slug' => 'ZXBZ_JIUBUZ'
            ),
            32 => array(
                'typeId' => '32',
                'name' => '十不中',
                'odds' => '5.2',
                'firsttype' => 'ZXBZ',
                'wei' => '10不中',
                'slug' => 'ZXBZ_SHIBUZ'
            ),
            33 => array(
                'typeId' => '33',
                'name' => '十一不中',
                'odds' => '6.35',
                'firsttype' => 'ZXBZ',
                'wei' => '11不中',
                'slug' => 'ZXBZ_SHIYIBUZ'
            ),
            34 => array(
                'typeId' => '34',
                'name' => '十二不中',
                'odds' => '7.8',
                'firsttype' => 'ZXBZ',
                'wei' => '12不中',
                'slug' => 'ZXBZ_SHIERBUZ'
            ),

        );

    }

    public static function cache_6he_odds()
    {
//        if (\Cache::has('6heodds')) {
//            return \Cache::get('6heodds');
//        }
        return array(
            'TMA' =>
                array(
                    'value' => '48.5',
                    '01' => '48.5',
                    '02' => '48.5',
                    '03' => '48.5',
                    '04' => '48.5',
                    '05' => '48.5',
                    '06' => '48.5',
                    '07' => '48.5',
                    '08' => '48.5',
                    '09' => '48.5',
                    10 => '48.5',
                    11 => '48.5',
                    12 => '48.5',
                    13 => '48.5',
                    14 => '48.5',
                    15 => '48.5',
                    16 => '48.5',
                    17 => '48.5',
                    18 => '48.5',
                    19 => '48.5',
                    20 => '48.5',
                    21 => '48.5',
                    22 => '48.5',
                    23 => '48.5',
                    24 => '48.5',
                    25 => '48.5',
                    26 => '48.5',
                    27 => '48.5',
                    28 => '48.5',
                    29 => '48.5',
                    30 => '48.5',
                    31 => '48.5',
                    32 => '48.5',
                    33 => '48.5',
                    34 => '48.5',
                    35 => '48.5',
                    36 => '48.5',
                    37 => '48.5',
                    38 => '48.5',
                    39 => '48.5',
                    40 => '48.5',
                    41 => '48.5',
                    42 => '48.5',
                    43 => '48.5',
                    44 => '48.5',
                    45 => '48.5',
                    46 => '48.5',
                    47 => '48.5',
                    48 => '48.5',
                    49 => '48.5',
                    '单' => '1.96',
                    '双' => '1.95',
                    '大' => '1.95',
                    '小' => '1.95',
                    '合大' => '1.95',
                    '合小' => '1.95',
                    '合单' => '1.95',
                    '合双' => '1.95',
                    '红波' => '2.66',
                    '绿波' => '2.76',
                    '蓝波' => '2.84',
                ),
            'PM' =>
                array(
                    'value' => '7.16',
                    '01' => '7.16',
                    '02' => '7.16',
                    '03' => '7.16',
                    '04' => '7.16',
                    '05' => '7.16',
                    '06' => '7.16',
                    '07' => '7.16',
                    '08' => '7.16',
                    '09' => '7.16',
                    10 => '7.16',
                    11 => '7.16',
                    12 => '7.16',
                    13 => '7.16',
                    14 => '7.16',
                    15 => '7.16',
                    16 => '7.16',
                    17 => '7.16',
                    18 => '7.16',
                    19 => '7.16',
                    20 => '7.16',
                    21 => '7.16',
                    22 => '7.16',
                    23 => '7.16',
                    24 => '7.16',
                    25 => '7.16',
                    26 => '7.16',
                    27 => '7.16',
                    28 => '7.16',
                    29 => '7.16',
                    30 => '7.16',
                    31 => '7.16',
                    32 => '7.16',
                    33 => '7.16',
                    34 => '7.16',
                    35 => '7.16',
                    36 => '7.16',
                    37 => '7.16',
                    38 => '7.16',
                    39 => '7.16',
                    40 => '7.16',
                    41 => '7.16',
                    42 => '7.16',
                    43 => '7.16',
                    44 => '7.16',
                    45 => '7.16',
                    46 => '7.16',
                    47 => '7.16',
                    48 => '7.16',
                    49 => '7.16',
                ),
            'PM1' =>
                array(
                    'value' => '46',
                    '01' => '46',
                    '02' => '46',
                    '03' => '46',
                    '04' => '46',
                    '05' => '46',
                    '06' => '46',
                    '07' => '46',
                    '08' => '46',
                    '09' => '46',
                    10 => '46',
                    11 => '46',
                    12 => '46',
                    13 => '46',
                    14 => '46',
                    15 => '46',
                    16 => '46',
                    17 => '46',
                    18 => '46',
                    19 => '46',
                    20 => '46',
                    21 => '46',
                    22 => '46',
                    23 => '46',
                    24 => '46',
                    25 => '46',
                    26 => '46',
                    27 => '46',
                    28 => '46',
                    29 => '46',
                    30 => '46',
                    31 => '46',
                    32 => '46',
                    33 => '46',
                    34 => '46',
                    35 => '46',
                    36 => '46',
                    37 => '46',
                    38 => '46',
                    39 => '46',
                    40 => '46',
                    41 => '46',
                    42 => '46',
                    43 => '46',
                    44 => '46',
                    45 => '46',
                    46 => '46',
                    47 => '46',
                    48 => '46',
                    49 => '46',
                    '单' => '1.95',
                    '双' => '1.95',
                    '大' => '1.95',
                    '小' => '1.95',
                    '合单' => '1.95',
                    '合双' => '1.95',
                    '红波' => '2.66',
                    '绿波' => '2.76',
                    '蓝波' => '2.84',
                ),
            'PM2' =>
                array(
                    'value' => '46',
                    '01' => '46',
                    '02' => '46',
                    '03' => '46',
                    '04' => '46',
                    '05' => '46',
                    '06' => '46',
                    '07' => '46',
                    '08' => '46',
                    '09' => '46',
                    10 => '46',
                    11 => '46',
                    12 => '46',
                    13 => '46',
                    14 => '46',
                    15 => '46',
                    16 => '46',
                    17 => '46',
                    18 => '46',
                    19 => '46',
                    20 => '46',
                    21 => '46',
                    22 => '46',
                    23 => '46',
                    24 => '46',
                    25 => '46',
                    26 => '46',
                    27 => '46',
                    28 => '46',
                    29 => '46',
                    30 => '46',
                    31 => '46',
                    32 => '46',
                    33 => '46',
                    34 => '46',
                    35 => '46',
                    36 => '46',
                    37 => '46',
                    38 => '46',
                    39 => '46',
                    40 => '46',
                    41 => '46',
                    42 => '46',
                    43 => '46',
                    44 => '46',
                    45 => '46',
                    46 => '46',
                    47 => '46',
                    48 => '46',
                    49 => '46',
                    '单' => '1.95',
                    '双' => '1.95',
                    '大' => '1.95',
                    '小' => '1.95',
                    '合单' => '1.95',
                    '合双' => '1.95',
                    '红波' => '2.66',
                    '绿波' => '2.76',
                    '蓝波' => '2.84',
                ),
            'PM3' =>
                array(
                    'value' => '46',
                    '01' => '46',
                    '02' => '46',
                    '03' => '46',
                    '04' => '46',
                    '05' => '46',
                    '06' => '46',
                    '07' => '46',
                    '08' => '46',
                    '09' => '46',
                    10 => '46',
                    11 => '46',
                    12 => '46',
                    13 => '46',
                    14 => '46',
                    15 => '46',
                    16 => '46',
                    17 => '46',
                    18 => '46',
                    19 => '46',
                    20 => '46',
                    21 => '46',
                    22 => '46',
                    23 => '46',
                    24 => '46',
                    25 => '46',
                    26 => '46',
                    27 => '46',
                    28 => '46',
                    29 => '46',
                    30 => '46',
                    31 => '46',
                    32 => '46',
                    33 => '46',
                    34 => '46',
                    35 => '46',
                    36 => '46',
                    37 => '46',
                    38 => '46',
                    39 => '46',
                    40 => '46',
                    41 => '46',
                    42 => '46',
                    43 => '46',
                    44 => '46',
                    45 => '46',
                    46 => '46',
                    47 => '46',
                    48 => '46',
                    49 => '46',
                    '单' => '1.95',
                    '双' => '1.95',
                    '大' => '1.95',
                    '小' => '1.95',
                    '合单' => '1.95',
                    '合双' => '1.95',
                    '红波' => '2.66',
                    '绿波' => '2.76',
                    '蓝波' => '2.84',
                ),
            'PM4' =>
                array(
                    'value' => '46',
                    '01' => '46',
                    '02' => '46',
                    '03' => '46',
                    '04' => '46',
                    '05' => '46',
                    '06' => '46',
                    '07' => '46',
                    '08' => '46',
                    '09' => '46',
                    10 => '46',
                    11 => '46',
                    12 => '46',
                    13 => '46',
                    14 => '46',
                    15 => '46',
                    16 => '46',
                    17 => '46',
                    18 => '46',
                    19 => '46',
                    20 => '46',
                    21 => '46',
                    22 => '46',
                    23 => '46',
                    24 => '46',
                    25 => '46',
                    26 => '46',
                    27 => '46',
                    28 => '46',
                    29 => '46',
                    30 => '46',
                    31 => '46',
                    32 => '46',
                    33 => '46',
                    34 => '46',
                    35 => '46',
                    36 => '46',
                    37 => '46',
                    38 => '46',
                    39 => '46',
                    40 => '46',
                    41 => '46',
                    42 => '46',
                    43 => '46',
                    44 => '46',
                    45 => '46',
                    46 => '46',
                    47 => '46',
                    48 => '46',
                    49 => '46',
                    '单' => '1.95',
                    '双' => '1.95',
                    '大' => '1.95',
                    '小' => '1.95',
                    '合单' => '1.95',
                    '合双' => '1.95',
                    '红波' => '2.66',
                    '绿波' => '2.76',
                    '蓝波' => '2.84',
                ),
            'PM5' =>
                array(
                    'value' => '46',
                    '01' => '46',
                    '02' => '46',
                    '03' => '46',
                    '04' => '46',
                    '05' => '46',
                    '06' => '46',
                    '07' => '46',
                    '08' => '46',
                    '09' => '46',
                    10 => '46',
                    11 => '46',
                    12 => '46',
                    13 => '46',
                    14 => '46',
                    15 => '46',
                    16 => '46',
                    17 => '46',
                    18 => '46',
                    19 => '46',
                    20 => '46',
                    21 => '46',
                    22 => '46',
                    23 => '46',
                    24 => '46',
                    25 => '46',
                    26 => '46',
                    27 => '46',
                    28 => '46',
                    29 => '46',
                    30 => '46',
                    31 => '46',
                    32 => '46',
                    33 => '46',
                    34 => '46',
                    35 => '46',
                    36 => '46',
                    37 => '46',
                    38 => '46',
                    39 => '46',
                    40 => '46',
                    41 => '46',
                    42 => '46',
                    43 => '46',
                    44 => '46',
                    45 => '46',
                    46 => '46',
                    47 => '46',
                    48 => '46',
                    49 => '46',
                    '单' => '1.95',
                    '双' => '1.95',
                    '大' => '1.95',
                    '小' => '1.95',
                    '合单' => '1.95',
                    '合双' => '1.95',
                    '红波' => '2.66',
                    '绿波' => '2.76',
                    '蓝波' => '2.84',
                ),
            'PM6' =>
                array(
                    'value' => '46',
                    '01' => '46',
                    '02' => '46',
                    '03' => '46',
                    '04' => '46',
                    '05' => '46',
                    '06' => '46',
                    '07' => '46',
                    '08' => '46',
                    '09' => '46',
                    10 => '46',
                    11 => '46',
                    12 => '46',
                    13 => '46',
                    14 => '46',
                    15 => '46',
                    16 => '46',
                    17 => '46',
                    18 => '46',
                    19 => '46',
                    20 => '46',
                    21 => '46',
                    22 => '46',
                    23 => '46',
                    24 => '46',
                    25 => '46',
                    26 => '46',
                    27 => '46',
                    28 => '46',
                    29 => '46',
                    30 => '46',
                    31 => '46',
                    32 => '46',
                    33 => '46',
                    34 => '46',
                    35 => '46',
                    36 => '46',
                    37 => '46',
                    38 => '46',
                    39 => '46',
                    40 => '46',
                    41 => '46',
                    42 => '46',
                    43 => '46',
                    44 => '46',
                    45 => '46',
                    46 => '46',
                    47 => '46',
                    48 => '46',
                    49 => '46',
                    '单' => '1.95',
                    '双' => '1.95',
                    '大' => '1.95',
                    '小' => '1.95',
                    '合单' => '1.95',
                    '合双' => '1.95',
                    '红波' => '2.66',
                    '绿波' => '2.76',
                    '蓝波' => '2.84',
                ),
            'BANBO' => array(
                '红单' => '5.62',
                '红双' => '5.62',
                '红大' => '5.62',
                '红小' => '5.62',
                '蓝单' => '5.62',
                '蓝双' => '5.62',
                '蓝大' => '5.62',
                '蓝小' => '5.62',
                '绿单' => '5.62',
                '绿双' => '5.62',
                '绿大' => '5.62',
                '绿小' => '5.62',
            ),

        );
    }
}
