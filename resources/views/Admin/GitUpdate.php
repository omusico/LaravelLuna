<?php
//exec('ls');

$fp = @popen("git pull origin master", "w");
@pclose($fp);
echo "success";
