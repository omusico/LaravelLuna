<?php
namespace App\LunaLib\Common;
class SscLottery_Result
{
    private $_odds = array();

    /**
     * 构造函数
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->_odds = defaultCache::cache_ssc_odds();
    }

    /**
     * 获取赔率
     *
     * @return int
     */
    private function _getOdds($type, $value = 'value')
    {
        $odds = (isset($this->_odds[$type][$value])) ? ($this->_odds[$type][$value]) : 1;
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
     * 二星和值
     * $codeArr 开奖号码
     * $winPre 期数
     * $row 数据库
     *
     * @return mixed
     */
    public function typeTABHZ_EXHZ($codeArr, $winPre, $row)
    {
        $v = intval($codeArr[3]) + intval($codeArr[4]); //值
        $handle = false;

        if (Validator::isInt($row['codes'])) {
            if ($v == $row['codes'])
                $handle = true;
        } else {
            $qiancode = $row['codes'];

            if ($qiancode == '单' && $v % 2 == 1) {
                $odds = $this->_odds['TABHZ_EXHZ']['dan'];
                $handle = true;
            } elseif ($qiancode == '双' && $v % 2 == 0) {
                $odds = $this->_odds['TABHZ_EXHZ']['shuang'];
                $handle = true;
            } elseif ($qiancode == '小' && $v <= 9) {
                $odds = $this->_odds['TABHZ_EXHZ']['xiao'];
                $handle = true;
            } elseif ($qiancode == '大' && $v > 9) {
                $odds = $this->_odds['TABHZ_EXHZ']['da'];
                $handle = true;
            }
        }
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            return $this->getResult($handle, $row, $amount, $codeArr);
        }
        return false;
    }


    /**
     * 首尾和值
     * $codeArr 开奖号码
     * $winPre 期数
     * $row 数据库
     *
     * @return mixed
     */
    public function typeTABHZ_SWHZ($codeArr, $winPre, $row)
    {
        $value = intval($codeArr[0]) + intval($codeArr[4]); //值
        $handle = false;

        if (Validator::isInt($row['codes'])) {
            if ($value == $row['codes'])
                $handle = true;
        } else {
            $qiancode = $row['codes'];
            if (in_array($qiancode, array('单', '双', '大', '小'))) {
                if ($qiancode == '单' && $value % 2 == 1) {
                    $odds = $this->_odds['TABHZ_SWHZ']['dan'];
                    $handle = true;
                } elseif ($qiancode == '双' && $value % 2 == 0) {
                    $odds = $this->_odds['TABHZ_SWHZ']['shuang'];
                    $handle = true;
                } elseif ($qiancode == '小' && $value <= 9) {
                    $odds = $this->_odds['TABHZ_SWHZ']['xiao'];
                    $handle = true;
                } elseif ($qiancode == '大' && $value > 9) {
                    $odds = $this->_odds['TABHZ_SWHZ']['da'];
                    $handle = true;
                }
            } else if (strstr($row['codes'], "#")) {

                list($qiantype, $dwcode) = explode("#", $row['codes']);
                $i = substr($qiantype, 3, 1);

                $v = (int)$codeArr[$i - 1];

                if ($dwcode == '单' && $v % 2 == 1) {
                    $odds = $this->_odds['TABHZ_SWHZ']['dwdan'];
                    $handle = true;
                } elseif ($dwcode == '双' && $v % 2 == 0) {
                    $odds = $this->_odds['TABHZ_SWHZ']['dwshuang'];
                    $handle = true;
                } elseif ($dwcode == '小' && $v < 5) {
                    $odds = $this->_odds['TABHZ_SWHZ']['dwxiao'];
                    $handle = true;
                } elseif ($dwcode == '大' && $v >= 5) {
                    $odds = $this->_odds['TABHZ_SWHZ']['dwda'];
                    $handle = true;
                }
            }

        }
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            return $this->getResult($handle, $row, $amount, $codeArr);
        }
        return false;
    }


    /**
     * 三星和值
     * $codeArr 开奖号码
     * $winPre 期数
     * $row 数据库
     *
     * @return mixed
     */
    public function typeTABHZ_SXHZ($codeArr, $winPre, $row)
    {
        $v = intval($codeArr[2]) + intval($codeArr[3]) + intval($codeArr[4]); //值
        $handle = false;

        if (Validator::isInt($row['codes'])) {
            if ($v == $row['codes']) {
                $handle = true;
            }
        } else {
            $qiancode = $row['codes'];

            if ($qiancode == '单' && $v % 2 == 1) {
                $odds = $this->_odds['TABHZ_SXHZ']['dan'];
                $handle = true;
            } elseif ($qiancode == '双' && $v % 2 == 0) {
                $odds = $this->_odds['TABHZ_SXHZ']['shuang'];
                $handle = true;
            } elseif ($qiancode == '小' && $v <= 13) {
                $odds = $this->_odds['TABHZ_SXHZ']['xiao'];
                $handle = true;
            } elseif ($qiancode == '大' && $v > 13) {
                $odds = $this->_odds['TABHZ_SXHZ']['da'];
                $handle = true;
            }
        }
        $amount = $row['bingoPrice'];
        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 五星直选  .. 按顺序都一样.
    public function typeTABWX_WXZHIX($codeArr, $winPre, $row)
    {
        $handle = false;
        $codes = explode(",", $this->transValue($row['codes']));
        $amount = 0;
        $hm = array(
            explode("*", $codes[0]),
            explode("*", $codes[1]),
            explode("*", $codes[2]),
            explode("*", $codes[3]),
            explode("*", $codes[4])
        );

        if (in_array($codeArr[0], $hm[0]) &&
            in_array($codeArr[1], $hm[1]) &&
            in_array($codeArr[2], $hm[2]) &&
            in_array($codeArr[3], $hm[3]) &&
            in_array($codeArr[4], $hm[4])
        ) {

            $handle = true;
            $zhusu = count($hm[0]) * count($hm[1]) * count($hm[2]) * count($hm[3]) * count($hm[4]);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABWX_WXZHIX", "value");
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 五星通选
    public function typeTABWX_WXTX($codeArr, $winPre, $row)
    {
        $kjNum = $this->getQCodes($codeArr, 5);
        $codes = explode(",", $this->transValue($row['codes']));
//     	$diff = count(CommonClass::getArrayDiff($kjNum,$codes));
        $handle = false;
        $amount = 0;
        $hm = array(
            explode("*", $codes[0]),
            explode("*", $codes[1]),
            explode("*", $codes[2]),
            explode("*", $codes[3]),
            explode("*", $codes[4]),
        );

        $zhusu = count($hm[0]) * count($hm[1]) * count($hm[2]) * count($hm[3]) * count($hm[4]);

        $result = array(0, 0, 0, 0, 0);

        if (in_array($codeArr[0], $hm[0])) {
            $result[0] = 1;
        }

        if (in_array($codeArr[1], $hm[1])) {
            $result[1] = 1;
        }

        if (in_array($codeArr[2], $hm[2])) {
            $result[2] = 1;
        }

        if (in_array($codeArr[3], $hm[3])) {
            $result[3] = 1;
        }

        if (in_array($codeArr[4], $hm[4])) {
            $result[4] = 1;
        }

        if (array_sum($result) == 5) {
            $handle = true;
            $amount = $row['bingoPrice'] / $zhusu;
        } else if ($result[0] + $result[1] + $result[2] == 3 ||
            $result[2] + $result[3] + $result[4] == 3
        ) {
            $handle = true;
            $amount = $row['eachPrice'] * 116 / $zhusu; // 100 倍
        } else if ($result[0] + $result[1] == 2 ||
            $result[3] + $result[4] == 2
        ) {
            $handle = true;
            $amount = $row['eachPrice'] * 16 / $zhusu;
        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 前二直选
    public function typeTABEX_QEZHIX($codeArr, $winPre, $row)
    {
        $handle = false;
        $amount = 0;
        $codes = explode(",", $this->transValue($row['codes']));
        $hm = array(
            explode("*", $codes[0]),
            explode("*", $codes[1])
        );

        if (in_array($codeArr[0], $hm[0]) &&
            in_array($codeArr[1], $hm[1])
        ) {

            $handle = true;
            $zhusu = count($hm[0]) * count($hm[1]);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABEX_QEZHIX", "value");

        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 后二直选
    public function typeTABEX_HEZHIX($codeArr, $winPre, $row)
    {
        $handle = false;
        $amount = 0;
        $codes = explode(",", $this->transValue($row['codes']));
        $hm = array(
            explode("*", $codes[0]),
            explode("*", $codes[1])
        );

        if (in_array($codeArr[3], $hm[0]) &&
            in_array($codeArr[4], $hm[1])
        ) {

            $handle = true;
            $zhusu = count($hm[0]) * count($hm[1]);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABEX_HEZHIX", "value");
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 前二组二  从0～9中选2个或多个号码，选号与奖号前二位相同（顺序不限，不含对子号）即中奖
    public function typeTABEX_QEZUE($codeArr, $winPre, $row)
    {
        $handle = false;
        $amount = 0;
        $kjNum = array($codeArr[0], $codeArr[1]);
        $codes = explode(",", $this->transValue($row['codes']));

        $count = count(array_unique($kjNum));
        if ($count == 2) {

            if (in_array($codeArr[0], $codes)
                && in_array($codeArr[1], $codes)
            ) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds('TABEX_QEZUE', 'value');
            }

        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 后二组二
    public function typeTABEX_HEZUE($codeArr, $winPre, $row)
    {

        $kjNum = array($codeArr[3], $codeArr[4]);
        $codes = explode(",", $this->transValue($row['codes']));
        $handle = false;
        $amount = 0;
        $count = count(array_unique($kjNum));
        if ($count == 2) {
            if (in_array($codeArr[3], $codes)
                && in_array($codeArr[4], $codes)
            ) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds('TABEX_HEZUE', 'value');
            }

        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 前三直选
    public function typeTABSXZHIX_QSZHIX($codeArr, $winPre, $row)
    {
        $codes = explode(",", $this->transValue($row['codes']));
        $handle = false;
        $amount = 0;
        $hm = array(
            explode("*", $codes[0]),
            explode("*", $codes[1]),
            explode("*", $codes[2])
        );

        if (in_array($codeArr[0], $hm[0]) &&
            in_array($codeArr[1], $hm[1]) &&
            in_array($codeArr[2], $hm[2])
        ) {

            $handle = true;
            $zhusu = count($hm[0]) * count($hm[1]) * count($hm[2]);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZHIX_QSZHIX", "value");

        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 中三直选
    public function typeTABSXZHIX_ZSZHIX($codeArr, $winPre, $row)
    {
        $codes = explode(",", $this->transValue($row['codes']));
        $handle = false;
        $amount = 0;
        $hm = array(
            explode("*", $codes[0]),
            explode("*", $codes[1]),
            explode("*", $codes[2])
        );

        if (in_array($codeArr[1], $hm[0]) &&
            in_array($codeArr[2], $hm[1]) &&
            in_array($codeArr[3], $hm[2])
        ) {

            $handle = true;
            $zhusu = count($hm[0]) * count($hm[1]) * count($hm[2]);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZHIX_ZSZHIX", "value");

        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 后三直选
    public function typeTABSXZHIX_HSZHIX($codeArr, $winPre, $row)
    {
        $codes = explode(",", $this->transValue($row['codes']));
        $handle = false;
        $amount = 0;
        $hm = array(
            explode("*", $codes[0]),
            explode("*", $codes[1]),
            explode("*", $codes[2])
        );

        if (in_array($codeArr[2], $hm[0]) &&
            in_array($codeArr[3], $hm[1]) &&
            in_array($codeArr[4], $hm[2])
        ) {

            $handle = true;
            $zhusu = count($hm[0]) * count($hm[1]) * count($hm[2]);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZHIX_HSZHIX", "value");

        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 前三组三  开奖号码前三位任意两位号码相同，如188。投注号码包含开奖号码前三位即中奖， 如买18 。。开118 .或者 188 都中奖
    public function typeTABSXZUX_QSZUX($codeArr, $winPre, $row)
    {
        $kjNum = $this->getQCodes($codeArr, 3);
        $handle = false;
        $amount = 0;
        $kjNum = array_unique($kjNum);

        $count = count($kjNum);
        $codes = explode(",", $this->transValue($row['codes']));
        if ($count == 2) {
            $handle = true;
            foreach ($kjNum as $n) {
                if (!in_array($n, $codes)) {
                    $handle = false;
                }
            }

            if ($handle) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZUX_QSZUX", "value");

            }
        }

        if ($count == 1) {
            if (in_array($kjNum[0], $codes)) {
                $handle = true;

                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZUX_QSZUX", "value");

            }
        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 中三组选
    public function typeTABSXZUX_ZSZUX($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[1], $codeArr[2], $codeArr[3]);
        $handle = false;
        $amount = 0;
        $kjNum = array_unique($kjNum);
        $count = count($kjNum);

        $codes = explode(",", $this->transValue($row['codes']));
        if ($count == 2) {
            $handle = true;
            foreach ($kjNum as $n) {
                if (!in_array($n, $codes)) {
                    $handle = false;
                }
            }

            if ($handle) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZUX_ZSZUX", "value");

            }
        }

        if ($count == 1) {
            if (in_array($kjNum[0], $codes)) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZUX_ZSZUX", "value");

            }
        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 后三组选
    public function typeTABSXZUX_HSZUX($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[2], $codeArr[3], $codeArr[4]);
        $kjNum = array_unique($kjNum);
        $count = count($kjNum);
        $codes = explode(",", $this->transValue($row['codes']));
        $handle = false;
        $amount = 0;
        if ($count == 2) {
            $handle = true;
            foreach ($kjNum as $n) {
                if (!in_array($n, $codes)) {
                    $handle = false;
                }
            }

            if ($handle) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZUX_HSZUX", "value");

            }
        }

        if ($count == 1) {
            if (in_array($kjNum[0], $codes)) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 2);
                $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABSXZUX_HSZUX", "value");

            }
        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 前三组六  开奖号码前三位号码各不相同，如135。投注号码包含开奖号码前三位即中奖
    public function typeTABSXZUX_QSZUL($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[0], $codeArr[1], $codeArr[2]);
        $codes = explode(",", $this->transValue($row['codes']));
        $count = count(array_unique($kjNum));
        $handle = false;
        $amount = 0;
        if ($count == 3) { // 3不同

            if (in_array($codeArr[0], $codes) &&
                in_array($codeArr[1], $codes) &&
                in_array($codeArr[2], $codes)
            ) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 3);
                $amount = CommonClass::price(($row['eachPrice'] / $zhusu)) * $this->_getOdds("TABSXZUX_QSZUL", "value");
            }
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 中三组六
    public function typeTABSXZUX_ZSZUL($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[1], $codeArr[2], $codeArr[3]);
        $codes = explode(",", $this->transValue($row['codes']));
        $count = count(array_unique($kjNum));
        $handle = false;
        $amount = 0;
        if ($count == 3) { // 3不同

            if (in_array($codeArr[1], $codes) &&
                in_array($codeArr[2], $codes) &&
                in_array($codeArr[3], $codes)
            ) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 3);
                $amount = CommonClass::price(($row['eachPrice'] / $zhusu)) * $this->_getOdds("TABSXZUX_ZSZUL", "value");
            }
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 组三直选
    public function typeTABSXZUX_ZUSZHIX($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[2], $codeArr[3], $codeArr[4]);
        $codes = explode(",", $this->transValue($row['codes']));
        $count = count(array_unique($kjNum));
        $handle = false;
        $amount = 0;
        if ($count == 2) {
            list($two, $c) = explode('#', $row['codes']);
            $a = $two{0};
            $b = $two{1};
            unset($two);
            $args = array_count_values(array($a, $b, $c));
            $winCode = array_count_values($kjNum);
            if ($args == $winCode) {
                $handle = true;
            }
        }

        $amount = $row['bingoPrice'];

        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    // 后三组六
    public function typeTABSXZUX_HSZUL($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[2], $codeArr[3], $codeArr[4]);
        $codes = explode(",", $this->transValue($row['codes']));
        $count = count(array_unique($kjNum));
        $handle = false;
        $amount = 0;
        if ($count == 3) { // 3不同

            if (in_array($codeArr[2], $codes) &&
                in_array($codeArr[3], $codes) &&
                in_array($codeArr[4], $codes)
            ) {
                $handle = true;
                $zhusu = $this->getNum(count($codes), 3);
                $amount = CommonClass::price(($row['eachPrice'] / $zhusu)) * $this->_getOdds("TABSXZUX_HSZUL", "value");
            }
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 组三包选. 中奖号码3位数中有任意两位数字相同，且投注号码与中奖号码的数字相同， 顺序不限  56112 12
    public function typeZSBX($codeArr, $winPre, $row)
    {
        // 根据位数看下有几组.
        $codes = explode(",", $this->transValue($row['codes']));
        $handle = false;
        $amount = 0;
        $kjNum = array($codeArr[2], $codeArr[3], $codeArr[4]);
        $tempNum = array_unique($kjNum);
        $count = count(array_unique($kjNum));
        $zjCount = 0;
        $zj = false;
        if ($count == 2) { // 对子
            $zuheArr = CommonClass::getCombinationToString($codes, 2);
            $zhusu = count($zuheArr);
            foreach ($zuheArr as $v) {
                $v = explode(",", $v);
                $c = CommonClass::getArrayDiff($tempNum, $v);
                if (count($c) == 0) {
                    $handle = true;
                    $zjCount++;
                }
            }
        }

        if ($handle) {
            $amount = ($row['eachPrice'] / $zhusu) * $zjCount * $this->_getOdds("ZSBX", "value");
        }

        return $this->getResult($handle, $row, $amount, $codeArr);

    }


    //组六包选 开奖号码后三位数字各不相同，所选号码包含开奖号码后三位（顺序不限），每注奖金190元
    public function typeZLBX($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[2], $codeArr[3], $codeArr[4]);
        $codes = explode(",", trim($row['codes']));
        $count = count(array_unique($kjNum));
        $handle = false;
        $amount = 0;
        if ($count == 3) {
            $zuheArr = CommonClass::getCombinationToString($codes, 3);
            $zhusu = count($zuheArr);
            foreach ($zuheArr as $v) {
                $v = explode(",", $v);
                $diff = count(CommonClass::getArrayDiff($kjNum, $v));
                if ($diff == 0) {
                    $handle = true;
                    break;
                }
            }
        }

        $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("ZLBX", "value");
        return $this->getResult($handle, $row, $amount, $codeArr);
    }


    // 牛牛 任何三位相加尾数为0 的为牛，剩余2为相加的尾数为点数
    public function typeTABNN_NN($codeArr, $winPre, $row)
    {
        $kjNum = array($codeArr[2], $codeArr[3], $codeArr[4]);
        $codes = trim($row['codes']);
        $wf = array("牛一包选" => 1, "牛二包选" => 2, "牛三包选" => 3, "牛四包选" => 4,
            "牛五包选" => 5, "牛六包选" => 6, "牛七包选" => 7, "牛八包选" => 8,
            "牛九包选" => 9, "牛牛包选" => 0, "杂牌包选" => -1);
        $handle = false;
        $amount = 0;
        $yy = false;
        $zuheArr = CommonClass::getCombinationToString($codeArr, 3);
        $result = array();
        foreach ($zuheArr as $v) {
            $v = explode(",", $v);
            if (array_sum($v) % 10 == 0) {
                $result = $this->minuArr($codeArr, $v);
                $yy = true;
                break;
            }
        }

        $key = $wf[$codes];
        if ($yy) {
            if (array_sum($result) % 10 == $key) {
                $handle = true;
            }
        }

        if ($key == -1 && !$yy) {
            $handle = true;
        }

        $amount = $row['bingoPrice'];
        return $this->getResult($handle, $row, $amount, $codeArr);

    }


    // 第一位
    public function typeTABDW_YI($codeArr, $winPre, $row)
    {

        $codes = $this->transValue($row['codes']);
        $handle = false;
        $amount = 0;
        $codes = explode(",", $codes);
        if (in_array($codeArr[0], $codes)) {
            $handle = true;
            $zhusu = count($codes);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABDW_YI", "value");
        }

        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    public function typeTABDW_ER($codeArr, $winPre, $row)
    {

        $codes = $this->transValue($row['codes']);
        $handle = false;
        $amount = 0;
        $codes = explode(",", $codes);
        if (in_array($codeArr[1], $codes)) {
            $handle = true;
            $zhusu = count($codes);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABDW_ER", "value");
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    public function typeTABDW_SAN($codeArr, $winPre, $row)
    {

        $codes = $this->transValue($row['codes']);
        $handle = false;
        $amount = 0;
        $codes = explode(",", $codes);
        if (in_array($codeArr[2], $codes)) {
            $handle = true;
            $zhusu = count($codes);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABDW_SAN", "value");
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    public function typeTABDW_SI($codeArr, $winPre, $row)
    {

        $codes = $this->transValue($row['codes']);
        $handle = false;
        $amount = 0;
        $codes = explode(",", $codes);
        if (in_array($codeArr[3], $codes)) {
            $handle = true;
            $zhusu = count($codes);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABDW_SI", "value");
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    public function typeTABDW_WU($codeArr, $winPre, $row)
    {

        $codes = $this->transValue($row['codes']);
        $handle = false;
        $amount = 0;
        $codes = explode(",", $codes);
        if (in_array($codeArr[4], $codes)) {
            $handle = true;
            $zhusu = count($codes);
            $amount = ($row['eachPrice'] / $zhusu) * $this->_getOdds("TABDW_WU", "value");
        }
        return $this->getResult($handle, $row, $amount, $codeArr);
    }

    public function minuArr($sour, $des)
    {
        $result = $sour;
        foreach ($result as $k => $v) {
            foreach ($des as $i => $d) {
                if ($v == $d) {
                    unset($result[$k]);
                    unset($des[$i]);
                    break;
                }
            }
        }
        return $result;
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

    private function transValue($value)
    {
        $qian = array(" ", "　", "\t", "\n", "\r");
        $hou = array("", "", "", "", "");
        $value = str_replace($qian, $hou, $value);
        return $value;
    }

    // 获取前面几位的值
    private function getQCodes($codeAttr, $position)
    {
        $qCode = array_slice($codeAttr, 0, $position);
        return $qCode;
//     	return implode(",", $qCode);
    }


    public function getHCodes($codeAttr, $position)
    {
        $qCode = array_slice($codeAttr, 0, $position);
        return $qCode;
    }


    // 获取前十猜冠军等的赔率
    public function getQsOdds($type, $matchCount)
    {

        return $this->odds[$type][$matchCount];

    }

    // 判断两个数组位置相同的个数. 后面那个个数比较小
    public function sameCount($arr1, $arr2)
    {
        $count = 0;
        foreach ($arr2 as $k => $v) {
            if ($arr1[$k] == $v) {
                $count++;
            }
        }
        return $count;
    }

    public function getResult($handle, $row, $amount, $kjNum, $matchCount = 0)
    {

        $data = array();
        $value = array_sum($kjNum);
        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);

            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                'siteId' => 3,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
                'uid' => $row['uid'],
                'sumVal' => (int)$value,
                'typeId' => (int)$row['typeId'],
                'proName' => $row['proName'],
                'resultNum' => implode(",", $kjNum),
                'eachPrice' => $row['eachPrice'],
                'bingoPrice' => CommonClass::price($amount),
                'matchCount' => $matchCount
            );
            return $data;
        }
        return false;
    }

    public function getNum($n, $m)
    {

        $t = $n;
        $mm = 1;
        while ($t >= $n - $m + 1) {
            $mm = $mm * $t;
            $t--;
        }

        $tt = $m;
        $nn = 1;
        while ($tt >= 1) {
            $nn = $nn * $tt;
            $tt--;
        }

        return $mm / $nn;
    }


}