<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class lu_user_group extends Model {

    protected $table ='lu_user_groups';

    protected $fillable=['name','intro','acls','admin'];

//    protected $hidden =['groupId'];
}
