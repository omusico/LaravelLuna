<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\lu_lottery_user;
use App\lu_user_data;
use Hash;
use App\Http\Controllers\Controller;
use App\lu_user;
use Illuminate\Http\Request;
use Redirect;

class registerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $invite = $request->invite;
        $lu_user = lu_user::where('invite', $invite)->first();
        $group = 8;
        if (isset($lu_user)) {
            if ($lu_user->groupId == 5) {
//                $group = 3;
                return view('User.dailiregister', compact('invite'));
            }
        }
        return view('register', compact('invite'));
    }

    public function dailiregister(Request $request)
    {
        //
        $invite = $request->invite;
        return view('User.dailiregister', compact('invite', 'group'));
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
        try {

            //保存注册用户
            $this->validate($request, lu_user::rules());

            $this->validate($request, [
                'invite' => 'required|integer',
                'password' => 'required|confirmed'
            ]);
            $invite_user = lu_user::where('invite', $request->invite)->first();
            if (isset($invite_user->groupId)) {
                $lu_user = new lu_user;
                $lu_user->groupId = 2;
                $lu_user->name = $request->name;
//                $lu_user->realName = $request->realName;
                $lu_user->password = Hash::make($request->password);
                $lu_user->qq = $request->qq;
                $lu_user->sex = $request->sex;
                $lu_user->recUser = $invite_user->name;
                $lu_user->recId = $invite_user->id;
//                $lu_user->groupId = $request->groupId;
                $cashPwd = $request->cashPwd;
                if (isset($cashPwd)) {
                    $lu_user->cashPwd = implode('-', $cashPwd);
                }
                $lu_user->invite = rand(10000, 99999);
                // 默认激活
                $lu_user->status = 1;
                $lu_user->save();
                $lu_user_data = new lu_user_data();
                $lu_user_data->uid = $lu_user->id;
                $lu_user_data->save();
                session()->flash('message', $lu_user->name . "注册成功");
                return Redirect::to('login');
            } else {
                session()->flash('message', "邀请码不正确，请检查后再输入");
                return Redirect::back();
            }
        } catch (\mysqli_sql_exception $e) {
            echo $e;
        }
    }

    public function dailistore(Request $request)
    {
        try {

            //保存注册用户
            $this->validate($request, lu_user::rules());

            $this->validate($request, [
                'invite' => 'required|integer',
                'password' => 'required|confirmed'
            ]);
            $invite_user = lu_user::where('invite', $request->invite)->first();
            if (isset($invite_user->groupId)) {
                $lu_user = new lu_user;
                $lu_user->groupId =3;
                $lu_user->name = $request->name;
                $lu_user->realName = $request->realName;
                $lu_user->password = Hash::make($request->password);
                $lu_user->qq = $request->qq;
                $lu_user->sex = $request->sex;
                $lu_user->phone = $request->phone;
                $lu_user->recId = $invite_user->id;
                $lu_user->recUser = $invite_user->name;
                $lu_user->invite = rand(10000, 99999);
                $lu_user->save();
                $lu_user_data = new lu_user_data();
                $lu_user_data->uid = $lu_user->id;
                $lu_user_data->save();

                $data = array(
                    'bankName' => $request->bankName,
                    'bankCode' => $request->bankCode,
                    'openBank' => $request->openBank,
                    'userName' => $request->bankUserName,
                    'uid' => $lu_user->id,
                    'created' => $_SERVER['REQUEST_TIME']
                );
                lu_lottery_user::create($data);
                session()->flash('message', $lu_user->name . "注册成功,请等待后台审核");
                return Redirect::to('login');
            } else {
                session()->flash('message', "邀请码不正确，请检查后再输入");
                return Redirect::back();
            }
        } catch (\mysqli_sql_exception $e) {
            echo $e;
        }
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

}
