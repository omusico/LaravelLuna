<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Hash;
use App\Http\Controllers\Controller;
use App\lu_user;
use Illuminate\Http\Request;

class registerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return view('register');
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
                'invite' =>'required|integer',
                'password'=>'required|confirmed'
                ] );

            $lu_user = new lu_user;
            $lu_user->name = $request->name;
            $lu_user->realName = $request->realName;
            $lu_user->password = Hash::make($request->password);
            $lu_user->qq = $request->qq;
            $lu_user->email = $request->email;
            $lu_user->sex = $request->sex;
            $lu_user->phone = $request->phone;
            $lu_user->groupId = $request->groupId;
            $lu_user->invite = rand(10000, 99999);
            $lu_user->save();
            session()->flash('message', $lu_user->name . "注册成功");
//            return Redirect::to('login');
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
