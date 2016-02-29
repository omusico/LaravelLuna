<?php namespace App\Http\Controllers;

use DB;

class WelcomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        if (!\Auth::guest()) {
            if (\Auth::user()->is_admin) {
                session()->flash('message_warning', '您是管理员！请重新登陆');
                return \Redirect::route('logout');
            }
        }

        $recentResult = Db::select('select * from lu_lotteries_results where id in (select max(id) from lu_lotteries_results group by typeName)');
        $recentArray = array();
        foreach ($recentResult as $key => $value) {
            if ($value->typeName == "ANHUI") {
                $recentArray['ANHUI'] = $value;
            }

            if ($value->typeName == "BEIJIN") {
                $recentArray['BEIJIN'] = $value;
            }
            if ($value->typeName == "FJK3") {
                $recentArray['FJK3'] = $value;
            }
            if ($value->typeName == "HUBEI") {
                $recentArray['HUBEI'] = $value;
            }
            if ($value->typeName == "HEBEI") {
                $recentArray['HEBEI'] = $value;
            }
            if ($value->typeName == "JILIN") {
                $recentArray['JILIN'] = $value;
            }
            if ($value->typeName == "JSNEW") {
                $recentArray['JSNEW'] = $value;
            }
            if ($value->typeName == "JSOLD") {
                $recentArray['JSOLD'] = $value;
            }
            if ($value->typeName == "NMG") {
                $recentArray['NMG'] = $value;
            }
            if ($value->typeName == "SDFIVE") {
                $recentArray['SDFIVE'] = $value;
            }
            if ($value->typeName == "GDFIVE") {
                $recentArray['GDFIVE'] = $value;
            }
            if ($value->typeName == "SHFIVE") {
                $recentArray['SHFIVE'] = $value;
            }
            if ($value->typeName == "JXFIVE") {
                $recentArray['JXFIVE'] = $value;
            }
            if ($value->typeName == "ZJFIVE") {
                $recentArray['ZJFIVE'] = $value;
            }
            if ($value->typeName == "CQFIVE") {
                $recentArray['CQFIVE'] = $value;
            }
            if ($value->typeName == "LIAONINGFIVE") {
                $recentArray['LIAONINGFIVE'] = $value;
            }
            if ($value->typeName == "HLJFIVE") {
                $recentArray['HLJFIVE'] = $value;
            }
        }
        if(env('SITE_TYPE','')=='five' && !\Auth::guest()){
            return view(env('SITE_TYPE', '') . 'loto', compact('recentArray'));
        }
        return view(env('SITE_TYPE', '') . 'index', compact('recentArray'));
    }

    public function five()
    {
        return view('fiveindex');
    }

    public function phpinfo()
    {
        return view('phpinfo');
    }

    public function mobile()
    {
        return view('mobile');
    }

    public function mobileindex()
    {
        return view('mobileindex');
    }
}
