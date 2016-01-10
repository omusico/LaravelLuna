<?php
namespace App\LunaLib\Common;

class SixheLottery_Result
{
    private $_BOSE_codes = array(
        'r' => array('01','02','07','08','12','13','18','19','23','24','29','30','34','35','40','45','46'),
        'b' => array('03','04','09','10','14','15','20','25','26','31','36','37','41','42','47','48'),
        'g' => array('05','06','11','16','17','21','22','27','28','32','33','38','39','43','44','49')
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

    public function typeTM_TMA($codeArr,$winPre ,$row){
        $codes =  $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

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

    public function typeTM_TMB($codeArr,$winPre ,$row){

        $codes =  $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

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

    public function typeTM_PM($codeArr,$winPre ,$row){
        $codes =  $this->transValue($row['codes']);
        $handle = 0;
        $data = array();
        $value = 0;

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

    public function typeTM_PM1($codeArr,$winPre ,$row){

    }

    public function typeTM_PM2($codeArr,$winPre ,$row){

    }

    public function typeTM_PM3($codeArr,$winPre ,$row){

    }

    public function typeTM_PM4($codeArr,$winPre ,$row){

    }
    public function typeTM_PM5($codeArr,$winPre ,$row){

    }

    public function typeTM_PM6($codeArr,$winPre ,$row){

    }

    public function typeTM_BANBO($codeArr,$winPre ,$row){

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
}