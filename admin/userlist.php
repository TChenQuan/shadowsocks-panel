<?php
require_once '_main.php';
$Users = new Ss\User\User();
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户管理
                <small>User Manage</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <td colspan="9">已下为收费 用户</td>
                                </tr>
                                <tr>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>端口</th>
                                    <th>总流量</th>
                                    <th>已使用流量</th>
                                    <th>账户类型</th>
                                    <th>续费时间</th>
                                    <th>到期时间</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                $us = $Users->AllUserByPayInfo();
                                foreach ( $us as $rs ){ ?>
                                    <tr>
                                        <td><?php echo $rs['user_name']; ?></td>
                                        <td><?php echo $rs['email']; ?></td>
                                        <td><?php echo $rs['port']; ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow($rs['transfer_enable']); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d'])); ?></td>
                                        <td><?php echo $rs['plan'];?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['paytime']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['expire_date']); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="/cpanel/user_edit?uid=<?php echo $rs['uid']; ?>">查看</a>
                                            <a class="btn btn-danger btn-sm" href="/cpanel/user_del?uid=<?php echo $rs['uid']; ?>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td colspan="9">已下为免费(测试)用户</td>
                                    </tr>
                                    <tr>
                                        <th>用户名</th>
                                        <th>邮箱</th>
                                        <th>端口</th>
                                        <th>总流量</th>
                                        <th>已使用流量</th>
                                        <th>账户类型</th>
                                        <th>续费时间</th>
                                        <th>到期时间</th>
                                        <th>操作</th>
                                    </tr>
                                <?php
                                $us3 = $Users->AllUserByTest();
                                foreach ( $us3 as $rs ){ ?>
                                    <tr>
                                        <td><?php echo $rs['user_name']; ?></td>
                                        <td><?php echo $rs['email']; ?></td>
                                        <td><?php echo $rs['port']; ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow($rs['transfer_enable']); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d'])); ?></td>
                                        <td><?php echo $rs['plan'];?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['paytime']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['expire_date']); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="/cpanel/user_edit?uid=<?php echo $rs['uid']; ?>">查看</a>
                                            <a class="btn btn-danger btn-sm" href="/cpanel/user_del?uid=<?php echo $rs['uid']; ?>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td colspan="9">已下为免费(未付费)用户</td>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>邮箱</th>
                                        <th>端口</th>
                                        <th>总流量</th>
                                        <th>已使用流量</th>
                                        <th>账户类型</th>
                                        <th>续费时间</th>
                                        <th>操作</th>
                                    </tr>
                                <?php
                                $us2 = $Users->AllUserByFree();
                                foreach ( $us2 as $rs ){ ?>
                                    <tr>
                                        <td>#<?php echo $rs['uid']; ?></td>
                                        <td><?php echo $rs['user_name']; ?></td>
                                        <td><?php echo $rs['email']; ?></td>
                                        <td><?php echo $rs['port']; ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow($rs['transfer_enable']); ?></td>
                                        <td><?php \Ss\Etc\Comm::flowAutoShow(($rs['u']+$rs['d'])); ?></td>
                                        <td><?php echo $rs['plan'];?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$rs['paytime']); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="/cpanel/user_edit?uid=<?php echo $rs['uid']; ?>">查看</a>
                                            <a class="btn btn-danger btn-sm" href="/cpanel/user_del?uid=<?php echo $rs['uid']; ?>" onclick="JavaScript:return confirm('确定删除吗？')">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
