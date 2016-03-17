<?php
require_once '../config.php';
//设定未续费用户停用
require_once 'stop_outime_user.php';
//流量清空
require_once 'reset_transfer.php';

//debug
$tmpFileTxt = SYSTEM_PATH . "cron/lastRunTime.txt";
@file_put_contents($tmpFileTxt, "lastTime:" . date('Y-m-d H:i:s',time()));
echo 'ok';