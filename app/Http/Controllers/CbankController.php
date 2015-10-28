<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lottery_company_bank;
use Illuminate\Http\Request;
use Redirect;

class CbankController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $result = lu_lottery_company_bank::orderby('created_at','desc');
        $count = $result->count();
        $lu_lottery_company_banks = $result->paginate(10);
        return view('Admin.companybanklist',compact('lu_lottery_company_banks','count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $cbank = new lu_lottery_company_bank();
        return view('Admin.companybank',compact('cbank'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
        $id = $request->id;
        if(!empty($id)){
            $lu_lottery_company_bank = lu_lottery_company_bank::find($id);
            $lu_lottery_company_bank->bankName = $request->bankName;
            $lu_lottery_company_bank->province = $request->province;
            $lu_lottery_company_bank->city = $request->city;
            $lu_lottery_company_bank->bankCode = $request->bankCode;
            $lu_lottery_company_bank->userName = $request->userName;
        }else{
            $lu_lottery_company_bank = new lu_lottery_company_bank;
            $lu_lottery_company_bank->bankName = $request->bankName;
            $lu_lottery_company_bank->province = $request->province;
            $lu_lottery_company_bank->city = $request->city;
            $lu_lottery_company_bank->bankCode = $request->bankCode;
            $lu_lottery_company_bank->userName = $request->userName;
        }
        $lu_lottery_company_bank->save();
        session()->flash('message', $lu_lottery_company_bank->bankName."账号添加成功");
        return Redirect::to('companybank');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $cbank =lu_lottery_company_bank::find($id);
        return view('Admin.companybank',compact('cbank'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
