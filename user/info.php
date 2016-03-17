<?php
require_once './_header.php';
?>

			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">用户中心</h1>
					<p class="description">个人资料，用户信息等..</p>
				</div>
				
				<div class="breadcrumb-env">
					<ol class="breadcrumb bc-1">
						<li>
							<a href="/member"><i class="fa-home"></i>主页</a>
						</li>
						<li>
							<a href="javascript:;">用户中心</a>
						</li>
						<li class="active">
						<strong>个人资料</strong>
						</li>
					</ol>
				</div>
			</div>
	<div class="row">
	    <div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-angle-right"></i>
				</div>
				<div class="panel-body">
                    <div class="form-group">
                        <p>用户名：<?php echo $U->GetUserName(); ?></p>
                        <p>邮箱：<?php echo $U->GetEmail(); ?></p>
                        <?php $plan = $oo->get_plan();?>
                        <p>套餐：<span class="label label-info"><?=$plan?></span>&nbsp;&nbsp;
                        <?php
                        if($plan == 'A') {
                            echo '您为免费体验账户，流量将不会每月重置，升级到会员账户即可提升流量限额。';
                        } else if($plan == 'B') {
                            echo '您是尊贵的B套餐用户，拥有每月100GB流量,次月清空';
                        } else if($plan == 'B-1') {
                            echo '您是尊贵的B-1套餐用户，拥有每月10GB流量,次月清空（游戏用户及少量流量用户专享）';
                        } else if($plan == 'C') {
                            echo '您是尊贵的C套餐用户，拥有每月200GB流量,次月清空';
                        } else if($plan == 'D') {
                            echo '您是尊贵的D套餐用户，拥有每月500GB流量,次月清空,可以使用VIP节点';
                        } else if($plan == 'VIP') {
                            echo '您是尊贵的VIP套餐用户，拥有每月无限制流量,次月清空,可以使用VIP节点,优先的请求响应';
                        }
                        //alert('请直接向支付宝账户: 18x@loacg.com 支付,备注 您的邮件地址');
                        ?></p>
                        <p>支付时间：<?php echo date('Y-m-d H:i:s', $U->PayDate());?></p>
                        <p>到期时间：<span id="outtime_sp"><?php echo date('Y-m-d H:i:s', $U->ExpireDate());?></span>&nbsp;  <span class="btn btn-sm btn-secondary" id="checkExTime" style="padding: 1px;margin-bottom: 0px;"> 刷新到期时间 </span></p>
                        <p>账户余额：<?php echo $oo->get_money();?>元 </p>
                        
                        <p><a class="btn btn-danger btn-sm" href="javascript:;" onclick="alert('暂时无法执行此操作');">删除我的账户</a>&nbsp;&nbsp;</p>
                        <div class="form-block">
                        <input type="checkbox" checked class="iswitch">
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>
<script>
    $(function(){
        $("#checkExTime").click(function(){
            $.ajax({
                type:"POST",
                url:"/action/checkExpireDate",
                dataType:"json",
                success:function(data){
                    if(data.error){
                        showToastr(data.msg, 0);
                        $("#outtime_sp").html(data.extime);
                        //window.location.reload();
                    }else{
                        showToastr(data.msg, 0);
                        //刷新页面
                        //window.location.reload();
                    }
                },
                error:function(jqXHR){
                    showToastr("发生错误："+jqXHR.status, 0);
                }
            })
        });
    });
</script>
<?php include_once "./footer.php";?>