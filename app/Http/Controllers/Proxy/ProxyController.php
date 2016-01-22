<?php namespace App\Http\Controllers\Proxy;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lu_lotteries_6he;
use App\lu_lotteries_five;
use App\lu_lotteries_k3;
use App\lu_lotteries_ssc;
use App\lu_user;
use App\LunaLib\Common\CommonClass;
use App\LunaLib\Common\defaultCache;
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
            if ($groupId == 3 || $groupId == 5) {
                $display = 'none';

                $proxyid = Auth::user()->id;


                $userName = $request->userName;
                $starttime = $request->starttime;
                $endtime = $request->endtime;
                if ($groupId == 5) {
                    $bigproxy = lu_user::find($proxyid);
                    $secondproxylist = lu_user::where('recid', $bigproxy->id)->get();
                }

                $wheresql = ' where dealing=1 and status <> -2 ';
                if (!empty($userName)) {
                    $wheresql .= ' and username= "' . $userName . '"';
                }
                if (empty($starttime) && empty($endtime)) {
//                    $wheresql .= ' and left(updated_at,10) ="' . date('y-m-d') . '"';
                    $wheresql .= ' and updated_at >="2015-11-20"';
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
                    $lu_lotteries_k3s = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(ABS(eachPrice)) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(ABS(bingoPrice)) as bingoPrice from lu_lotteries_fives ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
                } else if (env('SITE_TYPE', '') == 'gaopin') {
                    $lu_lotteries_k3s = \DB::select('select uid,userName,sum(bcount) as bcount,sum(eachPrice) as eachPrice,sum(bingoPrice) as bingoPrice,sum(profit) as profit from ' .
                        '( select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s  ' . $wheresql . '  group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_k3s  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
                        ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_fives  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_fives  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
                        ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_6hes  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_6hes  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid' .
                        ' union select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(eachPrice) as eachPrice,count(eachPrice) as bcount from lu_lotteries_sscs  ' . $wheresql . ' group  by uid) betting left join (select uid,userName,sum(bingoPrice) as bingoPrice from lu_lotteries_sscs  ' . $wheresql . 'and noticed=1 group  by uid) bingo on betting.uid = bingo.uid) t group by t.uid');
                } else {
                    $lu_lotteries_k3s = \DB::select('select betting.uid,betting.userName,betting.bcount,betting.eachPrice,bingo.bingoPrice,(betting.eachPrice - bingo.bingoPrice) as profit  from (select uid,userName,sum(ABS(eachPrice)) as eachPrice,count(eachPrice) as bcount from lu_lotteries_k3s ' . $wheresql . ' and (noticed =1 || status <> -1) group  by uid) betting left join (select uid,userName,sum(ABS(bingoPrice)) as bingoPrice from lu_lotteries_k3s ' . $wheresql . ' and noticed=1 group  by uid) bingo on betting.uid = bingo.uid');
                }
                $isdaili = true;
                return view('User.inviteurl', compact('secondproxylist', 'userName', 'starttime', 'endtime', 'lu_lotteries_k3s', 'isdaili', 'display'));
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
                $types = defaultCache::cache_five_types();
            } else if (env('SITE_TYPE', '') == 'gaopin') {
                if (empty($bettingType)) {
                    $bettingType = 'k3';
                }
                if ($bettingType == "k3") {
                    $result = lu_lotteries_k3::where('uid', $id)->orderby('created_at', 'desc');
                    $types = defaultCache::cache_lottery_type();
                    $types2 = defaultCache::cache_lottery_type2();
                    $types = $types + $types2;
                } else if ($bettingType == 'five') {
                    $result = lu_lotteries_five::where('uid', $id)->orderby('created_at', 'desc');
                    $types = defaultCache::cache_five_types();
                } else if ($bettingType == 'ssc') {
                    $result = lu_lotteries_ssc::where('uid', $id)->orderby('created_at', 'desc');
                    $types = defaultCache::cache_ssc_types();
                } else if ($bettingType == '6he') {
                    $result = lu_lotteries_6he::where('uid', $id)->orderby('created_at', 'desc');
                    $types = defaultCache::cache_6he_types();
                }

            } else {
                $result = lu_lotteries_k3::where('uid', $id)->orderby('created_at', 'desc');
                $types = defaultCache::cache_lottery_type();
                $types2 = defaultCache::cache_lottery_type2();
                $types = $types + $types2;
            }
            $lu_lotteries_k3s = $result->paginate(10);
            return view('User.usrBettingList', compact('lu_lotteries_k3s', 'bettingType', 'types'));
        }
    }

    function proxypersonal($id)
    {
        $lu_user = lu_user::find($id);
        if ($lu_user->recId == Auth::user()->id) {

        }
    }

}
