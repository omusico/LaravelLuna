<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class lu_lottery_user extends Model {

    protected $fillable = ['bankName', 'bankCode', 'openBank','userName', 'uid', 'created'];

}
