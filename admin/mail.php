<?php


$invoiceTime ;//订单发送时间
$invoiceType ;//订单类型
$timeStart ;//开通时间
$timeEnd ;//结束时间
$user_id ;//用户Id
$money ;//钱（USD）


$content = <<<EOF
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>
	<td align="center" valign="top">
		<table border="0" cellpadding="10" cellspacing="0" width="800">
		<tbody>
		<tr>
			<td valign="top">
			</td>
		</tr>
		</tbody>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="800">
		<tbody>
		<tr>
			<td align="center" valign="top">
				<table border="0" cellpadding="0" cellspacing="0" width="800">
				<tbody>
				<tr>
					<td valign="top">
						<table border="0" cellpadding="20" cellspacing="0" width="100%">
						<tbody>
						<tr>
							<td valign="top">
								<div>
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
									<tr>
										<td valign="top" colspan="2">
											<h3 style="margin-bottom:5px">Suki.im</h3>
											A secure socks5 proxy,<br>
											Designed to protect your Internet traffic.<br>
										</td>
									</tr>
									<tr>
										<td>
											<strong>Invoice To:</strong><br>
											{$user_namil}
										</td>
										<td align="right">
											<h1>{$invoiceTime}</h1>
											<h4>Invoice #{InvoiceCode}</h4>
										</td>
									</tr>
									</tbody>
									</table>
									<br>
									<table border="0" cellpadding="5" cellspacing="0" width="100%">
									<tbody>
									<tr style="background-color:#eee">
										<th width="60%">
											Item
										</th>
										<th>
											Start
										</th>
										<th>
											End
										</th>
										<th style="white-space:nowrap" align="right">
											Hours
										</th>
										<th style="white-space:nowrap" align="right">
											USD
										</th>
									</tr>
									<tr>
										<td>
											Suki.im(SS) {$invoiceType} - Suki ({$user_id})
										</td>
										<td style="white-space:nowrap">
											{$timeStart}
										</td>
										<td style="white-space:nowrap">
											{$timeEnd}
										</td>
										<td align="right">
										</td>
										<td align="right">
											${money}
										</td>
									</tr>
									<tr>
										<td align="right" colspan="5">
											<br>
											<h3><span style="font-weight:normal">Total:</span> ${money}<span id="_baidu_bookmark_start_0" style="display:none;line-height:0">‍</span><span id="_baidu_bookmark_start_2" style="display:none;line-height:0">‍</span><span style="font-weight:normal">(money)</span><span id="_baidu_bookmark_end_3" style="display:none;line-height:0;font-weight:normal">‍</span><span id="_baidu_bookmark_end_1" style="display:none;line-height:0;font-weight:normal">‍</span></h3>
										</td>
									</tr>
									</tbody>
									</table>
									<p>
										Thanks for your purchase!<br>
										Please do not hesitate to contact us if you have any questions.
									</p>
								</div>
							</td>
						</tr>
						</tbody>
						</table>
					</td>
				</tr>
				</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<table border="0" cellpadding="10" cellspacing="0" width="800">
				<tbody>
				<tr>
					<td valign="top">
						<table border="0" cellpadding="10" cellspacing="0" width="100%">
						<tbody>
						<tr>
							<td valign="top">
								<div>
									Need help? &nbsp; <font color="#0000ee"><u><a href="mailto:ss@suki.im" target="_blank">Send e-mail to Support</a></u></font>
								</div>
							</td>
						</tr>
						</tbody>
						</table>
					</td>
				</tr>
				</tbody>
				</table>
			</td>
		</tr>
		</tbody>
		</table>
		<br>
	</td>
</tr>
</tbody>
</table>
<div>
	<br>
</div>
EOF;
$a;