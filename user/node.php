<?php
require_once '_header.php';
$node = new Ss\Node\Node();
$plan = $oo->get_plan();
?>

			<div class="page-title">
				<div class="title-env">
					<h1 class="title">节点列表</h1>
					<p class="description">请勿在任何地方公开节点地址！</p>
				</div>
				<div class="breadcrumb-env">
						<ol class="breadcrumb bc-1"><li><a href="/member"><i class="fa-home"></i>主页</a></li><li><a href="javascript:;">节点列表</a></li><li class="active"><strong>节点信息</strong></li></ol>
				</div>

			</div>
	<div class="row">
	    <!-- /.box-begin -->
	    <?php 
	        $node0 = $node->NodesArray(0);
	        foreach($node0 as $row){
	    ?>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-angle-right"></i> <?php echo $row['node_name']; ?>
					<div class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							操作 <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="Json?id=<?php echo $row['id']; ?>">配置文件</a></li>
							<li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="QrCode?id=<?php echo $row['id']; ?>">二维码</a></li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<button class="btn btn-primary">地址:</button>
					<button class="btn btn-secondary">  <?php echo $row['node_server']; ?>  </button>
					<button class="btn btn-orange"><?php echo $row['node_status']; ?></button>
					<button class="btn btn-turquoise"><?php echo $row['node_method']; ?></button>
					<br>
					<p><?php echo $row['node_info']; ?></p>
				</div>
			</div>
		</div><!-- /.box-end -->
		<?php }?>
		<!-- /.pro-box-begin -->
		<?php
            $node1 = $node->NodesArray(1);
            foreach($node1 as $row){
        ?>
        <?php if($plan != 'A'){ ?>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-code"></i> Pro节点 - <?php echo $row['node_name']; ?>
					<div class="dropdown">
					    
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							操作 <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="Json?id=<?php echo $row['id']; ?>">配置文件</a></li>
							<li role="presentation"><a role="menuitem" target="_blank" tabindex="-1" href="QrCode?id=<?php echo $row['id']; ?>">二维码</a></li>
						</ul>
					</div>
				</div>
				<div class="panel-body">
					<button class="btn btn-primary">地址:</button>
					<button class="btn btn-secondary">  <?php echo $row['node_server']; ?>  </button>
					<button class="btn btn-orange"><?php echo $row['node_status']; ?></button>
					<button class="btn btn-turquoise"><?php echo $row['node_method']; ?></button>
					<br>
					<p><?php echo $row['node_info']; ?></p>
				</div>
			</div>
		</div><!-- /.pro-box-end -->
		<?php } else { ?>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-code"></i> Pro节点 - <?php echo $row['node_name']; ?>
					<div class="dropdown">
					    你不是VIP
					</div>
				</div>
				<div class="panel-body">
					<button class="btn btn-primary">地址:</button>
					<button class="btn btn-secondary">  <?php echo '---'; ?>  </button>
					<button class="btn btn-orange"><?php echo $row['node_status']; ?></button>
					<button class="btn btn-turquoise"><?php echo $row['node_method']; ?></button>
					<br>
					<p><?php echo $row['node_info']; ?></p>
				</div>
			</div>
		</div><!-- /.pro-box-end -->
		
		 <?php } } ?>
	</div>
<?php require_once 'footer.php';?>