<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lottery_apply;
use App\lu_lottery_company_bank;
use App\lu_lottery_company_recharge;
use App\lu_lottery_recharge;
use App\lu_lottery_user;
use App\lu_points_record;
use App\lu_user;
use App\LunaLib\Common\CommonClass;
use App\LunaLib\Common\defaultCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class CashController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $userName = $request->userName;
        $starttime = $request->starttime;
        $endtime = $request->endtime;
        $result = lu_lottery_company_recharge::orderby('created_at', 'desc');
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
        $lu_companys = $result->paginate(10);
        return view('Admin.companyrecharge', compact('lu_companys', 'count', 'userName', 'starttime', 'endtime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $lu_company = new lu_lottery_company_recharge();
        if (empty($id)) {
            $lu_company->sn = $request->sn;
            $lu_company->amounts = $request->amounts;
            $lu_company->payBank = $request->payBank;
            $lu_company->bankId = $request->bankId;
            $lu_company->siteId = $request->siteId;
            $lu_company->siteBankId = $request->siteBankId;
            $lu_company->status = 2;
            $lu_company->rechargerUser = $request->rechargerUser;
            $lu_company->payArea = $request->payArea;
            $lu_company->payAreaCity = $request->payAreaCity;
            $lu_company->payType = $request->payType;
//            $lu_company->payBank = $request->payBank;
            $lu_company->created = $_SERVER['REQUEST_TIME'];
            $lu_company->uid = Auth::user()->id;
            $lu_company->userName = Auth::user()->name;
            $lu_company->added = 1;
        }
        $lu_company->save();
        $url = $request->bankurl;
        session()->flash('message', "充值成功");
        return Redirect::to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $lu_company = lu_lottery_company_recharge::where('id', $id)->first();
        if ($lu_company['status'] == 2) {
            $ldata = \App\lu_user_data::where('uid', $lu_company->uid)->first();
            $tmp = $ldata->points;
            $points = $ldata->points;
//            $odd = $user['returnOdds'];
//            $newOdd = $amount * $odd;
            $points = $points + $lu_company['amounts'];
            $ldata->points = $points;
            $ldata->save();
            //状态修改为已经付款
            $lu_company->status = 1;
            $lu_company->save();
            $data = array(
                'uid' => $lu_company->uid,
                'userName' => $lu_company->userName,
                'addType' => '4', // 公司充值
                'lotteryType' => '', // 中奖
                'winSn' => $lu_company->sn,
                'oldPoint' => $tmp,
                'changePoint' => $lu_company->amounts,
                'newPoint' => $points,
                'created' => strtotime(date('Y-m-d H:i:s'))
            );
            \App\lu_points_record::create($data);
        }

        return Redirect::to('company');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $lu_company = lu_lottery_company_recharge::find($id);
        $name = $lu_company->sn;
        $lu_company->delete();
        session()->flash('message', $name . "公司充值已经移除");
        return Redirect::back();
    }

    public function recharge()
    {
        $bank = lu_lottery_company_bank::find(1);
        $userlevels = defaultCache::userlevel();
        if (Auth::user()->recId == 0) {
            if (Auth::user()->level == 0) {
                $levelkey = 1;
            } else {
                $levelkey = Auth::user()->level;
            }
        } else {
            $levelkey = lu_user::find(Auth::user()->recId)->level;
        }
        $level = $userlevels[$levelkey];
//        return view('User.bankselect');
        return view('Cash.recharge', compact('bank', "level", "levelkey"));
    }

    public function deposit()
    {
//        $bank =lu_lottery_company_bank::find(1);
        $lu_lottery_applys = lu_lottery_apply::where('uid', Auth::user()->id)->orderby('created_at', 'desc')->paginate(10);
        return view('Cash.deposit', compact('lu_lottery_applys'));
    }

    public function apply(Request $request)
    {
//        if(Auth::user()->groupId !=8){
//            session()->flash('message_warning', '你当前的管理组不能提现');
//            return Redirect::back();
//        }

        if (empty(Auth::user()->cashPwd)) {
            session()->flash('message_warning', '您还未设置取现密码,请先到个人中心设置取现密码');
            return Redirect::to('editpwd');
        }
        $bank = lu_lottery_user::where('uid', Auth::user()->id)->first();
        if (!isset($bank)) {
            session()->flash('message_warning', '您还未设置转账银行卡信息,请先到个人中心填写相关信息');
            return Redirect::to("bank");
        }
        $amounts = $request->amounts;
        if ($amounts > Auth::user()->lu_user_data->points) {
            session()->flash('message_warning', '取款值大于现有余额，申请拒绝');
            return Redirect::back();
        }

        $cashPwd = implode('-', $request->cashPwd);
        if (Auth::user()->cashPwd == $cashPwd) {
            //打码量限制

            $lu_lottery_apply = new lu_lottery_apply();
            $lu_lottery_apply->sn = $request->sn;
            $lu_lottery_apply->amounts = $request->amounts;
            $lu_lottery_apply->created = $_SERVER['REQUEST_TIME'];
            $lu_lottery_apply->status = 2;
            $lu_lottery_apply->uid = Auth::user()->id;
            $lu_lottery_apply->userName = Auth::user()->name;
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
                $userModel = Auth::user()->lu_user_data;
                $oldpoints = $userModel->points;
                $points = $oldpoints - $lu_lottery_apply->amounts;
                $userModel->points = $points;
                $userModel->save();

                $data = array(
                    'uid' => Auth::user()->id,
                    'userName' => Auth::user()->name,
                    'addType' => '7', // 提现申请
                    'lotteryType' => '', // 中奖
                    'touSn' => $lu_lottery_apply->sn,
                    'oldPoint' => $oldpoints,
                    'changePoint' => -$lu_lottery_apply->amounts,
                    'newPoint' => $points,
                    'created' => strtotime(date('Y-m-d H:i:s'))
                );
                lu_points_record::create($data);
            }
            session()->flash('message', '申请取现成功，请等待管理员审批');
            return Redirect::back();
        } else {
            session()->flash('message_warning', '申请取现失败，支付密码错误');
            return Redirect::back();
        }

    }

    public function rechargePost(Request $request)
    {
        $errormessage = "";
        $paytype = $request->levelpaytype;
        $levelkey = $request->levelkey;
        if (empty($paytype)) {
            $errormessage = "请选择一种支付方式";
        }
        if ($errormessage != "") {
            return Redirect::route('recharge')
                ->withInput()
                ->withErrors($errormessage);
        } else {

            if ($paytype == 'zf') {
                $data = array(
                    'sn' => $request->order_no,
                    'uid' => $request->uid,
                    'siteId' => 1,
                    'amounts' => $request->amounts,
                    'created' => $_SERVER['REQUEST_TIME'],
                    'type' => $levelkey,
                    'status' => 2, //未付款状态
                    'userName' => $request->name
                );
                lu_lottery_recharge::create($data);
                return view('Cash.lotteryorderzf');
            } elseif ($paytype = "bf") {
                $amouts = $request->OrderMoney;
                $data = array(
                    'sn' => $request->TransID,
                    'uid' => $request->uid,
                    'siteId' => 1,
                    'amounts' => $amouts,
                    'created' => $_SERVER['REQUEST_TIME'],
                    'type' => $levelkey,
                    'status' => 2, //未付款状态
                    'userName' => $request->Username
                );
                lu_lottery_recharge::create($data);

                return view('Cash.lotteryorderbf');
//                return view('Cash.lotteryorderkjt');
            } else {
                return Redirect::route('recharge')
                    ->withInput()
                    ->withErrors("未知支付方式");
            }
        }

    }

    public function zfReturn_Url()
    {
        return view('Cash.zfReturn_Url');
    }

    public function zfNotify_Url()
    {
        return view('Cash.zfNotify_Url');
    }

    public function bfReturn_Url()
    {
        return view('Cash.bfReturn_Url');
    }

    public function bfNotify_Url()
    {
        return view('Cash.bfNotify_Url');
    }
}
