<?php
function packc($str, $Off = 3) {
    $str = base64_encode(base64_encode($str));
    $strl = strlen($str);
    $str1 = substr($str, 0, $Off);
    $str3 = substr($str, ~$Off+1);
    $str2 = substr($str, $Off, $strl - $Off - $Off);
    $str = $str2 . $str1 . $str3;
    $str = base64_encode($str);
    return $str;
}

/**
 * 解码
 */
function unpackc($str, $Offset = 3) {
    $strl = strlen($str);
    $str = base64_decode($str);
    $_Offset = ~$Offset+1;
    // abs($Offset)
    $str3 = substr($str, $_Offset);
    $str2 = substr($str, 0, $_Offset);
    $str1 = substr($str2, $_Offset);
    $str2 = substr($str2, 0, strlen($str2) - $Offset);
    $str = $str1 . $str2 . $str3;
    $str = base64_decode(base64_decode($str));
    return $str;
}
//检测是否登录，若没登录则转向登录界面
if(isset($_COOKIE['__c_status_u']) || $_COOKIE['__c_status_u'] != ''){
        //co
		$tarr = trim($_COOKIE['__c_status_u']);
		if($tarr!='') $tarr = unpackc($tarr);
		$tarr = json_decode($tarr, true);
		$uid = $tarr['id'];
		$user_email = $tarr['email'];
		$user_pwd  = $tarr['pw'];

        $U = new \Ss\User\UserInfo($uid);
        //验证cookie
        $pwd = $U->GetPasswd();
        $pw = \Ss\User\Comm::CoPW($pwd);
        if($pw != $user_pwd){
            header("Location:/Auth/login");
        }
        if(!$U->isAdmin()){
            header("Location:/member");
        }
}else{
    header("Location:/login");
    exit();
}
$oo = new Ss\User\Ss($uid);