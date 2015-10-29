<?php namespace App\Http\Controllers\Proxy;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
    public function index()
    {
        //
        $isdaili = false;
        $display ='block';
        if (!Auth::guest()) {

            $groupId = Auth::user()->groupId;
            if ($groupId == 5 || $groupId == 3) {
                $display='none';
                $result = lu_user::where('recId', Auth::user()->id);
                $count = $result->count();
                $lu_users = $result->paginate(10);
                $user_groups = CommonClass::cache("user_groups", 1);
//                $result2 =  \DB::select('select id from lu_users where recid = ?', [11]);
                $isdaili = true;
                return view('User.inviteurl', compact('lu_users', 'user_groups', 'isdaili','display'));
            } else {
                return view('User.inviteurl', compact('isdaili','display'));
            }

        }
        return view('User.inviteurl',compact('display'));
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
    public function store()
    {
        //
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
