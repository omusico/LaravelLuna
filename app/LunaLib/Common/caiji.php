<?php
/*
 * Curl 多线程类
 * 使用方法：
 * ========================
	$urls = array("http://baidu.com", "http://dzone.com", "http://google.com");
	$mp = new MultiHttpRequest($urls);
	$mp->start();
 * ========================
 * 当然，如果你喜欢，还可以对此类进行扩展，
 * 比如，如果需要用户登录才能采集的数据怎么办？
 * 只要我们使用 curl 来做伪登录，把 cookie 保存到文件，
 * 每次请求发送有效的 cookie 即可实现伪登录抓去数据！
 */
namespace App\LunaLib\Common;
require_once 'class_curl_multi.php';
class Caiji {
    var $base_url;//要采集的网址
    var $list_page=array();//要采集的分页
    var $detail_rule=array();//详细页规则
    var $list_page_rule;//详细页连接规则
    var $from=1;
    var $list_urls=array();
    var $mp;
    function __construct($list_page=null,$from=0,$list_page_rule=null)
    {
        $this->list_page=$list_page; 
        $this->from=$from;
        if($this->from==1)
        {
            if(empty($list_page_rule))
            {
                die('请设置详细页网址规则');
            }
            $this->list_page_rule=$list_page_rule;
            $this->getListUrls();
        }
        $this->mp=new MultiHttpRequest();  
    }
    public function getListUrls()
    {
        foreach ($this->list_page as $link) {
            // 解析列表页数
            preg_match_all('/\[(.*)\]/i', $link, $_page);
            $pages = explode('-', $_page[1][0]);
            for ($i = $pages[0]; $i <= $pages[1] ; $i ++) {
                $this->list_urls[] = preg_replace('/\[(.*)\]/i', $i, $link);
            }
        }
        return $this->list_urls;
    }
    

    public function parse()
    {
        $this->mp->set_urls($this->list_urls);
        $contents = $this->mp->start();

//         file_put_contents(__WAF_ROOT__.'/cj_data.log', 'time:'.date('Y-m-d H:i:s')." :".$contents.PHP_EOL,FILE_APPEND);
        log::info($contents.FILE_APPEND);
        foreach($contents as $content)
        {
            $content=$this->_prefilter($content);
            preg_match_all('/'.str_replace('/', '\/', addslashes($this->list_page_rule)).'/i',$content,$pregArr);
            $detail_urls = array();
            foreach($pregArr[1] as $detail_key=>$detail_value){
                if(strpos($detail_value, "http://")===false)
                {
                    $detail_value=$this->base_url.$detail_value;
                }
               $detail_urls[]=$detail_value;
            }
            $this->parseResult($detail_urls);//一个分页处理一次结果
        }
    }
    public function parseResult($urls=array())
    {
        $this->mp->set_urls($urls);
        $contents=$this->mp->start();

        $result=array();
        foreach($contents as $k=>$content)
        {
            $content=$this->_prefilter($content);
            $goods=array();
            $goods['url']=$urls[$k];
//             var_dump(count($this->detail_rule));
            if( !isset($this->detail_rule) || count($this->detail_rule) == 0){
            	$result[] = $content; 
            	continue;
            }  

            foreach($this->detail_rule as $key=>$val)
            {
                $attr_var=$key;
                if(strpos($val, "(.*?)")!==false)
                {
                    $pattern=str_replace('/', '\/', addslashes($val));
                    $pattern=str_replace(array('{','}','[',']','|'), array('\{','\}','\[','\]','\|'), $pattern);
                }
                else 
                {
                    $pattern=str_replace('/', '\/',$val);
                }
                if(preg_match('/__(\w+)__/i', $pattern,$matches))
                {
                    $pattern=str_replace($matches[0], $$matches[1], $pattern);
                }
                $pattern='/'.$pattern.'/i';
                preg_match_all($pattern,$content,$detailArr);
                if($key=='preOpenResult')
                {
                    if(substr_count($pattern, '(.*?)')==3)
                    {
                        $goods['preOpenResult']=implode(",", array($detailArr[1][0],$detailArr[2][0],$detailArr[3][0]));
                    }
                    elseif(substr_count($pattern, '(.*?)')==5)
                    {
                        $goods['preOpenResult']=implode(",", array($detailArr[1][0],$detailArr[2][0],$detailArr[3][0],$detailArr[4][0],$detailArr[5][0]));
                    }
                    else 
                    {
                        $goods['preOpenResult']=$detailArr[1][0];
                    }
                }
                else 
                {
                $goods[$key]=$detailArr[1][0];
                }
                $$attr_var=$goods[$key];
            } 
            $result[]=$goods;
        }
        if(count($result)==1)
        {
            return $result[0];
        }
        else
        {
        return $result;
        }
    }
    // 对抓去到的内容做简单过滤（过滤空白字符，便于正则匹配）
    private function _prefilter($output)
    {
        $output = preg_replace("/\/\/[\S\f\t\v ]*?;[\r|\n]/", "", $output);
        $output = preg_replace("/\<\!\-\-[\s\S]*?\-\-\>/", "", $output);
        $output = preg_replace("/\>[\s]+\</", "><", $output);
        $output = preg_replace("/;[\s]+/", ";", $output);
        $output = preg_replace("/[\s]+\}/", "}", $output);
        $output = preg_replace("/}[\s]+/", "}", $output);
        $output = preg_replace("/\{[\s]+/", "{", $output);
        $output = preg_replace("/([\s]){2,}/", "$1", $output);
        $output = preg_replace("/[\s]+\=[\s]+/", "=", $output);
        return $output;
    }    
    public function setDetailRule($rule)
    {
        $this->detail_rule=$rule;
    }
}