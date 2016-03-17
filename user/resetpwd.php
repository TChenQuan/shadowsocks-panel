<?php
/**
 * Created by IntelliJ IDEA.
 * User: i
 * Date: 2015/8/9
 * Time: 20:18
 */
require_once '../system/config.php';
//$core->isLogin();
$code = $_GET['code'];
$uid  = $_GET['uid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'head.php';?>
</head>
<body class="page-body lockscreen-page">

<div class="login-container">
    <div class="row">
        <div class="col-sm-7">
            <script type="text/javascript">
            jQuery(document).ready(function($){setTimeout(function(){$(".fade-in-effect").addClass("in");},1);$(".user-thumb a").on("click",function(ev){ev.preventDefault();$("#email").focus();});$(".lockcreen-form").validate({rules:{email:{required:true}},messages:{email:{required:"请输入注册时的邮件地址."}},submitHandler:function(form){show_loading_bar(70);var $passwd=$(form).find("#passwd"),opts={closeButton:true,debug:false,positionClass:"toast-top-full-width",onclick:null,showDuration:"300",hideDuration:"1000",timeOut:"5000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"};$("#resetButton").attr('disabled','true').html("请稍等");if($("#code").val()==null||$("#code").val()==''||$("#uid").val()==''){$.ajax({url:"/action/resetpwd",method:"POST",dataType:"json",data:{email:$("#email").val()},success:function(resp){show_loading_bar({delay:.5,pct:100,finish:function(){$("#resetButton").removeAttr('disabled').html("重置");if(resp.status=="1"){toastr.success(resp.msg,"系统消息!",opts);setTimeout("window.location.href = '/Auth/login';",3e3);}else if(resp.status=="2"){toastr.error(resp.msg,"错误!",opts);}else{toastr.error(resp.msg,"Invalid find pwd!",opts);$email.select();}}});}});}else{$.ajax({url:"/action/resetpwdtwo",method:"POST",dataType:"json",data:{email:$("#email").val(),code:$("#code").val(),uid:$("#uid").val()},success:function(resp){show_loading_bar({delay:.5,pct:100,finish:function(){$("#resetButton").removeAttr('disabled').html("确定重置");if(resp.status=="1"){toastr.success(resp.msg,"系统消息!",opts);setTimeout("window.location.href = '/Auth/login';",3e3);}else if(resp.status=="2"){2
toastr.error(resp.msg,"错误!",opts);}else{toastr.error(resp.msg,"Invalid find pwd!",opts);$email.select();}}});}});}}});$("form#lockscreen .form-group:has(.form-control):first .form-control").focus();});
            </script>
            <form role="form" id="resetpwd" class="lockcreen-form fade-in-effect">
                <div class="user-thumb">
                    <a href="#">
                        <img src="<?php echo \Ss\User\Comm::Gravatar("123@abc.com", 128);?>" class="img-responsive img-circle" />
                    </a>
                </div>
                <div class="form-group">
                    <h3>找回密码</h3>
                    <p><?php echo $code!='' ? '请再次验证您的邮箱地址,校验成功将发送新密码到您的邮箱.' : '如果你忘记了密码,可以在这里重置.&nbsp;<a href="/Auth/login" style="color:#FFF">返回登陆</a>' ; ?></p>
                    <div class="input-group">
                        <input type="hidden" id="code" name="code" class="form-control" value="<?php echo $code;?>" required autofocus>
                        <input type="hidden" id="uid" name="uid" class="form-control" value="<?php echo $uid;?>" required autofocus>
                        <input type="text" class="form-control input-dark" name="email" id="email" placeholder="注册时填写的邮件地址" />
							<span class="input-group-btn">
								<button type="submit" id="resetButton" class="btn btn-primary"><?php echo $code!='' ? '确定重置' : '重置' ; ?></button>
							</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
	<script src="<?=$res_url?>assets/js/bootstrap.min.js"></script>
	<script src="<?=$res_url?>assets/js/TweenMax.min.js"></script>
	<script src="<?=$res_url?>assets/js/resizeable.js"></script>
	<script src="<?=$res_url?>assets/js/joinable.js"></script>
	<script src="<?=$res_url?>assets/js/xenon-api.js"></script>
	<script src="<?=$res_url?>assets/js/xenon-toggles.js"></script>
	<script src="<?=$res_url?>assets/js/xenon-widgets.js"></script>
	<script src="<?=$res_url?>assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
	<script src="<?=$res_url?>assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
	<script src="<?=$res_url?>assets/js/toastr/toastr.min.js"></script>
    <script src="<?=$res_url?>assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="<?=$res_url?>assets/js/xenon-custom.js"></script>
</body>
</html>