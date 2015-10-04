<?php
/**
 * Created by PhpStorm.
 * User: zhongzichao
 * Date: 10/4/15
 * Time: 10:50 AM
 */

namespace App;


use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Tests\DependencyInjection\ContainerAwareHttpKernelTest;

class CommonClass {

    public static function cache($name,$isfresh){
        if("user_groups" == $name){
            if(Cache::has("user_groups") && $isfresh!=1){
                return Cache::get("user_groups");
            }else{
                $result = lu_user_group::all(["groupId","name"]);
                $lu_user_groups = $result->toArray();
                Cache::forever("user_groups",$lu_user_groups);
                return $lu_user_groups;
            }

        }
    }
}