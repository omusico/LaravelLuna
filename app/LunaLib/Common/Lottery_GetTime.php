<?php
namespace App\LunaLib\Common;
class Lottery_GetTime{
	
	private $_urls = null;
	
	public function __construct(){
		$this->_urls = defaultCache::cache_lottery_url();//Waf::moduleData('lottery_url','lottery');
	}
	
	
	
	
	
	/**
	 * 老快3
	 */
	
	public function getTimeForJSOLD(){
		
		$js = $this->_urls['jsold'] ['js'];
		$servierTime = $this->_urls['jsold'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['jsold'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['jsold'][$js]['awardSeconds'];
		
		
		if( $js == 'k3'){
			$content = CommonClass::getUrlContent($servierTime); //{"issuse":"20140502-48","bettime":"407"}
		} else if ($js == 'cll' ){
			$content = $this->getTimeFromCll($servierTime,$awardInfo,$awardSeconds);
		} else if ($js == 'wy' ){
			$content = $this->getTimeFromWY($servierTime,$awardSeconds);
		}

		return $content;
	}
	
	public function getTimeForJSNEW(){
		$js = $this->_urls['jsnew'] ['js'];
		$servierTime = $this->_urls['jsnew'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['jsnew'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['jsnew'][$js]['awardSeconds'];
		
		if ($js == 'wy' ){
			$content = $this->getTimeFromWY($servierTime,$awardSeconds);
		}
		
		return $content;
	}
	
	public function getTimeForNEWYY(){
		$js = $this->_urls['newyy'] ['js'];
		$servierTime = $this->_urls['newyy'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['newyy'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['newyy'][$js]['awardSeconds'];
	
		if ($js == 'wy' ){
			$content = $this->getTimeFromWY($servierTime,$awardSeconds);
		}
	
		return $content;
	}
	
	/**
	 * 安微
	 */
	public function getTimeForANHUI(){
		$js = $this->_urls['anhui'] ['js'];
		$servierTime = $this->_urls['anhui'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['anhui'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['anhui'][$js]['awardSeconds'];
		// 彩乐乐
		if($js == 'cll' ){
			$content = $this->getTimeFromCll($servierTime,$awardInfo,$awardSeconds);
			return $content;
		} else {
			return '未找到配置接口,请联系管理员';
		}
	}
	
	/**
	 * 吉林
	 */
	public function getTimeForJILIN(){
		$js = $this->_urls['jilin'] ['js'];
		$servierTime = $this->_urls['jilin'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['jilin'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['jilin'][$js]['awardSeconds'];
		// 彩乐乐
		if($js == 'cll' ){
			$content = $this->getTimeFromCll($servierTime,$awardInfo,$awardSeconds);
			return $content;
		} else {
			return '未找到配置接口,请联系管理员';
		}
		
	}
	
	/**
	 * 湖北
	 */
	public function getTimeForHUBEI(){
		$js = $this->_urls['hubei'] ['js'];
		$servierTime = $this->_urls['hubei'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['hubei'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['hubei'][$js]['awardSeconds'];
		// 彩乐乐
		if($js == 'wy' ){
			$content = $this->getTimeFromWY($servierTime,$awardSeconds);
			return $content;
		} else  {
			return '未找到配置接口,请联系管理员';
		}
	
	}
	// 快乐彩
	public function getTimeForHappy(){
		$js = $this->_urls['happy'] ['js'];
		$servierTime = $this->_urls['happy'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['happy'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['happy'][$js]['awardSeconds'];
		// 彩乐乐
		if($js == 'wy' ){
			$content = $this->getTimeFromWY($servierTime,$awardSeconds);
			return $content;
		} else  {
			return '未找到配置接口,请联系管理员';
		}
	}
	
	public function getTimeForNMG(){
		$js = $this->_urls['nmg'] ['js'];
		$servierTime = $this->_urls['nmg'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['nmg'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['nmg'][$js]['awardSeconds'];
		// 彩乐乐
		if($js == 'wy' ){
			$content = $this->getTimeFromWY($servierTime,$awardSeconds);
			return $content;
		} else  {
			return '未找到配置接口,请联系管理员';
		}
	}
	
	public function getTimeForHEBEI(){
		$js = $this->_urls['hebei'] ['js'];
		$servierTime = $this->_urls['hebei'] [$js] ['qqServerTime'];
		$awardInfo = $this->_urls['hebei'] [$js] ['getAwardInfo'];
		$awardSeconds = $this->_urls['hebei'][$js]['awardSeconds'];
		// 彩乐乐
		if($js == 'k39' ){
			$content = $this->getTimeFromK39($servierTime,$awardSeconds);
			return $content;
		} else  {
			return '未找到配置接口,请联系管理员';
		}
	
	}
	
	/**
	 * 彩乐乐
	 * @param unknown $servierTime
	 * @param unknown $awardInfo
	 */
	public function getTimeFromCll($servierTime,$awardInfo,$awardSeconds){
		 $result = CommonClass::getByCrul($awardInfo, null);
//		$str = mb_convert_encoding($result, "utf-8", "gb2321");
        $str = $result;
		$json = json_decode($str);
		
		$currentTerm = $json -> currentTerm;  // 140502056
		$openTerm = $json -> openTerm;
		if( $currentTerm - $openningTerm == 2 ){
			$time = "";
		} else {
			$serverTime = CommonClass::getByCrul($servierTime, null);
			$serverTime = json_decode($serverTime);
			if( $serverTime != null ){
				$time = round(($json->currentTermEndDTByLong - $serverTime->serverTimeByLong) / 1000);
			} else {
				$time = "";
			}
			
		}
		
		$date = substr($currentTerm,0,6);
		$term = substr($currentTerm,7,8);
		$issuse =  '20'.$date.'-'.$term;
		
		$content = '{"issuse":"'.$issuse.'","bettime":"'.$time.'","awardSeconds":'.$awardSeconds.'}';
		return $content; 
	}
	
	
	public function getTimeFromWY($servierTime,$awardSeconds){
		 $content1= CommonClass::getByCrul($servierTime);
//		$str1 = mb_convert_encoding($content1, "utf-8", "gb2321");
        $str1 = $content1;
		$tt1=json_decode($str1,true);
		if( $tt1 != null){
			$time= round($tt1["nextSecondsLeft"]/1000);
			$currentTerm = $tt1["currentPeriod"];  // 140705005
			
			// 		$currentTerm = '20140705005';
			$cc = substr($currentTerm, 0,2);
			if( $cc != '20' ){
				// 20140705005
				$date = substr($currentTerm,0,6);
				$term = substr($currentTerm,6,3	);
				$issuse = '20'. $date.'-'.$term;
			} else {
				$date = substr($currentTerm,0,8);
				$term = substr($currentTerm,8,3	);
				$issuse =  $date.'-'.$term;
			}
			
			$content = '{"issuse":"'.$issuse.'","bettime":'.$time.',"awardSeconds":'.$awardSeconds.'}';
			return $content;
			
		} else {
			return '{"issuse":"","bettime":"","awardSeconds":'.$awardSeconds.'}';
		}
		
	}
	
	public function getTimeFromK39($servierTime,$awardSeconds){
		$content1= CommonClass::getByCrul($servierTime);
//		$str1 = mb_convert_encoding($content1, "utf-8", "gb2321");
        $str1 = $content1;
		$tt1=json_decode($str1,true);
		if( $tt1 !=null ){
			$time= round($tt1["gmsj"]);
			$currentTerm = $tt1["gmqh"];  // 140705005
			$date = substr($currentTerm,0,6);
			$term = substr($currentTerm,7,8);
			$issuse =  '20'.$date.'-'.$term;
			$content = '{"issuse":"'.$issuse.'","bettime":'.$time.',"awardSeconds":'.$awardSeconds.'}';
			return $content;
		} else {
			return '{"issuse":"","bettime":"","awardSeconds":'.$awardSeconds.'}';
		}
		
	}
	
}