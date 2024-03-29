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
Route::get('/mobile', 'WelcomeController@mobile');
Route::get('/mobileindex', 'WelcomeController@mobileindex');
Route::get('index', ['as' => 'index', 'uses' => 'WelcomeController@index']);

####################################################
#登录，登出, 自动跳转, 密码重置,注册
####################################################
Route::get('login', [
    'middleware' => 'guest', 'as' => 'login', 'uses' => 'loginController@loginGet']);
Route::post('login', [
    'middleware' => 'guest', 'uses' => 'loginController@loginPost']);
Route::get('luna/adminlogin', [
    'middleware' => 'guest', 'as' => 'adminlogin', 'uses' => 'loginController@adminloginGet']);
Route::post('luna/adminlogin', [
    'middleware' => 'guest', 'uses' => 'loginController@adminloginPost']);

Route::get('k3/adminlogin', [
    'middleware' => 'guest', 'as' => 'backlogin', 'uses' => 'loginController@backloginGet']);
Route::get('five/adminlogin', [
    'middleware' => 'guest', 'as' => 'backlogin', 'uses' => 'loginController@backloginGet']);
Route::get('gp/adminlogin', [
    'middleware' => 'guest', 'as' => 'backlogin', 'uses' => 'loginController@backloginGet']);
Route::post('back/backlogin', [
    'middleware' => 'guest', 'uses' => 'loginController@backloginPost']);
Route::get('logout', [
    'middleware' => 'auth', 'as' => 'logout', 'uses' => 'loginController@logout']);
Route::get('register', 'registerController@index');
Route::post('register/save', ['as' => 'register_save', 'uses' => 'registerController@store']);

Route::get('dailiregister', 'registerController@dailiregister');
Route::post('dailiregister/save', ['as' => 'dailiregister_save', 'uses' => 'registerController@dailistore']);

Route::controller('password', 'PasswordController');

####################################################
#管理员入口(增删改查)
####################################################
#会员路由
Route::resource('admin', 'Admin\AdminController');

Route::resource('company', 'CashController');

Route::resource('companybank', 'CbankController');

Route::get('adminindex', 'Admin\AdminController@adminindex');
Route::get('bettingList', 'Admin\AdminController@bettingList');
Route::get('sixhemanual', 'Admin\AdminController@sixhemanual');
Route::post('savesixhemanual', 'Admin\AdminController@savesixhemanual');
Route::get('proxyList', 'Admin\AdminController@proxyList');
Route::get('winningList', 'Admin\AdminController@winningList');
Route::get('bettingcountList', 'Admin\AdminController@bettingcountList');
Route::get('sixhebettingcountList', 'Admin\AdminController@sixhebettingcountList');
Route::get('moneycount', 'Admin\AdminController@moneycount');
Route::get('applycount', 'Admin\AdminController@applycount');
Route::get('downloadmoneys', 'Admin\AdminController@downloadmoneys');
Route::get('downloadapplys', 'Admin\AdminController@downloadapplys');

Route::get('marquee', 'Admin\AdminController@marquee');
Route::get('checkapply', 'Admin\AdminController@checkapply');
Route::get('checkrecharge', 'Admin\AdminController@checkrecharge');
Route::get('checkcompanyrecharge', 'Admin\AdminController@checkcompanyrecharge');
Route::post('savemarquee', 'Admin\AdminController@savemarquee');
Route::get('proxycert', 'Admin\AdminController@proxycert');
Route::post('saveproxycert', 'Admin\AdminController@saveproxycert');
Route::get('k3odds', 'Admin\AdminController@k3odds');
Route::post('savek3odds', 'Admin\AdminController@savek3odds');
Route::get('fiveodds', 'Admin\AdminController@fiveodds');
Route::post('savefiveodds', 'Admin\AdminController@savefiveodds');
Route::get('sixheodds', 'Admin\AdminController@sixheodds');
Route::post('savesixheodds', 'Admin\AdminController@savesixheodds');
Route::get('sscodds', 'Admin\AdminController@sscodds');
Route::post('savesscodds', 'Admin\AdminController@savesscodds');
Route::get('lotterystatus', 'Admin\AdminController@lotterystatus');
Route::post('savelotterystatus', 'Admin\AdminController@savelotterystatus');
Route::get('news', 'Admin\AdminController@news');
Route::post('savenews', 'Admin\AdminController@savenews');
Route::get('favor', 'Admin\AdminController@favor');
Route::get('updatesscdealing', 'Admin\AdminController@updatesscdealing');
Route::post('savefavor', 'Admin\AdminController@savefavor');
Route::get('userreturns', 'Admin\AdminController@userreturns');
Route::post('saveuserreturns', 'Admin\AdminController@saveuserreturns');
Route::get('userlevel', 'Admin\AdminController@userlevel');
Route::post('saveuserlevel', 'Admin\AdminController@saveuserlevel');
Route::get('getdepositlist', 'Admin\AdminController@getdepositlist');
Route::get('deposit/{id}/edit', 'Admin\AdminController@updatedepositstatus');
Route::any('deposit/{id}', 'Admin\AdminController@deletedeposit');
Route::post('refusedeposit', 'Admin\AdminController@refusedeposit');

Route::get('manualrecharge/{id}', 'Admin\AdminController@manualrecharge');
Route::get('admindetail/{id}', 'Admin\AdminController@admindetail');
Route::get('admindetailmoney', 'Admin\AdminController@admindetailmoney');
Route::get('downloadadmindetail', 'Admin\AdminController@downloadadmindetail');
Route::get('downloadadmindetails', 'Admin\AdminController@downloadadmindetails');
Route::get('adminproxydetail', 'Admin\AdminController@adminproxydetail');
Route::post('manualupdate', 'Admin\AdminController@manualupdate');
Route::get('resetpwd', 'Admin\AdminController@resetpwd');
Route::get('rechargelist', 'Admin\AdminController@rechargelist');
Route::get('manualkj', 'Admin\AdminController@manualkj');
Route::any('manualkjPost', 'Admin\AdminController@manualkjPost');
Route::get('cancelOrder', 'Admin\AdminController@cancelOrder');
Route::get('cancelOrderSingle', 'Admin\AdminController@cancelOrderSingle');
Route::get('deleteCancelOrder/{id}', 'Admin\AdminController@deleteCancelOrder');
Route::post('cancelOrderPost', 'Admin\AdminController@cancelOrderPost');
Route::get('manualreturns', 'Admin\AdminController@manualreturns');
Route::post('manualreturnsPost', 'Admin\AdminController@manualreturnsPost');
Route::get('GitUpdate', 'Admin\AdminController@GitUpdate');
Route::get('GetSqlData', 'Admin\AdminController@GetSqlData');
Route::get('GetLogsfile', 'Admin\AdminController@GetLogsfile');
Route::get('LotteriesResult', 'Admin\AdminController@LotteriesResult');
Route::get('lotteryswitch', 'Admin\AdminController@lotteryswitch');
Route::get('updateAdmin', 'Admin\AdminController@updateAdmin');
Route::any('LotteriesResult/{id}','Admin\AdminController@LotteriesResultDelete');

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
Route::get('updatek3baoziodds', [
    'as' => 'updatek3baoziodds', 'uses' => 'CollectController@updatek3baoziodds']);
Route::get('webkj', [
    'as' => 'webkj', 'uses' => 'CollectController@webkj']);
Route::get('lotteryIndex', [
    'as' => 'lotteryIndex', 'uses' => 'LotteryK3Controller@index']);
Route::get('6helotteryIndex', [
    'as' => 'lotteryIndex', 'uses' => 'Lottery6heController@index']);
Route::post('get6heodds', [
    'as' => 'get6heodds', 'uses' => 'Lottery6heController@get6heodds']);
Route::get('fivelotteryIndex', [
    'as' => 'fivelotteryIndex', 'uses' => 'LotteryFiveController@index']);
Route::get('ssclotteryIndex', [
    'as' => 'ssclotteryIndex', 'uses' => 'LotterySscController@index']);
Route::get('lotterytrend', [
    'as' => 'lotterytrend', 'uses' => 'LotteryK3Controller@trend']);
Route::get('fivelotterytrend', [
    'as' => 'fivelotterytrend', 'uses' => 'LotteryFiveController@trend']);
Route::get('ssclotterytrend', [
    'as' => 'ssclotterytrend', 'uses' => 'LotterySscController@trend']);
Route::any('/6helotteryBetting', ['middleware' => 'auth', 'as' => '6helotteryBetting', 'uses' => 'Lottery6heController@betting']);
Route::any('/lotteryBetting', ['middleware' => 'auth', 'as' => 'lotteryBetting', 'uses' => 'LotteryK3Controller@betting']);
Route::any('/fivelotteryBetting', ['middleware' => 'auth', 'as' => 'fivelotteryBetting', 'uses' => 'LotteryFiveController@betting']);
Route::any('/ssclotteryBetting', ['middleware' => 'auth', 'as' => 'ssclotteryBetting', 'uses' => 'LotterySscController@betting']);
Route::any('/zhuihao', ['middleware' => 'auth', 'as' => 'zhuihao', 'uses' => 'LotteryK3Controller@zhuihao']);
Route::any('/userLotteryBetting', ['middleware' => 'auth', 'as' => 'userLotteryBetting', 'uses' => 'User\UserController@userBettingList']);
Route::any('/getaccountdetail', ['middleware' => 'auth', 'as' => 'getaccountdetail', 'uses' => 'User\UserController@getaccountdetail']);
Route::any('/getLotteryData', ['as' => 'getLotteryDataForQt', 'uses' => 'LotteryK3Controller@getLotteryDataForQt']);
Route::any('/loadRecentResult', ['as' => 'loadRecentResult', 'uses' => 'LotteryK3Controller@loadRecentResult']);
Route::get('/getLotteryWin', ['middleware' => 'auth', 'as' => 'getlotterywin', 'uses' => 'User\UserController@getLotteryWin']);
Route::get('/getPointsRecord', ['middleware' => 'auth', 'as' => 'getpointsrecord', 'uses' => 'LotteryK3Controller@getPointsRecord']);
Route::get('/account', ['middleware' => 'auth', 'as' => 'account', 'uses' => 'User\UserController@account']);
//Route::get('/deposit',['middleware' => 'auth','as'=>'deposit','uses'=>'User\UserController@deposit']);
Route::get('/bank', ['middleware' => 'auth', 'as' => 'bank', 'uses' => 'User\UserController@bank']);
Route::post('/savebank', ['middleware' => 'auth', 'as' => 'savebank', 'uses' => 'User\UserController@savebank']);
Route::get('/editpwd', ['middleware' => 'auth', 'as' => 'editpwd', 'uses' => 'User\UserController@editpwd']);
Route::post('/editpwdpost', ['middleware' => 'guest', 'as' => 'editpwdpost', 'uses' => 'User\UserController@editpwdpost']);
Route::post('/saveaccount', ['middleware' => 'auth', 'as' => 'saveaccount', 'uses' => 'User\UserController@saveaccount']);
Route::get('/getPersonalwin', ['middleware' => 'auth', 'as' => 'getPersonalwin', 'uses' => 'User\UserController@getPersonalwin']);
//规则明细
Route::get('/k3GameRule', ['uses' => 'LotteryK3Controller@k3GameRule']);
Route::get('/fiveGameRule', ['uses' => 'LotteryFiveController@fiveGameRule']);
Route::get('/sscGameRule', ['uses' => 'LotterySscController@sscGameRule']);
Route::get('/sixheGameRule', ['uses' => 'Lottery6heController@sixheGameRule']);
Route::get('/favourable', ['uses' => 'LotteryK3Controller@favourable']);
Route::get('/phpinfo', ['uses' => 'WelcomeController@phpinfo']);
Route::get('/inviteurl', ['as' => 'inviteurl', 'uses' => 'Proxy\ProxyController@index']);
Route::get('/proxydetail/{id}', ['as' => 'proxydetail', 'uses' => 'Proxy\ProxyController@proxydetail']);
Route::get('/proxypersonal/{id}', ['as' => 'proxypersonal', 'uses' => 'Proxy\ProxyController@proxypersonal']);


//充值
Route::get('/recharge', ['middleware' => 'auth', 'uses' => 'CashController@recharge']);
Route::post('/recharge', ['as' => 'recharge', 'uses' => 'CashController@rechargePost']);
Route::get('/deposit', ['middleware' => 'auth', 'uses' => 'CashController@deposit']);
Route::post('/apply', ['as' => 'apply', 'uses' => 'CashController@apply']);

//智付，接口数据返回
Route::post('/zfReturn_Url', ['as' => 'zfReturn_Url', 'uses' => 'CashController@zfReturn_Url']);
Route::post('/zfNotify_Url', ['as' => 'zfNotify_Url', 'uses' => 'CashController@zfNotify_Url']);

//宝付，接口数据返回
Route::any('/bfReturn_Url', ['as' => 'bfReturn_Url', 'uses' => 'CashController@bfReturn_Url']);
Route::any('/bfNotify_Url', ['as' => 'bfNotify_Url', 'uses' => 'CashController@bfNotify_Url']);

//five
Route::get('/five', 'WelcomeController@five');


