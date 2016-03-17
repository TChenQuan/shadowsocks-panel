<?php
$flag = true;
$today = time();
$Users = new Ss\User\User();
if($flag){
    $us = $Users->AllUserByOuttime($today);
    $content = '<pre>';
    foreach ( $us as $rs ){
        
        $content.= "-> 用户ID [". $rs['uid'] . "\t] [" . $rs['user_name'] . "\t]";
        $content.= "EMAIL [" . $rs['email'] . "\t]续费时间 [" . date('Y-m-d H:i:s',$rs['paytime']) . "\t]";
        $content.= "到期时间 [" . $rs['expire_date'] . "\t]<br/>";

        $U = new \Ss\User\UserInfo($rs['uid']);
        $U->StopUser();
    }
    //echo $content . "</pre>";
    $openUser = $Users->AllUserByIntime($today);
    foreach ( $openUser as $rs ){
        $U = new \Ss\User\UserInfo($rs['uid']);
        $U->OpenUser();
    }
}