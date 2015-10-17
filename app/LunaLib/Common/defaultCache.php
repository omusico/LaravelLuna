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
        return array(
            1 =>
                array(
                    'typeName' => 'gfb',
                    'name' => '国付宝',
                    'url' => 'http://pay.dxdesigh.com',
                    'id' => '0000007888',
                    'key' => '0000000002000002725',
                    'terminalId' => '',
                ),
            2 =>
                array(
                    'typeName' => 'hc',
                    'name' => '汇潮腾',
                    'url' => 'http://pay.juwen.tv',
                    'id' => '25256',
                    'key' => 'PtgXhOoB',
                    'terminalId' => '',
                ),
            3 =>
                array(
                    'typeName' => 'khb',
                    'name' => '支付3何增娣',
                    'url' => 'http://pay.hncpqzj.cn',
                    'id' => '2000390058',
                    'key' => 'dj98j3idj2dhw283rjdfrig5',
                    'terminalId' => '',
                ),
            4 =>
                array(
                    'typeName' => 'hc',
                    'name' => '汇潮度点',
                    'url' => 'http://pay.che911.com.cn',
                    'id' => '24832',
                    'key' => 'UAqUZPHa',
                    'terminalId' => '',
                ),
            5 =>
                array(
                    'typeName' => 'khb',
                    'name' => '陈思_快汇宝',
                    'url' => 'http://pay.zzbxpw.cn',
                    'id' => '2000390046',
                    'key' => 'kjsi_9wji02_iu3k2_829jd_83y2e',
                    'terminalId' => '',
                ),
            6 =>
                array(
                    'typeName' => 'khb',
                    'name' => '官海艳_快汇宝',
                    'url' => 'http://pay.zz-china.cn',
                    'id' => '2000390047',
                    'key' => 'JKS_9JD8k9_sj9f90_2euu27_30f8d_hjhds2',
                    'terminalId' => '',
                ),
            7 =>
                array(
                    'typeName' => 'yeepay',
                    'name' => '黑名单',
                    'url' => '',
                    'id' => '13123',
                    'key' => '12123123213123213',
                    'terminalId' => '',
                ),
            8 =>
                array(
                    'typeName' => 'khb',
                    'name' => '陈永龙_快汇宝',
                    'url' => 'http://pays.zzg1903.cn',
                    'id' => '2000390018',
                    'key' => 'j93u3_u3o097876y_uf87r7ru',
                    'terminalId' => '',
                ),
            9 =>
                array(
                    'typeName' => 'khb',
                    'name' => '',
                    'url' => '',
                    'id' => '',
                    'key' => '',
                    'terminalId' => '',
                ),
            10 =>
                array(
                    'typeName' => 'khb',
                    'name' => '',
                    'url' => '',
                    'id' => '',
                    'key' => '',
                    'terminalId' => '',
                ),
            11 =>
                array(
                    'typeName' => 'hc',
                    'name' => '汇潮',
                    'url' => 'http://pay.huanggao.org.cn',
                    'id' => '22682',
                    'key' => 'Ji7H8l9y',
                    'terminalId' => '',
                ),
            12 =>
                array(
                    'typeName' => 'hc',
                    'name' => '汇潮2',
                    'url' => 'http://pay.huanggao.org.cn',
                    'id' => '22682',
                    'key' => 'Ji7H8l9y',
                    'terminalId' => '',
                ),
            13 =>
                array(
                    'typeName' => 'bf',
                    'name' => 'XX宝付',
                    'url' => 'pay.n6w2h.com',
                    'id' => '427447',
                    'key' => '569uxz8bek5uj5d3',
                    'terminalId' => '23161',
                ),
        );
    }

    public static function cache_k3_odds()
    {
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
                            'priority' => 1,
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
                            'priority' => 2,
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
                            'priority' => 2,
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
                            'priority' => 1,
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
                            'priority' => 1,
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
                            'priority' => 0,
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
                            'priority' => 2,
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
                            'priority' => 3,
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
                            'priority' => 1,
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
                            'priority' => 2,
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
                            'priority' => 0,
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
                            'priority' => 2,
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
                            'priority' => 0,
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
                            'priority' => 2,
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
                            'priority' => 1,
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
                            'priority' => 2,
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
                            'priority' => 0,
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
                            'priority' => 2,
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
                            'priority' => 2,
                            'touUrl' => '',
                            'kjTime' => 150,
                            'fdTime' => 120,
                        ),
                    '360cp' =>
                        array(
                            'url' => 'http://cp.360.cn/hlj11/?menu&r_a=nymaM3',
                            'status' => '1',
                            'kjTime' => 70,
                            'priority' => 0,
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
                            'priority' => 2,
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
                            'priority' => 0,
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

    public static function cache_lottery_type_slug(){
        return array (
            'HZ' =>
                array (
                    'typeId' => '9',
                    'name' => '和值',
                    'odds' => '90',
                    'slug' => 'HZ',
                ),
            'DZ' =>
                array (
                    'typeId' => '10',
                    'name' => '对子包选',
                    'odds' => '90',
                    'slug' => 'DZ',
                ),
            '3THTX' =>
                array (
                    'typeId' => '1',
                    'name' => '三同号通选',
                    'odds' => '90',
                    'slug' => '3THTX',
                ),
            '3THDX' =>
                array (
                    'typeId' => '2',
                    'name' => '三同号单选',
                    'odds' => '90',
                    'slug' => '3THDX',
                ),
            '3BTH' =>
                array (
                    'typeId' => '3',
                    'name' => '三不同号',
                    'odds' => '90',
                    'slug' => '3BTH',
                ),
            '3LHTX' =>
                array (
                    'typeId' => '4',
                    'name' => '三连号通选',
                    'odds' => '90',
                    'slug' => '3LHTX',
                ),
            '2THFX' =>
                array (
                    'typeId' => '5',
                    'name' => '二同号复选',
                    'odds' => '90',
                    'slug' => '2THFX',
                ),
            '2THDX' =>
                array (
                    'typeId' => '6',
                    'name' => '二同号单选',
                    'odds' => '90',
                    'slug' => '2THDX',
                ),
            '2BTH' =>
                array (
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
}
