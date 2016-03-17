<?php
require_once './_header.php';

$invite = new \Ss\User\Invite($uid);
$code = $invite->CodeArray();
?>

			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">邀请码</h1>
					<p class="description"><?php if($U->InviteNum()==0) {?>查看自己的邀请码<?php } else {?>当前您可以生成<code><?php   echo $U->InviteNum();  ?></code>个邀请码。<?php }?></p>
				</div>
				
				<div class="breadcrumb-env">
					<ol class="breadcrumb bc-1">
						<li>
							<a href="/member"><i class="fa-home"></i>主页</a>
						</li>
						<li class="active">
						<strong>邀请码</strong>
						</li>
					</ol>
				</div>
					
			</div>

<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php if($U->InviteNum()!=0) {?> <a class="btn btn-danger btn-sm invitec" href="javascript:;" style="color:#FFF;">生成邀请码</a><?php }?>&nbsp;<a class="btn btn-danger btn-sm inviteFlow" href="javascript:;" style="color:#FFF;">用流量购买邀请码</a></h3>
					<?php if($U->InviteNum()!=0) {?>
					<div class="panel-options">
						<a href="javascript:;" id="invite" class="invitec" data-toggle="panel">
							<span class="collapse-icon" title="生成邀请码">+</span>
						</a>
					</div>
					<?php }?>
				</div>
				<div class="panel-body">
				
					<table class="table table-hover middle-align">
						<thead>
							<tr>
								<th>###</th>
								<th >邀请码</th>
								<th >状态</th>
							</tr>
						</thead>
						<tbody>
						    <?php
						        if(count($code) > 0) {
                                $a = 0;
                                foreach($code as $data ){
                            ?>
							<tr>
								<td>
									<?php echo $a;$a++; ?>
								</td>
								<td>
								    <?php echo $data['code'];?>
								</td>
								<td>
									<a href="javascript:;" class="btn btn-sm btn-secondary" data-set-skin="">可用</a>
								</td>
							</tr>
							<?php }} else { ?>
							<tr>
							    <td colspan="3" align="center">您没有邀请码</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
					
					<hr>
					
					<h4>注意！</h4>
					
					<p>邀请码请给认识的需要的人。<br />邀请码使用流量购买 1个/5GB,请不要浪费。邀请有记录，若被邀请的人违反用户协议，您将会有连带责任。<br /><b>若邀请成功,将获得获得增加15天使用时间奖励(无限制邀请数)</b></p>
					
					<br>
					
					<pre>邀请码这种东西，若无力生成,可以前往 <a href="http://t.cn/RUHq4UW" target="_blank">官方淘宝店铺</a> 利用1分钱购买试用7天邀请码</pre>
					
				</div>
			</div>
<script>
    $(document).ready(function(){
        $(".invitec").click(function(){
            showToastr("生成邀请码中..", 0, 2000);
            $.ajax({
                type:"GET",
                url:"/action/invite",
                dataType:"json",
                success:function(data){
                    if(data.status){
                        window.location.reload();
                    }else{
                        //$("#msg-error").show();
                        //$("#msg-error-p").html(data.msg);
                        showToastr("邀请码生成成功", 0, 5000);
                    }
                },
                error:function(jqXHR){
                    showToastr("发生错误："+jqXHR.status, 0);
                }
            })
        });
        $('.inviteFlow').click(function(){
            showToastr("正在校验信息..", 0, 2000);
            $.ajax({
                type:"GET",
                url:"/action/inviteFlow",
                dataType:"json",
                success:function(data){
                    if(data.status){
                        showToastr(data.msg, 0, 5000);
                        window.location.reload();
                    }else{
                        //$("#msg-error").show();
                        //$("#msg-error-p").html(data.msg);
                        showToastr(data.msg, 0, 5000);
                    }
                },
                error:function(jqXHR){
                    showToastr("发生错误："+jqXHR.status, 0);
                }
            })
        });
    })
</script>
<?php include_once "./footer.php";?>