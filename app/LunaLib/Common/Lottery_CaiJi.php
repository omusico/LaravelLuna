<?php
//!defined('__WAF_ROOT__') && die ("Access Denied.");

//Waf::moduleLib('caiji','common');
namespace App\LunaLib\Common;

require_once 'caiji.php';

class Lottery_CaiJi{

	private $cjConfig = null;

	private $caiji;

	public function __construct(){
//		$this->cjConfig = Waf::cache('lottery_cj_config');
        $this->cjConfig = defaultCache::cache_collection_config();
		$this->caiji=new Caiji();
	}

	public function cjData($xl_key,$lotteryType,$js,$config){

		try{
			$config['xl'] = $xl_key;
			switch ($js){
				case 'wy':
					$content = $this->getDataFromWY($config);
					break;
				case 'cjw':
					$content = $this->getDataFromCJW($config);
					break;
				case 'lecai':
					$content = $this->getDataFromLeCai($config);
					break;
				case 'icaile':
					$content = $this->getDataFromiCaiLe($config);
					break;
				case '360cp':
					$content = $this->getDataFrom360($config);
					break;
				case 'beijin':
					$content = $this->getDataFromBeijin($config);
					break;
				case 'sc':
					$content = $this->getDataFromSC($config);
					break;
				case 'wlc':
					$content = $this->getDataFromWLC($config);
					break;
				case 'cll':
					$content = $this->getDataFromCll($config);
					break;
				case 'wy2':
					$content = $this->getDataFromWy2($config);
					break;
				case 'pk10':
					$content = $this->getDataFromPk($config);
					break;
				case 'k39':
					$content = $this->getDataFrom39($config);
					break;
				case 'fj':
					$content = $this->getDataFromFj($config);
					break;
				case 'xjflcp':
					$content = $this->getDataFromXJ($config);
					break;
				case 'tjflcp':
					$content = $this->getDataFromTjflcp($config);
					break;
				default:
					$content = '未配置采集方式';
			}

			return $content;

		}  catch (Exception $e){
			logger($e,"caiji");
			return '采集错误';
		}


	}



	// 获取采集数据  不用了

	public function getCJData($lotteryType){
		$lotteryType = strtolower($lotteryType);
		$js = $this->cjConfig[$lotteryType] ['js'];

		$config = $this->cjConfig[$lotteryType] [$js];
		$config['xl'] = $lotteryType."_".$js;
		switch ($js){
			case 'wy':
			  $content = $this->getDataFromWY($config);
			  break;
			case 'cjw':
			  $content = $this->getDataFromCJW($config);
			  break;
			case 'lecai':
				$content = $this->getDataFromLeCai($config);
				break;
			case 'icaile':
				$content = $this->getDataFromiCaiLe($config);
				break;
			case '360cp':
				$content = $this->getDataFrom360($config);
				break;
			case 'beijin':
				$content = $this->getDataFromBeijin($config);
				break;
			case 'sc':
				$content = $this->getDataFromSC($config);
				break;
			default:
				$content = '未配置采集方式';
		}

		return $content;
	}

    public function postByCurl($url,$data){
        $curl = curl_init();
        $useragent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, $useragent);
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT,10); //timeout on response
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
//     	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;

    }



	public function getDataFromFj($config){
        //todo 要改
		$content = $this->postByCurl("www.fjcp.cn/k3djs.aspx",array("rd"=>0.5326090115122497));
//		$str = mb_convert_encoding($content, "utf-8", "gb2321");
        $str = $content;
		$json  = json_decode($str);
		$result = array();
		$win = $json->kjnum1.','.$json->kjnum2.','.$json->kjnum3;
		$result['preOpenResult'] = $win;
		$currentTerm =$json->qhPast;
		$date = substr($currentTerm,0,4);
		$term = substr($currentTerm,5,3);
		$pre =  date('Y').$date.'-'.$term;
		$result['preTerm'] = $pre;
		return $result;
	}

	public function getDataFromTjflcp($config){

		$startTime = date('Y/m/d').' 00:00:00';
		$endTime =  date('Y/m/d').' 23:59:59';

// 		<b>5</b><b>4</b><b>9</b><b>1</b><b>9</b>
		$xx = Waf_Common::postByCurl("http://www.tjflcpw.com/Handlers/WinMessageHandler.ashx",
				array("currentPage"=>1,
						"pageSize"=>13,
						'playType' => 4,
// 						'startTime' => '2015/06/07 00:00:00',
// 						'endTime' => '2015/06/07 23:59:59'));
						'startTime' => $startTime,
						'endTime' => $endTime));
		//     	var_dump($xx);

		$str = mb_convert_encoding($xx, "utf-8", "gb2321");
		$json  = json_decode($str,true);
		$var = $json['WinNumList'][0]['BasicCode'];
		$termCode =$json['WinNumList'][0]['TermCode'];  // 20150607015
		$begin = stripos($var,"<b>");
		$end =   strrpos($var,"</b>");

		$code = (substr($var, $begin,$end - $begin));
		$code =str_replace("<b>","", $code);
		$code = str_replace("</b>",",", $code);
		$result['preOpenResult'] = $code;
		$date = substr($termCode,0,8);
		$term = substr($termCode,8,3);
		$pre =  $date.'-'.$term;
		$result['preTerm'] = $pre;
		return $result;
	}

	public function getDataFrom39($config){
		$this->caiji->setDetailRule(null);
		$detail_urls=array(
				$config['xl']=>$config['url']
		);
		// 		var_dump($config);
		$content=$this->caiji->parseResult($detail_urls);
		$str = mb_convert_encoding($content, "utf-8", "gb2321");
		$json  = json_decode($str);

		$result = array();
		$win = $json->h1.','.$json->h2.','.$json->h3;
		$result['preOpenResult'] = $win;
		$currentTerm =$json->dqqh;
		$date = substr($currentTerm,0,6);
		$term = substr($currentTerm,7,8);
		$pre =  '20'.$date.'-'.$term;
		$result['preTerm'] = $pre;
		return $result;
	}

	// 从财经网中采集数据
	public function getDataFromCJW($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl']=>$config['url'].'?'.time()
		);
		$result=$this->caiji->parseResult($detail_urls);
		return $result;
	}

	// 网易
	public function getDataFromWY($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl']=>$config['url']
		);
		$result=$this->caiji->parseResult($detail_urls);
		$preOpenResult = $result['preOpenResult'];
		$qian=array(" ","　","\t","\n","\r");$hou=array(",",",",",",",",",");
		$preOpenResult = str_replace($qian,$hou,$preOpenResult);
		unset($result['preOpenResult']);
		$result['preOpenResult'] = $preOpenResult;

		return $result;
	}

	public function getDataFromLeCai($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl'] => $config['url']
		);
		$result=$this->caiji->parseResult($detail_urls);
		return $result;
	}

	public function getDataFromiCaiLe($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl'] =>$config['url']
		);
		$result=$this->caiji->parseResult($detail_urls);
		return $result;
	}

	public function getDataFrom360($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl'] =>$config['url'].'?'.time()
		);

		$result=$this->caiji->parseResult($detail_urls);
		if( $result['preOpenResult'] == '?,?,?,?,?' || $result['preOpenResult'] =='?,?,?'){
			$result['preOpenResult'] = "";
		}
		return $result;
	}

	public function getDataFromBeijin($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl']=>$config['url'].'?'.time()
		);
		$result=$this->caiji->parseResult($detail_urls);
// 		var_dump($result);
// 		$result['preTerm'] = str_pad($result['preTerm'],7,'0',STR_PAD_LEFT);
		// 做期数的转换
		return $result;
	}

	public function getDataFromSC($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl']=>$config['url'].'?'.time()
		);
		$result=$this->caiji->parseResult($detail_urls);
		// 		var_dump($result);
		// 		$result['preTerm'] = str_pad($result['preTerm'],7,'0',STR_PAD_LEFT);
		// 做期数的转换
// 		var_dump($result);

		$preOpenResult = $result['preOpenResult'];

		$result['preTerm'] = Waf_Common::strfilter($result['preTerm']);

		$result['preOpenResult'] = str_replace(" ", ",", $result['preOpenResult']);
		$result['preOpenResult'] =  Waf_Common::strfilter($result['preOpenResult']);
		$r = explode("," , $result['preOpenResult']);
		$temp = array();
		foreach ($r as $k=>$v){
			if(strlen($v) == 1){
				$c = str_pad($v,2,'0',STR_PAD_LEFT);
				unset($r[$k]);
				$temp[$k] = $c;
			} else {
				$temp[$k] = $v;
			}
		}

		$result['preOpenResult'] = implode(",", $temp);
		return $result;
	}

	public function getDataFromWLC($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl']=>$config['url'].'?'.time()
		);
		$result=$this->caiji->parseResult($detail_urls);
		// 		var_dump($result);
		// 		$result['preTerm'] = str_pad($result['preTerm'],7,'0',STR_PAD_LEFT);
		// 做期数的转换
		// 		var_dump($result);

		$preOpenResult = $result['preOpenResult'];

		$result['preTerm'] = Waf_Common::strfilter($result['preTerm']);

		$result['preOpenResult'] = str_replace(" ", ",", $result['preOpenResult']);
		$result['preOpenResult'] =  Waf_Common::strfilter($result['preOpenResult']);
		$r = explode("," , $result['preOpenResult']);

		return $result;
	}

	// 新疆
	public function getDataFromXJ($config){
		$this->caiji->setDetailRule(null);
		$detail_urls=array(
				$config['xl']=>$config['url']
		);
		$content=$this->caiji->parseResult($detail_urls);
		$xml = simplexml_load_string($content) ;
// 		var_dump($xml);
		$code = $xml->drawList->code0; // 6|0|4|4|6
		$term =  $xml->drawList->term0; // 2015060702
		$code = str_replace("|",",",$code);
		$date = substr($term,0,8);
		$term = substr($term,8,3);
		$pre =  $date.'-'.$term;
		$result['preTerm'] = $pre;
		$result['preOpenResult'] = (string)$code;
		return $result;
	}


	public function getDataFromCll($config){

		$detail_urls=array(
				$config['xl']=>$config['url']
		);
		$content=$this->caiji->parseResult($detail_urls);
		$xml = simplexml_load_string($content) ;
		foreach ($xml->row[0]->attributes() as $k => $v){
			if($k == 'expect' ){
				$preTerm = $v;
			}
			if( $k == 'opencode'){
				$preOpenResult = $v;
			}
		}
		$cc = substr($preTerm, 0,2);
    		if( $cc != '20'){
    			$date = substr($preTerm,0,6);
    			$term = substr($preTerm,6,3);
    			$pre =  '20'.$date.'-'.$term;
    		} else {
    			$date = substr($preTerm,0,8);
    			$term = substr($preTerm,8,3	);
    			$pre =  $date.'-'.$term;
    		}
		$result['preTerm'] = $pre;
		$result['preOpenResult'] = (string)$preOpenResult;
		return $result;
	}

	public function getDataFromWy2($config){
		$this->caiji->setDetailRule(null);
		$detail_urls=array(
				$config['xl']=>$config['url']
		);
// 		var_dump($config);
		$content=$this->caiji->parseResult($detail_urls);

		$arr = json_decode ($content,true);
// 		var_dump($content);
		$result = array();

		if( $arr ["status"] == 0){
			$preTerm = $arr ["awardNumberInfoList"] [0] ["period"];

			if(strlen($preTerm) == 8){
				$date = substr ( $preTerm, 0, 6 );
				$term = substr ( $preTerm, 6, 2 );
				$preTerm = '20' . $date . '-0' . $term;
				$result['preTerm'] = $preTerm;
			} else if ( strlen($preTerm) == 9){
				$date = substr ( $preTerm, 0, 6 );
				$term = substr ( $preTerm, 6, 3 );
				$preTerm = '20' . $date . '-' . $term;
				$result['preTerm'] = $preTerm;
			} else if ( strlen($preTerm) == 11){ // 20150602037
				$date = substr ( $preTerm, 0, 8 );
				$term = substr ( $preTerm, 8, 3 );
				$preTerm = $date . '-' . $term;
				$result['preTerm'] = $preTerm;
			}

			$win = $arr ["awardNumberInfoList"][0]["winningNumber"];
			if( "等待开奖中" == $win){
				$win = "";
			} else {
				$win = str_replace ( " ", ",", $win );
			}
			$result['preOpenResult'] = $win;
			return $result;
		}
	}


	public function getDataFromPk($config){
		$this->caiji->setDetailRule($config['rule']);
		$detail_urls=array(
				$config['xl'] => $config['url'].'?'.time()
		);
		$result=$this->caiji->parseResult($detail_urls);
		$openCodes = $result['preOpenResult'];
		$openCodes = explode(",", $openCodes);
		$formatCodes = array();
		foreach($openCodes as $k=>$val){
			if(strlen($val) == 1){
				$val = '0'.$val;
			}
			$formatCodes[$k] = $val;
		}
		$openCodes = implode(",", $formatCodes);
		$result['preOpenResult'] = $openCodes;

		return $result;
	}

	// 自动转化北京的期数
	private function convertPeriodForBj(){
		$baseData = array();
		$timeData= get_current_period('beijin');
		$pre = $timeData['pre'];

	}


/* 	public function getTimeFromWY($url){
		$str = Waf_Common::getUrlContentByCrul($url);
// 		echo $str;
		$position = strpos($str,"endPeriod");

// 		echo $str;
		if( $position) {
			$data = substr( $str,$position,23);
			$tmp = explode("=", $data);
			$currentTerm = trim($tmp[1]);
			$str1 = '<tr data-period='.$currentTerm.' data-award="';
			$p1 = strpos($str,$str1);
			$result = substr($str,$p1,49);
			preg_match_all("/\d+/",$result,$mat);
			return $mat[0][1]."," .$mat[0][2] ."," . $mat[0][3];
// 			echo $data;
		} else {

		}
	} */

}