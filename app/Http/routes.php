<?php

/*
|--------------------------------------------------------------------------
| 路由
|--------------------------------------------------------------------------
*/

#测试
Route::get('/test', 'TestController@index');
Route::get('/testmain', 'TestController@adminmain');
Route::post('/test', ['as' => 'test_upload', 'uses' => 'TestController@post']);
Route::get('/users/export', 'TestController@export');
Route::get('users', 'TestController@users');

#主页
Route::get('/', 'WelcomeController@index');
Route::get('index', ['as'=>'index','uses'=>'WelcomeController@index']);

####################################################
#登录，登出, 自动跳转, 密码重置,注册
####################################################
Route::get('login', [
    'middleware' => 'guest', 'as' => 'login', 'uses' => 'loginController@loginGet']);
Route::post('login', [
    'middleware' => 'guest', 'uses' => 'loginController@loginPost']);
Route::get('back/adminlogin', [
    'middleware' => 'guest', 'as' => 'adminlogin','uses' => 'loginController@adminloginGet']);
Route::post('back/adminlogin', [
    'middleware' => 'guest', 'uses' => 'loginController@adminloginPost']);
Route::get('logout', [
    'middleware' => 'auth', 'as' => 'logout', 'uses' => 'loginController@logout']);
Route::get('register', 'registerController@index');
Route::post('register/save', ['as' => 'register_save', 'uses' => 'registerController@store']);

Route::get('dailiregister', 'registerController@dailiregister');
Route::post('dailiregister/save', ['as' => 'dailiregister_save', 'uses' => 'registerController@dailistore']);

Route::controller('password', 'PasswordController');
####################################################
#学生的登录详情(包括资料修改，分数查询)
####################################################
//Route::get('stu/home', [
//    'as' => 'stu_home', 'uses' => 'Stu\StudentController@home']);
//Route::get('stu/edit', [
//    'as' => 'stu_edit', 'uses' => 'Stu\StudentController@edit']);
//Route::post('stu/update', [
//    'as' => 'stu_update', 'uses' => 'Stu\StudentController@update']);

####################################################
#管理员入口(增删改查，上传分数)
####################################################
#会员路由
Route::resource('admin', 'Admin\AdminController');

Route::resource('company','CashController');

Route::resource('companybank','CbankController');

Route::get('adminindex', 'Admin\AdminController@adminindex');
Route::get('bettingList', 'Admin\AdminController@bettingList');
Route::get('bettingcountList', 'Admin\AdminController@bettingcountList');

Route::get('marquee', 'Admin\AdminController@marquee');
Route::get('checkapply', 'Admin\AdminController@checkapply');
Route::get('checkrecharge', 'Admin\AdminController@checkrecharge');
Route::get('checkcompanyrecharge', 'Admin\AdminController@checkcompanyrecharge');
Route::post('savemarquee', 'Admin\AdminController@savemarquee');
Route::get('proxycert', 'Admin\AdminController@proxycert');
Route::post('saveproxycert', 'Admin\AdminController@saveproxycert');
Route::get('k3odds', 'Admin\AdminController@k3odds');
Route::post('savek3odds', 'Admin\AdminController@savek3odds');
Route::get('news', 'Admin\AdminController@news');
Route::post('savenews', 'Admin\AdminController@savenews');
Route::get('userreturns', 'Admin\AdminController@userreturns');
Route::post('saveuserreturns', 'Admin\AdminController@saveuserreturns');
Route::get('getdepositlist','Admin\AdminController@getdepositlist');
Route::get('deposit/{id}/edit','Admin\AdminController@updatedepositstatus');
Route::any('deposit/{id}','Admin\AdminController@deletedeposit');
Route::get('manualrecharge/{id}','Admin\AdminController@manualrecharge');
Route::post('manualupdate','Admin\AdminController@manualupdate');
Route::get('resetpwd','Admin\AdminController@resetpwd');
Route::get('rechargelist','Admin\AdminController@rechargelist');
Route::get('manualkj','Admin\AdminController@manualkj');
Route::post('manualkjPost','Admin\AdminController@manualkjPost');
Route::get('cancelOrder','Admin\AdminController@cancelOrder');
Route::get('cancelOrderSingle/{id}','Admin\AdminController@cancelOrderSingle');
Route::post('cancelOrderPost','Admin\AdminController@cancelOrderPost');
Route::get('manualreturns','Admin\AdminController@manualreturns');
Route::post('manualreturnsPost','Admin\AdminController@manualreturnsPost');

#上传分数
//Route::post('admin/upload_grade', [
//    'as' => 'upload_grade', 'uses' => 'Admin\AdminController@upload_grade']);

####################################################
#管理员下载上传学生名单，成绩表
####################################################
#下载学生名单
//Route::get('download/stuList', [
//    'as' => 'download_stu_list_excel', 'uses' => 'Admin\ExcelController@stuList']);
//Route::get('download/grade', [
//    'as' => 'download_grade_list_excel', 'uses' => 'Admin\ExcelController@grade']);

####################################################
#获取缓存中的数据
####################################################
//Route::get('getGroups',['as'=>'get_user_groups','uses'=>'cacheController@getGroups']);
####################################################
#采集开奖信息
####################################################
Route::get('collectLotteryData', [
    'as' => 'collectLotteryData', 'uses' => 'CollectController@collectLotteryData']);
Route::get('lotteryIndex', [
    'as' => 'lotteryIndex', 'uses' => 'LotteryK3Controller@index']);
Route::get('lotterytrend', [
    'as' => 'lotterytrend', 'uses' => 'LotteryK3Controller@trend']);
Route::any('/lotteryBetting', ['middleware' => 'auth','as' => 'lotteryBetting', 'uses' => 'LotteryK3Controller@betting']);
Route::any('/zhuihao', ['middleware' => 'auth','as' => 'lotteryBetting', 'uses' => 'LotteryK3Controller@zhuihao']);
Route::any('/userLotteryBetting', ['middleware' => 'auth','as' => 'userLotteryBetting', 'uses' => 'User\UserController@userBettingList']);
Route::any('/getaccountdetail', ['middleware' => 'auth','as' => 'getaccountdetail', 'uses' => 'User\UserController@getaccountdetail']);
Route::any('/getLotteryData', ['as' => 'getLotteryDataForQt', 'uses' => 'LotteryK3Controller@getLotteryDataForQt']);
Route::any('/loadRecentResult', ['as' => 'loadRecentResult', 'uses' => 'LotteryK3Controller@loadRecentResult']);
Route::get('/getLotteryWin',['middleware' => 'auth','as'=>'getlotterywin','uses'=>'LotteryK3Controller@getLotteryWin']);
Route::get('/getPointsRecord',['middleware' => 'auth','as'=>'getpointsrecord','uses'=>'LotteryK3Controller@getPointsRecord']);
Route::get('/account',['middleware' => 'auth','as'=>'account','uses'=>'User\UserController@account']);
//Route::get('/deposit',['middleware' => 'auth','as'=>'deposit','uses'=>'User\UserController@deposit']);
Route::get('/bank',['middleware' => 'auth','as'=>'bank','uses'=>'User\UserController@bank']);
Route::post('/savebank',['middleware' => 'auth','as'=>'savebank','uses'=>'User\UserController@savebank']);
Route::get('/editpwd',['middleware' => 'auth','as'=>'editpwd','uses'=>'User\UserController@editpwd']);
Route::post('/editpwdpost',['middleware' => 'guest','as'=>'editpwdpost','uses'=>'User\UserController@editpwdpost']);
Route::post('/saveaccount',['middleware' => 'auth','as'=>'saveaccount','uses'=>'User\UserController@saveaccount']);
Route::get('/getPersonalwin',['middleware' => 'auth','as'=>'getPersonalwin','uses'=>'User\UserController@getPersonalwin']);
//规则明细
Route::get('/k3GameRule',['uses'=>'LotteryK3Controller@k3GameRule']);
Route::get('/favourable',['uses'=>'LotteryK3Controller@favourable']);
Route::get('/phpinfo',['uses'=>'WelcomeController@phpinfo']);
Route::get('/inviteurl',['as'=>'inviteurl','uses'=>'Proxy\ProxyController@index']);

//充值
Route::get('/recharge',['middleware' => 'auth','uses'=>'CashController@recharge']);
Route::post('/recharge',['as'=>'recharge','uses'=>'CashController@rechargePost']);
Route::get('/deposit',['middleware' => 'auth','uses'=>'CashController@deposit']);
Route::post('/apply',['as'=>'apply','uses'=>'CashController@apply']);

//智付，接口数据返回
Route::post('/zfReturn_Url',['as'=>'zfReturn_Url','uses'=>'CashController@zfReturn_Url']);
Route::post('/zfNotify_Url',['as'=>'zfNotify_Url','uses'=>'CashController@zfNotify_Url']);


