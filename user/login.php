<?php
require_once '../system/config.php';
//$core->isLogin(true);

if (!empty(@$_COOKIE['__c_status_u']) || @$_COOKIE['__c_status_u'] != '') {
    global $U,$oo, $uid;
	$tarr = @$_COOKIE['__c_status_u'];
	if($tarr!='') $tarr = $core->unpackc($tarr);
	
	$tarr = json_decode($tarr, true);
	$uid = $tarr['id'];
	$user_email = $tarr['email'];
	$user_pwd  = $tarr['pw'];
    
    $U = new \Ss\User\UserInfo($uid);
    $pwd = $U->GetPasswd();
    $pw = \Ss\User\Comm::CoPW($pwd);
    
	if ($pw != $user_pwd || $pw == null || $user_pwd == null) {
    	
    } else {
        header("Location:/member");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php';?>

</head>
<body class="page-body login-page">
	<div class="login-container">
		<div class="row">
			<div class="col-sm-6">
<script type="text/javascript">
jQuery(document).ready(function($){setTimeout(function(){$(".fade-in-effect").addClass("in");},1);$("form#login").validate({rules:{email:{required:true},passwd:{required:true}},messages:{email:{required:"请输入用户名."},passwd:{required:"请输入密码."}},submitHandler:function(form){show_loading_bar(70);var opts={closeButton:true,debug:false,positionClass:"toast-top-full-width",onclick:null,showDuration:"300",hideDuration:"1000",timeOut:"5000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"};$.ajax({url:"/action/login",method:"POST",dataType:"json",data:{do_login:true,email:$(form).find("#email").val(),passwd:$(form).find("#passwd").val(),remember_me:$(form).find("#remember_me").val()},success:function(resp){show_loading_bar({delay:.5,pct:100,finish:function(){if(resp.code=="1"){window.location.href="/member";}else if(resp.msg!=""){toastr.error(resp.msg,"提示!",opts);$('#email').select();}else{toastr.error("请求服务器失败，请稍后重试","无效登陆!",opts);$('#email').select();}}});}});}});$("form#register").validate({rules:{r_email:{required:true},r_passwd:{required:true},r_passwd2:{required:true},r_user_name:{required:true},r_invite:{required:true}},messages:{r_email:{required:"请输入用户名."},r_passwd:{required:"请输入密码."},r_passwd2:{required:"请再次输入密码"},r_user_name:{required:"请输入昵称"},r_invite:{required:"没邀请码注册个球啊?"}},submitHandler:function(form){show_loading_bar(70);var opts={closeButton:true,debug:false,positionClass:"toast-top-full-width",onclick:null,showDuration:"300",hideDuration:"1000",timeOut:"5000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"};if($("#r_passwd").val()==""||$("#r_passwd").val()!=$("#r_passwd2").val()){toastr.error("两次密码不一致","错误!",opts);return;}
jQuery(jQuery("#register button")[0]).attr("disabled",true);$.ajax({url:"/action/register",method:"POST",dataType:"json",data:{do_register:true,r_email:$(form).find("#r_email").val(),r_passwd:$(form).find("#r_passwd").val(),r_passwd2:$(form).find("#r_passwd2").val(),r_user_name:$(form).find("#r_user_name").val(),r_invite:$(form).find("#r_invite").val()},success:function(resp){show_loading_bar({delay:.5,pct:100,finish:function(){jQuery(jQuery("#register button")[0]).attr("disabled",false);if(resp.ok==1){toastr.success(resp.msg,"提示!",opts);$("#login").show();$(".external-login").show();$("#register").hide();}else if(resp.ok==0){toastr.error(resp.msg,"提示!",opts);$('#email').select();}else{toastr.error("请求服务器失败，请稍后重试","无效登陆!",opts);$('#email').select();}}});}});}});$("form#login .form-group:has(.form-control):first .form-control").focus();
});
</script>
				<div class="errors-container">
				</div>
				<form method="post" role="form" id="login" class="login-form fade-in-effect" autocomplete="off">
					
					<div class="login-header">
						<a href="/" class="logo">
							<img src="<?=$site_url?>assets/images/logo@2x.png" alt="" width="80" />
							<span>log in</span>
						</a>
						<p>登陆，然后变成一只猫!</p>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-dark" name="email" id="email" autocomplete="off" placeholder="电子邮件" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" placeholder="密码" />
					</div>
                    <div class="form-group">
                        <label>
    						<input type="checkbox" class="cbr">
    						保持登陆(7天内免登录)
    					</label>
                    </div>
					<div class="form-group">
						<button type="submit" class="btn btn-dark  btn-block text-left">
							<i class="fa-lock"></i>
							登 陆
						</button>
					</div>
					<div class="login-footer">
					    <a href="/invite">获取获取邀请码</a>
						<a href="/Auth/resetpwd">找回密码?</a>
						
						<div class="info-links">
							<a href="#">群号：189931777</a>&nbsp; <a href="/member/tos">用户使用协议</a>
						</div>
					</div>
				</form>
				<form method="post" role="form" id="register" class="login-form fade-in-effect" autocomplete="off" style="display: none;">
					<div class="login-header">
						<a href="/" class="logo">
							<img src="<?=$site_url?>assets/images/logo@2x.png" alt="" width="80" />
							<span>log in</span>
						</a>
						<p>注册，然后变成一只猫!</p>
					</div>
	
					<div class="form-group">
						<input type="text" class="form-control input-dark" name="r_email" id="r_email" autocomplete="off" placeholder="电子邮件" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-dark" name="r_user_name" id="r_user_name" autocomplete="off" placeholder="昵称" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control input-dark" name="r_passwd" id="r_passwd" autocomplete="off" placeholder="密码" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control input-dark" name="r_passwd2" id="r_passwd2" autocomplete="off" placeholder="重复密码" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-dark" name="r_invite" id="r_invite" autocomplete="off" value="<?=@$_GET['invite'] ?>" placeholder="邀请码" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info  btn-block text-left">
							<i class="fa-user"></i>
							注 册
						</button>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-dark  btn-block text-left" onclick="hideReg();">
							<i class="fa-lock"></i>
							返 回 登 陆
						</button>
					</div>
				</form>
				<div class="external-login">
					<a href="javascript:;" onClick="showReg();" class="facebook">
						<i class="fa-user"></i>
						注册账号
					</a>
				</div>
			</div>
		</div>
	</div>
	<script>function showReg(){$("#login").hide(),$(".external-login").hide(),$("#register").show()}function hideReg(){$("#login").show(),$(".external-login").show(),$("#register").hide()}</script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/bootstrap.min.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/TweenMax.min.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/resizeable.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/joinable.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/xenon-api.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/xenon-toggles.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/xenon-widgets.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/toastr/toastr.min.js"></script>
	<script src="//static-2.loacg.com/open/static/ss/assets/js/jquery-validate/jquery.validate.min.js"></script>
	<!-- JavaScripts initializations and stuff -->
	<script src="//static-2.loacg.com/open/static/ss/assets/js/xenon-custom.js"></script>
</body>
</html>