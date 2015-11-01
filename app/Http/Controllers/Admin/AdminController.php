<?php namespace App\Http\Controllers\Admin;

use App\lu_user;
use App\lu_user_data;
use DB;
use Redirect;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $groupname = '会员';
        if (!empty($groupid)) {
            $groupname = App\lu_user_group::where('groupId', $groupid)->first()->name;
            $result = $result->where('groupid', $request->groupid);
        }
        $count = $result->count();
        $lu_users = $result->paginate(10);
        $user_groups = CommonClass::cache("user_groups", 1);
        return view('Admin.index', compact('lu_users', 'count', 'user_groups', 'groupname'));
    }

    public function bettingList(Request $request)
    {
        $result = App\lu_lotteries_k3::where('status', 1);
        $count = $result->count();
        $lu_lotteries_k3s = $result->paginate(10);
        return view('Admin.bettingList', compact('lu_lotteries_k3s'));
    }

    public function getdepositlist()
    {
        $result = App\lu_lottery_apply::where('status', 2)->orderby('created_at', 'desc');
        $count = $result->count();
        $lu_lottery_applys = $result->paginate(10);
        return view('Admin.admindepositlist', compact('lu_lottery_applys', 'count'));
    }

    public function updatedepositstatus($id)
    {
        $lu_lottery_apply = App\lu_lottery_apply::find($id);

        $user = lu_user::find($lu_lottery_apply->uid);
        $userModel = $user->lu_user_data;
        if ($userModel->points < $lu_lottery_apply->amounts) {
            session()->flash('message_warning', $lu_lottery_apply->sn . '状态修改失败，会员当前账户小于其提现金额，不能提现');
            return Redirect::back();
        }
        $lu_lottery_apply->status = 1;
        $lu_lottery_apply->save();
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
            $points = $oldpoints - $lu_lottery_apply->amounts;
            $userModel->points = $points;
            $userModel->save();

            $data = array(
                'uid' => $user->id,
                'userName' => $user->name,
                'addType' => '7', // 提现申请
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
            $lu_user = lu_user::where('id', $request->id)->first();
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

    public function k3odds()
    {
        $odds = App\LunaLib\Common\defaultCache::cache_k3_odds();
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
        return view('Admin.k3odds', compact('odds', 'chipins', 'types', 'nameDatas', 'keyDatas'));
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

    public function news()
    {
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

    public function manualrecharge(Request $request)
    {
        $point_types = CommonClass::cache_point_type();
        $user = lu_user::find($request->id);
        return view('Admin.manualrecharge', compact('user', 'point_types'));
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
}
