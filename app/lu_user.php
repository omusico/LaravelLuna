<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class lu_user extends Model implements AuthenticatableContract,CanResetPasswordContract{


    use Authenticatable, CanResetPassword;

    protected $table = 'lu_users';

    protected $fillable = ['name', 'email', 'is_admin',
        'password', 'sex', 'phone', 'status', 'inSite', 'recUser', 'realName', 'qq', 'alipay_account', 'cashPwd'];

    protected $hidden = ['id','password', 'remember_token'];

    protected static function rules()
    {
        return [
            'name' => 'required|alpha_dash|unique:lu_users',
//            'password' => 'required',
            'email' => 'email|unique:lu_users',
            'qq' => 'integer|unique:lu_users',
            'phone' => 'digits:11|unique:lu_users',
        ];
    }

}
