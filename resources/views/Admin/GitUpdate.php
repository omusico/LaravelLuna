<?php
//exec('ls');

$fp = @popen("git pull origin master", "w");
echo($fp);
@pclose($fp);
echo "success";
