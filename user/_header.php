<?php
require_once '../system/config.php';
$core->isLogin();
$ssmin = new \Ss\Etc\Ana();
function ckAction($link){
    $self = $_SERVER['PHP_SELF'];
    if(strstr($self, $link)!=false){
        return true;
    } else {
        return false;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once './head.php';?>
</head>

<body class="page-body">
<div class="modal fade" id="modal-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">提示</h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-info" data-dismiss="modal">确定</button>
				</div>
			</div>
		</div>
</div>
<div class="page-loading-overlay">
	<div class="loader-2"></div>
</div>
	<div class="settings-pane">
		<a href="#" data-toggle="settings-pane" data-animate="true">
			&times;
		</a>
		<div class="settings-pane-inner">
			<div class="row">
				<div class="col-md-6">
					<div class="user-info">
						<div class="user-image">
							<a href="/member">
								<img src="<?php echo \Ss\User\Comm::Gravatar($U->GetEmail(), 128);  ?>" class="img-responsive img-circle" />
							</a>
						</div>
						<div class="user-details">
							<h3>
								<a href="/member"><?php echo $U->GetUserName(); ?></a>
								<!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
								<span class="user-status is-online"></span>
							</h3>
							<p class="user-title">加入时间：<?php echo $U->RegDate(); ?></p>
							<div class="user-links">
								<a href="/member/info" class="btn btn-primary">个人资料</a>
								<a href="/action/logout" class="btn btn-success">退出</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 link-blocks-env">
					<div class="links-block left-sep">
						<h4>
							<a href="javascript:;">
								<span>帮助</span>
							</a>
						</h4>
						<ul class="list-unstyled">
							<li>
								<a href="javascript:;">
									<i class="fa-angle-right"></i>
									支持中心
								</a>
							</li>
							<li>
								<a href="/member/feedback">
									<i class="fa-angle-right"></i>
									提交问题
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<i class="fa-angle-right"></i>
									使用协议
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<i class="fa-angle-right"></i>
									服务条款
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyrights">Xeon 基于 bootstrap 框架 - new SSPANEL -> Sendya.</div>
	<div class="page-container">
		<div class="sidebar-menu toggle-others fixed">
			<div class="sidebar-menu-inner">
				<header class="logo-env">
					<!-- logo -->
					<div class="logo">
						<a href="/member" class="logo-expanded">
							<img src="<?=$res_url?>assets/images/logo@2x.png" width="80" alt="" />
						</a>
						<a href="/member" class="logo-collapsed">
							<img src="<?=$res_url?>assets/images/logo-collapsed@2x.png" width="40" alt="" />
						</a>
					</div>
					<div class="mobile-menu-toggle visible-xs">
						<a href="javascript:;" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">2</span>
						</a>

						<a href="javascript:;" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
					<div class="settings-icon">
						<a href="javascript:;" data-toggle="settings-pane" data-animate="true">
							<i class="linecons-cog"></i>
						</a>
					</div>
				</header>
				<ul id="main-menu" class="main-menu">
				    <?php $self = $_SERVER['PHP_SELF'];?>
					<li class="opened <?php if(ckAction("index")) echo 'active'; ?>">
						<a href="/member">
							<i class="linecons-cog"></i>
							<span class="title">仪表盘</span>
						</a>
					</li>
					<li class="<?php if(ckAction("node")) echo 'active'; ?>">
						<a href="/member/node">
							<i class="linecons-params <?php if(strstr($self,"node") >0) echo 'active'; ?>"></i>
							<span class="title">节点列表</span>
							<span class="label label-success pull-right"><?php echo $ssmin->nodeStatusCount(); ?>/<?php echo $ssmin->nodeCount();?></span>
						</a>
					</li>
					<li class="<?php if(ckAction("info")) echo 'active'; ?>">
						<a href="/member/info">
							<i class="linecons-user <?php if(strstr($self,"main") >0) echo 'active'; ?>"></i>
							<span class="title">个人资料</span>
						</a>
					</li>
					<li class="<?php if(ckAction("passwd") || ckAction("sspwd") || ckAction("nickname") || ckAction("plan_update")) echo 'active opened expanded '; ?>">
						<a href="javascript:;">
							<i class="linecons-user <?php if(strstr($self,"nickname") >0) echo 'active'; ?>"></i>
							<span class="title">资料修改</span>
						</a>
						<ul>
							<li class="<?php if(ckAction("passwd")) echo 'active'; ?>">
								<a href="/member/passwd">
									<span class="title">修改网站登陆密码</span>
								</a>
							</li>
							<li class="<?php if(ckAction("sspwd")) echo 'active'; ?>">
								<a href="/member/sspwd">
									<span class="title">修改SS连接密码</span>
								</a>
							</li>
							<li class="<?php if(ckAction("nickname")) echo 'active'; ?>">
								<a href="/member/nickname">
									<span class="title">修改用户昵称</span>
								</a>
							</li>
							<li class="<?php if(ckAction("plan_update")) echo 'active'; ?>">
								<a href="/member/plan_update">
									<span class="title">升级账户</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php if(ckAction("actCard") || ckAction("buyCard")) echo 'active opened expanded '; ?>">
						<a href="#">
							<i class="linecons-paper-plane"></i>
							<span class="title">账户续期</span>
						</a>
						<ul>
							<li class="<?php if(ckAction("actCard")) echo 'active'; ?>">
								<a href="/member/actCard">
									<i class="entypo-flow-line"></i>
									<span class="title">自助续期</span>
								</a>
							</li>
							<li class="<?php if(ckAction("buyCard")) echo 'active'; ?>"><a href="/member/buyCard">
									<i class="entypo-flow-line"></i>
									<span class="title">购买套餐卡</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php if(ckAction("invite")) echo 'active'; ?>">
						<a href="/member/invite">
							<i class="linecons-heart <?php if(strstr($self,"invite") >0) echo 'active'; ?>"></i>
							<span class="title">邀请好友</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="linecons-paper-plane"></i>
							<span class="title">SS服务</span>
						</a>
						<ul>
							<li>
								<a href="//gravatar.ifdream.net/" target="_blank">
									<i class="entypo-flow-line"></i>
									<span class="title">修改头像</span>
								</a>
							</li>
							<li><a href="/member/tos">
								<i class="entypo-flow-line"></i>
								<span class="title">关于<?=$site_name?></span>
								</a>
							</li>
						</ul>
					</li>
					<?php if($U->isAdmin()) {?>
					<li>
					    <a href="/cpanel">
					        <i class="linecons-cog"></i>
					        <span class="title">管理员后台</span>
					    </a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
<?php include_once './content.php';?>
