<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
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

    public function recharge()
    {
        return view('Cash.recharge');
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
            if($paytype == 'zf'){
                return view('Cash.lotteryorderzf');
            }else{
                return view('Cash.lotteryorderkjt');
            }
        }

    }

}
