<?php
try {

//    exec('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master');
//
//    $fp = @popen('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master', "w");
    $str = system('/usr/bin/git pull origin master');
    echo $str.'<br>';
//    if ($fp) {
//        echo($fp);
//    }
//    @pclose($fp);
    echo "seventh<br>success";
} catch (\League\Flysystem\Exception $e) {
    echo $e->getMessage();
}
