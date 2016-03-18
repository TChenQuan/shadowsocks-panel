<?php
require_once '_header.php';
//$ssmin = new \Ss\Etc\Ana();

//获得流量信息
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$all_transfer = $oo->get_transfer_enable()/$togb;
$unused_transfer =  $oo->unused_transfer()/$togb;
$used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
$used_100 = round($used_100,2);
$used_100 = $used_100*100;
if($used_100 == 0){
    $used_100 = 1;
}
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = round($all_transfer,2);
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();

$U = new \Ss\User\UserInfo($uid);
$exttime = date("Y-m-d H:i:s",$U->ExpireDate());
?>

			<div class="row">
				<div class="col-sm-3">

					<div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="97.8" data-suffix="%" data-duration="2">
						<div class="xe-icon">
							<i class="linecons-cloud"></i>
						</div>
						<div class="xe-label">
							<strong class="num">0.0%</strong>
							<span>服务器正常运行时间</span>
						</div>
					</div>

					<div class="xe-widget xe-counter xe-counter-purple" data-count=".num">
						<div class="xe-icon">
							<i class="fa-calendar"></i>
						</div>
						<div class="xe-label">
							<strong>
								<a id="checkin" href="javascript:void(0);" <?php  if(!$oo->is_able_to_check_in()) echo 'style="display: none;"'; ?>>点击签到</a>
								<a id="checkinoff" href="javascript:void(0);" <?php  if($oo->is_able_to_check_in()) echo 'style="display: none;"'; ?> >签到成功</a>
							</strong>
							<span id="checkin-tag" <?php  if(!$oo->is_able_to_check_in()) echo 'style="display: none;"'; ?>>签到送流量</span>
							<span  id="checkinoff-tag" <?php  if($oo->is_able_to_check_in()) echo 'style="display: none;"'; ?>><code><?php echo date('m-d H:i',$oo->get_last_check_in_time());?></code></span>
						</div>
					</div>

					<div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="1" data-to="<?php echo $ssmin->nodeCount();?>" data-duration="1" data-easing="true">
						<div class="xe-icon">
							<i class="linecons-desktop"></i>
						</div>
						<div class="xe-label">
							<strong class="num">1</strong>
							<span>服务器</span>
						</div>
					</div>

				</div>
				<div class="col-sm-6">

					<div class="chart-item-bg">
						<div class="chart-label">
							<div class="h3 text-secondary text-bold" data-count="this" data-from="0" data-to="<?php echo $transfers;?>" data-suffix="MB" data-duration="1">0 MB</div>
							<span class="text-medium text-muted">流量使用情况</span>
						</div>
							<div class="progress progress-striped active" style="height: 20px;position: absolute;left:30px;right:30px;top:30%">
								<div class="progress-bar progress-bar-info" style="width: <?php echo $used_100; ?>%;height:20px;"></div>
							</div>
							<div style="position: absolute;left:30px;right:30px;top:40%">共有流量：<?php echo $all_transfer ."GB";?><br/>可用流量：<?php echo  $unused_transfer."GB";?><br/><br/>您的当前IP：<code><?php echo getip();?></code><br/>您的地区：<code id="country_id">获取中.</code><br/>
							<h3><a href="/response/Help/" target="_blank" style="color:#000">Win使用教程</a><span style="color:#F00">&nbsp;&gt;&gt;</span> <a href="https://banzhuanboy.com/460.html" target="_blank" title="教程来自：搬砖少年(banzhuanboy.com)">IOS设备 Surge配置教程</a></h3>
							</div>
						<div  style="height: 298px;">

						</div>

					</div>

				</div>
				<div class="col-sm-3">

					<div class="chart-item-bg">
						<div class="chart-label chart-label-small">
							<div class="h4 text-purple text-bold" data-count="this" data-from="0.00" data-to="<?php echo number_format( (($ssmin->onlineUserCount(10)+10) / $ssmin->allUserCount()) * 100, 2);?>" data-suffix="%" data-duration="1.5">0.00%</div>
							<span class="text-small text-upper text-muted">在线人数百分比</span><br />
							<span class="text-small text-upper text-muted">注册用户：<code> <?php echo $ssmin->allUserCount();?> </code><br/>签到人数：<code> <?php echo $ssmin->CheckInUser(3600*24);?> </code><br /></span>
							<span class="text-small text-upper text-muted">实时在线：<code> <?php echo $ssmin->onlineUserCount(10);?> </code><br />

						</div>
						<div id="server-uptime-chart" style="height: 134px;"></div>
					</div>

					<div class="chart-item-bg">
						<div class="chart-label chart-label-small">
							<div class="h4 text-secondary text-bold" data-count="this" data-from="0.00" data-to="<?php echo $ssmin->getTrafficGB(); ?>" data-suffix="GB" data-decimal="." data-duration="2">0</div>
							<span class="text-small text-upper text-muted"><?php echo $site_name;  ?>已经产生历史流量<code><?php echo $ssmin->getTrafficGB(); ?></code>GB</span><br />
							<span class="text-small text-upper text-muted"><?php echo $site_name;  ?>已经有<code><?php echo $ssmin->activedUserCount();?></code>人使用</span>
						</div>

						<div id="sales-avg-chart" style="height: 134px; position: relative;">
							<div style="position: absolute; top: 25px; right: 0; left: 40%; bottom: 0"></div>
						</div>

					</div>

				</div>
			</div>


			<div class="row">
				<div class="col-sm-6">

					<div class="chart-item-bg">
						<div class="chart-entry-view">
							<div class="chart-entry-label">
								可以通过签到获取流量。<br />
								本服务禁止在使用某卫士或某管家等产品电脑或手机上使用，一经发现永久禁封。可使用<wbr><code>Proxifier/SocksCap64/SocksCap/ProxyCap</code>等转为UDP代理游戏<br /><br />
								<p>Win客户端：1.<a href="/response/download/SS-CSharp_2.5.6.exe" target="_blank">SS-CSharp_2.5.6</a>&nbsp;&nbsp;&nbsp;
								2.<a href="/response/download/ShadowsocksR.zip" target="_blank" title="ShadowsocksR 3.4.2">ShadowsocksR</a>&nbsp;&nbsp;&nbsp;
								<br>Android客户端：<a href="/response/download/SS-Android_2.7.7.apk" target="_blank">SS-Android_2.7.7.apk</a>&nbsp;Proxifier下载:<a href="/response/download/Proxifier.zip" target="_blank">Proxifier</a></p>
								更多平台客户端请前往 <a href="/response/download/" target="_blank"> [下载中心] </a>
							</div>
						</div>
					</div>

				</div>
				<div class="col-sm-6">

					<div class="chart-item-bg">
						<div class="chart-label">
						    <div  class="h1 text-purple text-bold">连接信息</div>
							<span class="text-small text-muted text-upper">端口：<code><?php echo $oo->get_port();?></code></span><br />
							<span class="text-small text-muted text-upper">密码：<span id="showpwd"><b>点击显示密码</b></span></span><br />
							<span class="text-small text-muted text-upper">套餐： <span class="label label-info"><?php echo $oo->get_plan();?></span>   &nbsp;<span class="btn btn-sm btn-secondary" id="updatePlan" style="padding: 1px;margin-bottom: 0px;"> 升级套餐 </span>   &nbsp;<span class="btn btn-sm btn-secondary" id="planList" style="padding: 1px;margin-bottom: 0px;"> 套餐详情 </span></span><br /><br />
							<span class="text-small text-muted text-upper">最后使用时间：<code><?php echo date('Y-m-d H:i:s',$unix_time);  ?></code> </span>

						</div>
						<div class="chart-right-legend">
							<div style="width: 170px; height: 140px"></div>
						</div>
						<div style="height: 200px"></div>
					</div>
				</div>
			</div>


<script>$(document).ready(function(){$("#checkin").click(function(){$("#checkin").val("请稍等");showToastr("正在请求签到..请稍等",0,1500);$("#checkin").addClass("disabled");$.ajax({type:"GET",url:"/action/checkin",dataType:"json",success:function(result){showToastr(result.msg,0);$("#checkin").hide();$("#checkin-tag").hide();$("#checkinoff").show();$("#checkinoff-tag").show();},error:function(jqXHR){showToastr("发生错误："+jqXHR.status,0);}})});$("#updatePlan").click(function(){$.ajax({type:"GET",url:"/action/plan_update",dataType:"json",success:function(data){if(data.error){showToastr(data.msg,0);}else{showToastr(data.msg,0);}},error:function(jqXHR){showToastr("发生错误："+jqXHR.status,0);}})});$("#showpwd").click(function(){if($(this).html()=="<b>点击显示密码</b>"){$(this).html("<?php echo $oo->get_pass();?>");}else{$(this).html("<b>点击显示密码</b>");}});showToastr("您的上次续费时间：<?php echo date('Y-m-d H:i:s',$U->PayDate());?>\<br/\>您的账户到期时间：<?php echo $exttime;?>",800);$("#planList").click(function(){
    jQuery('#modal-1 .modal-body').html('套餐等级如下(套餐时间单位：每月)<br /><br />套餐A： 5GB(免费) (体验服务)<br />套餐B： 100GB(15RMB)<br />套餐C： 200GB(25RMB)<br />套餐D： 500GB(40RMB)<br />套餐VIP：请质询站长(\<del\>让站长肛一回送VIP\<\/del\><br /><br />套餐购买地址(taobao)：\<a href="http://t.cn/RUHq4UW" target="_blank"\ style="color:#F00;">进入购买页面\</a\>');jQuery('#modal-1').modal('show', {backdrop: 'fade'});
});$.get("/openapi/ip",{action: "country"}, function(data){$("#country_id").html(data.retData.province + " " + data.retData.country)},"json"); showToastr("线路已恢复正常。感谢您的支持！",0,5000);});
</script>
<?php require_once 'footer.php';?>
