<?php

/*
|--------------------------------------------------------------------------
| 路由
|--------------------------------------------------------------------------
*/

#测试
Route::get('/test', 'TestController@index');
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
#查看成绩排名
//Route::get('admin/grade', [
//    'as' => 'grade_list', 'uses' => 'Admin\GradeController@index']);
#资源路由,学生的增删改查
Route::resource('admin', 'Admin\AdminController');

Route::resource('company','CashController');

Route::resource('companybank','CbankController');


Route::get('bettingList', 'Admin\AdminController@bettingList');
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
Route::any('/lotteryBetting', ['as' => 'lotteryBetting', 'uses' => 'LotteryK3Controller@betting']);
Route::any('/userLotteryBetting', ['as' => 'userLotteryBetting', 'uses' => 'User\UserController@userBettingList']);
Route::any('/getLotteryData', ['as' => 'getLotteryDataForQt', 'uses' => 'LotteryK3Controller@getLotteryDataForQt']);
Route::any('/loadRecentResult', ['as' => 'loadRecentResult', 'uses' => 'LotteryK3Controller@loadRecentResult']);
Route::get('/getLotteryWin',['middleware' => 'auth','as'=>'getlotterywin','uses'=>'LotteryK3Controller@getLotteryWin']);
Route::get('/getPointsRecord',['middleware' => 'auth','as'=>'getpointsrecord','uses'=>'LotteryK3Controller@getPointsRecord']);
Route::get('/account',['middleware' => 'auth','as'=>'account','uses'=>'User\UserController@account']);
Route::get('/deposit',['middleware' => 'auth','as'=>'deposit','uses'=>'User\UserController@deposit']);
//规则明细
Route::get('/k3GameRule',['uses'=>'LotteryK3Controller@k3GameRule']);
Route::get('/phpinfo',['uses'=>'WelcomeController@phpinfo']);
Route::get('/inviteurl',['middleware' => 'auth','uses'=>'Proxy\ProxyController@index']);

//充值
Route::get('/recharge',['middleware' => 'auth','uses'=>'CashController@recharge']);
Route::post('/recharge',['as'=>'recharge','uses'=>'CashController@rechargePost']);

//智付，接口数据返回
Route::post('/zfReturn_Url',['as'=>'zfReturn_Url','uses'=>'CashController@zfReturn_Url']);
Route::post('/zfNotify_Url',['as'=>'zfNotify_Url','uses'=>'CashController@zfNotify_Url']);


