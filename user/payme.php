<?php
require_once '../system/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="SSCat's Service - Sendya" />
	<title>捐赠 - <?=$site_name?></title>
    <link rel="stylesheet" href="//fonts.css.network/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/xenon-core.css">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/xenon-forms.css">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/xenon-components.css">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/xenon-skins.css">
    <link rel="stylesheet" href="<?=$res_url?>assets/css/custom.css">
    <script src="<?=$res_url?>assets/js/jquery-1.11.1.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body invite-page" style="padding-top: 2%;">

	<div class="invite-container">
	
		<div class="row">
            <div class="col-sm-12">
                    <div class="row center">
                    <h1>SS Cat</h1>
                    <h5>SS Cat 捐赠服务页</h5>
                    </div>
                    <div style="font-size:1.4em;text-align: center;">
                        <h2>非常感谢您愿意为本站捐赠</h2>
                        <span>捐赠费用将用于服务器更新,新增节点等</span>
                        <h3>请使用支付宝扫描下方二维码</h3>
                        <img src="/response/alipay.png" title="支付宝付款二维码" width="300px" height="300px"/>
                        <p>或者向以下账户转账</p>
                        <p>支付宝： 18x@loacg.com</p>
                        <p>Paypal： yladmxa@gmail.com</p>
                        <p>..</p>
                    </div>
                    <div class="row center">
                        <h4><a href="javascript:;" class="btn btn-black btn-icon" onclick="history.go(-1);"><span>&nbsp;&nbsp;&nbsp;返回&nbsp;&nbsp;&nbsp;&nbsp;</span><i class="fa-mail-reply-all"></i></a></h4>
                    </div>
            </div>
		</div>
	</div>
	<script src="<?=$res_url?>assets/js/bootstrap.min.js"></script>
	<script src="<?=$res_url?>assets/js/TweenMax.min.js"></script>
	<script src="<?=$res_url?>assets/js/resizeable.js"></script>
	<script src="<?=$res_url?>assets/js/joinable.js"></script>
	<script src="<?=$res_url?>assets/js/xenon-api.js"></script>
	<script src="<?=$res_url?>assets/js/xenon-toggles.js"></script>
	<script src="<?=$res_url?>assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="<?=$res_url?>assets/js/toastr/toastr.min.js"></script>
	<script src="<?=$res_url?>assets/js/xenon-custom.js"></script>
</body>
</html>