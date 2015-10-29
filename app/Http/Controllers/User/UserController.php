<?php namespace App\Http\Controllers\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_k3;
use App\lu_lottery_user;
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
//        $user_groups = CommonClass::cache("user_groups",1);
//        $user_level = CommonClass::cache("user_level",0);
        return view('User.account');
    }

    public function deposit()
    {
        return view('Cash.deposit');
    }

    public function bank()
    {
        $bank = lu_lottery_user::where('uid',Auth::user()->id)->first();
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
