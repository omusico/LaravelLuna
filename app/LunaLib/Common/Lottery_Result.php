<?php
namespace App\LunaLib\Common;
class Lottery_Result
{
    private $_HZ_codes = array(
        'a' => array(3, 5, 7, 9, 11, 13, 15, 17),
        'b' => array(4, 6, 8, 10, 12, 14, 16, 18),
        'c' => array(3, 4, 5, 6, 7, 8, 9, 10),
        'd' => array(11, 12, 13, 14, 15, 16, 17, 18)
    );
    private $_odds = array();

    /**
     * 构造函数
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->_odds = defaultCache::cache_k3_odds();
    }

    /**
     * 获取赔率
     *
     * @return int
     */
    private function _getOdds($type, $value)
    {
        $odds = (isset($this->_odds[$type][$value])) ? intval($this->_odds[$type][$value]) : 1;
        return $odds;
    }

    /**
     * 获取赔率 %
     *
     * @return int
     */
    private function _perOdds($odd)
    {
        //return $odd / 100;
        return $odd;
    }

    /**
     * 和值
     *
     * @return mixed
     */
    public function typeHZ($codeArr, $winPre, $row)
    {
        /* 	$bb = var_export ( $row, true );
    //     	$str1 = mb_convert_encoding($bb, "utf-8", "gbk");
            $str1 = iconv("utf-8","gb2312",$bb);
            $cc = var_export($codeArr,true);
            $str2 = iconv("utf-8","gb2312",$cc);
            file_put_contents ( __WAF_ROOT__ . '/kj.log',  'time:' . date ( 'Y-m-d h:i:s', Waf_Time ) . ';$codeArr:' . $str1 . ';$winPre.'.$winPre.'$row:'.$str2, FILE_APPEND );
              */
        $value = intval($codeArr[0]) + intval($codeArr[1]) + intval($codeArr[2]); //值
        $handle = false;
        $odds = $this->_getOdds('HZ', $value);
        if (Validator::isInt($row['codes'])) {
            if ($value == $row['codes']) $handle = true;
        } else {
            if ($row['codes'] == '单' && in_array($value, $this->_HZ_codes['a'])) {
                $odds = $this->_odds['HZ'][19];
                $handle = true;
            } elseif ($row['codes'] == '双' && in_array($value, $this->_HZ_codes['b'])) {
                $odds = $this->_odds['HZ'][20];
                $handle = true;
            } elseif ($row['codes'] == '小' && in_array($value, $this->_HZ_codes['c'])) {
                $odds = $this->_odds['HZ'][21];
                $handle = true;
            } elseif ($row['codes'] == '大' && in_array($value, $this->_HZ_codes['d'])) {
                $odds = $this->_odds['HZ'][22];
                $handle = true;
            }
        }
        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $value,
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
            return $data;
        }
        return false;
    }

    /**
     * 移除已经验证过的CODE 防止重复验证
     * @param $arr
     * @param $v
     * @return mixed
     */
    private function _removeCheckedValue($arr, $v)
    {
        foreach ($arr as $k => $val) {
            if ($v == $val) {
                unset($arr[$k]);
                break;
            }
        }
        return $arr;
    }


    /**
     * 2不同号
     *
     * @return mixed
     */
    public function type2BTH($codeArr, $winPre, $row)
    { //选择2个号码进行投注，与开奖号码的任意2位一致

        $bb = var_export($codeArr, true);
        $cc = var_export($row, true);
//     	file_put_contents(__WAF_ROOT__.'/kaijing.log','$codeArr:'.$bb.';row:'.$cc,FILE_APPEND);


        $codes = explode(',', $row['codes']);
        $handle = 0;
        if (in_array(trim($codes[0]), $codeArr)) {
            $handle += 1;
            $codeArr = $this->_removeCheckedValue($codeArr, $codes[0]);
        }
        if (in_array(trim($codes[1]), $codeArr)) {
            $handle += 1;
            $codeArr = $this->_removeCheckedValue($codeArr, $codes[0]);
        }
        unset($codeArr);
        $value = $codes[0] + $codes[1];
        $data = array();
        if ($handle >= 2) { //中了
            $lunaFunction = new LunaFunctions();
            //$odds = $this->_odds['2BTH']['value'];
            //$totals = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }
        return $data;
    }

    /**
     * 2同号单选
     *
     * @return mixed
     */
    public function type2THDX($codeArr, $winPre, $row)
    { //选择1个相同号码和1个不同号码投注，选号与开奖号码一致
        $value = $codeArr[0] + $codeArr[1] + $codeArr[2];
        list($two, $c) = explode('#', $row['codes']);
        $a = $two{0};
        $b = $two{1};
        unset($two);
        $args = array_count_values(array($a, $b, $c));
        $winCode = array_count_values($codeArr);
        unset($a, $b, $c);
        $data = array();
        ksort($args);
        ksort($winCode);
        if ($args === $winCode) { //中了
            $lunaFunction = new LunaFunctions();
            //$odds = $this->_odds['2THDX']['value'];
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }
        return $data;
    }

    /**
     * 2同号复选
     *
     * @return mixed
     */
    public function type2THFX($codeArr, $winPre, $row)
    { //开奖号码的任意2位，与您投注的二同号一致即中奖
        $handle = 0;
        $data = array();
        //$codes = str_replace('*' ,'' ,$row['codes']);
        //$codes = (string)$codes;
        /*foreach($codeArr as $val){
            if(in_array($val ,array($codes[0] ,$codes[1]))){
                $handle+=1;
            }
        }*/
        $codes = (string)$row['codes'];
        $keyCode = $codes{0};
        $winCode = array_count_values($codeArr);
        $value = $codeArr[0] + $codeArr[1] + $codeArr[2];
        //$odds = $this->_odds['2THFX']['value'];
        //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
        if (isset($winCode[$keyCode]) && $winCode[$keyCode] >= 2) {
            $lunaFunction = new LunaFunctions();
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }
        return $data;
    }

    /**
     * 3连号通选
     *
     * @return mixed
     */
    public function type3LHTX($codeArr, $winPre, $row)
    { //当开奖号为三连号（123,234,345,456）中任意一个即中奖
        $compare = array(123, 234, 345, 456);
        $code = $codeArr[0] . $codeArr[1] . $codeArr[2];
        $data = array();
        $value = $codeArr[0] + $codeArr[1] + $codeArr[2];
        if (in_array(intval($code), $compare)) {
            $lunaFunction = new LunaFunctions();
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }
        return $data;
    }

    /**
     * 3不同号
     *
     * @return mixed
     */
    public function type3BTH($codeArr, $winPre, $row)
    { //选择3个号码投注，当开奖号码各位均不同，且与投注号码一致

        $buyLottery = $row['codes'];
        $qian = array(" ", "　", "\t", "\n", "\r");
        $hou = array("", "", "", "", "");
        $buyLottery = str_replace($qian, $hou, $buyLottery);

        $codes = explode(',', $buyLottery);
        $handle = 0;
        $data = array();
        $value = $codeArr[0] + $codeArr[1] + $codeArr[2];
        $diff = Waf_Common::getArrayDiff($codeArr, $codes);
        if (empty($diff)) {
            $lunaFunction = new LunaFunctions();
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }
        return $data;
    }

    /**
     * 3同号单选
     *
     * @return mixed
     */
    public function type3THDX($codeArr, $winPre, $row)
    { //当开奖号码与您投注的三同号一致即中奖
        $code = $codeArr[0] . $codeArr[1] . $codeArr[2];
        $value = $codeArr[0] + $codeArr[1] + $codeArr[2];
        $data = array();
        if ($code == $row['codes']) {
            $lunaFunction = new LunaFunctions();
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }
        return $data;
    }

    /**
     * 3同号通选
     *
     * @return mixed
     */
    public function type3THTX($codeArr, $winPre, $row)
    { //当开奖号为三同号（111,222,333,444,555,666）中任意一个即中奖
        $compare = array(111, 222, 333, 444, 555, 666);
        $code = $codeArr[0] . $codeArr[1] . $codeArr[2];
        $value = $codeArr[0] + $codeArr[1] + $codeArr[2];
        $data = array();
        if (in_array(intval($code), $compare)) {
            $lunaFunction = new LunaFunctions();
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }
        return $data;
    }

    public function typeTX($codeArr, $winPre, $row)
    {
        // 豹子,顺子,对子,三不同
        $iswin = false;
        $data = array();
        if ($row['codes'] == '豹子' &&
            count(array_unique($codeArr)) == 1
        ) {
            $iswin = true;
        } else if ($row['codes'] == '对子' &&
            count(array_unique($codeArr)) == 2
        ) {
            $iswin = true;
        } else if ($row['codes'] == '三不同' &&
            count(array_unique($codeArr)) == 3
        ) {
            $iswin = true;
        } else if ($row['codes'] == '顺子') {

            sort($codeArr);
            $value = implode(',', $codeArr);
            if (in_array($value, array("1,2,3", "2,3,4", "3,4,5", "4,5,6"))) {
                $iswin = true;
            }
        }

        if ($iswin) {
            $lunaFunction = new LunaFunctions();
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                'siteId' => 1,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => trim($winPre),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => $row['bingoPrice']
            );
        }

        return $data;
    }

}