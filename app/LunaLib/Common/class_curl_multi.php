<?php
/*
 * Curl 多线程类
 * 使用方法：
 * ========================
 * $urls = array("http://baidu.com", "http://dzone.com", "http://google.com");
 * $mp = new MultiHttpRequest($urls);
 * $mp->start();
 * ========================
 * 当然，如果你喜欢，还可以对此类进行扩展，
 * 比如，如果需要用户登录才能采集的数据怎么办？
 * 只要我们使用 curl 来做伪登录，把 cookie 保存到文件，
 * 每次请求发送有效的 cookie 即可实现伪登录抓去数据！
 */
namespace App\LunaLib\Common;

class MultiHttpRequest
{

    public $urls = array();

    public $curlopt_header = 0;

    public $method = "GET";
    
    function __construct($urls = false)
    {
        $this->urls = $urls;
    }

    function set_urls($urls)
    {
        $this->urls = $urls;
        return $this;
    }

    function is_return_header($b)
    {
        $this->curlopt_header = $b;
        return $this;
    }

    function set_method($m)
    {
        $this->medthod = strtoupper($m);
        return $this;
    }

    function start()
    {

        if (! is_array($this->urls) or count($this->urls) == 0) {
            return false;
        }
        $curl = $text = array();
        $handle = curl_multi_init();
//         var_dump($this->urls); 
       
        foreach ($this->urls as $k => $v) {
            $curl[$k] = $this->add_handle($handle, $v);
        }
        
        $this->exec_handle($handle);
        foreach ($this->urls as $k => $v) {
        	
    		
        	$error = curl_error($curl[$k]);
        	if( $error != ""){
//        		file_put_contents(__WAF_ROOT__.'/net_error.log', 'time:'.date('Y-m-d H:i:s').''. $k." :".$error.PHP_EOL,FILE_APPEND);
//                log::error($error);
        	}
//         	if("" != $error && strpos($error, "Timed out")){
        	if("" != $error && strpos($error, "out")){
        		
        		$text[$k] = false;
//        		$cache = Waf::model('Common/cache');

        		$data = array(
        			$k => array(
        			 "created" => strtotime("now"),
        			 "time" => date('Y-m-d H:i:s')
        		)
        		);

//        		$cache->updateXlNetInfo($data);
        		curl_multi_remove_handle($handle, $curl[$k]);
        		continue;
        	} 
        	
            $text[$k] = curl_multi_getcontent($curl[$k]);

            
            
             //$coding=mb_detect_encoding($text[$k]);
//              var_dump("being:".$text[$k]);
             
             if(! mb_check_encoding($text[$k], 'utf-8')) {
             	$text[$k] = mb_convert_encoding($text[$k],'UTF-8','gbk');
             }
             
           /*  if(!is_utf8($text[$k]))
            {
                $text[$k] = iconv("", "UTF-8", $text[$k]);
            } */
            curl_multi_remove_handle($handle, $curl[$k]);
//             var_dump("after:".$text[$k]);
        }
        curl_multi_close($handle);
        return $text;
    }

    private function add_handle($handle, $url)
    {
        $useragent = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, $useragent);
        curl_setopt($curl, CURLOPT_HEADER, $this->curlopt_header);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($curl, CURLOPT_TIMEOUT,12);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,11);
        curl_multi_add_handle($handle, $curl);
        return $curl;
    }



    private function exec_handle($handle)
    {
        $flag = null;
        do {
            curl_multi_exec($handle, $flag);
//             echo 'dddddddddddddddddddddddddddddddddddd'.PHP_EOL;
        } while ($flag > 0 );   
        
      /*   do {
        	$mrc = curl_multi_exec($mh,$active);
        	echo 'dddddddddddddddddddddddddddddddddddd'.PHP_EOL;
        	
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        while ($active and $mrc == CURLM_OK) {
        	if (curl_multi_select($mh) != -1) {
        		do {
        			$mrc = curl_multi_exec($mh, $active);
        		} while ($mrc == CURLM_CALL_MULTI_PERFORM);
        	}
        } */
        
    }

    public function get_content($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($url, CURLOPT_HTTPHEADER,array('Accept-Encoding: gzip, deflate'));
        curl_setopt($url, CURLOPT_ENCODING, 'gzip,deflate');
        return curl_exec($ch);
    }
}

function is_utf8($str)
{
    $c = 0;
    $b = 0;
    $bits = 0;
    $len = strlen($str);
    for ($i = 0; $i < $len; $i ++) {
        $c = ord($str[$i]);
        if ($c > 128) {
            if (($c >= 254))
                return false;
            elseif ($c >= 252)
                $bits = 6;
            elseif ($c >= 248)
                $bits = 5;
            elseif ($c >= 240)
                $bits = 4;
            elseif ($c >= 224)
                $bits = 3;
            elseif ($c >= 192)
                $bits = 2;
            else
                return false;
            if (($i + $bits) > $len)
                return false;
            while ($bits > 1) {
                $i ++;
                $b = ord($str[$i]);
                if ($b < 128 || $b > 191)
                    return false;
                $bits --;
            }
        }
    }
    return true;
}