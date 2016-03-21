shadowsocks-panel
=================

**(2016.03.19 update)：  
有人发邮件给我说让我remove github 代码，不然要ddos我的服务器..我好怕怕，求不打，我是良民**

#### 关于 SS-PANEL 2.5.7 Final 版本的配置

1. 面板需要配置 NGINX URL重写（rewrite伪静态）`nginx rewrite`规则在 `./install/nginx.conf`
2. 手动导入数据库（数据库在 ./install/shadowsocks.sql ）
3. 复制 ./system/config-simple.php 为 config.php 并且配置里面的相关参数 以及 MAIL账户密码等
4. 服务端请随意挑选  
   （支持  
 4.1. https://github.com/mengskysama/shadowsocks/tree/manyuser  
 4.2. https://github.com/orvice/shadowsocks-go/tree/mu  
 4.3. https://github.com/breakwa11/shadowsocks/tree/manyuser  
以及任何根据 正版shadowsocks 规范制作的多用户服务端  
5. 请添加一项 cron 定时任务 地址为： `http://domain.com/cron/reset`  建议每 5分钟执行一次，不得低于3分钟 除非你想让你都DB数据库炸掉。
   （注意：`./system/cron/` 此目录需要可写权限！）
6. 要导入的DB数据在 `./install/` 目录内（Nginx重写规则也在此目录）

*. 前端消息提示未实现后端可直接控制，请直接在数据库中在自行添加，格式为：
```
pid       message           add_time        hot             type
自动生成  消息内容          消息添加时间    是否hot(1/0)    1,2,3,4
```
备注： hot = 1 时，消息在前台的列表展示将会被加粗。  
`type 1 2 3 4` 分别 普通消息，系统消息，错误消息，警告消息


### 程序截图
![充值界面](http://static-2.loacg.com/open/static/ss-panel-github/actCard.png)
![后台](https://static-2.loacg.com/open/static/ss-panel-github/Admin.png)
![前台](https://static-2.loacg.com/open/static/ss-panel-github/member.png)
![前台](https://static-2.loacg.com/open/static/ss-panel-github/member2.png)
![前台](https://static-2.loacg.com/open/static/ss-panel-github/member3.png)

-----
本程序名为：`ss-panel` 基于 [gayhub/orvice](https://github.com/orvice/ss-panel) 的修改版本
		Modifyed Sendya(https://loacg.com/)

-----
有问题可以QQ或者Telegram找到我（QQ: 914099083 | TG: @Sendya
