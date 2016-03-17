<?php
require_once './_header.php';
?>

			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">服务中心</h1>
					<p class="description">支持/问题/使用协议/服务条款</p>
				</div>
				
				<div class="breadcrumb-env">
					<ol class="breadcrumb bc-1">
						<li>
							<a href="/my"><i class="fa-home"></i>主页</a>
						</li>
						<li>
							<a href="javascript:;">服务中心</a>
						</li>
						<li class="active">
						<strong>提交问题</strong>
						</li>
					</ol>
				</div>
			</div>
	<div class="row">
	    <div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-angle-right"></i> 反馈问题
				</div>
				<div class="panel-body">
                <div class="tab-content no-margin">
					<div class="tab-pane with-bg active" id="fwv-1">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group validate-has-error">
									<label class="control-label" for="nick_name">昵称:</label>
									<input class="form-control" name="nick_name" id="nick_name" data-validate="required" placeholder="您的称呼" aria-required="true" aria-describedby="full_name-error" aria-invalid="true">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group validate-has-error">
									<label class="control-label" for="email">电子邮件:</label>
									<input class="form-control" name="email" id="email" data-validate="required" data-mask="email" placeholder="example@domain.com" aria-required="true" aria-describedby="email-error">
								</div>
							</div>
							
						</div>
						
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="content">反馈内容:</label>
									<textarea class="form-control autogrow" name="content" id="content" data-validate="minlength[10]" rows="5" placeholder="请在这里输入您要反馈的内容.." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
								</div>
							</div>
			
						</div>
						
					</div>
                    <button class="btn btn-info btn-block" id="submit-pwd">提交反馈</button>
				</div>
				</div>
			</div>
		</div>
    </div>
<script>
    $(function(){
        $("#locksc").click(function(){
            
        });
    });
</script>
<?php include_once "./footer.php";?>