<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class lu_user extends Model implements AuthenticatableContract,CanResetPasswordContract{


    use Authenticatable, CanResetPassword;

    protected $table = 'lu_users';

    protected $fillable = ['name', 'email', 'is_admin','invite',
        'password', 'sex', 'phone', 'status', 'inSite', 'recUser', 'realName', 'qq', 'alipay_account', 'cashPwd','groupId','level'];

    protected $hidden = ['password', 'remember_token'];

    public function lu_user_data(){
        return $this->hasOne('App\lu_user_data','uid','id');
    }

    protected static function rules()
    {
        return [
            'name' => 'required|alpha_dash|unique:lu_users',
//            'password' => 'required',
            'email' => 'email|unique:lu_users',
            'qq' => 'integer|unique:lu_users',
            'phone' => 'digits:11|unique:lu_users',
            'cashPwd'=>'digits_between:4,4',
        ];
    }

}
