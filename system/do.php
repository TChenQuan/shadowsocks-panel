<?php
//medoo
/* Report all errors except E_NOTICE */
//error_reporting(E_ALL^E_NOTICE);

$tokb = 1024;
$tomb = 1024*1024;
$togb = $tomb*1024;
$a_transfer = $a_transfer * $togb;

//Define DB Table Name
$db_table['user'] = "user";

//Version
$version   ="2.5.7";

//set timezone
date_default_timezone_set('PRC');
@ini_set('display_errors', 'off');

//Using Mysqli
$dbc = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$db_char = DB_CHARSET;
$dbc->query("SET NAMES utf8");
$dbc->query("SET time_zone = '+8:00'");

//$dbinfo
$dbInfo['database_type'] = DB_TYPE;
$dbInfo['database_name'] = DB_DBNAME;
$dbInfo['server'] = DB_HOST;
$dbInfo['username'] = DB_USER;
$dbInfo['password'] = DB_PWD;
$dbInfo['charset'] = DB_CHARSET;



//Define system Path
$base_path = substr(__DIR__,0,strlen(__DIR__)-7);
define('SS_PATH',$base_path);
define('SYSTEM_PATH',$base_path . "/system/");
//autoload class
spl_autoload_register('autoload');
function autoload($class){
    require_once SYSTEM_PATH.str_replace('\\','/',$class).'.php';
}
require_once 'Ss/Ext/Medoo.php';
require_once 'core.php';
$db = new medoo([
    // required
    'database_type' => DB_TYPE,
    'database_name' => DB_DBNAME,
    'server' => DB_HOST,
    'username' => DB_USER,
    'password' => DB_PWD,
    'charset' => DB_CHARSET,
    'port' => 3306,
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);


/**
 * 取得IP所在地区
 */
function getCountry() {
	$ip = getip();
	$jsonStr = doGet('http://ip.chacuo.net/?m=ip&act=f&t=1&ip=' . $ip);
	$obj = json_decode($jsonStr);
	return $obj->data->country;
}

function getCU() {
    $ip = getip();
    $jsonStr = doGet('http://ip.chacuo.net/?m=ip&act=f&t=1&ip=' . $ip);
    $obj = json_decode($jsonStr);
    return $obj->data->country_id;
}
/**
 * 发送模拟GET请求
 */
function doGet($url) {
	$options = array(
		'http' => array(
			'method' => 'GET',
			'header' => 'Content-type:application/x-www-form-urlencoded',
			'timeout' => 15 * 60 // 超时时间（单位:s）
		)
	);
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);

	return $result;
}

/**
 * 取访问者IP地址(外网)
 */
function getip(){
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    }else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }else if(!empty($_SERVER["REMOTE_ADDR"])){
        $cip = $_SERVER["REMOTE_ADDR"];
    }else{
        $cip = '';
    }
    preg_match("/[\d\.]{7,15}/", $cip, $cips);
    $cip = isset($cips[0]) ? $cips[0] : 'unknown';
    unset($cips);
    return $cip;
}

$Runtime= new \Ss\Etc\Runtime();
$core = new Core();
$Runtime->Start();
//$country_id = getCU(); //获得IP所在地