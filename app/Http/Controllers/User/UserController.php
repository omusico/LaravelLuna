<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_k3;
use App\lu_lottery_return;
use App\lu_lottery_user;
use App\lu_user;
use App\LunaLib\Common\CommonClass;
use Illuminate\Http\Request;
use Auth;
use Redirect;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function userBettingList(Request $request)
    {
        $result = lu_lotteries_k3::where('status', 1)->where('uid', \Auth::id())->orderby('created_at', 'desc');
//        $lu_lotteries_k3s = \DB::select('select betting.created_at,betting.eachPrice,bingo.bingoPrice  from (select left(created_at,10) as created_at,sum(eachPrice) as eachPrice from lu_lotteries_k3s where uid=? group  by left(created_at,10)) betting left join (select left(created_at,10) as created_at,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s where uid=? and noticed=1 group  by left(created_at,10)) bingo on betting.created_at = bingo.created_at order by created_at desc ',[Auth::user()->id,Auth::user()->id]);
        $lu_lotteries_k3s = $result->paginate(10);
        return view('User.usrBettingList', compact('lu_lotteries_k3s'));
    }

    public function getaccountdetail(Request $request)
    {
        $lu_lotteries_k3s = \DB::select('select betting.created_at,betting.eachPrice,bingo.bingoPrice  from (select left(created_at,10) as created_at,sum(eachPrice) as eachPrice from lu_lotteries_k3s where uid=? group  by left(created_at,10)) betting left join (select left(created_at,10) as created_at,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s where uid=? and noticed=1 group  by left(created_at,10)) bingo on betting.created_at = bingo.created_at order by created_at desc ',[Auth::user()->id,Auth::user()->id]);
        $lu_lottery_applys = \DB::select('select left(created_at,10) as created_at,SUM(amounts) as applys  from lu_lottery_applies where uid =? group by left(created_at,10) ',[Auth::user()->id]);

        $lu_lottery_recharges = \DB::select('select left(created_at,10) as created_at,SUM(amounts) as recharges  from lu_lottery_recharges where uid =? and status=1 group by left(created_at,10) ',[Auth::user()->id]);
        $lu_lottery_returns = lu_lottery_return::where('uid',Auth::user()->id)->get();
        return view('User.AccountDetail', compact('lu_lotteries_k3s','lu_lottery_applys','lu_lottery_recharges','lu_lottery_returns'));
    }


    public function account()
    {
        $user_groups = CommonClass::cache("user_groups", 1);
        $user_level = CommonClass::cache("user_level", 0);
        return view('User.account', compact('user_groups', 'user_level'));
    }

    public function saveaccount(Request $request)
    {
        $lu_user = lu_user::where('id', $request->id)->first();
        $lu_user->realName = $request->realName;
        $lu_user->qq = $request->qq;
        $lu_user->email = $request->email;
        $lu_user->sex = $request->sex;
        $lu_user->phone = $request->phone;
//        $lu_user->groupId = $request->groupId;
//        $lu_user->level = $request->level;
        $lu_user->save();
        session()->flash('message', "账号保存成功");
        return Redirect::back();
    }

    public function editpwd()
    {
        return view('User.editpwd');
    }

    public function editpwdpost(Request $request)
    {
        $oldpwd = $request->oldpassword;
        $name = Auth::user()->name;
        if (Auth::attempt(array('name' => $name, 'password' => $oldpwd), false)) {

            $user = Auth::user();
            $password = $request->password;
            if (!empty($password)) {
                $this->validate($request, [
                    'password' => 'required|confirmed'
                ]);
                $user->password = \Hash::make($request->password);
            }
            $cashPwd = implode('-', $request->cashPwd);
            $user->cashPwd = $cashPwd;
            $user->save();
            session()->flash('message', "密码修改成功");
            return Redirect::back();
        } else {
            session()->flash('message_warning', "原密码输入错误");
            return Redirect::back();
        }
    }

    public function deposit()
    {

        $bank = lu_lottery_user::where('uid', Auth::user()->id)->first();
        if (!isset($bank)) {
            return view('bank');
        }
        return view('Cash.deposit');
    }

    public function bank()
    {
        $bank = lu_lottery_user::where('uid', Auth::user()->id)->first();
        if (!isset($bank)) {
            $bank = new lu_lottery_user();
        }
        return view('User.bank', compact('bank'));
    }

    public function savebank(Request $request)
    {
        $id = $request->id;
        if (empty($id)) {
            $data = array(
                'bankName' => $request->bankName,
                'bankCode' => $request->bankCode,
                'openBank' => $request->openBank,
                'userName' => $request->userName,
                'uid' => Auth::user()->id,
                'created' => $_SERVER['REQUEST_TIME']
            );
            lu_lottery_user::create($data);

            session()->flash('message', "银行卡绑定成功");
        } else {
            $bank = lu_lottery_user::find($id);
            $bank->bankName = $request->bankName;
            $bank->bankCode = $request->bankCode;
            $bank->openBank = $request->openBank;
            $bank->userName = $request->userName;
            $bank->save();
            session()->flash('message', "银行卡修改成功");
        }
        return Redirect::back();
    }

    public function getPersonalwin()
    {
        if (!Cache::has("checkapply")) {
            $result = lu_lotteries_k3::where('uid', Auth::user()->id)->where('noticed', '1')->where('created_at', '>', date("Y-m-d G:H:s", strtotime("-1 hours")))->get();
            Cache::add('checkapply', 1, 1);
            return $result;
        }
    }
}
