<?php
namespace App\LunaLib\Common;
class FiveLottery_Result{
    private $_HZ_codes = array(
        'a'=>array(15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45),
        'b'=>array(16,18,20,22,24,26,28,30,32,34,36,38,40,42,44),
        'c'=>array(15,16,17,18,19,20,21,22,23,24,25,26,27,28,29),
        'd'=>array(30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45)
    );




    private $_odds = array();
    /**
     * 构造函数
     *
     * @return mixed
     */
    public function __construct(){
        $this->_odds = defaultCache::cache_five_odds();
    }
    /**
     * 获取赔率
     *
     * @return int
     */
    private function _getOdds($type ,$value){
        $odds = (isset($this->_odds[$type][$value])) ? intval($this->_odds[$type][$value]) : 1;
        return $odds;
    }
    /**
     * 获取赔率 %
     *
     * @return int
     */
    private function _perOdds($odd){
        //return $odd / 100;
        return $odd;
    }
    /**
     * 和值
     * $codeArr 开奖号码
     * $winPre 期数
     * $row 数据库
     *
     * @return mixed
     */
    public function typeHZ($codeArr,$winPre ,$row){
        $value = intval($codeArr[0])+intval($codeArr[1])+intval($codeArr[2]) + intval($codeArr[3]) + intval($codeArr[4]); //值
        $handle = false;
        $odds = $this->_getOdds('HZ' ,$value);
        if(Validator::isInt($row['codes'])){
            if($value == $row['codes']) $handle = true;
        }else{
            if($row['codes']=='单' && in_array($value ,$this->_HZ_codes['a'])){
                $odds = $this->_odds['HZ']['dan'];
                $handle = true;
            }elseif($row['codes']=='双' && in_array($value ,$this->_HZ_codes['b'])){
                $odds = $this->_odds['HZ']['shuang'];
                $handle = true;
            }elseif($row['codes']=='小' && in_array($value ,$this->_HZ_codes['c'])){
                $odds = $this->_odds['HZ']['xiao'];
                $handle = true;
            }elseif($row['codes']=='大' && in_array($value ,$this->_HZ_codes['d'])){
                $odds = $this->_odds['HZ']['da'];
                $handle = true;
            }

            if( strstr($row['codes'],"#") ){
                list($qiantype,$qiancode) = explode("#", $row['codes']);
                /* switch($qiancode){
                    case '单':
                        $key = '50'; break;
                    case '双':
                        $key = '51'; break;
                    case '大':
                        $key = '52';break;
                    case '小':
                        $key = '53'; break;
                } */

                $i = substr($qiantype,3,1);
//             	$hz = 0;
                /* for($j=0;$j<$i;$j++){
                    $hz = $hz + (int)$attr[$j];
                } */
                $v = (int)$codeArr[$i-1];

                if( $qiancode =='单' && $v%2 == 1){
                    $odds = $this->_odds['HZ']['qdan'];
                    $handle = true;
                }elseif( $qiancode =='双' && $v%2 == 0){
                    $odds = $this->_odds['HZ']['qshuang'];
                    $handle = true;
                }elseif( $qiancode =='小' && $v <=5 ){
                    $odds = $this->_odds['HZ']['qxiao'];
                    $handle = true;
                }elseif($qiancode =='大' && $v > 5 ){
                    $odds = $this->_odds['HZ']['qda'];
                    $handle = true;
                }

            }

        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$value,
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;
    }

    /**
     * 任选1
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX1($codeArr,$winPre ,$row){

        $handle = false;
        $data = array();
        $codes = $this->transValue($row['codes']);
        if( in_array($codes, $codeArr)){
            $handle = true;
        }
        $value = intval($codeArr[0]);
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;

    }

    /**
     * 任选2
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX2($codeArr,$winPre ,$row){
        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;


        if(in_array($codes[0],$codeArr)){
            $handle+=1;
            $winCode = $this->_removeCheckedValue($winCode ,$codes[0]);
        }
        if(in_array($codes[1],$codeArr)){
            $handle+=1;
            $winCode = $this->_removeCheckedValue($winCode ,$codes[0]);
        }
        $value = $codes[0]+$codes[1];
        $data = array();
        $lunaFunction = new LunaFunctions();
        if($handle>=2){ //中了
            //$odds = $this->_odds['2BTH']['value'];
            //$totals = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
        }
        return $data;

    }

    /**
     * 任选3
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX3($codeArr,$winPre ,$row){

        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];
        $diff = CommonClass::getArrayDiff($codeArr,$codes);
        $lunaFunction = new LunaFunctions();
        if( count($diff)  == 2){
            //$odds = $this->_odds['3BTH']['value'];
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
        }
        return $data;
    }

    /**
     * 任选4
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX4($codeArr,$winPre ,$row){
        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];
        $diff = CommonClass::getArrayDiff($codeArr,$codes);
        // 必须都不相同
        if( count($diff) == 1){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;




    }

    /**
     * 任选5
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX5($codeArr,$winPre ,$row){

        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];
        $diff = CommonClass::getArrayDiff($codeArr,$codes);
        // 必须都不相同
        if( count($diff) == 0){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;

    }

    /**
     * 任选6
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX6($codeArr,$winPre ,$row){

        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];
        $diff = CommonClass::getArrayDiff($codeArr,$codes);
        // 必须都不相同
        if( count($diff) == 1){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;

    }

    /**
     * 任选7
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX7($codeArr,$winPre ,$row){

        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];
        $diff = CommonClass::getArrayDiff($codeArr,$codes);
        // 必须都不相同
        if( count($diff) == 2){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;

    }

    /**
     * 任选8
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeRX8($codeArr,$winPre ,$row){

        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];
        $diff = CommonClass::getArrayDiff($codeArr,$codes);
        // 必须都不相同
        if( count($diff) == 3){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;
    }


    /**
     * 前一
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeQY($codeArr,$winPre ,$row){

        $codes =  $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];

        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr,$codes);

        // 必须都不相同
        if( $postion === 0){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;
    }


    /**
     * 前二组选  不需要顺序
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeQEZU($codeArr,$winPre ,$row){

        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];

        $one = array($codes[0],$codes[1]);
        $two  = array($codeArr[0],$codeArr[1]);
        $diff = count(CommonClass::getArrayDiff($one,$two));
        // 必须都不相同
        if( $diff == 0){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;
    }


    /**
     * 前二直选  顺序一致
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeQEZHI($codeArr,$winPre ,$row){

        $codes =  $this->transValue($row['codes']);

        $codes = str_replace("#",",",$codes);
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];

        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr,$codes);

        // 必须都不相同
        if( $postion === 0){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;
    }


    /**
     * 前三组选  不需要顺序
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeQSZU($codeArr,$winPre ,$row){

        $codes = explode(',' ,$this->transValue($row['codes']));
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];

        $one = array($codes[0],$codes[1],$codes[2]);
        $two  = array($codeArr[0],$codeArr[1],$codeArr[2]);
        $diff = count(CommonClass::getArrayDiff($one,$two));
        // 必须都不相同
        if( $diff == 0){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
            );
            return $data;
        }
        return false;
    }


    /**
     * 前三直选  顺序一致
     * @param unknown $codeArr
     * @param unknown $winPre
     * @param unknown $row
     */
    public function typeQSZHI($codeArr,$winPre ,$row){

        $codes =  $this->transValue($row['codes']);
        $codes = str_replace("#",",",$codes);
        $handle = 0;
        $data = array();
        $value = $codeArr[0]+$codeArr[1]+$codeArr[2] + $codeArr[3] + $codeArr[4];

        $codeArr = implode(",", $codeArr);

        $postion = stripos($codeArr,$codes);

        // 必须都不相同
        if( $postion === 0){
            $handle = true;
        }
        $lunaFunction = new LunaFunctions();
        if($handle){ //中了
            //$eachPrice = $row['eachPrice'] * $this->_perOdds($odds);
            $amount = $row['bingoPrice'];
            $data=array(
                'userName'=>CommonClass::safeString($row['userName']),
                'amount'=>CommonClass::price($amount),
                'created'=>$_SERVER['REQUEST_TIME'],
                '2'=>2,
                'dateSn'=>$lunaFunction->create_order_no($row['uid']),
                'code'=>$row['codes'],
                'uid'=>$row['uid'],
                'sumVal'=>(int)$value,
                'typeId'=>(int)$row['typeId'],
                'proName'=>trim($winPre),
                'eachPrice'=>$row['eachPrice'],
                'bingoPrice'=>$row['bingoPrice']
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
    private function _removeCheckedValue($arr ,$v){
        foreach($arr as $k=>$val){
            if($v==$val){
                unset($arr[$k]);
                break;
            }
        }
        return $arr;
    }

    private function transValue($value){
        $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
        $value = str_replace($qian,$hou,$value);
        return $value;
    }

    private function switchPosition(){

    }




}