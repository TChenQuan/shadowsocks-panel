<?php
require_once './_header.php';
?>

			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">账户续费/激活</h1>
					<p class="description">购买套餐卡, 使用套餐卡, 激活账户..</p>
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
                        <p>套餐：<span class="label label-info"><?=$plan?></span></p>
                        <p>支付时间：<?php echo date('Y-m-d H:i:s', $U->PayDate());?></p>
                        <p>到期时间：<span id="outtime_sp"><?php echo date('Y-m-d H:i:s', $U->ExpireDate());?></span>&nbsp;  <span class="btn btn-sm btn-secondary" id="checkExTime" style="padding: 1px;margin-bottom: 0px;"> 刷新到期时间 </span></p>
                        <p>账户余额：<?php echo $oo->get_money();?>元 </p>
					</div>
                    <div class="form-group">
                        <label for="cate_title">套餐卡/使用卡激活：</label>
                        <input class="form-control" id="invite_num" value="0">
                    </div>
				</div>
                <div class="box-footer">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">使用并激活</button>
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