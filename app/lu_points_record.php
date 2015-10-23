<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class lu_points_record extends Model {
    protected $fillable=['uid','userName','addType','lotteryType','touSn','winSn','oldPoint','changePoint','newPoint','created'];
	//

}
