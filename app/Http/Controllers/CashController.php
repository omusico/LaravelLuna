<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lottery_company_bank;
use App\lu_lottery_company_recharge;
use App\lu_lottery_recharge;
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
    public function index()
    {
        //
        $result = lu_lottery_company_recharge::where('status', 2);
        $count = $result->count();
        $lu_companys = $result->paginate(10);
        return view('Admin.companyrecharge',compact('lu_companys','count'));
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
        session()->flash('message', "充值成功");
        return Redirect::to('recharge');
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
        $lu_company = lu_lottery_company_recharge::where('id',$id)->first();
        if($lu_company['status']==2){
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
        //
        $lu_company = lu_lottery_company_recharge::where('id',$id)->first();
        $name = $lu_company->sn;
        $lu_company->delete();
        session()->flash('message', $name."公司充值已经移除已经被移除");
        return Redirect::back();
    }

    public function recharge()
    {
       $bank =lu_lottery_company_bank::find(1);
        return view('Cash.recharge',compact('bank'));
    }

    public function rechargePost(Request $request)
    {
        $errormessage = "";
        $paytype = $request->paytype;
        if (empty($paytype)) {
            $errormessage = "请选择一种支付方式";
        }
        if ($errormessage != "") {
            return Redirect::route('recharge')
                ->withInput()
                ->withErrors($errormessage);
        } else {
            $data = array(
                'sn' => $request->order_no,
                'uid' => $request->uid,
                'siteId' => 1,
                'amounts' => $request->amounts,
                'created' => $_SERVER['REQUEST_TIME'],
                'type' => $paytype,
                'status' => 2, //未付款状态
                'userName' => $request->name
            );
            lu_lottery_recharge::create($data);
            if ($paytype == 'zf') {
//                Redirect::to("")
                return view('Cash.lotteryorderzf');
            } else {
                return view('Cash.lotteryorderkjt');
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

}
