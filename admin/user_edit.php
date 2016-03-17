<?php
require_once '_main.php';

if(!empty($_GET)){
    //获取id
    $uid = $_GET['uid'];
    $u = new \Ss\User\UserInfo($uid);
    $rs = $u->UserArray();
}

?>

<!-- =============================================== -->

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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">编辑用户</h3>
                    </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_title">ID: <?php echo $uid;?></label>
                                <input type="hidden" class="form-control" id="uid" value="<?php echo $uid;?>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户名</label>
                                <input  class="form-control" id="name" value="<?php echo $rs['user_name'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">用户邮箱</label>
                                <input  class="form-control" id="email" value="<?php echo $rs['email'];?>"  >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">SS连接密码</label>
                                <input  class="form-control" id="passwd" value="<?php echo $rs['passwd'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">设置流量</label>
                                <input   class="form-control" id="transfer_enable"  value="<?php echo $rs['transfer_enable']/$togb;?>" placeholder="单位为GB，直接输入数值" >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">账户等级</label>
                                <input   class="form-control" id="plan"  value="<?php echo $rs['plan'];?>" placeholder="账户等级" >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">邀请码数量</label>

                                <input  class="form-control" id="invite_num"  value="<?php echo $rs['invite_num'];?>"  >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">续费时间</label>

                                <input  class="form-control" id="paytime"  value="<?php echo date("Y-m-d H:i:s", $rs['paytime']);?>"  >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">到期时间</label>

                                <input  class="form-control" id="expire_date"  value="<?php echo date("Y-m-d H:i:s", $rs['expire_date']);?>"  >
                            </div>
                            
                            <div class="form-group">
                                <label for="cate_title">该账户备注信息（付费用户必填写，免费禁止填写）</label>

                                <input  class="form-control" id="remark"  value="<?php echo $rs['remark'];?>"  >
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" id="submit" name="submit"   class="btn btn-primary">修改</button>
                        </div>
                        <div id="msg-success" class="alert alert-info alert-dismissable" style="display: none;">
                            <button type="button" class="close" id="ok-close" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> 成功!</h4>
                            <p id="msg-success-p"></p>
                        </div>
                        <div id="msg-error" class="alert alert-warning alert-dismissable" style="display: none;">
                            <button type="button" class="close" id="error-close" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                            <p id="msg-error-p"></p>
                        </div>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>

<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            $.ajax({
                type:"POST",
                url:"/cpanel/_user_edit",
                dataType:"json",
                data:{
                    uid: $("#uid").val(),
                    name: $("#name").val(),
                    email: $("#email").val(),
                    passwd: $("#passwd").val(),
                    plan: $("#plan").val(),
                    transfer_enable: $("#transfer_enable").val() * 1024 * 1024 * 1024,
                    invite_num: $("#invite_num").val(),
                    paytime: $("#paytime").val(),
                    expire_date: $("#expire_date").val(),
                    remark: $("#remark").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide(10);
                        $("#msg-success").show(100);
                        $("#msg-success-p").html(data.msg);
                        window.setTimeout("location.href='/cpanel/userlist'", 2000);
                    }else{
                        $("#msg-error").show(100);
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    $("#msg-error").hide(10);
                    $("#msg-error").show(100);
                    $("#msg-error-p").html("发生错误："+jqXHR.status);
                }
            })
        })
        $("#ok-close").click(function(){
            $("#msg-success").hide(100);
        })
        $("#error-close").click(function(){
            $("#msg-error").hide(100);
        })
    })
</script>

