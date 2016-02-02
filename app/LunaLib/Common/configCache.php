<?php
/**
 * Created by PhpStorm.
 * Date: 2/1/16
 * Time: 10:42 AM
 */
namespace App\LunaLib\Common;

use App\lu_lotteries_result;

class configCache
{
    public static function getlastproName($value)
    {
        $last = lu_lotteries_result::where('typeName', strtoupper($value))->orderBy('proName', 'desc')->first();
        if (empty($last)) {
            return "";
        }
        return $last->proName;
    }

    public static function isdelegate()
    {
        if (\Cache::has('isdelegate')) {
            return \Cache::get('isdelegate');
        }
        return array(
            'isdelegate' => "0",
            'num' => 2,
        );
    }

    public static function k3lotterystatus()
    {
        if (\Cache::has('k3lotterystatus')) {
            return \Cache::get('k3lotterystatus');
        }
        return array(
            'jsold' =>
                array(
                    'name' => '江苏快3',
                    'lotterytype' => 'jsold',
                    'status' => '1',
                ),
            'jsnew' =>
                array(
                    'name' => '广西快3',
                    'lotterytype' => 'jsnew',
                    'status' => '1',
                ),
            'jilin' =>
                array(
                    'name' => '吉林快3',
                    'lotterytype' => 'jilin',
                    'status' => '1',
                ),
            'anhui' =>
                array(
                    'name' => '安徽快3',
                    'lotterytype' => 'anhui',
                    'status' => '1',
                ),
            'hubei' =>
                array(
                    'name' => '湖北快3',
                    'lotterytype' => 'hubei',
                    'status' => '1',
                ),
            'hebei' =>
                array(
                    'name' => '河北快3',
                    'lotterytype' => 'hebei',
                    'status' => '1',
                ),
            'nmg' =>
                array(
                    'name' => '内蒙古快3',
                    'lotterytype' => 'nmg',
                    'status' => '1',
                ),
            'beijin' =>
                array(
                    'name' => '北京快3',
                    'lotterytype' => 'beijin',
                    'status' => '1',
                ),
            'fjk3' =>
                array(
                    'name' => '福建快3',
                    'lotterytype' => 'fjk3',
                    'status' => '0',
                )
        );

    }

    public static function fivelotterystatus()
    {
        if (\Cache::has('fivelotterystatus')) {
            return \Cache::get('fivelotterystatus');
        }
        return array(
            'sdfive' =>
                array(
                    'name' => '山东11选5',
                    'lotterytype' => 'sdfive',
                    'status' => '1',
                ),
            'jxfive' =>
                array(
                    'name' => '江西11选5',
                    'lotterytype' => 'jxfive',
                    'status' => '1',
                ),
            'gdfive' =>
                array(
                    'name' => '广东11选5',
                    'lotterytype' => 'gdfive',
                    'status' => '1',
                ),
            'liaoningfive' =>
                array(
                    'name' => '辽宁11选5',
                    'lotterytype' => 'liaoningfive',
                    'status' => '1',
                ),
            'shfive' =>
                array(
                    'name' => '上海11选5',
                    'lotterytype' => 'shfive',
                    'status' => '1',
                ),
            'hljfive' =>
                array(
                    'name' => '黑龙江11选5',
                    'lotterytype' => 'hljfive',
                    'status' => '0',
                ),
            'zjfive' =>
                array(
                    'name' => '浙江11选5',
                    'lotterytype' => 'zjfive',
                    'status' => '1',
                ),
            'cqfive' =>
                array(
                    'name' => '重庆11选5',
                    'lotterytype' => 'cqfive',
                    'status' => '0',
                ),
        );

    }

    public static function ssclotterystatus()
    {
        if (\Cache::has('ssclotterystatus')) {
            return \Cache::get('ssclotterystatus');
        }
        return array(
            'cqssc' =>
                array(
                    'name' => '重庆时时彩',
                    'lotterytype' => 'cqssc',
                    'status' => '1',
                ),
            'jxssc' =>
                array(
                    'name' => '江西时时彩',
                    'lotterytype' => 'jxssc',
                    'status' => '1',
                ),
            'xjssc' =>
                array(
                    'name' => '新疆时时彩',
                    'lotterytype' => 'xjssc',
                    'status' => '1',
                ),
            'tjssc' =>
                array(
                    'name' => '天津时时彩',
                    'lotterytype' => 'tjssc',
                    'status' => '1',
                )
        );

    }


}
