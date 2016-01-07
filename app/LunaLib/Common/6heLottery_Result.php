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
        $this->_odds = defaultCache::cache_6he_types();
    }
}