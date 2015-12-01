<?php namespace App\Http\Controllers;

use App\lu_user_data;
use Auth;
use App\User;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{

    /**
     * 返回login视图,登录页面
     */
    public function loginGet()
    {
        return view('login');
    }

    /**
     * 登录响应
     */
    public function loginPost(Request $request)
    {
//        $this->validate($request, User::rules());
        $name = $request->get('name');
        $password = $request->get('password');
        if (Auth::attempt(['name' => $name, 'password' => $password], $request->get('remember'))) {
            $lu_user_data = lu_user_data::where('uid',Auth::user()->id)->first();
            $lu_user_data->loginIp = $request->ip();
            $lu_user_data->loginNum = $lu_user_data->loginNum +1;
            $lu_user_data->save();
//            return Redirect::action('WelcomeController@index');
            if(Auth::user()->groupId == 3 || Auth::user()->groupId ==5){
                return Redirect::route('inviteurl');
            }
            return Redirect::route('index');

        } else {
            return Redirect::route('login')
                ->withInput()
                ->withErrors('用户名或者密码不正确，请重试！');
        }
    }

    public function adminloginGet(){
        return view('Admin.adminlogin');
    }

    public function adminloginPost(Request $request)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        if (Auth::attempt(['name' => $name, 'password' => $password], $request->get('remember'))) {
            if (!Auth::user()->is_admin) {
                return Redirect::action('WelcomeController@index');
            } else {
//                return Redirect::action('Admin\AdminController@index');
                return Redirect::action('Admin\AdminController@adminindex');
            }

        } else {
            return Redirect::route('login')
                ->withInput()
                ->withErrors('用户名或者密码不正确，请重试！');
        }
    }

    /**
     * 用户登出
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::route('login');
    }

}
