<?php namespace App\Http\Controllers\Admin;

use App\lu_user;
use App\lu_user_data;
use DB;
use Redirect;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;
use App\LunaLib\Common\CommonClass;
use Cache;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $result = lu_user::where('is_admin', 0)->orderby('created_at','desc');
        $groupid = $request->groupid;
        $groupname='会员';
        if(!empty($groupid)){
            if($groupid==3){
                $groupname='代理';
            }
            else{
                $groupname='总代理';
            }
            $result = $result->where('groupid',$request->groupid);
        }
        $count = $result->count();
        $lu_users = $result->paginate(10);
        $user_groups = CommonClass::cache("user_groups",1);
        return view('Admin.index', compact('lu_users', 'count','user_groups','groupname'));
    }

    public function bettingList(Request $request){
        $result = App\lu_lotteries_k3::where('status',1);
        $count = $result->count();
        $lu_lotteries_k3s = $result->paginate(10);
        return view('Admin.bettingList',compact('lu_lotteries_k3s'));
    }

    public function create(){
        $result = lu_user::where('is_admin', 0);
        $count = $result->count();
        $user_groups = CommonClass::cache("user_groups",1);
        $user_level = CommonClass::cache("user_level",0);
        return view('Admin.create', compact('count','user_groups','user_level'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:lu_users',
//            ]);
//        $lu_user;
        $id = $request->id;
        if(!empty($id)){
            $lu_user = lu_user::where('id',$request->id)->first();
        }else{
            $lu_user = new lu_user;
            $this->validate($request, lu_user::rules());
            $lu_user->invite = rand(10000,99999);
            $lu_user->password = Hash::make('888888');
            $lu_user->name = $request->name;
        }
        $lu_user->realName = $request->realName;
        $lu_user->qq = $request->qq;
        $lu_user->email = $request->email;
        $lu_user->sex = $request->sex;
        $lu_user->phone = $request->phone;
        $lu_user->groupId = $request->groupId;
        $lu_user->status = $request->status;
        $lu_user->level = $request->level;
        $lu_user->save();
        if(empty($id)){
            $lu_user_data = new App\lu_user_data();
            $lu_user_data->uid = $lu_user->id;
            $lu_user_data->points = $request->points;
            $lu_user_data->save();
        }
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

    public function edit($lu_user){

        $user_groups = CommonClass::cache("user_groups",1);
        $user_level = CommonClass::cache("user_level",0);
        return view('Admin.edit',compact('lu_user','user_groups','user_level'));

    }

    public function update($request){
//        $this->validate($request, lu_user::rules());
        $lu_user = lu_user::where('id',$request->id);
        $lu_user->realName = $request->realName;
//        $lu_user->password = Hash::make('888888');
        $lu_user->qq = $request->qq;
        $lu_user->email = $request->email;
        $lu_user->sex = $request->sex;
        $lu_user->phone = $request->phone;
        $lu_user->groupId = $request->groupId;
        $lu_user->status = $request->status;
        $lu_user->level = $request->level;
        $lu_user->save();
        session()->flash('message', '会员修改成功');
        return Redirect::back();
    }

    public function marquee(){
        if(Cache::has('marquee')){
            $marquee = Cache::get('marquee');
        }else{
            $marquee = "请到后台设置你的滚动文字";
        }
        return view('Admin.marquee',compact('marquee'));
    }

    public function savemarquee(Request $request){
        $marquee=$request->marquee;
        Cache::forever('marquee', $marquee);
        session()->flash('message', '滚动文字修改成功');
        return Redirect::back();
    }

    public function k3odds(){
        $odds = App\LunaLib\Common\defaultCache::cache_k3_odds();
//        Cache::forget('chipins');
        $chipins =App\LunaLib\Common\defaultCache::cache_chipin();
        $types =App\LunaLib\Common\defaultCache::cache_lottery_type_slug();
        $nameDatas = array(
            '19' => '单',
            '20' => '双',
            '21' => '小',
            '22' => '大',
            'val' => '赔率'
        );
        return view('Admin.k3odds',compact('odds','chipins','types','nameDatas'));
    }

    public function savek3odds(Request $request){
        $k3odds=$request->odds;
        $chipins = $request->chipins;
        Cache::forever('k3odds', $k3odds);
        Cache::forever('chipins', $chipins);
        session()->flash('message', '修改赔率成功');
        return Redirect::back();
    }

    public function news(){
        if(Cache::has('news')){
            $news = Cache::get('news');
        }
        return view('Admin.news',compact('news'));
    }

    public function savenews(Request $request){
        $news=$request->news;
        Cache::forever('news', $news);
        session()->flash('message', '前台优惠消息更新成功');
        return Redirect::back();
    }

    public function userreturns(){
        $userreturns = App\LunaLib\Common\defaultCache::cache_user_returns();
        return view('Admin.userreturns',compact('userreturns'));
    }

    public function saveuserreturns(Request $request){
        $userreturns=$request->userreturns;
        Cache::forever('userreturns', $userreturns);
        session()->flash('message', '返水设置成功');
        return Redirect::back();
    }
}
