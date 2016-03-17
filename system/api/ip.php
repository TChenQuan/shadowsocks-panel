<?php

$action = $_REQUEST['action'];
$data = array("error" => 1, "message" => "请求失败");
switch($action){
    case 'ip':
        $data['error'] = 0;
        $data['message'] = 'success';
        $data['ipAddress'] = getip();
        break;
    case 'country':
        echo getIPinfo(getip());
        exit();
        break;
    default:
        break;
}
echo json_encode($data);
exit();
/**
 * Get Ip address 4 chacuo.net
 */
function getCountry() {
	$ip = getip();
	$jsonStr = doGet('http://ip.chacuo.net/?m=ip&act=f&t=1&ip=' . $ip);
	$obj = json_decode($jsonStr);
	return $obj->data->country;
}
/**
 * Get ip address 4 php location. host
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

/**
 * 发送模拟GET请求
 */
function doGet($url) {
	$options = array(
		'http' => array(
			'method' => 'GET',
			'header' => 'Content-type:application/x-www-form-urlencoded',
			'timeout' => 4 // 超时时间（单位:s）
		)
	);
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);

	return $result;
}

function getIPinfo($ipAddress) {
    $ch = curl_init();
    $url = 'http://apis.baidu.com/apistore/iplookupservice/iplookup?ip='.$ipAddress;
    $header = array(
        'apikey: 8c2732c8237d220bb1a281aa6f9ea7ea',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);
    return $res;
}