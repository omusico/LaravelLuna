<?php
try {

//    exec('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master');
//
//    $fp = @popen('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master', "w");
    $str = system('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master');
    echo $str;
//    if ($fp) {
//        echo($fp);
//    }
//    @pclose($fp);
    echo "fifth<br>success";
} catch (\League\Flysystem\Exception $e) {
    echo $e->getMessage();
}
