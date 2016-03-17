<?php
//定义清零日期,1为每月1号
$lockFile = SYSTEM_PATH . "cron/reset_transfer.lock";
$reset_date = '1';
//日期符合就清零 
if (date('d')==$reset_date && !file_exists($lockFile)){
 
        global $db;
        $sum = $db->sum("user" , "u+d" ," where uid!=66") + $db->sum("user", "d+u", " where uid=66");
        $db->update("user", ["u" => $sum], " where uid=66");
        $db->update("user" ,["u" => "0","d" => "0"] ," where uid!=66");
        @file_put_contents($lockFile, "");
} else {
    if(file_exists($lockFile) && date('d')!="1")
        @unlink($lockFile);
}