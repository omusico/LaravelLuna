<?php
namespace App\LunaLib\Common;

class SixheLottery_Result
{
    private $_BOSE_codes = array(
        'r' => array('01', '02', '07', '08', '12', '13', '18', '19', '23', '24', '29', '30', '34', '35', '40', '45', '46'),
        'b' => array('03', '04', '09', '10', '14', '15', '20', '25', '26', '31', '36', '37', '41', '42', '47', '48'),
        'g' => array('05', '06', '11', '16', '17', '21', '22', '27', '28', '32', '33', '38', '39', '43', '44', '49'),
        'dan' => array('01', '03', '05', '07', '09', '11', '13', '15', '17', '19', '21', '23', '25', '27', '29', '31', '33', '35', '37', '39', '41', '43', '45', '47', '49'),
        'shuang' => array('02', '04', '06', '08', '10', '12', '14', '16', '18', '20', '22', '24', '26', '28', '30', '32', '34', '36', '38', '40', '42', '44', '46', '48'),
        'hedan' => array('01', '03', '05', '07', '09', '12', '14', '16', '18', '21', '23', '25', '27', '29', '30', '32', '34', '36', '38', '41', '43', '45', '47', '49'),
        'heshuang' => array('02', '04', '06', '08', '10', '11', '13', '15', '17', '19', '20', '22', '24', '26', '28', '31', '33', '35', '37', '39', '40', '42', '44', '46', '48'),
        'da' => array('25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49'),
        'xiao' => array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24'),
        'heda' => array('07', '08', '09', '16', '17', '18', '19', '25', '26', '27', '28', '29', '34', '35', '36', '37', '38', '39', '43', '44', '45', '46', '47', '48', '49'),
        'hexiao' => array('01', '02', '03', '04', '05', '06', '10', '11', '12', '13', '14', '15', '20', '21', '22', '23', '24', '30', '31', '32', '33', '40', '41', '42'),
    );

    private $_odds = array();

    /**
     * 构造函数
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->_odds = defaultCache::cache_6he_types();
    }

    //处理大小，单双
    public function specialOpera($weiValue, $value)
    {
        if ($value == "单" && in_array($weiValue, $this->_BOSE_codes['dan'])) {
            return true;
        } elseif ($value == "双" && in_array($weiValue, $this->_BOSE_codes['shuang'])) {
            return true;
        } elseif ($value == "大" && in_array($weiValue, $this->_BOSE_codes['da'])) {
            return true;
        } elseif ($value == "小" && in_array($weiValue, $this->_BOSE_codes['xiao'])) {
            return true;
        } elseif ($value == "合单" && in_array($weiValue, $this->_BOSE_codes['hedan'])) {
            return true;
        } elseif ($value == "合双" && in_array($weiValue, $this->_BOSE_codes['heshuang'])) {
            return true;
        } elseif ($value == "合大" && in_array($weiValue, $this->_BOSE_codes['heda'])) {
            return true;
        } elseif ($value == "合小" && in_array($weiValue, $this->_BOSE_codes['hexiao'])) {
            return true;
        } elseif ($value == "红波" && in_array($weiValue, $this->_BOSE_codes['r'])) {
            return true;
        } elseif ($value == "蓝波" && in_array($weiValue, $this->_BOSE_codes['b'])) {
            return true;
        } elseif ($value == "绿波" && in_array($weiValue, $this->_BOSE_codes['g'])) {
            return true;
        } else {
            return false;
        }

    }

    //处理半波
    public function banboOpera($weiValue, $value)
    {
        if ($value == "红小" && in_array($weiValue, $this->_BOSE_codes['xiao']) && in_array($weiValue, $this->_BOSE_codes['r'])) {
            return true;
        } elseif ($value == "红大" && in_array($weiValue, $this->_BOSE_codes['da']) && in_array($weiValue, $this->_BOSE_codes['r'])) {
            return true;
        } elseif ($value == "红单" && in_array($weiValue, $this->_BOSE_codes['dan']) && in_array($weiValue, $this->_BOSE_codes['r'])) {
            return true;
        } elseif ($value == "红双" && in_array($weiValue, $this->_BOSE_codes['shuang']) && in_array($weiValue, $this->_BOSE_codes['r'])) {
            return true;
        } elseif ($value == "蓝小" && in_array($weiValue, $this->_BOSE_codes['xiao']) && in_array($weiValue, $this->_BOSE_codes['b'])) {
            return true;
        } elseif ($value == "蓝大" && in_array($weiValue, $this->_BOSE_codes['da']) && in_array($weiValue, $this->_BOSE_codes['b'])) {
            return true;
        } elseif ($value == "蓝单" && in_array($weiValue, $this->_BOSE_codes['dan']) && in_array($weiValue, $this->_BOSE_codes['b'])) {
            return true;
        } elseif ($value == "蓝双" && in_array($weiValue, $this->_BOSE_codes['shuang']) && in_array($weiValue, $this->_BOSE_codes['b'])) {
            return true;
        } elseif ($value == "绿小" && in_array($weiValue, $this->_BOSE_codes['xiao']) && in_array($weiValue, $this->_BOSE_codes['g'])) {
            return true;
        } elseif ($value == "绿大" && in_array($weiValue, $this->_BOSE_codes['da']) && in_array($weiValue, $this->_BOSE_codes['g'])) {
            return true;
        } elseif ($value == "绿单" && in_array($weiValue, $this->_BOSE_codes['dan']) && in_array($weiValue, $this->_BOSE_codes['g'])) {
            return true;
        } elseif ($value == "绿双" && in_array($weiValue, $this->_BOSE_codes['shuang']) && in_array($weiValue, $this->_BOSE_codes['g'])) {
            return true;
        } else {
            return false;
        }

    }

    public
    function typeTM_TMA($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
//        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];
        $value = 0;

//        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[6], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        //特码
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[6], $codes);
        }
        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_TMB($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

//        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[6], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        //特码
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[6], $codes);
        }
        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_PM($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr, $codes);

        // 必须都不相同
        if ($postion) {
            if ($postion >= 0 && $postion < 17) {
                $handle = true;
            }
        }
//        if ($handle == false) {
//            $handle = $this->specialOpera($codeArr[1], $codes);
//        }
        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_PM1($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

//        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[0], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[0], $codes);
        }

        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_PM2($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

//        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[1], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[1], $codes);
        }

        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_PM3($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

        //$codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[2], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[2], $codes);
        }

        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_PM4($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

        //$codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[3], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[3], $codes);
        }

        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_PM5($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

        //$codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[4], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[4], $codes);
        }

        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_PM6($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

        //$codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[5], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }
        if ($handle == false) {
            $handle = $this->specialOpera($codeArr[5], $codes);
        }

        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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

    public
    function typeTM_BANBO($codeArr, $winPre, $row)
    {
        $codes = $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

        //$codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr[6], $codes);

        // 必须都不相同
        if ($postion === 0) {
            $handle = true;
        }

        if ($handle == false) {
            $handle = $this->banboOpera($codeArr[6], $codes);
        }

        $lunaFunction = new LunaFunctions();
        if ($handle) { //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data = array(
                'userName' => CommonClass::safeString($row['userName']),
                'amount' => CommonClass::price($amount),
                'created' => $_SERVER['REQUEST_TIME'],
                '2' => 2,
                'dateSn' => $lunaFunction->create_order_no($row['uid']),
                'code' => $row['codes'],
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
    private
    function _removeCheckedValue($arr, $v)
    {
        foreach ($arr as $k => $val) {
            if ($v == $val) {
                unset($arr[$k]);
                break;
            }
        }
        return $arr;
    }

    private
    function transValue($value)
    {
        $qian = array(" ", "　", "\t", "\n", "\r");
        $hou = array("", "", "", "", "");
        $value = str_replace($qian, $hou, $value);
        return $value;
    }
}