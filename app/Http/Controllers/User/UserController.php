<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_k3;
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
    public function index()
    {
        //
    }

    public function userBettingList(Request $request)
    {
        $result = lu_lotteries_k3::where('status', 1)->where('uid', \Auth::id())->orderby('created_at', 'desc');
        $lu_lotteries_k3s = $result->paginate(10);
        return view('User.usrBettingList', compact('lu_lotteries_k3s', 'count'));
    }

    public function recharge(Request $request)
    {

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
    public function store()
    {
        //
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
        //
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
        $lu_user->groupId = $request->groupId;
        $lu_user->level = $request->level;
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
//        return view('User.bank');
    }
}
