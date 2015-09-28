<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class lu_user extends Model implements BillableContract,AuthenticatableContract,CanResetPasswordContract{
    use Billable;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    use Authenticatable, CanResetPassword;

    protected $table = 'lu_users';

    protected $fillable = ['name', 'email', 'is_admin',
        'password', 'sex', 'phone', 'status', 'inSite', 'recUser', 'realName', 'qq', 'alipay_account', 'cashPwd'];

    protected $hidden = ['id','password', 'remember_token'];

}
