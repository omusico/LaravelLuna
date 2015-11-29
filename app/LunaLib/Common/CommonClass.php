<?php
/**
 * Created by PhpStorm.
 * User: luna
 * Date: 10/4/15
 * Time: 10:50 AM
 */

namespace App\LunaLib\Common;


use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Tests\DependencyInjection\ContainerAwareHttpKernelTest;
use App;

class CommonClass
{

    public static function arraySort(array $args, $on, $order = SORT_ASC)
    {
        $tmp = array();
        if (!empty($args)) {
            foreach ($args as $key => $val) {
                if (is_array($val)) {
                    $tmp[] = $val[$on];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
        array_multisort($tmp, $order, $args);
        return $args;
    }

    public static function cache_point_type(){
        return array(
//            5 => '支付宝充值',
//            16 => '财付通',
            1 => '投注',
            2 => '中奖',
            3 => '在线充值',
            4 => '公司充值',
            5 => '支付宝充值',
            6 => '手动修改',
            7 => '提现申请',
            8 => '返水',
            9 => '财付通',
            10 => '代理返佣',
            11 => '优惠活动',
            12 => '继续打码',
            13 => '撤单',
            14 => '反本金',
            15 => '抽奖',
            16=>'提现拒绝返还'
        );
    }

    public static function get_lottery_name($lottery_type)
    {
        if (!isset($lottery_type)) {
//            $lottery_type = 'jsold';
            return null;
        }

        $lottery_type = strtolower($lottery_type);
        $cache_lottery_type = defaultCache::cache_lottery_status();
        $gameProvince = $cache_lottery_type[$lottery_type]['name'];
        return ($gameProvince == null ? '未知彩种' : $gameProvince);
    }

    public static function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        } if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] = object_array($value);
            }
        }
        return $array;
    }

    public static function cache($name, $isfresh)
    {
        if ("user_groups" == $name) {
            if (Cache::has("user_groups") && $isfresh != 1) {
                return Cache::get("user_groups");
            } else {
                $result = App\lu_user_group::all(["groupId", "name"]);
                $lu_user_groups = $result->toArray();
                Cache::forever("user_groups", $lu_user_groups);
                return $lu_user_groups;
            }
        } else if ("user_level" == $name) {
            if (Cache::has("user_level") && $isfresh != 1) {
                return Cache::get("user_level");
            } else {
                $user_level = defaultCache::userlevel();
                Cache::forever("user_groups", $user_level);
                return $user_level;
            }
        }
    }

    /**
     * 处理价格（保留两位小数）
     *
     * @static
     * @param string $price
     * @param string $auto 是否自动四舍五入
     * @return void
     */
    public static function price($price, $auto = 1)
    {

        if (!$price) return '0.00';

        if ($auto == 1) {

            return sprintf("%.3f", $price);

        } else {

            return sprintf("%.3f", substr(sprintf("%.3f", $price), 0, -3));

        }

    }


    /**
     * 安全转换字符串
     *
     * @return string
     */
    public static function safeString($string)
    {
        if (is_array($string)) {
            foreach ($string as $key => $val)
                $string[$key] = self::safeString($val);
        } else {
            $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
                str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
        }
        return $string;
    }

    public static function getArrayDiff($a,$b){
        $c = array_diff($a, $b);
        $d = array_diff($b, $a);
        return array_merge($c ,$d);
    }

    /**
     * 读取URL上的文件
     *
     * @param string $url 文件地址
     * @access public
     */
    public static function getUrlContent($url)
    {
        /* if (ini_get("allow_url_fopen") == "1"){
            return  Waf_Common::getByCrul($url);
        } */
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); //timeout on response
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
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

    public static function get_cj_name($type)
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