<?php
/*
 * ss-panel配置文件
 * Author @orvice Modifyed @Sendya
 */

//是否开启站点  0 关闭, 1 开启
define("SITE_STATUS",'1');

//定义流量
$tokb = 1024;
$tomb = 1024*1024;
$togb = $tomb*1024;
//Define DB Connection  数据库信息
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','password');
define('DB_DBNAME','db');
define('DB_CHARSET','utf8');
define('DB_TYPE','mysql'); 
/*
 * 下面的东西根据需求修改
 */

//Define plan settings
$a_transfer = 10;//注册用户的初始化流量 单位/GB
$check_min = 50;//签到设置 签到获得的最低最高流量,单位MB
$check_max = 150;//签到设置 签到最大值
$user_invite_min = '0';//用户注册后获得的邀请码最低最高都设置为0用户就不能邀请
$user_invite_max = '0';//最高邀请数

//name
$site_name = "SS Cat";
$site_url  = "https://panel.com/";
$res_url = "//static-2.loacg.com/open/static/ss/"; // 用于cdn静态资源时

/**
 * 站点盐值，用于加密密码
 * 第一次安装请修改此值，安装后请勿修改！！否则会使所有密码失效，仅限加密方式不为1的时候有效
 */
$salt = "ss-panel";
/**
 * 密码加密方式，注意： 2.4以前的版本，请修改加密方式为「1」，否则会使密码失效！
 * 更多说明见wiki https://github.com/orvice/ss-panel/wiki/Install-Guide-zh_cn
 * 加密方式:
 * 1 md5
 * 2 带salt的Sha256加密，新安装建议使用此加密方式！
 */
$pwd_mode = 2;


//
//选择邮件服务,最好用 mailgun, smtp服务器在国外的话用国内的容易卡php
//mail-gun
//mail-smtp
$Selectmailservice = "mail-gun";
//邮件发件人
$sender = "xxx@xxx.xx";

//mail-gun
// Get your key from https://mailgun.com
$mailgun_key = "key-********************";
$mailgun_domain = "post.mloli.com";


//
//mail-smtp
//设置smtp服务器连接方式:  
//加密连接(ssl) = "1"
//普通连接 = "0"
$mail_smtp_Connection = "1";
//smtp服务器端口 25 , 465 ...
$mail_smtp_Port = 465;
//smtp服务器
$mail_smtp_Server = "smtp.gmail.com";
//邮件帐号
$mail_smtp_Account = "xxxx@gmail.com";
//邮件密码
$mail_smtp_password = "密码";

//mail-smtp
$smtpConfig = array(
        'server' => 'smtp.ym.163.com',
        'username' => 'ss@suki.im',
        'password' => '**********',
        'port' => '25'
    );


//
require_once 'do.php';
