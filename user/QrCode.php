<?php
require_once '../system/config.php';
$core->isLogin();
$id = $_GET['id'];
$node = new \Ss\Node\NodeInfo($id);
$server =  $node->Server();
$method = $node->Method();
$pass = $oo->get_pass();
$port = $oo->get_port();

$ssurl =  $method.":".$pass."@".$server.":".$port;
$ssqr = "ss://".base64_encode($ssurl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>节点信息 - <?php echo $site_name;  ?></title>
    <style>
        .main{
            text-align: center;
        }
        .qrcode {
            margin-top : 20px;
        }
    </style>
</head>
<body>

<div class="main">
    <p id="ssurl">ss://<?php echo $ssurl;?></p>
    <p id="ssqr"><?php echo $ssqr;?></p>
    <div id="qrcode" class="qrcode"></div>
    <div class="qrcode">请使用 客户端 的"<b>扫描屏幕上的二维码</b>"功能快速添加到配置列表</div>
</div>

<script src="<?=$res_url?>assets/js/jquery-1.11.1.min.js"></script>
<script src="/response/asset/js/jquery.qrcode.min.js"></script>
<script>jQuery('#qrcode').qrcode("<?php echo $ssqr;?>");</script>
</body>
</html>



