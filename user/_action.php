<?php
require_once '../system/config.php';
require '../system/Library/autoload.php';

use Mailgun\Mailgun;

$action = $_GET['a'];
if($action == 'login') $core->login();
if($action != 'register' && $action != 'resetpwd' && $action!='resetpwdtwo') {
	$core->isLogin();
}

$data = array();
$data['status'] = 0;

switch($action) {
    case 'logout':
        session_start();
        setcookie("__c_status_u", "", time()-3600, "/", $_SERVER["HTTP_HOST"]);
        setcookie("token", "", time()-3600, "/");
        header("Location:/");
        break;
	case 'register':
	    $data['nowtest'] = "1";
		$email = $_POST['r_email'];
		$email = strtolower($email);
		$passwd = $_POST['r_passwd'];
		$repasswd = $_POST['r_passwd2'];
		$name = $_POST['r_user_name'];
		//$agree = $_POST['agree'];
		$code = $_POST['r_invite'];

		$c = new \Ss\User\UserCheck();
		$code = new \Ss\User\InviteCode($code);
		$data['ok'] = '0';
		if(!$code->IsCodeOk()){
			$data['msg'] = "邀请码无效";
		}elseif(!$c->IsEmailLegal($email)){
			$data['msg'] = "邮箱无效";
		}elseif($c->IsEmailUsed($email)){
			$data['msg'] = "邮箱已被使用";
		}elseif($repasswd != $passwd){
			$data['msg'] = "两次密码输入不符合";
		}elseif(strlen($passwd)<8){
			$data['msg'] = "密码太短,至少8字符";
		}elseif(strlen($name)<6){
			$data['msg'] = "昵称太短，至少2中文字或6个英文";
		}elseif($c->IsUsernameUsed($name)){
			$data['msg'] = "昵称已经被使用";
		}else{
			// get value
			$ref_by = $code->GetCodeUser();
			$passwd = \Ss\User\Comm::SsPW($passwd);
			$plan = "A";
			$transfer = $a_transfer;
			$invite_num = rand($user_invite_min,$user_invite_max);
			//do reg
			$reg = new \Ss\User\Reg();
			$code->Del();
			$reg->Reg($name,$email,$passwd,$plan,$transfer,$invite_num,$ref_by);
			
			$data['ok'] = '1';
			$data['msg'] = "注册成功, 现在您可以登录了。";
			
			//$mg = new Mailgun($mailgun_key);
			
            $username = $name;
            $content = "您的邮箱账户 &lt;".$email."&gt;,<wbr>已经成功加入 Suki.im会员组。<br/><b>本站提供服务列表</b><br/><b>套餐A</b> : 免费(体验) - 5GB/月<br/><b>套餐B</b> : 13RMB - 100GB/月<br/><b>套餐C</b> : 20RMB - 200GB/月<br/><b>套餐D</b> : 35RMB - 500GB/月<br/>";
            $time = date('Y-m-d H:i:s', time());

$HtmlMain = <<<EOF
<style>body {display: block;margin: 0px;}</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tbody>
	<tr>
		<td align="center">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td colspan="3" height="37" bgcolor="#ebebeb"></td>
				</tr>
				<tr>
					<td width="29" bgcolor="#ebebeb"></td>
					<td valign="top">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tbody><tr>
								<td width="196" height="62" bgcolor="#ebebeb" valign="top"><a href="https://ss.suki.im/" title="SS 喵 &gt;&gt; 我是会爬墙的喵." target="_blank"><img src="https://sscat.it/assets/mail/logo.png" alt="" style="border:0 none" class="CToWUd"></a></td>
								<td bgcolor="#ebebeb" valign="middle" align="right" style="font-size:18px;line-height:24px;font-weight:500;color:#333;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">通知系统</td>
							</tr>
							<tr>
								<td bgcolor="#ebebeb" colspan="2">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tbody><tr>
											<td style="border:1px #d9d9d9 solid;background:#fff;padding:15px 18px 18px;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">
												<p style="font-size:14px;line-height:30px;color:#333;margin:0">$username 您好！<br><br>$content<br><br></p>
												<div style="font-size:14px;line-height:30px;margin:0 0 20px 0;color:#777">
												感谢您选择Suki.im，我们竭诚为您服务。<br>
												上墙？加密传输？玩外服游戏？肝船？神马都不是问题！<wbr>Suki.im将带给您不一样的海外网络加速体验。<br>
												如果您是第一次使用我们服务，<wbr>欢迎访问Suki.im帮助中心了解您所需要的信息：<a href="https://ss.suki.im/Help/index.html" target="_blank">http<wbr>://ss.suki.im/Help/<wbr>index.html</a><br><br>
												使用中遇到任何相关问题，欢迎联系官方技术支持QQ：<a href="http://crm2.qq.com/page/portalpage/wpa.php?uin=337585725&amp;f=1&amp;ty=1&amp;aty=0&amp;a=&amp;from=6" target="_blank">337<wbr>585725</a>进行咨询。<br>
												关注我们的官方微博(<a href="http://weibo.com/sendya_" style="font-size:10px" target="_blank">@Sendya_</a>)<wbr>以获取Suki.im最新动态。
												</div>
												<hr style="border:0 none;border-top:1px #dbdbdb dashed;min-height:0;font-size:0;margin:0 0 18px 0">
												<p style="margin:0;text-align:right;color:#999;font-size:12px;line-height:24px">Suki.im 管理团队<br>$time</p>
											</td>
										</tr>
									</tbody></table>
								</td>
							</tr>
						</tbody></table>
					</td>
					<td width="29" bgcolor="#ebebeb"></td>
				</tr>
				<tr>
					<td width="29" bgcolor="#ebebeb"></td>
					<td bgcolor="#ebebeb" valign="top">
						<p style="font-size:12px;line-height:30px;margin:26px 0 6px 0;color:#777;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">本邮件地址仅发送通告邮件，请不要答复此邮件，<wbr>发送到此地址的邮件将不会得到答复。 </p>
						<p style="font-size:12px;line-height:22px;margin:0 0 0 0;color:#999;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">Shallow Pui Network  Co., Ltd.<br>
							EMail：<a href="mailto:support@loacg.com" style="color:#999;text-decoration:none" target="_blank">support@loacg.com</a><br>
							博客：<a href="https://www.loacg.com" style="color:#999;text-decoration:none" target="_blank">https://www.loacg.com</a><br>
							主站：<a href="https://ss.suki.im" style="color:#999;text-decoration:none" target="_blank">https://ss.suki.im</a><br>
						</p>
					</td>
					<td width="29" bgcolor="#ebebeb"></td>
				</tr>
				<tr>
					<td colspan="3" height="40" bgcolor="#ebebeb"></td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>
EOF;		
		}
		break;
    case 'checkin':

        if(!$oo->is_able_to_check_in()){
            $transfer_to_add = 0;
        }else {
            if ($oo->unused_transfer() < 2048 * $tomb) {
                $transfer_to_add = rand(1024, 2048);
            } else {
                $transfer_to_add = rand($check_min, $check_max);
            }
            $oo->add_transfer($transfer_to_add*$tomb);
            $oo->update_last_check_in_time();
        }
        if($transfer_to_add != 0) {
            $data['status'] = 1;
            $data['msg'] = "获得了".$transfer_to_add."MB流量";
        } else {
            $data['msg'] = '您已在 ' . date('Y-m-d H:i:s',$oo->get_last_check_in_time()) . " 签到过";
        }
        break;
    case 'plan_update':
        $plan = $oo->get_plan();
        if($plan == 'A' && time()-$U->RegDateUnixTime() < 3600*24*30 ) {
            $data['msg'] = "去淘宝买";
        }elseif($plan == 'B' && $U->Money() <= 450) {
            $data['msg'] = "您的余额不足，需要450元才可以升级到 C 套餐。";
        }elseif($plan == 'C' && $U->Money() <= 12450) {
            $data['msg'] = "您的余额不足，需要12450元才可以升级到 VIP 套餐。";
        }elseif($plan == 'VIP') {
            $data['msg'] = "您已经是最高级别账户，无法继续升级。";
        }elseif($plan == 'A' && time()-$U->RegDateUnixTime() > 3600*24*30) {
            $liuliang = ($U->GetTransferEnable() *2);
            $U->UpdateTransferEnable($liuliang);
            $U->UpdatePlan("B");
            $data['msg'] = "恭喜您，您的账户成功升级到 B 套餐。";
        }elseif($plan == 'B' && $U->Money() >= 450) {
            $liuliang = ($U->GetTransferEnable() *3);
            $U->UpdateTransferEnable($liuliang);
            $U->UpdatePlan("C");
            $data['msg'] = "恭喜您，您的账户成功升级到 C 套餐。";
        }elseif($plan == 'C' && $U->Money() >= 12450) {
            $liuliang = ($U->GetTransferEnable() *4);
            $U->UpdateTransferEnable($liuliang);
            $U->UpdatePlan("VIP");
            $data['msg'] = "恭喜您，您的账户成功升级到 VIP 套餐。";
        }
        $data['error'] = 0;
        break;
    case 'm_nickname':
        $data['msg'] = '修改失败';
        $nickname = $_POST['nickname'];
        if($nickname == null || $nickname == '') break;
        $U->UpdateNickName($nickname);
        $data['msg'] = '修改昵称成功';
        break;
    case 'lockCheck':
        setcookie("token",base64_encode(time()), time()+(3600*24*7), "/");
        
    	$tarr = trim($_COOKIE['__c_status_u']);
    	if($tarr!='') $tarr = $core->unpackc($tarr);
    	$tarr = json_decode($tarr, true);
    	$uid = $tarr['id'];
    	$user_email = $tarr['email'];
    	$user_pwd  = $tarr['pw'];
        
        $lock_passwd = \Ss\User\Comm::SsPW(trim($_POST['passwd']));
        
        $U = new \Ss\User\UserInfo($uid);
        $pwd = $U->GetPasswd();

        if ($pwd == $lock_passwd) {
            setcookie("token",base64_encode(time()), time()+(3600*24*7), "/");
            $_SESSION['user_lock'] = 0;
            $data['msg'] = 'Login success.';
            $data['status'] = 1;
            break;
        }
        
        $data['msg'] = 'You have entered wrong password, please try again.';
        $data['status'] = 0;
        break;
    case 'invite':
        $invite = new \Ss\User\Invite($uid);
        if($U->InviteNum()==0){
        $data['msg'] = "出错了";
        }elseif(time()-$U->RegDateUnixTime() < 3600*48 ){
            $data['msg'] = "注册48小时后才可以生成邀请码。";
        }else{
            $invite->AddAllCode();
            $U->InviteNumToZero();
            $data['status'] = "1";
            $data['msg'] = "Done";
        }
        
        break;
    case 'inviteFlow':
        $ss = new \Ss\User\Ss($uid);
        $data['status'] = "0";
        if($ss->get_transfer_enable() < $togb*10 || $ss->getUnusedTransfer() < $togb*10) {
            $data['msg'] = "至少需要流量10GB才可以使用流量换购邀请码。";
            break;
        }
        $ss->less_transfer($togb*10);
        $U->AddInviteNum(1);
        $data['status'] = "1";
        $data['msg'] = "恭喜您获得1个邀请码生成权限";
        break;
    case 'm_passwd':
        $nowpwd = $_POST['nowpwd'];
        $pwd = $_POST['pwd'];
        $repwd = $_POST['repwd'];
        
        $nowpwd = \Ss\User\Comm::SsPW($nowpwd);
        if($U->GetPasswd() != $nowpwd) {
            $data['error'] = '1';
            $data['msg'] = "旧密码错误";
        }elseif($pwd != $repwd){
            $data['error'] = '1';
            $data['msg'] = "两次密码输入不同";
        }elseif(strlen($pwd)<8){
            $data['error'] = '1';
            $data['msg'] = "新密码太短啦";
        }else{
            $data['status'] = '1';
            $data['msg'] = "修改成功";
            $pwd = \Ss\User\Comm::SsPW($pwd);
            $U->UpdatePwd($pwd);
        }
        break;
    case 'm_sspwd':
        // $pwd = $_POST['sspwd'];
        if($_POST['sspwd'] == ''){
            $pwd = \Ss\Etc\Comm::get_random_char(8);
        }else{
            $pwd = $_POST['sspwd'];
            $pwd = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
            $pwd = \Ss\Etc\Comm::checkHtml($pwd);
        }
        $oo->update_ss_pass($pwd);
        $data['status'] = '1';
        $data['msg'] = "新密码为".$pwd;
        $data['sspwd'] = $pwd;
        break;
    case 'resetpwd':
        
        $mg = new Mailgun($mailgun_key);

        $email    = $_REQUEST['email'];
        $c = new \Ss\User\UserCheck();
        $q = new \Ss\User\Query();
        if($c->IsEmailUsed($email)){
            $uid = $q->GetUidByEmail($email);
            $rst = new \Ss\User\ResetPwd($uid);
            if($rst->IsAbleToReset()){
                $code = $rst->NewLog();
                
                $user = new \Ss\User\UserInfo($uid);
                //send # Now, compose and send your message.
                $resetUrl = $site_url."resetpwd?code=".$code."&uid=".$uid;
                $content = '请访问此链接申请重置密码: <a href="'.$resetUrl.'" target="_blank">'.$resetUrl.'</a>';
                $username = $user->GetUserName();
                
                require_once 'mail.php';
                
                $status = $mg->sendMessage($mailgun_domain, array('from'    => "no-reply@".$mailgun_domain,
                                'to'      => $email,
                                'subject' => "[". $site_name."] 重置密码 - 回执",
                                'html'    => $HtmlMain));

                if($status->http_response_code == '200'){
                    $data['status'] = '1';
                    $data['ok'] = '1';
                    $data['msg']  =  "已经发送到您的邮箱，请登陆邮箱查收";
                } else {
                    $data['status'] = '0';
                    $data['ok'] = '0';
                    $data['msg']  =  "服务器当前无法发送邮件，请稍候再试";
                }
            }else{
                $data['status'] = '2';
                $data['msg']  =  "24小时内申请超过上限";
            }
        }else{
            $data['status'] = '2';
            $data['msg']  =  "邮箱不存在";
        }
        break;
    case 'resetpwdtwo':
        
        
        $mg = new Mailgun($mailgun_key);

        $code     = $_POST['code'];
        $email    = $_POST['email'];
        $uid      = $_POST['uid'];
        //
        $ur = new \Ss\User\UserInfo($uid);
        if($ur->GetEmail() == $email){
            $rs = '1';
        }else{
            $rs = '0';
        }
        if(!$rs){
            $data['status'] = '2';
            $data['msg']  =  "邮箱错误";
        }else{
            $rst = new \Ss\User\ResetPwd($uid);
            $u   = new \Ss\User\User($uid);
            if($rst->IsCharOK($code,$uid)){
                $NewPwd = md5(time().$uid.$email);
                
                $user = new \Ss\User\UserInfo($uid);
                $username = $user->GetUserName();
                $content = "您的新密码为:".$NewPwd . "  请使用新密码登陆账户,<wbr>并且立即修改本随机生成的密码！";
                require_once 'mail.php';
                
                $status = $mg->sendMessage($mailgun_domain, array('from'    => "no-reply@".$mailgun_domain,
                    'to'      => $email,
                    'subject' => "[". $site_name."] 找回密码 - 您的新密码",
                    'html'    => $HtmlMain));
               
                $u->UpdatePWd($NewPwd);
                $rst->Del($code,$uid);
                $data['status'] = '1';
                $data['ok'] = '1';
                $data['msg']  =  "新密码已经发送到您的邮箱";

            }else{
                $data['status'] = '2';
                $data['msg']  =  "链接无效";
            }
        }
        
        break;
    case 'checkExpireDate':
        $U = new \Ss\User\UserInfo($uid);
        $extime = $U->ExpireDate();
        $user = $U->CheckExpireDate(time());
        if($user!=null && $user['uid'] != null) {
            $U->OpenUser();
            $data['status'] = '1';
            $data['ok'] = '1';
            $data['msg']  =  "刷新成功,现在你可以使用该账户连接SS服务了";
        }else if($extime > time()){
            $data['status'] = '1';
            $data['ok'] = '0';
            $data['extime'] = date('Y-m-d H:i:s',$extime);
            $data['msg']  =  "账户到期时间为 " . date('Y-m-d H:i:s',$extime) . "";
        }else {
            $data['status'] = '1';
            $data['ok'] = '0';
            $data['extime'] = date('Y-m-d H:i:s',$extime);
            $data['msg']  =  "您的账户已到期，时间： " . date('Y-m-d H:i:s',$extime) . " 请续费后在试！";
        }
        break;
    case "actCard":
        $act_card = $_POST['act_card'];
        if($act_card == null || $act_card == '') {
            $data['msg'] = "卡号不正确，请重试";
            echo json_encode($data);
            exit();
        }
        $Card = new \Ss\Card\Card();
        $cardOjb = $Card->queryCard($act_card);

        /**
         * 0 月卡，1 季度卡，2 半年卡 ，5 流量卡（20GB）
         * 6 流量卡（50GB），7 流量卡（100GB）, 8 流量卡（200GB）
         */
        if($cardOjb != null) {
            $U = new \Ss\User\UserInfo($uid);
            $extime = $U->ExpireDate();

            $type = trim($cardOjb['type']);

            $nowTime = time();
            $addTime = 0;
            $addFlow = 0;
            $remark = "";
            // 判断卡类型
            switch ($type) {
                case 0:
                    $addTime = 31 * 24 * 60 * 60;
                    $remark = "月卡";
                    break;
                case 1:
                    $addTime = 31 * 24 * 60 * 60 * 3;
                    $remark = "季度卡";
                    break;
                case 2:
                    $addTime = 31 * 24 * 60 * 60 * 6;
                    $remark = "半年卡";
                    break;
                case 5:
                    $addFlow = 20 * $togb;
                    $remark = "流量卡 20G";
                    break;
                case 6:
                    $addFlow = 50 * $togb;
                    $remark = "流量卡 50G";
                    break;
                case 7:
                    $addFlow = 100 * $togb;
                    $remark = "流量卡 100G";
                    break;
                case 8:
                    $addFlow = 200 * $togb;
                    $remark = "流量卡 200G";
                    break;
                default:
                    break;
            }
            
            if($addTime != 0 ) {
                // --TODO 后期增加功能 增加一个顺便修改套餐等级（总流量）的设定
                $U->updatePayDate($nowTime, $addTime, $remark);
            } else if($addFlow != 0) {
                $U->updateFlowAndTime($nowTime, $addFlow, $remark); // 有bug
            }

            // 更新账户数据 并且删除 or 禁用此卡
            $Card->destroyCard($act_card); // 禁用此卡
            $data['msg'] = "激活成功，您已激活 “" + $remark + "”";
            $data['error'] = 1;
        }
        break;
    default:
        break;
}
echo json_encode($data);