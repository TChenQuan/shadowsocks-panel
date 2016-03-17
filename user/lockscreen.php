<?php
/**
 * Created by IntelliJ IDEA.
 * User: i
 * Date: 2015/8/9
 * Time: 20:18
 */
require_once '../system/config.php';
$core->isLogin();
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
                jQuery(document).ready(function($){setTimeout(function(){$(".fade-in-effect").addClass('in')},1);$(".user-thumb a").on('click',function(ev){ev.preventDefault();$("#passwd").focus()});$(".lockcreen-form").validate({rules:{passwd:{required:true}},messages:{passwd:{required:'Please enter your password.'}},submitHandler:function(form){show_loading_bar(70);var $passwd=$(form).find('#passwd'),opts={"closeButton":true,"debug":false,"positionClass":"toast-top-full-width","onclick":null,"showDuration":"300","hideDuration":"1000","timeOut":"5000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut"};$.ajax({url:"/action/lockCheck",method:'POST',dataType:'json',data:{do_login:true,email:$("#email").val(),passwd:$passwd.val(),},success:function(resp){show_loading_bar({delay:.5,pct:100,finish:function(){if(resp.status){window.location.href='/member'}else{toastr.error(resp.msg,"Invalid Login!",opts);$passwd.select()}}})}})}});$("form#lockscreen .form-group:has(.form-control):first .form-control").focus()});
            </script>
            <form role="form" id="lockscreen" class="lockcreen-form fade-in-effect">
                <div class="user-thumb">
                    <a href="#">
                        <img src="<?php echo \Ss\User\Comm::Gravatar($U->GetEmail(), 128);?>" class="img-responsive img-circle" />
                    </a>
                </div>
                <div class="form-group">
                    <h3>欢迎回来, <?php
                    srand(microtime());
                    $rnd = mt_rand(0, 1);
                    if($rnd==0) {$rnd = "酱";} else {$rnd = "桑";}
                    echo $U->GetUserName() .$rnd; ?>!</h3>
                    <p>由于您长时间离开, 需要再次验证密码.</p>
                    <div class="input-group">
                        <input type="hidden" name="email" id="email" value="<?php echo $U->GetEmail();?>"/>
                        <input type="password" class="form-control input-dark" name="passwd" id="passwd" placeholder="Password" />
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">确认</button>
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
</body></html>