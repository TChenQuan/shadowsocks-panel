
### WTF
请增加 Cron 地址, 建议每 5 分钟执行一次 地址为：`http://domain.com/cron/reset`



2015/10/11 PM 19.00
* 新增地区查询备用节点
* 新增在线强制ss服务端重新加载账号密码数据
* 修正头像被墙问题
* 使用新的https监听传送协议

2015/08/10 AM 09.10
* 新增 Core 类
* 强行执行判断用户状态
* 修改请求合并
* 新增 SMTP 方式发送邮件(还有问题,发送邮件速度过慢.导致页面上时间无响应)
* 修正 ss-panel 所爆出的 邀请码漏洞 .
* 全站采用 伪静态方式
* 禁止访问 /lib/ 目录
* 禁止直接访问 /admin/ | /user/ 
* 
* 新模板界面开始匹配界面

2015/08/13 AM 10.00
* 用户端 节点列表 临时采用手动输出
* 修正 修改网站登陆密码
* 修正 修改SS连接密码(如果修改时SS密码为空,则自动生成一次随机密码)
* 新增 修改用户昵称(有人说注册的时候乱填的太丑了，这尼玛怪我咯？)
* 新增 升级账户级别(我跟你讲，我不卖钱,就算你想买, 12450 的升级费你能付得起吗？)
* 新增 plan_update 权限监控

2015/08/15 PM 22.37
* 修正 TOS
* 新增 用户反馈界面
* 修正ss-panel原作者大部分强制 http协议导致 使用https时出现各种问题
* 修正Gravatar头像源使用gravatar.com被墙导致访问过慢(修正到 gravatar0.ifdream.net ,该站提供http/https方式,全站反代g头像) 
* 修正 管理端生成验证码问题
* 修正 用户端生成邀请码 可以通过改变post数据导致生成多个邀请码(加个锁看你怎么多次并发！٩( 'ω' )و )

2015/08/26 AM 11.10
* 修正 节点列表 更新问题 (问题细节： /user/node.php foreach循环输出节点列表)
* 可能的开源计划

2015/08/26 PM 14.37

* 修正 管理端 node 页面
* /admin/node_add
* /admin/node_edit
* /admin/node_del
* /admin/node
* 修正 管理端 user 页面
* /admin/userlist
* /admin/user_edit
* /admin/user_del
* 修正 Admin login page
* 修正 logout
* 修正 top / header
* 
+ 邀请码漏洞在前次更新修正时，再次遗留漏洞,本次已修复（计划下次更新移除cookie储存过多用户数据）




=======================
本程序名为：`ss-panel` 基于 [gayhub/orvice](https://github.com/orvice/ss-panel) 的修改版本
		by Sendya(https://loacg.com/)