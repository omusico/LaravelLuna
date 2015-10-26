<?php namespace App\Http\Controllers;
use DB;

class WelcomeController extends Controller {

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
        $recentResult = Db::select('select * from lu_lotteries_results where id in (select max(id) from lu_lotteries_results group by typeName)');
        $recentArray = array();
        foreach($recentResult as $key=>$value){
            if($value->typeName=="ANHUI"){
                $recentArray['ANHUI'] = $value;
            }

            if($value->typeName=="BEIJIN"){
                $recentArray['BEIJIN'] = $value;
            }
            if($value->typeName=="FJK3"){
                $recentArray['FJK3'] = $value;
            }
            if($value->typeName=="HUBEI"){
                $recentArray['HUBEI'] = $value;
            }
            if($value->typeName=="HEBEI"){
                $recentArray['HEBEI'] = $value;
            }
            if($value->typeName=="JILIN"){
                $recentArray['JILIN'] = $value;
            }
            if($value->typeName=="JSNEW"){
                $recentArray['JSNEW'] = $value;
            }
            if($value->typeName=="JSOLD"){
                $recentArray['JSOLD'] = $value;
            }
            if($value->typeName=="NMG"){
                $recentArray['NMG'] = $value;
            }
        }
		return view('index',compact('recentArray'));
	}

    public function phpinfo(){
        return view('phpinfo');
    }

}
