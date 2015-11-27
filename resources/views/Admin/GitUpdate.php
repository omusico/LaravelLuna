<?php
exec('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master');

$fp = @popen('/usr/bin/cd /var/www/html/LaravelLuna | /usr/bin/git pull origin master', "w");
if($fp){
    echo($fp);
}
@pclose($fp);
echo "forth<br>success";
