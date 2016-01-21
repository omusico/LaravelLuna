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
            if ($groupId == 3) {
                $display = 'none';

                $userName = $request->userName;
                $starttime = $request->starttime;
                $endtime = $request->endtime;

//                $wheresql = ' where 1=1 ';
                $wheresql = ' where dealing=1 and status <> -2 and (noticed =1 || status <> -1) ';
                $RecUsers = 'select * from lu_users where recId = ' . Auth::user()->id;
                if (!empty($userName)) {
                    $wheresql .= ' and userName= "' . $userName . '"';
                    $RecUsers .= ' and name = "' . $userName . '"';
                }
                if (empty($starttime) && empty($endtime)) {
                    $wheresql .= ' and left(updated_at,10) ="' . date('Y-m-d') . '"';
                }
                if (!empty($starttime)) {
                    $starttime = substr($starttime, 0, 10);
                    $wheresql .= ' and updated_at >="' . $starttime . '"';
                }
                if (!empty($endtime)) {
                    $endtime = substr($endtime, 0, 10);
                    $wheresql .= ' and updated_at <="' . $endtime . '"';
                }
                if (env('SITE_TYPE', '') == 'five') {
                    $lu_lotteries_bettings = \DB::select('select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from (' . $RecUsers
                        . ') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives ' . $wheresql
                        . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives ' . $wheresql
                        . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid');

                    $types = defaultCache::cache_five_types();
//                } else if (env('SITE_TYPE', '') == 'gaopin') {
//                    $lu_lotteries_bettings  = \DB::select('select uid,userName,sum(bcount) as bcount,sum(eachPrice) as eachPrice,sum(bingoPrice) as bingoPrice,sum(profit) as profit from ' .
//                        '( select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s  ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
//                        ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
//                        ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_6hes  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_6hes  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
//                        ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_sscs  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_sscs  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) t group by t.uid');
                } else {
                    $lu_lotteries_bettings = \DB::select('select recUser.id,recUser.name,countTable.bcount,countTable.eachPrice,countTable.bingoPrice, countTable.profit from (' . $RecUsers
                        . ') recUser left join (  select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql
                        . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' . $wheresql
                        . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) countTable on recUser.id = countTable.uid');
                    $types = defaultCache::cache_lottery_type();//Waf::moduleData('lottery_type', 'lottery');
                    $types2 = defaultCache::cache_lottery_type2();//Waf::moduleData('lottery_type', 'lottery', 2);
                    $types = $types + $types2;
                    //\DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
                }

                $user_groups = CommonClass::cache("user_groups", 1);
                $isdaili = true;
                return view('User.inviteurl', compact('lu_lotteries_bettings', 'user_groups', 'isdaili', 'display', 'userName', 'starttime', 'endtime', 'types'));

//            } else if ($groupId == 5) {
//                $secondProxyList = lu_user::where('recId', Auth::user()->id)->get();

            } else {
                return view('User.inviteurl', compact('isdaili', 'display'));
            }

        }
        return view('User.inviteurl', compact('display', 'isdaili'));
    }

    function proxydetail($id)
    {
        $bettingType = "";
        if (lu_user::find($id)->recId == Auth::user()->id) {
            if (env('SITE_TYPE', '') == 'five') {
                $result = lu_lotteries_five::where('uid', $id)->orderby('created_at', 'desc');
            } else {
                $result = lu_lotteries_k3::where('uid', $id)->orderby('created_at', 'desc');
            }
            $lu_lotteries_k3s = $result->paginate(10);
            return view('User.usrBettingList', compact('lu_lotteries_k3s', 'bettingType'));
        }
    }

    function proxypersonal($id)
    {
        $lu_user = lu_user::find($id);
        if ($lu_user->recId == Auth::user()->id) {

        }
    }

}
