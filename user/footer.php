<?php
/**
 * Created by IntelliJ IDEA.
 * User: i
 * Date: 2015/8/9
 * Time: 20:19
 */
if(!defined("SS_PATH")) exit('Access Denied');
?>
<footer class="main-footer sticky footer-type-1">
	<div class="footer-inner">
		<div class="footer-text">
			<strong>Copyright &copy; 2014-<?php echo date('Y'); ?> <a href="/"><?php echo $site_name;  ?></a> </strong>
            All rights reserved.  Powered by  <b>ss-panel</b><?php echo $version; ?> Themes by <a href="https://loacg.com/">Sendya</a> | <a href="/member/payme" target="_blank">向我捐赠</a> | <a href="/member/tos">服务条款</a>
		</div>
		<div class="go-up">
			<a href="#" rel="go-top">
				<i class="fa-angle-up"></i>
			</a>
		</div>
	</div>
</footer>
</div>
</div>
<!-- Bottom Scripts -->
<script src="<?=$res_url?>assets/js/bootstrap.min.js"></script>
<script src="<?=$res_url?>assets/js/TweenMax.min.js"></script>
<script src="<?=$res_url?>assets/js/resizeable.js"></script>
<script src="<?=$res_url?>assets/js/joinable.js"></script>
<script src="<?=$res_url?>assets/js/xenon-api.js"></script>
<script src="<?=$res_url?>assets/js/xenon-toggles.js"></script>
<script src="<?=$res_url?>assets/js/xenon-widgets.js"></script>
<script src="<?=$res_url?>assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="<?=$res_url?>assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
<script src="<?=$res_url?>assets/js/toastr/toastr.min.js"></script>
<?php if(!isset($oo)) echo '<script src="<?=$res_url?>assets/js/jquery-validate/jquery.validate.min.js"></script>';?>
<script src="<?=$res_url?>assets/js/xenon-custom.js"></script>
</body>
</html>