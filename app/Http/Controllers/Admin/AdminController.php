<?php namespace App\Http\Controllers\Admin;

use App\lu_user;
use DB;
use App\Grade;
use Redirect;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $result = lu_user::where('is_admin', 0);
        $count = $result->count();
        $lu_users = $result->paginate(10);
        return view('Admin.index', compact('lu_users', 'count'));
    }

    public function create(){
        $result = lu_user::where('is_admin', 0);
        $count = $result->count();
        $user_groups = App\CommonClass::cache("user_groups",1);
        return view('Admin.create', compact('count','user_groups'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:lu_users',
//            ]);
        $this->validate($request, lu_user::rules());

        $lu_user = new lu_user;
        $lu_user->name = $request->name;
        $lu_user->realName = $request->realName;
        $lu_user->password = Hash::make('888888');
        $lu_user->qq = $request->qq;
        $lu_user->email = $request->email;
        $lu_user->sex = $request->sex;
        $lu_user->phone = $request->phone;
        $lu_user->groupId = $request->groupId;
        $lu_user->invite = rand(10000,99999);
        $lu_user->save();
        session()->flash('message', $lu_user->name."会员添加成功");
//      $grade = new Grade;
//	    $grade->user_id = $request->id;
//	    $grade->save();
        return Redirect::to('admin');
    }

    public function destroy(lu_user $lu_user)
    {
        $name = $lu_user->name;
        $lu_user->delete();
        session()->flash('message', $name."会员已经被移除");
        return Redirect::back();
    }

    public function upload_grade(Request $request)
    {
        $this->validate($request, Grade::rules());
        $grade = Grade::where('user_id', $request->user_id)->first();
        $grade->math = $request->math;
        $grade->english = $request->english;
        $grade->c = $request->c;
        $grade->sport = $request->sport;
        $grade->think = $request->think;
        $grade->soft = $request->soft;
        $grade->save();
        session()->flash('message', '成绩提交成功');
        return Redirect::back();
    }

}
