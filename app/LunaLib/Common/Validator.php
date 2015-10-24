<?php
namespace App\LunaLib\Common;
class Validator{
    /**
     * 构造函数
     *
     * @param  array  $options
     */
    public function __construct(){}
    /**
     * 规则
     *
     * @access private
     */
    private static $_rules = array(
        'alphaNumber'	=>	"|^[a-zA-Z0-9_]+$|",
        'int'			=>	"|^\d+$|",
        'date'			=>	"#^\d{4}([/-])([0][0-9]|[1][0-2])\\1([0-2][0-9]|[3][0-1])$#",
        'email'			=>	"#^[\w\.-]+@\w+\.\w+(\.\w+)?$#",
        'phone'			=>	"#^\d{3}-\d{8}|\d{4}-\d{7}$#",
        'mobile'        =>	"|^1[358]\d{9}$|",
        'url'			=>	"#^([a-z]+://)?([\w-]+\.)+[\w-]+(/[\w- ./?%&=]*)?$#",
        'slug'          =>  "|^[a-zA-Z_\-]+$|",
        'alpha'         =>  "|^[a-zA-Z]+$|"
    );

    /*
     * 检验数据不能为空
     * return boolean
     */
    public static function required($data){
        return is_array($data) ? count($data) > 0 : trim($data) != "";
    }

    /*
     * 检验数据不能超过指定长度
     *
     * @param string $data
     * @param int $len
     * return boolean
     */
    public static function maxLength($data, $len){
        return strlen($data) <= $len;
    }

    /*
     * 检验数据不能小于指定长度
     *
     * @param string $data
     * @param int $len
     * return boolean
     */
    public static function minLength($data, $len){
        return strlen($data) >= $len;
    }

    /**
     * 检验数据长度是否在指定范围内
     *
     * @param sring $data
     * @param int $s
     * @param int $e
     * return boolean
     */
    public static function range($data, $s, $e){
        return strlen($data) >= $s && strlen($data) <= $e;
    }

    /*
     * 检验数据是不是只是数字和字母
     * @param string $data
     */
    public static function alphaNumber($data){
        return self::match($data, self::$_rules['alphaNumber']);
    }
    /**
     * 检验数据是不是只是符合SLUG
     *
     * @param sring $data
     * return boolean
     */
    public static function slug($data){
        return self::match($data, self::$_rules['slug']);
    }
    /**
     * 检验数据是不是只是字母
     *
     * @param sring $data
     * return boolean
     */
    public static function alpha($data){
        return self::match($data, self::$_rules['alpha']);
    }
    /*
     * 检查数据是否为大于零的整数
     * @param int $data
     */
    public static function isInt($data){
        return self::match($data, self::$_rules['int']);
    }
    /*
      * 检查是不是正确的手机
      * @param int $data
      */
    public static function isMobile($data){
        return self::match($data, self::$_rules['mobile']);
    }
    /*
      * 检查是不是正确的固话
      */
    public static function isPhone($data){
        return self::match($data, self::$_rules['phone']);
    }
    /*
     * 检查数据是否为日期格式
     * @param string $data
     */
    public static function isDate($data){
        return self::match($data, self::$_rules['date']);
    }
    /*
     * 检查数据是否为正确的email格式
      * @param string $data
     */
    public static function isEmail($data){
        return self::match($data, self::$_rules['email']);
    }
    /*
     * 检查数据是否为正确的电话格式(包含手机和固话)
     */
    public static function isTel($data){
        return (self::isPhone($data) || self::isMobile($data));
    }
    /*
     * 检查给定两个数据是否相等
     *
     * @param string $data1,$data2
     */
    public static function equal($data1, $data2){
        return $data1 === $data2;
    }
    /*
     * 检查是不是规范的URL地址
     *
     * @param string $url
     */
    public static function isUrl($url){
        return self::match($url,self::$_rules['url']);
    }
    /*
     * 检查数据是否匹配给定的模式
     *
     * @param string $data
     * @param string $re
     */
    public static function match($data, $re){
        return preg_match($re, $data);
    }

}