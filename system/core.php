<?php

/**
 * Class Core
 * Auther Sendya
 * Modify 2015-7-29 11:15:17
 */
class Core {
    
    function __construct() {
        if(!SITE_STATUS) die("<div style='text-align:center;'>Site maintenance or not run!</div><hr /><div style='text-align:center;'>Sendya / Ss Server</div>");
    }
    
	function isLogin($page = false) {

		global $oo, $uid;
		$tokenOut = (time() - base64_decode(@$_COOKIE['token']));
		//检测是否登录，若没登录则转向登录界面
		if (!empty(@$_COOKIE['__c_status_u']) || @$_COOKIE['__c_status_u'] != '') {
			global $U;
			
			$tarr = trim($_COOKIE['__c_status_u']);
			if($tarr!='') $tarr = $this->unpackc($tarr);
			$tarr = json_decode($tarr, true);
			$uid = $tarr['id'];
			$user_email = $tarr['email'];
			$user_pwd  = $tarr['pw'];
			
			/*
			//co
			$uid = htmlspecialchars($_COOKIE['uid']);
			$user_email = htmlspecialchars($_COOKIE['user_email']);
			$user_pwd = htmlspecialchars($_COOKIE['user_pwd']);
            */
			$U = new \Ss\User\UserInfo($uid);
			//验证cookie
            
            //$_SESSION["user_lock"] = 0;
			if($tokenOut > 3600 && $_SESSION["user_lock"] != 1 && strstr($_SERVER['PHP_SELF'],"lockscreen") ==false && $_GET['a']!='lockCheck') {
			    $_SESSION["user_lock"] = 0;
			    setcookie("token",base64_encode(time()), time()+3600*24*7, "/");
			    header("Location:/member/lockscreen");
			}
			
			$pwd = $U->GetPasswd();
			$pw = \Ss\User\Comm::CoPW($pwd);
			
			if ($pw != $user_pwd || $pw == null || $user_pwd == null) {
				header("Location:/login");
				exit();
			} else {
                if($page) header("Location:/member");
			}
			
		} else {
			header("Location:/");
			exit();
		}
		$oo = new Ss\User\Ss($uid);
		// 不频繁写入cookie
		if($tokenOut > 2000) setcookie("token",base64_encode(time()), time()+3600*24*7, "/");
		
		return true;
	}

	function login() {
		$email = strtolower($_POST['email']);
		$passwd = $_POST['passwd'];
		$passwd = \Ss\User\Comm::SsPW($passwd);
		$rem = $_POST['remember_me'];
		$check = new \Ss\User\UserCheck();
		$query = new \Ss\User\Query();
		if($check->EmailLogin($email,$passwd)){
			$data['code'] = 1;
			$data['ok'] = 1;
			$data['msg'] = '欢迎回来';
			//login success
			$ext = 3600;
			if($rem= "week"){
				$ext = 3600*24*7;
			}else{
				$ext = 3600;
			}
			//get userid
			$id = $query->GetUidByEmail($email);
			$pw = \Ss\User\Comm::CoPW($passwd);
			$tarr = array(
			        "id" => $id,
			        "pw" => $pw,
			        "email" => $email
			    );
			$tarr = json_encode($tarr);
			$status_u = $this->packc($tarr);
			setcookie("__c_status_u", $status_u, time()+$ext, "/", $_SERVER["HTTP_HOST"]);
			setcookie("token",base64_encode(time()), time()+$ext, "/");
			
			/*
			setcookie("user_pwd",$pw,time()+$ext,"/");
			setcookie("uid",$id,time()+$ext,"/");
			setcookie("user_email",$email,time()+$ext,"/");
			setcookie("token",base64_encode(time()), time()+$ext, "/");
			*/
		} else {
			$data['code'] = 0;
			$data['msg'] = '邮箱或者密码错误';
		}
		echo json_encode($data);
		die();
	}
	
	function getDomain($str) {
	    //"?<=//|)((\\w)+\\.)+\\w+"
	}
	
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
	
	/**
	 * 取得IP所在地区
	 */
	static function getCountry() {
		$ip = Core::getip();
		$jsonStr = Core::doGet('http://ip.chacuo.net/?m=ip&act=f&t=1&ip=' . $ip);
		$obj = json_decode($jsonStr);
		echo $obj->data->country_id;
	}
	
	/**
	 * 发送模拟GET请求
	 */
	static function doGet($url) {
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
	static function getip(){
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
    
    
    function lzw_compress($string) {
        // compression
        $dict = array_flip(range("\\0", "\\xFF"));
        $dict_size = 256;
        $word = $string[0];
     
        $dict_count = 256;
        $bits = 8; 
        $bits_max = 256;
        $return = "";
        $rest = 0;
        $rest_length = 0;
     
        for ($i = 1, $j = strlen($string); $i < $j; $i++) {
            $x = $string[$i];
            $y = $word . $x;
            if (isset($dict[$y])) {
                $word .= $x;
            } else {
                $rest = ($rest << $bits) + $dict[$word];
                $rest_length += $bits;
                $dict_count++;
                if ($dict_count > $bits_max) {
                    $bits_max = 1 << ++$bits;
                }
                while ($rest_length > 7) {
                    $rest_length -= 8;
                    $return .= chr($rest >> $rest_length);
                    $rest &= (1 << $rest_length) - 1;
                }
                $dict[$y] = $dict_size++;
                $word = $x;
            }
        }
     
        $rest = ($rest << $bits) + $dict[$word];
        $rest_length += $bits;
        $dict_count++;
        if ($dict_count > $bits_max) {
            $bits_max = 1 << ++$bits;
        }
        while ($rest_length > 0) {
            if($rest_length>7){
                $rest_length -= 8;
                $return .= chr($rest >> $rest_length);
                $rest &= (1 << $rest_length) - 1;
            }else{
                $return .= chr($rest << (8 - $rest_length));
                $rest_length = 0;
            }
        }
     
        return $return;
    }
 
    /** LZW decompression
     * @param string compressed binary data
     * @return string original data
     */
    function lzw_decompress($binary) {
        // convert binary string to codes
        $rest = 0;
        $rest_length = 0;
        $out_count = 257;
        $bits = 9;
        $bits_max = 512;
          
        // decompression
        $dict = range("\\0", "\\xFF");
        $w = $binary[0];
        $return = $w;
          
        for ($i = 1, $j = strlen($binary); $i < $j; $i++) {
            $rest = ($rest << 8) + ord($binary[$i]);
            $rest_length += 8;
            if ($rest_length >= $bits) {
                $rest_length -= $bits;
                  
                // decompression
                $e = $dict[$rest >> $rest_length];
                if (!isset($e)) {
                    $e = $w . $w[0];
                }
                $return .= $e;
                $dict[] = $w . $e[0];
                $w = $e;
                //--decompression
                  
                $rest &= (1 << $rest_length) - 1;
                if (++$out_count > $bits_max) {
                    $bits_max = 1 << ++$bits;
                }
            }
        }
          
        return $return;
    }
}