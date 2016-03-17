<?php
require_once '../../lib/config.php';

$num = $_POST['NUMBER'];
$type = $_POST['TYPE'];
$key = $_POST['KEY'];
if($num != 0 && $key=='LBFEBFBFF36C3G1S3RSNFA6B5735Key') {
    $invite = new \Ss\User\Invite($uid);
    $arr = $invite->AddCode($num, $type);
    $str = "";
    for($i=0;$i<$arr.length();$i++) {
        $str.=$arr[$i]."|";
    }
    echo $str;
}else{
    echo "This url could not be access directly.";
}
exit();