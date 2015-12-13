<?php namespace App\Console;

use App\Http\Controllers;
use App\LunaLib\Common;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();
//        $schedule->call('Common\CommonClass@cronCollect')->cron('*/1 * * * * *');
        $schedule->call(function () {
            if (\Cache::has("CountCron")) {
                \Cache::forever('CountCron', date('Y-m-d H:i:s'));
            }else{
                \Cache::Add('CountCron', date('Y-m-d H:i:s'),2);
            }
            if(env("COLLECT")=="1"){

                $fiveArrs=['sdfive','gdfive','shfive','zjfive','jxfive','liaoningfive','hljfive'];
                foreach($fiveArrs as $value){
                    exec('curl localhost/collectLotteryData?lottery_type='.$value);
                }
                $k3Arrs=['jsold','beijin','anhui','jilin','jsnew','hubei','hebei','nmg'];
                foreach($k3Arrs as $value){
                    exec('curl localhost/collectLotteryData?lottery_type='.$value);
                }
                $sscArrs=['cqssc','jxssc','tjssc','xjssc'];
                foreach($sscArrs as $value){
                    exec('curl localhost/collectLotteryData?lottery_type='.$value);
                }

            }else{
                if(env("SITE_TYPE")=="five"){
                    $fiveArrs=['sdfive','gdfive','shfive','zjfive','jxfive','liaoningfive','hljfive'];
                    foreach($fiveArrs as $value){
                        exec('curl www.11x51.com/collectLotteryData?lottery_type='.$value);
                    }
                }
                else{
                    $k3Arrs=['jsold','beijin','anhui','jilin','jsnew','hubei','hebei','nmg'];
                    foreach($k3Arrs as $value){
                        exec('curl www.k3558.com/collectLotteryData?lottery_type='.$value);
                    }
                }
            }
        })->cron('*/1 * * * * *');
	}

}
