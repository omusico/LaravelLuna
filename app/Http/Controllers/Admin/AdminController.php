<?php namespace App\Http\Controllers\Admin;

use App\lu_user;
use App\lu_user_data;
use DB;
use Redirect;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;

use Illuminate\Http\Request;
use App;
use App\LunaLib\Common\CommonClass;
use Cache;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $result = lu_user::where('is_admin', 0)->orderby('created_at', 'desc');
        $groupid = $request->groupid;
        $userName = $request->userName;
        $groupname = '会员';
        if (!empty($groupid)) {
            $groupname = App\lu_user_group::where('groupId', $groupid)->first()->name;
            $result = $result->where('groupid', $request->groupid);
        }
        if (!empty($userName)) {
            $result = $result->where('name', $userName);
        }
        $count = $result->count();
        $lu_users = $result->paginate(10);
        $user_groups = CommonClass::cache("user_groups", 1);
        return view('Admin.index', compact('lu_users', 'count', 'user_groups', 'groupname', 'userName', 'groupid'));
    }

    public function adminindex()
    {
        return view('Admin.backindex');
    }

    public function bettingList(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $bettingType = "";
        if (env('SITE_TYPE', '') == 'five') {

            $result = App\lu_lotteries_five::orderby('created_at', 'desc');
        } else if (env('SITE_TYPE', '') == 'gaopin') {
            $bettingType = $request->bettingType;
            if (empty($bettingType)) {
                $bettingType = 'k3';
            }
            if ($bettingType == "k3") {
                $result = App\lu_lotteries_k3::orderby('created_at', 'desc');
            } else if ($bettingType == 'five') {
                $result = App\lu_lotteries_five::orderby('created_at', 'desc');
            } else if ($bettingType == 'ssc') {
                $result = App\lu_lotteries_ssc::orderby('created_at', 'desc');
            } else if ($bettingType == '6he') {
                $result = App\lu_lotteries_6he::orderby('created_at', 'desc');
            }

        } else {
            $result = App\lu_lotteries_k3::orderby('created_at', 'desc');
        }
        if (!empty($userName)) {
            $result->where('userName', $userName);
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $result->where('created_at', '>=', $starttime);
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $result->where('created_at', '<=', $endtime);
        }
//        $result = $result->orderby('created_at', 'desc');
        $lu_lotteries_k3s = $result->paginate(10);
        return view('Admin.bettingList', compact('lu_lotteries_k3s', 'userName', 'starttime', 'endtime', 'bettingType'));
    }

    public function winningList(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $bettingType = "";
        if (env('SITE_TYPE', '') == 'five') {

            $result = App\lu_lotteries_five::orderby('created_at', 'desc');
        } else if (env('SITE_TYPE', '') == 'gaopin') {
            $bettingType = $request->bettingType;
            if (empty($bettingType)) {
                $bettingType = 'k3';
            }
            if ($bettingType == "k3") {
                $result = App\lu_lotteries_k3::orderby('created_at', 'desc');
            } else if ($bettingType == 'five') {
                $result = App\lu_lotteries_five::orderby('created_at', 'desc');
            } else if ($bettingType == 'ssc') {
                $result = App\lu_lotteries_ssc::orderby('created_at', 'desc');
            } else if ($bettingType == '6he') {
                $result = App\lu_lotteries_6he::orderby('created_at', 'desc');
            }

        } else {
            $result = App\lu_lotteries_k3::orderby('created_at', 'desc');
        }
        if (!empty($userName)) {
            $result->where('userName', $userName);
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $result->where('created_at', '>=', $starttime);
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $result->where('created_at', '<=', $endtime);
        }
//        $result = $result->orderby('created_at', 'desc');
        $lu_lotteries_k3s = $result->where('noticed', 1)->paginate(10);
        return view('Admin.winningList', compact('lu_lotteries_k3s', 'userName', 'starttime', 'endtime', 'bettingType'));
    }

    public function lotteryswitch()
    {
        return view("Admin.lotteryswitch");
    }

    public function bettingcountList(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;


//        $result = App\lu_lotteries_k3::where('status', 1);
        $wheresql = ' where dealing=1 and status <> -2 ';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(updated_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and updated_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and updated_at <="' . $endtime . '"';
        }
        if (env('SITE_TYPE', '') == 'five') {
            $lu_lotteries_k3s = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(ABS(eachPrice)) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(ABS(bingoPrice)) as bingoPrice from lu_lotteries_fives ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
        } else if (env('SITE_TYPE', '') == 'gaopin') {
            $lu_lotteries_k3s = \DB::select('select uid,userName,sum(bcount) as bcount,sum(eachPrice) as eachPrice,sum(bingoPrice) as bingoPrice,sum(profit) as profit from ' .
                '( select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s  ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
                ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
                ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_sscs  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_sscs  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) t group by t.uid');
        } else {
            $lu_lotteries_k3s = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(ABS(eachPrice)) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql . ' and (noticed =1 || status <> -1) group  by uid) betting left join (select uid,userName,sum(ABS(bingoPrice)) as bingoPrice from lu_lotteries_k3s ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
        }

        return view('Admin.bettingcountList', compact('lu_lotteries_k3s', 'userName', 'starttime', 'endtime'));
    }

    public function moneycount(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;


        $wheresql = ' where status=1';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(created_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and created_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and created_at <="' . $endtime . '"';
        }
        $moneycounts = \DB::select('select t.* from (select uid,userName,count(*) as count,sum(amounts) as amounts from lu_lottery_recharges' . $wheresql . ' group by uid) t left join lu_users on t.uid =lu_users.id where lu_users.groupId <> 7');

        return view('Admin.moneycount', compact('moneycounts', 'userName', 'starttime', 'endtime'));
    }

    public function applycount(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;


        $wheresql = ' where status=1';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(created_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and created_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and created_at <="' . $endtime . '"';
        }
        $applycounts = \DB::select('select t.* from (select uid,userName,count(*) as count,sum(amounts) as amounts from lu_lottery_applies ' . $wheresql . ' group by uid) t left join lu_users on t.uid =lu_users.id where lu_users.groupId <> 7');

        return view('Admin.applycount', compact('applycounts', 'userName', 'starttime', 'endtime'));
    }

    public function downloadmoneys(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;


        $wheresql = ' where status=1';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(created_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and created_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and created_at <="' . $endtime . '"';
        }
        $moneycounts = \DB::select('select t.* from (select uid,userName,count(*) as count,sum(amounts) as amounts from lu_lottery_recharges' . $wheresql . ' group by uid) t left join lu_users on t.uid =lu_users.id where lu_users.groupId <> 7');
        $downlist = array();
        foreach ($moneycounts as $moneycount) {
            array_push($downlist, (array)$moneycount);
        }
        Excel::create('会员充值表' . $starttime . '-' . $endtime, function ($excel) use ($downlist) {

            $excel->sheet('sheetName', function ($sheet) use ($downlist) {

                $sheet->fromArray($downlist, null, 'A1', false, false);

                $sheet->prependRow(1, array(
                    '用户ID', '用户名', '次数', '金额'
                ));
                $sheet->setWidth([
                    'A' => 11,
                    'B' => 8,
                    'C' => 5,
                    'D' => 12,
                ]);
                $sheet->getDefaultStyle();

            });

        })->export('xls');
//        return view('Admin.moneycount', compact('moneycounts', 'userName', 'starttime', 'endtime'));
    }

    public function downloadapplys(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;


        $wheresql = ' where status=1';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(created_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and created_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and created_at <="' . $endtime . '"';
        }
        $applycounts = \DB::select('select t.* from (select uid,userName,count(*) as count,sum(amounts) as amounts from lu_lottery_applies ' . $wheresql . ' group by uid) t left join lu_users on t.uid =lu_users.id where lu_users.groupId <> 7');

        $downlist = array();
        foreach ($applycounts as $applycount) {
            array_push($downlist, (array)$applycount);
        }
        Excel::create('会员充值表' . $starttime . '-' . $endtime, function ($excel) use ($downlist) {

            $excel->sheet('sheetName', function ($sheet) use ($downlist) {

                $sheet->fromArray($downlist, null, 'A1', false, false);

                $sheet->prependRow(1, array(
                    '用户ID', '用户名', '次数', '金额'
                ));
                $sheet->setWidth([
                    'A' => 11,
                    'B' => 8,
                    'C' => 5,
                    'D' => 12,
                ]);
                $sheet->getDefaultStyle();

            });

        })->export('xls');
    }


    public function rechargelist(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $result = App\lu_lottery_recharge::where('status', 1);
        if (!empty($userName)) {
            $result->where('userName', $userName);
        }
        if (!empty($starttime)) {
            $result->where('created_at', '>=', $starttime);
        }
        if (!empty($endtime)) {
            $result->where('created_at', '<=', $endtime);
        }
        $result = $result->orderby('created_at', 'desc');
        $lu_lottery_recharges = $result->paginate(10);
        return view('Admin.rechargelist', compact('lu_lottery_recharges', 'userName', 'starttime', 'endtime'));
    }

    public function getdepositlist(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $result = App\lu_lottery_apply::orderby('created_at', 'desc');
        if (!empty($userName)) {
            $result->where('userName', $userName);
        }
        if (!empty($starttime)) {
            $result->where('created_at', '>=', $starttime);
        }
        if (!empty($endtime)) {
            $result->where('created_at', '<=', $endtime);
        }
        $count = $result->count();
        $lu_lottery_applys = $result->paginate(10);
        return view('Admin.admindepositlist', compact('lu_lottery_applys', 'count', 'userName', 'starttime', 'endtime'));
    }

    public function updatedepositstatus($id)
    {
        $lu_lottery_apply = App\lu_lottery_apply::find($id);

        if ($lu_lottery_apply->status == 2) {

            $user = lu_user::find($lu_lottery_apply->uid);
//            $userModel = $user->lu_user_data;
//            if ($userModel->points < $lu_lottery_apply->amounts) {
//                session()->flash('message_warning', $lu_lottery_apply->sn . '状态修改失败，会员当前账户小于其提现金额，不能提现');
//                return Redirect::back();
//            }
            $lu_lottery_apply->status = 1;
            $lu_lottery_apply->save();
//            if ($lu_lottery_apply->id > 0) {
//                $data['orderSn'] = $lu_lottery_apply->sn;
//                $data['orderId'] = $lu_lottery_apply->id;
//                $data['payType'] = 'apply';
//                $data['proData'] = array(
//                    'total' => $lu_lottery_apply->amounts
//                );
//                $data['formatAmounts'] = CommonClass::price($lu_lottery_apply->amounts);
//                //会员余额变动
//                $oldpoints = $userModel->points;
//                $points = $oldpoints - $lu_lottery_apply->amounts;
//                $userModel->points = $points;
//                $userModel->save();
//
//                $data = array(
//                    'uid' => $user->id,
//                    'userName' => $user->name,
//                    'addType' => '7', // 提现申请
//                    'lotteryType' => '', // 中奖
//                    'touSn' => $lu_lottery_apply->sn,
//                    'oldPoint' => $oldpoints,
//                    'changePoint' => -$lu_lottery_apply->amounts,
//                    'newPoint' => $points,
//                    'created' => strtotime(date('Y-m-d H:i:s'))
//                );
//                App\lu_points_record::create($data);
//            }
            session()->flash('message', $lu_lottery_apply->sn . '状态修改成功');
        } else {
            session()->flash('message_warning', $lu_lottery_apply->sn . '状态已经通过,不能再修改了');
        }
        return Redirect::back();
    }

    public function resetpwd(Request $request)
    {
        $lu_user = lu_user::find($request->id);
        $lu_user->password = Hash::make($request->pwd);
        $lu_user->save();
        session()->flash('message', '密码修改成功');
        return array("修改成功");
    }

    public function refusedeposit(Request $request)
    {
        $lu_lottery_apply = App\lu_lottery_apply::find($request->refuseid);
        if ($lu_lottery_apply->status == 2) {//待审批
            $lu_lottery_apply->remarks = $request->remarks;
            $lu_lottery_apply->status = 3;//拒绝
            $lu_lottery_apply->save();

            $user = lu_user::find($lu_lottery_apply->uid);
            $userModel = $user->lu_user_data;
//            if ($userModel->points < $lu_lottery_apply->amounts) {
//                session()->flash('message_warning', $lu_lottery_apply->sn . '状态修改失败，会员当前账户小于其提现金额，不能提现');
//                return Redirect::back();
//            }
            if ($lu_lottery_apply->id > 0) {
                $data['orderSn'] = $lu_lottery_apply->sn;
                $data['orderId'] = $lu_lottery_apply->id;
                $data['payType'] = 'apply';
                $data['proData'] = array(
                    'total' => $lu_lottery_apply->amounts
                );
                $data['formatAmounts'] = CommonClass::price($lu_lottery_apply->amounts);
                //会员余额变动
                $oldpoints = $userModel->points;

                $points = $oldpoints + $lu_lottery_apply->amounts;
                $userModel->points = $points;
                $userModel->save();

                $data = array(
                    'uid' => $user->id,
                    'userName' => $user->name,
                    'addType' => '16', // 提现拒绝返回
                    'lotteryType' => '', // 中奖
                    'touSn' => $lu_lottery_apply->sn,
                    'oldPoint' => $oldpoints,
                    'changePoint' => -$lu_lottery_apply->amounts,
                    'newPoint' => $points,
                    'created' => strtotime(date('Y-m-d H:i:s'))
                );
                App\lu_points_record::create($data);
            }
            session()->flash('message', $lu_lottery_apply->sn . '状态修改成功');
        } else {
            session()->flash('message_warning', $lu_lottery_apply->sn . '状态已经不能再修改了');
        }
        return Redirect::back();
    }

    public function deletedeposit($id)
    {
        $deposit = App\lu_lottery_apply::find($id);
        $name = $deposit->sn;
        $deposit->delete();
        session()->flash('message', $name . "提现申请已经被移除");
        return Redirect::back();

    }

    public function create()
    {
        $result = lu_user::where('is_admin', 0);
        $count = $result->count();
        $user_groups = CommonClass::cache("user_groups", 1);
        $user_level = CommonClass::cache("user_level", 0);
        return view('Admin.create', compact('count', 'user_groups', 'user_level'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:lu_users',
//            ]);
//        $lu_user;
        $id = $request->id;
        if (!empty($id)) {
//            $lu_user = lu_user::where('id', $request->id)->first();
            $lu_user = lu_user::find($id);
        } else {
            $lu_user = new lu_user;
            $this->validate($request, lu_user::rules());
            $lu_user->invite = rand(10000, 99999);
            $lu_user->password = Hash::make('888888');
            $lu_user->name = $request->name;
        }
        $lu_user->realName = $request->realName;
        $lu_user->qq = $request->qq;
        $lu_user->email = $request->email;
        $lu_user->sex = $request->sex;
        $lu_user->phone = $request->phone;
        $lu_user->groupId = $request->groupId;
        $lu_user->status = $request->status;
        $lu_user->level = $request->level;
        $depositOdds = $request->depositOdds;
        if (!empty($depositOdds)) {
            $lu_user->depositOdds = $request->depositOdds;
        }
        $lu_user->save();
        if (empty($id)) {
            $lu_user_data = new App\lu_user_data();
            $lu_user_data->uid = $lu_user->id;
            $lu_user_data->points = $request->points;
            $lu_user_data->save();
        }
        session()->flash('message', $lu_user->name . "会员添加成功");
//      $grade = new Grade;
//	    $grade->user_id = $request->id;
//	    $grade->save();
        return Redirect::to('admin');
    }

    public function updateAdmin(Request $request)
    {
        $id = $request->id;
        $lu_user = lu_user::find($id);
        $lu_user->is_admin = 1;
        $lu_user->save();
        return Redirect::back();
    }

    public function destroy(lu_user $lu_user)
    {
        $name = $lu_user->name;
        $lu_user->delete();
        session()->flash('message', $name . "会员已经被移除");
        return Redirect::back();
    }

    public function edit($lu_user)
    {

        $user_groups = CommonClass::cache("user_groups", 1);
        $user_level = CommonClass::cache("user_level", 0);
        return view('Admin.edit', compact('lu_user', 'user_groups', 'user_level'));

    }

    public function update($request)
    {
//        $this->validate($request, lu_user::rules());
        $lu_user = lu_user::where('id', $request->id);
        $lu_user->realName = $request->realName;
//        $lu_user->password = Hash::make('888888');
        $lu_user->qq = $request->qq;
        $lu_user->email = $request->email;
        $lu_user->sex = $request->sex;
        $lu_user->phone = $request->phone;
        $lu_user->groupId = $request->groupId;
        $lu_user->status = $request->status;
        $lu_user->level = $request->level;
        $lu_user->save();
        session()->flash('message', '会员修改成功');
        return Redirect::back();
    }

    //代理证书
    public function proxycert()
    {
        if (Cache::has('proxycert')) {
            $proxycert = Cache::get('proxycert');
        } else {
            $proxycert = "请到后台设置你的代理条款";
        }
        return view('Admin.proxycert', compact('proxycert'));
    }

    public function saveproxycert(Request $request)
    {
        $proxycert = $request->proxycert;
        Cache::forever('proxycert', $proxycert);
        session()->flash('message', '代理条款修改成功');
        return Redirect::back();
    }

    //滚动文字
    public function marquee()
    {
        if (Cache::has('marquee')) {
            $marquee = Cache::get('marquee');
        } else {
            $marquee = "请到后台设置你的滚动文字";
        }
        return view('Admin.marquee', compact('marquee'));
    }

    public function savemarquee(Request $request)
    {
        $marquee = $request->marquee;
        Cache::forever('marquee', $marquee);
        session()->flash('message', '滚动文字修改成功');
        return Redirect::back();
    }

    //提款申请
    public function checkapply()
    {
        if (!Cache::has("checkapply")) {
        }
        $result = App\lu_lottery_apply::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-10 minute')))->where('status', '2')->get();
        Cache::add('checkapply', 1, 1);
        return $result;
    }

    public function checkrecharge()
    {
        if (!Cache::has("checkrecharge")) {
        }
        $result = App\lu_lottery_recharge::where('status', 1)->where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 minute')))->get();
        Cache::add('checkrecharge', 1, 1);
        return $result;

    }

    public function checkcompanyrecharge()
    {
//        Cache::forget('checkcompanyrecharge');
        if (!Cache::has("checkcompanyrecharge")) {
            $result = App\lu_lottery_company_recharge::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 minute -15 second')))->get();
            Cache::add('checkcompanyrecharge', 1, 1);
            return $result;
        }

    }

    public function manualkj()
    {
        return view('Admin.manualkj');
    }

    // 手动开奖
    public function manualkjPost(Request $request)
    {

        $lottery_type = $request->lottery_type;
        $winPre = trim($request->proName);
        $winCode = trim($request->winCode);


        $lunaFunction = new App\LunaLib\Common\LunaFunctions();
        $this->sdkjFromNotice($lottery_type, $winPre, $winCode);

//        $this->notice->set($contents);
        $lunaFunction->get_lottery_type_code($lottery_type);

        session()->flash('message', $winPre . '手动开奖成功');
        return Redirect::back();

//        if ($type == 'k3') $type = 'lottery';
//        Waf::go(Waf::adminUrl("?model={$type}&action=lotteryKJ"));
//        $lunaFunction->lottery_kj($lottery_type,$winPre,$winCode);

    }

    public function sdkjFromNotice($lottery_type, $winPre, $winCode)
    {
        if (empty($winPre)) {
            echo '请填写开奖期号';
            return;
        }
        if (empty($winCode)) {
            echo '请填写开奖结果';
            return;
        }
        $lunaFunction = new App\LunaLib\Common\LunaFunctions();
        $type = $lunaFunction->get_lottery_type_code($lottery_type);
        if ('k3' == $type) $type = 'lottery';

        // 如果是已撤单,则初始化相关状态
        if ($type == 'five') {
            $cancelList = App\lu_lotteries_five::where("proName", $winPre)->where("province", strtolower($lottery_type))->where("status", -2)->get();
        } else if ($type == "ssc") {
            $cancelList = App\lu_lotteries_ssc::where("proName", $winPre)->where("province", strtolower($lottery_type))->where("status", -2)->get();
        } else if ($type == "lottery") {
            $cancelList = App\lu_lotteries_k3::where("proName", $winPre)->where("province", strtolower($lottery_type))->where("status", -2)->get();
        }

        foreach ($cancelList as $key => $lottery) {
            // 扣掉钱.同时初始化

            $userDetail = lu_user_data::where('uid', $lottery['uid'])->first();

            $cancelPrice = $lottery['eachPrice'];

            $pointRecordData = array(
                'uid' => $lottery['uid'],
                'userName' => $lottery['userName'],
                'addType' => '1', // 投注
                'lotteryType' => $lottery_type, // 彩种
                'touSn' => $lottery['sn'],
                'oldPoint' => $userDetail['points'],
                'changePoint' => -$cancelPrice,
                'newPoint' => $userDetail['points'] - $cancelPrice,
                'created' => strtotime(date('Y-m-d H:i:s')),
                'bz' => '撤单后又开奖自动扣钱'
            );
            App\lu_points_record::create($pointRecordData);

            $userDetail->points = $userDetail['points'] - $cancelPrice;
            $userDetail->save();
            //todo down

            // 资金明细记录
        }

        $lunaFunction = new App\LunaLib\Common\LunaFunctions();
        $result = $lunaFunction->lottery_kj($lottery_type, $winPre, $winCode);

        $lunaFunction->sdkjAddRecord($lottery_type, $winPre, $winCode, \Auth::user()->name);
        $result = var_export($result, true);
        return $result;

    }

    public function GitUpdate()
    {
        return view('Admin.GitUpdate');
    }

    public function k3odds()
    {
        $odds = App\LunaLib\Common\defaultCache::cache_k3_odds();
        $k3baoziodds = App\LunaLib\Common\defaultCache::cache_k3_baozi_odds();
//        Cache::forget('chipins');
        $chipins = App\LunaLib\Common\defaultCache::cache_chipin();
        $types = App\LunaLib\Common\defaultCache::cache_lottery_type_slug();
        $nameDatas = array(
            '19' => '单',
            '20' => '双',
            '21' => '小',
            '22' => '大',
            'val' => '赔率'
        );
        $keyDatas = array(
            'HZ', 'HLL', 'JQYS', '5X', 'DNXB', 'CXQD'
        );
        return view('Admin.k3odds', compact('odds', 'k3baoziodds', 'chipins', 'types', 'nameDatas', 'keyDatas'));
    }

    public function fiveodds()
    {
        $odds = App\LunaLib\Common\defaultCache::cache_five_odds();
        $chipins = App\LunaLib\Common\defaultCache::cache_five_chipins();
        $types = App\LunaLib\Common\defaultCache::cache_five_type_slug();
        $nameDatas = array(
            '46' => '单',
            '47' => '双',
            '48' => '小',
            '49' => '大',
            '50' => '前单',
            '51' => '前双',
            '52' => '前大',
            '53' => '前小',
            'val' => '赔率'
        );

        $keyDatas = array(
            '2BTH', 'HZ'
        );
        return view('Admin.fiveodds', compact('odds', 'chipins', 'types', 'nameDatas', 'keyDatas'));
    }

    public function sscodds()
    {
        $odds = App\LunaLib\Common\defaultCache::cache_ssc_odds();
        $chipins = App\LunaLib\Common\defaultCache::cache_ssc_chipins();
        $types = App\LunaLib\Common\defaultCache::cache_ssc_type_slug();
        $nameDatas = array(
            'dan' => '单',
            'shuang' => '双',
            'xiao' => '小',
            'da' => '大',
            'dwdan' => '定位单',
            'dwshuang' => '定位双',
            'dwxiao' => '定位小',
            'dwda' => '定位大',
            'val' => '赔率'
        );

        $keyDatas = array(
            'TABHZ_SWHZ', 'TABHZ_EXHZ', 'TABHZ_SXHZ', 'TABNN_NN'
        );
        return view('Admin.sscodds', compact('odds', 'chipins', 'types', 'nameDatas', 'keyDatas'));
    }


    public function savek3odds(Request $request)
    {
        $k3odds = $request->odds;
        $chipins = $request->chipins;
        Cache::forever('k3odds', $k3odds);
        Cache::forever('chipins', $chipins);
        session()->flash('message', '修改赔率成功');
        return Redirect::back();
    }

    public function savefiveodds(Request $request)
    {
        $fiveodds = $request->odds;
        $chipins = $request->chipins;
        Cache::forever('fiveodds', $fiveodds);
        Cache::forever('fivechipins', $chipins);
        session()->flash('message', '修改赔率成功');
        return Redirect::back();
    }

    public function savesscodds(Request $request)
    {
        $sscodds = $request->odds;
        $chipins = $request->chipins;
        Cache::forever('sscodds', $sscodds);
        Cache::forever('sscchipins', $chipins);
        session()->flash('message', '修改赔率成功');
        return Redirect::back();
    }

    public function news()
    {
        $news = "";
        if (Cache::has('news')) {
            $news = Cache::get('news');
        }
        return view('Admin.news', compact('news'));
    }

    public function savenews(Request $request)
    {
        $news = $request->news;
        Cache::forever('news', $news);
        session()->flash('message', '前台优惠消息更新成功');
        return Redirect::back();
    }

    public function favor()
    {
        $favor = "";
        if (Cache::has('favor')) {
            $favor = Cache::get('favor');
        }
        return view('Admin.favor', compact('favor'));
    }

    public function savefavor(Request $request)
    {
        $favor = $request->favor;
        Cache::forever('favor', $favor);
        session()->flash('message', '优惠活动消息更新成功');
        return Redirect::back();
    }

    public function userreturns()
    {
        $userreturns = App\LunaLib\Common\defaultCache::cache_user_returns();
        return view('Admin.userreturns', compact('userreturns'));
    }

    public function saveuserreturns(Request $request)
    {
        $userreturns = $request->userreturns;
        Cache::forever('userreturns', $userreturns);
        session()->flash('message', '返水设置成功');
        return Redirect::back();
    }

    public function manualreturns()
    {
        $result = App\lu_lottery_return::orderby('created_at', 'desc');
        $userreturns = $result->paginate(10);
        return view('Admin.manualreturns', compact('userreturns'));
    }

    // 手动返水
    public function manualreturnsPost(Request $request)
    {
        $userName = $request->userName;
//        $starttime = $request->starttime;
//        $endtime = $request->endtime;
        $currentday = $request->currentday;
//        $result = App\lu_lotteries_k3::where('status', 1);
        $wheresql = ' where dealing=1 and status <> -2 and (noticed =1 || status <> -1) ';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (!empty($currentday)) {
            $returnDay = substr($currentday, 0, 10);
            if ($returnDay == date("Y-m-d")) {

                session()->flash('message', '当天还没结束，不能返水，请明天再返水');
                return Redirect::back();
            } else {

                $wheresql .= ' and left(updated_at,10) ="' . $returnDay . '"';
            }
        } else {
            session()->flash('message', '返水失败，请选中日期');
            return Redirect::back();
        }
        if (!empty($starttime)) {
            $wheresql .= ' and updated_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $wheresql .= ' and updated_at <="' . $endtime . '"';
        }
        if (env('SITE_TYPE', '') == 'five') {
            $bettings = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,' .
                '(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,' .
                'count(eachPrice) as bcount from lu_lotteries_fives ' .
                $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives ' .
                $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
        } else if (env("SITE_TYPE", "") == "gaopin") {
            $bettings = \DB::select('select uid,userName,sum(bcount) as bcount,sum(eachPrice) as eachPrice,sum(profit) as profit from (' .
                'select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s  ' .
                $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s' .
                $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives  ' .
                $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives  ' .
                $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_sscs  ' .
                $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_sscs  ' .
                $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) t group by t.uid');
        } else {
            $bettings = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,' .
                '(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,' .
                'count(eachPrice) as bcount from lu_lotteries_k3s ' .
                $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' .
                $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
        }

        foreach ($bettings as $betting) {
//            list($uid, $prices, $points, $name) = explode(',', $str);
            $count = App\lu_lottery_return::where('uid', $betting->uid)->where('returnDay', $returnDay)->count();
            if ($count == 0) {

                $prices = $betting->eachPrice;
                $user_returns = App\LunaLib\Common\defaultCache::cache_user_returns();
                $odds = $this->getOdds($prices, $user_returns);
                $amount = $prices * $odds;
                $data = array(

                    'created' => $_SERVER['REQUEST_TIME'],

                    'amounts' => $amount,

                    'uid' => $betting->uid,

                    'siteId' => 1,

                    'userName' => $betting->userName,

                    'odds' => $odds,

                    //todo use select day
                    'lotId' => 1,

                    'returnDay' => $returnDay,

                    'optUid' => \Auth::user()->id,

                    'optUser' => \Auth::user()->name,

                );
                App\lu_lottery_return::create($data);
//            $this->model->insertReturns($data);

                $userdata = lu_user_data::where('uid', $betting->uid)->first();
                $points = $userdata->points;
                $userdata->points = $points + $amount;
                $userdata->save();
//            $data = array(
//                'points' => array('+', $amount)
//            );
                // 添加成功
//            if ($userModel->updateCateAcl($uid, $data)) {
//            }
                $pointRecordData = array(
                    'uid' => $betting->uid,
                    'userName' => $betting->userName,
                    'addType' => '8', // 反水
                    'oldPoint' => $points,
                    'changePoint' => CommonClass::price($amount),
                    'newPoint' => $points + CommonClass::price($amount),
                    'created' => strtotime(date('Y-m-d H:i:s'))
                );
                App\lu_points_record::create($pointRecordData);
            }
//            $pointRecordModel->insert($pointRecordData);
        }
        session()->flash('message', '返水成功');
        return Redirect::back();
    }

    public function  getOdds($price, $user_returns)
    {
        foreach ($user_returns as $key => $range) {
            if ($price >= $range['min'] && $price <= $range['max']) {
                return $range['rate'];
            }
        }
        return 0;
    }

    public function userlevel()
    {
        $userlevels = App\LunaLib\Common\defaultCache::userlevel();
        return view('Admin.userlevel', compact('userlevels'));
    }

    public function saveuserlevel(Request $request)
    {
        $userlevel = $request->userlevel;
        Cache::forever('userlevel', $userlevel);
        session()->flash('message', '修改支付方式成功');
        return Redirect::back();
    }

    public function manualrecharge(Request $request)
    {
        $point_types = CommonClass::cache_point_type();
        $user = lu_user::find($request->id);
        return view('Admin.manualrecharge', compact('user', 'point_types'));
    }

    public function admindetail($id)
    {
        $point_types = CommonClass::cache_point_type();
        $lu_points_records = App\lu_points_record::where('uid', $id)->orderby('created_at', 'desc')->paginate(10);
        return view('Admin.admindetail', compact('lu_points_records', 'point_types'));
    }

    public function admindetailmoney(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $addtype = $request->addtype;
        $point_types = CommonClass::cache_point_type();
        $result = App\lu_points_record::orderby('created_at', 'desc');
        if (!empty($userName)) {
            $result->where('userName', $userName);
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $result->where('created_at', '>=', $starttime);
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $result->where('created_at', '<=', $endtime);
        }
        if (!empty($addtype)) {
            $result->where('addType', '=', $addtype);
        }
        $lu_points_records = $result->paginate(10);
        return view('Admin.admindetailmoney', compact('lu_points_records', 'userName', 'starttime', 'endtime', 'addtype', 'point_types'));
    }

    public function downloadadmindetail(Request $request)
    {
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $addtype = $request->addtype;
        $point_types = CommonClass::cache_point_type();
//        $result = App\lu_points_record::orderby('created_at', 'desc');
        $wheresql = ' where 1 = 1 ';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(created_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and created_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and created_at <="' . $endtime . '"';
        }
        if (!empty($addtype)) {
            $wheresql .= ' and addType ="' . $addtype . '"';
        } else {
            session()->flash('message_warning', '请选择明细类型');
            return Redirect::back();
        }

        $lu_points_records = DB::select('select uid,userName,sum(ABS(changePoint)) as changePoint,addType from lu_points_records' . $wheresql . ' group by uid');
        $downlist = array();
        foreach ($lu_points_records as $lu_points_record) {
            array_push($downlist, (array)$lu_points_record);
        }
        Excel::create('会员' . $point_types[$addtype] . '明细表' . $starttime . '-' . $endtime, function ($excel) use ($downlist) {

            $excel->sheet('sheetName', function ($sheet) use ($downlist) {

                $sheet->fromArray($downlist, null, 'A1', false, false);

                $sheet->prependRow(1, array(
                    '用户ID', '用户名', '金额', '明细类型'
                ));
                $sheet->setWidth([
                    'A' => 21,
                    'B' => 18,
                    'C' => 15,
                    'D' => 22,
                ]);
                $sheet->getDefaultStyle();

            });

        })->export('xls');
    }

    public function adminproxydetail(Request $request)
    {
        $id = $request->id;
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;

        $wheresql = ' where 1=1 ';
        $RecUsers = 'select * from lu_users where recId = ' . $id;
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
            $RecUsers .= ' and name = "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(created_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and created_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and created_at <="' . $endtime . '"';
        }
        if (env('SITE_TYPE', '') == 'five') {
            $lu_lotteries_bettings = \DB::select('select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from (' . $RecUsers
                . ') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives ' . $wheresql
                . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives ' . $wheresql
                . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid');
        } else if (env("SITE_TYPE", "") == "gaopin") {
            $lu_lotteries_bettings = \DB::select('select id,name,sum(bcount) as bcount,sum(eachPrice) as eachPrice,sum(bingoPrice) as bingoPrice,sum(profit) as profit  from (select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from (' . $RecUsers
                . ') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives ' . $wheresql
                . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives ' . $wheresql
                . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid union select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from (' . $RecUsers
                . ') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql
                . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' . $wheresql
                . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid union select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from (' . $RecUsers
                . ') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql
                . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' . $wheresql
                . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid) t group by t.id');
        } else {
            $lu_lotteries_bettings = \DB::select('select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from (' . $RecUsers
                . ') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql
                . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' . $wheresql
                . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid');
        }

        $user_groups = CommonClass::cache("user_groups", 1);
        return view('Admin.adminproxydetail', compact('lu_lotteries_bettings', 'user_groups', 'id', 'userName', 'starttime', 'endtime'));
//        return view('Admin.adminproxydetail', compact('lu_points_records', 'point_types'));
    }

    public function manualupdate(Request $request)
    {

        $user = lu_user::find($request->id);
        $userModel = $user->lu_user_data;
        $data['orderSn'] = $request->sn;
        $data['orderId'] = $request->id;
        $data['payType'] = 'apply';
        $data['proData'] = array(
            'total' => $request->amounts
        );
        $data['formatAmounts'] = CommonClass::price($request->amounts);
        //会员余额变动
        $oldpoints = $userModel->points;
        $points = $oldpoints + $request->amounts;
        $userModel->points = $points;
        $userModel->save();

        $data = array(
            'uid' => $user->id,
            'userName' => $user->name,
            'addType' => $request->addType, // 提现申请
            'lotteryType' => '', // 中奖
            'touSn' => $request->sn,
            'oldPoint' => $oldpoints,
            'changePoint' => $request->amounts,
            'newPoint' => $points,
            'created' => strtotime(date('Y-m-d H:i:s'))
        );
        App\lu_points_record::create($data);
        session()->flash('message', $request->sn . '手动添加成功');
        return Redirect::back();
    }

    public function cancelOrder()
    {
        return view('Admin.cancelOrder');
    }

    //单一撤单
    public function cancelOrderSingle($id)
    {
        if (env('SITE_TYPE', '') == 'five') {

            $lottery = App\lu_lotteries_five::find($id);
        } else {

            $lottery = App\lu_lotteries_k3::find($id);
        }
        if ($lottery['status'] == '-2' || $lottery['status'] == '-1') {

        } else {
            $type = $lottery['province'];
            if ($lottery['noticed'] == 1) {
                $cancelPrice = ($lottery['eachPrice'] - $lottery['bingoPrice']);
                if (env('SITE_TYPE', '') == 'five') {
                    DB::table('lu_lottery_notes_fives')->where('proName', $lottery['proName'])->where('province', strtolower($type))->delete();
                } else {
                    DB::table('lu_lottery_notes_k3s')->where('proName', $lottery['proName'])->where('province', strtolower($type))->delete();
                }

            } else if ($lottery['noticed'] == 0) {
                $cancelPrice = $lottery['eachPrice'];
            }

            $lottery->status = -2;
            $lottery->save();
            $user = lu_user_data::where('uid', $lottery['uid'])->first();
            // 添加资金明细.
            $pointRecordData = array(
                'uid' => $lottery['uid'],
                'userName' => $lottery['userName'],
                'addType' => '13', // 撤单
                'lotteryType' => $type, // 彩种
                'touSn' => $lottery['sn'],
                'oldPoint' => $user['points'],
                'changePoint' => $cancelPrice,
                'newPoint' => $user['points'] + $cancelPrice,
                'created' => strtotime(date('Y-m-d H:i:s'))
            );
            App\lu_points_record::create($pointRecordData);
            $user->points = $user->points + $cancelPrice;
            $user->save();

            // 查看是否有追号截止的。如果有追号，则恢复.
            if ($lottery['groupId'] != null) {
//                $params = array("groupId" => $lottery['groupId'], "province" => strtolower($type), "status" => "-1");
                if (env('SITE_TYPE', '') == 'five') {

                    $zhuihaoList = App\lu_lotteries_five::where('groupId', $lottery['groupId'])->where('province', strtolower($type))->where('status', '-1')->get(); //$model->queryList($params);
                } else {

                    $zhuihaoList = App\lu_lotteries_k3::where('groupId', $lottery['groupId'])->where('province', strtolower($type))->where('status', '-1')->get(); //$model->queryList($params);
                }
                foreach ($zhuihaoList as $hao) {
                    $userDetail = lu_user_data::where('uid', $lottery['uid'])->first();//$userModel->detail($lottery['uid']);
                    $pointRecordData = array(
                        'uid' => $hao['uid'],
                        'userName' => $hao['userName'],
                        'addType' => '1', // 投注
                        'lotteryType' => $type, // 彩种
                        'touSn' => $hao['sn'],
                        'oldPoint' => $userDetail['points'],
                        'changePoint' => -$hao['eachPrice'],
                        'newPoint' => $userDetail['points'] - $hao['eachPrice'],
                        'created' => strtotime(date('Y-m-d H:i:s')),
                        'bz' => '原追号停止恢复'
                    );
                    App\lu_points_record::create($pointRecordData);
                    $userDetail->points = $userDetail->points - $hao['eachPrice'];
                    $userDetail->save();

                }
            }

        }
        session()->flash('message', '撤单成功');
        return Redirect::back();
    }


    //撤单
    //cancelOrderForAll
    public function cancelOrderPost(Request $request)
    {
        $type = $request->lottery_type;
        $proName = $request->proName;
        if (env('SITE_TYPE', '') == 'five') {
            $lists = App\lu_lotteries_five::where("proName", $proName)->where('province', strtolower($type))->get();//$model->queryList($params);
        } else {
            $lists = App\lu_lotteries_k3::where("proName", $proName)->where('province', strtolower($type))->get();//$model->queryList($params);
        }
        foreach ($lists as $key => $lottery) {
            if ($lottery['status'] == '-2' || $lottery['status'] == '-1') {
                continue;
            }

            if ($lottery['noticed'] == 1) {
                $cancelPrice = ($lottery['eachPrice'] - $lottery['bingoPrice']);
                // 删除中奖的订单号。
                DB::table('lu_lottery_notes_k3s')->where('proName', $proName)->where('province', strtolower($type))->delete();

            } else if ($lottery['noticed'] == 0) {
                $cancelPrice = $lottery['eachPrice'];
            }

//            $model->update($lottery['lotId'], array('status' => -2)); // 撤单
            $lottery->status = -2;
            $lottery->save();
            $user = lu_user_data::where('uid', $lottery['uid'])->first();
            // 添加资金明细.
            $pointRecordData = array(
                'uid' => $lottery['uid'],
                'userName' => $lottery['userName'],
                'addType' => '13', // 撤单
                'lotteryType' => $type, // 彩种
                'touSn' => $lottery['sn'],
                'oldPoint' => $user['points'],
                'changePoint' => $cancelPrice,
                'newPoint' => $user['points'] + $cancelPrice,
                'created' => strtotime(date('Y-m-d H:i:s'))
            );
            App\lu_points_record::create($pointRecordData);
            $user->points = $user->points + $cancelPrice;
            $user->save();

            // 查看是否有追号截止的。如果有追号，则恢复.
            if ($lottery['groupId'] != null) {
//                $params = array("groupId" => $lottery['groupId'], "province" => strtolower($type), "status" => "-1");
                if (env('SITE_TYPE', '') == 'five') {

                    $zhuihaoList = App\lu_lotteries_five::where('groupId', $lottery['groupId'])->where('province', strtolower($type))->where('status', '-1')->get(); //$model->queryList($params);
                } else {

                    $zhuihaoList = App\lu_lotteries_k3::where('groupId', $lottery['groupId'])->where('province', strtolower($type))->where('status', '-1')->get(); //$model->queryList($params);
                }
                foreach ($zhuihaoList as $hao) {
                    $userDetail = lu_user_data::where('uid', $lottery['uid'])->first();//$userModel->detail($lottery['uid']);
                    $pointRecordData = array(
                        'uid' => $hao['uid'],
                        'userName' => $hao['userName'],
                        'addType' => '1', // 投注
                        'lotteryType' => $type, // 彩种
                        'touSn' => $hao['sn'],
                        'oldPoint' => $userDetail['points'],
                        'changePoint' => -$hao['eachPrice'],
                        'newPoint' => $userDetail['points'] - $hao['eachPrice'],
                        'created' => strtotime(date('Y-m-d H:i:s')),
                        'bz' => '原追号停止恢复'
                    );
//                    $pointRecordModel->insert($pointRecordData);
                    App\lu_points_record::create($pointRecordData);
                    $userDetail->points = $userDetail->points - $hao['eachPrice'];
                    $userDetail->save();
//                    $userModel->updateLoginInfo($lottery['uid'] ,array('points'=> $userDetail['points'] - $hao['eachPrice'] ));

//                    $whereCond = array("groupId"=>$lottery['groupId'],"status"=>"-1");
//                    $model = $model->initOrder($whereCond);

                }
            }

        }
        session()->flash('message', $request->proName . '撤单成功');
        return Redirect::back();
    }

    public function LotteriesResult(Request $request)
    {
        $LotteriesResults = App\lu_lotteries_result::orderby('created_at', 'desc');
        $proName = $request->proName;
        $codes = $request->codes;
        $typeName = $request->typeName;
        if (!empty($proName)) {
            $LotteriesResults = $LotteriesResults->where('proName', $proName);
        }
        if (!empty($codes)) {
            $LotteriesResults = $LotteriesResults->where('codes', $codes);
        }
        if (!empty($typeName)) {
            $LotteriesResults = $LotteriesResults->where('typeName', strtoupper($typeName));
        }
        $LotteriesResults = $LotteriesResults->paginate(10);
        return view('Admin.LotteriesResult', compact('LotteriesResults', 'proName', 'codes', 'typeName'));
    }

    public function LotteriesResultDelete($id)
    {
        $result = App\lu_lotteries_result::find($id);
        $result->delete();
        session()->flash('message', "删除成功");
        return Redirect::back();
    }

    public function GetSqlData(Request $request)
    {
        $result = DB::select($request->sql);
        return $result;
    }

    public function GetLogsfile(Request $request)
    {
        $date = $request->date;
        if (empty($date)) {
            $date = date("Y-m-d");
        }
        $myfile = fopen($_SERVER['DOCUMENT_ROOT'] . '/../storage/logs/laravel-' . $date . '.log', 'rb');
        while (!feof($myfile)) {
            echo fgetc($myfile);
        }
        fclose($myfile);
    }

    public function proxyList(Request $request)
    {
        $bigproxyid = $request->bigproxyid;
        $secondproxyid = $request->secondproxyid;

        $secondProxyList = lu_user::where("groupId", "3")->get();

        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        if(!empty($bigproxyid)){
            $bigProxy = lu_user::find($bigproxyid);
            $secondProxyList = lu_user::where('recId',$bigProxy->id)->get();
        }

//        $result = App\lu_lotteries_k3::where('status', 1);
        $wheresql = ' where dealing=1 and status <> -2 ';
        if (!empty($userName)) {
            $wheresql .= ' and userName= "' . $userName . '"';
        }
        if (empty($starttime) && empty($endtime)) {
            $wheresql .= ' and left(updated_at,10) ="' . date('Y-m-d') . '"';
        }
        if (!empty($starttime)) {
            $starttime = substr($starttime, 0, 10);
            $wheresql .= ' and updated_at >="' . $starttime . '"';
        }
        if (!empty($endtime)) {
            $endtime = substr($endtime, 0, 10);
            $wheresql .= ' and updated_at <="' . $endtime . '"';
        }
        if (env('SITE_TYPE', '') == 'five') {
            $lu_lotteries_k3s = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(ABS(eachPrice)) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(ABS(bingoPrice)) as bingoPrice from lu_lotteries_fives ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
        } else if (env('SITE_TYPE', '') == 'gaopin') {
            $lu_lotteries_k3s = \DB::select('select uid,userName,sum(bcount) as bcount,sum(eachPrice) as eachPrice,sum(bingoPrice) as bingoPrice,sum(profit) as profit from ' .
                '( select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s  ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
                ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
                ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_sscs  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_sscs  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) t group by t.uid');
        } else {
            $lu_lotteries_k3s = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(ABS(eachPrice)) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql . ' and (noticed =1 || status <> -1) group  by uid) betting left join (select uid,userName,sum(ABS(bingoPrice)) as bingoPrice from lu_lotteries_k3s ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
        }

        return view('Admin.proxyList',compact('bigProxyList','secondProxyList','bigproxyid','secondproxyid','userName','starttime','endtime','lu_lotteries_k3s'));
    }
}
