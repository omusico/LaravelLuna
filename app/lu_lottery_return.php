<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class lu_lottery_return extends Model {

	//
    protected $fillable = ['siteId','uid','userName','odds','created','amounts','optUid','optUser','lotId','returnDay'];

}
