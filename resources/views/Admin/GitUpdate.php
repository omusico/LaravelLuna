<?php
//exec('ls');

$fp = @popen('/bin/git pull origin master', "r");
echo($fp);
@pclose($fp);
echo "success";
