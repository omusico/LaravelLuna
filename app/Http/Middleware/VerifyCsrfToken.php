<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $zf=strstr($_SERVER['REQUEST_URI'],'recharge');
        $kjt=strstr($_SERVER['REQUEST_URI'],'kjtReturn_Url');
        if(empty($zf) && empty($kjt)){
            return parent::handle($request, $next);
        }else{
            return $next($request);
        }
	}

}
