<?php
/**
 * Created by IntelliJ IDEA.
 * User: i
 * Date: 2015/8/10
 * Time: 0:13
 */
if(!defined("SS_PATH")) exit('Access Denied');
?>
<script type="text/javascript">function showToastr(messages,waitime,timeOut){if(timeOut==null||timeOut==0||timeOut=="")timeOut="5000";setTimeout(function(){var opts={"closeButton":true,"debug":false,"positionClass":"toast-top-right toast-default","toastClass":"black","onclick":null,"showDuration":"100","hideDuration":"1000","timeOut":timeOut,"extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut"};toastr.info(messages,"系统提示",opts);},waitime);}</script>
<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <nav class="navbar user-info-navbar" role="navigation">

        <!-- Left links for user info navbar -->
        <ul class="user-info-menu left-links list-inline list-unstyled">

            <li class="hidden-sm hidden-xs">
                <a href="#" data-toggle="sidebar">
                    <i class="fa-bars"></i>
                </a>
            </li>

            <li class="dropdown hover-line">
                <a href="#" data-toggle="dropdown">
                    <i class="fa-bell-o"></i>
                    <span class="badge badge-purple"></span>
                </a>
                <?php
                    $msg = new \Ss\Message\Message();
                    $msgArr = $msg->MessageArray();
                    $msgLength = count($msgArr);
                ?>
                <ul class="dropdown-menu notifications">
                    <li class="top">
                        <p class="small">
                            <a href="#" class="pull-right">全部标记已读</a>
                            你有 <strong><?=$msgLength?></strong> 条新的消息.
                        </p>
                    </li>

                    <li>
                        <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                            <?php 
                            /**
                             * notification-success
                             * notification-secondary
                             * notification-danger
                             * notification-primary
                             * notification-info
                             * notification-warning
                             */
                            foreach($msgArr as $row) {
                                $classC = $row['hot'] == 1 ? "active" : "";
                                $notification = '';
                                $icon = '';
                                switch ($row['type']) {
                                    case '2':
                                        $notification = "notification-primary";
                                        $icon = "fa-warning";
                                        break;
                                    case '3':
                                        $notification = "notification-warning";
                                        $icon = "fa-bug";
                                        break;
                                    case '4':
                                        $notification = "notification-danger";
                                        $icon = "fa-times-circle-o";
                                        break;
                                    case '1':
                                    default:
                                        $notification = "notification-success";
                                        $icon = "fa-info-circle";
                                        break;
                                }
                                $notification = $classC . " " . $notification;
                            ?>

                            <li class="<?php echo $notification;?>">
                                <a href="#">
                                    <i class="<?php echo $icon;?>"></i>
                                    <span class="line"><strong><?php echo $row['message'];?></strong></span>
                                    <span class="line small time"><?php echo date("Y-m-d H:i:s",$row['add_time']);?></span>
                                </a>
                            </li>
                            <?php } ?>
                            

                        </ul>
                    </li>
                    <li class="external">
                        <a href="#">
                            <span>查看所有消息</span>
                            <i class="fa-link-ext"></i>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="user-info-menu right-links list-inline list-unstyled">

            <li class="dropdown user-profile">
                <a href="#" data-toggle="dropdown">
                    <img src="<?php echo \Ss\User\Comm::Gravatar($U->GetEmail(), 128);  ?>" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								<?php echo $U->GetUserName(); ?>
                                <i class="fa-angle-down"></i>
							</span>
                </a>

                <ul class="dropdown-menu user-profile-menu list-unstyled">
                    <li>
                        <a href="/member/info">
                            <i class="fa-user"></i>
                            个人资料
                        </a>
                    </li>
                    <li>
                        <a href="/member/info">
                            <i class="fa-wrench"></i>
                            设置
                        </a>
                    </li>
                    <li>
                        <a href="/member/help">
                            <i class="fa-info"></i>
                            帮助
                        </a>
                    </li>
                    <li class="last">
                        <a href="/action/logout">
                            <i class="fa-lock"></i>
                            登出
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>