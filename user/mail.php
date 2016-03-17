<?php
if(!defined('SS_PATH')) exit('This file could not be access directly.');
$time = date('Y-m-d H:i:s', time());

$HtmlMain = <<<EOF
<style>body {display: block;margin: 0px;}</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tbody>
	<tr>
		<td align="center">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td colspan="3" height="37" bgcolor="#ebebeb"></td>
				</tr>
				<tr>
					<td width="29" bgcolor="#ebebeb"></td>
					<td valign="top">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tbody><tr>
								<td width="196" height="62" bgcolor="#ebebeb" valign="top"><a href="https://ss.suki.im/" title="SS 喵 &gt;&gt; 我是会爬墙的喵." target="_blank"><img src="https://ss.suki.im/assets/mail/logo.png" alt="" style="border:0 none" class="CToWUd"></a></td>
								<td bgcolor="#ebebeb" valign="middle" align="right" style="font-size:18px;line-height:24px;font-weight:500;color:#333;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">通知系统</td>
							</tr>
							<tr>
								<td bgcolor="#ebebeb" colspan="2">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tbody><tr>
											<td style="border:1px #d9d9d9 solid;background:#fff;padding:15px 18px 18px;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">
												<p style="font-size:14px;line-height:30px;color:#333;margin:0">$username 您好！<br><br>$content<br><br></p>
												<div style="font-size:14px;line-height:30px;margin:0 0 20px 0;color:#777">
												感谢您选择Suki.im，我们竭诚为您服务。<br>
												上墙？加密传输？玩外服游戏？肝船？神马都不是问题！<wbr>Suki.im将带给您不一样的海外网络加速体验。<br>
												如果您是第一次使用我们服务，<wbr>欢迎访问Suki.im帮助中心了解您所需要的信息：<a href="https://ss.suki.im/Help/index.html" target="_blank">http<wbr>://ss.suki.im/Help/<wbr>index.html</a><br><br>
												使用中遇到任何相关问题，欢迎联系官方技术支持QQ：<a href="http://crm2.qq.com/page/portalpage/wpa.php?uin=337585725&amp;f=1&amp;ty=1&amp;aty=0&amp;a=&amp;from=6" target="_blank">337<wbr>585725</a>进行咨询。<br>
												关注我们的官方微博(<a href="http://weibo.com/sendya_" style="font-size:10px" target="_blank">@Sendya_</a>)<wbr>以获取Suki.im最新动态。
												</div>
												<hr style="border:0 none;border-top:1px #dbdbdb dashed;min-height:0;font-size:0;margin:0 0 18px 0">
												<p style="margin:0;text-align:right;color:#999;font-size:12px;line-height:24px">Suki.im 管理团队<br>$time</p>
											</td>
										</tr>
									</tbody></table>
								</td>
							</tr>
						</tbody></table>
					</td>
					<td width="29" bgcolor="#ebebeb"></td>
				</tr>
				<tr>
					<td width="29" bgcolor="#ebebeb"></td>
					<td bgcolor="#ebebeb" valign="top">
						<p style="font-size:12px;line-height:30px;margin:26px 0 6px 0;color:#777;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">本邮件地址仅发送通告邮件，请不要答复此邮件，<wbr>发送到此地址的邮件将不会得到答复。 </p>
						<p style="font-size:12px;line-height:22px;margin:0 0 0 0;color:#999;font-family:'\005fae\008f6f\0096c5\009ed1',Tahoma,arial,serif">Shallow Pui Network  Co., Ltd.<br>
							EMail：<a href="mailto:support@loacg.com" style="color:#999;text-decoration:none" target="_blank">support@loacg.com</a><br>
							博客：<a href="https://www.loacg.com" style="color:#999;text-decoration:none" target="_blank">https://www.loacg.com</a><br>
							主站：<a href="https://ss.suki.im" style="color:#999;text-decoration:none" target="_blank">https://ss.suki.im</a><br>
						</p>
					</td>
					<td width="29" bgcolor="#ebebeb"></td>
				</tr>
				<tr>
					<td colspan="3" height="40" bgcolor="#ebebeb"></td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>
EOF;
