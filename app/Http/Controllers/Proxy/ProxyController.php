<?php namespace App\Http\Controllers\Proxy;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
                $result = lu_user::where('recId', Auth::user()->id);
                if (!empty($userName)) {
                    $result->where('name', $userName);
                }
//                if (empty($starttime) && empty($endtime)) {
//                    $result->where('left(created_at,10)',date('Y-m-d'));
//                }
                if (!empty($starttime)) {
                    $result->where('created_at', '>=', $starttime);
                }
                if (!empty($endtime)) {
                    $result->where('created_at', '<=', $endtime);
                }
                $lu_users = $result->paginate(10);
                $user_groups = CommonClass::cache("user_groups", 1);
                $isdaili = true;
                return view('User.inviteurl', compact('lu_users', 'user_groups', 'isdaili', 'display', 'userName', 'starttime', 'endtime'));

            } else {
                return view('User.inviteurl', compact('isdaili', 'display'));
            }

        }
        return view('User.inviteurl', compact('display'));
    }

    function proxydetail($id)
    {
        if (lu_user::find($id)->recId == Auth::user()->id) {
            $result = lu_lotteries_k3::where('uid', $id)->orderby('created_at', 'desc');
            $lu_lotteries_k3s = $result->paginate(10);
            return view('User.usrBettingList', compact('lu_lotteries_k3s'));
        }
    }

}
