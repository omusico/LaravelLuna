<?php
exec('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master');

$fp = @popen('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master', "r");
if($fp){
    echo($fp);
}
@pclose($fp);
echo "second<br>success";
