<?php
require_once '../system/config.php';
$c = new \Ss\User\Invite();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Suki.im SS Server - Sendya" />
	<title>邀请码 - <?=$site_name?></title>
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
<body class="page-body invite-page" >

	<div class="invite-container">
	
		<div class="row">
            <div class="col-sm-12">
                    <div class="row center">
                    <h1>邀请码</h1>
                    <h5>如遇到无邀请码请找已经注册的用户获取。或在此<a href="http://t.cn/RUHq4UW">购买套餐</a>,或进群获取189931777。</h5>
                    </div>
                    
                    <table class="table" style="color:#FFF;">
                        <thead>
                        <tr>
                            <th style="color:#FFF;">###</th>
                            <th style="color:#FFF;">邀请码</th>
                            <th style="color:#FFF;">状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $datas = $c->CodeArray(); 
                        if($datas!=null) {
                        foreach($datas as $data ){
                            ?>
                            <tr>
                                <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['code'];?></td>
                                <td>可用</td>
                            </tr>
                        <?php }
                        } else {
                            echo '<tr><td colspan="3" align="center" style="text-align:center;">木有邀请码~ ٩( \'ω\' )و </td></tr>';
                        } ?>
                        </tbody>
                    </table>
                    <div class="row center">
                        <h4><a href="/Auth/login" class="btn btn-black btn-icon"><span>&nbsp;回到登陆&nbsp;</span><i class="fa-mail-reply-all"></i></a></h4>
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