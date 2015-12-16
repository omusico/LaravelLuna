<?php namespace App\Http\Controllers\Proxy;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_five;
use App\lu_lotteries_k3;
use App\lu_user;
use App\LunaLib\Common\CommonClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ProxyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //
        $isdaili = false;
        $display = 'block';
        if (!Auth::guest()) {

            $groupId = Auth::user()->groupId;
            if ($groupId == 5 || $groupId == 3) {
                $display = 'none';

                $userName = $request->userName;
                $starttime = $request->starttime;
                $endtime = $request->endtime;

                $wheresql = ' where 1=1 ';
                $RecUsers = 'select * from lu_users where recId = '.Auth::user()->id;
                if (!empty($userName)) {
                    $wheresql .= ' and userName= "' . $userName . '"';
                    $RecUsers .= ' and name = "' . $userName . '"';
                }
                if (empty($starttime) && empty($endtime)) {
                    $wheresql .= ' and left(created_at,10) ="' . date('Y-m-d') . '"';
                }
                if (!empty($starttime)) {
                    $starttime = substr($starttime,0,10);
                    $wheresql .= ' and created_at >="' . $starttime . '"';
                }
                if (!empty($endtime)) {
                    $endtime = substr($endtime,0,10);
                    $wheresql .= ' and created_at <="' . $endtime . '"';
                }
                if (env('SITE_TYPE', '') == 'five') {
                    $lu_lotteries_bettings = \DB::select('select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from ('.$RecUsers
                        .') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives ' . $wheresql
                        . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives ' . $wheresql
                        . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid');
                } else {
                    $lu_lotteries_bettings =\DB::select('select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from ('.$RecUsers
                        .') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql
                        . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' . $wheresql
                        . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid');
                        //\DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
                }


                //-------------
//                $result = lu_user::where('recId', Auth::user()->id);
//                if (!empty($userName)) {
//                    $result->where('name', $userName);
//                }
////                if (empty($starttime) && empty($endtime)) {
////                    $result->where('left(created_at,10)',date('Y-m-d'));
////                }
//                if (!empty($starttime)) {
//                    $result->where('created_at', '>=', $starttime);
//                }
//                if (!empty($endtime)) {
//                    $result->where('created_at', '<=', $endtime);
//                }
//                $lu_users = $result->paginate(10);
                $user_groups = CommonClass::cache("user_groups", 1);
                $isdaili = true;
                return view('User.inviteurl', compact('lu_lotteries_bettings', 'user_groups', 'isdaili', 'display', 'userName', 'starttime', 'endtime'));

            } else {
                return view('User.inviteurl', compact('isdaili', 'display'));
            }

        }
        return view('User.inviteurl', compact('display'));
    }

    function proxydetail($id)
    {
        $bettingType = "";
        if (lu_user::find($id)->recId == Auth::user()->id) {
            if(env('SITE_TYPE','')=='five') {
                $result = lu_lotteries_five::where('uid', $id)->orderby('created_at', 'desc');
            }else{
                $result = lu_lotteries_k3::where('uid', $id)->orderby('created_at', 'desc');
            }
            $lu_lotteries_k3s = $result->paginate(10);
            return view('User.usrBettingList', compact('lu_lotteries_k3s','bettingType'));
        }
    }

    function proxypersonal($id){
        $lu_user = lu_user::find($id);
        if ($lu_user->recId == Auth::user()->id) {

        }
    }

}
